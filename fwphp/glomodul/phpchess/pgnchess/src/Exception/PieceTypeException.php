<?php

namespace PGNChess\Exception;

use PGNChess\Exception;

/**
 * Thrown when dealing with wrong piece types.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
final class PieceTypeException extends \InvalidArgumentException implements Exception
{

}
