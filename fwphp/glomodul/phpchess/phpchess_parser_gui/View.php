<?php

  /* ************************************************
  *    G U I  (V I E W)  of phpchess_parse_gui
  ************************************************ */

class View
{

  const PIECES_CHARS         = 'pnbrqkPNBRQK'; //was SYMBOLS
  const DEFAULT_POSITION     = 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1';
  const EMPTY_BOARD_POSITION = '8/8/8/8/8/8/8/8 w - - 0 1';


  protected static function get_chrs_on_0_63($fen, $out = '0')
  {
    // called by get_ boardhtml() and test_chess_Ryanhs.php
    // keep only the piece info from the FEN and turn into array
    // eg rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1 = startpositionfen
      $charsIn8rows = str_split(explode(' ', $fen)[0]); //in all 8 rows
      $chrs_on_0_63 = array_fill(0, 64, ' ');

      $row = 0;
      $col = 0;
      foreach($charsIn8rows as $chr):
      {
          if ($row > 7) { break; }

          if ($chr == '/' || $col > 7) { 
            if ($out) {echo '<br />' ;}
            $row++; $col = 0;
          }
          elseif (ctype_digit($chr)) { //(strpos(DIGITS, $chr) !== false)
            $num_of_empty_squares = intval($chr, 10) ;
            if ($out) {echo str_repeat('.', $num_of_empty_squares);}
            $col += $num_of_empty_squares ;
          } elseif (strpos(self::PIECES_CHARS, $chr) !== false) { //was PIECES
                    //ord : Convert 1st byte of a string to a value between 0 and 255
                    //$piececolor = (ord($piece) < ord('a')) ? self::WHITE : self::BLACK;
                                //put($piece, $square) does : $this->board[$sq] = ...
            $chrs_on_0_63[$row * 8 + $col] = $chr;
            if ($out) {echo $chr;}
            $col++;
          }

      } endforeach ;
                          //echo __METHOD__ .' SAYS: '.'<pre>$chrs_on_0_63='; print_r($chrs_on_0_63) ; echo '</pre>';
      return $chrs_on_0_63;
  }

  public static function out_chrs_on_0_63(string $fen)
  {
    return self::get_chrs_on_0_63($fen, '1') ;
  }




  protected static function get_imgtaghtml(
      string $chr_of_piece, string $square_clr, string $square_wh
  )
  {
    // tag of chr_ moved img

    $it1 = '<img src="../img/'; //it = image tag

    if ( $chr_of_piece > ' ' ) //eg p, k... see switch below
    { 
      // ***********************************
      // TO = NON EMPTY S QUARES *****
      // ***********************************
      switch ($chr_of_piece) 
      { 
          // w h i t e :
          // $it1 = '<img src="../img/'; //it = image tag
          case ('P'): $it=$it1.'wp.png" alt="wp.png" '.$square_wh.'>'; break;
          case ('R'): $it=$it1.'wr.png" alt="wr.png" '.$square_wh.'>'; break ;
          case ('N'): $it=$it1.'wn.png" alt="wn.png" '.$square_wh.'>'; break ;
          case ('B'): $it=$it1.'wb.png" alt="wb.png" '.$square_wh.'>'; break ;
          case ('K'): $it=$it1.'wk.png" alt="wk.png" '.$square_wh.'>'; break ;
          case ('Q'): $it=$it1.'wq.png" alt="wq.png" '.$square_wh.'>'; break ;
          // b l a c k :
          case ('p'): $it=$it1.'bp.png" alt="bp.png" '.$square_wh.'>'; break ;
          case ('r'): $it=$it1.'br.png" alt="br.png" '.$square_wh.'>'; break ;
          case ('n'): $it=$it1.'bn.png" alt="bn.png" '.$square_wh.'>'; break ;
          case ('b'): $it=$it1.'bb.png" alt="bb.png" '.$square_wh.'>'; break ;
          case ('k'): $it=$it1.'bk.png" alt="bk.png" '.$square_wh.'>'; break ;
          case ('q'): $it=$it1.'bq.png" alt="bq.png" '.$square_wh.'>'; break ;
          default: $it=''; break;
        } //e n d  ***** PUT  P I E C E  IN ONE SQUARE
    } //e n d  ***** NON EMPTY S QUARES
    else
    {
      // ***********************************
      // FROM = EMPTY S QUARES
      // ***********************************
      $it='';
      // PUT DISTANCER IN SQUARE (height colapses without distancer)
      //echo $square_clr ;
      switch ($square_clr) 
      { 
          case ('b'):  // b l a c k
            $it = $it1.'distance_gray.png" alt="distance_gray.png" '.$square_wh.'>'; break ;
          default: $it=''; break;
      } //e n d  ***** PUT  P I E C E  IN ONE SQUARE
    } //e n d  ***** EMPTY S QUARES


    return $it ;
  }


