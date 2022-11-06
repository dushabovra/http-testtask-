<?php

/**
 * ParserJSON
 */
class ParserJSON
{
    /**
     * @param string $fileName
     *
     * @return mixed
     */
    public function get(string $fileName)
    {
        $string = file_get_contents($fileName);

        return json_decode($string, true);
    }
}
