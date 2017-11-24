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
    protected $exportRequest;

    /**
     * @var ResponseInterface
     */
    protected $exportResponse;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * The file path of the exported file
     *
     * @var string
     */
    protected $filePath;

    /**
     * @return RequestInterface
     */
    public function getExportRequest(): ?RequestInterface
    {
        return $this->exportRequest;
    }

    /**
     * @param RequestInterface $exportRequest
     * @return ExportResultInterface
     */
    public function setExportRequest(RequestInterface $exportRequest) : ExportResultInterface
    {
        $this->exportRequest = $exportRequest;
        return $this;
    }

    /**
     * @return ResponseInterface
     */
    public function getExportResponse(): ?ResponseInterface
    {
        return $this->exportResponse;
    }

    /**
     * @param ResponseInterface $exportResponse
     * @return ExportResultInterface
     */
    public function setExportResponse(ResponseInterface $exportResponse) : ExportResultInterface
    {
        $this->exportResponse = $exportResponse;
        return $this;
    }

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

    /**
     * @return string
     */
    public function getFilePath(): ?string
    {
        return $this->filePath;
    }

    /**
     * @param string $filePath
     * @return ExportResultInterface
     */
    public function setFilePath(string $filePath) : ExportResultInterface
    {
        $this->filePath = $filePath;
        return $this;
    }
}
