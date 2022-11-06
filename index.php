<?php
    declare(strict_types=1);

    spl_autoload_register(function ($className) {
        include $className . '.php';
    });

    $directory = 'requests';

    $array = array_diff(scandir($directory), array('.', '..'));

    $parser = new Parser();

    $parserJSON = new ParserJSON();
    $parserXML = new ParserXML();

    $sendingEndRound = new SendingEndRound();
    $sendingStartRound = new SendingStartRound();

    $log = new Log();

    foreach ($array as $item) {
        if ($parser->isJSON($directory . '/' . $item)) {
            $json = $parserJSON->get($directory . '/' . $item);

            if ($json['reward']) {
                $round = new RoundEnd();
                $round->setRound($json['roundId']);
                $round->setReward((int)$json['reward']);

                $log->logInfo($sendingEndRound->send($round));
            }

            if ($json['playerId']) {
                $round = new RoundStart();
                $round->setRound($json['roundId']);
                $round->setPlayer($json['playerId']);

                $log->logInfo($sendingStartRound->send($round));
            }
        }
        if ($parser->isXML($directory . '/' . $item)) {
            $xml = (array)$parserXML->get($directory . '/' . $item);

            if ($xml['player-id']) {
                $round = new RoundStart();
                $round->setRound($xml['round-id']);
                $round->setPlayer($xml['player-id']);

                $log->logInfo($sendingStartRound->send($round));
            }

            if ($xml['reward']) {
                $round = new RoundEnd();
                $round->setRound($xml['round-id']);
                $round->setReward((int)$xml['reward']);

                $log->logInfo($sendingEndRound->send($round));
            }
        }

        sleep(3);
    }
