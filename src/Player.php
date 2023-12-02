<?php

namespace App;

class Player
{
    /**
     * @var string
     */
    public string $name;

    public int $points = 0;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function score()
    {
        $this->points++;
    }

    /**
     * @return string|void
     */
    public function toTerm()
    {
        switch ($this->points) {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
        }
    }
}