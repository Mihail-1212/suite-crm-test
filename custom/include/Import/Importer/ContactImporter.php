<?php

require_once('BeanImporter.php');
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Parser' . DIRECTORY_SEPARATOR . 'FileParser.php');
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Parser' . DIRECTORY_SEPARATOR . 'ContactXmlParser.php');
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'exceptions.php');

class ContactImporter extends BeanImporter
{
    public function getFileParser(string $fileExtension): FileParser
    {
        return match ($fileExtension) {
            'xml' => new ContactXmlParser(),
            default => throw new UnsupportedFileTypeException('File extension not supported'),
        };
    }
}