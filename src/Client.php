<?php
namespace DandomainImportExport;

use GuzzleHttp\Client as GuzzleHttpClient;

class Client extends GuzzleHttpClient {
    protected static $host;
    protected static $username;
    protected static $password;

    public function export($params) {
        $url = sprintf(
            '%s/admin/modules/importexport/export_v6.aspx?user=%s&password=%s&exportid=%d',
            self::$host, self::$username, self::$password, $params['exportid']
        );
        unset($params['exportid']);

        if(count($params)) {
            $url = $url . '&' . http_build_query($params);
        }

        return $this->get($url);
    }

    /**
     * Sets the main shop url, i.e. http://www.example.com
     *
     * @param string $host
     */
    public static function setHost($host) {
        $host = rtrim($host, '/');
        if(!filter_var($host, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException("'$host' is not a valid URL");
        }
        self::$host = $host;
    }

    /**
     * Sets the username to access the admin area
     * It is best practice to create a new user and password to use with import/export
     *
     * @param string $username
     */
    public static function setUsername($username) {
        self::$username = $username;
    }

    /**
     * Sets the password to access the admin area
     * It is best practice to create a new user and password to use with import/export
     *
     * @param string $password
     */
    public static function setPassword($password) {
        self::$password = $password;
    }
}