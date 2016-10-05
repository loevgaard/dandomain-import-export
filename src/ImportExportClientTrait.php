<?php
namespace Dandomain;

use Dandomain\ImportExportClient;

trait ImportExportClientTrait {
    /**
     * @var ImportExportClient
     */
    protected $client;

    /**
     * @param ImportExportClient $client
     */
    public function setClient(ImportExportClient $client) {
        $this->client = $client;
    }

    /**
     * @return ImportExportClient
     */
    public function getClient() {
        if(!$this->client) {
            $this->client = new ImportExportClient();
        }

        return $this->client;
    }
}