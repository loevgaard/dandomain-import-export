<?php
namespace Dandomain\Export;

class Product extends Export
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

    /**
     * @param int $productCategoryId
     * @return $this
     */
    public function setProductCategoryId($productCategoryId) {
        $this->params['prodcatid'] = $productCategoryId;
        return $this;
    }
}