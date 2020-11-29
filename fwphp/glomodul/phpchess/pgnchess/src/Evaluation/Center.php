<?php

namespace PGNChess\Evaluation;

use PgnChess\Board;
use PGNChess\Evaluation\Space as SpaceEvaluation;
use PGNChess\PGN\Symbol;

/**
 * Center.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class Center extends AbstractEvaluation
{
    const NAME = 'center';

    private $center = ['d4', 'd5', 'e4', 'e5'];

    public function __construct(Board $board)
    {
        parent::__construct($board);

        $this->result = [
            Symbol::WHITE => 0,
            Symbol::BLACK => 0,
        ];
    }

    public function evaluate($feature = null): array
    {
        foreach ($this->center as $square) {
            if ($piece = $this->board->getPieceByPosition($square)) {
                if (Symbol::KING !== $piece->getIdentity()) {
                    $this->result[$piece->getColor()] += $this->system[$feature][$piece->getIdentity()];
                }
            }
        }

        $spEvald = (new SpaceEvaluation($this->board))->evaluate();

        $this->result[Symbol::WHITE] += count(array_intersect($this->center, ($spEvald[Symbol::WHITE])));
        $this->result[Symbol::BLACK] += count(array_intersect($this->center, ($spEvald[Symbol::BLACK])));

        return $this->result;
    }
}
