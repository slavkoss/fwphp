<?php

namespace PGNChess\Heuristic;

use PGNChess\AbstractSnapshot;
use PGNChess\PGN\Convert;
use PGNChess\PGN\Symbol;
use PGNChess\Evaluation\Center as CenterEvaluation;
use PGNChess\Evaluation\Value\System;

/**
 * Center snapshot.
 *
 * @author Jordi Bassagañas
 * @license GPL
 * @see https://github.com/programarivm/pgn-chess/blob/master/src/AbstractSnapshot.php
 */
class CenterSnapshot extends AbstractSnapshot
{
    public function take(): array
    {
        foreach ($this->moves as $move) {
            $this->board->play(Convert::toStdObj(Symbol::WHITE, $move[0]));
            if (isset($move[1])) {
                $this->board->play(Convert::toStdObj(Symbol::BLACK, $move[1]));
            }
            $ctrEvald = (new CenterEvaluation($this->board))->evaluate(System::SYSTEM_BERLINER);
            $this->snapshot[] = [
                Symbol::WHITE => $ctrEvald[Symbol::WHITE],
                Symbol::BLACK => $ctrEvald[Symbol::BLACK],
            ];
        }
        $this->normalize();

        return $this->snapshot;
    }
}
