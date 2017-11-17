<?php
namespace Loevgaard\DandomainImportExport\Xml\Category;

use Loevgaard\DandomainImportExport\Xml\Element;

class ParentCategory extends Element
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var bool
     */
    protected $default;

    public function __construct($id, $default = false)
    {
        $this->id       = $id;
        $this->default  = $default;
    }

    public function getXml() : string
    {
        return '<PARENT_CAT_ID priority="' . ($this->default ? 1 : 0) . '">' . $this->id . '</PARENT_CAT_ID>';
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return ParentCategory
     */
    public function setId(int $id) : self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDefault() : bool
    {
        return $this->default;
    }

    /**
     * @param bool $default
     * @return ParentCategory
     */
    public function setDefault(bool $default)
    {
        $this->default = $default;

        return $this;
    }
}
