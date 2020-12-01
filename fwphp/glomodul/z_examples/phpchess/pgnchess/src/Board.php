<?php

namespace PGNChess\src; //was PGNChess;

use PGNChess\PGN\Symbol;
use PGNChess\Castling\Rule as CastlingRule;
use PGNChess\Piece\Rook;
use PGNChess\Piece\Bishop;
use PGNChess\Piece\King;
use PGNChess\Piece\Knight;
use PGNChess\Piece\Pawn;
use PGNChess\Piece\Piece;
use PGNChess\Piece\Queen;

use PGNChess\Castling\Can as CastlingCan;
use PGNChess\Castling\Initialization as CastlingInit;
use PGNChess\Db\Pdo;
use PGNChess\Exception\BoardException;

use PGNChess\Evaluation\Attack as AttackEvaluation;
use PGNChess\Evaluation\Space as SpaceEvaluation;
use PGNChess\Evaluation\Square as SquareEvaluation;

use PGNChess\PGN\Convert;
use PGNChess\PGN\Move;
use PGNChess\PGN\Validate;
use PGNChess\Piece\AbstractPiece;
use PGNChess\Piece\Type\RookType;


//require_once __DIR__ . '/PGN/Symbol.php' ;
//require_once __DIR__ . '/Castling/Rule.php' ;
//require_once __DIR__ . '/Piece/Rook.php' ;



/**
 * Chess board.
 *
 * @author Jordi Bassagañas
 * @license GPL
 */
final class Board extends \SplObjectStorage
{
    /**
     * Current player's turn.
     *
     * @var string
     */
    private $turn;

    /**
     * Free/used squares.
     *
     * @var \stdClass
     */
    private $squares;

    /**
     * Squares being attacked.
     *
     * @var \stdClass
     */
    private $attack;

    /**
     * Squares being controlled.
     *
     * @var \stdClass
     */
    private $space;

    /**
     * Captured pieces.
     *
     * @var array
     */
    private $captures = [
        Symbol::WHITE => [],
        Symbol::BLACK => [],
    ];

    /**
     * History.
     *
     * @var array
     */
    private $history = [];

    /**
     * Castling status.
     *
     * @var array
     */
    private $castling = [
        Symbol::WHITE => [
            CastlingRule::IS_CASTLED => false,
            Symbol::CASTLING_SHORT => true,
            Symbol::CASTLING_LONG => true,
        ],
        Symbol::BLACK => [
            CastlingRule::IS_CASTLED => false,
            Symbol::CASTLING_SHORT => true,
            Symbol::CASTLING_LONG => true,
        ],
    ];

    /**
     * Constructor.
     *
     * @param array $pieces
     * @param array $castling
     */
    public function __construct(array $pieces = null, array $castling = null)
    {
        if (empty($pieces)) {
            $this->attach(new Rook(Symbol::WHITE, 'a1', RookType::CASTLING_LONG));
            $this->attach(new Knight(Symbol::WHITE, 'b1'));
            $this->attach(new Bishop(Symbol::WHITE, 'c1'));
            $this->attach(new Queen(Symbol::WHITE, 'd1'));
            $this->attach(new King(Symbol::WHITE, 'e1'));
            $this->attach(new Bishop(Symbol::WHITE, 'f1'));
            $this->attach(new Knight(Symbol::WHITE, 'g1'));
            $this->attach(new Rook(Symbol::WHITE, 'h1', RookType::CASTLING_SHORT));
            $this->attach(new Pawn(Symbol::WHITE, 'a2'));
            $this->attach(new Pawn(Symbol::WHITE, 'b2'));
            $this->attach(new Pawn(Symbol::WHITE, 'c2'));
            $this->attach(new Pawn(Symbol::WHITE, 'd2'));
            $this->attach(new Pawn(Symbol::WHITE, 'e2'));
            $this->attach(new Pawn(Symbol::WHITE, 'f2'));
            $this->attach(new Pawn(Symbol::WHITE, 'g2'));
            $this->attach(new Pawn(Symbol::WHITE, 'h2'));
            $this->attach(new Rook(Symbol::BLACK, 'a8', RookType::CASTLING_LONG));
            $this->attach(new Knight(Symbol::BLACK, 'b8'));
            $this->attach(new Bishop(Symbol::BLACK, 'c8'));
            $this->attach(new Queen(Symbol::BLACK, 'd8'));
            $this->attach(new King(Symbol::BLACK, 'e8'));
            $this->attach(new Bishop(Symbol::BLACK, 'f8'));
            $this->attach(new Knight(Symbol::BLACK, 'g8'));
            $this->attach(new Rook(Symbol::BLACK, 'h8', RookType::CASTLING_SHORT));
            $this->attach(new Pawn(Symbol::BLACK, 'a7'));
            $this->attach(new Pawn(Symbol::BLACK, 'b7'));
            $this->attach(new Pawn(Symbol::BLACK, 'c7'));
            $this->attach(new Pawn(Symbol::BLACK, 'd7'));
            $this->attach(new Pawn(Symbol::BLACK, 'e7'));
            $this->attach(new Pawn(Symbol::BLACK, 'f7'));
            $this->attach(new Pawn(Symbol::BLACK, 'g7'));
            $this->attach(new Pawn(Symbol::BLACK, 'h7'));
        } else {
            $this->init($pieces, $castling);
        }

        $this->refresh();
    }

