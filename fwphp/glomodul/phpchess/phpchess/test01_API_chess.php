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

?>
$chess->moves(); //returns all possible moves in SAN format (FIDE Standard Algebraic moves  Notation) eg e3, a4...
<br /><br />
<?php

$chess->get_set_hdrtag('Site', 'https://ryanhs.github.io/chess.php/'); //was header()
$chess->get_set_hdrtag('Event', 'Chess Training');
$chess->get_set_hdrtag('White', 'W test');
$chess->get_set_hdrtag('Black', 'B test');
$chess->get_set_hdrtag('Result', '1-0');

echo 'ln '. __LINE__ .' SAYS : after $chess->get_set_hdrtag(\'Result\', \'1-0\') <b>$chess->get_set_hdrtag()=</b><br /><pre>'; print_r($chess->get_set_hdrtag()) ; echo '</pre>';


echo 'ln '. __LINE__ .' SAYS : <br /> <b>Chess::squareColor(\'a1\')='. Chess::squareColor('a1') . '</b><br />'; //dark
echo '<b>Chess::squareColor(\'b1\')='. Chess::squareColor('b1') . '</b><br /><br />'; //light



//$chess->clear(); or :
$chess = new Chess('EMPTY_BOARD');
?>
<h2>***************************************
<br />1. $chess->clear(); TO GENERATE/RETURN  F E N  OF EMPTY BOARD
<br />***************************************</h2>
or without clear : $chess = new Chess(EMPTY_BOARD); DISPLAY  F E N  OF EMPTY BOARD :
<br />8/8/8/8/8/8/8/8 w - - 0 1
<br />$chess displays board with public fn __toString() : return $this->get_boardhtml();
<?=$chess->ascii() . '<br />'?>
<?=$chess . '<br />'?>
<!--//     end 1. CLEAR -------------------------- -->



<br /><br /><h2>***************************************
<br />2. $chess->fen() IN CONSTRUCTOR, GENERATE/RETURN  F E N  OF START BOARD
<br />***************************************</h2>
<pre>
0                                           1  2   3 4 5
rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1 =  F E N  OF START BOARD</pre>

