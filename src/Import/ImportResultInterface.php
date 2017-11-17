<?php
namespace Loevgaard\DandomainImportExport\Import;

use Loevgaard\DandomainImportExport\ImportExport\ResultInterface;
use Psr\Http\Message\ResponseInterface;

interface ImportResultInterface extends ResultInterface
{
    /**
     * Returns true if the import was successful
     *
     * @return bool
     */
    public function wasSuccessful() : bool;

    /**
     * Parses the given response
     *
     * @param ResponseInterface $response
     * @return void
     */
    public function parseResponse(ResponseInterface $response) : void;

    /**
     * Returns the URL of the import file
     * Notice that if the ImportInterface::OPTION_CLEAN_UP is set to true, this file will not be available
     *
     * @return string
     */
    public function getFileUrl() : string;

    /**
     * Sets the URL where the import file can be downloaded
     *
     * @param string $url
     * @return ImportResultInterface
     */
    public function setFileUrl(string $url) : ImportResultInterface;

    /**
     * Returns the path of the import file
     * Notice that if the ImportInterface::OPTION_CLEAN_UP is set to true, this file will not be available
     *
     * @return string
     */
    public function getFilePath() : string;

    /**
     * Sets the path where the import file can be found on the file system
     *
     * @param string $path
     * @return ImportResultInterface
     */
    public function setFilePath(string $path) : ImportResultInterface;

    /**
     * Returns the import result XML
     *
     * @return string
     */
    public function getXml() : string;

    /**
     * Returns the type of the import
     *
     * @return string
     */
    public function getType() : string;

    /**
     * Returns the status of the import
     *
     * @return int
     */
    public function getStatus() : int;

    /**
     * Returns the time it took to do the import
     *
     * @return \DateInterval
     */
    public function getTime() : \DateInterval;

    /**
     * Returns the total number of elements
     *
     * @return int
     */
    public function getCount() : int;

    /**
     * Returns the total number of completed elements
     *
     * @return int
     */
    public function getCompleted() : int;

    /**
     * Returns the number of failed elements
     *
     * @return int
     */
    public function getFailed() : int;

    /**
     * Returns the number of created elements
     *
     * @return int
     */
    public function getCreated() : int;

    /**
     * Returns the number of modified elements
     *
     * @return int
     */
    public function getModified() : int;
}
