<?php
namespace Dandomain;

use GuzzleHttp\Client as GuzzleHttpClient;

class ImportExportClient extends GuzzleHttpClient implements ImportExportClientInterface {
    protected static $host;
    protected static $username;
    protected static $password;

    public function import($file, $params = []) {
        $url = sprintf(
            '%s/admin/modules/importexport/import_v6.aspx?response=1&user=%s&password=%s&file=%s',
            self::$host, self::$username, self::$password, rawurlencode($file)
        );

        if (count($params)) {
            $url = $url . '&' . http_build_query($params);
        }

        return $this->get($url, [
            'connect_timeout' => 10,
            'timeout' => 3600, // 1 hour timeout
        ]);
    }

    public function export($exportId, $params = [])
    {
        $url = sprintf(
            '%s/admin/modules/importexport/export_v6.aspx?user=%s&password=%s&exportid=%d',
            self::$host, self::$username, self::$password, $exportId
        );

        if (count($params)) {
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