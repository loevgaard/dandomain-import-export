<?php
namespace Loevgaard\DandomainImportExport\Import;

class RelatedProductImport extends Import
{
    protected $xmlStart = '<?xml version="1.0" encoding="utf-8"?><EXPORT type="RELATEDPRODUCTS"><ELEMENTS>';
    protected $xmlEnd = '</ELEMENTS></EXPORT>';
}
