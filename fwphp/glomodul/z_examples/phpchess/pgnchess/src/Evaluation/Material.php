<?php

namespace PGNChess\Evaluation;

use PgnChess\Board;
use PGNChess\PGN\Symbol;

/**
 * Material.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class Material extends AbstractEvaluation
{
    const NAME = 'material';

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
        foreach ($this->board->getPiecesByColor(Symbol::WHITE) as $piece) {
            if ($piece->getIdentity() !== Symbol::KING) {
                $this->result[Symbol::WHITE] += $this->system[$feature][$piece->getIdentity()];
            }
        }
        foreach ($this->board->getPiecesByColor(Symbol::BLACK) as $piece) {
            if ($piece->getIdentity() !== Symbol::KING) {
                $this->result[Symbol::BLACK] += $this->system[$feature][$piece->getIdentity()];
            }
        }

        return $this->result;
    }
}
