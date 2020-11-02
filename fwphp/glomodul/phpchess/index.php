<?php
// https://github.com/ryanhs/chess.php as https://github.com/jhlywa/chess.js
// doc https://ryanhs.github.io/chess.php/
      // fork https://github.com/p-chess/chess
//https://chessboardjs.com/

//https://www.chessgames.com/perl/chesscollection?cid=1014593
//https://www.chessgames.com/perl/chessgame?gid=1018910

use \Ryanhs\Chess\Chess;

require 'Chess.php';  //51 kB   require 'vendor/autoload.php';

//$css_files = ["chess.css"]; // no css
$ds = DIRECTORY_SEPARATOR ;

//         Defaults (prescribed, zadane values)
$moves_in_board = 2 ;
// 4*2=8 moves in 4-boards web page row :
if (isset($_POST['b'])) {$boards_in_row=$_POST['b'];} else {$boards_in_row=4;}
// game moves script to include :
if (isset($_GET['g'])) {$game_movscr_toinc=$_GET['g'];} else {$game_movscr_toinc='001';}

// hdr, moves :

  ?><!doctype html>
  <html>
  <head>
    <meta charset="utf-8" />
    <title>Chess</title>
                <?php //foreach ( $css_files as $css_file ): ?>
                  <!--link rel="stylesheet" type="text/css" media="screen,projection" href="<?=$css_file?>"/-->
                <?php //endforeach; ?>
                <style>
                .auto-style2 {
  color: #808000;
}
.auto-style1 {
  color: #008000;
}
.auto-style3 {
  color: #000000;
}
.auto-style4 {
  margin-left: 40px;
}
                </style>
  </head>


  <body><?php 

if (isset($_GET['g'])) 
{
  ///////////////////////////////////////////////
  //     1. SHOW GAME selected in menu
  ///////////////////////////////////////////////
  $chess = new Chess();
  //in URL is basename eg g=001 :
  include __DIR__ . $ds .'games'. $ds . $game_movscr_toinc .'.php';


  //FEN CHESS NOTATION FOR 32 PIECES STARTING POSITION : 
  $fen_startboard = $chess->fen() ; // or :
         // $chess->load('rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1')
         // Empty board  '8/8/8/8/8/8/8/8 w KQkq - 0 1 = to fill with move(),load()

                      //echo '<pre>$mv='; print_r($mv); echo  '</pre>';
                      //$ii = 1 ; while (isset($mv[$ii])) { echo "<pre>\$mv[$ii]="; print_r($mv[$ii]); echo  '</pre>'; $ii++ ; }
    ?>
    <div class="chess"><!-- was tuesday days31 (October 2019) -->
      <!-- game info   .' 0x88='. 0x88  = 136    $mv[0] -->
      <pre><?php //print_r($parsedPgn['header']); ?></pre>
    <?php

    $ii = 1 ;
    //$boards_rows = 1; 
    // All halfmoves in Moves with help array :
      ?><!-- We display chess board for each 2 moves, $boards_in_row times -->
      <table width="100%" cellspacing="0px" cellpadding="0px" border="1px">
      <?php
    while (isset($mv[$ii])):
    {

      //1. halfmove
      //if ($mv[$ii] == 'O-O') { $chess->move('Kf1'); //$chess->move('Rf1'); } else { 
      $chess->move($mv[$ii]); //}


      if ($ii === 1)  echo '<tr>' ; //DISPLAY MORE CHESS BOARDS IN TBLROW

        if ($ii%$moves_in_board === 0) { 
          // DISPLAY CHESS BOARD FOR EACH 2 HALFMOVES :
          //3. comment of 2 moves
          $help_2moves = isset($mv['hlp'. $ii]) ? $mv['hlp'. $ii] : '' ;


          //2. Chess table after both halfmoves
          echo '<td style="vertical-align:top; padding:5px;">' ;
            echo $chess->ascii( $help_2moves ) ;
          echo '</td>' ;


      if ($ii%($boards_in_row * $moves_in_board) === 0) {
        //DISPLAY MORE CHESS BOARDS IN TBLROW
        echo '</tr><tr>' ;
      } 


        } //e n d  DISPLAY CHESS BOARD FOR EACH 2 HALFMOVES


      $ii++ ;
    } endwhile ;

      ?><!-- We display chess board for each 2 moves, $boards_in_row times -->
      </table><?php



    echo '<p><p></pre>$chess->header()='; print_r($chess->header()); echo '</pre>';
    echo '<p><p>'. $chess->pgn(); //moves until now
    

     ?>
      <div>
        <p>&copy; 2001-<?php echo date("Y");?>
        <?php
            if (isset($_SESSION['user'])) {
               echo " Prijavljen je korisnik: ".$_SESSION['user']->user_name.'</p>' ;
            } else { //echo " Niste prijavljeni!";  //echo $_DisplayLinks()
            } ?>
        </p>
      </div><br />

    </div>

  <?php
} else
    ///////////////////////////////////////////////
    //     2. M E N U  OF GAMES
    ///////////////////////////////////////////////
  {?>
  <h1>&nbsp;Learn chess games</h1>
  <ol>
  <li><a href="?g=001&b=$moves_in_board">
    001 Rotlewi - Rubinstein, 1907</a> Lodz POL, ECO "D32", 0-1, 25 moves
  <li><a href="?g=011&b=$moves_in_board">
    011 Anderssen - Kieseritzky, 1851</a> London, Bishop's Gambit, 1-0, 23 moves
  <li><a href="?g=012&b=$moves_in_board">
    012 Tarrasch - Allies, 1914</a> Naples, Bird Opening: Dutch Var., 1-0, 35 moves
  </ol>
  <?php
} // get parms


