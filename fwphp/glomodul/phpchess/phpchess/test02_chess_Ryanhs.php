<?php

use \Ryanhs\Chess\Chess;
require 'Chess.php';  //51 kB   no need require 'vendor/autoload.php';

    //         Defaults (prescribed, zadane values)
    $moves_in_board = 2 ;

    ?>
      <pre>
      use \Ryanhs\Chess\Chess; require 'Chess.php'; //51 kB no need require 'vendor/autoload.php';

      $chess = new Chess();
      $chess->clear();
      //to be able to display "FEN=8/8/8/8/8/8/8/8 w - - 0 1" :
      echo 'FEN=' . $chess->fen() . &lt;br />; //generate fen
      echo $chess; //displ empty board: public fn __toString() return $this->get_boardhtml();
      //echo $chess->get_boardhtml() . '<br />'; //same as above
      </pre>
    <?php
    $chess = new Chess();
    $chess->clear();
    //to be able to display FEN=8/8/8/8/8/8/8/8 w - - 0 1 :
    echo 'FEN=' . $chess->fen() . '<br />' ; //generate fen
    echo $chess . '<br />'; //displ empty board: public fn __toString() return $this->get_boardhtml();
    //echo $chess->get_boardhtml() . '<br />'; //same as above

echo '<h1>1. Moves from fen_starting and some moves</h1>';


$chess = new Chess();

//FEN FOR STARTING POSITION :
$fen_starting = 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1' ;
            //$chess->load_fen($fen_starting) ;
$chess->fen() ;


echo '<b>ln '. __LINE__ .' SAYS 1: done $chess->fen()  or $chess->load_fen($fen_starting) ; </b><p>'; print($fen_starting) ; echo '</p>';

$chess->move('b3');
$chess->move('Nf6');   //WORKING ONLY UPPERCASE !!  $chess->move('nf6'); //NOT WORKING


echo '<b>ln '. __LINE__ .' SAYS 2: after $chess->move(\'b3\'); and Nf6 (Nd5), $chess->get_history()[0]=</b><br /><pre>'; print_r($chess->get_history()[0]) ; echo '</pre>';

echo 'ln '. __LINE__ .' SAYS 3: $chess->fen()</b><br />' . $chess->fen() ;
echo '<br /><b>ln '. __LINE__ .' SAYS : moves until now $chess->p gn()=</b><br />' . $chess->movesUntilNow_str() ;

echo $chess->get_boardhtml($help_2moves='') ; 
echo $chess->ascii() ; 











echo '<h1>2. Moves from fen</h1>';

$chess = new Chess();
$fen = '8/8/8/4k3/4Q3/8/8/8 w KQkq - 0 1'; //= empty board to fill with move(),load_fen()
$chess->load_fen($fen) ;
echo '<b>ln '. __LINE__ .' SAYS 3: $chess->fen() after put K Black e5  and put Q W e4 </b><br />' .$chess->fen() . '<br /><br />' ; //generate fen     PHP_EOL
                        /* // not working :
                        $chess->put(['type' => 'K', 'color' => Chess::BLACK], 'e5');
                        $chess->put(['type' => 'Q', 'color' => Chess::WHITE], 'e4'); */
echo '<br /><b>ln '. __LINE__ .' SAYS moves until now : $chess->p gn()=</b><br />' . $chess->movesUntilNow_str() ;
echo $chess->get_boardhtml($help_2moves='') ; 
    //or echo $chess; // outputs FEN => 8/8/8/4k3/4Q3/8/8/8 w KQkq - 0 1 and tbl with k, Q







echo '<h1>3. Moves from pgn string</h1>';

$chess = new Chess();
$chess->load_fen($chess::DEFAULT_POSITION); ; //load_ default_pos();
$match = '1. e4 e6 2. d4 d5 3. Nc3 Nf6 4. Bg5 dxe4 5. Nxe4 Be7 6. Bxf6
        gxf6 7. g3 f5 8. Nc3 Bf6';

$moves = preg_replace("/([0-9]{0,})\./", "", $match);
$moves = str_replace("\r", ' ', str_replace("\n", ' ', str_replace("\t", '', $moves)));
while (strpos($moves, '  ') !== FALSE) $moves = str_replace('  ', ' ', $moves);

$moves = explode(' ', trim($moves));

foreach ($moves as $move) {
  if( $chess->move($move) === null ) { // $chess->move($move) "moves" piece
     var_dump($move);
  }
}



$fen = $chess->fen() ;
echo '<br /><b>ln ' . __LINE__ .' SAYS 2: $chess->fen()=</b><br />' . $fen ;
// rnbqk2r/ppp2p1p/4pb2/5p2/3P4/2N3P1/PPP2P1P/R2QKBNR w KQkq - 2 9 

