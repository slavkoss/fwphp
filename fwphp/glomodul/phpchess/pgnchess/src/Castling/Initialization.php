<?php

namespace PGNChess\Castling;

use PGNChess\Board;
use PGNChess\Exception\CastlingException;
use PGNChess\PGN\Convert;
use PGNChess\PGN\Symbol;

/**
 * Castling initialization.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class Initialization
{
    /**
     * Validates a board's castling object during initialization.
     *
     * @param Board $board
     * @return boolean
     * @throws CastlingException
     */
    public static function validate(Board $board): bool
    {
        self::properties($board->getCastling());

        self::alreadyMoved(
            Symbol::WHITE,
            $board->getPieceByPosition('e1'),
            $board->getPieceByPosition('a1'),
            $board->getPieceByPosition('h1'),
            $board->getCastling()
        );

        self::alreadyMoved(
            Symbol::BLACK,
            $board->getPieceByPosition('e8'),
            $board->getPieceByPosition('a8'),
            $board->getPieceByPosition('h8'),
            $board->getCastling()
        );

        return true;
    }

    private static function properties($castling)
    {
        if (!empty($castling)) {
            !isset($castling[Symbol::WHITE]) ?: $w = $castling[Symbol::WHITE];
            !isset($castling[Symbol::BLACK]) ?: $b = $castling[Symbol::BLACK];
        }

        switch (true) {
            case empty($castling):
                throw new CastlingException("The castling object is empty.");
            case empty($w):
                throw new CastlingException("White's castling object is not set.");
            case count($w) !== 3:
                throw new CastlingException("White's castling object must have three properties.");
            case !isset($w['castled']):
                throw new CastlingException("White's castled property is not set.");
            case !isset($w[Symbol::CASTLING_SHORT]):
                throw new CastlingException("White's castling short property is not set.");
            case !isset($w[Symbol::CASTLING_LONG]):
                throw new CastlingException("White's castling long property is not set.");
            case empty($b):
                throw new CastlingException("Black's castling object is not set.");
            case count($b) !== 3:
                throw new CastlingException("Black's castling object must have three properties.");
            case !isset($b['castled']):
                throw new CastlingException("Black's castled property is not set.");
            case !isset($b[Symbol::CASTLING_SHORT]):
                throw new CastlingException("Black's castling short property is not set.");
            case !isset($b[Symbol::CASTLING_LONG]):
                throw new CastlingException("Black's castling long property is not set.");

        }
    }

    private static function alreadyMoved($color, $e, $a, $h, $castling)
    {
        self::alreadyMovedShort($color, $e, $a, $h, $castling);
        self::alreadyMovedLong($color, $e, $a, $h, $castling);
    }

    private static function alreadyMovedShort($color, $e, $a, $h, $castling)
    {
        if ($castling[$color][Symbol::CASTLING_SHORT]) {
            if (!(isset($e) && $e->getIdentity() === Symbol::KING && $e->getColor() === $color)) {
                throw new CastlingException("{$color} king was already moved.");
            } elseif (!(isset($h) && $h->getIdentity() === Symbol::ROOK && $h->getColor() === $color)) {
                throw new CastlingException("{$color} h rook was already moved.");
            }
        }
    }

    private static function alreadyMovedLong($color, $e, $a, $h, $castling)
    {
        if ($castling[$color][Symbol::CASTLING_LONG]) {
            if (!(isset($e) && $e->getIdentity() === Symbol::KING && $e->getColor() === $color))  {
                throw new CastlingException("{$color} king was already moved.");
            } elseif (!(isset($a) && $a->getIdentity() === Symbol::ROOK && $a->getColor() === $color)) {
                throw new CastlingException("{$color} a rook was already moved.");
            }
        }
    }
}
