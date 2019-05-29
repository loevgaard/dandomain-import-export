<?php
namespace Dandomain\Xml;

class Period extends Element {
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var \DateTimeInterface
     */
    protected $startDate;

    /**
     * @var \DateTimeInterface
     */
    protected $endDate;

    /**
     * @var bool
     */
    protected $disabled = false;

    public function __construct($id, $title = '', $startDate = null, $endDate = null, $disabled = false)
    {
        $this->id           = $id;
        $this->title        = $title;
        $this->disabled     = $disabled;

        if(is_string($startDate)) {
            $startDate = new \DateTime($startDate);
        }
        if(is_string($endDate)) {
            $endDate= new \DateTime($endDate);
        }

        $this->startDate    = $startDate;
        $this->endDate      = $endDate;
    }

    public function getXml()
    {
        $xml = '<PERIOD>';
        $xml .= "<ID>{$this->id}</ID>";
        if($this->title) {
            $xml .= '<TITLE>' . $this->title. '</TITLE>';
        }
        if($this->startDate) {
            $xml .= '<START_DATE>' . $this->startDate->format('d-m-Y H:i') . '</START_DATE>';
        }
        if($this->endDate) {
            $xml .= '<END_DATE>' . $this->endDate->format('d-m-Y H:i') . '</END_DATE>';
        }
        if($this->disabled) {
            $xml .= '<DISABLED>' . ($this->disabled ? 'True' : 'False') . '</DISABLED>';
        }
        $xml .= '</PERIOD>';
        return $xml;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Period
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Period
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTimeInterface $startDate
     * @return Period
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTimeInterface $endDate
     * @return Period
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isDisabled()
    {
        return $this->disabled;
    }

    /**
     * @param boolean $disabled
     * @return Period
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;
        return $this;
    }
}
