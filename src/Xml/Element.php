<?php
namespace Dandomain\Xml;

class Element implements ElementInterface {
    public function getXml() {
        return '';
    }

    /**
     * Takes a number like 2 or 2.05 and returns 2,00 or 2,05 respectively
     *
     * @param float $money
     * @return string
     */
    protected function formatMoney($money) {
        return number_format($money, 2, ',', '');
    }
}