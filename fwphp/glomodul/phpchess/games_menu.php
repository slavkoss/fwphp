  <!--
  <p><a href="http://dev1:8083/fwphp/glomodul/phpchess/pgnchess/">
  http://dev1:8083/fwphp/glomodul/phpchess/pgnchess/</a>&nbsp;&nbsp; - MENU AND HELP</p>
  <p><a href="http://dev1:8083/fwphp/glomodul/phpchess/pgnchess/?s">
  http://dev1:8083/fwphp/glomodul/phpchess/pgnchess/?s</a>&nbsp;&nbsp; s = GAME IN LOCAL PGN STRING - FOR TESTING</p>
  <p><a href="http://dev1:8083/fwphp/glomodul/phpchess/pgnchess/?g=gamex.pgn">
  http://dev1:8083/fwphp/glomodul/phpchess/pgnchess/?g=gamex.pgn</a>&nbsp;&nbsp; g = GAME IN FILE gamex.pgn</p>
  -->
<?php
if (!isset($moves_in_board)) {
  echo '<a href="./phpchess/index.php">This script is to be started from index.php</a>';
  exit(0);
}
?>
  <head>
  <style type="text/css">
.auto-style1 {
  font-family: arial, sans-serif;
  font-size: medium;
  letter-spacing: normal;
}
</style>
  </head>

  <h1>Learn play chess -&nbsp; strategy, tactics, (endgame) technique</h1>
  <ol>
  <li><a href="?g=mat_in1&amp;b=<?=$moves_in_board?>">mat_in1</a>&nbsp;- #1 Chess: 
  5334 Problems, Combinations, and Games by Laszlo Polgar<li>
	<a href="?g=1851_anderssen_kieseritzky_London&amp;b=<?=$moves_in_board?>">
	1851_<strong>anderssen</strong>_kieseritzky_London</a> or
	<a href="https://www.chessgames.com/perl/chessgame?gid=1018910" target="_blank">
	Play</a> 1-0, King's Gambit: Accepted. Bishop's Gambit Bryan Countergambit 
	(C33) 23 moves<li>
	<a href="?g=Learn001_Smirnov_Sudarkin&amp;b=<?=$moves_in_board?>" target="_blank">
	Learn001_Smirnov_Sudarkin.pgn</a><li>
	<a href="?g=Learn002_two_comp_mdleg&amp;b=<?=$moves_in_board?>" target="_blank">
	Learn002_two_comp_mdleg.pgn</a><li>
	<a href="../book_1961_Koblenz_theory_practice.php" target="_blank">book_1961_Koblenz_theory_practice</a>&nbsp;&nbsp;&nbsp;
	<a href="?g=1858_Morphy_konzult_Paris&amp;b=<?=$moves_in_board?>" target="_blank">
	1858_Morphy_konzult_Paris</a>...&nbsp;&nbsp; <li>
	<a href="?g=1907_rotlewi_rubinstein_Lodz&amp;b=<?=$moves_in_board?>">
	1907_rotlewi_<strong>rubinstein</strong>_Lodz</a>&nbsp; or
    <a href="https://www.chessgames.com/perl/chessgame?gid=1119679" target="_blank">Play</a>&nbsp; 
  0-1&nbsp; POL, Tarrasch Defense: Symmetrical Variation ECO &quot;D32&quot;, 25 moves<li>
	<a href="?g=012&amp;b=<?=$moves_in_board?>">012</a>&nbsp; orr
	<a href="https://www.chessgames.com/perl/chessgame?gid=1378821">Play</a>
	<strong>Tarraschh</strong>- Allies 1914 Naples 
  1-0, Bird Opening: Dutch Var, 35 movess<li>
	<a href="?g=031&amp;b=<?=$moves_in_board?>">031</a> not inn
	<a href="https://www.chessgames.com/">https://www.chessgames.com//</a>DB :&nbsp; Kasparov 
  - Beliavsky Linares 1991 1-0 - first game in Kasparov's 6,83 GB video. Why ??
	<br>
	<br>
	<li>
