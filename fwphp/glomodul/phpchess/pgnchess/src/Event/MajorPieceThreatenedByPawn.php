<?php

namespace PGNChess\Event;

use PGNChess\PGN\Symbol;
use PGNChess\Piece\Pawn;

/**
 * A major piece is threatened by a pawn.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class MajorPieceThreatenedByPawn extends AbstractEvent
{
    public function capture(string $color): int
    {
        if ($this->board->getHistory()) {
            $last = array_slice($this->board->getHistory(), -1)[0];
            if ($last->move->color === $color && $last->move->identity === Symbol::PAWN) {
                $pawn = $this->board->getPieceByPosition($last->move->position->next);
                if (is_a($pawn, Pawn::class)) {
                    foreach ($pawn->getCaptureSquares() as $square) {
                        if ($piece = $this->board->getPieceByPosition($square)) {
                            switch (true) {
                                case Symbol::oppColor($piece->getColor()) && $piece->getIdentity() === Symbol::QUEEN:
                                    return 1;
                                case Symbol::oppColor($piece->getColor()) && $piece->getIdentity() === Symbol::ROOK:
                                    return 1;
                            }
                        }
                    }
                }
            }
        }

        return 0;
    }
}
