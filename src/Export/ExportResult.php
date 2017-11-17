<?php
namespace Loevgaard\DandomainImportExport\Import;

use Loevgaard\DandomainImportExport\Export\ExportResultInterface;
use Loevgaard\DandomainImportExport\ImportExport\ResultInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ExportResult implements ExportResultInterface
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ResponseInterface
     */
    protected $response;


    public function getRequest(): ?RequestInterface
    {
        return $this->request;
    }

    public function setRequest(RequestInterface $request) : ResultInterface
    {
        $this->request = $request;

        return $this;
    }

    public function getResponse(): ?ResponseInterface
    {
        return $this->response;
    }

    public function setResponse(ResponseInterface $response) : ResultInterface
    {
        $this->response = $response;

        return $this;
    }
}
