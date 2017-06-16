<?php
namespace Dandomain\Export;

class Tag extends Export
{
    /**
     * @inheritdoc
     */
    public function elements() {
        $this->validateParams();

        return parent::elements();
    }

    public function validateParams() {
        if(!isset($this->params['langid'])) {
            throw new \InvalidArgumentException('Language id is not set.');
        }
    }
}