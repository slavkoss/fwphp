<?php
$pgnString=
'
1.f4 d5 2.Nf3 c5 3.e3 Nc6 4.Bb5 Bd7 5.O-O e6 6.b3 Qc7 7.Bb2 f6 8.c4 Nce7 9.Nc3 Nh6 10.Rc1 Bxb5
11.Nxb5 Qd7 12.Qe2 Nc6 13.cxd5 exd5 14.e4 O-O-O 15.e5 a6 16.Nc3 b5 17.a4 b4 18.Nd1 Kb7 19.exf6 gxf6
20.Bxf6 Re8 21.Ne3 Rg8 22.Qd3 Ng4 23.Nxg4 Qxg4 24.Rf2 Qd7 25.Ne5 Nxe5 26.Bxe5 Rc8 27.Qf3 Kb6
28.d3 Bh6 29.Rfc2 d4 30.a5+ Kb5 31.Bc7 
' ;

$parsedPgn = [
  'header' => [
      'White'   => 'Siegbert Tarrasch'
     ,'Black'   => 'Allies'
     ,'Result'  => '1-0, 35 moves'
     ,'Opening' => 'Bird Opening: Dutch Variation (A03)'
     ,'when'    => '1914'
     ,'where'   => 'Naples'
  ]
  ,'moves' => [ 
  "<h3>Siegbert Tarrasch - Allies</h3>
   Bird Opening: Dutch Variation (A03)
   &nbsp; &nbsp; <a href=\"https://www.youtube.com/watch?v=he4orsttFfE\">Youtube</a>
   &nbsp; &nbsp; <a href=\"https://www.chessgames.com/perl/chessgame?gid=1378821\">On line play</a>
   <br />1914 Naples
   "
        //    G A M E  M O V E S  A N D  C O M M E N T S
  , 'f4', 'd5' //m o v e  001
        , 'hlp2'=>"<b>1. f4, d5</b> \"White's last move is one of the most beautiful ever played on the chess-board.\" Reinfeld"

  , 'Nf3', 'c5' //002
        , 'hlp4'=>"<b>2. Nf3, c5</b>"

  , 'e3','Nc6'//+ 003
        ,'hlp6'=>"<b>3. e3, Nc6</b>  "
  , 'Bb5', 'Bd7' //?! 004
        , 'hlp8'=>"<b>4. Bb5, Bd7</b>"

  , 'O-O', 'e6' //005
        , 'hlp10'=>"<b>5. O-O, e6</b>"

  , 'b3', 'Qc7' //006
        , 'hlp12'=>"<b>6. b3, Qc7</b>"

  , 'Bb2', 'f6' //007
        , 'hlp14'=>"<b>7. Bb2, f6</b>
        "

  , 'c4', 'Nce7' //008
        , 'hlp16'=>"<b>8. c4, Nce7</b>"

  , 'Nc3', 'Nh6' //009
        , 'hlp18'=>"<b>9. Nc3, Nh6</b>"
  ]
] ;


$mv = $parsedPgn['moves'] ;

