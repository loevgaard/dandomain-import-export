<?php
namespace Dandomain\Import;

use Dandomain\ImportExportClientTrait;
use Dandomain\Xml\ElementInterface;

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
     * @var ElementInterface[]
     */
    protected $elements = [];

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

        $this->params = array_merge($this->params, $params);
        $this->params['response'] = 1; // this will output XML instead of HTML
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
     * @return Result
     */
    public function import() {
        $this->createImportFile();

        /**
         * @todo this depends on the guzzle http client, which it should not
         * @todo move the getBody()->getContents() to the client instead
         */
        $importResult = new Result($this->getClient()->import($this->globalUrl)->getBody()->getContents());

        @unlink($this->localPath);
        return $importResult;
    }

    /**
     * @param ElementInterface $element
     */
    public function addElement(ElementInterface $element) {
        $this->elements[] = $element;
    }

    public function setUpdateOnly($val) {
        $this->params['updateonly'] = $val ? 1 : 0;
    }

    public function setResponse($val) {
        $this->params['response'] = $val ? 1 : 0;
    }
}