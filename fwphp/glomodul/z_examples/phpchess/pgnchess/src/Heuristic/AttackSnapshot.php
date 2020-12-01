<?php

namespace PGNChess\Heuristic;

use PGNChess\AbstractSnapshot;
use PGNChess\PGN\Convert;
use PGNChess\PGN\Symbol;
use PGNChess\Evaluation\Attack as AttackEvaluation;

/**
 * Attack snapshot.
 *
 * @author Jordi Bassagañas
 * @license GPL
 * @see https://github.com/programarivm/pgn-chess/blob/master/src/AbstractSnapshot.php
 */
class AttackSnapshot extends AbstractSnapshot
{
    public function take(): array
    {
        foreach ($this->moves as $move) {
            $this->board->play(Convert::toStdObj(Symbol::WHITE, $move[0]));
            if (isset($move[1])) {
                $this->board->play(Convert::toStdObj(Symbol::BLACK, $move[1]));
            }
            $attEvald = (new AttackEvaluation($this->board))->evaluate();
            $this->snapshot[] = [
                Symbol::WHITE => count($attEvald[Symbol::WHITE]),
                Symbol::BLACK => count($attEvald[Symbol::BLACK]),
            ];
        }
        $this->normalize();

        return $this->snapshot;
    }
}
