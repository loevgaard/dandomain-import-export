<?php
namespace Dandomain\Export;

use Dandomain\ImportExportClient;
use Dandomain\ImportExportClientTrait;

class Export {
    use ImportExportClientTrait;

    /**
     * @var int
     */
    protected $exportId;

    /**
     * @var array
     */
    protected $params = [];

    public function __construct($exportId, $params = []) {
        $this->exportId = $exportId;

        $this->params = array_merge($this->params, $params);
    }

    /**
     * @return \Generator
     */
    public function elements() {
        $client     = $this->getClient();
        $response   = $client->export($this->exportId, $this->params);

        if($response->getStatusCode() != 200) {
            throw new \RuntimeException($response->getReasonPhrase());
        }

        $xml = new \SimpleXMLElement($response->getBody()->getContents());

        if(ImportExportClient::isDebug()) {
            echo "Export file XML:\n";
            print_r($xml);
        }

        $filename = sys_get_temp_dir() . '/' . uniqid('export---' . date('Y-m-d-H-i-s') . '---') . '.xml';

        if(ImportExportClient::isDebug()) {
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

            if(!$elementTag && $lastTag == 'ELEMENTS') {
                $elementTag = $xml->localName;
            }

            if($elementTag && $xml->localName == $elementTag) {
                yield new \SimpleXMLElement($xml->readOuterXml());
            }
            $lastTag = $xml->localName;
        }
        $xml->close();
        unset($xml);
        @unlink($filename);
    }

    /**
     * Set the language id parameter
     *
     * @param int $languageId
     * @return $this
     */
    public function setLanguageId($languageId) {
        $this->params['langid'] = $languageId;
        return $this;
    }
}