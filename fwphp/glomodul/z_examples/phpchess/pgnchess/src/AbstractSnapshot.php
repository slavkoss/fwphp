<?php

namespace PGNChess;

use PGNChess\PGN\Symbol;

/**
 * Abstract snapshot.
 *
 * A so-called snapshot is intended to capture a particular feature of a chess game
 * mainly for the purpose of being plotted on a chart for further visual study.
 *
 * So for example, heuristic snapshots such as attack, center or material, are
 * helpful to plot charts and get insights on the efficiency of programmer-defined
 * heuristic evaluation functions.
 *
 * @author Jordi Bassagañas
 * @license GPL
 * @see https://github.com/programarivm/pgn-chess/tree/master/src/Heuristic
 */
abstract class AbstractSnapshot extends Player
{
    protected $snapshot = [];

    abstract public function take(): array;

    /**
     * Scales the snapshot to have values between 0 and 1.
     */
    protected function normalize()
    {
        $values = array_merge(
            array_column($this->snapshot, Symbol::WHITE),
            array_column($this->snapshot, Symbol::BLACK)
        );

        if ($values) {
            $min = min($values);
            $max = max($values);
            if ($max - $min > 0) {
                foreach ($this->snapshot as $key => $val) {
                    $this->snapshot[$key][Symbol::WHITE] = round(($val[Symbol::WHITE] - $min) / ($max - $min), 2);
                    $this->snapshot[$key][Symbol::BLACK] = round(($val[Symbol::BLACK] - $min) / ($max - $min), 2);
                }
            }
        }
    }
}
