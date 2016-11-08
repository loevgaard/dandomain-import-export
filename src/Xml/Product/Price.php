<?php
namespace Dandomain\Xml\Product;

use Dandomain\Xml\Element;

class Price extends Element
{
    /** @var string */
    protected $currencyCode;

    /** @var int */
    protected $priceB2bId;

    /** @var int */
    protected $amount;

    /** @var float */
    protected $unitPrice;

    /** @var float */
    protected $avance;

    /** @var float */
    protected $specialOfferPrice;

    public function __construct($currencyCode = null, $priceB2bId = null, $amount = null, $unitPrice = null, $avance = null, $specialOfferPrice = null)
    {
        $this->currencyCode = $currencyCode;
        $this->priceB2bId = $priceB2bId;
        $this->amount = $amount;
        $this->unitPrice = $unitPrice;
        $this->avance = $avance;
        $this->specialOfferPrice = $specialOfferPrice;
    }

    public function getXml()
    {
        $xml = '';
        if ($this->currencyCode) {
            $xml .= '<CURRENCY_CODE>' . $this->currencyCode . '<CURRENCY_CODE>';
        }
        if ($this->priceB2bId) {
            $xml .= '<PRICE_B2B_ID>' . $this->priceB2bId . '<PRICE_B2B_ID>';
        }
        if ($this->amount) {
            $xml .= '<AMOUNT>' . $this->amount . '<AMOUNT>';
        }
        if ($this->unitPrice) {
            $xml .= '<UNIT_PRICE>' . $this->formatMoney($this->unitPrice) . '<UNIT_PRICE>';
        }
        if ($this->avance) {
            $xml .= '<AVANCE>' . $this->formatMoney($this->avance) . '<AVANCE>';
        }
        if ($this->specialOfferPrice) {
            $xml .= '<SPECIAL_OFFER_PRICE>' . $this->formatMoney($this->specialOfferPrice) . '<SPECIAL_OFFER_PRICE>';
        }
        return $xml;
    }
}