echo '<br /><b>ln '. __LINE__ .' SAYS moves until now : $chess->p gn()=$chess->movesUntilNow_str()=</b><br />' . $chess->movesUntilNow_str() ;
echo $chess->get_boardhtml($help_2moves='') ; 

//echo json_encode($chess->get_history(), JSON_PRETTY_PRINT) . '<br />';
echo '<br /><b>ln '. __LINE__ .' SAYS : $chess->get_history()=</b><pre>'; print_r($chess->get_history()) ; echo '</pre>';

echo $chess->ascii() ;



            //$return = $chess->loadPgn($pgn_arr);
            //$fen = $chess->fen() ;
            //echo 'FEN=' . $fen . '<br />';
            //$chess->load_fen($fen);

                //if (!isset($chess->get_set_hdrtag()['FEN'])) { $fen_startboard = $chess->fen() ; } // or :
                //else { $fen_startboard = $chess->get_set_hdrtag()['FEN'] ;  }
                //$chess->load_fen(Chess::DEFAULT_POSITION); 
                // $chess->load_fen('rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1')
                // Empty board  '8/8/8/8/8/8/8/8 w KQkq - 0 1 = to fill with move(),load_fen()

/*
$board = $chess->fen2board($fen) ; // squares used and non used
echo '<br /><b>ln '. __LINE__ .' SAYS 4: squares used and non used :
   $board=$chess->f e n 2 b o a r d($fen)=</b><pre>'; print_r($board) ; echo '</pre>';
*/



/*
//echo $mv[0] ;
$ii = 0 ;
while (isset($mv[$ii])) {

  $chess->move($mv[$ii]); //1. halfmove

  //2. whole table after move
  if ($ii%$moves_in_board === 0) { $chess->get_boardhtml($help_2moves='') ; }
  if (isset($mv['hlp'. $ii])) {echo $mv['hlp'. $ii] . '<br /><br /><br />' ;} //halfmove comment

  $ii++ ;
}
*/
//Returns a string containing an ASCII diagram of the current position :
//echo $chess->ascii() . '<br />' ;









          //$chess->fen() ; or echo $chess->fen() . '<br />'; 
          //or alias $chess->fen($fen_starting)
          // or $chess->load_fen($fen) ;
          // or $chess->load_fen($fen_starting) ;

                  /*
          $chess->load_fen('rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1') ;
                           After 1. e4:  
                     +------------------------+
                   8 | r  n  b  q  k  b  n  r | rnbqkbnr
                   7 | p  p  p  p  p  p  p  p | pppppppp
                   6 | .  .  .  .  .  .  .  . | 8
                   5 | .  .  .  .  .  .  .  . | 8
                   4 | .  .  .  .  P  .  .  . | 4P3
                   3 | .  .  .  .  .  .  .  . | 8
                   2 | P  P  P  P  .  P  P  P | PPPP1PPP
                   1 | R  N  B  Q  K  B  N  R | RNBQKBNR
                     +------------------------+
                       a  b  c  d  e  f  g  h

          $chess->load_fen('rnbqkbnr/pp1ppppp/8/2p5/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 2') ;
                          After 1. ... c5:
                     +------------------------+
                   8 | r  n  b  q  k  b  n  r |
                   7 | p  p  .  p  p  p  p  p |
                   6 | .  .  .  .  .  .  .  . |
                   5 | .  .  p  .  .  .  .  . | 2p5
                   4 | .  .  .  .  P  .  .  . | 4P3
                   3 | .  .  .  .  .  .  .  . |
                   2 | P  P  P  P  .  P  P  P |
                   1 | R  N  B  Q  K  B  N  R |
                     +------------------------+
                       a  b  c  d  e  f  g  h
                  */

              //$chess->move($mv[2]); //eg 'c5'
              //$fen = 'rnbqkb1r/pp1ppppp/5n2/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2' ;
              //$chess->load_fen($fen) ;
              //echo '<br /><br /><br /><b>ln '. __LINE__ .' SAYS 1: loaded $chess->load_fen($fen) ; </b><p>'; print($fen) ; echo '</p>';

              /*$chess->move('e4');    //1. halfmove
              $chess->move('e5');      //1. halfmove
              $chess->move('Ke2');   //1. halfmove
              $chess->move('Qe7');   //1. halfmove WORKING ONLY UPPERCASE !!
              //$chess->move('Ke7');   //1. halfmove WORKING ONLY UPPERCASE !!
              //$chess->move('Be7');   //1. halfmove WORKING ONLY UPPERCASE !!
              //$chess->move('Nf6'); //1. halfmove WORKING ONLY UPPERCASE !! */

    /*
    //$css_files = ["chess.css"]; // no css
    $ds = DIRECTORY_SEPARATOR ;
    $QS = '?' ;

    // 4*2=8 moves in 4-boards web page row :
    if (isset($_POST['b'])) {$boards_in_row=$_POST['b'];} else {$boards_in_row=4;}
    // game moves script to include :
    if (isset($_GET['g'])) {$pgnfle_toinc=$_GET['g'];} else {$pgnfle_toinc='001';}

     $wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
              // 2. URL_DOM AIN = dev1:8083 :
            . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

      $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;
      $uri_arr = explode($QS, $REQUEST_URI) ; 
      $module_relpath = rtrim(ltrim($uri_arr[0],'/'),'/');
      $module_url = $wsroot_url.$module_relpath.'/';
    */