    /**
     * Gets the current turn.
     *
     * @return string
     */
    public function getTurn(): string
    {
        return $this->turn;
    }

    /**
     * Sets the current turn.
     *
     * @param string $color
     * @return \PGNChess\Board
     */
    public function setTurn(string $color): Board
    {
        $this->turn = Validate::color($color);

        return $this;
    }

    /**
     * Gets the board's square evaluation.
     *
     * @return \stdClass
     */
    public function getSquares(): \stdClass
    {
        return $this->squares;
    }

    /**
     * Gets the board's attack evaluation.
     *
     * @return \stdClass
     */
    public function getAttack(): \stdClass
    {
        return $this->attack;
    }

    /**
     * Gets the board's space evaluation.
     *
     * @return \stdClass
     */
    public function getSpace(): \stdClass
    {
        return $this->space;
    }

    /**
     * Gets the castling status.
     *
     * @return array
     */
    public function getCastling(): ?array
    {
        return $this->castling;
    }

    /**
     * Gets the captured pieces.
     *
     * @return \stdClass
     */
    public function getCaptures(): array
    {
        return $this->captures;
    }

    /**
     * Adds a new element to the captured pieces.
     *
     * @param string    $color
     * @param \stdClass $capture
     * @return \PGNChess\Board
     */
    private function pushCapture(string $color, \stdClass $capture): Board
    {
        $this->captures[$color][] = $capture;

        return $this;
    }

    /**
     * Removes an element from the captured pieces.
     *
     * @param string $color
     */
    private function popCapture(string $color): Board
    {
        array_pop($this->captures[$color]);

        return $this;
    }

    /**
     * Gets the history.
     *
     * @return array
     */
    public function getHistory(): array
    {
        return $this->history;
    }

    /**
     * Gets the movetext.
     *
     * @return string
     */
    public function getMovetext(): string
    {
        $movetext = '';
        foreach ($this->history as $key => $val) {
            $key % 2 === 0
                ? $movetext .= $key + 1 . ".{$val->move->pgn}"
                : $movetext .= " {$val->move->pgn} ";
        }

        return trim($movetext);
    }

    /**
     * Adds a new element to the history.
     *
     * @param \stdClass $piece The piece's previous position along with a move object
     * @return \PGNChess\Board
     */
    private function pushHistory(Piece $piece): Board
    {
        $this->history[] = (object) [
            'position' => $piece->getPosition(),
            'move' => $piece->getMove(),
        ];

        return $this;
    }

    /**
     * Removes an element from the history.
     *
     * @param string $color
     */
    private function popHistory(): Board
    {
        array_pop($this->history);

        return $this;
    }

    /**
     * Gets the first piece on the board matching the search criteria.
     *
     * @param string $color
     * @param string $identity
     * @return mixed \PGNChess\Piece\Piece|null
     */
    public function getPiece(string $color, string $identity): ?Piece
    {
        $this->rewind();
        while ($this->valid()) {
            $piece = $this->current();
            if ($piece->getColor() === $color && $piece->getIdentity() === $identity) {
                return $piece;
            }
            $this->next();
        }

        return null;
    }

