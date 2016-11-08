<?php
namespace Dandomain\Xml\Product;

use Dandomain\Xml\Element;

class General extends Element
{
    /** @var string */
    protected $productNumber;

    /** @var int */
    protected $languageId;

    /** @var string */
    protected $name;

    /** @var string */
    protected $edbpriserNumber;

    /** @var string */
    protected $weight;

    /** @var int */
    protected $sort;

    /** @var int */
    protected $minBuy;

    /** @var int */
    protected $minBuyB2b;

    /** @var int */
    protected $maxBuy;

    /** @var string */
    protected $photoUrl;

    /** @var string */
    protected $fileUrl;

    /** @var string */
    protected $pdfUrl;

    /** @var string */
    protected $pdfUrl2;

    /** @var string */
    protected $pdfUrl3;

    /** @var string */
    protected $retailPrice;

    /** @var string */
    protected $costPrice;

    /** @var string */
    protected $variantMaster;

    /** @var string */
    protected $notes;

    /** @var string */
    protected $pictureAltText;

    public function __construct($productNumber, $languageId, $name = null, $edbpriserNumber = null, $weight = null, $sort = null, $minBuy = null, $minBuyB2b = null, $maxBuy = null, $photoUrl = null, $fileUrl = null, $pdfUrl = null, $pdfUrl2 = null, $pdfUrl3 = null, $retailPrice = null, $costPrice = null, $variantMaster = null, $notes = null, $pictureAltText = null)
    {
        $this->productNumber = $productNumber;
        $this->languageId = $languageId;
        $this->name = $name;
        $this->edbpriserNumber = $edbpriserNumber;
        $this->weight = $weight;
        $this->sort = $sort;
        $this->minBuy = $minBuy;
        $this->minBuyB2b = $minBuyB2b;
        $this->maxBuy = $maxBuy;
        $this->photoUrl = $photoUrl;
        $this->fileUrl = $fileUrl;
        $this->pdfUrl = $pdfUrl;
        $this->pdfUrl2 = $pdfUrl2;
        $this->pdfUrl3 = $pdfUrl3;
        $this->retailPrice = $retailPrice;
        $this->costPrice = $costPrice;
        $this->variantMaster = $variantMaster;
        $this->notes = $notes;
        $this->pictureAltText = $pictureAltText;
    }

