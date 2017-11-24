<?php
namespace Loevgaard\DandomainImportExport\Export;

use Loevgaard\DandomainImportExport\ImportExport\ResultInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface ExportResultInterface extends ResultInterface
{
    /**
     * @return RequestInterface
     */
    public function getExportRequest(): ?RequestInterface;

    /**
     * @param RequestInterface $exportRequest
     * @return ExportResultInterface
     */
    public function setExportRequest(RequestInterface $exportRequest) : ExportResultInterface;

    /**
     * @return ResponseInterface
     */
    public function getExportResponse(): ?ResponseInterface;

    /**
     * @param ResponseInterface $exportResponse
     * @return ExportResultInterface
     */
    public function setExportResponse(ResponseInterface $exportResponse) : ExportResultInterface;

    /**
     * @inheritdoc
     */
    public function getRequest(): ?RequestInterface;

    /**
     * @inheritdoc
     */
    public function setRequest(RequestInterface $request) : ResultInterface;

    /**
     * @inheritdoc
     */
    public function getResponse(): ?ResponseInterface;

    /**
     * @inheritdoc
     */
    public function setResponse(ResponseInterface $response) : ResultInterface;

    /**
     * @return string
     */
    public function getFilePath(): ?string;

    /**
     * @param string $filePath
     * @return ExportResultInterface
     */
    public function setFilePath(string $filePath) : ExportResultInterface;
}
