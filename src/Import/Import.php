<?php
namespace Dandomain\Import;

use Dandomain\ImportExportClientTrait;
use Dandomain\Xml\ElementInterface;
use Doctrine\Common\Collections\ArrayCollection;

abstract class Import {
    use ImportExportClientTrait;

    /**
     * @var string
     */
    protected $xmlStart;

    /**
     * @var string
     */
    protected $xmlEnd;

    /**
     * @var ElementInterface[]|ArrayCollection
     */
    protected $elements;

    /**
     * The local path where the import file should be saved
     *
     * @var string
     */
    protected $localPath;

    /**
     * The global url where the import file can be accessed by Dandomain
     *
     * @var string
     */
    protected $globalUrl;

    /**
     * @var array
     */
    protected $params = [];

    public function __construct($localPath, $globalUrl, $params = []) {
        $this->localPath = $localPath;
        $this->globalUrl = $globalUrl;
        $this->elements = new ArrayCollection();

        $this->params = array_merge($this->params, $params);
    }

    /**
     * Returns the local path of the file
     *
     * @return string
     */
    public function createImportFile() {
        @unlink($this->localPath);
        $fp = fopen($this->localPath, 'w');
        fwrite($fp, $this->xmlStart);

        foreach ($this->elements as $element) {
            fwrite($fp, $element->getXml());
        }

        fwrite($fp, $this->xmlEnd);
        fclose($fp);

        return $this->localPath;
    }

    /**
     * @return Result|bool
     */
    public function import() {
        if(!count($this->elements)) {
            return false;
        }

        $this->createImportFile();

        /**
         * @todo this depends on the guzzle http client, which it should not
         * @todo move the getBody()->getContents() to the client instead
         */
        $importResult = new Result($this->getClient()->import($this->globalUrl, $this->params)->getBody()->getContents());

        @unlink($this->localPath);
        return $importResult;
    }

    /**
     * @param ElementInterface $element
     * @return Import
     */
    public function addElement(ElementInterface $element) {
        $this->elements[] = $element;
        return $this;
    }

    /**
     * @return ElementInterface[]|ArrayCollection
     */
    public function getElements()
    {
        return $this->elements;
    }

    /**
     * @param ElementInterface[]|ArrayCollection $elements
     * @return Import
     */
    public function setElements($elements)
    {
        $this->elements = $elements;
        return $this;
    }


    public function setUpdateOnly($val) {
        $this->params['updateonly'] = $val ? 1 : 0;
    }
}