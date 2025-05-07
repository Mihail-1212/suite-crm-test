<?php

require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'Parser' . DIRECTORY_SEPARATOR . 'FileParser.php');

abstract class BeanImporter
{
    abstract public function getFileParser(string $fileExtension): FileParser;

    public function import(string $filePath): void
    {
        $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
        $beans = $this->getFileParser($fileExtension)->parseFile($filePath);

        foreach ($beans as $bean) {
            $bean->save();
        }
    }
}