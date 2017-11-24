<?php
namespace Loevgaard\DandomainImportExport\Import;

use Loevgaard\DandomainImportExport\ImportExport\ResultInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ImportResult implements ImportResultInterface
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var ResponseInterface
     */
    protected $response;

    /**
     * @var string
     */
    protected $fileUrl;

    /**
     * @var string
     */
    protected $filePath;

    /**
     * @var string
     */
    protected $xml;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var int
     */
    protected $status;

    /**
     * @var \DateInterval
     */
    protected $time;

    /**
     * @var int
     */
    protected $count;

    /**
     * @var int
     */
    protected $completed;

    /**
     * @var int
     */
    protected $failed;

    /**
     * @var int
     */
    protected $created;

    /**
     * @var int
     */
    protected $modified;

    public function parseResponse(ResponseInterface $response) : void
    {
        $this->setResponse($response);

        if ($response->getStatusCode() !== 200) {
            $this->status = 0;
            return;
        }

        $this->xml          = (string)$response->getBody();
        $xmlElement         = new \SimpleXMLElement($this->xml);
        $this->type         = (string)$xmlElement->TYPE;
        $this->status       = (int)$xmlElement->STATUS;
        $this->count        = (int)$xmlElement->COUNT;
        $this->completed    = (int)$xmlElement->COMPLETED;
        $this->failed       = (int)$xmlElement->FAILED;
        $this->created      = (int)$xmlElement->CREATED;
        $this->modified     = (int)$xmlElement->MODIFIED;

        // parse time
        preg_match('/([0-9]+):([0-9]+)/', (string)$xmlElement->TIME, $matches);
        $this->time = new \DateInterval('PT' . $matches[1] . 'H' . $matches[2] . 'M');
    }

    public function wasSuccessful(): bool
    {
        return $this->status === 1;
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

    public function getFileUrl(): string
    {
        return $this->fileUrl;
    }

    public function setFileUrl(string $url): ImportResultInterface
    {
        $this->fileUrl = $url;

        return $this;
    }

    public function getFilePath(): string
    {
        return $this->filePath;
    }

    public function setFilePath(string $path): ImportResultInterface
    {
        $this->filePath = $path;

        return $this;
    }


    /**
     * @inheritdoc
     */
    public function getXml() : string
    {
        return $this->xml;
    }

    /**
     * @inheritdoc
     */
    public function getType() : string
    {
        return $this->type;
    }

    /**
     * @inheritdoc
     */
    public function getStatus() : int
    {
        return $this->status;
    }

    /**
     * @inheritdoc
     */
    public function getTime() : \DateInterval
    {
        return $this->time;
    }

    /**
     * @inheritdoc
     */
    public function getCount() : int
    {
        return $this->count;
    }

    /**
     * @inheritdoc
     */
    public function getCompleted() : int
    {
        return $this->completed;
    }

    /**
     * @inheritdoc
     */
    public function getFailed() : int
    {
        return $this->failed;
    }

    /**
     * @inheritdoc
     */
    public function getCreated() : int
    {
        return $this->created;
    }

    /**
     * @inheritdoc
     */
    public function getModified() : int
    {
        return $this->modified;
    }
}
