<?php

  /* ************************************************
  *    G U I  (V I E W)  of phpchess_parse_gui
  ************************************************ */

class View
{

  const PIECES_CHARS     = 'pnbrqkPNBRQK';
  const DEFAULT_POSITION = 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1';
  const EMPTY_BOARD_POSITION = '8/8/8/8/8/8/8/8 w - - 0 1';
  
  const SQUARE_CLRS      = [
      '0','1','0','1','0','1','0','1',
      '1','0','1','0','1','0','1','0',
      '0','1','0','1','0','1','0','1',
      '1','0','1','0','1','0','1','0',
      '0','1','0','1','0','1','0','1',
      '1','0','1','0','1','0','1','0',
      '0','1','0','1','0','1','0','1',
      '1','0','1','0','1','0','1','0',
    ] ;

        /*
        // get_sqclr_0w_1b($square_ordno) is called so :
        $sqclr_0w_1b = self::get_sqclr_0w_1b($square_ordno) ;
        if (!$sqclr_0w_1b) { $square_clr = 'w'; $sqclr_hex = $light ;
        } else {             $square_clr = 'b'; $sqclr_hex = $dark ; } */
  protected static function get_sqclr_0w_1b($square_ordno) //was squareColor
  {
    // called by get_ boardhtml
    $square_clrs = self::SQUARE_CLRS ;
    if (isset($square_clrs[$square_ordno])) { return ($square_clrs[$square_ordno]) ; }
    return null; 
  }


  public static function out_chrs_on_0_63(string $fen)
  {
    return self::get_chrs_on_0_63($fen, '1') ;
  }
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




