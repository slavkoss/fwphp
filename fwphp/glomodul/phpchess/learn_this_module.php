<?php

require 'Chess.php';  //51 kB   require 'vendor/autoload.php';
use \Ryanhs\Chess\Chess;




$chess = new Chess();
                      /*
                      while (!$chess->gameOver()) {
                        $moves = $chess->moves(); //slowwwwwww
                        $move = $moves[mt_rand(0, count($moves) - 1)];
                              //echo '</pre>'.$move.'</pre>'; //Nc3d6g4a6a4Kd7Rb1h5e4e6Bd3Qe8Bxa6Qe7Be2Nc6h3Kd8Rh2e5Bf3Rb8d3Ke8d4Qg5Be2Nxd4Be3c5Ba6hxg4f3Qe7b... ~1500 chars
                        $chess->move($move);
                      }
                      */
//FEN FOR STARTING POSITION :
//            rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1
$chess->fen() ; //or alias $chess->generateFen()   //or echo $chess->fen() . '<br />'; 
          // or $chess->load('rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1') ;

                //or alias $chess->generateFen()   //or echo $chess->fen() . '<br />'; 
                // '8/8/8/8/8/8/8/8 w KQkq - 0 1 = empty board to fill with move(),load()
                //$chess->put(['type' => 'K', 'color' => Chess::BLACK], 'e5');
                //$chess->put(['type' => 'Q', 'color' => Chess::WHITE], 'e4');
                //echo 'FEN => ' . $chess->generateFen() . PHP_EOL;
                //echo $chess; // outputs FEN => 8/8/8/4k3/4Q3/8/8/8 w KQkq - 0 1 and tbl with k, Q

//$chess->move($mv[1]); //eg 'e4'
          //$chess->load('rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1') ;
                  /*     //After 1. e4:  
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
                  */

//$chess->move($mv[2]); //eg 'c5'
          //$chess->load('rnbqkbnr/pp1ppppp/8/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2') ;
          $chess->load('rnbqkb1r/pp1ppppp/5n2/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2') ;
          $chess->move('b3');
          //$chess->move('nf6'); //NOT WORKING
          $chess->move('Nd5');   //WORKING ONLY UPPERCASE !!
                  /*     //After 1. ... c5:
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


//$chess->move($mv[3]); //eg 'Nf3'
          //or $chess->load('rnbqkbnr/pp1ppppp/8/2p5/4P3/5N2/PPPP1PPP/RNBQKB1R b KQkq - 1 2') ;
                  /*     //2. Nf3:
                   +------------------------+
                 8 | r  n  b  q  k  b  n  r |
                 7 | p  p  .  p  p  p  p  p |
                 6 | .  .  .  .  .  .  .  . |
                 5 | .  .  p  .  .  .  .  . |
                 4 | .  .  .  .  P  .  .  . |
                 3 | .  .  .  .  .  N  .  . | 5N2
                 2 | P  P  P  P  .  P  P  P |
                 1 | R  N  B  Q  K  B  .  R |
                   +------------------------+
                     a  b  c  d  e  f  g  h
                  */


              /*$chess->move('e4');    //1. halfmove
              $chess->move('e5');    //1. halfmove
              $chess->move('Ke2');   //1. halfmove
              $chess->move('Qe7');   //1. halfmove WORKING ONLY UPPERCASE !!
              //$chess->move('Ke7');   //1. halfmove WORKING ONLY UPPERCASE !!
              //$chess->move('Be7');   //1. halfmove WORKING ONLY UPPERCASE !!
              //$chess->move('Nf6');   //1. halfmove WORKING ONLY UPPERCASE !! */
              
              /*while (!$chess->gameOver()) {
                $moves = $chess->moves();
                $move = $moves[mt_rand(0, count($moves) - 1)];
                $chess->move($move);
              } */
              //echo $chess->ascii() ; //2. chess table after both halfmove


//echo '<pre>'; print_r($mv); echo  '</pre>';

 echo $chess->ascii_pure() ; 

/*
echo $mv[0] ; // game info
$ii = 1 ;
while (isset($mv[$ii])) {

  $chess->move($mv[$ii]); //1. halfmove

  if ($ii%2 === 0) { echo $chess->ascii_pure() ; }//2. whole table after move
  if (isset($mv['hlp'. $ii])) {echo $mv['hlp'. $ii] . '<br /><br /><br />' ;} //halfmove comment

  $ii++ ;
}
*/
//Returns a string containing an ASCII diagram of the current position :
//echo $chess->ascii() . '<br />' ;




$chess->reset();
$match = '1. e4 e6 2. d4 d5 3. Nc3 Nf6 4. Bg5 dxe4 5. Nxe4 Be7 6. Bxf6
        gxf6 7. g3 f5 8. Nc3 Bf6';
$moves = preg_replace("/([0-9]{0,})\./", "", $match);
$moves = str_replace("\r", ' ', str_replace("\n", ' ', str_replace("\t", '', $moves)));
while (strpos($moves, '  ') !== FALSE) $moves = str_replace('  ', ' ', $moves);
$moves = explode(' ', trim($moves));
foreach ($moves as $move) if($chess->move($move) === null) var_dump($move);

echo json_encode($chess->history()) . '<br />';


?>


<!--   with chess.css :
  <ul><li>8</li><li style="background:white;">a8</li><li>b8</li><li style="background:white;">c8</li><li>d8</li><li style="background:white;">e8</li><li>f8</li><li style="background:white;">g8</li><li>h8</li></ul>

  <ul><li>7</li><li>a7</li><li style="background:white;">b7</li><li>c7</li><li style="background:white;">d7</li><li>e7</li><li style="background:white;">f7</li><li>g7</li><li style="background:white;">h7</li></ul>

  <ul><li>6</li><li style="background:white;">a6</li><li>b6</li><li style="background:white;">c6</li><li>d6</li><li style="background:white;">e6</li><li>f6</li><li style="background:white;">g6</li><li>h6</li></ul>

  <ul><li>5</li><li>a5</li><li style="background:white;">b5</li><li>c5</li><li style="background:white;">d5</li>
      <li>e5</li><li style="background:white;">f5</li><li>g5</li><li style="background:white;">h5</li></ul>

  <ul><li>4</li><li style="background:white;">a4</li><li>b4</li><li style="background:white;">c4</li><li>d4</li>
     <li style="background:white;">e4</li><li>f4</li><li style="background:white;">h4</li><li>h4</li></ul>

  <ul><li>3</li><li>a3</li><li style="background:white;">b3</li><li>c3</li><li style="background:white;">d3</li>
      <li>e3</li><li style="background:white;">f3</li><li>g3</li><li style="background:white;">h3</li></ul>

  <ul><li>2</li><li style="background:white;">a2</li><li>b2</li><li style="background:white;">c2</li><li>d2</li>
      <li style="background:white;">e2</li><li>f2</li><li style="background:white;">g2</li><li>h2</li></ul>

  <ul><li>1</li><li>a1</li><li style="background:white;">b1</li><li>c1</li><li style="background:white;">d1</li>
      <li>e1</li><li style="background:white;">f1</li><li>g1</li><li style="background:white;">h1</li></ul>


    <ul><li></li><li>a</li><li>b</li><li>c</li><li>d</li><li>e</li><li>f</li><li>g</li><li>h</li></ul>
-->



