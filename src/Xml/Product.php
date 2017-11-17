<?php
namespace Loevgaard\DandomainImportExport\Xml;

use Loevgaard\DandomainImportExport\Xml\Product\Advanced;
use Loevgaard\DandomainImportExport\Xml\Product\Category;
use Loevgaard\DandomainImportExport\Xml\Product\CustomFields;
use Loevgaard\DandomainImportExport\Xml\Product\Description;
use Loevgaard\DandomainImportExport\Xml\Product\General;
use Loevgaard\DandomainImportExport\Xml\Product\Info;
use Loevgaard\DandomainImportExport\Xml\Product\Manufacturer;
use Loevgaard\DandomainImportExport\Xml\Product\Media;
use Loevgaard\DandomainImportExport\Xml\Product\Price;
use Loevgaard\DandomainImportExport\Xml\Product\Stock;

class Product extends Element
{
    /** @var General */
    protected $general;

    /** @var Advanced */
    protected $advanced;

    /** @var Stock */
    protected $stock;

    /** @var Info */
    protected $info;

    /** @var Description */
    protected $description;

    /** @var CustomFields */
    protected $customFields;

    /** @var Category[] */
    protected $categories;

    /** @var Price[] */
    protected $prices;

    /** @var Manufacturer[] */
    protected $manufacturers;

    /** @var Media[] */
    protected $media;

    public function __construct(General $general, Advanced $advanced = null, Stock $stock = null, Info $info = null, Description $description = null, CustomFields $customFields = null, $categories = null, $prices = null, $manufacturers = null, $media = null)
    {
        $this->general = $general;
        $this->advanced = $advanced;
        $this->stock = $stock;
        $this->info = $info;
        $this->description = $description;
        $this->customFields = $customFields;
        $this->setCategories($categories);
        $this->setPrices($prices);
        $this->setManufacturers($manufacturers);
        $this->setMedia($media);
    }

    public function getXml()
    {
        $xml = '<PRODUCT>';
        $xml .= '<GENERAL>' . $this->general->getXml() . '</GENERAL>';
        if ($this->advanced) {
            $xml .= '<ADVANCED>' . $this->advanced->getXml() . '</ADVANCED>';
        }
        if ($this->stock) {
            $xml .= '<STOCK>' . $this->stock->getXml() . '</STOCK>';
        }
        if ($this->info) {
            $xml .= '<INFO>' . $this->info->getXml() . '</INFO>';
        }
        if ($this->description) {
            $xml .= '<DESCRIPTION>' . $this->description->getXml() . '</DESCRIPTION>';
        }
        if ($this->customFields) {
            $xml .= '<CUSTOM_FIELDS>' . $this->customFields->getXml() . '</CUSTOM_FIELDS>';
        }
        if ($this->categories && count($this->categories)) {
            $xml .= '<PRODUCT_CATEGORIES>';
            foreach ($this->categories as $category) {
                $xml .= $category->getXml();
            }
            $xml .= '</PRODUCT_CATEGORIES>';
        }
        if ($this->prices && count($this->prices)) {
            $xml .= '<PRICES>';
            foreach ($this->prices as $price) {
                $xml .= $price->getXml();
            }
            $xml .= '</PRICES>';
        }
        if ($this->manufacturers && count($this->manufacturers)) {
            $xml .= '<MANUFACTURERS>';
            foreach ($this->manufacturers as $manufacturer) {
                $xml .= $manufacturer->getXml();
            }
            $xml .= '</MANUFACTURERS>';
        }
        if ($this->media && count($this->media)) {
            $xml .= '<PRODUCT_MEDIA>';
            foreach ($this->media as $media) {
                $xml .= $media->getXml();
            }
            $xml .= '</PRODUCT_MEDIA>';
        }
        $xml .= '</PRODUCT>';
        return $xml;
    }

    /**
     * @return General
     */
    public function getGeneral()
    {
        return $this->general;
    }

    /**
     * @param General $general
     * @return Product
     */
    public function setGeneral($general)
    {
        $this->general = $general;
        return $this;
    }

    /**
     * @return Advanced
     */
    public function getAdvanced()
    {
        return $this->advanced;
    }

    /**
     * @param Advanced $advanced
     * @return Product
     */
    public function setAdvanced($advanced)
    {
        $this->advanced = $advanced;
        return $this;
    }

    /**
     * @return Stock
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * @param Stock $stock
     * @return Product
     */
    public function setStock($stock)
    {
        $this->stock = $stock;
        return $this;
    }

    /**
     * @return Info
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param Info $info
     * @return Product
     */
    public function setInfo($info)
    {
        $this->info = $info;
        return $this;
    }

    /**
     * @return Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param Description $description
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return CustomFields
     */
    public function getCustomFields()
    {
        return $this->customFields;
    }

    /**
     * @param CustomFields $customFields
     * @return Product
     */
    public function setCustomFields($customFields)
    {
        $this->customFields = $customFields;
        return $this;
    }

    /**
     * Adds a category element to the product
     *
     * @param Category $category
     * @return Product
     */
    public function addCategory(Category $category)
    {
        $this->categories[] = $category;
        return $this;
    }

    /**
     * @return Category[]
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category[] $categories
     * @return Product
     */
    public function setCategories(array $categories = [])
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * Adds a price element to the product
     *
     * @param Price $price
     * @return Product
     */
    public function addPrice(Price $price)
    {
        $this->prices[] = $price;
        return $this;
    }

    /**
     * @return Price[]
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @param Price[] $prices
     * @return Product
     */
    public function setPrices(array $prices = [])
    {
        $this->prices = $prices;
        return $this;
    }

    /**
     * Adds a manufacturer element to the product
     *
     * @param Manufacturer $manufacturer
     * @return Product
     */
    public function addManufacturer(Manufacturer $manufacturer)
    {
        $this->manufacturers[] = $manufacturer;
        return $this;
    }

    /**
     * @return Manufacturer[]
     */
    public function getManufacturers()
    {
        return $this->manufacturers;
    }

    /**
     * @param Manufacturer[] $manufacturers
     * @return Product
     */
    public function setManufacturers(array $manufacturers = [])
    {
        $this->manufacturers = $manufacturers;
        return $this;
    }

    /**
     * @return Media[]
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * @param Media[] $media
     * @return Product
     */
    public function setMedia(array $media = [])
    {
        $this->media = $media;
        return $this;
    }
}
