<?php
namespace Dandomain\Import;

class Category extends Import {
    protected $xmlStart = '<?xml version="1.0" encoding="utf-8"?><PRODUCT_CATEGORY_EXPORT type="PRODUCTCATEGORIES"><ELEMENTS>';
    protected $xmlEnd = '</ELEMENTS></PRODUCT_CATEGORY_EXPORT>';
}