<?php

class Log
{
    function logInfo($log)
    {
        $logFilename = "log";

        if (!file_exists($logFilename)) {
            mkdir($logFilename, 0777, true);
        }

        $logFileData = $logFilename . '/log_' . date('d-M-Y') . '.log';

        file_put_contents($logFileData, $log . "\n", FILE_APPEND);
    }
}
