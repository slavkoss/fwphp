<?php
//parser is based on : https://github.com/DHTMLGoodies/chessParser
//view is like       : https://github.com/ryanhs/chess.php
                //ryanhs fork https://github.com/p-chess/chess (more classes)

function autoloader($classname) { include $classname . '.php'; }
spl_autoload_register('autoloader');
                 //or require_once(__DIR__."/../autoload.php");
//$moves_in_board = 2 ;
//echo '<h2>3. Import games from PGN file</h2>' ;
$parser = new PgnParser('1858_Morphy_consultants_Paris.pgn');
//$parser = new PgnParser('arrowtest.pgn');
                //echo json_encode($parser->getParsedGames(false));
$pgn_arr = $parser->getParsedGames(false) ;

$lastmvno = 2 ;
echo View::get_boardhtml($pgn_arr, $lastmvno) ;





    //After last move :
    $PieceOnSquare = $parser->gameParser->fenParser0x88->getPieceOnSquareBoardCoordinate('c1') ;
    $square_int = Board0x88Config::$mapping['c1'] ;

$moves   = $pgn_arr[0]['moves'] ;
$mv     = $moves[$lastmvno -1] ;

echo '<h3>'. __FILE__ .' SAYS: '.' line='. __LINE__ .'</h3>'; 

echo '$pgn_arr[0][\'moves\'][$lastmvno -1]=$moves[$lastmvno - 1]=<pre>'; 
     print_r($moves[$lastmvno -1]); echo '</pre>';
echo '$pgn_arr[0][\'moves\'][$lastmvno]=$moves[$lastmvno]=<pre>'; print_r($moves[$lastmvno]); echo '</pre>';

            echo 'After last move in .pgn : $PieceOnSquare=<pre>'; print_r($PieceOnSquare); echo '</pre>';
            echo 'After last move in .pgn : $square_int='; print_r($square_int); echo '';


echo "<br /><br />Board after previous move $lastmvno - 2";
$fen = $moves[$lastmvno - 2]['fen'] ?? '';
echo '<pre>'; $chrs_on_0_63 = View::out_chrs_on_0_63($fen, '1') ; echo '</pre>';

echo "<br /><br />Board after last move $lastmvno - 1" ;
$fen = $moves[$lastmvno - 1]['fen'] ?? '';
echo '<pre>'; $chrs_on_0_63 = View::out_chrs_on_0_63($fen, '1') ; echo '</pre>';

echo "<br /><br />\$chrs_on_0_63 after last move $lastmvno - 1";
echo '<pre>'; print_r($chrs_on_0_63); echo '</pre>';



//echo '$mvs_arr=<pre>'; print_r($mvs_arr); echo '</pre>';


        /*$PieceOnSquare=Array (
            [square] => c1 or e8
            [s] => 2 or 116  = Board0x88Config::$mapping['SAN']
            [t] => 3 or 11   0x0B
            [type] => king   0x0B
            [color] =>white or black
            [sliding] => 0
        )
        $square_int=116

        public static $typeMapping = array(
            0x01 => 'pawn',
            0x02 => 'knight',
            0x03 => 'king',
            0x05 => 'bishop',
            0x06 => 'rook',
            0x07 => 'queen',
            0x09 => 'pawn',
            0x0A => 'knight',
            0x0B => 'king',
            0x0D => 'bishop',
            0x0E => 'rook',
            0x0F => 'queen'
        );
        */
//$mvs_arr = $parser->pgnGameParser->getMoves() ; //is in $pgn_ arr !!
