<?php
namespace Dandomain\Xml\Product;

use Dandomain\Xml\Element;

class Manufacturer extends Element {
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getXml()
    {
        return '<MANUFAC_ID>' . $this->id . '</MANUFAC_ID>';
    }
}