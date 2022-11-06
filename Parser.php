<?php

/**
 * Parser
 */
class Parser
{
    const XML = 'text/xml';
    const JSON = 'application/json';

    /**
     * @param string $path
     *
     * @return bool
     */
    public function isXML(string $path): bool {
        return mime_content_type($path) == self::XML;
    }

    /**
     * @param string $path
     *
     * @return bool
     */
    public function isJSON(string $path): bool {
        return mime_content_type($path) == self::JSON;
    }
}
