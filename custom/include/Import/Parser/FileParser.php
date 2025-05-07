<?php

abstract class FileParser
{
    abstract public function parseFile(string $filePath): array;
}