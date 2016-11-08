<?php
namespace Dandomain\Xml\Product;

use Dandomain\Xml\Element;

class Description extends Element
{
    /** @var string */
    protected $descriptionShort;

    /** @var string */
    protected $descriptionLong;

    /** @var string */
    protected $descriptionLong2;

    /** @var string */
    protected $searchword;

    /** @var string */
    protected $metaDescription;

    /** @var string */
    protected $title;

    public function __construct($descriptionShort = null, $descriptionLong = null, $descriptionLong2 = null, $searchword = null, $metaDescription = null, $title = null)
    {
        $this->descriptionShort = $descriptionShort;
        $this->descriptionLong = $descriptionLong;
        $this->descriptionLong2 = $descriptionLong2;
        $this->searchword = $searchword;
        $this->metaDescription = $metaDescription;
        $this->title = $title;
    }

    public function getXml()
    {
        $xml = '';
        if ($this->descriptionShort) {
            $xml .= '<DESC_SHORT>' . $this->descriptionShort . '<DESC_SHORT>';
        }
        if ($this->descriptionLong) {
            $xml .= '<DESC_LONG>' . $this->descriptionLong . '<DESC_LONG>';
        }
        if ($this->descriptionLong2) {
            $xml .= '<DESC_LONG_2>' . $this->descriptionLong2 . '<DESC_LONG_2>';
        }
        if ($this->searchword) {
            $xml .= '<PROD_SEARCHWORD>' . $this->searchword . '<PROD_SEARCHWORD>';
        }
        if ($this->metaDescription) {
            $xml .= '<META_DESCRIPTION>' . $this->metaDescription . '<META_DESCRIPTION>';
        }
        if ($this->title) {
            $xml .= '<TITLE>' . $this->title . '<TITLE>';
        }
        return $xml;
    }

    /**
     * @return string
     */
    public function getDescriptionShort()
    {
        return $this->descriptionShort;
    }

    /**
     * @param string $descriptionShort
     * @return Description
     */
    public function setDescriptionShort($descriptionShort)
    {
        $this->descriptionShort = $descriptionShort;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionLong()
    {
        return $this->descriptionLong;
    }

    /**
     * @param string $descriptionLong
     * @return Description
     */
    public function setDescriptionLong($descriptionLong)
    {
        $this->descriptionLong = $descriptionLong;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescriptionLong2()
    {
        return $this->descriptionLong2;
    }

    /**
     * @param string $descriptionLong2
     * @return Description
     */
    public function setDescriptionLong2($descriptionLong2)
    {
        $this->descriptionLong2 = $descriptionLong2;
        return $this;
    }

    /**
     * @return string
     */
    public function getSearchword()
    {
        return $this->searchword;
    }

    /**
     * @param string $searchword
     * @return Description
     */
    public function setSearchword($searchword)
    {
        $this->searchword = $searchword;
        return $this;
    }

    /**
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * @param string $metaDescription
     * @return Description
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Description
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
}