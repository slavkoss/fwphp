<?php

namespace PGNChess\ML\Supervised\Regression\Labeller\Primes;

use PGNChess\AbstractSnapshot;
use PGNChess\PGN\Convert;
use PGNChess\PGN\Symbol;
use PGNChess\ML\Supervised\Regression\Labeller\Primes\Labeller as PrimesLabeller;
use PGNChess\ML\Supervised\Regression\Sampler\Primes\Sampler as PrimesSampler;

/**
 * Primes labeller snapshot.
 *
 * @author Jordi Bassagañas
 * @license GPL
 * @see https://github.com/programarivm/pgn-chess/blob/master/src/AbstractSnapshot.php
 */
class Snapshot extends AbstractSnapshot
{
    public function take(): array
    {
        foreach ($this->moves as $move) {
            $this->board->play(Convert::toStdObj(Symbol::WHITE, $move[0]));
            if (isset($move[1])) {
                $this->board->play(Convert::toStdObj(Symbol::BLACK, $move[1]));
            }
            $this->snapshot[] = (new PrimesLabeller(
                (new PrimesSampler($this->board))->sample())
            )->label();
        }
        $this->normalize();

        return $this->snapshot;
    }
}
