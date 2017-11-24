<?php
namespace Loevgaard\DandomainImportExport\Xml\Product;

use Loevgaard\DandomainImportExport\Xml\Element;

class Category extends Element
{
    /** @var int */
    protected $id;

    /** @var bool */
    protected $default;

    public function __construct($id, $default = null)
    {
        $this->id       = $id;
        $this->default  = $default;
    }

    public function getXml() : string
    {
        $xml = '<PROD_CAT_ID' . ($this->default ? ' priority="1"' : '') . '>' . $this->id . '</PROD_CAT_ID>';
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
     * @return Category
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault()
    {
        return $this->default;
    }

    /**
     * @param bool $default
     * @return Category
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }
}
