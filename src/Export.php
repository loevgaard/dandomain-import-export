<?php
namespace DandomainImportExport;

class Export {
    protected $client;
    protected $params = [];

    public function __construct($exportId, $params = []) {
        $this->params['exportid'] = $exportId;
        $this->params['response'] = 1; // this will output XML instead of HTML
        $this->params = array_merge($this->params, $params);
    }

    public function elements() {
        $client     = $this->getClient();
        $response   = $client->export($this->params);

        if($response->getStatusCode() != 200) {
            throw new \RuntimeException($response->getReasonPhrase());
        }

        $xml = new \SimpleXMLElement($response->getBody()->getContents());

        $filename = sys_get_temp_dir() . '/' . uniqid('export---' . date('Y-m-d-H-i-s') . '---') . '.xml';

        $resource = fopen($filename, 'w');
        $stream = \GuzzleHttp\Psr7\stream_for($resource);
        $client->get($xml->FILE_URL, [
            'sink' => $stream
        ]);
        fclose($resource);

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
        unset($xml);
    }

    /**
     * @param Client $client
     */
    public function setClient(Client $client) {
        $this->client = $client;
    }

    /**
     * @return Client
     */
    public function getClient() {
        if(!$this->client) {
            $this->client = new Client();
        }

        return $this->client;
    }
}