<?php
namespace Loevgaard\DandomainImportExport\Factory;

use Loevgaard\DandomainImportExport\Exception\InterfaceException;
use Loevgaard\DandomainImportExport\Import\ImportInterface;
use PHPUnit\Framework\TestCase;

final class ImportFactoryTest extends TestCase
{
    public function testCreateImport()
    {
        $import = $this->getMockClass(ImportInterface::class);
        $import = $this->getImportFactory()->createImport($import);

        $this->assertInstanceOf(ImportInterface::class, $import);
    }

    public function testCreateImportWithException()
    {
        $this->expectException(InterfaceException::class);

        $this->getImportFactory()->createImport(\stdClass::class);
    }

    /**
     * @return ImportFactory
     */
    private function getImportFactory() : ImportFactory
    {
        return new ImportFactory('https://example.com', 'username', 'password', '/var/www/your/admin/public/imports', 'https://your-admin.com/imports');
    }
}
