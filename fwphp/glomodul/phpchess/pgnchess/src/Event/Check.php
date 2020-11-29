<?php

namespace PGNChess\Event;

use PGNChess\PGN\Symbol;

/**
 * A player is in check.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class Check extends AbstractEvent
{
    public function capture(string $color): int
    {
        $this->result = (int) (Symbol::oppColor($this->board->getTurn()) === $color && $this->board->isCheck());

        return $this->result;
    }
}
