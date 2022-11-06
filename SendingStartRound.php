<?php

class SendingStartRound
{
    const URL = 'https://int.dev.onlyplay.net/test_api/start_round';

    public function send(RoundStart $round) {
        $sending = new Sending();

        return $sending->send($round->toString(), self::URL);
    }
}
