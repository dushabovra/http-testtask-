<?php

/**
 * ParserXML
 */
class ParserXML
{
    /**
     * @param string $fileName
     *
     * @return $1|false|SimpleXMLElement
     */
    public function get(string $fileName)
    {
        return simplexml_load_file($fileName);
    }
}
