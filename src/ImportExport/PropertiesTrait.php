<?php
namespace Loevgaard\DandomainImportExport\ImportExport;

trait PropertiesTrait
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
     * For exports this is the local path where exports should be saved, i.e. /var/www/your/project/data/exports
     * For imports this is the local path where imports should be saved, i.e. /var/www/your/project/public/imports
     *
     * @var string
     */
    protected $path;
}