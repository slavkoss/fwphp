<?php
//Chess::validatePgn
$pgnString=
'
1.d4 d5 2.Nf3 e6 3.e3 c5 4.c4 Nc6 5.Nc3 Nf6 6.dxc5 Bxc5 7.a3 a6 8.b4 Bd6 9.Bb2 O-O 10.Qd2 Qe7 
11.Bd3 dxc4 12.Bxc4 b5 13.Bd3 Rd8 14.Qe2 Bb7 15.O-O Ne5 16.Nxe5 Bxe5 17.f4 Bc7 18.e4 Rac8 19.e5 Bb6+ 20.Kh1 Ng4 21.Be4 Qh4 22.g3 Rxc3 23.gxh4 Rd2 24.Qxd2 Bxe4+ 25.Qg2 Rh3
' ;
$hlp = [
 'hlp2'=>"<b>1. d4 d5</b> 001 Rotlewi - Rubinstein 1907 (1/15) 
  <br />Notes by Carl Schlechter and Dr. Savielly Tartakower.
  <br /><a href=\"https://thechessworld.com/articles/general-information/15-best-chess-games-of-all-time-annotated/\">
   15 best chess games of all time annotated</a>
 "

,'hlp4' =>"<b>2. Nf3 e6</b>"
,'hlp6' =>"<b>3. e3 c5</b>"
,'hlp8' =>"<b>4. c4 Nc6</b>"
,'hlp10'=>"<b>5. Nc3 Nf6</b>"

,'hlp12'=>"<b>6. dxc5 Bxc5</b> dxc5 is less consistent than a3 or Bd3, maintaining as long as possible the tension in the center."
,'hlp14'=>"<b>7. a3 a6</b>"
,'hlp16'=>"<b>8. b4 Bd6</b>"
,'hlp18'=>"<b>9. Bb2 O-O</b>"
,'hlp20'=>"<b>10. Qd2 Qe7</b>"

,'hlp22'=>"<b>11. Bd3 dxc4</b>"
,'hlp24'=>"<b>12. Bxc4 b5</b>"
,'hlp26'=>"<b>13. Bd3 Rd8</b>"
,'hlp28'=>"<b>14. Qe2 Bb7</b>"
,'hlp30'=>"<b>15. O-O Ne5</b>"

,'hlp32'=>"<b>16. Nxe5 Bxe5</b>"
,'hlp34'=>"<b>17. f4 Bc7</b>"
,'hlp36'=>"<b>18. e4 Rac8</b>"
,'hlp38'=>"<b>19. e5 Bb6+</b>"
,'hlp40'=>"<b>20. Kh1 Ng4</b>"

,'hlp42'=>"<b>21. Be4 Qh4</b>"
,'hlp44'=>"<b>22. g3 Rxc3</b>"
,'hlp46'=>"<b>23. gxh4 Rd2</b>"
,'hlp47'=>"<b>24. Qxd2 Bxe4+</b>"
,'hlp50'=>"<b>25. Qg2 Rh3</b>"




] ;


$parsed = $chess->validatePgn($pgnString);  //return TRUE if ok
if (!$parsed) {
  echo '<h3>***** ERROR $chess->validatePgn($pgnString)</h3>';
  exit(0) ;
}

$parsedPgn = $chess->parsePgn($pgnString);
            //$return = $chess->loadPgn($pgnString);
            //$fen = $chess->fen() ;
            //echo 'FEN=' . $fen . '<br />';
            //$chess->load($fen);

            //$parsedPgn = $chess->pgn(); // returns '' if there is no movements or header
$mv = $parsedPgn['moves'] ;
array_unshift($mv, '') ; //Returns new count. Added $mv[0] is page title if we wish it
$mv = $mv + $hlp ; 

$chess->header('Event', "Lodz");
$chess->header('Site', "Lodz POL");
$chess->header('Date', "1907.12.26");
$chess->header('EventDate', "?");
$chess->header('Round', "6");
$chess->header('Result', "0-1");
$chess->header('White', "Georg Rotlewi");
$chess->header('Black', "Akiba Rubinstein");
$chess->header('ECO', "D32");
$chess->header('WhiteElo', "?");
$chess->header('BlackElo', "?");
$chess->header('PlyCount', "50"); // halfmoves nr



