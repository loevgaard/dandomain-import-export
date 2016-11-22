<?php
namespace Dandomain\Xml\Product;

use Dandomain\Xml\Element;

class Stock extends Element
{
    /** @var int */
    protected $stockCount;

    /** @var int */
    protected $stockLimit;

    /** @var string */
    protected $delivery;

    /** @var string */
    protected $deliveryNotInStock;

    /** @var string */
    protected $locationNumber;

    public function __construct($stockCount = null, $stockLimit = null, $delivery = null, $deliveryNotInStock = null, $locationNumber = null)
    {
        $this->stockCount = $stockCount;
        $this->stockLimit = $stockLimit;
        $this->delivery = $delivery;
        $this->deliveryNotInStock = $deliveryNotInStock;
        $this->locationNumber = $locationNumber;
    }

    public function getXml()
    {
        $xml = '';
        if ($this->stockCount) {
            $xml .= '<STOCK_COUNT>' . $this->stockCount . '</STOCK_COUNT>';
        }
        if ($this->stockLimit) {
            $xml .= '<STOCK_LIMIT>' . $this->stockLimit . '</STOCK_LIMIT>';
        }
        if ($this->delivery) {
            $xml .= '<PROD_DELIVERY>' . $this->delivery . '</PROD_DELIVERY>';
        }
        if ($this->deliveryNotInStock) {
            $xml .= '<PROD_DELIVERY_NOT_IN_STOCK>' . $this->deliveryNotInStock . '</PROD_DELIVERY_NOT_IN_STOCK>';
        }
        if ($this->locationNumber) {
            $xml .= '<PROD_LOCATION_NUMBER>' . $this->locationNumber . '</PROD_LOCATION_NUMBER>';
        }
        return $xml;
    }

    /**
     * @return int
     */
    public function getStockCount()
    {
        return $this->stockCount;
    }

    /**
     * @param int $stockCount
     * @return Stock
     */
    public function setStockCount($stockCount)
    {
        $this->stockCount = $stockCount;
        return $this;
    }

    /**
     * @return int
     */
    public function getStockLimit()
    {
        return $this->stockLimit;
    }

    /**
     * @param int $stockLimit
     * @return Stock
     */
    public function setStockLimit($stockLimit)
    {
        $this->stockLimit = $stockLimit;
        return $this;
    }

    /**
     * @return string
     */
    public function getDelivery()
    {
        return $this->delivery;
    }

    /**
     * @param string $delivery
     * @return Stock
     */
    public function setDelivery($delivery)
    {
        $this->delivery = $delivery;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryNotInStock()
    {
        return $this->deliveryNotInStock;
    }

    /**
     * @param string $deliveryNotInStock
     * @return Stock
     */
    public function setDeliveryNotInStock($deliveryNotInStock)
    {
        $this->deliveryNotInStock = $deliveryNotInStock;
        return $this;
    }

    /**
     * @return string
     */
    public function getLocationNumber()
    {
        return $this->locationNumber;
    }

    /**
     * @param string $locationNumber
     * @return Stock
     */
    public function setLocationNumber($locationNumber)
    {
        $this->locationNumber = $locationNumber;
        return $this;
    }
}