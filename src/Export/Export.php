<?php
namespace Loevgaard\DandomainImportExport\Export;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Loevgaard\DandomainImportExport\Client\ClientTrait;
use Loevgaard\DandomainImportExport\Import\ExportInterface;
use Loevgaard\DandomainImportExport\Import\ExportResult;
use Loevgaard\DandomainImportExport\ImportExport\PropertiesTrait;
use Symfony\Component\OptionsResolver\OptionsResolver;

abstract class Export implements ExportInterface
{
    use ClientTrait;
    use PropertiesTrait;

    /**
     * @var array
     */
    protected $params = [];

    /**
     * @var ExportResultInterface
     */
    protected $lastResult;

    public function __construct(string $dandomainUrl, string $username, string $password, string $path = '')
    {
        $this->dandomainUrl = rtrim($dandomainUrl, '/');
        $this->username = $username;
        $this->password = $password;
        $this->path = rtrim($path ?? sys_get_temp_dir(), '/');
    }

    /**
     * @param int $exportId
     * @param array $options
     * @return ExportResultInterface
     */
    public function export(int $exportId, array $options = []) : ExportResultInterface
    {
        // resolve options
        $resolver = new OptionsResolver();
        $this->configureOptions($resolver);

        $options = $resolver->resolve($options);

        // set filename
        if ($options[ExportInterface::OPTION_FILENAME]) {
            $filename = $options[ExportInterface::OPTION_FILENAME];
        } else {
            $filename = uniqid('export---'.date('Y-m-d\TH-i-s').'---').'.xml';
        }

        $filePath = $this->path.'/'.$filename;
        @unlink($filePath);

        if ($options[ExportInterface::OPTION_CLEAN_UP]) {
            register_shutdown_function(function () use ($filePath) {
                @unlink($filePath);
            });
        }

        $exportResult = new ExportResult();
        $exportResult->setFilePath($filePath);

        $url = sprintf(
            '%s/admin/modules/importexport/export_v6.aspx?response=1&user=%s&password=%s&exportid=%d',
            $this->dandomainUrl,
            $this->username,
            $this->password,
            $exportId
        );

        if ($options[ExportInterface::OPTION_LANGUAGE_ID]) {
            $url .= '&langid='.$options[ExportInterface::OPTION_LANGUAGE_ID];
        }

        if ($options[ExportInterface::OPTION_START_DATE]) {
            /** @var \DateTimeInterface $startDate */
            $startDate = $options[ExportInterface::OPTION_START_DATE];
            $url .= '&startdate='.$startDate->format('d-m-Y');
        }

        if ($options[ExportInterface::OPTION_END_DATE]) {
            /** @var \DateTimeInterface $endDate */
            $endDate = $options[ExportInterface::OPTION_END_DATE];
            $url .= '&enddate='.$endDate->format('d-m-Y');
        }

        $client = $this->getClient();

        $exportRequest = new Request('get', $url);
        $exportResult->setExportRequest($exportRequest);

        $exportResponse = $client->send($exportRequest);
        $exportResult->setExportResponse($exportResponse);

        $xml = new \SimpleXMLElement((string)$exportResponse->getBody());
        $request = new Request('get', (string)$xml->FILE_URL);
        $exportResult->setRequest($request);

        $response = $client->send($request, [
            RequestOptions::SINK => $filePath
        ]);
        $exportResult->setResponse($response);

        $this->lastResult = $exportResult;

        return $exportResult;
    }

    /**
     * @return \Generator
     */
    public function elements() : \Generator
    {
        if (!$this->lastResult) {
            return;
        }

        $elementTag = $lastTag = '';
        $xml = new \XMLReader();
        $xml->open($this->lastResult->getFilePath());
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
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefaults([
                ExportInterface::OPTION_CLEAN_UP => false,
            ])
            ->setDefined([
                ExportInterface::OPTION_FILENAME,
                ExportInterface::OPTION_LANGUAGE_ID,
                ExportInterface::OPTION_START_DATE,
                ExportInterface::OPTION_END_DATE
            ])
        ;

        $resolver->setAllowedTypes(ExportInterface::OPTION_CLEAN_UP, 'bool');
        $resolver->setAllowedTypes(ExportInterface::OPTION_FILENAME, 'string');
        $resolver->setAllowedTypes(ExportInterface::OPTION_LANGUAGE_ID, 'int');
        $resolver->setAllowedTypes(ExportInterface::OPTION_START_DATE, \DateTimeInterface::class);
        $resolver->setAllowedTypes(ExportInterface::OPTION_END_DATE, \DateTimeInterface::class);
    }
}