<br /><br />load_fen method returns true | false :
<br />$chess->load_fen(\'4rrk1/8/p1pR4/1p6/1PPKNq2/3P1p2/PB5n/R2Q4 b - - 6 40\'); 
<br />load_fen CALLS if (!self::validateFen($fen)['valid']) { return false; }
<br />$chess = new Chess('fen goes here'); //fen as start
<pre>
   Without load_fen = START BOARD     With load_fen = some position
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
        a  b  c  d  e  f  g  h             a  b  c  d  e  f  g  h
</pre>
<br />Go back to default position :
<pre>$chess->load_fen('4rrk1/8/p1pR4/1p6/1PPKNq2/3P1p2/PB5n/R2Q4 b - - 6 40');
...
$chess->load_fen(Chess::DEFAULT_POSITION); //may be fn $chess->reset();
</pre>



<?php
$chess->load_fen(Chess::DEFAULT_POSITION); //may be fn $chess->reset();
echo $chess . '<br />' ;


$validation = Chess::validateFen('4rrk1/8/p1pR4/1p6/1PPKNq2/3P1p2/PB5n/R2Q4 b - - 6 40');
echo '<br />ln '. __LINE__ .' SAYS : <b>$validation of some fen =</b><pre>'; print_r($validation) ; echo '</pre>';

//         end 2. CONSTRUCTOR -------------------------





echo '<br /><br /><h2>***************************************' ;
echo '<br />             3. HISTORY ' ;
echo '<br />***************************************</h2>' ;
//$chess->load_fen(Chess::DEFAULT_POSITION); //may be fn $chess->reset();
$game_pgnString = '1. e4 e6' ;
//$game_pgnString = '1. e4 e6 2. d4 d5 3. Nc3 Nf6 4. Bg5 dxe4 5. Nxe4 Be7 6. Bxf6
//        gxf6 7. g3 f5 8. Nc3 Bf6';

echo 'ln '. __LINE__ .' SAYS : after $chess->load_fen(Chess::DEFAULT_POSITION); and $game_pgnString = '. $game_pgnString ;

$pgn_arr = $chess->pgn2hdr_mv_hlp($game_pgnString);
$hdr = $pgn_arr['header'] ;
$mv  = $pgn_arr['moves'] ;
$hlp = $pgn_arr['hlp'] ;
//Move pieces to assign arrays history and chr_on_square :
foreach ($mv as $mve) {if ($chess->move($mve) === null) {echo '<br /><br /><h2>*******ERROR : Illegal move<br /><br /><h2>';} } 

echo '<br />ln '. __LINE__ .' SAYS : print_r($chess->move(\'d4\') returns NULL if move is illegal or move array : <pre>'; print_r($chess->move('d4')) ; echo '</pre>';


?><br /><br />ln <?=__LINE__?> SAYS :
<br />There are 2 ways to do a move: move($san) eg $chess->move('e4');
<br />or move($moveArray) eg $chess->move(['from' => 'e2', 'to' => 'e4']);
<br />e7 to e8 needs promotion : $chess->move(['from' => 'e2', 'to' => 'e4', 'promotion' => Chess::QUEEN]);

<br /><br />After <b>$pgn_arr = $chess->pgn2hdr_mv_hlp($game_pgnString)</b> and <b>$mv = $pgn_arr['moves']</b> :
<br /> &nbsp; &nbsp; &nbsp; &nbsp; and foreach ($mv as $mve) {if($chess->move($mve) === null) {} }
<br /> &nbsp; &nbsp; &nbsp; &nbsp; After last move $chess->move($mve) <b>$chess->movesUntilNow_str() (was $chess->pgn()) =</b>
<br /><?php echo $chess->movesUntilNow_str() ;

$history_full = $chess->get_history_full() ; // = $chess->history !!
                       echo '<br /><br /><b>ln '. __LINE__ .' SAYS : $history_full = $chess->get_history_full() = $chess->history =</b><pre>'; print_r($history_full) ; echo '</pre>';
$history = $chess->get_history() ;


/*
echo json_encode($chess->get_history(), JSON_PRETTY_PRINT) . '<br />';
returns :
["e4","e6","d4","d5","Nc3","Nf6","Bg5","dxe4","Nxe4","Be7","Bxf6","gxf6","g3","f5","Nc3","Bf6"]
*/
//         end 3. HISTORY -------------------------



$fen = $chess->fen() ; //GENERATE/RETURN FEN OF START BOARD
$chr_on_square = $chess->fen2board($fen) ;
                    echo '<b>ln '. __LINE__ .' SAYS: $chr_on_square = $chess->fen2board($fen) = </b>'.'<pre>'; print_r($chr_on_square); echo '</pre>';
                                   //for ($ii = $firstSquare; $ii <= $lastSquare; ++$ii) {

                    echo '<br /><b>ln '. __LINE__ .' SAYS : $history = $chess->get_history()=</b><pre>'; print_r($history) ; echo '</pre>';

//echo '<br /><br /><br /><h2>ln '. __LINE__ .' SAYS: mvno, piece, piece_color</h2>';
echo '<b>ln '. __LINE__ .' SAYS : see below $mv_ from_ to array (moves from, to square) displayed in table. $game_pgnString=</b><br />' . $game_pgnString ;



echo $chess . '<br />'; //displ board with public fn __toString() : return $this->get_boardhtml();

//$this->set_mv_from_to($history_full) ; //done in $this->get_boardhtml()
$mv_from_to = $chess->get_mv_from_to() ;
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
.auto-style1 {
  font-family: serif;
}
.auto-style2 {
  line-height: 100%;
  border-top-style: none;
  border-bottom-style: none;
  padding: 0;
}
.auto-style3 {
  line-height: 100%;
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
//MOVES HISTORY, NOT BOARD SQUARES-PIECES !  < count($chr_on_square)

for ($mvno = 0; $mvno < count($mv_from_to); ++$mvno) //count($history)
{ ?>
  <tr>
    <!--td align=center width="30px" height="30px" bgcolor=#D3D3D3 border-left="solid 4px #FFFF00"-->
    <td style='border-left:solid 4px blue;border-right:solid 4px blue;' width=30px height=30px bgcolor=#D3D3D3>
      <?=$mvno?>
    </td>
    <td><?=$mv_from_to[$mvno]->chr?></td><td><?=$mv_from_to[$mvno]->chr_color?></td>
    <!--td><?=$mv_from_to[$mvno]->mveprev?></td-->
    <td><?=print_r($mv_from_to[$mvno]->mve)?></td>
    <td><?=$mv_from_to[$mvno]->fromsq?></td><td><?=$mv_from_to[$mvno]->clrfromsq?></td>
    <td><?=$mv_from_to[$mvno]->tosq?></td><td><?=$mv_from_to[$mvno]->clrtosq?></td>
  </tr>
  <?php

} //e n d  for ($mvno = 0; ...



?>
</table>


</body>
</html>
<?php


echo '<br /><br /><h2>***************************************' ;
echo '<br />        4. UNDO  $chess->undo(); (d4)' ;
echo '<br />Returns NULL if undo failed, or move array like MOVE method.' ;
echo '<br />***************************************</h2>' ;

if ($chess->undo()===null) {echo '<br /><br /><h2>*******ERROR: Illegal undo</h2>';} else echo $chess.'<br />';
if ($chess->undo()===null) {echo '<br /><br /><h2>*******ERROR: Illegal undo</h2>';} else echo $chess.'<br />';
if ($chess->undo()===null) {echo '<br /><br /><h2>*******ERROR: Illegal undo</h2>';} else echo $chess.'<br />';
if ($chess->undo()===null) {echo '<br /><br /><h2>*******ERROR: Illegal undo</h2>';} else echo $chess.'<br />';



echo '<br /><br /><h2>***************************************' ;
echo '<br />        5. GET, PUT, REMOVE' ;
echo '<br />***************************************</h2>' ;
$chess = new Chess();
echo 'FEN => ' . $chess->Fen() ;
//var_dump($chess->get('e4'), $chess->get('e1'), $chess->get('d8'));
                    echo '<br /><b>ln '. __LINE__ .' SAYS: $chess->get(\'e2\') and e7 = </b>';
                    echo '<pre>'; print_r($chess->get('e2')); echo '</pre>';
                    echo '<pre>'; print_r($chess->get('e7')); echo '</pre>';


echo '<br /><br /><br />';
echo '$chess->put([\'type\' => \'K\', \'color\' => Chess::BLACK], \'e5\');';
echo '<br />$chess->put([\'type\' => \'Q\', \'color\' => Chess::WHITE], \'e5\');';
echo '<br />$chess->put([\'type\' => \'K\', \'color\' => Chess::BLACK], \'e4\');';
echo '<br />$chess->remove(\'e4\');';

echo '<br />';
$chess = new Chess('8/8/8/8/8/8/8/8 w KQkq - 0 1');
$chess->put(['type' => 'K', 'color' => Chess::BLACK], 'e5');
$chess->put(['type' => 'Q', 'color' => Chess::WHITE], 'e5');
$chess->put(['type' => 'K', 'color' => Chess::BLACK], 'e4');
$chess->remove('e4');
echo 'FEN => ' . $chess->fen() ;
echo $chess;



?>



<br /><br /><br /><hr />

<h2 >STATUS</h2>
<ul >
  <li>
  <a data-src="files/status/GameOver.md" data-type="markdown" href="https://ryanhs.github.io/chess.php/#">GameOver</a></li>
  <li>
  <a data-src="files/status/halfMovesExceeded.md" data-type="markdown" href="https://ryanhs.github.io/chess.php/#">
  HalfMovesExceeded</a></li>
  <li>
  <a data-src="files/status/inCheck.md" data-type="markdown" href="https://ryanhs.github.io/chess.php/#">InCheck</a></li>
  <li>
  <a data-src="files/status/inCheckmate.md" data-type="markdown" href="https://ryanhs.github.io/chess.php/#">InCheckmate</a></li>
  <li>
  <a data-src="files/status/inDraw.md" data-type="markdown" href="https://ryanhs.github.io/chess.php/#">InDraw</a></li>
  <li>
  <a data-src="files/status/inStalemate.md" data-type="markdown" href="https://ryanhs.github.io/chess.php/#">InStalemate</a></li>
  <li>
  <a data-src="files/status/inThreefoldRepetition.md" data-type="markdown" href="https://ryanhs.github.io/chess.php/#">
  InThreefoldRepetition</a></li>
  <li>
  <a data-src="files/status/insufficientMaterial.md" data-type="markdown" href="https://ryanhs.github.io/chess.php/#">
  InsufficientMaterial</a></li>
</ul>
<p>&nbsp;</p>
***************************************