    /**
     * Gets all pieces by color.
     *
     * @param string $color
     * @return array
     */
    public function getPiecesByColor(string $color): array
    {
        $pieces = [];
        $this->rewind();
        while ($this->valid()) {
            $piece = $this->current();
            $piece->getColor() === $color ? $pieces[] = $piece : false;
            $this->next();
        }

        return $pieces;
    }

    /**
     * Gets a piece by its position on the board.
     *
     * @param string $square
     * @return mixed \PGNChess\Piece\Piece|null
     */
    public function getPieceByPosition(string $square): ?Piece
    {
        $this->rewind();
        while ($this->valid()) {
            $piece = $this->current();
            if ($piece->getPosition() === $square) {
                return $piece;
            }
            $this->next();
        }

        return null;
    }

    /**
     * Initializes the board.
     *
     * @param array $pieces
     * @param array $castling
     * @throws \PGNChess\Exception\CastlingException
     */
    private function init(array $pieces, $castling)
    {
        foreach ($pieces as $piece) {
            $this->attach($piece);
        }
        $this->castling = $castling;

        CastlingInit::validate($this);
    }

    /**
     * Picks a piece to be moved.
     *
     * @param \stdClass $move
     * @return array The piece(s) matching the PGN move; otherwise null
     * @throws \PGNChess\Exception\BoardException
     */
    private function pickPiece(\stdClass $move): array
    {
        $found = [];
        foreach ($this->getPiecesByColor($move->color) as $piece) {
            if ($piece->getIdentity() === $move->identity) {
                switch ($piece->getIdentity()) {
                    case Symbol::KING:
                        return [$piece->setMove($move)];
                        break;
                    default:
                        if (preg_match("/{$move->position->current}/", $piece->getPosition())) {
                            $found[] = $piece->setMove($move);
                        }
                        break;
                }
            }
        }

        if (empty($found)) {
            throw new BoardException(
                "This piece does not exist: {$move->color} {$move->identity} on {$move->position->current}."
            );
        } else {
            return $found;
        }
    }

    /**
     * Captures a piece.
     *
     * @param \PGNChess\Piece\Piece $piece
     * @return \PGNChess\Board
     */
    private function capture(Piece $piece): Board
    {
        $piece->getLegalMoves(); // this creates the enPassantSquare property in the pawn's position object
        if ($piece->getIdentity() === Symbol::PAWN && !empty($piece->getEnPassantSquare()) &&
            empty($this->getPieceByPosition($piece->getMove()->position->next))
           ) {
            if ($captured = $this->getPieceByPosition($piece->getEnPassantSquare())) {
                $capturedData = (object) [
                    'identity' => $captured->getIdentity(),
                    'position' => $piece->getEnPassantSquare(),
                ];
            }
        } else {
            if ($captured = $this->getPieceByPosition($piece->getMove()->position->next)) {
                $capturedData = (object) [
                    'identity' => $captured->getIdentity(),
                    'position' => $captured->getPosition(),
                ];
            }
        }
        if ($captured) {
            $capturingData = (object) [
                'identity' => $piece->getIdentity(),
                'position' => $piece->getPosition(),
            ];
            $piece->getIdentity() === Symbol::ROOK ? $capturingData->type = $piece->getType() : null;
            $captured->getIdentity() === Symbol::ROOK ? $capturedData->type = $captured->getType() : null;
            $capture = (object) [
                'capturing' => $capturingData,
                'captured' => $capturedData,
            ];
            $this->pushCapture($piece->getColor(), $capture);
            $this->detach($captured);
        }

        return $this;
    }

    /**
     * Promotes a pawn.
     *
     * @param \PGNChess\Piece\Pawn $pawn
     * @return \PGNChess\Board
     */
    private function promote(Pawn $pawn): Board
    {
        $this->detach($this->getPieceByPosition($pawn->getMove()->position->next));
        switch ($pawn->getMove()->newIdentity) {
            case Symbol::KNIGHT:
                $this->attach(new Knight($pawn->getColor(), $pawn->getMove()->position->next));
                break;
            case Symbol::BISHOP:
                $this->attach(new Bishop($pawn->getColor(), $pawn->getMove()->position->next));
                break;
            case Symbol::ROOK:
                $this->attach(new Rook($pawn->getColor(), $pawn->getMove()->position->next, RookType::PROMOTED));
                break;
            default:
                $this->attach(new Queen($pawn->getColor(), $pawn->getMove()->position->next));
                break;
        }

        return $this;
    }

