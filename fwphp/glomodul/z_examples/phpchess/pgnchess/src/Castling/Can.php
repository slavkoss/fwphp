<?php

namespace PGNChess\Castling;

use PGNChess\Castling\Rule as CastlingRule;
use PGNChess\PGN\Symbol;

/**
 * Can castle class.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class Can
{
    /*
     * Can castle short.
     *
     * @param string $color
     * @param array $castling
     * @param \stdClass $space
     * @return bool
     */
    public static function short(string $color, array $castling, \stdClass $space): bool
    {
        return $castling[$color][Symbol::CASTLING_SHORT] &&
            !(in_array(
                CastlingRule::color($color)[Symbol::KING][Symbol::CASTLING_SHORT]['squares']['f'],
                $space->{Symbol::oppColor($color)})
             ) &&
            !(in_array(
                CastlingRule::color($color)[Symbol::KING][Symbol::CASTLING_SHORT]['squares']['g'],
                $space->{Symbol::oppColor($color)})
             );
    }

    /*
     * Can castle long.
     *
     * @param string $color
     * @param array $castling
     * @param \stdClass $space
     * @return bool
     */
    public static function long(string $color, array $castling, \stdClass $space): bool
    {
        return $castling[$color][Symbol::CASTLING_LONG] &&
            !(in_array(
                CastlingRule::color($color)[Symbol::KING][Symbol::CASTLING_LONG]['squares']['b'],
                $space->{Symbol::oppColor($color)})
             ) &&
            !(in_array(
                CastlingRule::color($color)[Symbol::KING][Symbol::CASTLING_LONG]['squares']['c'],
                $space->{Symbol::oppColor($color)})
             ) &&
            !(in_array(
                CastlingRule::color($color)[Symbol::KING][Symbol::CASTLING_LONG]['squares']['d'],
                $space->{Symbol::oppColor($color)})
             );
    }
}
