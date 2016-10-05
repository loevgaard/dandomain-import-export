<?php
namespace Dandomain\Import;

class Price extends Import {
    protected $xmlStart = '<?xml version="1.0" encoding="utf-8"?><PRICE_EXPORT type="PRICES"><ELEMENTS>';
    protected $xmlEnd = '</ELEMENTS></PRICE_EXPORT>';
}