<?php

require_once('Importer/BeanImporter.php');
require_once('Importer/ContactImporter.php');
require_once('exceptions.php');

class BeanImporterFactory
{
    public static function getBeanImporter(string $bean): BeanImporter
    {
        return match ($bean) {
            'Contacts' => new ContactImporter(),
            default => throw new UnsupportedBeanTypeException(),
        };
    }
}