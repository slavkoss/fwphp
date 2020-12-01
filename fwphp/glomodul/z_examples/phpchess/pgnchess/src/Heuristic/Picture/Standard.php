<?php

namespace PGNChess\Heuristic\Picture;

use PGNChess\AbstractPicture;
use PGNChess\Evaluation\Value\System;
use PGNChess\Evaluation\Attack as AttackEvaluation;
use PGNChess\Evaluation\Center as CenterEvaluation;
use PGNChess\Evaluation\Connectivity as ConnectivityEvaluation;
use PGNChess\Evaluation\KingSafety as KingSafetyEvaluation;
use PGNChess\Evaluation\Material as MaterialEvaluation;
use PGNChess\Evaluation\Space as SpaceEvaluation;
use PGNChess\PGN\Convert;
use PGNChess\PGN\Symbol;

class Standard extends AbstractPicture
{
    const N_DIMENSIONS = 6;

    CONST WEIGHTS = [
        601,    // meterial
        503,    // king safety
        401,    // center
        307,    // connectivity
        211,    // space
        101,    // attack
    ];

    /**
     * Takes a normalized, heuristic picture.
     *
     * @return array
     */
    public function take(): array
    {
        foreach ($this->moves as $move) {
            $this->board->play(Convert::toStdObj(Symbol::WHITE, $move[0]));
            if (isset($move[1])) {
                $this->board->play(Convert::toStdObj(Symbol::BLACK, $move[1]));
            }

            $mtlEvald = (new MaterialEvaluation($this->board))->evaluate(System::SYSTEM_BERLINER);
            $kSafetyEvald = (new KingSafetyEvaluation($this->board))->evaluate(System::SYSTEM_BERLINER);
            $ctrEvald = (new CenterEvaluation($this->board))->evaluate(System::SYSTEM_BERLINER);
            $connEvald = (new ConnectivityEvaluation($this->board))->evaluate();
            $spaceEvald = (new SpaceEvaluation($this->board))->evaluate();
            $attEvald = (new AttackEvaluation($this->board))->evaluate();

            $this->picture[Symbol::WHITE][] = [
                $mtlEvald[Symbol::WHITE] - $mtlEvald[Symbol::BLACK],
                $kSafetyEvald[Symbol::WHITE],
                $ctrEvald[Symbol::WHITE],
                $connEvald[Symbol::WHITE],
                count($spaceEvald[Symbol::WHITE]),
                count($attEvald[Symbol::WHITE]),
            ];

            $this->picture[Symbol::BLACK][] = [
                $mtlEvald[Symbol::BLACK] - $mtlEvald[Symbol::WHITE],
                $kSafetyEvald[Symbol::BLACK],
                $ctrEvald[Symbol::BLACK],
                $connEvald[Symbol::BLACK],
                count($spaceEvald[Symbol::BLACK]),
                count($attEvald[Symbol::BLACK]),
            ];
        }

        $this->normalize();

        return $this->picture;
    }

    public function evaluate()
    {
        $result = [
            Symbol::WHITE => 0,
            Symbol::BLACK => 0,
        ];

        $picture = $this->take();

        for ($i = 0; $i < self::N_DIMENSIONS; $i++) {
            $result[Symbol::WHITE] += self::WEIGHTS[$i] * end($picture[Symbol::WHITE])[$i] * 100;
            $result[Symbol::BLACK] += self::WEIGHTS[$i] * end($picture[Symbol::BLACK])[$i] * 100;
        }

        return $result;
    }
}
