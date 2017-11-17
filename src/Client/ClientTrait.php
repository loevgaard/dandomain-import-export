<?php
namespace Loevgaard\DandomainImportExport\Client;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;

trait ClientTrait
{
    /**
     * @var ClientInterface
     */
    protected $client;

    public function setClient(ClientInterface $client)
    {
        $this->client = $client;

        return $this;
    }

    public function getClient() : ClientInterface
    {
        if (!$this->client) {
            $this->client = new Client();
        }

        return $this->client;
    }
}
