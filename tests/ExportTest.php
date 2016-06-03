<?php
namespace DandomainImportExport\Tests;

use DandomainImportExport\Export;
use DandomainImportExport\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;

class ExportTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        Client::setHost('http://www.example.com');
        Client::setUsername('username');
        Client::setPassword('password');
    }

    public function testElements()
    {
        $xmlResponse1 = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<EXPORT_RESULT>
<STATUS>1</STATUS>
<TIME>0:1</TIME>
<COUNT>21954</COUNT>
<FILE_URL>http://www.2trendy.dk/images/ImportExport/export-PRODUCTS.xml</FILE_URL>
</EXPORT_RESULT>
XML;

        $xmlResponse2 = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<PRODUCT_EXPORT type="PRODUCTS">
  <ELEMENTS>
    <PRODUCT>
      <GENERAL>
        <PROD_NUM> 2043 ebbets grey-M</PROD_NUM>
        <LANGUAGE_ID>27</LANGUAGE_ID>
      </GENERAL>
    </PRODUCT>
    <PRODUCT>
      <GENERAL>
        <PROD_NUM> 40007</PROD_NUM>
        <LANGUAGE_ID>27</LANGUAGE_ID>
      </GENERAL>
    </PRODUCT>
    <PRODUCT>
      <GENERAL>
        <PROD_NUM> 40007-L</PROD_NUM>
        <LANGUAGE_ID>27</LANGUAGE_ID>
      </GENERAL>
    </PRODUCT>
    <PRODUCT>
      <GENERAL>
        <PROD_NUM> 40007-M</PROD_NUM>
        <LANGUAGE_ID>27</LANGUAGE_ID>
      </GENERAL>
    </PRODUCT>
  </ELEMENTS>
</PRODUCT_EXPORT>
XML;

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/xml; charset=utf-8'], $xmlResponse1),
            new Response(200, ['Content-Type' => 'application/xml; charset=utf-8'], $xmlResponse2),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $export = new Export(1);
        $export->setClient($client);
        foreach($export->elements() as $element) {
            print_r($element);
        }
    }
}