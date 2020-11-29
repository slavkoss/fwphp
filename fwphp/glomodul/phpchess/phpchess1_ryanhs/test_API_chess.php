<?php
/**
 *  based on https://github.com/ryanhs/chess.php  on Aug 26, 2019 ARCHIVED
 *        which is based on https://github.com/jhlywa/chess.js or
 *  doc https://ryanhs.github.io/chess.php/
 *        ryanhs fork https://github.com/p-chess/chess (more classes, why ?) or
*/
use \Ryanhs\Chess\Chess;
require 'Chess.php';  //51 kB   no need require 'vendor/autoload.php';
$chess = new Chess();


$chess->get_set_hdrtag('Site', 'https://ryanhs.github.io/chess.php/'); //was header()
$chess->get_set_hdrtag('Event', 'Chess Training');
$chess->get_set_hdrtag('White', 'W test');
$chess->get_set_hdrtag('Black', 'B test');
$chess->get_set_hdrtag('Result', '1-0');

echo '<b>ln '. __LINE__ .' SAYS 2: $chess->get_set_hdrtag()=</b><br /><pre>'; print_r($chess->get_set_hdrtag()) ; echo '</pre>';


echo '<b>Square color</b> Chess::squareColor(\'a1\')='. Chess::squareColor('a1') . '<br />'; //dark
echo '<b>Square color</b> Chess::squareColor(\'b1\')='. Chess::squareColor('b1') . '<br /><br />'; //light



echo '<br /><br />***************************************' ;
echo '<br />             1. CLEAR' ;
echo '<br />***************************************' ;
//$chess->clear(); //to display FEN=8/8/8/8/8/8/8/8 w - - 0 1 = EMPTY BOARD
//echo 'FEN=' . $chess->fen() . '<br />' ; //generate fen without clear :
//FEN=rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1 = START BOARD
//     end 1. CLEAR --------------------------


echo '<br /><br />***************************************' ;
echo '<br />             2. CONSTRUCTOR, LOAD FEN' ;
echo '<br />***************************************' ;
$validation = Chess::validateFen('4rrk1/8/p1pR4/1p6/1PPKNq2/3P1p2/PB5n/R2Q4 b - - 6 40');
echo '<br /><b>ln '. __LINE__ .' SAYS : $validation of some fen =</b><pre>'; print_r($validation) ; echo '</pre>';

//load fen returns true | false
//$chess->load_fen('4rrk1/8/p1pR4/1p6/1PPKNq2/3P1p2/PB5n/R2Q4 b - - 6 40'); 
/*  Without load_fen = START BOARD     With load_fen = some position
      +------------------------+         +------------------------+
    8 | r  n  b  q  k  b  n  r |       8 | .  .  .  .  r  r  k  . |
    7 | p  p  p  p  p  p  p  p |       7 | .  .  .  .  .  .  .  . |
    6 | .  .  .  .  .  .  .  . |       6 | p  .  p  R  .  .  .  . |
    5 | .  .  .  .  .  .  .  . |       5 | .  p  .  .  .  .  .  . |
    4 | .  .  .  .  .  .  .  . |       4 | .  P  P  K  N  q  .  . |
    3 | .  .  .  .  .  .  .  . |       3 | .  .  .  P  .  p  .  . |
    2 | P  P  P  P  P  P  P  P |       2 | P  B  .  .  .  .  .  n |
    1 | R  N  B  Q  K  B  N  R |       1 | R  .  .  Q  .  .  .  . |
      +------------------------+         +------------------------+
        a  b  c  d  e  f  g  h                                  a  b  c  d  e  f  g  h */
    //                  0                            1  2   3 4 5
    //eg rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1
    //load_fen CALLS if (!self::validateFen($fen)['valid']) { return false; }
                     //$chess = new Chess('fen goes here'); //fen as start

/*
// go back to default position :
$chess->load('4rrk1/8/p1pR4/1p6/1PPKNq2/3P1p2/PB5n/R2Q4 b - - 6 40');
...
$chess->load_fen(Chess::DEFAULT_POSITION); //$chess->reset();
*/

