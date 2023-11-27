<?php


use App\BowlingGame;
use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    /** @test */
    function it_scores_a_gutter_game_as_zero()
    {
        $game = new BowlingGame();
        foreach (range(1, 20) as $roll) {
            $game->roll(0);
        }
        $this->assertSame(0, $this->score());
    }
}
