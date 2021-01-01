<?php

/**
 * Class to represent BOARD and GAME LOGIC
 */
class Board
{
    public  $board;
    private $blackPieces;
    private $whitePieces;
    private $blackKing;
    private $whiteKing;
    private $CurrPlayerColor;
    private $turnCounter;
    public  $history;
    private $isFinished;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->board = array();
        $this->CurrPlayerColor = Color::White;
        $this->blackPieces = array();
        $this->blackKing = null;
        $this->whitePieces = array();
        $this->whiteKing = null;
        $this->turnCounter = 0;
        $this->history = new History();
    }
    
    /**
     * Initialization method
     */
    public function Init()
    {
        $this->isFinished = false;
        for ($x = 0; $x < 8; $x++) // cols (x) from right side (king is x=3) !!
        {
            $piece = null;

            $this->board[$x] = array();
            for ($y = 0; $y < 8; $y++) // rows (y)
            {
                if ($y == 7)
                {
                    switch ($x)
                    {
                        case 0:
                        case 7:
                            $piece = new Rook($x, $y, Color::Black);
                            break;
                        case 1:
                        case 6:
                            $piece = new Knight($x, $y, Color::Black);
                            break;
                        case 2:
                        case 5:
                            $piece = new Bishop($x, $y, Color::Black);
                            break;
                        case 3:
                            $piece = new King($x, $y, Color::Black);
                            $this->blackKing = $piece;
                            break;
                        case 4:
                            $piece = new Queen($x, $y, Color::Black);
                            break;
                        default:
                            $piece = null;
                            break;
                    }
                } //e n d r o w  7

                else if ($y == 6)
                    $piece = new Pawn($x, $y, Color::Black);

                else if ($y == 1)
                    $piece = new Pawn($x, $y, Color::White);

                else if ($y == 0)
                {
                    switch ($x)
                    {
                        case 0:
                        case 7:
                            $piece = new Rook($x, $y, Color::White);
                            break;
                        case 1:
                        case 6:
                            $piece = new Knight($x, $y, Color::White);
                            break;
                        case 2:
                        case 5:
                            $piece = new Bishop($x, $y, Color::White);
                            break;
                        case 3:
                            $piece = new King($x, $y, Color::White);
                            $this->whiteKing = $piece;
                            break;
                        case 4:
                            $piece = new Queen($x, $y, Color::White);
                            break;
                        default:
                            $piece = null;
                            break;
                    }
                } //e n d r o w  0
                else
                    $piece = null; // r o w s  2 to 5 are empty


                if ($piece !== null)
                {
                    if ($piece->GetColor() == Color::Black)
                        $this->blackPieces[] = $piece;
                    else
                        $this->whitePieces[] = $piece;
                }

                $this->board[$x][$y] = $piece;
            } // end rows (y)
        } // end cols (x) from right side (king is x=3) !!
    }

    /**
     * Method to draw the board with all pieces
     */
    public function DrawBoard()
    {
        echo '<table style="border: 1px solid black;"><tr>';
        for ($i = 0; $i <= 9; $i++)
        {
            if ($i > 0 && $i <= 8)
                echo '<th>' . chr(96 + $i) . '</th>';
            else
                echo '<th></th>';
        }
        echo '</tr>';

        for ($y = 7; $y >= 0; $y--)
        {
            echo '<tr><td style="font-weight: bold;">' . ($y + 1) . '</td>';

            for ($x = 7; $x >= 0; $x--)
            {
                $blackCell = 'background-color: #e7d0a7';

                if (($x + $y) % 2 == 1)
                    $blackCell = 'background-color: #a67e5b;';

                if (isset($_SESSION['Position_from']))
                {
                    $Position_from = unserialize($_SESSION['Position_from']) ; // uns erialize(

                    $Position_to = new Position($x, $y);
                    if ($this->GetPiece($Position_from) !== null &&
                        in_array($Position_to, $this->GetPiece($Position_from)->GetPossibleCells()))
                    {
                        if ($this->GetPiece($Position_to) !== null)
                            $blackCell = 'background-color: red;';
                        else
                            $blackCell = 'background-color: green;';
                    }
                }

                echo '<td style="width: 100px; height: 100px; text-align: center; vertical-align: center; border: 1px solid black;' . $blackCell . '">';
                //echo '[' . $x . ',' . $y . ']<br />';

                if (!$this->isFinished)
                {
                    if ($this->board[$x][$y] !== null)
                    {
                        if ( $this->GetCurrPlayerColor()
                             != $this->GetPiece(new Position($x, $y))->GetColor()
                        )
                        {
                            if (isset($_SESSION['Position_from']))
                                echo '<a href="index.php?a=t&x=' . $x . '&y=' . $y . '" class="cell">';
                            else
                                echo '<a href="#" class="cell">';
                        }
                        else
                            echo '<a href="index.php?a=f&x=' . $x . '&y=' . $y . '" class="cell">';
                    }
                    else if (isset($_SESSION['Position_from']))
                    {
                        $Position_from = unserialize($_SESSION['Position_from']) ; // uns erialize(

                        if ($this->GetPiece($Position_from) !== null &&
                            in_array(new Position($x, $y), $this->GetPiece($Position_from)->GetPossibleCells()))
                        {
                          echo '<a href="index.php?a=t&x=' . $x . '&y=' . $y . '" class="cell">';
                        }
                    }
                }
                
                if ($this->board[$x][$y] !== null)
                {
                    echo $this->board[$x][$y];
                }

                if (!$this->isFinished)
                    echo '</a>';

                echo '</td>';
            }
            echo '<td style="font-weight: bold;">' . ($y + 1) . '</td></tr>';
        }

        echo '<tr>';

        for ($i = 0; $i <= 8; $i++)
        {
            if ($i > 0)
                echo '<th>' . chr(96 + $i) . '</th>';
            else
                echo '<th></th>';
        }
        echo '</tr>';

        echo '</table>';
    }
    
    /**
     * To know if the game is finished or not
     * @return bool True if the game is finished, false else
     */
    public function IsFinished()
    {
        return $this->isFinished;
    }

    /**
     * Get the piece at a specific position
     * @param Position $position Position of the piece
     * @return Piece Piece at the specific position
     */
    public function GetPiece($position)
    {
        return $this->board[$position->x][$position->y];
    }
    
    /**
     * Get a reference on all pieces of a specific player
     * @param Color $color Color of the player
     * @return array Player's remaining pieces
     */
    private function &GetPieces($color)
    {
        $pieces = &$this->whitePieces;
        if ($color === Color::Black)
            $pieces = &$this->blackPieces;
            
        return $pieces;
    }
    
    /**
     * Get a reference on the king of a specific player
     * @param Color $color Player color
     * @return King King of the specific player
     */
    public function &GetKing($color)
    {
        $king = &$this->whiteKing;
        if ($color === Color::Black)
            $king = &$this->blackKing;
        
        return $king;
    }
    
    /**
     * To know if the piece movement correspond to a promotion
     * @param Piece $piece Piece that may be promoted
     * @param Position  $t a r g e t  Piece's cell destination
     * @return bool True if it's a promotion, false else
     */
    public function IsPromotion($piece, $Position_to)
    {
        return ((($piece->GetColor() == Color::White && $Position_to->y == 7) || 
                ($piece->GetColor() == Color::Black && $Position_to->y == 0)) && 
                get_class($piece) == 'Pawn');
    }
    
    /**
     * Perform a move, from  o r i g i n  to  t a r g e t
     * @global Log $logs Log to add messages
     * @param Position $Position_from = Origin position
     * @param Position $Position_to = Target position
     * @return boolean True if no problem, false else
     */
    public function Move($Position_from, $Position_to)
    {
        global $logs;

        $piece = $this->GetPiece($Position_from);
        $Position_toPiece = $this->GetPiece($Position_to);
        $type = 'classic';

        if (in_array($Position_to, $piece->GetPossibleCells()))
        {
            $logs->Add(get_class($piece) . ' moved from ' . $Position_from . ' to ' . $Position_to, 'info');
            
            // Eat a piece ?
            if ($Position_toPiece !== null)
            {
                $logs->Add('Look ! This ' . Color::ColorToString($piece->GetColor()) . ' ' . get_class($piece) . 
                        ' just ate a poor little ' . Color::ColorToString($Position_toPiece->GetColor()) . ' ' . 
                        get_class($Position_toPiece) . ' !', 'success');

                $this->RemovePiece($Position_toPiece);
            }

            // "En passant" ?
            else if (get_class($piece) == 'Pawn')
            {
                $evilPawn = $this->GetPiece(new Position($Position_to->x, $Position_to->y + (-1) * (Color::Factor($piece->GetColor()))));
                
                if ($evilPawn !== null && $evilPawn->GetColor() != $piece->GetColor() && get_class($evilPawn) == 'Pawn')
                {
                    $this->board[$evilPawn->GetPosition()->x][$evilPawn->GetPosition()->y] = null;
                    $this->RemovePiece($evilPawn);
                    $logs->Add('Oh My God ! O_o This is an "en passant" capture, unbelievable !!', 'success');
                    $type = 'en passant';
                    $Position_toPiece = $evilPawn;
                }
            }
            
            // Promotion
            if ($this->IsPromotion($piece, $Position_to))
            {
                $promotion = ucfirst($_SESSION['promotion']);
                if (!in_array($promotion, array('Rook', 'Knight', 'Bishop', 'Queen')))
                        $promotion = 'Queen';
                
                $this->RemovePiece($piece);
                $piece = $this->AddPiece($promotion, $piece->GetColor(), $Position_to);
                unset($_SESSION['promotion']);
                $logs->Add('This small pawn got a promotion and became very great !', 'success');
                $type = 'promotion';
            }

            // Castling
            else if (get_class($piece) == 'Rook' && $piece->IsFirstMove())
            {
                $king = &$this->GetKing($piece->GetColor());
                
                if (!$king->CheckAtLeastOnce() && $king->IsFirstMove())
                {
                    // Castling short
                    if (($king->GetPosition()->x - 3) == $piece->GetPosition()->x && $king->GetPosition()->y == $Position_to->y)
                    {
                        $this->board[$king->GetPosition()->x][$king->GetPosition()->y] = null;
                        $logs->Add('Castling short !!', 'success');
                        $newKingPosition = new Position($king->GetPosition()->x - 2, $king->GetPosition()->y);
                        $this->board[$newKingPosition->x][$newKingPosition->y] = $king;
                        $king->SetPosition($newKingPosition, $this->turnCounter);
                        $type = 'castling short';
                    }
                    // Castling long
                    else if (($king->GetPosition()->x + 4) == $piece->GetPosition()->x && $king->GetPosition()->y == $Position_to->y)
                    {
                        $this->board[$king->GetPosition()->x][$king->GetPosition()->y] = null;
                        $logs->Add('Castling long !!!', 'success');
                        $newKingPosition = new Position($king->GetPosition()->x + 2, $king->GetPosition()->y);
                        $this->board[$newKingPosition->x][$newKingPosition->y] = $king;
                        $king->SetPosition($newKingPosition, $this->turnCounter);
                        $type = 'castling long';
                    }
                }
                $this->board[$Position_to->x][$Position_to->y] = $piece;
            }

            else
            // ----------------------------------
            // not Promotion, not Castling
            // ----------------------------------
            {
              $this->board[$Position_to->x][$Position_to->y] = $piece;
            }
            $this->board[$Position_from->x][$Position_from->y] = null;

            $piece->SetPosition($Position_to, $this->turnCounter);

            $this->history->Add($Position_from, $Position_to, $piece, $Position_toPiece, $type);

            return true;
        } // not  ( in_array($Position_to, $piece->GetPossibleCells()) )
        else
            return false;
    }

    /**
     * Perform a simple move of a piece, from a position to another position
     * without computing consequences, it's only used for the p revious link
     * @global Log $logs Log to add messages
     * @param Position $Position_from = Origin position
     * @param Position $Position_to   = Target position
     * @param boolean $setPosition Do we have to set the position inside the piece ?
     * @return boolean True, no problem, false else
     */
    public function SimpleMove($Position_from, $Position_to, $setPosition = true)
    {
        global $logs;
        
        $piece = $this->GetPiece($Position_from);
        $Position_toPiece = $this->GetPiece($Position_to);
        
        if ($piece === null)
        {
            $logs->Add('No piece at this position => ' . $Position_from . ', we can\'t move it to ' . $Position_to, 'error');
            return false;
        }
        
        
        if ($Position_toPiece !== null)
            $this->RemovePiece($Position_toPiece);
        
        $this->board[$Position_to->x][$Position_to->y] = $piece;
        $this->board[$Position_from->x][$Position_from->y] = null;
        
        if ($setPosition)
            $piece->SetPosition($Position_to, null);
        
        return true;
    }
    
    /**
     * Return the color of the player whose turn it is
     * @return Color Color of the player whose turn it is
     */
    public function GetCurrPlayerColor() // was Get Turn
    {
        return $this->CurrPlayerColor ;
    }
    
    /**
     * To get the total number of turns
     * @return int Number of turn
     */
    public function GetTurnCounter()
    {
        return $this->turnCounter;
    }
    
    /**
     * Display the turn message
     * @return string Turn message
     */
    public function DisplayTurn()
    {
      return ($this->CurrPlayerColor === Color::White) 
             ? 'White player\'s turn !' : 'Black player\'s turn !';
    }
    
    /**
     * Perform some operations to back to the p revious turn
     * @global Log $logs Log to add messages
     */
    public function PreviousTurn()
    {
        global $logs;
        
        $this->CurrPlayerColor =
           ($this->CurrPlayerColor == Color::White) ? Color::Black : Color::White;
        
        $this->turnCounter--;

        if ($this->CurrPlayerColor === Color::White)
        {
            $logs->Add( '---------- Turn #' . (round($this->turnCounter / 2) + 1) .' ----------'
                         , 'game' ) ;
        }
        
    }
    
    /**
     * Perform the p revious move
     * @global Log $logs Log to add messages
     */
    public function Previous()
    {
        if ($this->history->Previous($this))
        {
            global $logs;
            
            if ($this->isFinished)
                $this->isFinished = false;
            
            $this->PreviousTurn();
            $logs->Add('Please let me play again this move !', 'warning');
        }
    }
    
    /**
     * Perform some operations to go to the n ext turn
     * @global Log $logs Log to add messages
     * @param boolean $kingCheck True if we have to do king check verification, false else
     */
    public function NextTurn($kingCheck = true)
    {
        global $logs;
        
        $this->CurrPlayerColor = 
           ($this->CurrPlayerColor == Color::White) ? Color::Black : Color::White;
        
        $this->CleanPossibleCells(Color::White);
        $this->CleanPossibleCells(Color::Black);
        
        $inCheck = false;
        if ($kingCheck) {
            $inCheck = $this->KingCheck($this->CurrPlayerColor);
        }
        
        // End of the game
        $moves = $this->ComputeTotalPossibleMoves($this->CurrPlayerColor);
        if (count($moves) == 0)
        {
            // Pat ?
            if ($inCheck)
            {
                $logs->Add( 'Checkmate ! ' 
                     . ucfirst(Color::ColorToString(Color::Invert($this->CurrPlayerColor)))
                     .' won this game !'
                  , 'success'
                );
            }
            else
            {
                $logs->Add('Oh my god, this is a Pat ! As the ' . ucfirst(Color::ColorToString($this->CurrPlayerColor)) . '\'s 
                    king seems unwilling to move, we have here a perfect draw game !', 'success');
            }
            
            $this->isFinished = true;
        }
        
        if (!$this->isFinished)
        {
            if ($this->CurrPlayerColor === Color::White)
            {
                $logs->Add('---------- Turn #' . (round($this->turnCounter / 2) + 1)  . ' ----------', 'game');
            }

            $this->turnCounter++;
        }
    }
    
    /**
     * Perform the n ext move
     * @global Log $logs Log to add messages
     */
    public function Next()
    {
        if ($this->history->Next($this))
        {
            global $logs;
            
            $this->NextTurn();
            $logs->Add('Let\'s do again what (Next()) I just did !', 'warning');
        }
    }
    
    /**
     * Add a piece to the game
     * @param string $type Type of the piece
     * @param Color $color Color of the piece
     * @param Position $position Position of the piece
     * @return \Piece Return a reference of the piece added to the board
     */
    public function AddPiece($type, $color, $position)
    {
        $pieces = &$this->GetPieces($color);
        $piece = null;
        switch ($type)
        {
            case 'Pawn':
                $piece = new Pawn($position->x, $position->y, $color);
                break;
            case 'Rook':
                $piece = new Rook($position->x, $position->y, $color);
                break;
            case 'Knight':
                $piece = new Knight($position->x, $position->y, $color);
                break;
            case 'Bishop':
                $piece = new Bishop($position->x, $position->y, $color);
                break;
            case 'Queen':
                $piece = new Queen($position->x, $position->y, $color);
                break;
            case 'King':
                $piece = new King($position->x, $position->y, $color);
                break;
            default:
                // Error
                $piece = new Pawn($position->x, $position->y, $color);
                break;
        }
        
        if ($this->GetPiece($position) !== null)
            $this->RemovePiece ($position);
        
        $this->board[$position->x][$position->y] = $piece;
        $pieces[] = $piece;
        
        return $piece;
    }
    
    /**
     * Totally remove a piece of the game
     * @param Piece $Position_to The piece to remove
     * @return type True if the piece have been removed, false else
     */
    public function RemovePiece($Position_to)
    {
        $pieces = &$this->GetPieces($Position_to->GetColor());
        
        $count = count($pieces);
        for($i = 0; $i < $count; $i++)
        {
            if ($pieces[$i] === $Position_to)
            {
                $this->board[$pieces[$i]->GetPosition()->x][$pieces[$i]->GetPosition()->y] = null;
                unset($pieces[$i]);
                sort($pieces);
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Compute the collision board of a specific player
     * @param Color $color Color of the player
     * @return array The collision map 
     */
    public function ComputeCollisionBoard($color)
    {
        $collisionBoard = array();
        for ($x = 0; $x < 8; $x++)
        {
            for ($y = 0; $y < 8; $y++)
            {
                $position = new Position($x, $y);
                if ($this->GetPiece($position) == null || $this->GetPiece($position)->GetColor() != $color)
                {
                    $collisionBoard[$x][$y] = false;
                }
                else
                    $collisionBoard[$x][$y] = true;
            }
        }

        return $collisionBoard;
    }
    
    /**
     * Clean the array of possible cells of every pieces with a particular color
     * @param Color $color Color of the pieces
     */
    public function CleanPossibleCells($color)
    {
        foreach($this->GetPieces($color) as $piece)
        {
            $piece->CleanPossibleCells();
        }
    }
    
    /**
     * Perform the king check verification
     * @global Log $logs The log to add messages
     * @param Color $color Color of the player
     * @param boolean $logs True if we want to write in the log output, false else
     * @return boolean True if the player of the specific color is in check
     */
    public function KingCheck($color, $logs = true)
    {
        $king = $this->GetKing($color);
        $piece = $this->IsUnsecuredCell($color, $king->GetPosition());
        
        if ($piece != null)
        {
            if ($logs)
            {
                global $logs;

                $logs->Add(ucfirst(Color::ColorToString($color)) . 
                        ' king in check (by 
                        ' . get_class($piece) . ' in 
                        ' . $piece->GetPosition() . ') !', 
                        'warning');
            }
            
            $king->SetCheck(true);
            return true;
        }
        
        return false;
    }
    
    /**
     * Check if a specific cell is secured or not
     * @param Color $color Color of the player
     * @param Position $position Position of the cell which we want to know if it's secured or not
     * @return \Piece Return the piece that can attack this position
     */
    public function IsUnsecuredCell($color, $position)
    {
        $pieces = $this->GetPieces(Color::Invert($color));
        
        foreach($pieces as $piece)
        {
            if (get_class($piece) != 'King')
            {
                $piece->ComputePossibleCells($this);
                if (in_array($position, $piece->GetPossibleCells()))
                {
                    return $piece;
                }
            }
        }
        
        return null;
    }
    
    /**
     * Get the unsecured cells for a specific player
     * @param Color $color Color of the player
     * @return array Return the unsecured cells
     */
    public function GetUnsecuredCells($color)
    {
        $unsecuredCells = array();
        $pieces = $this->GetPieces($color);
        foreach($pieces as $piece)
        {            
            $currentUnsecuredCells = array();
            $piece->ComputePossibleCells($this);
            foreach($piece->GetPossibleCells() as $cell)
            {
                $board = clone $this;
                $board->SimpleMove($piece->GetPosition(), $cell, false);

                if (get_class($piece) == 'King')
                {
                    if ($board->IsUnsecuredCell($color, $cell))
                        $currentUnsecuredCells[] = $cell;
                }
                else
                {
                    if ($board->KingCheck($color, false))
                        $currentUnsecuredCells[] = $cell;   
                }
            }
            
            if (!empty($currentUnsecuredCells))
                $unsecuredCells[] = array($piece, $currentUnsecuredCells);
        }
        
        return $unsecuredCells;
    }
    
    /**
     * Remove unsecured cells from piece's possible cells 
     * @param Piece $piece The piece
     * @param array $unsecuredCells Array of unsecured cells
     */
    public function CleanUnsecuredCells($piece, $unsecuredCells)
    {
        $piece->CleanUnsecuredCells($unsecuredCells);
    }
    
    /**
     * Compute all possible cells of a piece including forbidden move because king check
     * @param Piece $piece Piece whose we will compute the possible cells
     */
    public function ComputeRealPossibleCells($piece)
    {
        $unsecuredCells = $this->GetUnsecuredCells($piece->GetColor());
        $piece->ComputePossibleCells($this);
        if (count($unsecuredCells) > 0)
        {
            foreach($unsecuredCells as $data)
            {
                if ($data[0] === $piece)
                {
                    $this->CleanUnsecuredCells($piece, $data[1]);
                }
            }
        }
    }
    
    /**
     * Compute all possible moves of a specific player
     * @param Color $color Color of the player
     * @return array Array of all possible moves of a specific player
     */
    public function ComputeTotalPossibleMoves($color)
    {
        $moves = array();
        $pieces = $this->GetPieces($color);
        foreach($pieces as $piece)
        {
            $this->ComputeRealPossibleCells($piece);
            if (count($piece->GetPossibleCells()) > 0)
                $moves[] = $piece->GetPossibleCells();
        }
        
        return $moves;
    }
    
    /**
     * To know if a position is out of the board
     * @param Position $position The position to check
     * @return boolean True if the position is out of the board, false else
     */
    public static function Out($position)
    {
        if ($position->x > 7 || $position->x < 0 ||
                $position->y > 7 || $position->y < 0)
        {
            return true;
        }

        return false;
    }
}