/*$pgn_arr = $chess->pgn2hdr_mv_hlp('1. b3 Nf6'); //$game_pgnString
  $hdr = $pgn_arr['header'] ;
  $mv  = $pgn_arr['moves'] ;
  $hlp = $pgn_arr['hlp'] ;*/
  
  
                      /*
                      while (!$chess->gameOver()) {
                        $moves = $chess->moves(); //slowwwwwww
                        $move = $moves[mt_rand(0, count($moves) - 1)];
                              //echo '</pre>'.$move.'</pre>'; //Nc3d6g4a6a4Kd7Rb1h5e4e6Bd3Qe8Bxa6Qe7Be2Nc6h3Kd8Rh2e5Bf3Rb8d3Ke8d4Qg5Be2Nxd4Be3c5Ba6hxg4f3Qe7b... ~1500 chars
                        $chess->move($move);
                      }
                      */






/*
         ************* GAME STATUS AFTER e4,e5 *************
$game->game_pgnString()=1.e4 e5
                      $game->history()=Array
                      (
                          [0] => stdClass Object
                              (
                                  [pgn] => e4
                                  [color] => w
                                  [identity] => P
                                  [position] => e2
                                  [isCapture] => 
                                  [isCheck] => 
                              )

                          [1] => stdClass Object
                              (
                                  [pgn] => e5
                                  [color] => b
                                  [identity] => P
                                  [position] => e7
                                  [isCapture] => 
                                  [isCheck] => 
                              )

                      )
$game->status()=stdClass Object
(
    [turn] => w
    [castling] => Array
        (
            [w] => Array
                (
                    [castled] => 
                    [O-O] => 1
                    [O-O-O] => 1
                )

            [b] => Array
                (
                    [castled] => 
                    [O-O] => 1
                    [O-O-O] => 1
                )

        )

    [squares] => stdClass Object
        (
            [free] => Array
                (
                    [0] => a3
                    [1] => a4
                    [2] => a5
                    [3] => a6
                    [4] => b3
                    [5] => b4
                    [6] => b5
                    [7] => b6
                    [8] => c3
                    [9] => c4
                    [10] => c5
                    [11] => c6
                    [12] => d3
                    [13] => d4
                    [14] => d5
                    [15] => d6
                    [16] => e2
                    [17] => e3
                    [18] => e6
                    [19] => e7
                    [20] => f3
                    [21] => f4
                    [22] => f5
                    [23] => f6
                    [24] => g3
                    [25] => g4
                    [26] => g5
                    [27] => g6
                    [28] => h3
                    [29] => h4
                    [30] => h5
                    [31] => h6
                )

            [used] => stdClass Object // <============
                (
                    [w] => Array
                        (
                            [0] => a1
                            [1] => b1
                            [2] => c1
                            [3] => d1
                            [4] => e1
                            [5] => f1
                            [6] => g1
                            [7] => h1
                            [8] => a2
                            [9] => b2
                            [10] => c2
                            [11] => d2
                            [12] => f2
                            [13] => g2
                            [14] => h2
                            [15] => e4
                        )

                    [b] => Array
                        (
                            [0] => a8
                            [1] => b8
                            [2] => c8
                            [3] => d8
                            [4] => e8
                            [5] => f8
                            [6] => g8
                            [7] => h8
                            [8] => a7
                            [9] => b7
                            [10] => c7
                            [11] => d7
                            [12] => f7
                            [13] => g7
                            [14] => h7
                            [15] => e5
                        )

                )

        )

    [attack] => stdClass Object
        (
            [w] => Array
                (
                )

            [b] => Array
                (
                )

        )

    [space] => stdClass Object
        (
            [w] => Array
                (
                    [0] => a3
                    [1] => a6
                    [2] => b3
                    [3] => b5
                    [4] => c3
                    [5] => c4
                    [6] => d3
                    [7] => d5
                    [8] => e2
                    [9] => e3
                    [10] => f3
                    [11] => f5
                    [12] => g3
                    [13] => g4
                    [14] => h3
                    [15] => h5
                )

            [b] => Array
                (
                    [0] => a3
                    [1] => a6
                    [2] => b4
                    [3] => b6
                    [4] => c5
                    [5] => c6
                    [6] => d4
                    [7] => d6
                    [8] => e6
                    [9] => e7
                    [10] => f4
                    [11] => f6
                    [12] => g5
                    [13] => g6
                    [14] => h4
                    [15] => h6
                )

        )

)
*/