    /**
     * Runs a chess move on the board.
     *
     * @param \stdClass $move
     * @return bool true if the move is successfully run; otherwise false
     */
    public function play(\stdClass $move): bool
    {
        if ($move->color !== $this->turn) {
            return false;
        }
        $isLegalMove = false;
        $pieces = $this->pickPiece($move);
        if (count($pieces) > 1) {
            foreach ($pieces as $piece) {
                if ($piece->isMovable() && !$this->leavesInCheck($piece)) {
                    return $this->move($piece);
                }
            }
        } elseif (current($pieces)->isMovable() && !$this->leavesInCheck(current($pieces))) {
            $piece = current($pieces);
            switch ($piece->getMove()->type) {
                case Move::KING_CASTLING_SHORT:
                    CastlingCan::short($this->turn, $this->castling, $this->space)
                        ? $isLegalMove = $this->castle($piece)
                        : $isLegalMove = false;
                    break;
                case Move::KING_CASTLING_LONG:
                    CastlingCan::long($this->turn, $this->castling, $this->space)
                        ? $isLegalMove = $this->castle($piece)
                        : $isLegalMove = false;
                    break;
                default:
                    $isLegalMove = $this->move($piece);
                    break;
            }
        }

        return $isLegalMove;
    }

    /**
     * Castles the king.
     *
     * @param \PGNChess\Piece\King $king
     * @return bool true if the castling is successfully run; otherwise false
     */
    private function castle(King $king): bool
    {
        $rook = $king->getCastlingRook(iterator_to_array($this, false));
        if (!empty($rook)) {
            $this->detach($this->getPieceByPosition($king->getPosition()));
            $this->attach(
                new King(
                    $king->getColor(),
                    CastlingRule::color($king->getColor())[Symbol::KING][rtrim($king->getMove()->pgn, '+')]['position']['next']
                )
             );
            $this->detach($rook);
            $this->attach(
                new Rook(
                    $rook->getColor(),
                    CastlingRule::color($king->getColor())[Symbol::ROOK][rtrim($king->getMove()->pgn, '+')]['position']['next'],
                    $rook->getIdentity() === Symbol::ROOK
                )
            );
            $this->trackCastling(true)->pushHistory($king)->refresh();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Undoes a castle move.
     *
     * @param array $prevCastling
     * @return \PGNChess\Board
     */
    private function undoCastle(array $prevCastling): Board
    {
        $prev = end($this->history);
        $king = $this->getPieceByPosition($prev->move->position->next);
        $kingUndone = new King($prev->move->color, $prev->position);
        $this->detach($king);
        $this->attach($kingUndone);
        switch ($prev->move->type) {
            case Move::KING_CASTLING_SHORT:
                $rook = $this->getPieceByPosition(
                    CastlingRule::color($prev->move->color)[Symbol::ROOK][Symbol::CASTLING_SHORT]['position']['next']
                );
                $rookUndone = new Rook(
                    $prev->move->color,
                    CastlingRule::color($prev->move->color)[Symbol::ROOK][Symbol::CASTLING_SHORT]['position']['current'],
                    $rook->getType()
                );
                $this->detach($rook);
                $this->attach($rookUndone);
                break;
            case Move::KING_CASTLING_LONG:
                $rook = $this->getPieceByPosition(
                    CastlingRule::color($prev->move->color)[Symbol::ROOK][Symbol::CASTLING_LONG]['position']['next']
                );
                $rookUndone = new Rook(
                    $prev->move->color,
                    CastlingRule::color($prev->move->color)[Symbol::ROOK][Symbol::CASTLING_LONG]['position']['current'],
                    $rook->getType()
                );
                $this->detach($rook);
                $this->attach($rookUndone);
                break;
        }
        $this->castling = $prevCastling;
        $this->popHistory()->refresh();

        return $this;
    }

    /**
     * Updates the king's ability to castle.
     *
     * @param bool $castling
     * @param \PGNChess\Piece\Piece $pieceMoved
     * @return \PGNChess\Board
     * @throws \PGNChess\Exception\BoardException
     */
    private function trackCastling(bool $castling = false, Piece $pieceMoved = null): Board
    {
        if ($castling && isset($pieceMoved)) {
            throw new BoardException("Error while tracking {$this->turn} king's ability to castle");
        }
        if ($castling) {
            $this->castling[$this->turn] = [
                CastlingRule::IS_CASTLED => true,
                Symbol::CASTLING_SHORT => false,
                Symbol::CASTLING_LONG => false,
            ];
        } elseif (isset($pieceMoved)) {
            if ($pieceMoved->getIdentity() === Symbol::KING) {
                $this->castling[$this->turn] = [
                    CastlingRule::IS_CASTLED => false,
                    Symbol::CASTLING_SHORT => false,
                    Symbol::CASTLING_LONG => false,
                ];
            } elseif ($pieceMoved->getIdentity() === Symbol::ROOK) {
                if ($pieceMoved->getType() === RookType::CASTLING_SHORT) {
                    $this->castling[$this->turn][Symbol::CASTLING_SHORT] = false;
                } elseif ($pieceMoved->getType() === RookType::CASTLING_LONG) {
                    $this->castling[$this->turn][Symbol::CASTLING_LONG] = false;
                }
            }
        }

        return $this;
    }

    /**
     * Moves a piece.
     *
     * @param \PGNChess\Piece\Piece $piece
     * @return bool true if the move is successfully run; otherwise false
     */
    private function move(Piece $piece): bool
    {
        if ($piece->getMove()->isCapture) {
            $this->capture($piece);
        }
        $this->detach($this->getPieceByPosition($piece->getPosition()));
        $pieceClass = new \ReflectionClass(get_class($piece));
        $this->attach(
            $pieceClass->newInstanceArgs([
                $piece->getColor(),
                $piece->getMove()->position->next,
                $piece->getIdentity() === Symbol::ROOK ? $piece->getType() : null,
            ])
        );
        if ($piece->getIdentity() === Symbol::PAWN) {
            if ($piece->isPromoted()) {
                $this->promote($piece);
            }
        }
        if (!$this->castling[$piece->getColor()][CastlingRule::IS_CASTLED]) {
            $this->trackCastling(false, $piece);
        }
        $this->pushHistory($piece)->refresh();

        return true;
    }

    /**
     * Undoes the last move.
     *
     * @param array $prevCastling
     * @return \PGNChess\Board
     */
    private function undoMove(array $prevCastling): Board
    {
        $prev = end($this->history);
        $piece = $this->getPieceByPosition($prev->move->position->next);
        $this->detach($piece);
        if ($prev->move->type === Move::PAWN_PROMOTES ||
            $prev->move->type === Move::PAWN_CAPTURES_AND_PROMOTES) {
            $pieceUndone = new Pawn($prev->move->color, $prev->position);
        } else {
            $pieceUndoneClass = new \ReflectionClass(get_class($piece));
            $pieceUndone = $pieceUndoneClass->newInstanceArgs([
                $prev->move->color,
                $prev->position,
                $piece->getIdentity() === Symbol::ROOK ? $piece->getType() : null, ]
            );
        }
        $this->attach($pieceUndone);
        if ($prev->move->isCapture && $capture = end($this->captures[$prev->move->color])) {
            $capturedClass = new \ReflectionClass(Convert::toClassName($capture->captured->identity));
            $this->attach($capturedClass->newInstanceArgs([
                    $prev->move->color === Symbol::WHITE ? Symbol::BLACK : Symbol::WHITE,
                    $capture->captured->position,
                    $capture->captured->identity === Symbol::ROOK ? $capture->captured->type : null,
                ])
            );
            $this->popCapture($prev->move->color);
        }
        isset($prevCastling) ? $this->castling = $prevCastling : null;
        $this->popHistory()->refresh();

        return $this;
    }

    /**
     * Refreshes the board's status.
     *
     * @return \PGNChess\Board
     */
    private function refresh(): Board
    {
        $this->turn = Symbol::oppColor($this->turn);
        $this->squares = (object) [
            SquareEvaluation::FEATURE_FREE => (new SquareEvaluation($this))->evaluate(SquareEvaluation::FEATURE_FREE),
            SquareEvaluation::FEATURE_USED => (object) (new SquareEvaluation($this))->evaluate(SquareEvaluation::FEATURE_USED),
        ];
        $this->setBoardStatusToPieces((object) [
            'squares' => $this->squares,
            'castling' => $this->castling,
            'lastHistoryEntry' => !empty($this->history) ? end($this->history) : null,
        ]);
        $this->attack = (object) (new AttackEvaluation($this))->evaluate();
        $this->space = (object) (new SpaceEvaluation($this))->evaluate();
        $this->setSpaceToPieces($this->space);

        return $this;
    }

    /**
     * Sets the board's status to all pieces.
     *
     * @param \stdClass $boardStatus
     */
    private function setBoardStatusToPieces(\stdClass $boardStatus): void
    {
        $this->rewind();
        while ($this->valid()) {
            $this->current()->setBoardStatus($boardStatus);
            $this->next();
        }
    }

    /**
     * Sets the board's space evaluation to all pieces.
     *
     * @param \stdClass $space
     */
    private function setSpaceToPieces(\stdClass $space): void
    {
        $this->rewind();
        while ($this->valid()) {
            $this->current()->setSpace($space);
            $this->next();
        }
    }

    /**
     * Calculates if the board is in check when a piece is moved.
     *
     * @param \PGNChess\Piece\Piece $piece
     * @return bool
     */
    private function leavesInCheck(Piece $piece): bool
    {
        $prevCastling = unserialize(serialize($this->castling));
        if ($piece->getMove()->type === Move::KING_CASTLING_SHORT ||
            $piece->getMove()->type === Move::KING_CASTLING_LONG) {
            $this->castle($piece);
            $king = $this->getPiece($piece->getColor(), Symbol::KING);
            $leavesInCheck = in_array($king->getPosition(), $this->attack->{$king->getOppColor()});
            $this->undoCastle($prevCastling);
        } else {
            $this->move($piece);
            $king = $this->getPiece($piece->getColor(), Symbol::KING);
            $leavesInCheck = in_array($king->getPosition(), $this->attack->{$king->getOppColor()});
            $this->undoMove($prevCastling);
        }

        return $leavesInCheck;
    }

    /**
     * Calculates whether the current player is in check.
     *
     * @return bool
     */
    public function isCheck(): bool
    {
        $king = $this->getPiece($this->turn, Symbol::KING);

        return in_array(
            $king->getPosition(),
            $this->attack->{$king->getOppColor()}
        );
    }

    /**
     * Calculates whether the current player is checkmated.
     *
     * @return bool
     */
    public function isMate(): bool
    {
        $escape = 0;
        foreach ($this->getPiecesByColor($this->turn) as $piece) {
            foreach ($piece->getLegalMoves() as $square) {
                switch ($piece->getIdentity()) {
                    case Symbol::KING:
                        if (in_array($square, $this->squares->used->{$piece->getOppColor()})) {
                            $escape += (int) !$this->leavesInCheck(
                                $piece->setMove(Convert::toStdObj($this->turn, Symbol::KING."x$square"))
                            );
                        } elseif (!in_array($square, $this->space->{$piece->getOppColor()})) {
                            $escape += (int) !$this->leavesInCheck(
                                $piece->setMove(Convert::toStdObj($this->turn, Symbol::KING.$square))
                            );
                        }
                        break;
                    case Symbol::PAWN:
                        if (in_array($square, $this->squares->used->{$piece->getOppColor()})) {
                            $escape += (int) !$this->leavesInCheck(
                                $piece->setMove(Convert::toStdObj($this->turn, $piece->getFile()."x$square"))
                            );
                        } else {
                            $escape += (int) !$this->leavesInCheck(
                                $piece->setMove(Convert::toStdObj($this->turn, $square))
                            );
                        }
                        break;
                    default:
                        if (in_array($square, $this->squares->used->{$piece->getOppColor()})) {
                            $escape += (int) !$this->leavesInCheck(
                                $piece->setMove(Convert::toStdObj($this->turn, $piece->getIdentity()."x$square"))
                            );
                        } else {
                            $escape += (int) !$this->leavesInCheck(
                                $piece->setMove(Convert::toStdObj($this->turn, $piece->getIdentity().$square))
                            );
                        }
                        break;
                }
            }
        }

        return $escape === 0;
    }
}
