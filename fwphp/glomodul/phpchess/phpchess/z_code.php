<?php

switch (true) {
  case  ( !isset($hdr['FEN']) ):
    $fen_startboard = $chess->fen() ; break ; //starting board
  //board with some moves done :
  case  ( isset($hdr['FEN']) ): $fen_startboard = $hdr['FEN'] ; break ;
  default: break;
}
$chess->load_fen($fen_startboard) ; 

// or :
$mves = preg_replace("/([0-9]{0,})\./", "", $match);
$mves = str_replace("\r", ' ', str_replace("\n", ' ', str_replace("\t", '', $mves)));

while (strpos($mves, '  ') !== FALSE) $mves = str_replace('  ', ' ', $mves);
$mves = explode(' ', trim($mves));

//echo '<br /><br /><b>ln '. __LINE__ .' SAYS : $mves=</b><pre>'; print_r($mves) ; echo '</pre>';
//no output, but $chess->move($mve) ASSIGNS HISTORY ARRAYS VALUES : 
foreach ($mves as $mve) {if($chess->move($mve) === null) {} }
                 //foreach ($mves as $mve) { $chess->move($mve) ; }  //also works


//echo $chess . '<br />'; //displ board with public fn __toString() return $this->get_boardhtml();




                // $border_ to and $border_ from
                            $td_tag1 = '1. Last square 64 is $square=' .$square 
                              .'<br />'
                              .' $mvno='. $mvno
                              .', $chr='. $chr
                              .', $chr_color='. $chr_color
                              .', $fromsq='. $fromsq 
                              .', $tosq='. $tosq
                              .', $square='. $square
                              //.', $chr_prev_moved_color='. $chr_prev_moved_color
                            ;
                  //echo '<pre>$square='; print_r($square) ; echo '</pre>'; 
                  //a8,b8...a1,b1...h1
                            $td_tag2 = '' ;
                            if ($square === $tosq) {
                              echo '$square === $tosq ='. $square ; //echo '</pre>'; 
                              $td_tag2 = '$square == $tosq='.$square ;
                              //exit;

                            }


        if ( $chr_moved > ' ' ) //eg p, k... see switch below
        { 
          // but is not > '' !!!
          //or strpos(self::SYMBOLS, $chr_moved) !== false
          // !is_null(  or in_array($square, $squares_used->w
                              //echo $chr_moved ; //$s quare_ o rdno=0-7, 8-15...56-63
                              //echo $square ; //eg e4
                              //echo $square_color ;
                              //echo $chr_moved_color ;
                              //echo 'x' ;
              
              //b e g i n  ***** PUT  P I E C E  in ONE SQUARE




                    if ('') {
                    echo '<h3>'.basename(__FILE__)  .', line '. __LINE__ .', fn '. __METHOD__ .' SAYS $board='.'</h3>'.'<pre>'; print_r($board) ; echo '</pre>';
$chr_on_square was $board = Array
(
    [0=a8] => r   [0-7 ROW 8]
    [1=b8] => n
    [2] => b
    [3] => q
    [4] => k
    [5] => b
    [6] =>    (see [21=f6] => n)
    [7] => r
    [8] => p  ROW 7   [9-15] => p ... [16-23 ROW 6] [21=f6] => n ...

                    echo '<h3>'.basename(__FILE__)  .', line '. __LINE__ .', fn '. __METHOD__ .' SAYS</h3>';
                    if (isset($this->history[0])) {
                      echo '$this->history[0]='.'</h3>'.'<pre>'; print_r($this->history[0]) ;
                      echo '</pre>';
                    }
                    }
$this->history=Array (
    [0] => Array (
            [move] => Array (
                    [color] => w
                    [from] => 100
                    [to] => 68
                    [flags] => 4
                    [piece] => p )
            [kings] => Array (
                    [w] => 116
                    [b] => 4 )
            [turn] => w
            [castling] => Array (
                    [w] => 96
                    [b] => 96 )
            [epSquare] => 
            [halfMoves] => 0
            [moveNumber] => 1
            [position] => rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3
        )

    [1] => Array ... 

    ??? BUT in test_chess_Ryanhs.php $chess->history=Array(
                    [0] => e4
                    [1] => e6
                    [2] => d4 ...



// SQUARES COLOR
if ( $row % 2 === $col % 2 ) { $square_color='b'; $td_tag .= '#D3D3D3' ; } //black
else { $square_color='w'; $td_tag .= '#FFFFFF' ; } //white
         $color = $row % 2 == $col % 2 ? "black" : "white";
         //or
         $total=$row+$col; if($total%2==0)  { echo "<td height=30px width=30px bgcolor=#FFFFFF></td>";

if ( $row%2===0 ) {        // r o w s  8,6...
    if ( $col%2===0 ) { $square_color='w'; $td_tag .= '#FFFFFF' ; }
    else { $square_color='b'; $td_tag .= '#D3D3D3' ; } 
} else {                  // r o w s  7,5...
    if ( $col%2===0 ) { $square_color='b'; $td_tag .= '#D3D3D3' ; }
    else { $square_color='w'; $td_tag .= '#FFFFFF' ; }
} 


              // ***********************************
              // FROM = EMPTY SQUARES
              // ***********************************
          $it='';
              //   - PUT DISTANCER IN ONE SQUARE (height colapses without d.)
              //   - AND SQUARES FROM COLORED  B O R D E R
              // original :
              $it = '' ; // $it = image tag, was $symbol
              if ($square_color === 'w') {
                       $it=$it1.'0_0distance_white.png" alt="0_0distance_white.png" '.$wh.'>';
              } else {
                $it=$it1.'1_0distance_gray.png" alt="1_0distance_gray.png" '.$wh.'>';
              } 

              //$it = '' ; // $it = image tag, was $symbol
                            //if ($square_color === 'w') {
              //$it=$it1.'0_0distance_white.png" alt="0_0distance_white.png" '.$wh.'>';
              /*  switch (true)
                {
                  case ($square === $square_from): 
                    $chr_moved_color === 'w'
                    ? $it=$it1.'0_0dist_white_from.png" alt="0_0dist_white_from.png" '.$wh.'>'
                    : $it=$it1.'1_0dist_gray_from.png" alt="1_0dist_gray_from.png" '.$wh.'>'
                    ;
                    break ;
                  case ($square === $square_prev_from): 
                    $chr_prev_moved_color === 'w'
                    ? $it=$it1.'0_0dist_white_from.png" alt="0_0dist_white_from.png" '.$wh.'>'
                    : $it=$it1.'1_0dist_gray_from.png" alt="1_0dist_gray_from.png" '.$wh.'>'
                    ;
                    break ;
                  ////default: $it = "<td width=34px bgcolor=#D3D3D3>".$it ; 
                  //break;
                } */


        } //e n d  ***** EMPTY SQUARES




//protected f unction print_board($h elp_ 2moves='')  // f unction ascii_cssproblem()
public f unction board_html_complicated($help_2moves='') //was ascii COMPLICATED !!!
{
  $html = ''; //'<hr /><hr />';
  $wh='width="35" height="32"';
  $imgurl = $this->img_url ;
                      //echo __METHOD__ .' SAYS: '.'<pre>$help_2moves='; print_r($help_2moves); echo  '</pre>';
                      //echo __METHOD__ .' SAYS: '.'<pre>$this->history='; print_r($this->history); echo  '</pre>';
                      //echo '<pre>$this->board='; print_r($this->board); echo  '</pre>';
                      // ROW1: 0-7 is Black rnbqkbnr,  8-15 is null  ROW2: 16-23 Black p or null
                      //24-31, ROW3: 32-39, 40-47,  ROW4: 48-55, 56-63,  ROW5: 64-71, 72-79,
                      //ROW6: 80-87, 88-95,  ROW7: 96-103 W p, 104-111, ROW8: 112-119 W rnbqkbnr
                      //see const SQUARES = ['a8' => 0, 'b8' => 1, 'c8' => 2, 'd8' => 3,...
  ob_start(); ?>
  <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
  <!-- a,b,c... = first row top -->
  <tr height="10px" align=center bgcolor=#D3D3D3>
     <td></td><td>a</td><td>b</td><td>c</td><td>d</td>
     <td>e</td><td>f</td><td>g</td><td>h</td><td></td>
  </tr><?php
  $fmtedtxt = ob_get_contents();
  ob_end_clean(); //ob_ end_flush(), ob_ get_flush()...
  $html .= $fmtedtxt ;

  // all 64 squares from $i=0 (row 8 black king row, rank),
  // 16 (row 7)... to 112 - 119 (row 1 white king row)
  $wsqare = true ; //means white square, a8 is white, then each second is white
  for ( $i = self::SQUARES['a8']; //expr1 executed once unconditionally at loop begin. Or: ,$x=1,...
        $i <= self::SQUARES['h1']; //expr2 is evaluated at iteration begin
        ++$i  //expr3 is evaluated at iteration end
      )
  {

    // DISPLAY FIRST COLUMN VALUE in row x (rank x) :
    if (self::file($i) === 0) {
       //$html .= '<ul><li>'.substr('87654321', self::rank($i), 1) .'</li>'; // |
      ob_start(); ?>
      <!-- 8,7,6... = first col left -->
      <tr>
      <td align=center width=20px bgcolor=#D3D3D3><?=(8 - self::rank($i))?></td><?php
      $fmtedtxt = ob_get_contents();
      ob_end_clean(); //ob_ end_flush(), ob_ get_flush()...
      $html .= $fmtedtxt ;
    }


                //    last () from eg 99 :
                //          [color] => w  [from] => 99 [to] => 67

      //$last_from = $this->history[$cnth -1]['move']['from'] ;
      if (isset($this->history[$cnth -1]['move']['from'])) {
        $last_from = $this->history[$cnth -1]['move']['from'] ;
      } else {
        $last_from = 0 ; //$this->board[$i] is 0
      }

      if (isset($this->history[$cnth -2]['move']['from'])) {
        $prelast_from = $this->history[$cnth -2]['move']['from'] ;
      } else {
        $prelast_from = $last_from ;
      }

      //$last_to = $this->history[$cnth -1]['move']['to'] ;
      if (isset($this->history[$cnth -1]['move']['to'])) {
        $last_to = $this->history[$cnth -1]['move']['to'] ;
      } else {
        $last_to = 0 ;
      }

      //$prelast_to = $this->history[$cnth -2]['move']['to'] ;
      if (isset($this->history[$cnth -2]['move']['to'])) {
        $prelast_to = $this->history[$cnth -2]['move']['to'] ;
      } else {
        $prelast_to = $last_to ;
      }


    if ($this->board[$i] == null) 
    {
      // ************* EMPTY SQUARES : ***********
      $symbol = '' ;

      if (!$wsqare) {
        // BLACK SQUARE :
        $symbol = '<img src="'.$imgurl.'1_0distance_gray.png" alt="1_0distance_gray.png" '.$wh.'>';


          switch (true) {
            case ($i == $last_from or $i == $prelast_from): //gray, 808000  yellow FFFF00
              $symbol = "<td style='border-left:solid 4px #FFFF00;border-right:solid 4px #FFFF00;' width=34px bgcolor=#D3D3D3>".$symbol ;
              break ;

            //case ($i == $last_to or $i == $prelast_to): $symbol =
            //  "<td style='border:solid 4px #060' width=34px bgcolor=#D3D3D3>".$symbol ;  break ;

            default: $symbol = "<td width=34px bgcolor=#D3D3D3>".$symbol ; 
            break;
          }


        $html .= $symbol ;  //$html .= '<li>'. $symbol ;
        $wsqare = true ;

      } else {
        // WHITE SQUARE :
        $symbol = '<img src="'.$imgurl.'0_0distance_white.png" alt="0_0distance_white.png" '.$wh.'>';
                     //$html .= '<li style="background:white;">'. $symbol ; $wsqare = false ;
          switch (true) {
            case ($i == $last_from or $i == $prelast_from):
               $symbol = "<td style='border-left:solid 4px #FFFF00;border-right:solid 4px #FFFF00;' width=34px bgcolor=#FFFFFF>".$symbol ;
               break;
            //case ($i == $last_to or $i == $prelast_to): $symbol =
            //  "<td style='border:solid 4px #060' width=34px bgcolor=#FFFFFF>".$symbol ;  break ;
            default: $symbol = "<td width=34px bgcolor=#FFFFFF>".$symbol ; break;
          }


        $html .= $symbol ;
        $wsqare = false ;
      }
      $html .= '</td>' ;
    } else {
      // *************** NON EMPTY SQUARES : *********
      $color = $this->board[$i]['color']; //
      $piece = $this->board[$i]['type'];

      if ($color === self::WHITE) {
        //$symbol = strtoupper($piece) ; // eg P=pawn
        switch ($piece) {
          case ('p'): $symbol='<img src="'.$imgurl.'0_pawn.png" alt="0_pawn.png" '.$wh.'>'; break;
          case ('r'): $symbol = '<img src="'.$imgurl.'0_rook.png" alt="0_rook.png" '.$wh.'>'; break ;
          case ('n'): $symbol = '<img src="'.$imgurl.'0_knight.png" alt="0_knight.png" '.$wh.'>'; break ;
          case ('b'): $symbol = '<img src="'.$imgurl.'0_bishop.png" alt="0_bishop.png" '.$wh.'>'; break ;
          case ('k'): $symbol = '<img src="'.$imgurl.'0_king.png" alt="0_king.png" '.$wh.'>'; break ;
          case ('q'): $symbol = '<img src="'.$imgurl.'0_queen.png" alt="0_queen.png" '.$wh.'>'; break ;
          //default: break;
        }
      } else {
          //$symbol = strtolower($piece) ;
          switch ($piece) {
            case ('p'): $symbol = '<img src="'.$imgurl.'1_pawn.png" alt="1_pawn.png" '.$wh.'>'; break ;
            case ('r'): $symbol = '<img src="'.$imgurl.'1_rook.png" alt="1_rook.png" '.$wh.'>'; break ;
            case ('n'): $symbol = '<img src="'.$imgurl.'1_knight.png" alt="1_knight.png" '.$wh.'>'; break ;
            case ('b'): $symbol = '<img src="'.$imgurl.'1_bishop.png" alt="1_bishop.png" '.$wh.'>'; break ;
            case ('k'): $symbol = '<img src="'.$imgurl.'1_king.png" alt="1_king.png" '.$wh.'>'; break ;
            case ('q'): $symbol = '<img src="'.$imgurl.'1_queen.png" alt="1_queen.png" '.$wh.'>'; break ;
            //default: break;
          }
      }


      if (!$wsqare) {
        //BLACK SQUARE              //$symbol = '<li>'. $symbol .'';
          switch (true) {
            case ($i == $last_from or $i == $prelast_from): $symbol =
              "<td style='border-left:solid 4px #FFFF00;border-right:solid 4px #FFFF00;' width=34px bgcolor=#D3D3D3>".$symbol ;  break ;

            case ($i == $last_to or $i == $prelast_to): $symbol =
              "<td style='border:solid 4px #006600' width=34px bgcolor=#D3D3D3>".$symbol ;  break ;

            default: $symbol = "<td width=34px bgcolor=#D3D3D3>".$symbol ; break;
          }

        $wsqare = true ;

      } else {
                       //$symbol = '<li style="background:white;">'. $symbol ;
          switch (true) {
            case ($i == $last_from or $i == $prelast_from): $symbol =
              "<td style='border-left:solid 4px #FFFF00;border-right:solid 4px #FFFF00;' width=34px bgcolor=#FFFFFF>".$symbol ;  break ;

            case ($i == $last_to or $i == $prelast_to): $symbol =
              "<td style='border:solid 4px #006600' width=34px bgcolor=#FFFFFF>".$symbol ;  break ;

            default: $symbol = "<td width=34px bgcolor=#FFFFFF>".$symbol ; break;
          }

        $wsqare = false ;
      }

      $symbol .= '</td>' ;
      $html .= $symbol ;
    }


    if (($i + 1) & 0x88) // what is this ??
    {
      ob_start(); ?> <!-- 8,7,6... = last col right -->
      <td align=center width=20px bgcolor=#D3D3D3><?=(8 - self::rank($i))?></td>
        <?php
      $fmtedtxt = ob_get_contents();
      ob_end_clean(); //ob_ end_flush(), ob_ get_flush()...
      $html .= $fmtedtxt ;

        $html .= '</tr>';  //$html .= '</ul>';  //$html .= '|'.'<br />';
        $i += 8;
        if (!$wsqare) { $wsqare = true ;
        } else { $wsqare = false ; }
    }


} // e n d  f o r  all 64 squares $i = 1,2...


    ob_start(); ?>
      <!-- a,b,c... = last row bottom -->
      <tr height="10px" align=center bgcolor=#D3D3D3>
         <td></td><td>a</td><td>b</td><td>c</td><td>d</td>
         <td>e</td><td>f</td><td>g</td><td>h</td><td></td>
      </tr><?php
      $fmtedtxt = ob_get_contents();
    ob_end_clean(); //ob_ end_flush(), ob_ get_flush()...
    $html .= $fmtedtxt ;


    $html .= '</table>' ;


    $html .= $help_2moves .'<br /><br />' ;


    return $html;
} //e n d  b o a r d _ h t m l






  public f unction ascii_cssproblem()
  {
    $s = '<hr /><hr />';
    $wh='width="35" height="32"';
    $wsqare = true ; //means white square, a8 is white, then each second
      // all 64 squares from $i=0 (row 8 black king row, rank),
      // 16 (row 7)... to 112 - 119 (row 1 white king row)
      for ( $i = self::SQUARES['a8']; //expr1 executed once unconditionally at loop begin. Or: ,$x=1,...
            $i <= self::SQUARES['h1']; //expr2 is evaluated at iteration begin
            ++$i  //expr3 is evaluated at iteration end
          )
      {
          // display first column value in row (rank) :
          if (self::file($i) === 0) {
              $s .= '<ul><li>'.substr('87654321', self::rank($i), 1) .'</li>'; // |
          }

          if ($this->board[$i] == null) {
              // empty squares :
                if (!$wsqare) {
                  // black square :
                  $symbol = '<img src="'.$imgurl.'1_0distance_gray.png" alt="1_0distance_gray.png" '.$wh.'>';
                  $s .= '<li>'. $symbol ; $wsqare = true ;
                } else {
                  $symbol = '<img src="'.$imgurl.'0_0distance_white.png" alt="0_0distance_white.png" '.$wh.'>';
                  $s .= '<li style="background:white;">'. $symbol ; $wsqare = false ;
                }
                $s .= '</li>' ;
          } else {
              // non empty squares :
              $color = $this->board[$i]['color']; //
              $piece = $this->board[$i]['type'];

              if ($color === self::WHITE) {
                //$symbol = strtoupper($piece) ; // eg P=pawn
                switch ($piece) {
                  case ('p'):
                    $symbol = '<img src="'.$imgurl.'0_pawn.png" alt="0_pawn.png" '.$wh.'>'; break ;
                  case ('r'):
                    $symbol = '<img src="'.$imgurl.'0_rook.png" alt="0_rook.png" '.$wh.'>'; break ;
                  case ('n'):
                    $symbol = '<img src="'.$imgurl.'0_knight.png" alt="0_knight.png" '.$wh.'>'; break ;
                  case ('b'):
                    $symbol = '<img src="'.$imgurl.'0_bishop.png" alt="0_bishop.png" '.$wh.'>'; break ;
                  case ('k'):
                    $symbol = '<img src="'.$imgurl.'0_king.png" alt="0_king.png" '.$wh.'>'; break ;
                  case ('q'):
                    $symbol = '<img src="'.$imgurl.'0_queen.png" alt="0_queen.png" '.$wh.'>'; break ;
                  //default: break;
                }
              } else {
                //$symbol = strtolower($piece) ;
                switch ($piece) {
                  case ('p'):
                    $symbol = '<img src="'.$imgurl.'1_pawn.png" alt="1_pawn.png" '.$wh.'>'; break ;
                  case ('r'):
                    $symbol = '<img src="'.$imgurl.'1_rook.png" alt="1_rook.png" '.$wh.'>'; break ;
                  case ('n'):
                    $symbol = '<img src="'.$imgurl.'1_knight.png" alt="1_knight.png" '.$wh.'>'; break ;
                  case ('b'):
                    $symbol = '<img src="'.$imgurl.'1_bishop.png" alt="1_bishop.png" '.$wh.'>'; break ;
                  case ('k'):
                    $symbol = '<img src="'.$imgurl.'1_king.png" alt="1_king.png" '.$wh.'>'; break ;
                  case ('q'):
                    $symbol = '<img src="'.$imgurl.'1_queen.png" alt="1_queen.png" '.$wh.'>'; break ;
                  //default: break;
                }
              }


                if (!$wsqare) { $symbol = '<li>'. $symbol .''; $wsqare = true ;
                } else { $symbol = '<li style="background:white;">'. $symbol ; $wsqare = false ; }
                $symbol .= '</li>' ;

              //$s .= ' '.$symbol.' ';
              $s .= $symbol ;
          }


          if (($i + 1) & 0x88) {
              //$s .= '|'.'<br />';
              $s .= '</ul>';
              //$s .= '</td></tr>';
              $i += 8;
              if (!$wsqare) { $wsqare = true ;
                } else { $wsqare = false ; }
          }
      } // e n d  f o r  all 64 squares $i = 1,2...

      $s .= '<ul><li><img src="'.$imgurl.'1_0distance_gray.png" alt="1_0distance_gray.png" '.$wh.'> </li><li>a</li><li>b</li><li>c</li><li>d</li><li>e</li><li>f</li><li>g</li><li>h</li></ul>'
      ;

      //$s .= '</table>';

      return $s;
  }
