<?php

namespace PGNChess\Heuristic;

use PGNChess\AbstractSnapshot;
use PGNChess\PGN\Convert;
use PGNChess\PGN\Symbol;
use PGNChess\Evaluation\Space as SpaceEvaluation;

/**
 * Space snapshot.
 *
 * @author Jordi Bassagañas
 * @license GPL
 * @see https://github.com/programarivm/pgn-chess/blob/master/src/AbstractSnapshot.php
 */
class SpaceSnapshot extends AbstractSnapshot
{
    public function take(): array
    {
        foreach ($this->moves as $move) {
            $this->board->play(Convert::toStdObj(Symbol::WHITE, $move[0]));
            if (isset($move[1])) {
                $this->board->play(Convert::toStdObj(Symbol::BLACK, $move[1]));
            }
            $spEvald = (new SpaceEvaluation($this->board))->evaluate();
            $this->snapshot[] = [
                Symbol::WHITE => count($spEvald[Symbol::WHITE]),
                Symbol::BLACK => count($spEvald[Symbol::BLACK]),
            ];
        }
        $this->normalize();

        return $this->snapshot;
    }
}
