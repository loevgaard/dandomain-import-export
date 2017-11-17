<?php
namespace Loevgaard\DandomainImportExport\Import;

class PeriodImport extends Import
{
    protected $xmlStart = '<?xml version="1.0" encoding="utf-8"?><PERIOD_EXPORT type="PERIODS"><ELEMENTS>';
    protected $xmlEnd = '</ELEMENTS></PERIOD_EXPORT>';
}
