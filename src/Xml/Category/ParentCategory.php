<?php
namespace Dandomain\Xml\Category;

use Dandomain\Xml\Element;

class ParentCategory extends Element {
    /** @var int */
    protected $id;

    /** @var boolean */
    protected $default;

    public function __construct($id, $default = false)
    {
        $this->id       = $id;
        $this->default  = $default;
    }

    public function getXml()
    {
        $priority = $this->default ? 1 : 0;
        $xml = '<PARENT_CAT_ID priority="' . $priority . '">' . $this->id . '</PARENT_CAT_ID>';
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
     * @return ParentCategory
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDefault()
    {
        return $this->default;
    }

    /**
     * @param boolean $default
     * @return ParentCategory
     */
    public function setDefault($default)
    {
        $this->default = $default;
        return $this;
    }
}