<strong>Book <span class="auto-style3">THE GOLDEN TREASURY OF CHESSS</span>I. A. Horowitz 1969 his 
	9 Favorite Games ::</strong><br>Fav 1 &nbsp; or Play Petrov'ss
	<a href="https://www.chessgames.com/perl/chessgame?gid=1257910">Immortall</a>&nbsp; 
  0-11
	<a class="auto-style7" href="https://www.chessgames.com/perl/chessplayer?pid=79214">Hoffmannn</a>&nbsp;-&nbsp;&nbsp;<a href="https://www.chessgames.com/perl/chessplayer?pid=31644"><strong>Petrovv</strong></a>Warsaw 1844 0-1 &nbsp;((<a href="https://www.chessgames.com/perl/gamesoftheday">game of the dayy</a>&nbsp;Mar-19-2017)&nbsp; Italian Game: 
  Classical Variation. Center Attack&nbsp;&nbsp;<a href="https://www.chessgames.com/perl/chessopening?eco=C53">(C53))</a>- GIUOCO&nbsp; PIANO - idea of readily 
  surrendering the Queen in order to hound the hostile King with the lesser 
  pieces, has been utilized fairly often; but Petroff's sacrifice was one of 
  the first, if not THE first..
	<li>Fav 2&nbsp; or
	<a href="https://www.chessgames.com/perl/chessgame?gid=1075495">Play</a>
	Michelet - Kieseritzky 1845 Paris, 1:0 King's Gambit: Accepted. Salvio Gambit Cochrane Gambit (C37) humor in chess - Black's Queen trapped by 
  its own far-advanced Pawns, and White's King gaily advancing down the board to 
  assist in the final attack against his colleaguee 
	<li>Fav 3&nbsp; or <a href="https://old.chesstempo.com/gamedb/game/2919104">Play</a>&nbsp; SCHULTEN 
  -KIESERITZKY 1846 Paris 0-1 - Kieseritzky was brilliant, able 
  player despite he achieved negative immortality by losing a magnificent game 
  to the great Anderssen..
	<a href="https://old.chesstempo.com/gamedb/opening/1007" style="-webkit-tap-highlight-color: rgba(255, 255, 255, 0);">King's Gambit, Accepted, Bishop's Gambit, Bryan Countergambit (C33))</a><li>
	Fav 4&nbsp; or
	<a href="https://www.chess.com/forum/view/game-analysis/adolf-anderssen-vs-max-lange-1859-ruy-lopez-birds-defence">Play</a> ANDERSSEN --
	<strong>LANGEE</strong>&nbsp;1859 Breslau 0-1&nbsp;&nbsp; 
  19 moves RUY LOPEZ&nbsp;Bird's Defence ECO:C61 - Sacrificial Orgy -&nbsp; 
  brilliancy, inspired inventiveness, sparkle into so short a game. Here is 
  the distilled essence of the very best chess of the old masters..<li>Fav 5&nbsp;
	<a href="https://old.chesstempo.com/gamedb/game/2919104">ANDERSSEN ZUKERTORTT</a>&nbsp;
	<a href="https://old.chesstempo.com/gamedb/opening/895" 
  >Italian Game,, <strong>Evans Gambitt</strong>, Paulsen Variation (C51))</a>Berlin, 1869&nbsp; - glorious battle.. 
	<li>Fav 6&nbsp;
	<a href="?g=1896_pillsbury_lasker_St_Petersburg&amp;b=<?=$moves_in_board?>">
	1896_pillsbury_<strong>lasker</strong>_St_Petersburg</a> or
	<a href="https://www.chessgames.com/perl/chessgame?gid=1109097">Play</a>&nbsp; 0-1 Queen's Gambit Declined: Pseudo-Tarrasch. Primitive Pillsbury Variation 
  (D50).&nbsp;immortal game between two Titans. Lasker's 
  combination is one of the greatest feats of the human imagination. One of 
  chess literature's most famous games. For anyone thinking of starting an a3 best games collection, I'll start you off with::
	<a href="http://www.chessgames.com/perl/chessgame?gid=1027914">Bird vs Morphy, 18588</a>&nbsp;
	<a href="http://www.chessgames.com/perl/chessgame?gid=1019048">Anderssen vs Morphy, 18588</a>&nbsp;
	<a href="http://www.chessgames.com/perl/chessgame?gid=1031957">Botvinnik vs Capablanca, 19388</a>..<li>
	Fav 7&nbsp; <a href="https://www.chessgames.com/perl/chessgame?gid=1000705">SPIELMANN DUS-CHOTIMIRSKII</a>&nbsp; 
  1-0 R U Y LOPEZ&nbsp;Spanish Game: Closed Variationss
	<font face="georgia,palatino,times new roman,times" size="-1">
	<a href="https://www.chessgames.com/perl/chessopening?eco=C84">(C84))</a>&nbsp;
	</font>Carlsbad, 1911 - 
  One of the marks of a great master is the ability to conjure up murderous 
  attacks out of seemingly harmless positions - Spielmann commences an 
  unexpected attack at move 22..<li>Fav 8&nbsp;
	<a href="https://www.chessgames.com/perl/chessgame?gid=1012796">ALEKHINE ASGEIRSSONN</a>1-0 French Defense: Classical Variation. Richter Attack&nbsp;Iceland, 1931&nbsp; - Reti 
  noted that Alekhine's outstanding quality was his ability to give even the 
  mostt <strong>commonplace positions an unusual turn..</strong>
	<li>Fav 9&nbsp;
	<a href="https://www.chessgames.com/perl/chessgame?gid=1100774">GLUCKSBERG&nbsp; NAJDORFF</a>0-1 Dutch Defense: Queen's Knight Variation Warsaw, 1929 Polish &quot;Immortal&quot; - 
  Anyone who preaches the imminent death of chess ought to take a good look at 
  this game! The striking series of brilliancies initiated by Black's 
  thirteenth move compares favorably, I believe, with any combination ever 
  played over the board.. 
  
    
  </ol>
  <p><a href="https://www.365chess.com/eco/C53-C54_Giuoco_Piano">
  https://www.365chess.com/eco/C53-C54_Giuoco_Pianohttps://www.365chess.com/eco/C53-C54_Giuoco_Piano</a> - ECO Codes 
  (Encyclopaedia of Chess Openings) is a classification system for the chess 
  openings moves. The openings are divided in five volumes labeled from &quot;A&quot; 
  through &quot;E&quot;.</p>
  <p>&nbsp;</p>
  <p>&nbsp;Learn chess using&nbsp; <span class="auto-style3">2movesboards and 
  comments 
  <ol>
  <li><strong>2movesboards - </strong>in web page row 
  are more (1 or 2 or...) boards (each 2 MOVES).</li>
  <li>&nbsp;<strong>Comments</strong> about <span class="auto-style1"><strong>ideas</strong></span> 
  behind moves are below 2movesboards.</li>
  <li>Needed <span class="auto-style1"><strong>knowledge</strong></span>. <br>
  From and to pieces positions (squares) are bordered with differnt colors.</li>
  </ol>
  <h2 class="auto-style2">&nbsp;</h2>
  <h2 class="auto-style2">1. Play, learn games</h2>
  <p class="auto-style2"><a href="http://www.wmlsoftware.com/chesspad.html">
  http://www.wmlsoftware.com/chesspad.html</a> -
  <span style="color: rgb(0, 0, 0); font-family: arial, sans-serif; font-size: medium; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">
  free chess game viewer and editor</span></p>
  <p class="auto-style2"><span class="auto-style1">
  <a href="https://lichess.org/">https://lichess.org/</a> </span></p>
  <p>
  <a href="https://www.thesprucecrafts.com/basic-principles-of-chess-openings-611601">https://www.thesprucecrafts.com/basic-principles-of-chess-<strong>openings</strong>-611601</a>
  </p>
  <p><a href="https://www.chessgames.com/perl/chessgame?gid=1018910">
  https://www.chessgames.com/perl/chessgame?gid=1018910</a> </p>
  <p>
  <a href="https://www.chess.com/analysis?_branch_match_id=851428642997622253">
  https://www.chess.com/analysis?_branch_match_id=851428642997622253</a>&nbsp; 
  chess board and PGN editor</p>
  <p>
  <a href="http://dhtmlchess.com/api/demo/website-template.html">
  http://dhtmlchess.com/api/demo/website-template.html</a> </p>
  <p>
  <a href="http://dhtmlchess.com/api/demo/play-computer.html">
  http://dhtmlchess.com/api/demo/play-computer.html</a> </p>
  <p>
  <a href="http://dhtmlchess.com/api/demo/tactic-training-mobile.html">
  http://dhtmlchess.com/api/demo/tactic-training-mobile.html</a> </p>
  
  
  <h2 class="auto-style2">&nbsp;</h2>
  <h2 class="auto-style2">2. Games in collections</h2>
  <p class="auto-style2"><a href="https://www.pdfdrive.com/">
  https://www.pdfdrive.com/</a></p>
  
  
  <p>
  <a href="http://billwall.phpwebhosting.com/">
  http://billwall.phpwebhosting.com/</a> - many .pgn files</p>
  <p>
  <a href="https://en.chessbase.com/portals/4/files/news/2008/winter/games/great01.htm">
  https://en.chessbase.com/portals/4/files/news/2008/winter/games/great01.htm</a> </p>
  <p>
  <a href="https://www.chessgames.com/perl/chesscollection?cid=1032323">
  https://www.chessgames.com/perl/chesscollection?cid=1032323</a> - 101 games 
  21st Century Masterpieces - Second decade (2011)</p>