?>
  <p>&nbsp;Learn chess using&nbsp; <span class="auto-style3">2movesboards and 
  comments </span>:</p>
  <ol>
	<li><span class="auto-style3"><strong>2movesboards - </strong>in web page row 
	are more (1 or 2 or...) boards (each 2 MOVES)</span>.</li>
	<li>&nbsp;<strong>Comments</strong> about <span class="auto-style1"><strong>ideas</strong></span> 
	behind moves are below 2movesboards.</li>
	<li>Needed <span class="auto-style1"><strong>knowledge</strong></span>. <br>
	From and to pieces positions (squares) are bordered with differnt colors.</li>
  </ol>
  <h2 class="auto-style2">1. Play, learn games</h2>
  <p>&nbsp;<a href="https://www.thesprucecrafts.com/basic-principles-of-chess-openings-611601">https://www.thesprucecrafts.com/basic-principles-of-chess-<strong>openings</strong>-611601</a>
  </p>
  <p><a href="https://www.chessgames.com/perl/chessgame?gid=1018910">
  https://www.chessgames.com/perl/chessgame?gid=1018910</a> </p>
  <p>
  <a href="https://www.chess.com/analysis?_branch_match_id=851428642997622253">
  https://www.chess.com/analysis?_branch_match_id=851428642997622253</a>&nbsp; 
  chess board and PGN editor</p>
  <h2 class="auto-style2">2. See - play games in collections</h2>
  <p>
  <a href="https://www.chessgames.com/player/mikhail_botvinnik.html?_branch_match_id=851428642997622253">
  https://www.chessgames.com/player/mikhail_<strong>botvinnik</strong>.html?_branch_match_id=851428642997622253</a>&nbsp; 
  World Chess Champion for three different periods from 1948 to 1963.</p>
  <p>
  <a href="https://www.chess.com/article/view/emanuel-lasker-tactical-monster?_branch_match_id=851428642997622253">
  https://www.chess.com/article/view/emanuel-<strong>lasker</strong>-tactical-monster?_branch_match_id=851428642997622253</a>
  <br><strong>Lasker</strong>: endgame mastery, the first chess psychologist,
  <strong>greatest defensive (save lost positions)</strong> player ever, World 
  Champion 27 years. Lasker calculated extremely deeply, seeing things that 
  others would never find resulting in great combinations, just like all the 
  other great tacticians. Chaotic tactical tidal waves (like <strong>Tal</strong> 
  did), which drowned one opponent - defensive setups that even modern computers 
  are incapable of seeing. </p>
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
  https://thechessworld.com/articles/general-information/<strong>15-best-chess-games-of-all-time</strong>-annotated/</a>
  <br><a href="https://www.chessgames.com/perl/chesscollection?cid=1014593">
  https://www.chessgames.com/perl/chesscollection?cid=1014593</a> </p>
  <p>&nbsp;</p>
  <p>Chess history
  <a href="https://www.chess.com/article/view/the-10-most-important-moments-in-chess-history?_branch_match_id=851428642997622253">
  https://www.chess.com/article/view/the-10-most-important-moments-in-chess-history?_branch_match_id=851428642997622253</a>
  </p>
  <p class="auto-style4">&nbsp;<strong>Romantic Era</strong> of chess in the 
  second half of the 19th century was all about gambits, sacrifices, open lines, 
  and active pieces. Attack at all costs! Defense is for cowards&nbsp; fell into 
  decline as its failures mounted against the more pragmatic and dogmatic 
  teachings of Wilhelm Steinitz and Siegbert <strong>Tarrasch</strong> in the 
  late 19th&nbsp; and early 20th.<strong> Steinitz</strong>: the first master of 
  positional chess. Alekhine: dynamic, combinative genius. Capablanca: endgame 
  mastery and positional elegance. <strong>Tal</strong>: attack and tactics. 
  Russia’s Alexander <strong>Alekhine</strong> (later baturalized French) took 
  the world title from Cuba’s José Raúl <strong>Capablanca</strong> in a&nbsp; 
  legendary World Championship match held in Buenos Aires, Argentina, in 1927 - 
  34 games, the longest until Garry’s first match with Karpov lasted a record 
  48. Ukrainian-Soviet Grandmaster David <strong>Bronstein</strong> (200 Open 
  Games) came as close as one can get to becoming world champion without 
  achieving the highest title. He drew a world championship match against the 
  mighty <strong>Botvinnik</strong> in 1951, but the champion retained the title 
  with a draw. Bronstein would remain one of the strongest and most creative 
  players in the world for many years. <strong>Anand</strong> Indian star famed 
  for his ultra-rapid play&nbsp; had unified world chess crown in 2008 by 
  beating <strong>Kramnik</strong>. He held the title until 2013, when he was 
  unseated by the current champion, Norway’s Magnus <strong>Carlsen</strong>. 
  English Grandmaster Mickey <strong>Adams</strong> has been England’s top 
  player for two decades, he never reached a World Championship match like his 
  countryman Nigel <strong>Short</strong>, who faced Garry in 1993. Kasparov 
  used some of openings from his DB while coaching Magnus Carlsen in 2009. 
  Grandmaster Yasser <strong>Seirawan</strong> is a four-time US champion who 
  became one of America’s top international players in the post-Fischer era.</p>
  <p class="auto-style4">&nbsp;<strong>Chess computers</strong> employ massive 
  databases of endgame positions called tablebases (similar to how they also 
  employ opening books composed of databases of opening moves). First used in 
  1977, endgame tablebases have kept expanding to include every possible 
  position with seven total pieces on the board. <strong>Seven-piece tablebases 
  require around 140 terabytes</strong> of storage! Tablebases don’t ‘think’ the 
  way chess programs calculate their moves using an algorithm, they simply look 
  up the best move. Such machine perfection has led to many fascinating 
  discoveries and&nbsp; refuted quite a few endgame studies, but they are 
  usually too long and too complex for humans to learn to use in practice.</p>
  <p class="auto-style4">&nbsp;Chess960 maintains some popularity, but has 
  failed to replace classical chess, as Bobby Fischer hoped it would when he 
  promoted his version of the variant in 1996.</p>
  <h3>Garry Kasparov greatest attacking player of all time</h3>
  <p><strong>Karpov</strong>, and especially the 9th World Champion, Tigran
  <strong>Petrosian</strong>, were brilliant at playing quietly until their 
  opponents slipped up. - Garry Kasparov&nbsp; by many as the greatest chess 
  player of all time,&nbsp; youngest World Chess Champion in history in 1985 at 
  the age of 22 by beating Anatoly Karpov. Garry lost the 2000 World 
  Championship match in London to Russia’s Vladimir <strong>Kramnik</strong> 
  with a score of 6.5-8.5, with two losses and thirteen draws.&nbsp; Garry 
  retired from professional chess in 2005. Garry won Linares a record nine 
  times, including his last official event before retiring in 2005.&nbsp; Famous 
  line in Garry’s beloved Najdorf Sicilian Defense called the “Poisoned Pawn 
  Variation,” popularized by American World Champion Bobby Fischer. Winning 
  remarkable 16th game gave Garry a big lead in his 1986 World Championship 
  title defense against Karpov. <br>He’d won four games against only one loss. 
  Incredibly, Garry then lost the next three games in a row and the match was 
  tied with five games remaining. Garry retook the lead by winning game 22 and 
  the final two games were drawn.&nbsp; Garry once called Ukraine’s Vassily
  <strong>Ivanchuk</strong>“ the <br>player who has most surprised me over the 
  board. <br>
  <a href="https://www.chessgames.com/perl/chessgame?gid=1018648&amp;_branch_match_id=851428642997622253">
  https://www.chessgames.com/perl/chessgame?gid=1018648&amp;_branch_match_id=851428642997622253</a>
  </p>
  <p>&nbsp;</p>
  <p>Boris <strong>Spassky</strong>, the tenth World Chess Champion, held the 
  title from 1969 to 1972. </p>
  <p>&nbsp;</p>
  <p>Linares, Spain, super-tournament was often called “the Wimbledon of chess.”
  </p>
  <ol>
	<li><strong>Skewer</strong> (on King behind Quin, Quin behind King ...) is 
	linear or x-ray attack, impact, lineynyy udar.</li>
	<li>&nbsp;<strong>Double attack</strong>.</li>
	<li>&nbsp;“<strong>Poisoned</strong>” pawn or piece.</li>
	<li>&nbsp;<strong>Pin</strong>&nbsp; - close cousin of skewer, is binding&nbsp; 
	not as deadly as skewers, but they are much more common - paralyzing pieces 
	- especially in the endgame, when fewer pieces are around to come to the aid 
	of the pinned piece.&nbsp; “<strong>Absolute pin</strong>” is when the piece 
	is pinned against the king, so it literally cannot move. “Relative pins,” 
	since the piece can legally move. Garry points out that relative pins can 
	occasionally provide the opportunity for a surprising counterattack by 
	moving the pinned piece to create an even stronger threat. </li>
	<li><strong>Discovered attack and double check</strong>, its deadliest form.</li>
	<li><strong>Deflection/Attraction</strong> - famous 1967 problem by 
	Soviet-Russian composer Leopold Mitrofanov, Mitrofanov’s Deflection later 
	corrected.</li>
	<li><strong>Interference</strong> is a category of deflection, but it’s also 
	based on our ability to use opponent’s pieces to create obstacles. Don’t 
	take winning queen versus rook for granted! </li>
	<li><strong>Overload</strong> with too much work - when one piece has two 
	jobs, like defending two pieces. Often to take advantage of this, you need 
	to choose the right move order. If possible, force the overloaded piece to 
	abandon one of its responsibilities.</li>
	<li><strong>Trading</strong> pieces - as with pawn moves, captures cannot be 
	undone,&nbsp; consider what you are gaining and what you are giving up.</li>
	<li>Studying the history of the <strong>openings</strong> just to know all 
	the nuances that could help you to avoid traps or collapsing if your 
	opponent throws&nbsp; new idea at you.&nbsp; Word ‘sharp’ to describe an 
	opening, it doesn’t always have the same life-or-death connotation as a 
	sharp tactical middlegame position. Sharp openings are concrete, subject to 
	rigorous <strong>analysis and preparation</strong> to find the very best 
	moves at every point. If you don’t have the time to study, sharp openings 
	like the <strong>Sicilian</strong> and the <strong>Grunfeld</strong> aren’t 
	for you!&nbsp; Goddess of chess, Caissa, is watching over&nbsp; players and 
	punishing those who betray her traditions and precepts!</li>
	<li>You have to start with gambits - <strong>Evans Gambit</strong>, 
	aggressive opening Kasparov used against his opponent, Viswanathan Anand&nbsp; 
	Tiger of Madras India 1995 Riga, Latvia.&nbsp; <br></li>
  </ol>
</body>
</html>