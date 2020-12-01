<?php

namespace PGNChess\Heuristic;

use PGNChess\AbstractSnapshot;
use PGNChess\PGN\Convert;
use PGNChess\PGN\Symbol;
use PGNChess\Event\Check as CheckEvent;

/**
 * Check snapshot.
 *
 * @author Jordi Bassagañas
 * @license GPL
 * @see https://github.com/programarivm/pgn-chess/blob/master/src/AbstractSnapshot.php
 */
class CheckSnapshot extends AbstractSnapshot
{
    public function take(): array
    {
        foreach ($this->moves as $move) {
            $this->board->play(Convert::toStdObj(Symbol::WHITE, $move[0]));
            $w = (new CheckEvent($this->board))->capture(Symbol::WHITE);
            if (isset($move[1])) {
                $this->board->play(Convert::toStdObj(Symbol::BLACK, $move[1]));
                $b = (new CheckEvent($this->board))->capture(Symbol::BLACK);
            } else {
                $b = 0;
            }
            $this->snapshot[] = [
                Symbol::WHITE => $w,
                Symbol::BLACK => $b,
            ];
        }

        return $this->snapshot;
    }
}