//         end 2. CONSTRUCTOR -------------------------





/*
echo json_encode($chess->get_history(), JSON_PRETTY_PRINT) . '<br />';
returns :
["e4","e6","d4","d5","Nc3","Nf6","Bg5","dxe4","Nxe4","Be7","Bxf6","gxf6","g3","f5","Nc3","Bf6"]
*/
//         end 3. HISTORY -------------------------


echo $chess->ascii() . '<br />';  // Print Board (ASCII)
echo $chess . '<br />'; //displ board with public fn __toString() return $this->board_html();
           //echo $chess->board_html() . '<br />'; //same as above

echo '<br /><br />***************************************' ;
echo '<br />             3. HISTORY ' ;
echo '<br />***************************************' ;
$chess->load_fen(Chess::DEFAULT_POSITION); //$chess->reset();
$game_pgnString = '1. e4 e6 2. d4 d5 3. Nc3' ;
//$game_pgnString = '1. e4 e6 2. d4 d5 3. Nc3 Nf6 4. Bg5 dxe4 5. Nxe4 Be7 6. Bxf6
//        gxf6 7. g3 f5 8. Nc3 Bf6';
$pgn_arr = $chess->pgn2hdr_mv_hlp($game_pgnString);
$hdr = $pgn_arr['header'] ;
$mv  = $pgn_arr['moves'] ;
$hlp = $pgn_arr['hlp'] ;
//Move pieces to assign arrays history and squareOrdNO_chr :
foreach ($mv as $mve) {if($chess->move($mve) === null) {} } 
              echo '<br />ln '. __LINE__ .' SAYS after $pgn_arr = $chess->pgn2hdr_mv_hlp($game_pgnString) and $mv  = $pgn_arr[\'moves\'] :<br /> &nbsp; &nbsp; &nbsp; &nbsp; and foreach ($mv as $mve) {if($chess->move($mve) === null) {} }<br /> &nbsp; &nbsp; &nbsp; &nbsp; <b>After last move $chess->move($mve) $chess->movesUntilNow_str() (was $chess->pgn()) =</b><br />' . $chess->movesUntilNow_str() ;
                    /*switch (true) {
                      case  ( !isset($hdr['FEN']) ):
                        $fen_startboard = $chess->fen() ; break ; //starting board
                      //board with some moves done :
                      case  ( isset($hdr['FEN']) ): $fen_startboard = $hdr['FEN'] ; break ;
                      default: break;
                    }
                    $chess->load_fen($fen_startboard) ; */

                    /* // or :
                    $mves = preg_replace("/([0-9]{0,})\./", "", $match);
                    $mves = str_replace("\r", ' ', str_replace("\n", ' ', str_replace("\t", '', $mves)));

                    while (strpos($mves, '  ') !== FALSE) $mves = str_replace('  ', ' ', $mves);
                    $mves = explode(' ', trim($mves));

                    //echo '<br /><br /><b>ln '. __LINE__ .' SAYS : $mves=</b><pre>'; print_r($mves) ; echo '</pre>';
                    //no output, but $chess->move($mve) ASSIGNS HISTORY ARRAYS VALUES : 
                    foreach ($mves as $mve) {if($chess->move($mve) === null) {} }
                                     //foreach ($mves as $mve) { $chess->move($mve) ; }  //also works
                    */

//echo $chess . '<br />'; //displ board with public fn __toString() return $this->board_html();

$history_full = $chess->get_history_full() ;
                       echo '<br /><b>ln '. __LINE__ .' SAYS : $history_full = $chess->get_history_full()=</b><pre>'; print_r($history_full) ; echo '</pre>';
$history = $chess->get_history() ;
                       echo '<br /><b>ln '. __LINE__ .' SAYS : $history = $chess->get_history()=</b><pre>'; print_r($history) ; echo '</pre>';

