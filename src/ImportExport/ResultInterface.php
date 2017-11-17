<?php
namespace Loevgaard\DandomainImportExport\ImportExport;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface ResultInterface
{
    /**
     * Returns the request. If no request was made, it will return null
     *
     * @return RequestInterface
     */
    public function getRequest() : ?RequestInterface;

    /**
     * Sets the import/export request
     *
     * @param RequestInterface $request
     * @return ResultInterface
     */
    public function setRequest(RequestInterface $request) : ResultInterface;

    /**
     * Returns the response. If no request was made or the request failed, it will return null
     *
     * @return ResponseInterface
     */
    public function getResponse() : ?ResponseInterface;

    /**
     * Sets the import/export response
     *
     * @param ResponseInterface $response
     * @return ResultInterface
     */
    public function setResponse(ResponseInterface $response) : ResultInterface;
}
