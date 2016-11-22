<?php
namespace Dandomain\Xml\Product;

use Dandomain\Xml\Element;

class Advanced extends Element
{
    /** @var string */
    protected $vendorNumber;

    /** @var int */
    protected $unitId;

    /** @var int */
    protected $typeId;

    /** @var string */
    protected $hidden;

    /** @var string */
    protected $new;

    /** @var string */
    protected $newPeriodId;

    /** @var string */
    protected $frontPage;

    /** @var string */
    protected $variantMasterId;

    /** @var string */
    protected $maillistExport;

    /** @var string */
    protected $toplistHidden;

    /** @var int */
    protected $internalId;

    /** @var string */
    protected $uniqueUrlName;

    /** @var string */
    protected $barcodeNumber;

    /** @var string */
    protected $googleFeedCategory;

    /** @var string */
    protected $directLink;

    public function __construct($vendorNumber = null, $unitId = null, $typeId = null, $hidden = null, $new = null, $newPeriodId = null, $frontPage = null, $variantMasterId = null, $maillistExport = null, $toplistHidden = null, $internalId = null, $uniqueUrlName = null, $barcodeNumber = null, $googleFeedCategory = null, $directLink = null)
    {
        $this->vendorNumber = $vendorNumber;
        $this->unitId = $unitId;
        $this->typeId = $typeId;
        $this->hidden = $hidden;
        $this->new = $new;
        $this->newPeriodId = $newPeriodId;
        $this->frontPage = $frontPage;
        $this->variantMasterId = $variantMasterId;
        $this->maillistExport = $maillistExport;
        $this->toplistHidden = $toplistHidden;
        $this->internalId = $internalId;
        $this->uniqueUrlName = $uniqueUrlName;
        $this->barcodeNumber = $barcodeNumber;
        $this->googleFeedCategory = $googleFeedCategory;
        $this->directLink = $directLink;
    }

    public function getXml()
    {
        $xml = '';
        if ($this->vendorNumber) {
            $xml .= '<VENDOR_NUM>' . $this->vendorNumber . '</VENDOR_NUM>';
        }
        if ($this->unitId) {
            $xml .= '<PROD_UNIT_ID>' . $this->unitId . '</PROD_UNIT_ID>';
        }
        if ($this->typeId) {
            $xml .= '<PROD_TYPE_ID>' . $this->typeId . '</PROD_TYPE_ID>';
        }
        if ($this->hidden) {
            $xml .= '<PROD_HIDDEN>' . $this->hidden . '</PROD_HIDDEN>';
        }
        if ($this->new) {
            $xml .= '<PROD_NEW>' . $this->new . '</PROD_NEW>';
        }
        if ($this->newPeriodId) {
            $xml .= '<PROD_NEW_PERIOD_ID>' . $this->newPeriodId . '</PROD_NEW_PERIOD_ID>';
        }
        if ($this->frontPage) {
            $xml .= '<PROD_FRONT_PAGE>' . $this->frontPage . '</PROD_FRONT_PAGE>';
        }
        if ($this->variantMasterId) {
            $xml .= '<PROD_VAR_MASTER_ID>' . $this->variantMasterId . '</PROD_VAR_MASTER_ID>';
        }
        if ($this->maillistExport) {
            $xml .= '<MAILLIST_EXPORT>' . $this->maillistExport . '</MAILLIST_EXPORT>';
        }
        if ($this->toplistHidden) {
            $xml .= '<TOPLIST_HIDDEN>' . $this->toplistHidden . '</TOPLIST_HIDDEN>';
        }
        if ($this->internalId) {
            $xml .= '<INTERNAL_ID>' . $this->internalId . '</INTERNAL_ID>';
        }
        if ($this->uniqueUrlName) {
            $xml .= '<PROD_UNIQUE_URL_NAME>' . $this->uniqueUrlName . '</PROD_UNIQUE_URL_NAME>';
        }
        if ($this->barcodeNumber) {
            $xml .= '<PROD_BARCODE_NUMBER>' . $this->barcodeNumber . '</PROD_BARCODE_NUMBER>';
        }
        if ($this->googleFeedCategory) {
            $xml .= '<PROD_GOOGLE_FEED_CATEGORY>' . $this->googleFeedCategory . '</PROD_GOOGLE_FEED_CATEGORY>';
        }
        if ($this->directLink) {
            $xml .= '<DIRECT_LINK>' . $this->directLink . '</DIRECT_LINK>';
        }
        return $xml;
    }

