<?php
namespace Dandomain\Xml;

use Dandomain\Xml\Product\Advanced;
use Dandomain\Xml\Product\Category;
use Dandomain\Xml\Product\CustomFields;
use Dandomain\Xml\Product\Description;
use Dandomain\Xml\Product\General;
use Dandomain\Xml\Product\Info;
use Dandomain\Xml\Product\Manufacturer;
use Dandomain\Xml\Product\Price;
use Dandomain\Xml\Product\Stock;
use Doctrine\Common\Collections\ArrayCollection;

class Product extends Element {
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

    /** @var ArrayCollection|Category[] */
    protected $categories;

    /** @var ArrayCollection|Price[] */
    protected $prices;

    /** @var ArrayCollection|Manufacturer[] */
    protected $manufacturers;

    public function __construct(General $general, Advanced $advanced = null, Stock $stock = null, Info $info = null, Description $description = null, CustomFields $customFields = null, $categories = null, $prices = null, $manufacturers = null)
    {
        $this->general = $general;
        $this->advanced = $advanced;
        $this->stock = $stock;
        $this->info = $info;
        $this->description = $description;
        $this->customFields = $customFields;
        $this->categories = $categories;
        $this->prices = $prices;
        $this->manufacturers = $manufacturers;
    }

    public function getXml()
    {
        $xml = '<PRODUCT>';
        $xml .= '<GENERAL>' . $this->general->getXml() . '</GENERAL>';
        if($this->advanced) {
            $xml .= '<ADVANCED>' . $this->advanced->getXml() . '</ADVANCED>';
        }
        if($this->stock) {
            $xml .= '<STOCK>' . $this->stock->getXml() . '</STOCK>';
        }
        if($this->info) {
            $xml .= '<INFO>' . $this->info->getXml() . '</INFO>';
        }
        if($this->description) {
            $xml .= '<DESCRIPTION>' . $this->description->getXml() . '</DESCRIPTION>';
        }
        if($this->customFields) {
            $xml .= '<CUSTOM_FIELDS>' . $this->customFields->getXml() . '</CUSTOM_FIELDS>';
        }
        if($this->categories && !empty($this->categories)) {
            $xml .= '<PRODUCT_CATEGORIES>';
            foreach ($this->categories as $category) {
                $xml .= $category->getXml();
            }
            $xml .= '</PRODUCT_CATEGORIES>';
        }
        if($this->prices && !empty($this->prices)) {
            $xml .= '<PRICES>';
            foreach ($this->prices as $price) {
                $xml .= $price->getXml();
            }
            $xml .= '</PRICES>';
        }
        if($this->manufacturers && !empty($this->manufacturers)) {
            $xml .= '<MANUFACTURERS>';
            foreach ($this->manufacturers as $manufacturer) {
                $xml .= $manufacturer->getXml();
            }
            $xml .= '</MANUFACTURERS>';
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
     * @return Category[]|ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * @param Category[]|ArrayCollection $categories
     * @return Product
     */
    public function setCategories($categories)
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return Price[]|ArrayCollection
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * @param Price[]|ArrayCollection $prices
     * @return Product
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;
        return $this;
    }

    /**
     * @return Manufacturer[]|ArrayCollection
     */
    public function getManufacturers()
    {
        return $this->manufacturers;
    }

    /**
     * @param Manufacturer[]|ArrayCollection $manufacturers
     * @return Product
     */
    public function setManufacturers($manufacturers)
    {
        $this->manufacturers = $manufacturers;
        return $this;
    }
}