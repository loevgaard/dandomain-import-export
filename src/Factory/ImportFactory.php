<?php
namespace Loevgaard\DandomainImportExport\Factory;

use Loevgaard\DandomainImportExport\Exception\InterfaceException;
use Loevgaard\DandomainImportExport\Import\ImportInterface;

class ImportFactory
{
    /**
     * This is the URL of your Dandomain webshop
     *
     * @var string
     */
    protected $dandomainUrl;

    /**
     * This is the username to your webshop
     *
     * @var string
     */
    protected $username;

    /**
     * This is the password to your webshop
     *
     * @var string
     */
    protected $password;

    /**
     * This is the local path where imports should be saved, i.e. /var/www/your/project/public/imports
     *
     * @var string
     */
    protected $path;

    /**
     * This is the public URL that corresponds to the $path, i.e. https://your-project.com/imports
     *
     * @var string
     */
    protected $url;

    public function __construct(string $dandomainUrl, string $username, string $password, string $path, string $url)
    {
        $this->dandomainUrl = $dandomainUrl;
        $this->username = $username;
        $this->password = $password;
        $this->path = $path;
        $this->url = $url;
    }

    public function createImport(string $class) : ImportInterface
    {
        $implements = class_implements($class);
        if (!isset($implements[ImportInterface::class])) {
            throw new InterfaceException($class.' must implement '.ImportInterface::class);
        }

        /** @var ImportInterface $obj */
        $obj = new $class($this->dandomainUrl, $this->username, $this->password, $this->path, $this->url);

        return $obj;
    }
}