    public function getXml()
    {
        $xml = '';
        if ($this->productNumber) {
            $xml .= '<PROD_NUM>' . $this->productNumber . '<PROD_NUM>';
        }
        if ($this->languageId) {
            $xml .= '<LANGUAGE_ID>' . $this->languageId . '<LANGUAGE_ID>';
        }
        if ($this->name) {
            $xml .= '<PROD_NAME>' . $this->name . '<PROD_NAME>';
        }
        if ($this->edbpriserNumber) {
            $xml .= '<EDBPriser_NUM>' . $this->edbpriserNumber . '<EDBPriser_NUM>';
        }
        if ($this->weight) {
            $xml .= '<PROD_WEIGHT>' . $this->weight . '<PROD_WEIGHT>';
        }
        if ($this->sort) {
            $xml .= '<PROD_SORT>' . $this->sort . '<PROD_SORT>';
        }
        if ($this->minBuy) {
            $xml .= '<PROD_MIN_BUY>' . $this->minBuy . '<PROD_MIN_BUY>';
        }
        if ($this->minBuyB2b) {
            $xml .= '<PROD_MIN_BUY_B2B>' . $this->minBuyB2b . '<PROD_MIN_BUY_B2B>';
        }
        if ($this->maxBuy) {
            $xml .= '<PROD_MAX_BUY>' . $this->maxBuy . '<PROD_MAX_BUY>';
        }
        if ($this->photoUrl) {
            $xml .= '<PROD_PHOTO_URL>' . $this->photoUrl . '<PROD_PHOTO_URL>';
        }
        if ($this->fileUrl) {
            $xml .= '<PROD_FILE_URL>' . $this->fileUrl . '<PROD_FILE_URL>';
        }
        if ($this->pdfUrl) {
            $xml .= '<PROD_PDF_URL>' . $this->pdfUrl . '<PROD_PDF_URL>';
        }
        if ($this->pdfUrl2) {
            $xml .= '<PROD_PDF_URL_2>' . $this->pdfUrl2 . '<PROD_PDF_URL_2>';
        }
        if ($this->pdfUrl3) {
            $xml .= '<PROD_PDF_URL_3>' . $this->pdfUrl3 . '<PROD_PDF_URL_3>';
        }
        if ($this->retailPrice) {
            $xml .= '<PROD_RETAIL_PRICE>' . $this->retailPrice . '<PROD_RETAIL_PRICE>';
        }
        if ($this->costPrice) {
            $xml .= '<PROD_COST_PRICE>' . $this->costPrice . '<PROD_COST_PRICE>';
        }
        if ($this->variantMaster) {
            $xml .= '<PROD_VAR_MASTER>' . $this->variantMaster . '<PROD_VAR_MASTER>';
        }
        if ($this->notes) {
            $xml .= '<PROD_NOTES>' . $this->notes . '<PROD_NOTES>';
        }
        if ($this->pictureAltText) {
            $xml .= '<PROD_PICTURE_ALT_TEXT>' . $this->pictureAltText . '<PROD_PICTURE_ALT_TEXT>';
        }
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
     * @return General
     */
    public function setProductNumber($productNumber)
    {
        $this->productNumber = $productNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @param int $languageId
     * @return General
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return General
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getEdbpriserNumber()
    {
        return $this->edbpriserNumber;
    }

    /**
     * @param string $edbpriserNumber
     * @return General
     */
    public function setEdbpriserNumber($edbpriserNumber)
    {
        $this->edbpriserNumber = $edbpriserNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param string $weight
     * @return General
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
        return $this;
    }

    /**
     * @return int
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param int $sort
     * @return General
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinBuy()
    {
        return $this->minBuy;
    }

    /**
     * @param int $minBuy
     * @return General
     */
    public function setMinBuy($minBuy)
    {
        $this->minBuy = $minBuy;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinBuyB2b()
    {
        return $this->minBuyB2b;
    }

    /**
     * @param int $minBuyB2b
     * @return General
     */
    public function setMinBuyB2b($minBuyB2b)
    {
        $this->minBuyB2b = $minBuyB2b;
        return $this;
    }

    /**
     * @return int
     */
    public function getMaxBuy()
    {
        return $this->maxBuy;
    }

    /**
     * @param int $maxBuy
     * @return General
     */
    public function setMaxBuy($maxBuy)
    {
        $this->maxBuy = $maxBuy;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhotoUrl()
    {
        return $this->photoUrl;
    }

    /**
     * @param string $photoUrl
     * @return General
     */
    public function setPhotoUrl($photoUrl)
    {
        $this->photoUrl = $photoUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getFileUrl()
    {
        return $this->fileUrl;
    }

    /**
     * @param string $fileUrl
     * @return General
     */
    public function setFileUrl($fileUrl)
    {
        $this->fileUrl = $fileUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getPdfUrl()
    {
        return $this->pdfUrl;
    }

    /**
     * @param string $pdfUrl
     * @return General
     */
    public function setPdfUrl($pdfUrl)
    {
        $this->pdfUrl = $pdfUrl;
        return $this;
    }

    /**
     * @return string
     */
    public function getPdfUrl2()
    {
        return $this->pdfUrl2;
    }

    /**
     * @param string $pdfUrl2
     * @return General
     */
    public function setPdfUrl2($pdfUrl2)
    {
        $this->pdfUrl2 = $pdfUrl2;
        return $this;
    }

    /**
     * @return string
     */
    public function getPdfUrl3()
    {
        return $this->pdfUrl3;
    }

    /**
     * @param string $pdfUrl3
     * @return General
     */
    public function setPdfUrl3($pdfUrl3)
    {
        $this->pdfUrl3 = $pdfUrl3;
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
     * @return General
     */
    public function setRetailPrice($retailPrice)
    {
        $this->retailPrice = $retailPrice;
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
     * @return General
     */
    public function setCostPrice($costPrice)
    {
        $this->costPrice = $costPrice;
        return $this;
    }

    /**
     * @return string
     */
    public function getVariantMaster()
    {
        return $this->variantMaster;
    }

    /**
     * @param string $variantMaster
     * @return General
     */
    public function setVariantMaster($variantMaster)
    {
        $this->variantMaster = $variantMaster;
        return $this;
    }

    /**
     * @return string
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param string $notes
     * @return General
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
        return $this;
    }

    /**
     * @return string
     */
    public function getPictureAltText()
    {
        return $this->pictureAltText;
    }

    /**
     * @param string $pictureAltText
     * @return General
     */
    public function setPictureAltText($pictureAltText)
    {
        $this->pictureAltText = $pictureAltText;
        return $this;
    }
}