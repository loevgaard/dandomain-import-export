<?php
namespace Loevgaard\DandomainImportExport\Xml;

class ProductRelation extends Element
{
    /**
     * @var string
     */
    protected $productNumber;

    /**
     * @var string
     */
    protected $relatedProductNumber;

    /**
     * @var int
     */
    protected $sort;

    /**
     * @var int
     */
    protected $type;

    public function __construct($productNumber, $relatedProductNumber, $sort = 0, $type = 1)
    {
        $this->productNumber = $productNumber;
        $this->relatedProductNumber = $relatedProductNumber;
        $this->sort = $sort;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getXml() : string
    {
        $xml = '<PRODUCT_RELATION>';
        $xml .= '<PROD_NUM>'.$this->productNumber.'</PROD_NUM>';
        $xml .= '<REL_PROD_NUM>'.$this->relatedProductNumber.'</REL_PROD_NUM>';
        $xml .= '<REL_PROD_SORT>'.$this->sort.'</REL_PROD_SORT>';
        $xml .= '<REL_PROD_TYPE>'.$this->type.'</REL_PROD_TYPE>';
        $xml .= '</PRODUCT_RELATION>';

        return $xml;
    }

    /**
     * @return string
     */
    public function getProductNumber()
    {
        return $this->productNumber;
    }

    /**
     * @param string $productNumber
     * @return ProductRelation
     */
    public function setProductNumber($productNumber)
    {
        $this->productNumber = $productNumber;
        return $this;
    }

    /**
     * @return string
     */
    public function getRelatedProductNumber()
    {
        return $this->relatedProductNumber;
    }

    /**
     * @param string $relatedProductNumber
     * @return ProductRelation
     */
    public function setRelatedProductNumber($relatedProductNumber)
    {
        $this->relatedProductNumber = $relatedProductNumber;
        return $this;
    }

    /**
     * @return int
     */
    public function getSort()
    {
        return $this->sort;
    }

    /**
     * @param int $sort
     * @return ProductRelation
     */
    public function setSort($sort)
    {
        $this->sort = $sort;
        return $this;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param int $type
     * @return ProductRelation
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }
}
