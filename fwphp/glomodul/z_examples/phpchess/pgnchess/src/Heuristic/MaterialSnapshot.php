<?php

namespace PGNChess\Heuristic;

use PGNChess\AbstractSnapshot;
use PGNChess\PGN\Convert;
use PGNChess\PGN\Symbol;
use PGNChess\Evaluation\Material as MaterialEvaluation;
use PGNChess\Evaluation\Value\System;

/**
 * Material snapshot.
 *
 * @author Jordi Bassagañas
 * @license GPL
 * @see https://github.com/programarivm/pgn-chess/blob/master/src/AbstractSnapshot.php
 */
class MaterialSnapshot extends AbstractSnapshot
{
    public function take(): array
    {
        foreach ($this->moves as $move) {
            $this->board->play(Convert::toStdObj(Symbol::WHITE, $move[0]));
            if (isset($move[1])) {
                $this->board->play(Convert::toStdObj(Symbol::BLACK, $move[1]));
            }
            $mtlEvald = (new MaterialEvaluation($this->board))->evaluate(System::SYSTEM_BERLINER);
            $this->snapshot[] = [
                Symbol::WHITE => $mtlEvald[Symbol::WHITE],
                Symbol::BLACK => $mtlEvald[Symbol::BLACK],
            ];
        }
        $this->normalize();

        return $this->snapshot;
    }
}