<p>
  <a href="https://www.chessgames.com/player/mikhail_botvinnik.html?_branch_match_id=851428642997622253">
  https://www.chessgames.com/player/mikhail_<strong>botvinnik</strong>.html?_branch_match_id=851428642997622253</a>&nbsp; 
  World Chess Champion for three different periods from 1948 to 1963.</p>
  <p>
  <a href="https://en.chessbase.com/">
  https://en.chessbase.com/</a> - commercial</p>
  <p>
  <a href="https://www.chess.com/article/view/emanuel-lasker-tactical-monster?_branch_match_id=851428642997622253">
  https://www.chess.com/article/view/emanuel-<strong>lasker</strong>-tactical-monster?_branch_match_id=851428642997622253</a>
  <br> </p>
  <ol>
    <li>Lasker - Bauer Amsterdam 1880</li>
  <li>&nbsp;Euwe - Lasker (66 years old) Zurich 1934. Max Euwe took the World 
  Championship from Alekhine one year later!</li>
  <li>&nbsp;Scha/Schneppe/Schone vs. Lasker/Ked/Wolff 0-1 Berlin: Consultation 
  Game: 1890<br>[FEN &quot;3rk2r/5pp1/1Bp4p/2p1P3/2PnbP1b/1P2N3/P5PP/3R1RK1 b - - 0 
  24&quot;]<br>24... Ne2+ $1 (24... Ra8 {was also strong, but Lasker's move was by 
  far the best.}) 25. Kh1 Rxd1 26. Rxd1 {Better was} (26. Nxd1 {though} 26... 
  Kd7 $1 27. Bxc5 Ke6 {is also winning for Black.}) 26... Nxf4 27. Bxc5 Nd3 {, 
  0-1. The double threat of 28...Nxc5 and 28...Nf2+ ends the game.} 0-1<br>
  </li>
  </ol>
  <p>
  <a href="https://thechessworld.com/articles/general-information/15-best-chess-games-of-all-time-annotated/">
  https://thechessworld.com/articles/general-information/<strong>15-best-chess-games-of-all-time</strong>-annotated/</a> </p>
  <p>
    <a href="https://en.chessbase.com/post/edward-winter-s-che-explorations-3--2">
  https://en.chessbase.com/post/edward-winter-s-che-explorations-3--2</a>&nbsp;
  <span style="color: rgb(0, 0, 0); font-family: __Merriweather_5, Verdana, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;">
  Edward Winter is the editor of<span>&nbsp;</span></span><a href="http://www.chesshistory.com/winter/" style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-variant-numeric: inherit; font-variant-east-asian: inherit; font-weight: 400; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: __Merriweather_5, Verdana, sans-serif; vertical-align: baseline; color: rgb(187, 16, 43); text-decoration: underline; outline: 0px; background-color: rgb(255, 255, 255); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;" target="_blank"><strong style="box-sizing: border-box; margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: 700; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Chess 
  Notes</strong></a><br>
  <a href="https://en.chessbase.com/portals/4/files/news/2008/winter/games/great02.htm">
  https://en.chessbase.com/portals/4/files/news/2008/winter/games/great02.htm</a> </p>
  <p>
    <a href="https://www.chessgames.com/perl/chesscollection?cid=1014593">
  https://www.chessgames.com/perl/chesscollection?cid=1014593</a> - GoY's 
	favorite games</p>
  </span>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <h3><a href="../help_chess.php" target="_blank">Help chess</a></h3>
  <p>&nbsp;</p>
  <p>&nbsp;</p>

