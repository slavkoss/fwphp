<?php

namespace PGNChess\src;

use PGNChess\src\Board;
use PGNChess\PGN\Convert;
use PGNChess\PGN\Symbol;

/**
 * Player.
 *
 * Allows to play a chess game in the form of a PGN movetext in order for the chess
 * board to get to a paraticular status.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class Player
{
    protected $board;

    protected $moves;

    public function __construct(string $movetext)
    {
        $this->board = new Board;
        $this->moves = $this->extract($this->filter($movetext));
    }

    public function getBoard()
    {
        return $this->board;
    }

    public function getMoves()
    {
        return $this->moves;
    }

    public function play()
    {
        foreach ($this->getMoves() as $move) {
            $this->getBoard()->play(Convert::toStdObj(Symbol::WHITE, $move[0]));
            if (isset($move[1])) {
                $this->getBoard()->play(Convert::toStdObj(Symbol::BLACK, $move[1]));
            }
        }

        return $this;
    }

    protected function extract(string $movetext)
    {
        $moves = [];
        $pairs = array_filter(preg_split('/[0-9]+\./', $movetext));
        foreach ($pairs as $pair) {
            $moves[] = array_values(array_filter(explode(' ', $pair)));
        }

        return $moves;
    }

    protected function filter(string $movetext)
    {
        return str_replace(
            [
                Symbol::RESULT_WHITE_WINS,
                Symbol::RESULT_BLACK_WINS,
                Symbol::RESULT_DRAW,
                Symbol::RESULT_UNKNOWN,
            ],
            '',
            $movetext
        );
    }
}
