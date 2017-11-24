<?php
namespace Loevgaard\DandomainImportExport\Xml\Product;

use Loevgaard\DandomainImportExport\Xml\Element;

class CustomFields extends Element
{
    /** @var string */
    protected $field1;

    /** @var string */
    protected $field2;

    /** @var string */
    protected $field3;

    /** @var string */
    protected $field4;

    /** @var string */
    protected $field5;

    /** @var string */
    protected $field6;

    /** @var string */
    protected $field7;

    /** @var string */
    protected $field8;

    /** @var string */
    protected $field9;

    /** @var string */
    protected $field10;

    public function __construct($field1 = null, $field2 = null, $field3 = null, $field4 = null, $field5 = null, $field6 = null, $field7 = null, $field8 = null, $field9 = null, $field10 = null)
    {
        $this->field1 = $field1;
        $this->field2 = $field2;
        $this->field3 = $field3;
        $this->field4 = $field4;
        $this->field5 = $field5;
        $this->field6 = $field6;
        $this->field7 = $field7;
        $this->field8 = $field8;
        $this->field9 = $field9;
        $this->field10 = $field10;
    }

    public function getXml() : string
    {
        $xml = '';
        if ($this->field1) {
            $xml .= '<FIELD_1>' . $this->field1 . '</FIELD_1>';
        }
        if ($this->field2) {
            $xml .= '<FIELD_2>' . $this->field2 . '</FIELD_2>';
        }
        if ($this->field3) {
            $xml .= '<FIELD_3>' . $this->field3 . '</FIELD_3>';
        }
        if ($this->field4) {
            $xml .= '<FIELD_4>' . $this->field4 . '</FIELD_4>';
        }
        if ($this->field5) {
            $xml .= '<FIELD_5>' . $this->field5 . '</FIELD_5>';
        }
        if ($this->field6) {
            $xml .= '<FIELD_6>' . $this->field6 . '</FIELD_6>';
        }
        if ($this->field7) {
            $xml .= '<FIELD_7>' . $this->field7 . '</FIELD_7>';
        }
        if ($this->field8) {
            $xml .= '<FIELD_8>' . $this->field8 . '</FIELD_8>';
        }
        if ($this->field9) {
            $xml .= '<FIELD_9>' . $this->field9 . '</FIELD_9>';
        }
        if ($this->field10) {
            $xml .= '<FIELD_10>' . $this->field10 . '</FIELD_10>';
        }
        return $xml;
    }

    /**
     * @return string
     */
    public function getField1()
    {
        return $this->field1;
    }

    /**
     * @param string $field1
     * @return CustomFields
     */
    public function setField1($field1)
    {
        $this->field1 = $field1;
        return $this;
    }

    /**
     * @return string
     */
    public function getField2()
    {
        return $this->field2;
    }

    /**
     * @param string $field2
     * @return CustomFields
     */
    public function setField2($field2)
    {
        $this->field2 = $field2;
        return $this;
    }

    /**
     * @return string
     */
    public function getField3()
    {
        return $this->field3;
    }

    /**
     * @param string $field3
     * @return CustomFields
     */
    public function setField3($field3)
    {
        $this->field3 = $field3;
        return $this;
    }

    /**
     * @return string
     */
    public function getField4()
    {
        return $this->field4;
    }

    /**
     * @param string $field4
     * @return CustomFields
     */
    public function setField4($field4)
    {
        $this->field4 = $field4;
        return $this;
    }

    /**
     * @return string
     */
    public function getField5()
    {
        return $this->field5;
    }

    /**
     * @param string $field5
     * @return CustomFields
     */
    public function setField5($field5)
    {
        $this->field5 = $field5;
        return $this;
    }

    /**
     * @return string
     */
    public function getField6()
    {
        return $this->field6;
    }

    /**
     * @param string $field6
     * @return CustomFields
     */
    public function setField6($field6)
    {
        $this->field6 = $field6;
        return $this;
    }

    /**
     * @return string
     */
    public function getField7()
    {
        return $this->field7;
    }

    /**
     * @param string $field7
     * @return CustomFields
     */
    public function setField7($field7)
    {
        $this->field7 = $field7;
        return $this;
    }

    /**
     * @return string
     */
    public function getField8()
    {
        return $this->field8;
    }

    /**
     * @param string $field8
     * @return CustomFields
     */
    public function setField8($field8)
    {
        $this->field8 = $field8;
        return $this;
    }

    /**
     * @return string
     */
    public function getField9()
    {
        return $this->field9;
    }

    /**
     * @param string $field9
     * @return CustomFields
     */
    public function setField9($field9)
    {
        $this->field9 = $field9;
        return $this;
    }

    /**
     * @return string
     */
    public function getField10()
    {
        return $this->field10;
    }

    /**
     * @param string $field10
     * @return CustomFields
     */
    public function setField10($field10)
    {
        $this->field10 = $field10;
        return $this;
    }
}
