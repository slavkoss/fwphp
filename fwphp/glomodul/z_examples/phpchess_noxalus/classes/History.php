<?php

/**
 * Class to store the history of the game
 */
class History
{
    private $history;
    private $index;

    public function __construct()
    {
        $this->history = array();
        $this->index = -1;
    }

    public function Add($Position_from, $Position_to, $piece, $Position_toPiece, $type)
    {
        // P revious and move ? => we have to delete all former "n ext moves"
        if ($this->index != count($this->history) - 1)
        {
            if ($this->index == -1)
                $this->history = array();
            else
                $this->history = array_slice($this->history, 0, $this->index + 1);
        }

        $Position_toData = null;
        if ($Position_toPiece !== null)
        {
            $Position_toData = array(
                'type' => get_class($Position_toPiece)
            );
        }

        $typeData = null;
        if ($type !== null)
        {
            $typeData = array('name' => $type);
            if ($type == 'promotion')
            {
                // We save pawn's  h i s t o r y
                $typeData['history'] = $piece->GetHistory();
            }
            else if ($type == 'en passant')
            {
                // We save Position_ to pawn's h i s t o r y
                $typeData['Position_toHistory'] = $Position_toPiece->GetHistory();
            }
        }

        $move = array(
            'piece' => array(
                'color' => $piece->GetColor(),
                'type' => get_class($piece),
                'Position_from' => $Position_from,
                'Position_to' => $Position_to
            ),
            'Position_to' => $Position_toData,
            'type' => $typeData
        );

        $this->history[] = $move;

        $this->index++;
    }

    public function Previous(&$board)
    {
        if ($this->index == -1)
        {
            return false;
        }

        $move = $this->history[$this->index];
        $piece = $board->GetPiece($move['piece']['Position_to']);
        
        if ($piece !== null)
        {
            $piece->Previous();
            switch ($move['type']['name'])
            {
                case 'classic':
                    $board->SimpleMove($move['piece']['Position_to'], $move['piece']['Position_from']);
                    if ($move['Position_to'] !== null)
                    {
                        $board->AddPiece($move['Position_to']['type'], Color::Invert($move['piece']['color']), $move['piece']['Position_to']);
                    }
                    break;

                case 'promotion':
                    $board->RemovePiece($board->GetPiece($move['piece']['Position_to']));
                    $piece = $board->AddPiece('Pawn', $move['piece']['color'], $move['piece']['Position_from']);
                    $piece->SetHistory($move['type']['history']);
                    if ($move['Position_to'] !== null)
                    {
                        $board->AddPiece($move['Position_to']['type'], Color::Invert($move['piece']['color']), $move['piece']['Position_to']);
                    }
                    break;
                case 'en passant':
                    $Position_to = $move['piece']['Position_to'];
                    $Position_from = $move['piece']['Position_from'];
                    $board->SimpleMove($Position_to, $Position_from);
                    $evilPawnPosition = new Position($Position_to->x, $Position_to->y + (-1) * (Color::Factor($move['piece']['color'])));
                    $piece = $board->AddPiece('Pawn', Color::Invert($move['piece']['color']), $evilPawnPosition);
                    $piece->SetHistory($move['type']['Position_toHistory']);
                    break;
                case 'castling short':
                    $board->SimpleMove($move['piece']['Position_to'], $move['piece']['Position_from']);
                    $king = $board->GetKing($move['piece']['color']);
                    $this->board[$king->GetPosition()->x][$king->GetPosition()->y] = null;
                    $newKingPosition = new Position($king->GetPosition()->x + 2, $king->GetPosition()->y);
                    $board->SimpleMove($king->GetPosition(), $newKingPosition);
                    break;
                case 'castling long':
                    $board->SimpleMove($move['piece']['Position_to'], $move['piece']['Position_from']);
                    $king = $board->GetKing($move['piece']['color']);
                    $this->board[$king->GetPosition()->x][$king->GetPosition()->y] = null;
                    $newKingPosition = new Position($king->GetPosition()->x - 2, $king->GetPosition()->y);
                    $board->SimpleMove($king->GetPosition(), $newKingPosition);
                    break;
            }

            $this->index--;
            return true;
        }
        else
        {
            return false;
        }
    }

    public function Next(&$board)
    {
        $this->index++;
        if ($this->index > count($this->history) - 1 || $this->index < 0)
        {
            return false;
        }

        $move = $this->history[$this->index];
        $piece = $board->GetPiece($move['piece']['Position_from']);
        
        if ($piece !== null)
        {
            $piece->Next();
            switch ($move['type']['name'])
            {
                case 'classic':
                    if ($move['Position_to'] !== null)
                    {
                        $board->RemovePiece($board->GetPiece($move['piece']['Position_to']));
                    }
                    $board->SimpleMove($move['piece']['Position_from'], $move['piece']['Position_to']);

                    break;

                case 'promotion':
                    break;
                case 'en passant':
                case 'castling short':
                    break;
                case 'castling long':
                    break;
            }

            return true;
        }
        else
        {
            return false;
        }
    }

    public function Display()
    {
        global $logs;
        foreach ($this->history as $move)
        {
            $logs->Add( Color::ColorToString($move['piece']['color']) 
               . ' ' . $move['piece']['Position_from'] 
               . ' => ' . $move['piece']['Position_to'], 'success'
            );
        }
    }




    public function DisplayBoardHis()
    {
      echo '<br />$board->history=<pre>'; print_r($this->history); echo '</pre>';
    }


}