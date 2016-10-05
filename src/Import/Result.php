<?php
namespace Dandomain\Import;

class Result {
    /**
     * This is the raw XML
     *
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

    public function __construct($xml)
    {
        $this->xml          = $xml;

        $xmlElement         = new \SimpleXMLElement($xml);
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

    /**
     * @return string
     */
    public function getXml()
    {
        return $this->xml;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return \DateInterval
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return int
     */
    public function getCompleted()
    {
        return $this->completed;
    }

    /**
     * @return int
     */
    public function getFailed()
    {
        return $this->failed;
    }

    /**
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @return int
     */
    public function getModified()
    {
        return $this->modified;
    }
}