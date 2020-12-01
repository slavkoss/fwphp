<?php

namespace PGNChess\ML\Supervised\Regression\Sampler\Primes;

use PGNChess\Board;
use PGNChess\Event\Picture\Standard as StandardEventPicture;
use PGNChess\Heuristic\Picture\Standard as StandardHeuristicPicture;
use PGNChess\PGN\Symbol;

class Sampler
{
    private $board;

    private $sample;

    public function __construct(Board $board)
    {
        $this->board = $board;

        $this->sample = [
            Symbol::WHITE => [],
            Symbol::BLACK => [],
        ];
    }

    public function sample(): array
    {
        $eventPicture = (new StandardEventPicture($this->board->getMovetext()))->take();
        $heuristicPicture = (new StandardHeuristicPicture($this->board->getMovetext()))->take();

        $this->sample = [
            Symbol::WHITE => array_merge(
                end($eventPicture[Symbol::WHITE]),
                end($heuristicPicture[Symbol::WHITE])
            ),
            Symbol::BLACK => array_merge(
                end($eventPicture[Symbol::BLACK]),
                end($heuristicPicture[Symbol::BLACK])
            ),
        ];

        return $this->sample;
    }
}
