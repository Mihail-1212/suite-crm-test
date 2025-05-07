<?php

require_once('XmlReaderTrait.php');
require_once('FileParser.php');
require_once(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'exceptions.php');

class ContactXmlParser extends FileParser
{
    use XmlReaderTrait;

    public function parseFile(string $filePath): array
    {
        $document = $this->parseXml($filePath);

        if (!is_iterable($document->contact))
            throw new ParseException('File content have no contact list');

        $contacts = [];
        foreach ($document->contact as $parsedContact) {
            $contacts[] = $this->createBeanContactByParsedContact($parsedContact);
        }
        return $contacts;
    }

    protected function createBeanContactByParsedContact(mixed $parsedContact): SugarBean
    {
        $beanContact = \BeanFactory::getBean('Contacts');

        $beanContact->first_name = $parsedContact->FirstName;
        $beanContact->last_name = $parsedContact->LastName;
        $beanContact->title = $parsedContact->Title;
        $beanContact->department = $parsedContact->Info?->department;
        $beanContact->do_not_call = $parsedContact->Info?->Do_not_call;
        $beanContact->email1 = $parsedContact->Email;

        return $beanContact;
    }

}