    /**
     * @return string
     */
    public function getVendorNumber()
    {
        return $this->vendorNumber;
    }

    /**
     * @param string $vendorNumber
     * @return Advanced
     */
    public function setVendorNumber($vendorNumber)
    {
        $this->vendorNumber = $vendorNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnitId()
    {
        return $this->unitId;
    }

    /**
     * @param int $unitId
     * @return Advanced
     */
    public function setUnitId($unitId)
    {
        $this->unitId = $unitId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     * @return Advanced
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;
        return $this;
    }

    /**
     * @return string
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * @param string $hidden
     * @return Advanced
     */
    public function setHidden($hidden)
    {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * @return string
     */
    public function getNew()
    {
        return $this->new;
    }

    /**
     * @param string $new
     * @return Advanced
     */
    public function setNew($new)
    {
        $this->new = $new;
        return $this;
    }

    /**
     * @return string
     */
    public function getNewPeriodId()
    {
        return $this->newPeriodId;
    }

    /**
     * @param string $newPeriodId
     * @return Advanced
     */
    public function setNewPeriodId($newPeriodId)
    {
        $this->newPeriodId = $newPeriodId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrontPage()
    {
        return $this->frontPage;
    }

    /**
     * @param string $frontPage
     * @return Advanced
     */
    public function setFrontPage($frontPage)
    {
        $this->frontPage = $frontPage;
        return $this;
    }

    /**
     * @return string
     */
    public function getVariantMasterId()
    {
        return $this->variantMasterId;
    }

    /**
     * @param string $variantMasterId
     * @return Advanced
     */
    public function setVariantMasterId($variantMasterId)
    {
        $this->variantMasterId = $variantMasterId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMaillistExport()
    {
        return $this->maillistExport;
    }

    /**
     * @param string $maillistExport
     * @return Advanced
     */
    public function setMaillistExport($maillistExport)
    {
        $this->maillistExport = $maillistExport;
        return $this;
    }

    /**
     * @return string
     */
    public function getToplistHidden()
    {
        return $this->toplistHidden;
    }

    /**
     * @param string $toplistHidden
     * @return Advanced
     */
    public function setToplistHidden($toplistHidden)
    {
        $this->toplistHidden = $toplistHidden;
        return $this;
    }

    /**
     * @return int
     */
    public function getInternalId()
    {
        return $this->internalId;
    }

    /**
     * @param int $internalId
     * @return Advanced
     */
    public function setInternalId($internalId)
    {
        $this->internalId = $internalId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUniqueUrlName()
    {
        return $this->uniqueUrlName;
    }

    /**
     * @param string $uniqueUrlName
     * @return Advanced
     */
    public function setUniqueUrlName($uniqueUrlName)
    {
        $this->uniqueUrlName = $uniqueUrlName;
        return $this;
    }

    /**
     * @return string
     */
    public function getBarcodeNumber()
    {
        return $this->barcodeNumber;
    }

    /**
     * @param string $barcodeNumber
     * @return Advanced
     */
    public function setBarcodeNumber($barcodeNumber)
    {
        $this->barcodeNumber = $barcodeNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getGoogleFeedCategory()
    {
        return $this->googleFeedCategory;
    }

    /**
     * @param string $googleFeedCategory
     * @return Advanced
     */
    public function setGoogleFeedCategory($googleFeedCategory)
    {
        $this->googleFeedCategory = $googleFeedCategory;
        return $this;
    }

    /**
     * @return string
     */
    public function getDirectLink()
    {
        return $this->directLink;
    }

    /**
     * @param string $directLink
     * @return Advanced
     */
    public function setDirectLink($directLink)
    {
        $this->directLink = $directLink;
        return $this;
    }
}