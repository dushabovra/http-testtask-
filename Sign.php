<?php

class Sign
{
    const PROVIDER_ID = '7115';
    const KEY = '1hCm0reczwyhir8aA4pqSTVOGPpUl8JeyBXXZu06';

    /**
     * @return string
     */
    public static function getSign(): string {
        return hash_hmac('sha256', self::PROVIDER_ID, self::KEY);
    }
}
