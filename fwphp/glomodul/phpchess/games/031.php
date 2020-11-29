<?php
//Chess::validatePgn
// Ë=Q  Ì=N  Í=B  Î=R  Ê=K
$pgnString=
'
1.c4 e6 2.Nc3 Nf6 3.e4 c5 4.e5 Ng8 5.Nf3 Nc6 6.d4 cxd4 7.Nxd4 Nxe5 8.Ndb5 a6 9.Nd6+ Bxd6 10.Qxd6 f6 
11.Be3 Ne7 12.Bb6 Nf5 13.Qc5 d6 14.Qa5 Qd7 15.f4 Nc6 16.Qa3 e5 17.Bd3 O-O 18.O-O exf4 19.Rxf4 Nfe7
20.Rd1 Ng6 21.Rff1 Nge5 22.Be4 Qf7 23.b3 Be6 24.Qxd6 Kh8 25.Qc7 Qxc7 26.Bxc7 Rf7 27.Bb6 Re8 28.h3 Rd7
29.Nd5 Rc8 30.g4 Ng6 31.Kh2 Nce5 32.a4 Rd6 33.a5 Nd7
' ;
$hlp = [
 'hlp2'=>"<b>1. c4 e6</b> 031 Kasparov - Beliavsky 1991 analysis Linares FRA. 1-0 <b>English Opening A19</b>
  <br /><a href=\"https://www.chessgames.com/perl/chessgame?gid=1070540/\">Play</a>
   &nbsp;  &nbsp; <a href=\"https://www.chessgames.com/perl/chesscollection?cid=1016341/\">Kasparov</a>
 "
,'hlp4' =>"<b>2. Nc3 Nf6</b> Beliavsky  rejected  2...d5  and  his  customary Queen's Gambit"
,'hlp6' =>"<b>3. e4 c5</b>"
,'hlp8' =>"<b>4. e5 Ng8</b>"
,'hlp10'=>"<b>5. Nf3 Nc6</b> In  the  quiet  variation  5.d4 cxd4 6.Qxd4 Ic6 7.Qe4 d6 8.Nf3 Beliavsky had achieved draw (remi) with Black against Seirawan (Lucerne 1989) and Azmaiparashvili (Amsterdam 1990). "

,'hlp12'=>"<b>6. d4 cxd4</b>"
,'hlp14'=>"<b>7. Nxd4 Nxe5</b>"
,'hlp16'=>"<b>8. Ndb5 a6</b>"
,'hlp18'=>"<b>9. Nd6+ Bxd6</b>"
,'hlp20'=>"<b>10. Qxd6 f6</b>"

,'hlp22'=>"<b>11. Be3 Ne7</b>"
,'hlp24'=>"<b>12. Bb6 Nf5</b>"
,'hlp26'=>"<b>13. Qc5 d6</b>"
,'hlp28'=>"<b>14. Qa5 Qd7</b> Kasparov_on_Kasparov_2_1985_93_100_games.pdf, game No.75 : Up to here this was a repetition of my Belfort game with Andrey Sokolov,  and  I  was pleased  by  Beliavsky’s  choice:  White  has good  compensation  for  the  pawn,  and  his active  piece  play  gives  him  more  winning chances  than  strict  manoeuvring  in  the classical set-ups of the Queen’s Gambit. 14...Qd7!? is a new move instead of  the  previous  14...Qe7 in Game No.40) "
,'hlp30'=>"<b>15. f4 Nc6</b> Nc6 with gain of tempo (W Q attacked). Worse is : <ol><li>15...Ng4?! 16. Be2! <li>or 15...Ng6?! 16. Bd3 with threat of White Bxf5</ol>. "

,'hlp32'=>"<b>16. Qa3 e5</b> Qa3 is critical moment.

<br /><br /><b>e5 is mistake</b>, leading to great difficulties on 
account of the weakness of d5-point, whereas (on the other hand) it is not possible to exploit (use) d4-point. Soon correct defence was found :
<br /><br />16...Nce7!  17  0-0-0  Qc6  with  sharp  play. After <ol><li> 18  Qb3  White  retains  pressure,  and Black  his  extra  pawn:  18...Bd7  19  Bg1  d5 (19...h5!?)  20  Qb1!  (20  g4  Nd6  21  cxd5 Nxd5  is  not  so  clear,  Psakhis-A.Greenfeld, Israel 1991) <li>or 18...0-0 19 Bg1 d5 20 g4 Nd6 21 c5 (21 Qb4 Be8) 21...Nf7 22 Bg2 (L'AmiWells, London 2008).</ol>"

,'hlp34'=>"<b>17. Bd3 O-O</b> seems that Beliavsky was hoping for 17 0-0-0?! exf4 18 Nd5 0-0, which is 
quite acceptable for Black, and he underestimated Kasparov's reply, which intends 0-0.

<br /><br />17...exf4 is no better: 18 0-0 g5 (Kasparov's Informator  suggestion  18...Ne5(?)  is  fatal  on account  of  19  Bxf5  Qxf5  20  Nd5  Êf7  21 Bxf4  etc)  19  Bae1+  Qf7  20  Nd5  (more energetic  than  20  Bxf5  Qxf5  21  Ne4) 20...Ne5 21 Be4 or 21 g3!? with an escalating attack. 
"
,'hlp36'=>"<b>18. O-O exf4</b> It is already not easy to find a satisfactory move: 18...Nfd4? 19 fxe5 dxe5 20 Bxh7+!. In subsequent correspondence games 18...Qf7 19 fxe5! (my suggested 19 Nd5 is weaker in view  of  19...Nfe7!  20  Qxd6  Bf5)  19...fxe5 was  tried,  and  here  I  would  have  preferred 20 Rf2! and Raf1 with an obvious plus.
"
,'hlp38'=>"<b>19. Rxf4 Nfe7</b>"
,'hlp40'=>"<b>20. Rd1 Ng6</b> Rd1 - White  concentrates  his  efforts  on eliminating d6-pawn. The pair of powerful  bishops  guarantees  him  an  enduring initiative. "

,'hlp42'=>"<b>21. Rff1 Nge5</b> 21...Nce5 22 Be4 Qg4?! (22...Qf7 23 b3) 23 h3 Qh4 24 Bf2 Qh5 25 Qxd6 was even more dismal for Black. "
,'hlp44'=>"<b>22. Be4 Qf7</b>"
,'hlp46'=>"<b>23. b3 Be6</b>"
,'hlp48'=>"<b>24. Qxd6 Kh8</b> Qxd6 With  the  threat  of  Nd5.  The  centralisation of queen is more appropriate than 24 Nxd6, although the immediate 24 Nd5!? also deserved consideration. "

,'hlp50'=>"<b>25. Qc7 Qxc7</b> Qc7 - exchange  of  queens  reduces  White's domination,  which  would  have  been  especially perceptible after 25 Nd5! Rac8 26 h3 Rfe8 27 Rfe1, when Black runs out of useful moves: 27...f5 28 Bc2 Bd7 29 Nf4 etc.

<br /><br />Little was changed by 25...Bfe8 26 Nd5, but 25...Qe8!? 26 Bf2! would have led to a more tense battle. 
"

,'hlp52'=>"<b>26. Bxc7 Rf7</b>"
,'hlp54'=>"<b>27. Bb6 (27  Bd6!?) Re8</b>"
,'hlp56'=>"<b>28. h3 Rd7?!</b> Disheartened  by  the  unsuccessful  opening, Beliavsky had ended up in time-trouble and  lost  almost  without  a  fight.  Whether good or bad, 28...f5! was essential. "

,'hlp58'=>"<b>29. Nd5  (threatening Nc7) Rc8</b> imprudent 29...Bf7? would have lost to  30  Bf5!  Be6  31  Nc7,  but  the  clumsy regrouping 29...Bg8!? 30 Bf5 Rf7 was a try.
"

,'hlp60'=>"<b>30. g4 Ng6?!</b> (an  unexpected  blunder  of  a pawn; 30...Ne7 was more resilient)"

,'hlp62'=>"<b>31. Kh2 Nce5 (Nge5!?)</b> Kh2 - Continuing  to  intensify  the  pressure,  although  31  Bxg6!?  hxg6  32  Nf4  suggested itself."

,'hlp64'=>"<b>32. a4 Rd6</b>"
,'hlp66'=>"<b>33. a5 Nd7? &nbsp;  &nbsp; 34. Nc7 1-0</b> 33...Nd7? is final time-trouble error, although after 33...Rd7  34  Rfe1  White  has  an  imposing advantage (34...Bxd5 35 cxd5!)."
//,'hlp68'=>"<b>34. Nc7 1-0</b>"



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

$chess->header('Event', "Linares");
$chess->header('Site', "Linares ESP");
$chess->header('Date', "1991.03.08");
$chess->header('EventDate', "1991.02.23");
$chess->header('Round', "9");
$chess->header('Result', "1-0");
$chess->header('White', "Garry Kasparov");
$chess->header('Black', "Alexander Beliavsky");
$chess->header('ECO', "A19");
$chess->header('WhiteElo', "?");
$chess->header('BlackElo', "?");
$chess->header('PlyCount', "67"); // halfmoves nr

