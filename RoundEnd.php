<?php

/**
 * RoundEnd parameter
 */
class RoundEnd
{
    /**
     * @var string
     */
    protected string $round;

    /**
     * @var string
     */
    protected string $reward;

    /**
     * @param string $round
     *
     * @return $this
     */
    public function setRound(string $round): RoundEnd
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
     * @param integer $reward
     *
     * @return $this
     */
    public function setReward(int $reward): RoundEnd
    {
        $this->reward = $reward;

        return $this;
    }

    /**
     * @return integer
     */
    public function getReward(): int
    {
        return $this->reward;
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
            'reward' => $this->getReward(),
            'sign' => $this->getSign()
        ]);
    }
}
