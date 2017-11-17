<?php
namespace Loevgaard\DandomainImportExport\Export;

use GuzzleHttp\Psr7\Request;
use Loevgaard\DandomainImportExport\Client\ClientTrait;
use Loevgaard\DandomainImportExport\Import\ExportInterface;
use Loevgaard\DandomainImportExport\Import\ExportResult;
use Loevgaard\DandomainImportExport\ImportExport\PropertiesTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Export implements ExportInterface
{
    use ClientTrait;
    use PropertiesTrait;

    /**
     * @var int
     */
    protected $exportId;

    /**
     * @var array
     */
    protected $params = [];

    public function __construct(string $dandomainUrl, string $username, string $password, string $path, int $exportId)
    {
        $this->dandomainUrl = rtrim($dandomainUrl, '/');
        $this->username = $username;
        $this->password = $password;
        $this->path = rtrim($path, '/');
        $this->exportId = $exportId;
    }

    /**
     * @param array $options
     * @return ExportResultInterface
     */
    public function export(array $options = []) : ExportResultInterface
    {
        $exportResult = new ExportResult();

        $url = sprintf(
            '%s/admin/modules/importexport/export_v6.aspx?response=1&user=%s&password=%s&exportid=%d',
            $this->dandomainUrl,
            $this->username,
            $this->password,
            $this->exportId
        );

        $client = $this->getClient();

        $request = new Request('get', $url);
        $exportResult->setRequest($request);

        $response = $client->send($request);
        $exportResult->setResponse($response);

        return $exportResult;
    }

    /**
     * @return \Generator
     */
    public function elements()
    {
        $client     = $this->getClient();
        $response   = $client->export($this->exportId, $this->params);

        if ($response->getStatusCode() != 200) {
            throw new \RuntimeException($response->getReasonPhrase());
        }

        $xml = new \SimpleXMLElement($response->getBody()->getContents());

        if (ImportExportClient::isDebug()) {
            echo "Export file XML:\n";
            print_r($xml);
        }

        $filename = sys_get_temp_dir() . '/' . uniqid('export---' . date('Y-m-d-H-i-s') . '---') . '.xml';

        if (ImportExportClient::isDebug()) {
            echo "Downloading export file to\n$filename\n";
        }

        $client->get((string)$xml->FILE_URL, [
            'sink' => $filename
        ]);

        $elementTag = $lastTag = '';
        $xml = new \XMLReader();
        $xml->open($filename);
        while ($xml->read()) {
            if ($xml->nodeType != \XMLReader::ELEMENT || ($elementTag && $elementTag != $xml->localName)) {
                continue;
            }

            if (!$elementTag && $lastTag == 'ELEMENTS') {
                $elementTag = $xml->localName;
            }

            if ($elementTag && $xml->localName == $elementTag) {
                yield new \SimpleXMLElement($xml->readOuterXml());
            }
            $lastTag = $xml->localName;
        }
        $xml->close();
        unset($xml);
        @unlink($filename);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            ExportInterface::OPTION_CLEAN_UP => false,
            ExportInterface::OPTION_FILENAME => '',
            ExportInterface::OPTION_LANGUAGE_ID => 0,
        ]);

        $resolver->setAllowedTypes(ExportInterface::OPTION_CLEAN_UP, 'bool');
        $resolver->setAllowedTypes(ExportInterface::OPTION_FILENAME, 'string');
        $resolver->setAllowedTypes(ExportInterface::OPTION_FILENAME, 'int');
    }

    /**
     * Set the language id parameter
     *
     * @param int $languageId
     * @return $this
     */
    public function setLanguageId($languageId)
    {
        $this->params['langid'] = $languageId;
        return $this;
    }
}