$fen = $chess->fen() ; //generate fen
$squareOrdNO_chr = $chess->fen2board($fen) ;
echo '<b>ln '. __LINE__ .' SAYS: $squareOrdNO_chr=</b>'.'<pre>'; print_r($squareOrdNO_chr); echo '</pre>';
                                   //for ($ii = $firstSquare; $ii <= $lastSquare; ++$ii) {



//echo '<br /><h2>ln '. __LINE__ .' SAYS: mvno, piece, piece_color</h2>';
echo '<b>ln '. __LINE__ .' SAYS $game_pgnString=</b><br />' . $game_pgnString ;

  ?>
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;    
}
#t01 {
  width: 100%;    
  background-color: #f1f1c1;
}
</style>
</head>


<body>

<table id="t01">
<!--h2>Cell that spans two columns</h2-->
<!--p>To make a cell span more than one column, use the colspan attribute.</p-->
<!--p>To make a cell span more than one row, use the rowspan attribute..</p-->
  <tr>
    <th>mvno</th><th>chr</th><th>clr</th>
    <!--th>mvprev</th--><th>move</th>
    <th>fromsq</th><th>clrfromsq</th>
    <th>tosq</th><th>clrtosq</th>
  </tr>




<?php
for ($mvno = 0; $mvno < count($history); ++$mvno) //< count($squareOrdNO_chr)
{
  $history_full_mvno = $history_full[$mvno] ; //$chess->get_history_full()[$mvno] ;
  $chr = $history_full_mvno['move']['piece']; //eg n
  $chr_color = $history_full_mvno['move']['color'] ; //eg w
                      /*echo "<br />\$mvno=$mvno, \$chr=". ($chr <= ' ' ? 'EMPTY SQUARE' : $chr)
                           . ', $chr_color='. $chr_color
                           . ', $mve='.  $history[$mvno]
                      ; */
  $chr = ($chr <= ' ' ? 'EMPTY SQUARE' : $chr) ; // p i e c e
  $mve      = $history[$mvno] ;
  //$x = expr1 if expr1 exists, and is not NULL. Else $x = expr2. Introduced in PHP 7
  $mveprev  = $history[$mvno - 1] ?? ' ' ;

  //$square = $cols[$col] . (9 - $row) ; //eg e4
  //$tosq = str_replace(strtoupper($chr), '', $mve) ; //eg e4
  $tosq = $history_full_mvno['move']['to_algebr']; //eg e4
  $clrtosq = Chess::squareColor($tosq) === 'light' ? 'w' : 'b';

  //$fromsq = str_replace(strtoupper($chr), '', $mveprev) ; //eg e4
  //$clrfromsq = Chess::squareColor($fromsq) === 'light' ? 'w' : 'b' ;
  //switch (true) {
  //  case ( $mvno > 0 ):
      //$fromsq = str_replace(strtoupper($chr), '', $mveprev) ; //eg e4
      $fromsq = $history_full_mvno['move']['from_algebr']; //eg e4
      $clrfromsq = Chess::squareColor($fromsq) === 'light' ? 'w' : 'b' ;
  //    break ;
  //  default:
  //    $fromsq = ' ' ;
  //    $clrfromsq = ' ' ;
  //    break;
  //}
    
  ?>
  <tr>
    <!--td align=center width="30px" height="30px" bgcolor=#D3D3D3 border-left="solid 4px #FFFF00"-->
    <td style='border-left:solid 4px blue;border-right:solid 4px blue;' width=30px height=30px bgcolor=#D3D3D3>
      <?=$mvno?>
    </td>
    <td><?=$chr?></td><td><?=$chr_color?></td>
    <!--td><?=$mveprev?></td--><td><?=$mve?></td>
    <td><?=$fromsq?></td><td><?=$clrfromsq?></td>
    <td><?=$tosq?></td><td><?=$clrtosq?></td>
  </tr>


  <?php
} //e n d  for ($mvno = 0; ...

?>
</table>


</body>
</html>



  <?php
  echo $chess . '<br />'; //displ board with public fn __toString() return $this->board_html();
echo '<br /><br /><br />' ;