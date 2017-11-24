<?php
namespace Loevgaard\DandomainImportExport\Xml;

interface ElementInterface
{
    /**
     * Will return the XML string for this element
     *
     * @return string
     */
    public function getXml() : string;
}
