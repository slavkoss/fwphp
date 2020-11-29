<?php

namespace PGNChess\Evaluation;

use PgnChess\Board;
use PGNChess\Evaluation\Attack as AttackEvaluation;
use PGNChess\Evaluation\Space as SpaceEvaluation;
use PGNChess\PGN\Symbol;

/**
 * King safety.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class KingSafety extends AbstractEvaluation
{
    const NAME = 'safety';

    public function __construct(Board $board)
    {
        parent::__construct($board);

        $this->result = [
            Symbol::WHITE => 1,
            Symbol::BLACK => 1,
        ];
    }

    public function evaluate($feature = null): array
    {
        $attEvald = (new AttackEvaluation($this->board))->evaluate();
        $spEvald = (new SpaceEvaluation($this->board))->evaluate();

        $this->color(Symbol::WHITE, $attEvald, $spEvald);
        $this->color(Symbol::BLACK, $attEvald, $spEvald);

        return $this->result;
    }

    private function color(string $color, array $attEvald, array $spEvald)
    {
        $king = $this->board->getPiece($color, Symbol::KING);
        foreach ($king->getScope() as $key => $sq) {
            if ($piece = $this->board->getPieceByPosition($sq)) {
                if ($piece->getColor() === $king->getOppColor()) {
                    $this->result[$color] -= 1;
                }
            }
            if (in_array($sq, $attEvald[$king->getOppColor()])) {
                $this->result[$color] -= 1;
            }
            if (in_array($sq, $spEvald[$king->getOppColor()])) {
                $this->result[$color] -= 1;
            }
        }
    }
}
