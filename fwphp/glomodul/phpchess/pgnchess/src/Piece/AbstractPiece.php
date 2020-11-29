<?php

namespace PGNChess\Piece;

use PGNChess\Piece\Piece as piece_intf;
use PGNChess\PGN\Symbol;
use PGNChess\PGN\Validate;

//require_once __DIR__ . '/Piece.php' ;

/**
 * Class that represents a chess piece.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
abstract class AbstractPiece implements piece_intf
{
    /**
     * The piece's color in PGN format.
     *
     * @var string
     */
    protected $color;

    /**
     * The piece's position on the board.
     *
     * @var \stdClass
     */
    protected $position;

    /**
     * The piece's scope.
     *
     * @var array
     */
    protected $scope = [];

    /**
     * The piece's identity in PGN format.
     *
     * @var string
     */
    protected $identity;

    /**
     * The piece's next move to be performed on the board.
     *
     * @var \stdClass
     */
    protected $move;

    /**
     * The legal moves that the piece can carry out.
     *
     * @var array
     */
    protected $legalMoves;

    /**
     * Chess board status.
     *
     * @var \stdClass
     */
    protected $boardStatus;

    /**
     * Space evaluation of the board.
     *
     * @var \stdClass
     */
    protected $space;

    /**
     * Constructor.
     *
     * @param string $color
     * @param string $square
     * @param string $identity
     */
    public function __construct(string $color, string $square, string $identity)
    {
        $this->color = Validate::color($color);
        $this->position = Validate::square($square);
        $this->identity = $identity;
    }

    /**
     * Gets the legal moves that a piece can perform on the board.
     *
     * @return array The legal moves that the piece can perform.
     */
    abstract public function getLegalMoves(): array;

    /**
     * Calculates the piece's scope.
     */
    abstract protected function scope(): void;

    /**
     * Gets the piece's color.
     *
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * Gets the piece's opposite color.
     *
     * @return string
     */
    public function getOppColor(): string
    {
        if ($this->color == Symbol::WHITE) {
            return Symbol::BLACK;
        } else {
            return Symbol::WHITE;
        }
    }

    /**
     * Gets the piece's position on the board.
     *
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * Gets the piece's scope.
     *
     * @return \stdClass
     */
    public function getScope(): \stdClass
    {
        return $this->scope;
    }

    /**
     * Gets the piece's identity.
     *
     * @return string
     */
    public function getIdentity(): string
    {
        return $this->identity;
    }

    /**
     * Gets the piece's move.
     *
     * @return \stdClass
     */
    public function getMove()
    {
        return $this->move;
    }

    /**
     * Sets the piece's next move.
     *
     * @param \stdClass $move
     */
    public function setMove(\stdClass $move): Piece
    {
        $this->move = $move;

        return $this;
    }

    /**
     * Sets the board status property.
     *
     * @param \stdClass $boardStatus
     */
    public function setBoardStatus(\stdClass $boardStatus): void
    {
        $this->boardStatus = $boardStatus;
    }

    /**
     * Sets the board's space evaluation.
     *
     * @param \stdClass $boardStatus
     */
    public function setSpace(\stdClass $space): void
    {
        $this->space = $space;
    }

    /**
     * Checks whether or not the piece can be moved.
     *
     * @return boolean true if the piece can be moved; otherwise false
     */
    public function isMovable(): bool
    {
        if (isset($this->move)) {
            return in_array($this->move->position->next, $this->getLegalMoves());
        } else {
            return false;
        }
    }
}
