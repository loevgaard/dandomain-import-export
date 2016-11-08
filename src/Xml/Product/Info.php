<?php
namespace Dandomain\Xml\Product;

use Dandomain\Xml\Element;

class Info extends Element
{
    /** @var \DateTimeInterface */
    protected $created;

    /** @var string */
    protected $createdBy;

    /** @var \DateTimeInterface */
    protected $edited;

    /** @var string */
    protected $editedBy;

    /** @var int */
    protected $viewed;

    /** @var int */
    protected $salesCount;

    public function __construct(\DateTimeInterface $created = null, $createdBy = null, \DateTimeInterface $edited = null, $editedBy = null, $viewed = null, $salesCount = null)
    {
        $this->created = $created;
        $this->createdBy = $createdBy;
        $this->edited = $edited;
        $this->editedBy = $editedBy;
        $this->viewed = $viewed;
        $this->salesCount = $salesCount;
    }

    public function getXml()
    {
        $xml = '';
        if ($this->created) {
            $xml .= '<PROD_CREATED>' . $this->created->format('d-m-Y H:i:s') . '<PROD_CREATED>';
        }
        if ($this->createdBy) {
            $xml .= '<PROD_CREATED_BY>' . $this->createdBy . '<PROD_CREATED_BY>';
        }
        if ($this->edited) {
            $xml .= '<PROD_EDITED>' . $this->edited->format('d-m-Y H:i:s') . '<PROD_EDITED>';
        }
        if ($this->editedBy) {
            $xml .= '<PROD_EDITED_BY>' . $this->editedBy . '<PROD_EDITED_BY>';
        }
        if ($this->viewed) {
            $xml .= '<PROD_VIEWED>' . $this->viewed . '<PROD_VIEWED>';
        }
        if ($this->salesCount) {
            $xml .= '<PROD_SALES_COUNT>' . $this->salesCount . '<PROD_SALES_COUNT>';
        }
        return $xml;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param \DateTimeInterface $created
     * @return Info
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * @param string $createdBy
     * @return Info
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEdited()
    {
        return $this->edited;
    }

    /**
     * @param \DateTimeInterface $edited
     * @return Info
     */
    public function setEdited($edited)
    {
        $this->edited = $edited;
        return $this;
    }

    /**
     * @return string
     */
    public function getEditedBy()
    {
        return $this->editedBy;
    }

    /**
     * @param string $editedBy
     * @return Info
     */
    public function setEditedBy($editedBy)
    {
        $this->editedBy = $editedBy;
        return $this;
    }

    /**
     * @return int
     */
    public function getViewed()
    {
        return $this->viewed;
    }

    /**
     * @param int $viewed
     * @return Info
     */
    public function setViewed($viewed)
    {
        $this->viewed = $viewed;
        return $this;
    }

    /**
     * @return int
     */
    public function getSalesCount()
    {
        return $this->salesCount;
    }

    /**
     * @param int $salesCount
     * @return Info
     */
    public function setSalesCount($salesCount)
    {
        $this->salesCount = $salesCount;
        return $this;
    }
}