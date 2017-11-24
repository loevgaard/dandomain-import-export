<?php
namespace Loevgaard\DandomainImportExport\Export;

use Loevgaard\DandomainImportExport\Import\ExportInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VisitExport extends Export
{
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);
        $resolver->setRequired([ExportInterface::OPTION_START_DATE, ExportInterface::OPTION_END_DATE]);
    }
}
