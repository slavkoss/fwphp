<?php

use \Ryanhs\Chess\Chess;

//Defaults (prescribed, zadane values)
$moves_in_board = 2 ;
                      if (!isset($_GET['g']))
                      {
                          //////////////////////////////////////////////////////////////
                          //   1. MAIN  M E N U  OF GAMES and  C H E S S  H E L P
                          //////////////////////////////////////////////////////////////
                        $tabtitle = 'Chess' ; include 'hdr.php' ;
                        include '../games_menu.php';  //include '../help_chess.php'; ?>
                        </body>
                        </html><?php
                      } // get parms



if (isset($_GET['g']))
{
  ///////////////////////////////////////////////
  //     2. SHOW GAME selected in menu
  ///////////////////////////////////////////////
    include 'Chess.php';  //51 kB   require 'vendor/autoload.php';

    //$css_files = ["chess.css"]; // no css
    $ds = DIRECTORY_SEPARATOR ;
    $QS = '?' ;


    // 4*2=8 moves in 4-boards web page row :
    if (isset($_POST['b'])) { $boards_in_row=$_POST['b'];} else {$boards_in_row=4; }

    // game moves script to include :
    if (isset($_GET['g'])) { $pgnfle_toinc=$_GET['g'];} else {$pgnfle_toinc='Pgn in index.php'; }



     $wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
              // 2. URL_DOM AIN = dev1:8083 :
            . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

      $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;
      $uri_arr = explode($QS, $REQUEST_URI) ;
      $module_relpath = rtrim(ltrim($uri_arr[0],'/'),'/');
      $module_url = $wsroot_url.$module_relpath.'/';

      $fle_moves_path = dirname(__DIR__) . $ds .'games'. $ds . $pgnfle_toinc .'.php' ;
                        //$fle_moves_relpath = '../games/'. $pgnfle_toinc .'.php' ;
                             if ('') {echo 'ln '. __LINE__ .' SAYS: ' ;
                             echo '<pre>$REQUEST_URI='. $REQUEST_URI .'</pre>' ;
                             echo '<pre>$module_url='. $module_url .'</pre>' ;
                             }


  //Moves screen to include :
  //http://dev1:8083/fwphp/glomodul/phpchess/pgnchess/games/mat_in1.pgn
  $fle_moves_url = dirname($module_url) . '/games'. '/' . $pgnfle_toinc .'.pgn' ;
  $game_pgnString = file_get_contents($fle_moves_url ) ;
  /*$game_pgnString = '
      1.e4 e5 {
      First Immortal Game Ever.
      } 2.f4 exf4 3.Bc4 Qh4+ 4.Kf1 b5 {
      Deeply analysed by Kieseritzky. This was also started position in 20 minutes game Short vs Kasparov in 1993, where Garry said its unplayable but he agreed to try best moves.
      }
      5.Bxb5 Nf6 6.Nf3 Qh6
        ' ; */
    $tabtitle = 'Game '. $pgnfle_toinc ; include 'hdr.php' ;
                                //$lines = str_replace("\n", '<br />', $game_pgnString);
                                //$lines = explode('<br />', $lines);
                           //echo 'ln '. __LINE__ .' SAYS: ' ;
                                //.'<pre>$module_url='. $module_url .'</pre>'
                                //echo '<pre>$fle_moves_url='. $fle_moves_url .'</pre>';
                           //echo '$game_pgnString=<br />'. $game_pgnString .'</pre>';
                                //echo '<pre>$lines='; print_r($lines) .'</pre>';




  $chess = new Chess(); //$chess = new C hess('EMPTY_BOARD');

                             //noooo : $pgn_arr = $chess->loadPgn($game_pgnString); or :
                             //$pgn_arr = Chess::pgn2hdr_mv_hlp($game_pgnString); or :
  $pgn_arr = $chess->pgn2hdr_mv_hlp($game_pgnString);
  $hdr = $pgn_arr['header'] ;
  $mv  = $pgn_arr['moves'] ;
  $hlp = $pgn_arr['hlp'] ;

  $cntmv = count($mv) ;
                           //echo 'ln '. __LINE__ .' SAYS: '.'<pre>$pgn_arr='; print_r($pgn_arr); echo  '</pre>';
                           //echo 'ln '. __LINE__ .' SAYS: '.'<pre>$hdr='; print_r($hdr); echo  '</pre>';
                           //echo '<pre>$mv='; print_r($mv); echo  '</pre>';


          //Ternary Operator (expr1) ? (expr2) : (expr3)
          //Since PHP 5.3 expr1 ?: expr3 - returns expr1 if expr1 is TRUE, expr3 otherwise
          //     $action = (empty($_POST['action'])) ? 'default' : $_POST['action'];

          //"??" (or null coalescing) operator, available as of PHP 7. 
          //(expr1) ?? (expr2) evaluates to expr2 if expr1 is NULL, and expr1 otherwise.
          //does not emit a notice if left-hand sidevalue does not exist, like isset(). 
          //     $action = $_POST['action'] ?? 'default';
  $fen_startboard = $hdr['FEN'] ?? $chess->fen() ;
                //echo 'ln '. __LINE__ .' SAYS: '.'<pre>$hdr[\'FEN\']='; print_r($hdr['FEN']); echo  '</pre>';
                //echo 'ln '. __LINE__ .' SAYS: '.'$fen_startboard='; echo $fen_startboard;

    $ii = 0 ;
    $help_2moves = '' ;
    //$boards_rows = 1;
    // All halfmoves in Moves with help a rray :
      //<!-- We display chess board for each 2 moves, $boards_in_row times -->
  echo '<table width="100%" cellspacing="0px" cellpadding="0px" border="0px">';



    while (true):
    {
      switch (true) {
        case  ( $cntmv === 0 ):
           //No moves, only  F E N  (problem to solve, not game moves 1,2...)
           //   1. display board with  F E N
           //   2. display link to LearnXXX_...php - no move statements but put,remove
           if (file_exists($fle_moves_path))
           {  //include $fle_ moves_url_path;
              //   1. display board with  F E N
              $chess = new Chess($fen_startboard);
                           //echo $chess->get_boardhtml( 'put help for problem here eg To easy' ) ;
              $chess->load_fen($fen_startboard); // Chess::DEFAULT_POSITION
                                //$chess->put(['type' => 'P', 'color' => Chess::BLACK], 'f5');
              echo $chess ;
                                //header("Location:".$fle_moves_url); //err "headers already sent"
              //   2. display link to LearnXXX_...php - no move statements but put,remove
              ?><a href="<?=$fle_moves_url .'?fen='. $fen_startboard?>" target="_blank">Show next moves</a><?php
              goto posttbl ;
           } else {
              $chess = new Chess($fen_startboard);
              $chess->load_fen($fen_startboard); // Chess::DEFAULT_POSITION
              echo $chess . '<br />' ;
              goto posttbl ;
           }
           break ;
        case  ( $ii === $cntmv ): // last move was processed, this is last+1 move
           goto posttbl ; break ;
        case  ( $ii === 0 ): //DISPLAY MORE CHESS BOARDS IN TBLROW
            echo '<tr>' ; break ;
        //default: break;
      }
                                        // (**1)

      //1. halfmove
      //if ($mv[$ii] == 'O-O') { $chess->move('Kf1'); //$chess->move('Rf1'); } else {
      $chess->move($mv[$ii]); //}

      //2. comment of 2 moves
      $help_2moves .= isset($hlp[$ii]) ? ' '. $hlp[$ii] : '' ;

      if ( ( ($ii !== 0) and ($ii+1)%($moves_in_board) === 0 )
           or ($ii+1) === $cntmv //only one move
           or $cntmv === 0       //no moves
           //last one move (of white) :
           or ( ($ii+1) === $cntmv and $cntmv%2 === 0 )
      )
      {
          //3. DISPLAY CHESS BOARD after both halfmoves
          echo '<td style="vertical-align:top; padding:0px;">' ;
            echo $chess->get_boardhtml( $help_2moves ) ;
            $help_2moves = '' ;
          echo '</td>' ;
      } //e n d  DISPLAY CHESS BOARD FOR EACH 2 HALFMOVES


          if ($ii%($boards_in_row * $moves_in_board) === 0) // ii/(4*2)
          {
            //DISPLAY MORE CHESS BOARDS IN TBLROW
            echo '</tr><tr>' ;
          }


      $ii++ ;
    } endwhile ;

    posttbl:

    //<!-- We display chess board for each 2 moves, $boards_ in_ row times -->
  echo '</table>';




  echo '<br /><p><p>$chess->movesUntilNow_str()='. $chess->movesUntilNow_str();
  echo '<br />Moves number $cntmv='; print_r($cntmv);
  echo '<p><br /><hr />';



?>
</table>


<?php


echo 'ln '. __LINE__ .' SAYS:';
echo '<br />PGN = Portable Game Notation (like XML) - header, moves, {comments}, (variants)';
echo '<br />FEN = Forsyth - Edwards Notation for describing position of chess G A M E, eg ';
echo '<br />SAN = Standard Algebraic Notation for describing individual M O V E S eg "e4"' ;
echo '<br />FEN empty board   = 8/8/8/8/8/8/8/8 w - - 0 1';
echo '<pre>';
echo '                                    0                            1  2   3 4 5';
echo '<br />';
echo ' FEN start board   = rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1';
echo '<br />';
echo '   PART 0 is 8 rows :   0        1     2 3 4 5    6        7 = position</pre>';

echo '<br />FEN some position = 4rrk1/8/p1pR4/1p6/1PPKNq2/3P1p2/PB5n/R2Q4 b - - 6 40';
echo '<br />where 4rrk1 means top row 7 is   .  .  .  .  r  r  k  . (4 empty sqares, rook, rook, king, empty)' ;

echo '<br /><br />  PART 1 = Active color = next turn black or w, 2 castling availability options (see load_fen($fen)), 3 ep (En passant) target square in algebraic notation - "-" or position "behind"  pawn to eat, 4 half move clock = number of halfmoves since last capture or pawn advance used in the fifty-move rule, 5 move number incremented after Blacks move';

echo '<br /><br />  2 castling availability options :  If neither side can castle, this is "-". Otherwise, this has one or more letters: "K" (White can castle kingside), "Q" (White can castle queenside), "k" (Black can castle kingside), and/or "q" (Black can castle queenside). A move that temporarily prevents castling does not negate this notation.';

echo '<br /><br />  fifty-move rule in chess states that a player can claim a draw if no capture has been made and no pawn has been moved in the last fifty moves (for this purpose a "move" consists of a player completing a turn followed by the opponent completing a turn). ';

echo '<br /><br />.pgn file eg header, moves, {comments}, (variants) PHP parser transformed in <br />$pgn_arr=' ;
echo '<pre>'; print_r($pgn_arr); echo  '</pre>';



echo 'ln '. __LINE__ .' SAYS: $module_url='.'<pre>'. $module_url .'</pre>';
echo '$fle_moves_url=<pre>'. $fle_moves_url .'</pre>';
//
echo '$fle_moves_path=<pre>'. $fle_moves_path .'</pre>';
//echo '$fle_moves_relpath=<pre>'. $fle_moves_relpath .'</pre>';
//echo '$game_pgnString=<pre>'. $game_pgnString .'</pre>';
//echo '$lines=<pre>'; print_r($lines) .'</pre>';



    //echo '<p><br /><hr />';
    echo 'ln '. __LINE__ .' SAYS: '.'$chess->get_set_hdrtag()=<pre>'; print_r($chess->get_set_hdrtag()); echo '</pre>';


    echo '<div>';
    echo '<p>&copy; 2001-'; echo date("Y");
            if (isset($_SESSION['user'])) {
               echo " Prijavljen je korisnik: ".$_SESSION['user']->user_name.'</p>' ;
            } else { //echo " Niste prijavljeni!";  //echo $_DisplayLinks()
            }
    echo '</p>

      </div><br />

    </div>';

}



       // (**1)
       /*
       //if (!isset($mv[$ii]))
       //if ( isset($chess->get_set_hdrtag()['FEN']) or isset($chess->get_set_hdrtag()['fen']) )
       if ( isset($hdr['FEN']) ) //or isset($hdr['fen'])
       {
          //if ($ii-1 > -1)
          //{
            //Chess table after 1st halfmove of last move, no 2nd halfmove
                                     //$chess->move($mv[$ii-1]);
            //$help_2moves = isset($mv['hlp0']) ? $mv['hlp0'] : '' ;
            $help_2moves = '' ;

                                //$help_2moves = isset($mv['hlp0']) ? $mv['hlp0'] : '' ;
            echo '<td style="vertical-align:top; padding:5px;">' ;
              echo $chess->get_boardhtml( $help_2moves ) ;
            echo '</td>' ;
            echo '</tr>' ;
          //}
         break;
       } */




/*
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
*/



?>
