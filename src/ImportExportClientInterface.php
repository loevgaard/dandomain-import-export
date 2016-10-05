<?php
namespace Dandomain;

interface ImportExportClientInterface {
    /**
     * Will import the given file
     *
     * The $file should be accessible from the web
     * Returns the Dandomain status as an array
     *
     * @param string $file
     * @param array $params
     * @return array
     */
    public function import($file, $params = []);

    /**
     * @param int $exportId
     * @param array $params
     * @return array
     */
    public function export($exportId, $params = []);

    /**
     * Sets the main shop url, i.e. http://www.example.com
     *
     * @param string $host
     */
    public static function setHost($host);

    /**
     * Sets the username to access the admin area
     * It is best practice to create a new user and password to use with import/export
     *
     * @param string $username
     */
    public static function setUsername($username);

    /**
     * Sets the password to access the admin area
     * It is best practice to create a new user and password to use with import/export
     *
     * @param string $password
     */
    public static function setPassword($password);
}