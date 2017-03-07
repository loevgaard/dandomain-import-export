<?php
namespace Dandomain\Xml\Product;

use Dandomain\Xml\Element;

class Media extends Element
{
    /** @var int */
    protected $id;

    /** @var string */
    protected $name;

    /** @var string */
    protected $url;

    /** @var string */
    protected $altText;

    /** @var int */
    protected $sort;

    public function __construct($id = null, $name = null, $url = null, $altText = null, $sort = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->url = $url;
        $this->altText = $altText;
        $this->sort = $sort;
    }

    public function getXml()
    {
        $xml = '';
        if($this->id) { $xml .= '<MEDIA_ID>' . $this->id . '<MEDIA_ID>'; }
        if($this->name) { $xml .= '<MEDIA_NAME>' . $this->name . '<MEDIA_NAME>'; }
        if($this->url) { $xml .= '<MEDIA_URL>' . $this->url . '<MEDIA_URL>'; }
        if($this->altText) { $xml .= '<MEDIA_ALT_TEXT>' . $this->altText . '<MEDIA_ALT_TEXT>'; }
        if($this->sort) { $xml .= '<MEDIA_SORT>' . $this->sort . '<MEDIA_SORT>'; }

        if($xml) {
            $xml = '<MEDIA>' . $xml . '</MEDIA>';
        }

        return $xml;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Media
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * @return Media
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return Media
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getAltText()
    {
        return $this->altText;
    }

    /**
     * @param string $altText
     * @return Media
     */
    public function setAltText($altText)
    {
        $this->altText = $altText;
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
     * @return Media
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }
}