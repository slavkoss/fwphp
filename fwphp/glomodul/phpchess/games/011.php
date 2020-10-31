<?php
// see https://www.chessgames.com/perl/chessgame?gid=1977101  Siegbert Tarrasch vs Allies 1915
$chess->header('White', 'Adolf Anderssen');
$chess->header('Black', 'Lionel Kieseritzky');
$chess->header('Result', '1-0, 23 moves');
$chess->header('Opening', 'Bishop\'s Gambit (ECO C33)');
$chess->header('when', '21 June 1851 during a break of the first international tournament');
$chess->header('where', 'London');

//        G A M E  I N F O  https://en.wikipedia.org/wiki/Immortal_Game
//        Moves with help
$mv = [ 
  "<h3>Adolf Anderssen - Lionel Kieseritzky</h3>
   Opening: Bishop's Gambit (ECO C33)
   &nbsp; &nbsp; <a href=\"https://en.wikipedia.org/wiki/Immortal_Game\">Wikipedia</a>
   &nbsp; &nbsp; <a href=\"https://www.chessgames.com/perl/chessgame?gid=1018910\">On line play</a>
   <br />21 June 1851 London, during a break of the first international tournament.
   "
        //    G A M E  M O V E S  A N D  C O M M E N T S
  , 'e4', 'e5' //m o v e  001
        , 'hlp2'=>"<b>1. e4, e5</b>"

  , 'f4', 'exf4' //002
        , 'hlp4'=>"<b>2. f4, exf4</b> <i>Accepted King's Gambit</i>: Anderssen offers his pawn in exchange for faster development. This was one of the most popular openings of 19. century and is 
        still seen occasionally, though defensive techniques have improved since Anderssen's time."

  , 'Bc4','Qh4+'//+ 003
        ,'hlp6'=>"<b>3. Bc4, Qh4+</b>  Bc4 is <i>Bishop's Gambit</i>. Bc4 allows 3...Qh4+, DEPRIVING WHITE OF THE RIGHT TO CASTLE (minus), and is less popular than 3. Nf3.
        <br /><br />Qh4 check also exposes Black's queen to attack with a GAIN OF TEMPO (plus) on the eventual Ng1-f3."

  , 'Kf1', 'b5' //?! 004
        , 'hlp8'=>"<b>4. Kf1, b5</b> b5 is <i>Bryan Countergambit</i>, deeply analysed by Kieseritzky, and which sometimes bears his name. It is <u>not considered a sound move</u> by most players today."

  , 'Bxb5', 'Nf6' //005
        , 'hlp10'=>"<b>5. Bxb5, Nf6</b>"

  , 'Nf3', 'Qh6' //006
        , 'hlp12'=>"<b>6. Nf3, Qh6</b> is a common developing move, but in addition the knight attacks 
        Black's queen, forcing Black to move it instead of developing his own side."

  , 'd3', 'Nh5' //007
        , 'hlp14'=>"<b>7. d3, Nh5</b> With this move, White solidifies control of the critical centre of 
        the board. German grandmaster Robert Hübner recommends 7.Nc3 instead.
        <br /><br />
        Nh5 move threatens ...Ng3+, and protects the pawn at f4, but it also sidelines the knight to a 
        poor position at the edge of the board, where knights are the least powerful, and also does not develop a piece.
        "

  , 'Nh4', 'Qg5' //008
        , 'hlp16'=>"<b>8. Nh4, Qg5</b>  Better was 8...g6, according to Kieseritzky."

  , 'Nf5', 'c6' //009
        , 'hlp18'=>"<b>9. Nf5, c6</b>  c6 simultaneously unpins the queen pawn and attacks the bishop. 
        However, modern chess engines have suggested 9...g6 would be better, to deal with a very troublesome knight."

  , 'g4', 'Nf6' //010
        , 'hlp20'=>"<b>10. g4? Nf6</b> "

  , 'Rg1', 'cxb5' //011
        , 'hlp22'=>"<b>11. Rg1! cxb5?</b> Rg1 is an advantageous passive piece sacrifice. If Black 
        accepts, his queen will be boxed in, giving White a lead in development. <br /><br />Hübner 
        believes this was Black's critical mistake; this gains material, but loses in development, at a 
        point where White's strong development is able to quickly mount an offensive. Hübner recommends 11...h5 instead."

  , 'h4', 'Qg6' //012
        , 'hlp24'=>"<b>12. h4!, Qg6</b>  h4! - White's knight at f5 protects the pawn, which attacks Black's queen."

  , 'h5', 'Qg5' //013
        , 'hlp26'=>"<b>13. h5, Qg5</b>  "

  , 'Qf3', 'Ng8' //014
        , 'hlp28'=>"<b>14. Qf3, Ng8</b>  Qf3 - White (Anderssen) now has two threats:
          Bxf4, trapping Black's queen (the queen having no safe place to go);
          e5, attacking Black's knight at f6 while simultaneously exposing an attack by White's queen on the unprotected black rook at a8.
          <br /><br />
          This deals with the threats, but undevelops Black even furthernow the only black piece not on its starting square is the queen, which is about to be put on the run, while White has control over a great deal of the board.
          "
  , 'Bxf4', 'Qf6' //015
        , 'hlp30'=>"<b>15. Bxf4, Qf6</b>"
  , 'Nc3', 'Bc5' //016
        , 'hlp32'=>"<b>16. Nc3, Bc5</b>  An ordinary developing move by Black, which also attacks the rook at g1."
  , 'Nd5', 'Qxb2' //017
        , 'hlp34'=>"<b>17. Nd5, Qxb2</b> Nd5 - White responds to the attack with a counterattack. This move threatens the black queen and also Nc7+, forking the king and rook. Richard Réti recommends 17.d4 followed by 18.Nd5, with advantage to White, although if 17.d4 Bf8 then 18.Be5 would be a stronger move.
        <br /><br />
        Black gains a pawn, and threatens to gain the rook at a1 with check.
        "
  , 'Bd6', 'Bxg1' //018
        , 'hlp36'=>"<b>18. Bd6!, Bxg1?</b> With Bd6! move White offers to sacrifice both his rooks. Hübner comments that, from this position, there are actually many ways to win, and he believes there are at least three better moves than 18.Bd6: 18.d4, 18.Be3, or 18.Re1, which lead to strong positions or checkmate without needing to sacrifice so much material. The Chessmaster computer program annotation says \"the main point [of 18. Bd6] is to divert the black queen from the a1-h8 diagonal. Now Black cannot play 18...Bxd6? 19.Nxd6+ Kd8 20.Nxf7+ Ke8 21.Nd6+ Kd8 22.Qf8#.\" Garry Kasparov comments that the world of chess would have lost one of its \"crown jewels\" if the game had continued in such an unspectacular fashion. The Bd6 move is surprising, because White is willing to give up so much material.
        The move leading to Black's defeat. Wilhelm Steinitz suggested in 1879 that a better move would be 18...Qxa1+;[5] likely moves to follow are 19.Ke2 Qb2 20.Kd2 Bxg1.[6]
        "
  , 'e5', 'Qxa1+' //019
        , 'hlp38'=>"<b>19. e5!, Qxa1+</b>  e5 sacrifices yet another white rook. More importantly, this move blocks the queen from participating in the defense of the king, and threatens mate in two: 20.Nxg7+ Kd8 21.Bc7#."
  , 'Ke2', 'Na6' //020
        , 'hlp40'=>"<b>20. Ke2, Na6</b>  Ke2 - Black's attack has run out of steam; Black has a queen and bishop on the back rank, but cannot effectively mount an immediate attack on White, while White can storm forward. According to Kieseritzky, he resigned at this point. Hübner notes that an article by Friedrich Amelung in the journal Baltische Schachblaetter, 1893, reported that Kiesertizky probably played 20...Na6, but Anderssen then announced the mating moves. The Oxford Companion to Chess also says that Black resigned at this point, citing an 1851 publication.[7] In any case, it is suspected that the last few moves were not actually played on the board in the original game.
        <br /><br />
        The black knight covers the c7-square as White was threatening 21.Nxg7+ Kd8 and 22.Bc7#. Another attempt to defend would be 20...Ba6 allowing the black king to flee via Kc8 and Kb7, although White has enough with the continuation 21.Nc7+ Kd8 and 22.Nxa6, where if now 22...Qxa2 (to defend f7 against Bc7+, Nd6+ and Qxf7#) White can play 23.Bc7+ Ke8 24.Nb4 winning; or if 22...Bb6 (stopping Bc7+) 23.Qxa8 Qc3 24.Qxb8+ Qc8 25.Qxc8+ Kxc8 26.Bf8 h6 27.Nd6+ Kd8 28.Nxf7+ Ke8 29.Nxh8 Kxf8 with a winning endgame for White.
        "
  , 'Nxg7+', 'Kd8' //021
        , 'hlp42'=>"<b>21. Nxg7+, Kd8</b>"
  , 'Qf6+', 'Nxf6' //022
        , 'hlp44'=>"<b>22. Qf6+!, Nxf6</b>  Qf6+! queen sacrifice forces Black to give up his defense of e7."
  , 'Be7#', 'Kd8' //023
        , 'hlp46'=>"<b>23. Be7# MAT 1-0</b>  At the end, Black is ahead in material by a considerable margin: a queen, two rooks, and a bishop. But the material does not help Black. White has been able to use his remaining pieces - two knights and a bishop - to force mate.
        <br /><br />
        Savielly Tartakower described this as \"a beautiful game\".
        "
] ;
