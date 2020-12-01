<?php

/**
*                    **HELPNS
* first namespace part PGNChess is NOT REQUIRED : vendor's name space's prefix (functional nspart)
* 2nd ns part m o d u l e is NOT REQUIRED : functional ns part = processing (behavior) 
*
* FNSPs (FUNCTIONAL NS PARTS) are ignored by fw, ee we name them as we wish.
*    We use FNSPs as description to depict WHAT CODE DOES (processing, behavior).
*    May be more functional ns parts as we wish - all are ignored !
*
* PNSP (POSITIONALnsPart) CAREFULLY! : LAST ns part (BEFORE CLSNAME IF ANY) eg "src" is DIRNAME.
*    PNSP is actually (de facto, in fact, indeedded) submodule name.
*    Path OF DIRNAME (of PNSP) is in $pp1 array, 
*        used for Autoload class to include classes in dir DIRNAME.
*    Autoload class is include, global, common, reusable.
*/
namespace PGNChess\src; //was PGNChess;

use PGNChess\PGN\Convert;
use PGNChess\PGN\Symbol;
use PGNChess\PGN\Validate;
use PGNChess\Evaluation\Attack as AttackEvaluation;
use PGNChess\Evaluation\Space as SpaceEvaluation;
use PGNChess\Evaluation\Square as SquareEvaluation;
use PGNChess\ML\Supervised\Regression\Labeller\Primes\Decoder as PrimesLabelDecoder;
use PGNChess\ML\Supervised\Regression\Sampler\Primes\Sampler as PrimesSampler;
use Rubix\ML\PersistentModel;
use Rubix\ML\Persisters\Filesystem;

//require_once __DIR__ . '/Board.php' ;

/**
 * Game class.
 *
 * A wrapper of the Board class.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
class Game
{
    /** player vs ai */
    const MODE_PVA          =  'MODE_PVA';

    /** player vs themselves */
    const MODE_PVT          =  'MODE_PVT';

    const MODEL_FOLDER      = __DIR__.'/../model';

    /**
     * Chess board.
     *
     * @var Board
     */
    private $board;

    /**
     * Mode.
     *
     * @var string
     */
    private $mode;

    /**
     * Estimator.
     *
     * @var PersistentModel
     */
    private $estimator;

    /**
     * Constructor.
     */
    public function __construct(string $mode = null)
    {
        $this->board = new Board();
        $this->mode = $mode ?? self::MODE_PVT;
        //    Error: Class 'Rubix\ML\PersistentModel' not found :
        //$this->estimator = PersistentModel::load(
        //   new Filesystem(self::MODEL_FOLDER.'/beginner.model')
        //);
    }

    /**
     * Gets the board's status.
     *
     * @return \stdClass
     */
    public function status(): \stdClass
    {
        return (object) [
            'turn' => $this->board->getTurn(),
            'castling' => $this->board->getCastling(),
            'squares' => $this->board->getSquares(),
            AttackEvaluation::NAME => $this->board->getAttack(),
            SpaceEvaluation::NAME => $this->board->getSpace(),
        ];
    }

    /**
     * Gets the history.
     *
     * @return array
     */
    public function history(): array
    {
        $history = [];

        $boardHistory = $this->board->getHistory();

        foreach ($boardHistory as $entry) {
            $history[] = (object) [
                'pgn' => $entry->move->pgn,
                'color' => $entry->move->color,
                'identity' => $entry->move->identity,
                'position' => $entry->position,
                'isCapture' => $entry->move->isCapture,
                'isCheck' => $entry->move->isCheck,
            ];
        }

        return $history;
    }

    /**
     * Gets the movetext.
     *
     * @return string
     */
    public function movetext(): string
    {
        return $this->board->getMovetext();
    }

    /**
     * Gets the pieces captured by both players.
     *
     * @return \stdClass
     */
    public function captures(): array
    {
        return $this->board->getCaptures();
    }

    /**
     * Gets an array of pieces by color.
     *
     * @param string $color
     * @return array
     */
    public function pieces(string $color): array
    {
        $result = [];

        $pieces = $this->board->getPiecesByColor(Validate::color($color));

        foreach ($pieces as $piece) {
            $result[] = (object) [
                'identity' => $piece->getIdentity(),
                'position' => $piece->getPosition(),
                'moves' => $piece->getLegalMoves(),
            ];
        }

        return $result;
    }

    /**
     * Gets a piece by its position on the board.
     *
     * @param string $square
     * @return mixed null|\stdClass
     */
    public function piece(string $square): ?\stdClass
    {
        $piece = $this->board->getPieceByPosition(Validate::square($square));

        if ($piece === null) {
            return null;
        } else {
            return (object) [
                'color' => $piece->getColor(),
                'identity' => $piece->getIdentity(),
                'position' => $piece->getPosition(),
                'moves' => $piece->getLegalMoves(),
            ];
        }
    }

    /**
     * Calculates whether the current player is checked.
     *
     * @return bool
     */
    public function isCheck(): bool
    {
        return $this->board->isCheck();
    }

    /**
     * Calculates whether the current player is mated.
     *
     * @return bool
     */
    public function isMate(): bool
    {
        return $this->board->isMate();
    }

    /**
     * Plays a chess move on the board.
     *
     * @param string $color
     * @param string $pgn
     * @return bool
     */
    public function play(string $color, string $pgn): bool
    {
        return $this->board->play(Convert::toStdObj($color, $pgn));
    }

    /**
     * AI model response to the current position.
     *
     * @return string
     */
    public function response()
    {
        $sample = (new PrimesSampler($this->board))->sample();
        $prediction = $this->estimator->predictSample($sample[Symbol::oppColor($this->board->getTurn())]);
        $decoded = (new PrimesLabelDecoder($this->board))->decode($this->board->getTurn(), $prediction);

        return $decoded;
    }
}
