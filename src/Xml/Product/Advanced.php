<?php
namespace Loevgaard\DandomainImportExport\Xml\Product;

use Loevgaard\DandomainImportExport\Xml\Element;

class Advanced extends Element
{
    /**
     * @var string
     */
    protected $vendorNumber;

    /**
     * @var int
     */
    protected $unitId;

    /**
     * @var int
     */
    protected $typeId;

    /**
     * @var string
     */
    protected $hidden;

    /**
     * @var string
     */
    protected $new;

    /**
     * @var string
     */
    protected $newPeriodId;

    /**
     * @var string
     */
    protected $frontPage;

    /**
     * @var string
     */
    protected $variantMasterId;

    /**
     * @var string
     */
    protected $mailListExport;

    /**
     * @var string
     */
    protected $topListHidden;

    /**
     * @var int
     */
    protected $internalId;

    /**
     * @var string
     */
    protected $uniqueUrlName;

    /**
     * @var string
     */
    protected $barcodeNumber;

    /**
     * @var string
     */
    protected $googleFeedCategory;

    /**
     * @var string
     */
    protected $directLink;

    public function getXml() : string
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
        if ($this->mailListExport) {
            $xml .= '<MAILLIST_EXPORT>' . $this->mailListExport . '</MAILLIST_EXPORT>';
        }
        if ($this->topListHidden) {
            $xml .= '<TOPLIST_HIDDEN>' . $this->topListHidden . '</TOPLIST_HIDDEN>';
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
    public function getVendorNumber() : string
    {
        return $this->vendorNumber;
    }

    /**
     * @param string $vendorNumber
     * @return Advanced
     */
    public function setVendorNumber($vendorNumber) : Advanced
    {
        $this->vendorNumber = $vendorNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getUnitId() : int
    {
        return $this->unitId;
    }

    /**
     * @param int $unitId
     * @return Advanced
     */
    public function setUnitId($unitId) : Advanced
    {
        $this->unitId = $unitId;
        return $this;
    }

    /**
     * @return int
     */
    public function getTypeId() : int
    {
        return $this->typeId;
    }

    /**
     * @param int $typeId
     * @return Advanced
     */
    public function setTypeId($typeId) : Advanced
    {
        $this->typeId = $typeId;
        return $this;
    }

    /**
     * @return string
     */
    public function getHidden() : string
    {
        return $this->hidden;
    }

    /**
     * @param string $hidden
     * @return Advanced
     */
    public function setHidden($hidden) : Advanced
    {
        $this->hidden = $hidden;
        return $this;
    }

    /**
     * @return string
     */
    public function getNew() : string
    {
        return $this->new;
    }

    /**
     * @param string $new
     * @return Advanced
     */
    public function setNew($new) : Advanced
    {
        $this->new = $new;
        return $this;
    }

    /**
     * @return string
     */
    public function getNewPeriodId() : string
    {
        return $this->newPeriodId;
    }

    /**
     * @param string $newPeriodId
     * @return Advanced
     */
    public function setNewPeriodId($newPeriodId) : Advanced
    {
        $this->newPeriodId = $newPeriodId;
        return $this;
    }

    /**
     * @return string
     */
    public function getFrontPage() : string
    {
        return $this->frontPage;
    }

    /**
     * @param string $frontPage
     * @return Advanced
     */
    public function setFrontPage($frontPage) : Advanced
    {
        $this->frontPage = $frontPage;
        return $this;
    }

    /**
     * @return string
     */
    public function getVariantMasterId() : string
    {
        return $this->variantMasterId;
    }

    /**
     * @param string $variantMasterId
     * @return Advanced
     */
    public function setVariantMasterId($variantMasterId) : Advanced
    {
        $this->variantMasterId = $variantMasterId;
        return $this;
    }

    /**
     * @return string
     */
    public function getMailListExport() : string
    {
        return $this->mailListExport;
    }

    /**
     * @param string $mailListExport
     * @return Advanced
     */
    public function setMailListExport($mailListExport) : Advanced
    {
        $this->mailListExport = $mailListExport;
        return $this;
    }

    /**
     * @return string
     */
    public function getTopListHidden() : string
    {
        return $this->topListHidden;
    }

    /**
     * @param string $topListHidden
     * @return Advanced
     */
    public function setTopListHidden($topListHidden) : Advanced
    {
        $this->topListHidden = $topListHidden;
        return $this;
    }

    /**
     * @return int
     */
    public function getInternalId() : string
    {
        return $this->internalId;
    }

    /**
     * @param int $internalId
     * @return Advanced
     */
    public function setInternalId($internalId) : Advanced
    {
        $this->internalId = $internalId;
        return $this;
    }

    /**
     * @return string
     */
    public function getUniqueUrlName() : string
    {
        return $this->uniqueUrlName;
    }

    /**
     * @param string $uniqueUrlName
     * @return Advanced
     */
    public function setUniqueUrlName($uniqueUrlName) : Advanced
    {
        $this->uniqueUrlName = $uniqueUrlName;
        return $this;
    }

    /**
     * @return string
     */
    public function getBarcodeNumber() : string
    {
        return $this->barcodeNumber;
    }

    /**
     * @param string $barcodeNumber
     * @return Advanced
     */
    public function setBarcodeNumber($barcodeNumber) : Advanced
    {
        $this->barcodeNumber = $barcodeNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getGoogleFeedCategory() : string
    {
        return $this->googleFeedCategory;
    }

    /**
     * @param string $googleFeedCategory
     * @return Advanced
     */
    public function setGoogleFeedCategory($googleFeedCategory) : Advanced
    {
        $this->googleFeedCategory = $googleFeedCategory;
        return $this;
    }

    /**
     * @return string
     */
    public function getDirectLink() : string
    {
        return $this->directLink;
    }

    /**
     * @param string $directLink
     * @return Advanced
     */
    public function setDirectLink($directLink) : Advanced
    {
        $this->directLink = $directLink;
        return $this;
    }
}
