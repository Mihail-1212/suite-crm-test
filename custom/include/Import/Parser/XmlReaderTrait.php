<?php

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'exceptions.php');

trait XmlReaderTrait
{
    protected function parseXml(string $filePath): SimpleXMLElement
    {
        $fileContent = file_get_contents($filePath);

        $xml = simplexml_load_string(trim($fileContent));
        if (!$xml)
            throw new ParseException('XML parse error: ' . $filePath);

        return $xml;
    }
}