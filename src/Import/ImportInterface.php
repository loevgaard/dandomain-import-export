<?php
namespace Loevgaard\DandomainImportExport\Import;

use GuzzleHttp\ClientInterface;
use Loevgaard\DandomainImportExport\Xml\ElementInterface;

interface ImportInterface
{
    /**
     * The filename of the import file
     */
    const OPTION_FILENAME = 'filename';

    /**
     * If true, a dry run will be run. So nothing will be imported
     */
    const OPTION_DRY_RUN = 'dryRun';

    /**
     * If true, the import file will be deleted upon success
     */
    const OPTION_CLEAN_UP = 'cleanUp';

    /**
     * If true, product imports will only update products and not create new ones
     */
    const OPTION_ONLY_UPDATE = 'onlyUpdate';

    /**
     * These options will be forwarded to the HTTP client
     */
    const OPTION_CLIENT_OPTIONS = 'clientOptions';

    /**
     * @param string $dandomainUrl URL of your Dandomain webshop
     * @param string $username The username for your webshop
     * @param string $password The password for your webshop
     * @param string $path The local path where imports should be saved, i.e. /var/www/your/project/public/imports
     * @param string $url The URL where imports will be publicly available, i.e. https://your-project.com/imports
     */
    public function __construct(string $dandomainUrl, string $username, string $password, string $path, string $url);

    /**
     * Will import this import
     *
     * @param array $options The options for this import. Options can be found here: ImportInterface::OPTION_*
     * @return ImportResultInterface
     */
    public function import(array $options = []) : ImportResultInterface;

    /**
     * Will add an element to the import
     *
     * @param ElementInterface $element
     * @return ImportInterface
     */
    public function addElement(ElementInterface $element) : ImportInterface;

    /**
     * Will return a Guzzle Client interface
     *
     * @return ClientInterface
     */
    public function getClient() : ClientInterface;

    /**
     * Sets the Client to use
     *
     * @param ClientInterface $client
     * @return ImportInterface
     */
    public function setClient(ClientInterface $client);
}
