<?php

namespace PGNChess\ML\Supervised\Regression\Labeller\Primes;

use PGNChess\Board;
use PGNChess\ML\Supervised\Regression\Labeller\Primes\Labeller as PrimesLabeller;
use PGNChess\ML\Supervised\Regression\Sampler\Primes\Sampler as PrimesSampler;
use PGNChess\PGN\Convert;
use PGNChess\PGN\Symbol;

/**
 * Primes decoder.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class Decoder
{
    private $board;

    public function __construct(Board $board)
    {
        $this->board = $board;

        $this->result = [];
    }

    /**
     * Decodes an MLP label being expressed as a linear combination of primes into a chess move.
     *
     * @return array
     */
    public function decode(string $color, float $float): string
    {
        foreach ($this->board->getPiecesByColor($color) as $piece) {
            foreach ($piece->getLegalMoves() as $square) {
                $clone = unserialize(serialize($this->board));
                switch ($piece->getIdentity()) {
                    // TODO
                    // King with castling
                    case Symbol::PAWN:
                        if ($clone->play(Convert::toStdObj($color, $square))) {
                            $sample = (new PrimesSampler($clone))->sample();
                            $this->result[] = [ $square => (new PrimesLabeller($sample))->label()[$color] ];
                        } elseif ($clone->play(Convert::toStdObj($color, $piece->getFile()."x$square"))) {
                            $sample = (new PrimesSampler($clone))->sample();
                            $this->result[] = [ $piece->getFile()."x$square" => (new PrimesLabeller($sample))->label()[$color] ];
                        }
                        break;
                    default:
                        if ($clone->play(Convert::toStdObj($color, $piece->getIdentity().$square))) {
                            $sample = (new PrimesSampler($clone))->sample();
                            $this->result[] = [ $piece->getIdentity().$square => (new PrimesLabeller($sample))->label()[$color] ];
                        } elseif ($clone->play(Convert::toStdObj($color, "{$piece->getIdentity()}x$square"))) {
                            $sample = (new PrimesSampler($clone))->sample();
                            $this->result[] = [ "{$piece->getIdentity()}x$square" => (new PrimesLabeller($sample))->label()[$color] ];
                        }
                        break;
                }
            }
        }

        usort($this->result, function ($a, $b) {
            return current($b) <=> current($a);
        });

        return $this->pgn($this->closest($float));
    }

    private function closest(float $search)
    {
        $closest = [];
        foreach ($this->result as $key => $val) {
            $closest[$key] = abs(current($val) - $search);
        }
        asort($closest);

        return current($this->result[array_key_first($closest)]);
    }

    private function pgn(float $search)
    {
        foreach ($this->result as $key => $val) {
            if ($search === current($val)) {
                return key($val);
            }
        }
    }
}
