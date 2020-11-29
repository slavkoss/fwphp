<?php

namespace PGNChess\ML\Supervised\Regression\Labeller\Primes;

use PGNChess\Event\Picture\Standard as StandardEventPicture;
use PGNChess\Heuristic\Picture\Standard as StandardHeuristicPicture;
use PGNChess\PGN\Symbol;

/**
 * Primes labeller.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class Labeller
{
    private $sample;

    private $label;

    private $weights;

    public function __construct($sample)
    {
        $this->sample = $sample;

        $this->label = [
            Symbol::WHITE => 0,
            Symbol::BLACK => 0,
        ];

        $this->weights = array_merge(
            array_fill(0, StandardEventPicture::N_DIMENSIONS, 0),
            StandardHeuristicPicture::WEIGHTS
        );
    }

    public function label(): array
    {
        foreach ($this->sample as $color => $arr) {
            foreach ($arr as $key => $val) {
                $this->label[$color] += $this->weights[$key] * $val * 100;
            }
        }

        return $this->label;
    }
}