  protected static function get_tdtaghtml(
      string $square_wh, string $sqclr_hex
    , array $mvarr, string $SANofCurSq0_63, string $piece_clr
    , array $prevmvarr //, string $prevpiece_clr
    //, int $xxx
  )
  {
    $td_tag = "<td align=center $square_wh bgcolor=$sqclr_hex" ;

    $bckgr_Wfrom = '#3EE83E' ; $border_Wfrom = "solid 4px $bckgr_Wfrom" ;
    $border_Wto   = 'solid 4px green' ; //yellow=#FFFF00   orange

    $bckgr_Bfrom = 'gray' ; $border_Bfrom = "solid 4px $bckgr_Bfrom" ;
    $border_Bto   = 'solid 4px #000000' ; //black

    switch ($piece_clr) {
    case 'w':
      $border_from = "solid 4px $border_Wfrom" ;
      $border_to   = "solid 4px $border_Wto" ;
      break ;
    case 'b':
      $border_from = "solid 4px $border_Bfrom" ;
      $border_to   = "solid 4px $border_Bto" ;
      break ;
    default:
      $border_from = '' ;
      $border_to   = '' ;
      break ;
    }

    //if ($lastmv_ arridx % 2 == 0) { //like $mvarr is same for all s q u a r e s
    switch ($SANofCurSq0_63) { //eg e4
      // A D D  COLORED  B O R D E R  T O  S Q U A R E S FROM & TO of current halfmove
      case $mvarr['from']: $td_tag .= " style='border-left: $border_Bfrom;'"; break ;
      case $mvarr['to']:   $td_tag .= " style='border-left: $border_Bto;'";  break ;
      // A D D  COLORED  B O R D E R  T O  S Q U A R E S FROM & TO of previous halfmove
      case $prevmvarr['from']??'':
        //if ($piece_clr === 'w') {
          $td_tag .= " style='border-left: $border_Wfrom;'"; break ;
        //}
      case $prevmvarr['to']??'':   $td_tag .= " style='border-left: $border_Wto;'";  break ;
      default:  break ;
    }
    //" style='border-bottom: $border_Wfrom;'"
    //$td_tag .= " style='border-left: $border_from_prev;border-right: $border_from_prev;'" ;
 

    //$td_tag .= '>'; 
    $td_tag .= '>'.$piece_clr; 

    return $td_tag ; 
  } //e n d  get_ tdtaghtml



