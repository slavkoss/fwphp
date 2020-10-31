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

//         Defaults (prescribed, zadane values)
$moves_in_board = 2 ;
$boards_in_row  = 4 ; // 4*2=8 moves in 4-boards web page row

$ds = DIRECTORY_SEPARATOR ;

if (isset($_POST['b'])) { $boards_in_row  = $_POST['b'] ; }

// hdr, moves :
if (isset($_GET['g'])) 
{
  ///////////////////////////////////////////////
  //     1. SHOW GAME selected in menu
  ///////////////////////////////////////////////
  $chess = new Chess();
  include __DIR__ . $ds .'games'. $ds . $_GET['g'].'.php';


  //FEN CHESS NOTATION FOR 32 PIECES STARTING POSITION : 
  $fen_startboard = $chess->fen() ; // or :
         // $chess->load('rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1')
         // Empty board  '8/8/8/8/8/8/8/8 w KQkq - 0 1 = to fill with move(),load()
  ?>
  <!doctype html>
  <html>
  <head>
    <meta charset="utf-8" />

    <!--link rel="stylesheet" href="/static/css/examples.css" /-->
    <title>Chess</title>
                    <?php
                    //foreach ( $css_files as $css_file ): ?>
                      <!--link rel="stylesheet" type="text/css" media="screen,projection" href="<?=$css_file?>"/-->
                    <?php //endforeach;?>

    <style></style>
  </head>



  <body>
    <?php 
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
  <h2>
     Learn chess using 1,2,3,4 boards in row each 2 MOVES & COMMENTS
  </h2>
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
