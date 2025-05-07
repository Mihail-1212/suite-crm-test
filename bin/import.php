<?php

require('cli.php');
require_once('custom/include/Import/BeanImporterFactory.php');

$filePath = $argv[1];
if (!$filePath) {
    fwrite(STDOUT, 'Файл не указан' . PHP_EOL);
    return;
}

try {
    $importer = BeanImporterFactory::getBeanImporter('Contacts');
    $importer->import($filePath);
    fwrite(STDOUT, 'Импорт успешно завершен' . PHP_EOL);
}
catch (UnsupportedFileTypeException) {
    fwrite(STDOUT, 'Данный формат файла не поддерживается' . PHP_EOL);
}
catch (UnsupportedBeanTypeException) {
    fwrite(STDOUT, 'Импорт выбранной сущности не поддерживается' . PHP_EOL);
}
catch (ParseException $e) {
    fwrite(STDOUT, 'Ошибка при парсинге файла: ' . $e->getMessage() . PHP_EOL);
}
catch (Exception $e) {
    fwrite(STDOUT, 'Неизвестная ошибка: ' . $e->getMessage() . PHP_EOL);
}