  public static function get_boardhtml(array $pgn_arr, int $lastmvno = 1) //call by index.php
  {
    //returns html to display b oard and current p ieces on b oard 
    //$lastmvno = 2 ; //last halfmove to display

    $square_wh='width="23px" height="23px"'; //square width, height
    $dark  = '#D3D3D3' ; //black is hex lightgray
    $light = '#FFFFFF' ; //white
    $cols  = ['', 'a','b','c','d','e','f','g','h'] ;

    ///////////////////////////////////////////////////////
    // 1.  M O D E L - prepare data for display
    //////////////////////////////////////////////////////
    $moves = $pgn_arr[0]['moves'] ;

    $lastmv_arridx = $lastmvno - 1 ; //0 displays mv 1; 1 disp. mv 1,2; 2 disp mv 1,2,3...

    //Last  m o v e  properties (attributes) :
    $mvarr = $moves[$lastmv_arridx] ; //for this  m o v e  we display position  (f e n)

    // P i e c e s  on  s q u a r e s  0 to 63  :
    $fen = $mvarr['fen'] ?? ''; //eg rnbqkbnr/pppppppp/8/8/8/8/P.../RNB... w KQkq - 0 1
    $chrs_on_0_63 = self::get_chrs_on_0_63($fen) ;
           //echo __METHOD__ .' SAYS: $chrs_ on_0_63='.'<pre>'; print_r($chrs_ on_0_63); echo '</pre>';
    //$chrs_on_fen = explode(' ', $f en) ; //eg rnbqkbnr/pppppppp/8/8/8/8/P.../RNB...

    //To DRAW  S Q U A R E  WITH FROM/TO  B O R D E R of previous  m o v e
    //we need $prev mv arr
    $prevmvarr = $moves[$lastmv_arridx - 1] ?? [];  //if (isset($moves[$prevlastmv_ arridx])) {
    //$f en_prev  = $moves[$lastmv_arridx - 1]['fen'] ?? '' ;
                              //if ($f en_prev) {
                                //$chrs_ on_0_63_prev = self::get_chrs_ on_0_63($f en_prev) ;
                                //$chrs_on_f en_prev = explode(' ', $f en_prev) ;
                              //}
           //echo '$this->board='.'<pre>'; print_r($this->board); echo '</pre>';
                          //$cnth  = 100 ; //count($history) ;
           //echo __METHOD__ .' SAYS: $this->history='.'<pre>'; print_r($this->history); echo '</pre>';

    //$mv_from_to = [] ;
    $chr_moved_forimg = substr($mvarr['m'],0,1) ;
    //strspn finds length of initial segment of string consisting of chars in mask 
    if ( strspn($chr_moved_forimg, 'RNBQK') !== 1 ) $chr_moved_forimg = 'P' ;

    ///////////////////////////////////////////////////////
    // 2. V I E W
    //////////////////////////////////////////////////////
    ob_start(); // returns  H T M L of c h e s s  b o a r d

    // 2.1  V I E W   -   Top hdr a, b, c...

           //echo __METHOD__ .' SAYS: '.'<pre>$help_2moves='; print_r($help_2moves); echo '</pre>';
    ?>
    <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
    <!-- a,b,c... = first row top -->
    <tr height="10px" align=center bgcolor=#D3D3D3>
       <td></td><td>a</td><td>b</td><td>c</td><td>d</td>
       <td>e</td><td>f</td><td>g</td><td>h</td><td></td>
    </tr><?php


    // 2.2  V I E W   -   Displ. 8 rows
    $square_ordno = 0 ; // 0 to 63
    for ($row = 1; $row < 9; ++$row)       // r o w s  of  b o a r d  s q u a r e s
    { 
      ?>
      <tr align=center>


      <!-- rowx left column ordnum 8, 7...-->
      <td align=center <?=$square_wh?> bgcolor=#D3D3D3><?=9 - $row?></td>


      <!--           t d  i s  s q u a r e -->
      <?php
      for ($col = 1; $col < 9; ++$col)     // c o l u m n s  of  b o a r d  s q u a r e s
      {
        $SANofCurSq0_63 = $cols[$col] . (9 - $row) ; //eg e4 = Standard Algebraic Notation


        // S Q U A R E  C O L O R  of sq. $square_ ordno :
        if ($row%2 == 0) { // r o w s  2,4...8 FROM ABOVE : 1st s q u a r e  is Black
          if ($col%2 == 0) { $square_clr = 'b'; $sqclr_hex = $dark ; }
          else { $square_clr = 'w'; $sqclr_hex = $light ; }
        } else { // r o w s  1,3...7 FROM ABOVE : 1st s q u a r e  is White
          if ($col%2 == 0) { $square_clr = 'w'; $sqclr_hex = $light ; }
          else { $square_clr = 'b'; $sqclr_hex = $dark ; }
        }

        //   Piece (character, chr) on sq. $square_ ordno :
        $chr_of_piece = $chrs_on_0_63[$square_ordno];

        //   Color of Piece (character, chr) on sq. $square_ ordno :
        switch (true) {
        case $chr_of_piece === ' ' : $piece_clr = ''; break ; //space = no piece on sq.
        case $chr_of_piece === lcfirst($chr_of_piece): $piece_clr = 'b'; break ;
        case $chr_of_piece === ucfirst($chr_of_piece): $piece_clr = 'w'; break ;
        default: $piece_clr = ''; break ; //no piece on sq. $square_ ordno
        }
        //$piece_clr = $chr_of_piece ; //uncomment for test
        //$piece_clr = $chr_moved_forimg ; //uncomment for test
                     //$chess->get($SANofCurSq0_63) returns [type] => p and [color] => w of chr (piece)
                               //echo $SANofCurSq0_63 ; // (9 - $row) .'.'. $col ;

        // ======= DRAW  S Q U A R E  WITH FROM/TO  B O R D E R =======
                            // $td_tag = "<td align=center $square_wh bgcolor=$sqclr_ hex"; 
                            //$td_tag .= " style='border-left: $border_from_prev; border-right: $border_from_prev;'";   //$td_tag .= '>'; 

        $td_tag = self::get_tdtaghtml(
            $square_wh, $sqclr_hex
          , $mvarr, $SANofCurSq0_63, $piece_clr
          , $prevmvarr //, $prevpiece_clr
        );
             //, $SANofCurSq0_63, $mv_from_to

        echo $td_tag ; // . '</td>'
        //echo $td_tag . $chr_of_piece ;


        // ***** DRAW  SQUARE CONTENT
        // ======= P U T  I M G  O F  P I E C E  OR DISTANCER ON S Q U A R E =======
        $SANofSquare_to = $mvarr['to'] ?? '' ;

        // ======= P U T  I M G-s  OF  F E N  ON S Q U A R E =======
        {
          $imgtaghtml_of_fen = self::get_imgtaghtml($chr_of_piece, $square_clr, $square_wh) ;
          //if ($SANofSquare_to !== $SANofCurSq0_63) {
          echo $imgtaghtml_of_fen ; 
          //}
        } 

        ++$square_ordno ;
        echo '</td>' ;
      } //e n d  c o l s
      ?>

      <!-- rowx right column ordnum 8, 7...-->
      <td align=center width=20px bgcolor=#D3D3D3><?=9 - $row?></td>


      </tr>
      <?php
    } //e n d  r o w s



    // 2.3  V I E W   -   ftr a, b, c...
    ?>
        <!-- a,b,c... = last row bottom -->
        <tr height="10px" align=center bgcolor=#D3D3D3>
           <td></td><td>a</td><td>b</td><td>c</td><td>d</td>
           <td>e</td><td>f</td><td>g</td><td>h</td><td></td>
        </tr>
        </table>

    <?php
    $html = ob_get_contents();
    ob_end_clean(); //ob_ end_flush(), ob_ get_flush()...

    //'Moves to '. :
    $html .= '<b>'.($lastmvno -1 ?? 1 - 1) .'. ' . ($prevmvarr['m'] ?? '')
      .' '. $lastmvno .'. '. $mvarr['m'] .'</b><br />' ;

    $comment =  ($prevmvarr['comment'] ?? '') .'<br />'. ($mvarr['comment'] ?? '') ;
    $html .= $comment .'<br />' ;

    $html .= 'FEN '. $fen .'<br />' ;
                                 /*echo __METHOD__ .' SAYS: '."<h3>Test data</h3>";
                                 echo '<pre>$cnth='; print_r($cnth) ; echo '</pre>'; 
                                 echo '<pre>$td_tag1='; print_r($td_tag1) ; echo '</pre>'; 
                                 echo '<pre>$td_tag2='; print_r($td_tag2) ; echo '</pre>'; 
                                 echo '<pre>$mv_from_to='; print_r($mv_from_to) ; echo '</pre>'; */
    return $html ;
  } //e n d  f n  a s c i i




}