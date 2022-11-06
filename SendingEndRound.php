<?php

class SendingEndRound
{
    const URL = 'https://int.dev.onlyplay.net/test_api/end_round';

    public function send(RoundEnd $round) {
        $sending = new Sending();

        return $sending->send($round->toString(), self::URL);
    }
}
