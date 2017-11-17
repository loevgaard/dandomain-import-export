<?php
namespace Loevgaard\DandomainImportExport\Import;

use Loevgaard\DandomainImportExport\Xml\ElementInterface;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStreamWrapper;
use PHPUnit\Framework\TestCase;

final class ImportFactoryTest extends TestCase
{
    public function setUp()
    {
        vfsStreamWrapper::register();
        vfsStreamWrapper::setRoot(new vfsStreamDirectory('imports'));
    }

    public function testImport()
    {
        /** @var ElementInterface|\PHPUnit_Framework_MockObject_MockObject $element */
        $element = $this->getMockBuilder(ElementInterface::class)->getMock();
        $element->method('getXml')->willReturn('<xml>value</xml>');

        $import = $this->getImport();
        $import->addElement($element);

        $importResult = $import->import();
        $this->assertInstanceOf(ImportResultInterface::class, $importResult);

        $this->assertTrue(vfsStreamWrapper::getRoot()->hasChild(basename($importResult->getFilePath())));
    }

    /**
     * @return \PHPUnit_Framework_MockObject_MockBuilder|Import
     */
    private function getImport()
    {
        /** @var \PHPUnit_Framework_MockObject_MockBuilder|Import $import */
        $import = $this->getMockForAbstractClass(Import::class, [
            'https://example.com',
            'username',
            'password',
            vfsStream::url('imports'),
            'https://example.com/imports'
        ]);

        return $import;
    }
}
