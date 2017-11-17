<?php
namespace Dandomain\Import;

class RelatedProduct extends Import {
    protected $xmlStart = '<?xml version="1.0" encoding="utf-8"?><EXPORT type="RELATEDPRODUCTS"><ELEMENTS>';
    protected $xmlEnd = '</ELEMENTS></EXPORT>';
}