  protected static function get_imgtaghtml(string $chr_moved, string $square_clr, string $square_wh)
  {
    // tag of chr_moved img

    $it1 = '<img src="../img/'; //it = image tag

    if ( $chr_moved > ' ' ) //eg p, k... see switch below
    { 
      // ***********************************
      // TO = NON EMPTY S QUARES *****
      // ***********************************
      switch ($chr_moved) 
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
       string $square_wh, string $sqclr_hex, array $mvarr, string $SANofCurSq0_63
     //, string $SANofCurSq0_63, array $mv_from_to //, int $cnth
     //if integer err : Argument 4 passed to Ryanhs\Chess\Chess::get_ tdtaghtml() must be an instance of Ryanhs\Chess\integer, int given
  )
  {
    //yellow #FFFF00  black #000000
    $td_tag = "<td align=center $square_wh bgcolor=$sqclr_hex" ;

    $bckgr_Wfrom = 'lightblue' ; //$border_Wfrom = "solid 4px $bckgr_Wfrom" ;
    $border_Wto   = 'solid 4px blue' ;
    $border_Bfrom = 'solid 4px gray' ;
    $border_Bto   = 'solid 4px black' ;

    // ************************************************************
    // A D D  COLORED  B O R D E R  T O  S Q U A R E S FROM & TO
    // ************************************************************
    //if ($mv_arridx % 2 == 0) { //like $mvarr is same for all s q u a r e s
    switch ($SANofCurSq0_63) { //eg e4
      case $mvarr['from']: $td_tag .= " style='background: $bckgr_Wfrom;'"; break ;
      case $mvarr['to']: $td_tag .= " style='border-left: $border_Wto;'";  break ;
    }
    //" style='border-bottom: $border_Wfrom;'"
    //$td_tag .= " style='border-left: $border_from_prev;border-right: $border_from_prev;'" ;
    /*
    switch ($SANofCurSq0_63)
    {

      // P R E V I O U S  M O V E  S Q U A R E
      case  $fromsq_prev:
        //$border_from = ($chr_color_prev === 'w') ? $border_Wfrom : $border_Bfrom ;
        $td_tag .= " style='border-left: $border_from_prev;border-right: $border_from_prev;'" ;
                    //echo "<br />\$fromsq_prev=$fromsq_prev, \$chr_color_prev=$chr_color_prev" ;
                    //echo '<br />$td_tag='. str_replace('<','&lt;',$td_tag) ;
        break ;
      case  $tosq_prev:
        //$border_to = ($chr_color_prev === 'w') ? $border_Wto : $border_Bto ;
        $td_tag .= " style='border-left: $border_to_prev;border-right: $border_to_prev;'" ;
                    //echo "<br />\$tosq_prev=$tosq_prev, \$chr_color_prev=$chr_color_prev" ;
                 //echo '<br />$td_tag='. str_replace('<','&lt;',$td_tag) ;
        break ;

      // L A S T  M O V E  S Q U A R E
      case  $fromsq:
        //$border_from = ($chr_color === 'w') ? $border_Wfrom : $border_Bfrom ;
        $td_tag .= " style='border-left: $border_from;border-right: $border_from;'" ;
                        //echo "<br />\$fromsq=$fromsq, \$chr_color=$chr_color" ;
                 //echo '<br />$td_tag='. str_replace('<','&lt;',$td_tag) ;
        break ;
      case  $tosq:
        //$border_to = ($chr_color === 'w') ? $border_Wto : $border_Bto ;
        $td_tag .= " style='border-left: $border_to;border-right: $border_to;'" ;
                        //echo "<br />\$tosq=$tosq, \$chr_color=$chr_color" ;
                 //echo '<br />$td_tag='. str_replace('<','&lt;',$td_tag) ;
        break ;
    }
                        // eg for 1. e4 e5 :
                        //$fromsq=e7, $chr_color=b
                        //$tosq=e5, $chr_color=b
                        //$tosq_prev=e4, $chr_color_prev=w
                        //$fromsq_prev=e2, $chr_color_prev=w 
    */

    $td_tag .= '>'; 

    return $td_tag ; 
  } //e n d  get_ tdtaghtml



  public static function get_boardhtml(array $pgn_arr, int $mvno = 1) //call by index.php
  {
    //returns html to display b oard and current p ieces on b oard 

    $mvno = 33 ;
    $mv_arridx = $mvno - 1 ; //0 displays mv 1; 1 disp. mv 1,2; 2 disp mv 1,2,3...

    $square_wh='width="23px" height="23px"'; //square width, height
    $dark  = '#D3D3D3' ; //black is hex lightgray
    $light = '#FFFFFF' ; //white
    $cols  = ['', 'a','b','c','d','e','f','g','h'] ;

    ///////////////////////////////////////////////////////
    // 1.  M O D E L - prepare data for display
    //////////////////////////////////////////////////////
    $moves = $pgn_arr[0]['moves'] ;
    $mvarr = $moves[$mv_arridx] ; //for this  m o v e  we display position  (f e n)
    $fen = $mvarr['fen'] ?? ''; //eg rnbqkbnr/pppppppp/8/8/8/8/P... w KQkq - 0 1
    $chrs_on_0_63 = self::get_chrs_on_0_63($fen) ;
           //echo __METHOD__ .' SAYS: $chrs_on_0_63='.'<pre>'; print_r($chrs_on_0_63); echo '</pre>';
    $chrs_on_rows = explode(' ', $fen) ;

    /*if (isset($moves[$mv_arridx+1]['fen'])) {
      $fen_nxt = $moves[$mv_arridx+1]['fen'] ?? '' ;
      $chrs_on_0_63_nxt = self::get_chrs_on_0_63($fen_nxt) ;
      $chrs_on_rows_nxt = explode(' ', $fen_nxt) ;
    } */
           //echo '$this->board='.'<pre>'; print_r($this->board); echo '</pre>';
                          //$cnth  = 100 ; //count($history) ;
           //echo __METHOD__ .' SAYS: $this->history='.'<pre>'; print_r($this->history); echo '</pre>';



    //$mv_from_to = [] ;

    ///////////////////////////////////////////////////////
    // 2. V I E W
    //////////////////////////////////////////////////////

    // 2.1  V I E W   -   Top hdr a, b, c...
    ob_start(); // returns  H T M L of c h e s s  b o a r d
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

      <!--           t d  i s  s q u a r e -->

      <!-- rowx left column ordnum 8, 7...-->
      <td align=center <?=$square_wh?> bgcolor=#D3D3D3><?=9 - $row?></td>

      <?php
      for ($col = 1; $col < 9; ++$col)     // c o l u m n s  of  b o a r d  s q u a r e s
      {
        $SANofCurSq0_63 = $cols[$col] . (9 - $row) ; //eg e4 = Standard Algebraic Notation
                     //$chess->get($SANofCurSq0_63) returns [type] => p and [color] => w of chr (piece)
                               //echo $SANofCurSq0_63 ; // (9 - $row) .'.'. $col ;
        $sqclr_0w_1b = self::squareColor($square_ordno) ;
        if (!$sqclr_0w_1b) { $square_clr = 'w'; $sqclr_hex = $light ;
        } else {             $square_clr = 'b'; $sqclr_hex = $dark ; }
        
        $chr_moved = substr($mvarr['m'],0,1) ;
        //strspn finds length of initial segment of string consisting of chars in mask 
        if ( strspn($chr_moved, 'RNBQK') !== 1 ) $chr_moved = 'P' ;

        $next_move_piece_color = $chrs_on_rows[1] ;
        $curr_move_piece_color = ($next_move_piece_color === 'w') ? 'b' : 'w' ;
        if ($curr_move_piece_color === 'b') $chr_moved = lcfirst($chr_moved) ; //for e4 is w

        /*if (isset($moves[$mv_arridx+1]['fen'])) {
          $chr_moved_nxt = substr($moves[$mv_arridx+1]['m'],0,1) ;
          //strspn finds length of initial segment of string consisting of chars in mask 
          if ( strspn($chr_moved_nxt, 'RNBQK') !== 1 ) $chr_moved_nxt = 'P' ;

          if ($next_move_piece_color === 'b') $chr_moved_nxt = lcfirst($chr_moved_nxt) ;
        } */





        // ======= D R A W  S Q U A R E  WITH FROM/TO  B O R D E R =======
                            // $td_tag = "<td align=center $square_wh bgcolor=$sqclr_ hex"; 
                            //$td_tag .= " style='border-left: $border_from_prev; border-right: $border_from_prev;'";   //$td_tag .= '>'; 

        $td_tag = self::get_tdtaghtml($square_wh, $sqclr_hex, $mvarr, $SANofCurSq0_63); 
             //, $SANofCurSq0_63, $mv_from_to

        echo $td_tag ; //$mv_arridx % 2 is eg 0 for all 0 to 63 !!!


        // ***** D R A W  SQUARE CONTENT
        // ======= P U T  I M G  O F  P I E C E  OR DISTANCER ON S Q U A R E =======
        $imgtaghtml = self::get_imgtaghtml($chr_moved, $square_clr, $square_wh) ;
        $SANofSquare_to = $mvarr['to'] ?? '' ;
        if ($SANofSquare_to === $SANofCurSq0_63) echo $imgtaghtml ; 

        /*if (isset($moves[$mv_arridx+1]['fen'])) {
          $imgtaghtml_nxt = self::get_imgtaghtml($chr_moved_nxt, $square_clr, $square_wh) ;
          $SANofSquare_to_nxt = $moves[$mv_arridx+1]['to'] ?? '' ;
          if ($SANofSquare_to_nxt === $SANofCurSq0_63) 
                  echo $imgtaghtml_nxt ;
        } */


        // ======= P U T  I M G-s  OF  F E N  ON S Q U A R E =======
        //eg "P" or "p" or... - on all s quares 0 to 63 :
        /*if (isset($moves[$mv_arridx+1]['fen'])) {
          $chr_of_fen_nxt = $chrs_on_0_63_nxt[$square_ordno];
          $imgtaghtml_of_fen_nxt = self::get_imgtaghtml($chr_of_fen_nxt, $square_clr, $square_wh) ;
          if ($SANofSquare_to_nxt !== $SANofCurSq0_63) 
                    echo $imgtaghtml_of_fen_nxt ; 
        } else */
        {
          $chr_of_fen = $chrs_on_0_63[$square_ordno];
          $imgtaghtml_of_fen = self::get_imgtaghtml($chr_of_fen, $square_clr, $square_wh) ;
                        /* // 0 to 63 to SAN eg e4 :  $square_of_fenSAN is same as $SANofCurSq0_63 !!!
                        //$square_of_fenSAN = self::algebraic($square_ordno) ; 
                        $row_offen = 8 - floor($square_ordno / 8) ; // Round fractions down
                        $col_offen = 1 + ($square_ordno % 8) ; 
                        $square_of_fenSAN = $cols[$col_offen] . $row_offen ; //eg e4
                        //echo $square_of_fenSAN ;
                        //if ($square_of_fenSAN === $SANofCurSq0_63) echo $chr_of_fen ;
                        */
          if ($SANofSquare_to !== $SANofCurSq0_63) 
                    echo $imgtaghtml_of_fen ; 
                        //echo $chr_of_fen ;
                        //if ($SANofSquare_to !== $SANofCurSq0_63) echo $chr_of_fen ;
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
    $comment = $mvarr['comment'] ?? '' ;
    $html .= $comment .'<br />' ;
                                 /*echo __METHOD__ .' SAYS: '."<h3>Test data</h3>";
                                 echo '<pre>$cnth='; print_r($cnth) ; echo '</pre>'; 
                                 echo '<pre>$td_tag1='; print_r($td_tag1) ; echo '</pre>'; 
                                 echo '<pre>$td_tag2='; print_r($td_tag2) ; echo '</pre>'; 
                                 echo '<pre>$mv_from_to='; print_r($mv_from_to) ; echo '</pre>'; */
    return $html ;
  } //e n d  f n  a s c i i





  //public static f unction get_boardhtml(array $mv, string $help_2moves = '') //call by index.php
  /**
    Bitwise Operator >> :
    $a >> $b_steps Shift right Shift bits of $a $b_steps to the right (step means"divide by 2")  
    = rowno. In Laragon terminal :
  J:\awww\www>php -r "echo 7 >> 4;"    *** ROWS ***
             0 meaning 'a8' => 0, 'b8' => 1... see const S QUARES !!
     8 >> 4  0
    15 >> 4  0
    16 >> 4  1  'a7' => 16, 'b7' => 17...
    31 >> 4  1
    32 >> 4  2  'a6' => 32, 'b6' => 33...

  J:\awww\www>php -r "echo 1 & 15;"   *** COLUMNS ***
             1
    8 & 15   8
   15 & 15  15
   16 & 15   0
  */

  /* const SQUARES = [
  'a8' => 0, 'b8' => 1, 'c8' => 2, 'd8' => 3, 'e8' => 4, 'f8' => 5, 'g8' => 6, 'h8' => 7,
  'a7' => 16, 'b7' => 17, 'c7' => 18, 'd7' => 19, 'e7' => 20, 'f7' => 21, 'g7' => 22, 'h7' => 23,
  'a6' => 32, 'b6' => 33, 'c6' => 34, 'd6' => 35, 'e6' => 36, 'f6' => 37, 'g6' => 38, 'h6' => 39,
  'a5' => 48, 'b5' => 49, 'c5' => 50, 'd5' => 51, 'e5' => 52, 'f5' => 53, 'g5' => 54, 'h5' => 55,
  'a4' => 64, 'b4' => 65, 'c4' => 66, 'd4' => 67, 'e4' => 68, 'f4' => 69, 'g4' => 70, 'h4' => 71,
  'a3' => 80, 'b3' => 81, 'c3' => 82, 'd3' => 83, 'e3' => 84, 'f3' => 85, 'g3' => 86, 'h3' => 87,
  'a2'=>96, 'b2'=>97, 'c2' => 98, 'd2' => 99, 'e2' => 100, 'f2' => 101, 'g2' => 102, 'h2' => 103,
  'a1'=>112, 'b1'=>113, 'c1'=>114, 'd1'=>115, 'e1' => 116, 'f1' => 117, 'g1' => 118, 'h1' => 119
  ]; */
    /* 
    protected static f unction squareColor($square, $light = 'light', $dark = 'dark')
    {
    $squares = self::SQUARES;
      if (isset($squares[$square])) {
          $sq0x88 = $squares[$square];

          return ((self::rank($sq0x88) + self::file($sq0x88)) % 2 === 0) ? $light : $dark;
      }
      return null; 
    }  */
  //protected static f unction rank($i) { return $i >> 4; }
  //protected static f unction file($i) { return $i & 15; }
  /*protected static f unction algebraic($square_ordno) // = square_ordno2SAN
  {
      $col = self::file($square_ordno);
      $row = self::rank($square_ordno);
      return substr('abcdefgh', $col, 1).substr('87654321', $row, 1);
  } */


    /*
    //$chess->get($square) returns [type] => p and [color] => w of chr (piece)
    $mv_arridx      = $cnth -1 ;
        //$chr       = $mv_arridx > -1 ? $mv_from_to[$mv_arridx]->chr : ' ' ;
        $chr_color = $mv_arridx > -1 ? $mv_from_to[$mv_arridx]->chr_color : ' ' ;
        $fromsq    = $mv_arridx > -1 ? $mv_from_to[$mv_arridx]->fromsq : ' ' ;
        $tosq      = $mv_arridx > -1 ? $mv_from_to[$mv_arridx]->tosq : ' ' ;
        //
        $mv_arridx_prev      = $cnth -2 ;
        //$chr_prev       = $mv_arridx_prev > -1 ? $mv_from_to[$mv_arridx_prev]->chr : ' ' ;
        $chr_color_prev = $mv_arridx_prev > -1 ? $mv_from_to[$mv_arridx_prev]->chr_color : ' ' ;
        $fromsq_prev    = $mv_arridx_prev > -1 ? $mv_from_to[$mv_arridx_prev]->fromsq : ' ' ;
        $tosq_prev      = $mv_arridx_prev > -1 ? $mv_from_to[$mv_arridx_prev]->tosq : ' ' ; 
    */

    /*
    // prev/curr pieces colors determine from/to square borders :
    if ($chr_color_prev === 'w') { 
       $border_from_prev = $border_Wfrom ;
       $border_to_prev   = $border_Wto ;
    } else {
       $border_from_prev = $border_Bfrom ;
       $border_to_prev   = $border_Bto ;
    }
    */

    /*
    if ($chr_color === 'w') {
       $border_from = $border_Wfrom ;
       $border_to   = $border_Wto ;
    } else {
       $border_from = $border_Bfrom ;
       $border_to   = $border_Bto ;
    }
    */
}