<?php
namespace Dandomain\Xml;

class Price extends Element {
    protected $productNumber;
    protected $currency;
    protected $b2bId;
    protected $amount;
    protected $costPrice;
    protected $unitPrice;
    protected $profit;
    protected $specialOfferPrice;
    protected $languageId;
    protected $productName;
    protected $retailPrice;

    public function __construct($productNumber = '', $currency = '', $b2bId = 0, $amount = 1, $costPrice = '', $unitPrice = '', $profit = '', $specialOfferPrice = '', $languageId = '', $productName = '', $retailPrice = '')
    {
        $this->productNumber        = $productNumber;
        $this->currency             = $currency;
        $this->b2bId                = $b2bId;
        $this->amount               = $amount;
        $this->costPrice            = $costPrice;
        $this->unitPrice            = $unitPrice;
        $this->profit               = $profit;
        $this->specialOfferPrice    = $specialOfferPrice;
        $this->languageId           = $languageId;
        $this->productName          = $productName;
        $this->retailPrice          = $retailPrice;
    }

    public function getXml()
    {
        $xml = '<PRICE>';
        if($this->productNumber) {
            $xml .= "<PRICE_PROD_NUM>{$this->productNumber}</PRICE_PROD_NUM>";
        }
        if($this->currency) {
            $xml .= "<CURRENCY_CODE>{$this->currency}</CURRENCY_CODE>";
        }
        if($this->b2bId) {
            $xml .= "<PRICE_B2B_ID>{$this->b2bId}</PRICE_B2B_ID>";
        }
        if($this->amount) {
            $xml .= "<AMOUNT>{$this->amount}</AMOUNT>";
        }
        if($this->costPrice) {
            $xml .= "<PROD_COST_PRICE>{$this->costPrice}</PROD_COST_PRICE>";
        }
        if($this->unitPrice) {
            $xml .= "<UNIT_PRICE>{$this->unitPrice}</UNIT_PRICE>";
        }
        if($this->profit) {
            $xml .= "<AVANCE>{$this->profit}</AVANCE>";
        }
        if($this->specialOfferPrice) {
            $xml .= "<SPECIAL_OFFER_PRICE>{$this->specialOfferPrice}</SPECIAL_OFFER_PRICE>";
        }
        if($this->languageId) {
            $xml .= "<LANGUAGE_ID>{$this->languageId}</LANGUAGE_ID>";
        }
        if($this->productName) {
            $xml .= "<PROD_NAME>{$this->productName}</PROD_NAME>";
        }
        if($this->retailPrice) {
            $xml .= "<PROD_RETAIL_PRICE>{$this->retailPrice}</PROD_RETAIL_PRICE>";
        }
        $xml .= '</PRICE>';
        return $xml;
    }

    /**
     * @return string
     */
    public function getProductNumber()
    {
        return $this->productNumber;
    }

    /**
     * @param string $productNumber
     * @return Price
     */
    public function setProductNumber($productNumber)
    {
        $this->productNumber = $productNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param string $currency
     * @return Price
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
        return $this;
    }

    /**
     * @return int
     */
    public function getB2bId()
    {
        return $this->b2bId;
    }

    /**
     * @param int $b2bId
     * @return Price
     */
    public function setB2bId($b2bId)
    {
        $this->b2bId = $b2bId;
        return $this;
    }

    /**
     * @return int
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     * @return Price
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getCostPrice()
    {
        return $this->costPrice;
    }

    /**
     * @param string $costPrice
     * @return Price
     */
    public function setCostPrice($costPrice)
    {
        $this->costPrice = $costPrice;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnitPrice()
    {
        return $this->unitPrice;
    }

    /**
     * @param string $unitPrice
     * @return Price
     */
    public function setUnitPrice($unitPrice)
    {
        $this->unitPrice = $unitPrice;
        return $this;
    }

    /**
     * @return string
     */
    public function getProfit()
    {
        return $this->profit;
    }

    /**
     * @param string $profit
     * @return Price
     */
    public function setProfit($profit)
    {
        $this->profit = $profit;
        return $this;
    }

    /**
     * @return string
     */
    public function getSpecialOfferPrice()
    {
        return $this->specialOfferPrice;
    }

    /**
     * @param string $specialOfferPrice
     * @return Price
     */
    public function setSpecialOfferPrice($specialOfferPrice)
    {
        $this->specialOfferPrice = $specialOfferPrice;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @param string $languageId
     * @return Price
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;
        return $this;
    }

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->productName;
    }

    /**
     * @param string $productName
     * @return Price
     */
    public function setProductName($productName)
    {
        $this->productName = $productName;
        return $this;
    }

    /**
     * @return string
     */
    public function getRetailPrice()
    {
        return $this->retailPrice;
    }

    /**
     * @param string $retailPrice
     * @return Price
     */
    public function setRetailPrice($retailPrice)
    {
        $this->retailPrice = $retailPrice;
        return $this;
    }
}