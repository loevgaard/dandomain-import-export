<?php
namespace Loevgaard\DandomainImportExport\Import;

use Loevgaard\DandomainImportExport\Export\ExportResultInterface;

interface ExportInterface
{
    /**
     * The filename of the export file
     */
    const OPTION_FILENAME = 'filename';

    /**
     * If true, the export file will be deleted upon success
     */
    const OPTION_CLEAN_UP = 'cleanUp';

    /**
     * The language id for the export
     */
    const OPTION_LANGUAGE_ID = 'languageId';

    /**
     * @param string $dandomainUrl URL of your Dandomain webshop
     * @param string $username The username for your webshop
     * @param string $password The password for your webshop
     * @param string $path The local path where imports should be saved, i.e. /var/www/your/project/public/imports
     */
    public function __construct(string $dandomainUrl, string $username, string $password, string $path);

    /**
     * @param array $options The options for this export. Options can be found here: ExportInterface::OPTION_*
     * @return ExportResultInterface
     */
    public function export(array $options = []) : ExportResultInterface;
}
