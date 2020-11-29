<?php
//Chess::validatePgn
$pgnString=
'
1.d4 d5 2.Nf3 e6 3.e3 c5 4.c4 Nc6 5.Nc3 Nf6 6.dxc5 Bxc5 7.a3 a6 8.b4 Bd6 9.Bb2 O-O 10.Qd2 Qe7 
11.Bd3 dxc4 12.Bxc4 b5 13.Bd3 Rd8 14.Qe2 Bb7 15.O-O Ne5 16.Nxe5 Bxe5 17.f4 Bc7 18.e4 Rac8 19.e5 Bb6+ 20.Kh1 Ng4 21.Be4 Qh4 22.g3 Rxc3 23.gxh4 Rd2 24.Qxd2 Bxe4+ 25.Qg2 Rh3
' ;
$hlp = [
 'hlp2'=>"<b>1. d4 d5</b> 001 Rotlewi - Rubinstein 0-1, 1907 Lodz POL (1/15). 
  Notes by Carl Schlechter and Dr. Savielly Tartakower.
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
,'hlp20'=>"<b>10. Qd2 Qe7</b> Qd2 is a very bad place for the queen. The best continuation is 10.cxd5 exd5 11.Be2, followed by O-O.
Qd2 is loss of time. The queen will soon have to seek a better square (14.Qe2). The most useful move is 10.Qc2.
<br /><br />Qe7 is a fine sacrifice of a pawn. If 11.cxd5 exd5 12.Nxd5? Nxd5 13.Qxd5 Rd8! and Black has a strong attack. 
"

,'hlp22'=>"<b>11. Bd3 dxc4</b> Better than Bd3 was 11.cxd5 exd5 12.Be2."
,'hlp24'=>"<b>12. Bxc4 b5</b>"
,'hlp26'=>"<b>13. Bd3 Rd8</b>"
,'hlp28'=>"<b>14. Qe2 Bb7</b>"
,'hlp30'=>"<b>15. O-O Ne5</b> Ne5 was introduced by Marshall and Schlechter in a similar position with opposite colors, but here with the extra move Rd8."

,'hlp32'=>"<b>16. Nxe5 Bxe5</b> Bxe5 threatening to win a pawn by 17...Bxh2+ 18.Kxh2 Qd6+. Whites next move provides against this, but loosens the kingside defenses."
,'hlp34'=>"<b>17. f4 Bc7</b>"
,'hlp36'=>"<b>18. e4 Rac8</b>"
,'hlp38'=>"<b>19. e5 Bb6+</b>"
,'hlp40'=>"<b>20. Kh1 Ng4!!</b>"

,'hlp42'=>"<b>21. Be4 Qh4</b> Be4 - There is no defense; e.g., 21.Bxh7+ Kxh7 22.Qxg4 Rd2 etc.; or 21.h3 Qh4
22.Qxg4 Qxg4 23.hxg4 Rxd3, threatening ...Rh3 mate and ...Rxc3; or 21.Qxg4 Rxd3 22.Ne2 Rc2 23.Bc1 g6! threatening ...h5; or 21.Ne4 Qh4 22.h3 (if 22.g3 Qxh2+ 23.Qxh2 Nxh2 and wins.) 22....Rxd3 23.Qxd3 Bxe4 24.Qxe4 Qg3 25.hxg4 Qh4+ mate."
,'hlp44'=>"<b>22. g3 Rxc3!!</b> g3 Or 22.h3 Rxc3! 23.Bxc3 Bxe4 24.Qxg4 Qxg4 25.hxg4 Rd3 wins. *** Tartakower: The alternative 22.h3, parrying the mate, would lead to the following brilliant lines of play: 22...Rxc3! (an eliminating sacrifice, getting rid of the knight, which overprotects the bishop on e4) 23.Bxc3 (or 23.Qxg4 Rxh3+ 24.Qxh3 Qxh3+ 25.gxh3 Bxe4+ 26.Kh2 Rd2+ 27.Kg3 Rg2+ 28.Kh4 Bd8+ 29.Kh5 Bg6+ mate) 23...Bxe4+ 24.Qxg4 (if 24.Qxe4 Qg3 25.hxg4 Qh4+ mate) 24...Qxg4 25.hxg4 Rd3 with the double threat of 26...Rh3+ mate and 26....Rxc3, and Black wins. Beautiful as are these variations, the continuation in the text is still more splendid."
,'hlp46'=>"<b>23. gxh4 Rd2!!</b>"
,'hlp48'=>"<b>24. Qxd2 Bxe4+</b>"
,'hlp50'=>"<b>25. Qg2 Rh3! 0-1</b>"




] ;


$parsed = $chess->validatePgn($pgnString);  //return TRUE if ok
if (!$parsed) {
  echo '<h3>***** ERROR $chess->validatePgn($pgnString)</h3>';
  exit(0) ;
}

$parsedPgn = $chess->pgnString2arr($pgnString);
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



