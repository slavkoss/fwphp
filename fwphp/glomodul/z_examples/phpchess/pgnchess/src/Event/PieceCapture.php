<?php

namespace PGNChess\Event;

/**
 * A piece is captured.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class PieceCapture extends AbstractEvent
{
    public function capture(string $color): int
    {
        if ($this->board->getHistory()) {
            $last = array_slice($this->board->getHistory(), -1)[0];
            $this->result = (int) ($last->move->isCapture && $last->move->color === $color);
        }

        return $this->result;
    }
}
