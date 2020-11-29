<?php

namespace PGNChess\Evaluation;

use PgnChess\Board;
use PGNChess\Evaluation\Square as SquareEvaluation;
use PGNChess\PGN\Symbol;

/**
 * Connectivity.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class Connectivity extends AbstractEvaluation
{
    const NAME = 'connectivity';

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
        $sqEvald = (new SquareEvaluation($this->board))->evaluate(SquareEvaluation::FEATURE_USED);

        $this->color(Symbol::WHITE, $sqEvald);
        $this->color(Symbol::BLACK, $sqEvald);

        return $this->result;
    }

    private function color(string $color, array $sqEvald)
    {
        foreach ($this->board->getPiecesByColor($color) as $piece) {
            switch ($piece->getIdentity()) {
                case Symbol::KING:
                    $this->result[$color] += count(array_intersect(array_values((array)$piece->getScope()), $sqEvald[$color]));
                    break;
                case Symbol::KNIGHT:
                    $this->result[$color] += count(array_intersect($piece->getScope()->jumps, $sqEvald[$color]));
                    break;
                case Symbol::PAWN:
                    $this->result[$color] += count(array_intersect($piece->getCaptureSquares(), $sqEvald[$color]));
                    break;
                default:
                    $this->result[$color] += count(
                        array_intersect(
                            array_merge(...array_values((array)$piece->getScope())),
                            $sqEvald[$color]
                        )
                    );
                    break;
            }
        }
    }
}
