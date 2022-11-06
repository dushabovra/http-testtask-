<?php

/**
 * Sending
 */
class Sending
{
    /**
     * @var false|resource
     */
    protected $curl;

    public function __construct()
    {
        $this->curl = curl_init();
    }

    public function __destruct()
    {
        curl_close($this->curl);
    }

    /**
     * @param string $parameters
     * @param string $url
     *
     * @return bool|string
     */
    public function send(string $parameters, string $url): ?string
    {
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_POST, 1);
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $parameters);

        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);

        return curl_exec($this->curl);
    }
}
