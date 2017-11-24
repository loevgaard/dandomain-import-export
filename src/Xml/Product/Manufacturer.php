<?php
namespace Loevgaard\DandomainImportExport\Xml\Product;

use Loevgaard\DandomainImportExport\Xml\Element;

class Manufacturer extends Element
{
    protected $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function getXml() : string
    {
        return '<MANUFAC_ID>' . $this->id . '</MANUFAC_ID>';
    }
}
