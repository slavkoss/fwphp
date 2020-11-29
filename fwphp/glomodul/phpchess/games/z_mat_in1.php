<?php
//Chess::validatePgn

$chess->header('Event', "#1 Chess: 5334 Problems, Combinations, and Games by Laszlo Polgar");
$chess->header('Site', "Hungary");
$chess->header('Date', "1994.??.??");
$chess->header('EventDate', "?");
$chess->header('Round', "-");
$chess->header('White', "WHITE MATES IN 1 {1. Qxg7#}");
$chess->header('Black', "Mate in one White to move");
$chess->header('FEN', "3q1rk1/5pbp/5Qp1/8/8/2B5/5PPP/6K1 w - - 0 1");
$chess->header('castle', "1");
$chess->header('Result', "1-0");
$chess->header('index', "0");
$chess->header('ECO', "?");
$chess->header('WhiteElo', "?");
$chess->header('BlackElo', "?");
$chess->header('PlyCount', "1"); // halfmoves nr
$chess->header('ts', "1486251250322"); 

              //echo '<pre>$chess->header()='; print_r($chess->header()); echo  '</pre>';

$pgnString=
'
1. Qxg7# 1-0
' ;


$hlp = [
 'hlp0'=>'<b>1. Qxg7# 1-0</b> WHITE MATES IN 1
'
] ;



/*$parsed = $chess->validatePgn($pgnString);  //return TRUE if ok
if (!$parsed) {
  echo '<h3>***** ERROR $chess->validatePgn($pgnString)</h3>';
  exit(0) ;
} */

$parsedPgn = $chess->pgnString2arr($pgnString);
            //$return = $chess->loadPgn($pgnString);
            //$fen = $chess->fen() ;
            //echo 'FEN=' . $fen . '<br />';
            //$chess->load($fen);

            //$parsedPgn = $chess->pgn(); // returns '' if there is no movements or h eader
$mv = $parsedPgn['moves'] ;
array_unshift($mv, '') ; //Returns new count. Added $mv[0] is page title if we wish it
$mv = $mv + $hlp ; 