/* https://chessimprover.com/tarrasch-and-the-anarchist-bishop/

"White’s last move is one of the most beautiful ever played on the chess-board." Reinfeld

After 34...Rxd1 35. Rxd1 Black's efforts to prevent the loss of a piece permit White to win Black's Queenside pawns.


Annotated by John Lee Shaw 1. f4 d5 2. Nf3 c5 3. e3 Nc6 4. Bb5 Bd7 5. O-O e6 6. b3 Qc7 7. Bb2 Looking at the games of , I am always struck by his rapid development, whichever colour he plays. Here is no exception. 7... f6 His opponent, by contrast, is making too many pawn moves and is already lagging behind somewhat. 8. c4 White wastes no time in striking out in the centre, Black's King is still in the centre, and two of his minor pieces remain unactivated. Thus, is suits White very much to open the position. 8... Nce7? not the way to defend, Black had to develop with ...Bd6 or even the inferior ...Nge7. 9. Nc3 White is in no rush to exchange off pieces, it suits him to keep Black cramped. [9. Bd7 Qd7 10. Qe2 Ready to play Nc3 is was also very good for White.] 9... Nh6... well, it had to be developed somehow. 10. Rc1 Bb5 Quite correct, the bishop was very imposing, and of course, Black is cramped so exchanging pieces is desired in order to obtain some breathing space. However, this comes at the cost of time. 11. Nb5 Qd7 12. Qe2 Nc6 13. cd5 ed5 14. e4 Highly effective play by , Black's King is in a very precarious position and any central explosion makes it sweat more. White is quite probably winning here. 14... O-O-O 15. e5 a6 16. Nc3 b5 Normally one would wish to avoid moving pawns infront of one's own King, even more so in an opposite side castling position. However, it is imperative that Black prevents Na4-Nb6 ideas. 17. a4 White begins to hack, and Black's position begins to crumble. 17... b4 18. Nd1 Kb7 19. ef6 gf6 [19... Re8 is simply met by 20. fg7] 20. Bf6 Re8 21. Ne3 Rg8 22. Qd3 Ng4 23. Ng4 Qg4 24. Rf2 Qd7 25. Ne5 For me, once this move is achieved, White is sitting pretty. He controls the game completely. remains patient, calmly shuffling his pieces and waits for Black to make the decisive oversight. 25... Ne5 26. Be5 Rc8 27. Qf3 Kb6 28. d3 Bh6 29. Rfc2 d4 This is that decisive oversight, the opening of this diagonal was exactly what White was waiting for. 30. a5! Kb5 This is where pattern recognition is very valuable, being able to spot mating nets, and knowing that being able to play a certain move would be instant victory. wants to play Rxc5+, (Qb7 would also be rather tasty), it would be a killer blow and would have great chances of leading to mate. But how does he achieve it with Black's rook on c8? The simple answer is that he can't, so he removes it from the equation ... [30... Ka7 31. Rc5 Rc5 32. Rc5 Rc8 33. Rc8 Qc8 34. Bd4 is totally resignable.] [30... Ka5 31. Rc5 Rc5 (31... Kb6 changes nothing 32. Rc7!) 32. Rc5 Kb6 33. Rc7 and Black is toast.] 

Black seems to be holding here (at least against immediate catastrophe), because the black queen guards against Qb7+ (followed by Kxa5 Ra1#), while the black rook on c8 defends against Rxc5#.  Tarrasch played the ingenious interference move 31.Bc7!  This blocks off both defences, and whatever piece captures becomes overloaded.  That is, if 31…Rxc7, the rook is overloaded, having to look after both the key squares, since the queen is blocked from b7.  So White would play 32.Qb7+ Rxb7, deflecting the rook from defence of c5, allowing 33.Rxc5#.  But if Black plays instead 31…Qxc7, the queen blocks off the rook’s defence of c5 and becomes overloaded: 32.Rxc5+ Qxc5 deflects the queen from defence of b7, allowing 33.Qb7+ Kxa5 34.Ra1#.

31. Bc7!! A superb move. Chess master and writer Fred Reinfeld described this move as "... one of the most beautiful ever played on the chess-board." He is completely correct, and the variations below show why. White's bishop effectively strips the Black King of his defenders. It is like an anarchist, spreading chaos and disarray. Black resigned instantly -- due to impending mate, either by Rxc5 or Qb7 or most likely a combination of both. Nothing that he throws at White can do anything to stop it, viz: 31... Rg2 [or 31... Qc7 32. Rc5!! Qc5 33. Qb7 Ka5 34. Ra1#] [31... Rc7 32. Qb7!! Ka5 33. Ra1 or Ra2, same thing. 33... Qa4 34. Ra4#] 32. Qg2 Qc7 33. Rc5 Qc5 34. Qb7 Ka5 35. Ra1#

*/
//        G A M E  I N F O  https://en.wikipedia.org/wiki/Immortal_Game
//        Moves with help
$mvXXXold = [ 
  "<h3>Siegbert Tarrasch - Allies</h3>
   Bird Opening: Dutch Variation (A03)
   &nbsp; &nbsp; <a href=\"https://www.youtube.com/watch?v=he4orsttFfE\">Youtube</a>
   &nbsp; &nbsp; <a href=\"https://www.chessgames.com/perl/chessgame?gid=1378821\">On line play</a>
   <br />1914 Naples
   "
        //    G A M E  M O V E S  A N D  C O M M E N T S
  , 'f4', 'd5' //m o v e  001
        , 'hlp2'=>"<b>1. f4, d5</b>"

  , 'Nf3', 'c5' //002
        , 'hlp4'=>"<b>2. Nf3, c5</b>"

  , 'e3','Nc6'//+ 003
        ,'hlp6'=>"<b>3. e3, Nc6</b>  "
  , 'Bb5', 'Bd7' //?! 004
        , 'hlp8'=>"<b>4. Bb5, Bd7</b>"

  , 'O-O', 'e6' //005
        , 'hlp10'=>"<b>5. O-O, e6</b>"

  , 'b3', 'Qc7' //006
        , 'hlp12'=>"<b>6. b3, Qc7</b>"

  , 'Bb2', 'f6' //007
        , 'hlp14'=>"<b>7. Bb2, f6</b>
        "

  , 'c4', 'Nce7' //008
        , 'hlp16'=>"<b>8. c4, Nce7</b>"

  , 'Nc3', 'Nh6' //009
        , 'hlp18'=>"<b>9. Nc3, Nh6</b>"
/*
//1. f4 d5 2. Nf3 c5 3. e3 Nc6 4. Bb5 Bd7 5. O-O e6 6. b3 Qc7 7. Bb2 f6 8. c4 Nce7 9. Nc3 Nh6 10. Rc1 Bb5 11. Nb5 Qd7 12. Qe2 Nc6 13. cd5 ed5 14. e4 O-O-O 15. e5 a6 16. Nc3 b5 17. a4 b4 18. Nd1 Kb7 19. ef6 gf6 20. Bf6 Re8 21. Ne3 Rg8 22. Qd3 Ng4 23. Ng4 Qg4 24. Rf2 Qd7 25. Ne5 Ne5 26. Be5 Rc8 27. Qf3 Kb6 28. d3 Bh6 29. Rfc2 d4 30. a5 Kb5 31. Bc7 "White's last move is one of the most beautiful ever played on the chess-board." Reinfeld           <br /><br />
  , 'g4', 'Nf6' //010
        , 'hlp20'=>"<b>10. g4? Nf6</b> "

  , 'Rg1', 'cxb5' //011
        , 'hlp22'=>"<b>11. Rg1! cxb5?</b>"

  , 'h4', 'Qg6' //012
        , 'hlp24'=>"<b>12. h4!, Qg6</b>"

  , 'h5', 'Qg5' //013
        , 'hlp26'=>"<b>13. h5, Qg5</b>  "

  , 'Qf3', 'Ng8' //014
        , 'hlp28'=>"<b>14. Qf3, Ng8</b>
          "
  , 'Bxf4', 'Qf6' //015
        , 'hlp30'=>"<b>15. Bxf4, Qf6</b>"
  , 'Nc3', 'Bc5' //016
        , 'hlp32'=>"<b>16. Nc3, Bc5</b>"
  , 'Nd5', 'Qxb2' //017
        , 'hlp34'=>"<b>17. Nd5, Qxb2</b>
        "
  , 'Bd6', 'Bxg1' //018
        , 'hlp36'=>"<b>18. Bd6!, Bxg1?</b>
        "
  , 'e5', 'Qxa1+' //019
        , 'hlp38'=>"<b>19. e5!, Qxa1+</b>"
  , 'Ke2', 'Na6' //020
        , 'hlp40'=>"<b>20. Ke2, Na6</b>
        "
  , 'Nxg7+', 'Kd8' //021
        , 'hlp42'=>"<b>21. Nxg7+, Kd8</b>"
  , 'Qf6+', 'Nxf6' //022
        , 'hlp44'=>"<b>22. Qf6+!, Nxf6</b>"
  , 'Be7#', 'Kd8' //023
        , 'hlp46'=>"<b>23. Be7# MAT 1-0</b>"

  , 'Be7#', 'Kd8' //024
        , 'hlp46'=>"<b>24. Be7# MAT 1-0</b>"

  , 'Be7#', 'Kd8' //025
        , 'hlp46'=>"<b>25. Be7# MAT 1-0</b>"
  , 'Be7#', 'Kd8' //026
        , 'hlp46'=>"<b>26. Be7# MAT 1-0</b>"
  , 'Be7#', 'Kd8' //027
        , 'hlp46'=>"<b>27. Be7# MAT 1-0</b>"
  , 'Be7#', 'Kd8' //028
        , 'hlp46'=>"<b>28. Be7# MAT 1-0</b>"
  , 'Be7#', 'Kd8' //029
        , 'hlp46'=>"<b>29. Be7# MAT 1-0</b>"
  , 'Be7#', 'Kd8' //030
        , 'hlp46'=>"<b>30. Be7# MAT 1-0</b>"
  , 'Be7#', 'Kd8' //031
        , 'hlp46'=>"<b>31. Be7# MAT 1-0</b>"
  , 'Be7#', 'Kd8' //032
        , 'hlp46'=>"<b>32. Be7# MAT 1-0</b>"
  , 'Be7#', 'Kd8' //033
        , 'hlp46'=>"<b>33. Be7# MAT 1-0</b>"
  , 'Be7#', 'Kd8' //034
        , 'hlp46'=>"<b>34. Be7# MAT 1-0</b>"
  , 'Be7#', 'Kd8' //035
        , 'hlp46'=>"<b>35. Be7# MAT 1-0</b>"
*/
] ;
