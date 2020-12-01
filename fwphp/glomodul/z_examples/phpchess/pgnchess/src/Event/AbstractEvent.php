<?php

namespace PGNChess\Event;

use PgnChess\Board;

/**
 * Abstract event.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
abstract class AbstractEvent
{
    protected $board;

    protected $result = 0;

    public function __construct(Board $board)
    {
        $this->board = $board;
    }

    abstract public function capture(string $color): int;
}
