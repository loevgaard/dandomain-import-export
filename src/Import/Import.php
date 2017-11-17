<?php
namespace Loevgaard\DandomainImportExport\Import;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Loevgaard\DandomainImportExport\Client\ClientTrait;
use Loevgaard\DandomainImportExport\ImportExport\PropertiesTrait;
use Loevgaard\DandomainImportExport\Xml\ElementInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class Import implements ImportInterface
{
    use ClientTrait;
    use PropertiesTrait;

    /**
     * This is the public URL that corresponds to the $path, i.e. https://your-project.com/imports
     *
     * @var string
     */
    protected $url;

    /**
     * @var string
     */
    protected $xmlStart;

    /**
     * @var string
     */
    protected $xmlEnd;

    /**
     * @var ElementInterface[]
     */
    protected $elements;

    public function __construct(string $dandomainUrl, string $username, string $password, string $path, string $url)
    {
        $this->dandomainUrl = $this->trimUrlOrPath($dandomainUrl);
        $this->username = $username;
        $this->password = $password;
        $this->path = $this->trimUrlOrPath($path);
        $this->url = $this->trimUrlOrPath($url);
        $this->elements = [];
    }

    /**
     * @inheritdoc
     */
    public function import(array $options = []) : ImportResultInterface
    {
        $importResult = new ImportResult();

        // if there are no element we will just return now
        if (!count($this->elements)) {
            return $importResult;
        }

        // resolve options
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $options = $resolver->resolve($options);

        // set filename
        if ($options[ImportInterface::OPTION_FILENAME]) {
            $filename = $options[ImportInterface::OPTION_FILENAME];
        } else {
            $filename = uniqid('import-').'.xml';
        }

        $filePath = $this->path.'/'.$filename;
        $fileUrl = $this->url.'/'.$filename;

        $importResult->setFilePath($filePath)->setFileUrl($fileUrl);

        // populate file with data
        @unlink($filePath);
        $fp = fopen($filePath, 'w');
        fwrite($fp, $this->xmlStart);

        foreach ($this->elements as $element) {
            fwrite($fp, $element->getXml());
        }

        fwrite($fp, $this->xmlEnd);
        fclose($fp);

        // create import url
        $importUrl = sprintf(
            '%s/admin/modules/importexport/import_v6.aspx?response=1&user=%s&password=%s&file=%s',
            $this->dandomainUrl,
            $this->username,
            $this->password,
            rawurlencode($fileUrl)
        );

        if ($options[ImportInterface::OPTION_ONLY_UPDATE]) {
            $importUrl .= '&updateonly=1';
        }

        $client = $this->getClient();

        $request = new Request('get', $importUrl);
        $importResult->setRequest($request);

        $response = $client->send($request, $options[ImportInterface::OPTION_CLIENT_OPTIONS]);
        $importResult->setResponse($response);

        $importResult->parseResponse($response);

        return $importResult;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            ImportInterface::OPTION_CLEAN_UP => false,
            ImportInterface::OPTION_DRY_RUN => false,
            ImportInterface::OPTION_FILENAME => '',
            ImportInterface::OPTION_ONLY_UPDATE => false,
            ImportInterface::OPTION_CLIENT_OPTIONS => [
                RequestOptions::CONNECT_TIMEOUT => 30,
                RequestOptions::TIMEOUT => 3600,
                RequestOptions::HTTP_ERRORS => false,
            ],
        ]);

        $resolver->setAllowedTypes(ImportInterface::OPTION_CLEAN_UP, 'bool');
        $resolver->setAllowedTypes(ImportInterface::OPTION_DRY_RUN, 'bool');
        $resolver->setAllowedTypes(ImportInterface::OPTION_FILENAME, 'string');
        $resolver->setAllowedTypes(ImportInterface::OPTION_ONLY_UPDATE, 'bool');
        $resolver->setAllowedTypes(ImportInterface::OPTION_CLIENT_OPTIONS, 'array');
    }

    /**
     * @inheritdoc
     */
    public function addElement(ElementInterface $element) : ImportInterface
    {
        $this->elements[] = $element;

        return $this;
    }

    /**
     * @param string $str
     * @return string
     */
    protected function trimUrlOrPath(string $str) : string
    {
        return rtrim($str, '/');
    }
}
