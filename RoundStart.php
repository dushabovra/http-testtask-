<?php

/**
 * Round parameter
 */
class RoundStart
{
    /**
     * @var string
     */
    protected string $round;

    /**
     * @var string
     */
    protected string $player;

    /**
     * @param string $round
     *
     * @return $this
     */
    public function setRound(string $round): RoundStart
    {
        $this->round = $round;

        return $this;
    }

    /**
     * @return string
     */
    public function getRound(): string
    {
        return $this->round;
    }

    /**
     * @return integer
     */
    public function getProvider(): int
    {
        return ++Provider::$id;
    }

    /**
     * @param string $player
     *
     * @return $this
     */
    public function setPlayer(string $player): RoundStart
    {
        $this->player = $player;

        return $this;
    }

    /**
     * @return string
     */
    public function getPlayer(): string
    {
        return $this->player;
    }

    /**
     * @return string
     */
    public function getSign(): string
    {
        return Sign::getSign();
    }

    /**
     * @return string
     */
    public function toString(): string
    {
        return http_build_query([
            'round_id' => $this->getRound(),
            'provider_id' => $this->getProvider(),
            'player_id' => $this->getPlayer(),
            'sign' => $this->getSign()
        ]);
    }
}
