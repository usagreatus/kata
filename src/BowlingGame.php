<?php

namespace App;

class BowlingGame
{
    /**
     * @var array
     */
    protected array $rolls = [];

    /**
     * @param int $pins
     * @return void
     */
    public function roll(int $pins): void
    {
        $this->rolls[] = $pins;
    }

    /**
     * @return int
     */
    public function score(): int
    {
        return array_sum($this->rolls);
    }
}