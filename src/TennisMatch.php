<?php

namespace App;

/**
 * @class TennisMatch
 */
class TennisMatch
{
    /**
     * @var Player
     */
    protected Player $playerOne;

    /**
     * @var Player
     */
    protected Player $playerTwo;

    /**
     * @param Player $playerOne
     * @param Player $playerTwo
     */
    public function __construct(Player $playerOne, Player $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    /**
     * @return string
     */
    public function score(): string
    {
        if ($this->hasWinner()) {
            return 'Winner: ' . $this->leader()->name;
        }

        if ($this->hasAdvantage()) {
            return 'Advantage: ' . $this->leader()->name;
        }

        if ($this->isDeuce()) {
            return 'deuce';
        }

        return sprintf(
            "%s-%s",
            $this->playerOne->toTerm(),
            $this->playerTwo->toTerm()
        );
    }

    /**
     * @param Player $player
     * @return void
     */
    public function pointTo(Player $player): void
    {
        $player->score();
    }

    /**
     * @return bool
     */
    protected function hasWinner(): bool
    {
        if ($this->playerOne->points < 4 && $this->playerTwo->points < 4) {
            return false;
        }
        return abs($this->playerOne->points - $this->playerTwo->points) >= 2;
    }

    /**
     * @return Player
     */
    protected function leader(): Player
    {
        return $this->playerOne->points > $this->playerTwo->points ? $this->playerOne : $this->playerTwo;
    }

    /**
     * @return bool
     */
    protected function isDeuce(): bool
    {
        if (!$this->hasReachedDeuceThreshold()) {
            return false;
        }
        return  $this->playerOne->points === $this->playerTwo->points;
    }

    /**
     * @return bool
     */
    protected function hasAdvantage(): bool
    {
        if ($this->hasReachedDeuceThreshold()) {
            return !$this->isDeuce();
        }

        return false;
    }

    /**
     * @return bool
     */
    protected function hasReachedDeuceThreshold(): bool
    {
        return $this->playerOne->points >= 3 && $this->playerTwo->points >= 3;
    }
}