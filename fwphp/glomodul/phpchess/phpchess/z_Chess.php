<?php
/**
 *  based on https://github.com/ryanhs/chess.php  on Aug 26, 2019 ARCHIVED
 *        which is based on https://github.com/jhlywa/chess.js or
 *  doc https://ryanhs.github.io/chess.php/
 *        ryanhs fork https://github.com/p-chess/chess (more classes, why ?) or
 * https://github.com/risendy/pgn-chess-parser
 * https://chessboardjs.com/ - only board
 *
 * https://www.chessgames.com/perl/chesscollection?cid=1014593 GoY's favorite games
 * https://www.chessgames.com/perl/chessgame?gid=1018910  Anderssen vs Kieseritzky

 * 1. $piece = $position[$i]; //was $position{$i}; same if (ctype_digit($rows[$i][$k])) {
 *    same $sumFields += intval($rows[$i][$k], 10); same if (strpos(self::SYMBOLS, $rows[$i][$k]) === false) {
 *    same if (($tokens[3][1] == '3'   same ($tokens[3][1] == '6'
 * 2. "\n" to '<br />'
 * 3. PHP_EOL to '<br />'
 * 4. Added '<pre>', '</pre>'
*/
declare(strict_types=1);

namespace Ryanhs\Chess;

class Chess
{
  const BLACK  = 'b';
  const WHITE  = 'w';

  const PAWN   = 'p';
  const KNIGHT = 'n';
  const BISHOP = 'b';
  const ROOK   = 'r';
  const QUEEN  = 'q';
  const KING   = 'k';

  const SYMBOLS = 'pnbrqkPNBRQK';

  const DEFAULT_POSITION = 'rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1';

  const POSSIBLE_RESULTS = ['1-0', '0-1', '1/2-1/2', '*'];

  const PAWN_OFFSETS = [
      self::BLACK => [16,  32,  17,  15],
      self::WHITE => [-16, -32, -17, -15],
  ];

  const PIECE_OFFSETS = [
      self::KNIGHT => [-18, -33, -31, -14,  18,  33,  31,  14],
      self::BISHOP => [-17, -15,  17,  15],
      self::ROOK => [-16,   1,  16,  -1],
      self::QUEEN => [-17, -16, -15,   1,  17,  16,  15,  -1],
      self::KING => [-17, -16, -15,   1,  17,  16,  15,  -1],
  ];

  const ATTACKS = [
      20, 0, 0, 0, 0, 0, 0, 24,  0, 0, 0, 0, 0, 0,20, 0,
       0,20, 0, 0, 0, 0, 0, 24,  0, 0, 0, 0, 0,20, 0, 0,
       0, 0,20, 0, 0, 0, 0, 24,  0, 0, 0, 0,20, 0, 0, 0,
       0, 0, 0,20, 0, 0, 0, 24,  0, 0, 0,20, 0, 0, 0, 0,
       0, 0, 0, 0,20, 0, 0, 24,  0, 0,20, 0, 0, 0, 0, 0,
       0, 0, 0, 0, 0,20, 2, 24,  2,20, 0, 0, 0, 0, 0, 0,
       0, 0, 0, 0, 0, 2,53, 56, 53, 2, 0, 0, 0, 0, 0, 0,
      24,24,24,24,24,24,56,  0, 56,24,24,24,24,24,24, 0,
       0, 0, 0, 0, 0, 2,53, 56, 53, 2, 0, 0, 0, 0, 0, 0,
       0, 0, 0, 0, 0,20, 2, 24,  2,20, 0, 0, 0, 0, 0, 0,
       0, 0, 0, 0,20, 0, 0, 24,  0, 0,20, 0, 0, 0, 0, 0,
       0, 0, 0,20, 0, 0, 0, 24,  0, 0, 0,20, 0, 0, 0, 0,
       0, 0,20, 0, 0, 0, 0, 24,  0, 0, 0, 0,20, 0, 0, 0,
       0,20, 0, 0, 0, 0, 0, 24,  0, 0, 0, 0, 0,20, 0, 0,
      20, 0, 0, 0, 0, 0, 0, 24,  0, 0, 0, 0, 0, 0,20
  ];

  const RAYS = [
       17,  0,  0,  0,  0,  0,  0, 16,  0,  0,  0,  0,  0,  0, 15, 0,
        0, 17,  0,  0,  0,  0,  0, 16,  0,  0,  0,  0,  0, 15,  0, 0,
        0,  0, 17,  0,  0,  0,  0, 16,  0,  0,  0,  0, 15,  0,  0, 0,
        0,  0,  0, 17,  0,  0,  0, 16,  0,  0,  0, 15,  0,  0,  0, 0,
        0,  0,  0,  0, 17,  0,  0, 16,  0,  0, 15,  0,  0,  0,  0, 0,
        0,  0,  0,  0,  0, 17,  0, 16,  0, 15,  0,  0,  0,  0,  0, 0,
        0,  0,  0,  0,  0,  0, 17, 16, 15,  0,  0,  0,  0,  0,  0, 0,
        1,  1,  1,  1,  1,  1,  1,  0, -1, -1,  -1,-1, -1, -1, -1, 0,
        0,  0,  0,  0,  0,  0,-15,-16,-17,  0,  0,  0,  0,  0,  0, 0,
        0,  0,  0,  0,  0,-15,  0,-16,  0,-17,  0,  0,  0,  0,  0, 0,
        0,  0,  0,  0,-15,  0,  0,-16,  0,  0,-17,  0,  0,  0,  0, 0,
        0,  0,  0,-15,  0,  0,  0,-16,  0,  0,  0,-17,  0,  0,  0, 0,
        0,  0,-15,  0,  0,  0,  0,-16,  0,  0,  0,  0,-17,  0,  0, 0,
        0,-15,  0,  0,  0,  0,  0,-16,  0,  0,  0,  0,  0,-17,  0, 0,
      -15,  0,  0,  0,  0,  0,  0,-16,  0,  0,  0,  0,  0,  0,-17
  ];

  const SHIFTS = [
      self::PAWN => 0,
      self::KNIGHT => 1,
      self::BISHOP => 2,
      self::ROOK => 3,
      self::QUEEN => 4,
      self::KING => 5
  ];

  const FLAGS = [
      'NORMAL' => 'n',
      'CAPTURE' => 'c',
      'BIG_PAWN' => 'b',
      'EP_CAPTURE' => 'e',
      'PROMOTION' => 'p',
      'KSIDE_CASTLE' => 'k',
      'QSIDE_CASTLE' => 'q'
  ];

  const BITS = [
      'NORMAL' => 1,
      'CAPTURE' => 2,
      'BIG_PAWN' => 4,
      'EP_CAPTURE' => 8,
      'PROMOTION' => 16,
      'KSIDE_CASTLE' => 32,
      'QSIDE_CASTLE' => 64
  ];

  const RANK_1 = 7;
  const RANK_2 = 6;
  const RANK_3 = 5;
  const RANK_4 = 4;
  const RANK_5 = 3;
  const RANK_6 = 2;
  const RANK_7 = 1;
  const RANK_8 = 0;

  const SQUARES = [
      'a8' => 0, 'b8' => 1, 'c8' => 2, 'd8' => 3, 'e8' => 4, 'f8' => 5, 'g8' => 6, 'h8' => 7,
      'a7' => 16, 'b7' => 17, 'c7' => 18, 'd7' => 19, 'e7' => 20, 'f7' => 21, 'g7' => 22, 'h7' => 23,
      'a6' => 32, 'b6' => 33, 'c6' => 34, 'd6' => 35, 'e6' => 36, 'f6' => 37, 'g6' => 38, 'h6' => 39,
      'a5' => 48, 'b5' => 49, 'c5' => 50, 'd5' => 51, 'e5' => 52, 'f5' => 53, 'g5' => 54, 'h5' => 55,
      'a4' => 64, 'b4' => 65, 'c4' => 66, 'd4' => 67, 'e4' => 68, 'f4' => 69, 'g4' => 70, 'h4' => 71,
      'a3' => 80, 'b3' => 81, 'c3' => 82, 'd3' => 83, 'e3' => 84, 'f3' => 85, 'g3' => 86, 'h3' => 87,
      'a2' => 96, 'b2' => 97, 'c2' => 98, 'd2' => 99, 'e2' => 100, 'f2' => 101, 'g2' => 102, 'h2' => 103,
      'a1' => 112, 'b1' => 113, 'c1' => 114, 'd1' => 115, 'e1' => 116, 'f1' => 117, 'g1' => 118, 'h1' => 119
  ];

  const ROOKS = [
      self::WHITE => [['square' => self::SQUARES['a1'], 'flag' => self::BITS['QSIDE_CASTLE']],
                      ['square' => self::SQUARES['h1'], 'flag' => self::BITS['KSIDE_CASTLE']]],
      self::BLACK => [['square' => self::SQUARES['a8'], 'flag' => self::BITS['QSIDE_CASTLE']],
                      ['square' => self::SQUARES['h8'], 'flag' => self::BITS['KSIDE_CASTLE']]]
  ];


  protected $chr_on_square; // squares 1 to 64 => piece eg p, k...
  protected $kings;
  protected $turn;
  protected $castling;
  protected $epSquare;
  protected $halfMoves;
  protected $moveNumber;
  protected $history;
  protected $header;
  protected $generateMovesCache;
  
  //protected $wsroot_url ;
  protected $img_url ;



  public function __construct($fen = null) //$this->load_fen(strval($fen))
  {
    $this->clear();

    if (strlen(strval($fen)) > 0) {
        $this->load_fen(strval($fen));
    } else {
        $this->load_fen(self::DEFAULT_POSITION);  //$this->load_ default_pos();
    }
               $ds = DIRECTORY_SEPARATOR ;
               $QS = '?' ;
               $wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
                  // 2. URL_DOM AIN = dev1:8083 :
                . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

                      // PHP 7.1.0 Support for negative offsets has been added.  
                      /*$haystack = 'ababcd'; $needle = 'aB'; $pos = strripos($haystack, $needle);
                      if ($pos === false) {echo "Sorry, we did not find ($needle) in ($haystack)";
                      } else {echo "Last ($needle) in ($haystack) is at position ($pos)"; } */
                $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;
                           //= /fwphp/glomodul/phpchess/phpchess1_ryanhs/test_chess_Ryanhs.php
                $pos = strripos($REQUEST_URI, '.php');
                $pos2 = -1;
                $REQUEST_URI2 = ' ';
                if (!($pos === false)) {
                   $pos2 = strripos($REQUEST_URI, '/') ; //41
                   $REQUEST_URI2 = substr($REQUEST_URI, 0, $pos2);
                }

                $uri_arr = explode($QS, $REQUEST_URI2) ; 
                $module_relpath = rtrim(ltrim($uri_arr[0],'/'),'/');
                $module_url = $wsroot_url.$module_relpath.'/';
    $this->img_url = dirname($module_url) .'/img/';
            /*echo __METHOD__ .' SAYS: '.'<pre>$REQUEST_URI='; print_r($REQUEST_URI) ; echo '</pre>';
             echo '<pre>$pos2='; print_r($pos2) ; echo '</pre>';//41
             echo '<pre>$REQUEST_URI2='; print_r($REQUEST_URI2) ; echo '</pre>';
             echo '<pre>$uri_arr='; print_r($uri_arr) ; echo '</pre>';
             echo '<pre>$wsroot_url='; print_r($wsroot_url) ; echo '</pre>';
             echo '<pre>$module_relpath='; print_r($module_relpath) ; echo '</pre>';
             echo '<pre>$module_url='; print_r($module_url)  ; echo '</pre>';
             echo '<pre>$this->img_url=dirname($module_url) .\'/img/\'='; print_r($this->img_url) ; echo '</pre>'; */
            /*
            //1. settings - properties - assign global variables to use them in any code part
            $module_dir_path = str_replace('\\','/', __DIR__) .'/' ;
            $app_dir_path = dirname($module_dir_path) .'/' ; //to app dir eg "glomodul" dir and app
            //to web server doc root or our doc root by ISP  $module_towsroot = eg '../../../'
            $wsroot_path = str_replace('\\','/', realpath('../../../../')) .'/' ;
            $shares_path = $wsroot_path.'zinc/' ; //includes, globals, commons, reusables
            */
  }




  //      ************ PGN FUNCTION ************
  //compact() creates array containing variables and their values :
  //extract() - Import variables into the current symbol table from an array
  public static function pgn2hdr_mv_hlp($game_pgnString) //return compact('header', 'moves', 'hlp');
  {
          //called by validatePgn, index.php
          //r eturns  a r r a y = c ompact('h eader', 'm oves') :
    //PGN = Portable Games Notation (like XML)
    //FEN = Forsyth�Edwards Notation is a standard notation for describing a particular board position of a chess game
    //$game_pgnString = str_replace('"','', $game_pgnString) ;
    $header = [];
    $allmoves_str = '';
    $moves  = [];
    $hlp  = [];

      ///////////////////////////////////////////////////////
      // 1. separate lines : $pgn_ string  to  a r r a y
      //////////////////////////////////////////////////////
      $game_pgnArr = str_replace("\r", '<br />', $game_pgnString);
                            //while (strpos($game_pgnArr, "\n\n") !== false) {
                               //$game_pgnArr = str_replace("\n\n", '<br />', $game_pgnArr);
                            //}
      $game_pgnArr = str_replace("\n", '<br />', $game_pgnArr);
      $game_pgnArr = explode('<br />', $game_pgnArr);
                       //echo __METHOD__ .' SAYS: '.'<pre>$game_pgnArr='; print_r($game_pgnArr) .'</pre>';


    $parseHeader = true;
    foreach ($game_pgnArr as $line):
    {
      $line = trim($line);
      if (!$line) {continue;} //skip empty ln
                      //echo __METHOD__ .' SAYS: '.'<pre>$line='. $line .'</pre>';

        ////////////////////////////////////////////////
        // 2. $ h e a d e r  a r r  (master)
        ///////////////////////////////////////////////
        //        HDRKEY  HDRVALUE
        //    eg [site "Collection 1994"]
        if ($parseHeader) 
        {
          $pos = strpos($line, '[');
          if (!($pos === false)) //if (substr($line,1,1) == '[')
          {
            // there is '[' in  l i n e :
            $lntmp = rtrim(ltrim($line,'['),']') ;
                             //$lntmp = explode(' ', $lntmp);
            $lntmp = explode('"', $lntmp);
                             //$lntmp[0] = '"'. $lntmp[0] .'"';
            $lntmp[1] = str_replace('"','', $lntmp[1]);
                              //echo __METHOD__ .' SAYS: '.'<pre>$lntmp='; print_r($lntmp) .'</pre>';
            $header[ strtoupper(trim($lntmp[0])) ] = trim($lntmp[1]) ;
            continue;
          } else {
            //if ($line) {$parseHeader = false;} else {continue;}
            $parseHeader = false;
          }
        } 

          //////////////////////////////////////////////
          // 3. $ m o v e s  a r r  (details)
          /////////////////////////////////////////////
          //    ORDNO MOVE  COMMENT   NOT MOVE VARIATION
          // eg   1. Qxg7# {too easy} 1-0      ()

          // 3.1 concat  m o v e s
          $line = str_replace('"','', $line) ;
          $line = str_replace("'",'', $line) ;
          $allmoves_str .= ' '. $line ;
      $allmoves_str = str_replace('   ', ' ', $allmoves_str) ;
      $allmoves_str = str_replace('  ', ' ', $allmoves_str) ;

    } endforeach ;


    // 3.2 prepare COMMENT
    $ii = 0;
    addhlp:
    $pos1 = strpos($allmoves_str, ' {');
    if ($ii < 1001 and !($pos1 === false)) //if (substr($line,1,1) == '[')
    {
       $ii++ ;
      // there is '{' in  l i n e :
      $pos2 = strpos($allmoves_str, '}');
      $comment = substr($allmoves_str, $pos1, $pos2 - $pos1 + 1) ;
      $comment_tmp = str_replace('}','///',
        str_replace( '{','|||', $comment )
      ) ; 
      $comment_tmp = trim(str_replace(' ','|', $comment_tmp)) ;

      //$hlp[] = $comment ;
      $allmoves_str = trim( str_replace($comment, $comment_tmp, $allmoves_str) );
      $allmoves_str = str_replace('. ', '.', $allmoves_str) ;

      goto addhlp ;
    }


          $movesTmp = explode(' ', $allmoves_str);
          $count_movesTmp = count($movesTmp) ;
          if ( in_array($movesTmp[$count_movesTmp - 1], ['', '*', '1-0', '1/2-1/2', '0-1']) ) {
            array_pop($movesTmp); //Pop element off array end
            $count_movesTmp-- ;
          }
                       /*echo '<b>'. __METHOD__ . ', '. __LINE__ .' SAYS: '. '</b>';
                       echo '<p>$allmoves_str='. $allmoves_str .'</p>';
                       echo '<pre>$movesTmp='; print_r($movesTmp) .'</pre>'; */

          $mv_ordno = 0 ;
          foreach ($movesTmp as $moveTmp):
          {
            //if ($mv_ordno === 0 ) { continue; }
            $mv_ordno++;
            $moveTmp = trim($moveTmp);
            $hlp[$mv_ordno - 1] = '<b>'.$moveTmp .'</b>' ;


              // 3.3 extract COMMENT in  $ h l p  a r r a y
              $ii = 0;
              addhlp2:
              $pos1 = strpos($moveTmp, '|||');
              if ($ii < 11 and !($pos1 === false))
              {
                $ii++ ;
                // there is '{' in  l i n e :
                $pos2 = strpos($moveTmp, '///');
                $comment = substr($moveTmp, $pos1, $pos2 - $pos1 + 3) ;

                $moveTmp = str_replace($comment, '', $moveTmp) ;
                $hlp[$mv_ordno - 1] = '<b>'.$moveTmp .'</b>' ;

                $comment_tmp = str_replace('|||', '',
                  str_replace(
                    '///', '', str_replace('|', ' ', $comment) 
                )) ;


                $hlp[$mv_ordno - 1] .= '<br />'. $comment_tmp ; //<br />

                goto addhlp2 ;
              }


            // remove ord.num. eg '1.' or '1' and \r\n\t\f\v (https://regex101.com/) :
            $moveTmp = trim(preg_replace("/^(\d+)\.\s?/", '', $moveTmp));
                            /*
                            ^ asserts position at start of the string eg before ''1'
                            
                            1st Capturing Group (\d+) - \d+ matches a DIGIT (equal to [0-9])
                            + Quantifier � Matches BETWEEN ONE AND UNLIMITED TIMES eg 1
                            
                            \. matches the character . literally (case sensitive) eg '.'
                            
                            \s? matches any whitespace character (equal to [\r\n\t\f\v ])
                            
                            ? Quantifier � Matches BETWEEN ZERO AND ONE TIMES, as many times as possible
                            */
              if ( !in_array($moveTmp, ['', '*', '1-0', '1/2-1/2', '0-1']) ) {
                  $moves[] = $moveTmp;
              }
          } endforeach ;
                       //echo __METHOD__ .' SAYS: '.'<pre>$hlp='; print_r($hlp) .'</pre>';


        return compact('header', 'moves', 'hlp');
              /*
              $pgn_arr=Array
              (
                  [header] => Array
                      (
                          [Event] => London
                          [Site] => London ENG
                          ...
                      )

                  [moves] => Array
                      (
                          [0] => e4
                          [1] => e5
                          ...
                          [41] => Be7#1-0
                      )

                  [hlp] => Array
                      (
                          [33] =>    18.Bd6?! was not a good move, when 18. d4! is winning, just like 18. Be3! or 18. Re1!
                          [34] =>...
                      )

              )
              */

                        /*preg_match('/^\[(\S+) \"(.*)\"\]$/', $line, $matches);
                        if (count($matches) >= 3) {
                            $header[$matches[1]] = $matches[2];
                            continue;
                        } */
  } //e n d  f n  pgn String 2 arr($game_ pgnString)



  function get_boardhtml() //was ascii  $help_2moves=''  object $game, object $squares_used
  {
    ob_start(); // returns  H T M L of c h e s s  b o a r d
           //echo __METHOD__ .' SAYS: '.'<pre>$help_2moves='; print_r($help_2moves); echo '</pre>';
    $fen   = $this->fen() ; //generate fen
    $chr_on_square = $this->fen2board($fen) ;
           //echo __METHOD__ .' SAYS: $chr_on_square='.'<pre>'; print_r($chr_on_square); echo '</pre>';
    $cnth  = count($this->history) ;
           //echo __METHOD__ .' SAYS: $this->history='.'<pre>'; print_r($this->history); echo '</pre>';
    $cols  = ['', 'a','b','c','d','e','f','g','h'] ;

    $dark = '#D3D3D3' ; //black is lightgray
    $light = '#FFFFFF' ; //white

    $wh='width="30px" height="30px"'; //square width, hight
    $it1 = '<img src="../img/'; //it = image tag

    $border_to_white = 'solid 4px #000000' ;
    $border_to_black = 'solid 4px #FFFF00' ;

    // ***************************************
    // S q u a r e s  from - to:
    // ***************************************
    //usually black :
    $square_from=' ';      $square_to=' ';
    //$chr_moved=' '; $chr_moved_color=' '; 
    //usually white :
    $square_prev_from=' '; $square_prev_to=' ';
    //$chr_prev_moved=' '; $chr_prev_moved_color=' ';
          // F R O M :
          if (isset($this->history[$cnth -1]['move']['from'])) {
            $square_from     = self::algebraic($this->history[$cnth -1]['move']['from']) ;
            //$chr_moved       = $this->history[$cnth -1]['move']['piece'] ;
            //$chr_moved_color = $this->history[$cnth -1]['move']['color'] ;
          } //else {
          //  $square_from = ' ' ; //$this->board[$i] is 0
          //}

          if (isset($this->history[$cnth -2]['move']['from'])) {
            $square_prev_from     = $this->history[$cnth -2]['move']['from_algebr'] ;
            //$chr_prev_moved       = $this->history[$cnth -2]['move']['piece'] ;
            //$chr_prev_moved_color = $this->history[$cnth -2]['move']['color'] ;
          } else {
            $square_prev_from     = $square_from ;
            //$chr_prev_moved       = $chr_moved ;
            //$chr_prev_moved_color = $chr_moved_color ;
          }
          // T O
          if (isset($this->history[$cnth -1]['move']['to'])) {
            $square_to = $this->history[$cnth -1]['move']['to_algebr'] ;
          } //else {
          //  $square_to = 0 ;
          //}

          if (isset($this->history[$cnth -2]['move']['to'])) {
            $square_prev_to = self::algebraic($this->history[$cnth -2]['move']['to']) ;
          } else {
            $square_prev_to = $square_to ;
          }
                              echo __METHOD__ .' SAYS: '."<h3>\$square_from=$square_from</h3>";


    ///////////////////////////////////////////////////////
    // 1. Top hdr a, b, c...
    //////////////////////////////////////////////////////
    ?>
    <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
    <!-- a,b,c... = first row top -->
    <tr height="10px" align=center bgcolor=#D3D3D3>
       <td></td><td>a</td><td>b</td><td>c</td><td>d</td>
       <td>e</td><td>f</td><td>g</td><td>h</td><td></td>
    </tr><?php


    ///////////////////////////////////////////////////////
    // 2. Displ. 8 rows
    //////////////////////////////////////////////////////

    $square_ordno = 0 ; // 0 to 63
    for ($row = 1; $row < 9; ++$row)       // r o w s
    { ?>
      <tr height="10px" align=center>
        <!-- rowx left column ordnum 8, 7...-->
        <td align=center width=20px bgcolor=#D3D3D3><?=9 - $row?></td><?php


      for ($col = 1; $col < 9; ++$col)     // c o l u m n s
      {

        $square = $cols[$col] . (9 - $row) ; //eg e4
        $square_color = Chess::squareColor($square) === 'light' ? $light : $dark;

        // ***************************************
        // c h r -s  = I T E M S
        // ***************************************
        //$chr_moved (p,k...) of $chr_moved_color (w or b) is on $square (e4...)
        //$chr_prev_hmoved (p,k...) of $chr_prev_moved (w or b) was on $square_prev

        //See z_code.php $chr_on_square=Array...
        //one of const SYMBOLS = 'pnbrqkPNBRQK' :

        //usually black :
        $chr_moved=' '; $chr_moved_color=' '; //used for chr -> img
        //usually white :
        $chr_prev_moved=' '; $chr_prev_moved_color=' ';

        $chr_moved = $chr_on_square[$square_ordno] ; 
        // not [$square_ordno -1] but prev move for this chr (piece) !!!!!!!!!!!
        if (isset($chr_on_square[$square_ordno - 1])) {
          $chr_prev_moved = $chr_on_square[$square_ordno - 1] ;
        } else { $chr_prev_moved = $chr_moved ; }

        if (strtolower($chr_moved) === $chr_moved) {$chr_moved_color='b';}
        else {$chr_moved_color='w';}
        if (strtolower($chr_prev_moved) === $chr_prev_moved) {$chr_prev_moved_color='b';}
        else {$chr_prev_moved_color='w';}
        
    /*
    //usually black :
    //$square_from=' ';      $square_to=' ';
    $chr_moved=' '; $chr_moved_color=' '; 
    //usually white :
    //$square_prev_from=' '; $square_prev_to=' ';
    $chr_prev_moved=' '; $chr_prev_moved_color=' ';
          // F R O M :
          if (isset($this->history[$cnth -1]['move']['from'])) {
            //$square_from     = self::algebraic($this->history[$cnth -1]['move']['from']) ;
            $chr_moved       = $this->history[$cnth -1]['move']['piece'] ;
            $chr_moved_color = $this->history[$cnth -1]['move']['color'] ;
          } 

          if (isset($this->history[$cnth -2]['move']['from'])) {
            //$square_prev_from     = self::algebraic($this->history[$cnth -2]['move']['from']) ;
            $chr_prev_moved       = $this->history[$cnth -2]['move']['piece'] ;
            $chr_prev_moved_color = $this->history[$cnth -2]['move']['color'] ;
          } else {
            //$square_prev_from     = $square_from ;
            $chr_prev_moved       = $chr_moved ;
            $chr_prev_moved_color = $chr_moved_color ;
          } */


                               //echo $square ; // (9 - $row) .'.'. $col ;

        // ********************************************
        // DISPLAY SQUARES COLORS
        // ********************************************
        // SQUARES TO HAVE COLORED  B O R D E R
        $td_tag = "<td align=center $wh bgcolor=$square_color" ;

                // border_to_white and border_to_black
                            $td_tag1 = '1. Last square 64 is $square=' .$square 
                              .'<br /> WHITE $square_prev_from='. $square_prev_from 
                              .', $square_prev_to='. $square_prev_to
                              .', $chr_prev_moved='. $chr_prev_moved
                              .', $chr_prev_moved_color='. $chr_prev_moved_color
                            ;
                            $td_tag2 = ''
                              .'BLACK $square_from='. $square_from
                              .', $square_to='. $square_to
                              .', $chr_moved='. $chr_moved
                              .', $chr_moved_color='. $chr_moved_color
                            ;
                switch (true)
                {
                  case ($square === $square_to):
                            $td_tag1 = '2. $square=' .$square .', $square_to='. $square_to ;
                            $td_tag2 = '$square_prev_to='. $square_prev_to .', $chr_moved_color='. $chr_moved_color;
                    if ($chr_moved_color === 'w') {
                       $td_tag .= ' border="'. $border_to_white .'"' ;
                    } else {
                       $td_tag .= ' border="'. $border_to_black .'"' ;
                    }
                    $td_tag1 = $td_tag ;
                    break ;
                  case ($square === $square_prev_to): 
                    if ($chr_prev_moved_color === 'w') {
                       $td_tag .= ' border="'. $border_to_white .'"' ;
                    } else {
                       $td_tag .= ' border="'. $border_to_black .'"' ;
                    }
                    $td_tag2 = $td_tag ;
                    break ;
                  ////default: $it = "<td width=34px bgcolor=#D3D3D3>".$it ; 
                  //break;
                }


        $td_tag .= '>'; 


        echo $td_tag ; 



        // ***** SQUARES CONTENT

        // ***********************************
        // TO = NON EMPTY SQUARES *****
        // ***********************************
        // ======= P U T  I M G s  O F  P I E C E S  ON S Q U A R E S : =======
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
              // $it1 = '<img src="../img/'; //it = image tag
                switch ($chr_moved) { //if ($chr_moved_color === 'w') {
                  case ('P'): $it=$it1.'0_pawn.png" alt="0_pawn.png" '.$wh.'>'; break;
                  case ('R'): $it=$it1.'0_rook.png" alt="0_rook.png" '.$wh.'>'; break ;
                  case ('N'): $it=$it1.'0_knight.png" alt="0_knight.png" '.$wh.'>'; break ;
                  case ('B'): $it=$it1.'0_bishop.png" alt="0_bishop.png" '.$wh.'>'; break ;
                  case ('K'): $it=$it1.'0_king.png" alt="0_king.png" '.$wh.'>'; break ;
                  case ('Q'): $it=$it1.'0_queen.png" alt="0_queen.png" '.$wh.'>'; break ;
                  // black :
                  case ('p'): $it=$it1.'1_pawn.png" alt="1_pawn.png" '.$wh.'>'; break ;
                  case ('r'): $it=$it1.'1_rook.png" alt="1_rook.png" '.$wh.'>'; break ;
                  case ('n'): $it=$it1.'1_knight.png" alt="1_knight.png" '.$wh.'>'; break ;
                  case ('b'): $it=$it1.'1_bishop.png" alt="1_bishop.png" '.$wh.'>'; break ;
                  case ('k'): $it=$it1.'1_king.png" alt="1_king.png" '.$wh.'>'; break ;
                  case ('q'): $it=$it1.'1_queen.png" alt="1_queen.png" '.$wh.'>'; break ;
                  default: $it=''; break;
                }

              //e n d  ***** PUT  P I E C E  IN ONE SQUARE
        } //e n d  ***** NON EMPTY SQUARES
        else
        {
              // ***********************************
              // FROM = EMPTY SQUARES
              // ***********************************
          $it='';
              //   - no need, see $wh : PUT DISTANCER IN ONE SQUARE (height colapses without d.)
              //   - AND SQUARES "CHR FROM" COLORED  B O R D E R

        } //e n d  ***** EMPTY SQUARES


        echo $it ; //it is image tag


        ++$square_ordno ;
        echo '</td>' ;
      } //e n d  c o l s
      ?>

      <!-- rowx right column ordnum 8, 7...-->
      <td align=center width=20px bgcolor=#D3D3D3><?=9 - $row?></td>


      </tr>
      <?php
    } //e n d  r o w s



    ///////////////////////////////////////////////////////
    // 3. ftr a, b, c...
    //////////////////////////////////////////////////////
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
                                 echo __METHOD__ .' SAYS: '."<h3>Test data</h3>";
                                 echo '<pre>$td_tag1='; print_r($td_tag1) ; echo '</pre>';
                                 echo '<pre>$td_tag2='; print_r($td_tag2) ; echo '</pre>';

    return $html ;
  } //e n d  f n  a s c i i









  /**
   * Parse FEN to board.
   * @param string $fen FEN string
   * @return array board array
   * @see https://en.wikipedia.org/wiki/Forsyth%E2%80%93Edwards_Notation
   *
   * FEN string looks like this:
   * rnbqkbnr/pp1ppppp/8/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2
   * 
   * Lowercase characters are black, uppercase are white. K=King, Q=Queen and so on, with P standing for Pawn. The stuff after the first space is about the board state and does not concern us in this case.
   *
   * The board is read from the top left corner, to the right and downwards. A forward slash acts as new line. Numbers are for empty spaces. So �8/2p5� can be read as �8 empty spaces, then on the next row (rank) 2 empty spaces, a pawn, then 5 more empty spaces.
   * 
   * So to parse a FEN into a a64-square array, we�d write:
  */
  public function fen2board($fen) //see load_fen
  {
    // called by board_ html() and test_chess_Ryanhs.php
      // keep only the piece info from the FEN and turn into array
      $chars = str_split(explode(' ', $fen)[0]);
      $chr_on_square = array_fill(0, 64, ' ');
      $row = 0;
      $col = 0;

      foreach($chars as $chr):
      {
          if ($row > 7) { break; }

          if ($chr == '/' || $col > 7)
          {
              $row++;
              $col = 0;
          }
          elseif (ctype_digit($chr)) //(strpos(DIGITS, $chr) !== false)
              $col += intval($chr);
          elseif (strpos(self::SYMBOLS, $chr) !== false) //was PIECES
          {
              $chr_on_square[$row*8+$col] = $chr;
              $col++;
          }
          /*
         if ($piece === '/') {
              $square += 8;
          } elseif (ctype_digit($piece)) {
              $square += intval($piece, 10);
          } else {
              $color = (ord($piece) < ord('a')) ? self::WHITE : self::BLACK;
              $this->put(
                  [
                  'type' => strtolower($piece),
                  'color' => $color,
              ],
                  self::algebraic($square)
              );
              ++$square;
          }
          */
      } endforeach ;
            //echo __METHOD__ .' SAYS: '.'<pre>$chr_on_square='; print_r($chr_on_square) ; echo '</pre>';
      return $chr_on_square;
  }



  /**API
    use \Ryanhs\Chess\Chess;  require 'Chess.php';
    $chess = new Chess();
    $chess->clear();
    //to be able to display "FEN=8/8/8/8/8/8/8/8 w - - 0 1" :
    echo 'FEN=' . $chess->fen() . &lt;br />;
    echo $chess; //displ empty board: public fn __toString() return $this->get_boardhtml();
    //echo $chess->get_boardhtml() . '<br />'; //same as above
  */
  public function clear() //echo $chess->get_boardhtml() displays empty board
  {
      $this->board = [];
      $this->kings = [self::WHITE => null, self::BLACK => null];
      $this->turn = self::WHITE;
      $this->castling = [self::WHITE => 0,  self::BLACK => 0];
      
      $this->epSquare = null;
      $this->halfMoves = 0;
      $this->moveNumber = 1;
      
      $this->history = [];
      $this->header = [];
      $this->generateMovesCache = [];

      for ($i = 0; $i < 120; ++$i) {
          $this->board[$i] = null;
      }
  }

  protected function updateSetup($fen) //called from load_fen($fen), remove($square), put($piece, $square)
  {
    $cnth = count($this->history) ;
      if ($cnth > 0) {
          return;
      }
      if ($fen !== self::DEFAULT_POSITION) {
          $this->header['SetUp'] = '1';
          $this->header['FEN'] = $fen;
      } else {
          unset($this->header['SetUp']);
          unset($this->header['FEN']);
      }
  }

  public function get_set_hdrtag($key = null, $value = '') //array of game properties
  {
      if ($key !== null) {
          $this->header[$key] = $value;
      }

      return $this->header;
  }




  //    ************ FEN FUNCTION ************
  public function load_fen($fen)
  {
    //                  0                            1  2   3 4 5
    //eg rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1
      if (!self::validateFen($fen)['valid']) {
          return false;
      }
      $tokens = explode(' ', $fen);
      $this->clear();

      // 0 position
      $position = $tokens[0];
      $square = 0;
      for ($i = 0; $i < strlen($position); ++$i) {
          $piece = $position[$i]; //$position{$i};
          if ($piece === '/') {
              $square += 8;
          } elseif (ctype_digit($piece)) {
              $square += intval($piece, 10);
          } else {
              $color = (ord($piece) < ord('a')) ? self::WHITE : self::BLACK;
              $this->put(
                  [
                  'type' => strtolower($piece),
                  'color' => $color,
              ],
                  self::algebraic($square)
              );
              ++$square;
          }
      }

      // 1 turn
      $this->turn = $tokens[1];

      // 2 castling options
      if (strpos($tokens[2], 'K') !== false) {
          $this->castling[self::WHITE] |= self::BITS['KSIDE_CASTLE'];
      }
      if (strpos($tokens[2], 'Q') !== false) {
          $this->castling[self::WHITE] |= self::BITS['QSIDE_CASTLE'];
      }
      if (strpos($tokens[2], 'k') !== false) {
          $this->castling[self::BLACK] |= self::BITS['KSIDE_CASTLE'];
      }
      if (strpos($tokens[2], 'q') !== false) {
          $this->castling[self::BLACK] |= self::BITS['QSIDE_CASTLE'];
      }

      // 3 ep square
      $this->epSquare = ($tokens[3] === '-') ? null : self::SQUARES[$tokens[3]];

      // 4 half moves
      $this->halfMoves = intval($tokens[4], 10);

      // 5 move number
      $this->moveNumber = intval($tokens[5], 10);

      $this->updateSetup($this->fen()); //generate fen

      return true;
  }

  //public f unction load_ default_pos() { return $this->load_fen(self::DEFAULT_POSITION); }




  public function fen($onlyPosition = false)
  {
      $empty = 0;
      $fen = '';
      for ($i = self::SQUARES['a8']; $i <= self::SQUARES['h1']; ++$i) {
          if ($this->board[$i] === null) {
              ++$empty;
          } else {
              if ($empty > 0) {
                  $fen .= $empty;
                  $empty = 0;
              }
              $color = $this->board[$i]['color'];
              $piece = $this->board[$i]['type'];
              $fen .= $color === self::WHITE ? strtoupper($piece) : strtolower($piece);
          }

          if (($i + 1) & 0x88) {
              if ($empty > 0) {
                  $fen .= $empty;
              }
              if ($i !== self::SQUARES['h1']) {
                  $fen .= '/';
              }
              $empty = 0;
              $i += 8;
          }
      }

      $cFlags = '';
      if ($this->castling[self::WHITE] & self::BITS['KSIDE_CASTLE']) {
          $cFlags .= 'K';
      }
      if ($this->castling[self::WHITE] & self::BITS['QSIDE_CASTLE']) {
          $cFlags .= 'Q';
      }
      if ($this->castling[self::BLACK] & self::BITS['KSIDE_CASTLE']) {
          $cFlags .= 'k';
      }
      if ($this->castling[self::BLACK] & self::BITS['QSIDE_CASTLE']) {
          $cFlags .= 'q';
      }
      if ($cFlags == '') {
          $cFlags = '-';
      }

      $epFlags = $this->epSquare === null ? '-' : self::algebraic($this->epSquare);

      if ($onlyPosition) {
          return implode(' ', [$fen, $this->turn, $cFlags, $epFlags]);
      } else {
          return implode(' ', [$fen, $this->turn, $cFlags, $epFlags, $this->halfMoves, $this->moveNumber]);
      }
  }

  // just an alias
  //public function generate Fen() { return $this->fen(); }

  public static function validateFen($fen)
  {
      $errors = [
          0 => 'No errors.',
          1 => 'FEN string must contain six space-delimited fields.',
          2 => '6th field (move number) must be a positive integer.',
          3 => '5th field (half move counter) must be a non-negative integer.',
          4 => '4th field (en-passant square) is invalid.',
          5 => '3rd field (castling availability) is invalid.',
          6 => '2nd field (side to move) is invalid.',
          7 => '1st field (piece positions) does not contain 8 \'/\'-delimited rows.',
          8 => '1st field (piece positions) is invalid [consecutive numbers].',
          9 => '1st field (piece positions) is invalid [invalid piece].',
          10 => '1st field (piece positions) is invalid [row too large].',
          11 => 'Illegal en-passant square',
      ];

      $tokens = explode(' ', $fen);

      // 1st criterion: 6 space-separated fields
      if (count($tokens) !== 6) {
          return ['valid' => false, 'error_number' => 1, 'error' => $errors[1]];
      }

      // 2nd criterion: move number field is a integer value > 0
      if (!ctype_digit($tokens[5]) || intval($tokens[5], 10) <= 0) {
          return ['valid' => false, 'error_number' => 2, 'error' => $errors[2]];
      }

      // 3rd criterion: half move counter is an integer >= 0
      if (!ctype_digit($tokens[4]) || intval($tokens[4], 10) < 0) {
          return ['valid' => false, 'error_number' => 3, 'error' => $errors[3]];
      }

      // 4th criterion: 4th field is a valid e.p.-string
      if (!(preg_match('/^(-|[a-h]{1}[3|6]{1})$/', $tokens[3]) === 1)) {
          return ['valid' => false, 'error_number' => 4, 'error' => $errors[4]];
      }

      // 5th criterion: 3th field is a valid castle-string
      if (!(preg_match('/(^-$)|(^[K|Q|k|q]{1,}$)/', $tokens[2]) === 1)) {
          return ['valid' => false, 'error_number' => 5, 'error' => $errors[5]];
      }

      // 6th criterion: 2nd field is "w" (white) or "b" (black)
      if (!(preg_match('/^(w|b)$/', $tokens[1]) === 1)) {
          return ['valid' => false, 'error_number' => 6, 'error' => $errors[6]];
      }

      // 7th criterion: 1st field contains 8 rows
      $rows = explode('/', $tokens[0]);
      if (count($rows) !== 8) {
          return ['valid' => false, 'error_number' => 7, 'error' => $errors[7]];
      }

      // 8-10th check
      for ($i = 0; $i < count($rows); ++$i) {
          $sumFields = 0;
          $previousWasNumber = false;
          for ($k = 0; $k < strlen($rows[$i]); ++$k) {
              if (ctype_digit($rows[$i][$k])) {
                  // 8th criterion: every row is valid
                  if ($previousWasNumber) {
                      return ['valid' => false, 'error_number' => 8, 'error' => $errors[8]];
                  }
                  $sumFields += intval($rows[$i][$k], 10);
                  $previousWasNumber = true;
              } else {
                  // 9th criterion: check symbols of piece
                  if (strpos(self::SYMBOLS, $rows[$i][$k]) === false) {
                      return ['valid' => false, 'error_number' => 9, 'error' => $errors[9]];
                  }
                  ++$sumFields;
                  $previousWasNumber = false;
              }
          }
          // 10th criterion: check sum piece + empty square must be 8
          if ($sumFields !== 8) {
              return ['valid' => false, 'error_number' => 10, 'error' => $errors[10]];
          }
      }


      // 11th criterion: en-passant if last is black's move, then its must be white turn
      if (strlen($tokens[3]) > 1) {
          if (($tokens[3][1] == '3' && $tokens[1] == 'w') ||
              ($tokens[3][1] == '6' && $tokens[1] == 'b')) {
              return ['valid' => false, 'error_number' => 11, 'error' => $errors[11]];
          }
      }

      return ['valid' => true, 'error_number' => 0, 'error' => 'No errors.'];
  }




  
  //       ************ PGN FUNCTION ************
  /* using the specification from http://www.chessclub.com/help/PGN-spec
   * example for html usage: $chess->p gn({ 'max_width' => 72, 'newline_char' => "<br />" ]);
   *
   * This is a custom implementation, not really a port from chess.js
   */
  public function movesUntilNow_str($options = []) //was pgn()
  {
      $newline = !empty($options['newline_char']) ? $options['newline_char'] : '<br />';
      $maxWidth = !empty($options['max_width']) ? $options['max_width'] : 0;

      // process header
      $o = '';
      foreach ($this->header as $k => $v) {
          $v = addslashes($v);
          $o .= "[{$k} \"{$v}\"]".$newline;
      }

      if (strlen($o) > 0) {
          $o .= $newline;
      } // if header presented, add new empty line

      // process movements
      $currentWidth = 0;
      $i = 1;
      foreach ($this->get_history(['verbose' => true]) as $history) {
          if ($i === 1 && $history['turn'] === self::BLACK) {
              $tmp = $i.'. ... ';
              ++$i;
          } else {
              $tmp = ($i % 2 === 1 ? ceil($i / 2).'. ' : '');
          }
          $tmp .= $history['san'].' ';

          $currentWidth += strlen($tmp);
          if ($currentWidth > $maxWidth && $maxWidth > 0) {
              $tmp = $newline.$tmp;
              $currentWidth = 0;
          }

          $o .= $tmp;
          ++$i;
      }
      if ($i > 1) {
          $o = substr($o, 0, -1);
      } // remove last space

      return $o;
  }


  /* return TRUE or FALSE
   * but, if ($options['verbose'] == true), return compact('header', 'moves', 'game') or FALSE
   */
  public static function validatePgn($pgn, $options = [])
  {
      $parsedPgn = self::pgn2hdr_mv_hlp($pgn);
      $verbose = !empty($options['verbose']) ? $options['verbose'] : false;

      $chess = new self;
      // validate move first before header for quick check invalid move
      foreach ($parsedPgn['moves'] as $k => $v) {
          if ($chess->move($v) === null) {
              return false;
          } // quick get out if move invalid
      }
      foreach ($parsedPgn['header'] as $k => $v) {
          $chess->get_set_hdrtag($k, $v);
      }
      $parsedPgn['game'] = $chess;

      return $verbose ? $parsedPgn : true;
  }

  public function export()
  {
      return (object) [
          'board' => $this->board,
          'kings' => $this->kings,
          'turn' => $this->turn,
          'castling' => $this->castling,
          'epSquare' => $this->epSquare,
          'halfMoves' => $this->halfMoves,
          'moveNumber' => $this->moveNumber,
          'history' => $this->history,
          'header' => $this->header,
      ];
  }

  public function import($chess)
  {
      if (is_a($chess, __CLASS__)) {
          $chess = $chess->export();
      }

      if (!is_object($chess)) {
          return false;
      }

      $this->clear(); // clear first
      $this->board = $chess->board;
      $this->kings = $chess->kings;
      $this->turn = $chess->turn;
      $this->castling = $chess->castling;
      $this->epSquare = $chess->epSquare;
      $this->halfMoves = $chess->halfMoves;
      $this->moveNumber = $chess->moveNumber;
      $this->history = $chess->history;
      $this->header = $chess->header;

      return true;
  }

  /* this f unction is not really port from chess.js
   * its just because i want to make a new logic, but interface almost the same
   */
  public function loadPgn($pgn)
  {
      $parsedPgn = self::validatePgn($pgn, ['verbose' => true]);
      if ($parsedPgn === false) {
          return false;
      }

      $this->import($parsedPgn['game']);

      return $this;
  }

  public function get_history($options = [])
  {
      $moveHistory = [];
      $gameTmp = !empty($this->header['SetUp']) ? new self($this->header['FEN']) : new self();
      $moveTmp = [];
      $verbose = !empty($options['verbose']) ? $options['verbose'] : false;

      foreach ($this->history as $history) {
          $moveTmp['to'] = self::algebraic($history['move']['to']);
          $moveTmp['from'] = self::algebraic($history['move']['from']);
          if ($history['move']['flags'] & self::BITS['PROMOTION']) {
              $moveTmp['promotion'] = $history['move']['promotion'];
          }

          $turn = $gameTmp->get_turn();
          $moveTmp = $gameTmp->move($moveTmp);

          if ($verbose) {
              $moveHistory[] = array_merge(['turn' => $turn], $moveTmp);
          } else {
              $moveHistory[] = $moveTmp['san'];
          }
          $moveTmp = [];
      }


      //~ $move['flags'] |= self::BITS['PROMOTION'];
      //~ $move['promotion'] = $promotion;
      return $moveHistory;
  }



  public function get_history_full($options = [])
  {
      return $this->history;
  }




  // this one from chess.js changed to return boolean (remove, true or false)
  public function remove($square)
  {
      // check for valid square
      if (!array_key_exists($square, self::SQUARES)) {
          return false;
      }

      $piece = $this->get($square);
      $this->board[self::SQUARES[$square]] = null;

      if ($piece !== null) {
          if ($piece['type'] == self::KING) {
              $this->kings[$piece['color']] = null;
          }
      }

      $this->updateSetup($this->fen()); //generate fen

      return true;
  }

  public function get($square)
  {
      // check for valid square
      if (!array_key_exists($square, self::SQUARES)) {
          return null;
      }

      return $this->board[self::SQUARES[$square]]; // shorcut?
  }

  public static function squareColor($square, $light = 'light', $dark = 'dark')
  {
      $squares = self::SQUARES;
      if (isset($squares[$square])) {
          $sq0x88 = $squares[$square];

          return ((self::rank($sq0x88) + self::file($sq0x88)) % 2 === 0) ? $light : $dark;
      }

      return null;
  }

  public function put($piece, $square)
  {
      // check for valid piece object
      if (!(isset($piece['type']) && isset($piece['color']))) {
          return false;
      }

      // check for piece
      if (strpos(self::SYMBOLS, strtolower($piece['type'])) === false) {
          return false;
      }

      // check for valid square
      if (!array_key_exists($square, self::SQUARES)) {
          return false;
      }

      $sq = self::SQUARES[$square];

      // don't let the use place more than one king
      if ($piece['type'] == self::KING && !($this->kings[$piece['color']] == null || $this->kings[$piece['color']] == $sq)) {
          return false;
      }

      $this->board[$sq] = ['type' => $piece['type'], 'color' => $piece['color']];
      if ($piece['type'] == self::KING) {
          $this->kings[$piece['color']] = $sq;
      }

      $this->updateSetup($this->fen()); //generate fen

      return true;
  }

  // here, we add first parameter turn, to make this really static method
  // because in chess.js var turn got from outside scope,
  // maybe need a little fix in chess.js or maybe i am :-p
  public static function buildMove($turn, $chr_on_square, $from, $to, $flags, $promotion = null)
  {
      $move = [
          'color' => $turn,
          'from' => $from,
          'from_algebr' => self::algebraic($from),
          'to' => $to,
          'to_algebr' => self::algebraic($to),
          'flags' => $flags,
          'piece' => $chr_on_square[$from]['type']
      ];

      if ($promotion !== null) {
          $move['flags'] |= self::BITS['PROMOTION'];
          $move['promotion'] = $promotion;
      }

      if ($chr_on_square[$to] !== null) {
          $move['captured'] = $chr_on_square[$to]['type'];
      } elseif ($flags & self::BITS['EP_CAPTURE']) {
          $move['captured'] = self::PAWN;
      }

      return $move;
  }

  protected function makeMove($move)
  {
    //called by m ove($s anOrA rray)
    //          m oveToS AN($m ove)
    //          p erft($d epth, $full = false)
    //          g enerateMoves($o ptions = [])
      $us = $this->get_turn();
      $them = self::swap_color($us);
      $historyKey = $this->recordMove($move);

      $this->board[$move['to']] = $this->board[$move['from']];
      $this->board[$move['from']] = null;



      // if flags:EP_CAPTURE (en passant), remove the captured pawn
      if ($move['flags'] & self::BITS['EP_CAPTURE']) {
          $this->board[$move['to'] + ($us == self::BLACK ? -16 : 16)] = null;
      }

      // if pawn promotion, replace with new piece
      if ($move['flags'] & self::BITS['PROMOTION']) {
          $this->board[$move['to']] = ['type' => $move['promotion'], 'color' => $us];
      }

      // if big pawn move, update the en passant square
      if ($move['flags'] & self::BITS['BIG_PAWN']) {
          $this->epSquare = $move['to'] + ($us == self::BLACK ? -16 : 16);
      } else {
          $this->epSquare = null;
      }



      // reset the 50 move counter if a pawn is moved or piece is captured
      if ($move['piece'] === self::PAWN) {
          $this->halfMoves = 0;
      } elseif ($move['flags'] & (self::BITS['CAPTURE'] | self::BITS['EP_CAPTURE'])) {
          $this->halfMoves = 0;
      } else {
          ++$this->halfMoves;
      }

      // if we moved the king
      if ($this->board[$move['to']]['type'] === self::KING) {
          //~ $this->kings[$this->board[$move['to']]['color']] = $move['to'];
          $this->kings[$us] = $move['to'];

          // IF WE CASTLED, move the rook next to the king
          if ($move['flags'] & self::BITS['KSIDE_CASTLE']) {
              $castlingTo = $move['to'] - 1;
              $castlingFrom = $move['to'] + 1;
              $this->board[$castlingTo] = $this->board[$castlingFrom];
              $this->board[$castlingFrom] = null;
          } elseif ($move['flags'] & self::BITS['QSIDE_CASTLE']) {
              $castlingTo = $move['to'] + 1;
              $castlingFrom = $move['to'] - 2;
              $this->board[$castlingTo] = $this->board[$castlingFrom];
              $this->board[$castlingFrom] = null;
          }

          $this->castling[$us] = 0; // or maybe ''
      }

      // turn of castling of we move a rock
      if ($this->castling[$us] > 0) {
          for ($i = 0, $len = count(self::ROOKS[$us]); $i < $len; ++$i) {
              if (
                  $move['from'] === self::ROOKS[$us][$i]['square'] &&
                  $this->castling[$us] & self::ROOKS[$us][$i]['flag']
              ) {
                  $this->castling[$us] ^= self::ROOKS[$us][$i]['flag'];
                  break;
              }
          }
      }

      // turn of castling of we capture a rock
      if ($this->castling[$them] > 0) {
          for ($i = 0, $len = count(self::ROOKS[$them]); $i < $len; ++$i) {
              if (
                  $move['to'] === self::ROOKS[$them][$i]['square'] &&
                  $this->castling[$them] & self::ROOKS[$them][$i]['flag']
              ) {
                  $this->castling[$them] ^= self::ROOKS[$them][$i]['flag'];
                  break;
              }
          }
      }


      if ($us === self::BLACK) {
          ++$this->moveNumber;
      }
      $this->turn = $them;

      //~ echo $historyKey . '<br />';
      // needed caching for short inThreefoldRepetition()
      $this->history[$historyKey]['position'] = $this->fen(true);
  }

  //protected function push($move)
  //{
      // just aliasing, because name method "push" is confusing
  //    return $this->r ecordMove($ m ove);
  //}

  protected function recordMove($move) //called by m akeM ove($m ove)
  {
      $this->history[] = [
          'move' => $move,
          'kings' => [
                          self::WHITE => $this->kings[self::WHITE],
                          self::BLACK => $this->kings[self::BLACK]
                          ],
          'turn' => $this->get_turn(),
          'castling' => [
                          self::WHITE => $this->castling[self::WHITE],
                          self::BLACK => $this->castling[self::BLACK]
                        ],
          'epSquare' => $this->epSquare,
          'halfMoves' => $this->halfMoves,
          'moveNumber' => $this->moveNumber,
      ];

      end($this->history);

      return key($this->history);
  }

  protected function moveFromSAN($san)
  {
      // maybe somehow if performance is really important, we have to change this anonymous f unction to normal function
      $simplifiedSAN = function ($san) {
          $stripPromotion = preg_replace('/=./', '', trim($san));
          $stripDecoration = preg_replace('/[+#?!]/', '', $stripPromotion);

          return $stripDecoration;
      };

      $moveSimplified = $simplifiedSAN($san);
      $moves = $this->generateMoves();
      foreach ($moves as $move) {
          if ($simplifiedSAN($this->moveToSAN($move)) === $moveSimplified) {
              return $move;
          }
      }

      return null;
  }

  protected function undoMove()
  {
      $old = array_pop($this->history);
      if ($old === null) {
          return null;
      }

      $move = $old['move'];
      $this->kings = $old['kings'];
      $this->turn = $old['turn'];
      $this->castling = $old['castling'];
      $this->epSquare = $old['epSquare'];
      $this->halfMoves = $old['halfMoves'];
      $this->moveNumber = $old['moveNumber'];

      $us = $this->turn;
      $them = self::swap_color($us);

      $this->board[$move['from']] = $this->board[$move['to']];
      $this->board[$move['from']]['type'] = $move['piece']; // to undo any promotions
      $this->board[$move['to']] = null;

      // if capture
      if ($move['flags'] & self::BITS['CAPTURE']) {
          $this->board[$move['to']] = ['type' => $move['captured'], 'color' => $them];
      } elseif ($move['flags'] & self::BITS['EP_CAPTURE']) {
          $index = $move['to'] + ($us == self::BLACK ? -16 : 16);
          $this->board[$index] = ['type' => self::PAWN, 'color' => $them];
      }

      // if castling
      if ($move['flags'] & (self::BITS['KSIDE_CASTLE'] | self::BITS['QSIDE_CASTLE'])) {
          if ($move['flags'] & self::BITS['KSIDE_CASTLE']) {
              $castlingTo = $move['to'] + 1;
              $castlingFrom = $move['to'] - 1;
          } elseif ($move['flags'] & self::BITS['QSIDE_CASTLE']) {
              $castlingTo = $move['to'] - 2;
              $castlingFrom = $move['to'] + 1;
          }
          $this->board[$castlingTo] = $this->board[$castlingFrom];
          $this->board[$castlingFrom] = null;
      }

      return $move;
  }

  public function undo()
  {
      $move = $this->undoMove();

      return $move !== null ? self::makePretty($move) : null; // make pretty
  }


  /* The move f unction can be called with in the following parameters:
   *
   * .move('Nxb7')      <- where 'move' is a case-sensitive SAN string
   *
   * .move({ from: 'h7', <- where the 'move' is a move object (additional
   *         to :'h8',      fields are ignored)
   *         promotion: 'q',
   *      })
   */
  public function move($sanOrArray)
  {
      $moveArray = null;
      $moves = $this->generateMoves();

      if (is_string($sanOrArray)) {
          foreach ($moves as $move) {
              if ($this->moveToSAN($move) === $sanOrArray) {
                  $moveArray = $move;
                  break;
              }
          }
      } elseif (is_array($sanOrArray)) {
          $sanOrArray['promotion'] = isset($sanOrArray['promotion']) ? $sanOrArray['promotion'] : null;

          foreach ($moves as $move) {
              $move['promotion'] = isset($move['promotion']) ? $move['promotion'] : null;
              if (
                  $sanOrArray['from'] === self::algebraic($move['from']) &&
                  $sanOrArray['to'] === self::algebraic($move['to']) &&
                  ($move['promotion'] == null || $sanOrArray['promotion'] == $move['promotion'])
              ) {
                  $moveArray = $move;
                  break;
              }
          }
      }

      if ($moveArray === null) {
          return null;
      }

      $movePretty = $this->makePretty($moveArray);
      $this->makeMove($moveArray);

      return $movePretty;
  }



  public function get_turn()
  {
      return $this->turn;
  }

  protected function attacked($color, $square)
  {
      for ($i = self::SQUARES['a8']; $i <= self::SQUARES['h1']; ++$i) {
          if ($i & 0x88) {
              $i += 7;
              continue;
          } // check edge of board

          if ($this->board[$i] == null) {
              continue;
          } // check empty square
          if ($this->board[$i]['color'] !== $color) {
              continue;
          } // check color

          $piece = $this->board[$i];
          $difference = $i - $square;
          $index = $difference + 119;

          if (self::ATTACKS[$index] & (1 << self::SHIFTS[$piece['type']])) {
              if ($piece['type'] === self::PAWN) {
                  if ($difference > 0) {
                      if ($piece['color'] === self::WHITE) {
                          return true;
                      }
                  } else {
                      if ($piece['color'] === self::BLACK) {
                          return true;
                      }
                  }
                  continue;
              }

              if ($piece['type'] === self::KNIGHT || $piece['type'] === self::KING) {
                  return true;
              }

              $offset = self::RAYS[$index];
              $j = $i + $offset;
              $blocked = false;
              while ($j !== $square) {
                  if ($this->board[$j] !== null) {
                      $blocked = true;
                      break;
                  }
                  $j += $offset;
              }

              if (!$blocked) {
                  return true;
              }
          }
      }

      return false;
  }

  protected function kingAttacked($color)
  {
      return $this->attacked(self::swap_color($color), $this->kings[$color]);
  }

  public function inCheck()
  {
      return $this->kingAttacked($this->turn);
  }

  public function inCheckmate()
  {
      return $this->inCheck() && count($this->generateMoves()) === 0;
  }

  public function inStalemate()
  {
      return !$this->inCheck() && count($this->generateMoves()) === 0;
  }

  public function insufficientMaterial()
  {
      $pieces = [
          self::PAWN => 0,
          self::KNIGHT => 0,
          self::BISHOP => 0,
          self::ROOK => 0,
          self::QUEEN => 0,
          self::KING => 0,
      ];
      $bishops = null;
      $numPieces = 0;
      $sqColor = 0;

      for ($i = self::SQUARES['a8']; $i <= self::SQUARES['h1']; ++$i) {
          $sqColor = ($sqColor + 1) % 2;
          if ($i & 0x88) {
              $i += 7;
              continue;
          }

          $piece = $this->board[$i];
          if ($piece !== null) {
              $pieces[$piece['type']] = isset($pieces[$piece['type']]) ? $pieces[$piece['type']] + 1 : 1;
              if ($piece['type'] === self::BISHOP) {
                  $bishops[] = $sqColor;
              }
              ++$numPieces;
          }
      }

      // k vs k
      if ($numPieces === 2) {
          return true;
      }

      // k vs kn / k vs kb
      if ($numPieces === 3 && ($pieces[self::BISHOP] === 1 || $pieces[self::KNIGHT] === 1)) {
          return true;
      }

      // k(b){0,} vs k(b){0,}  , because maybe you are a programmer we talk in regex (preg) :-p
      if ($numPieces === $pieces[self::BISHOP] + 2) {
          $sum = 0;
          $len = count($bishops);
          foreach ($bishops as $bishop) {
              $sum += $bishop;
          }
          if ($sum === 0 || $sum === $len) {
              return true;
          }
      }

      return false;
  }

  /* TODO: while this f unction is fine for casual use, a better
   * implementation would use a Zobrist key (instead of FEN). the
   * Zobrist key would be maintained in the make_move/undo_move functions,
   * avoiding the costly that we do below.
   */
  public function inThreefoldRepetition()
  {
      $hash = [];
      foreach ($this->history as $history) {
          if (isset($hash[$history['position']])) {
              ++$hash[$history['position']];
          } else {
              $hash[$history['position']] = 1;
          }

          if ($hash[$history['position']] >= 3) {
              return true;
          }
      }

      return false;
  }

  public function halfMovesExceeded()
  {
      return $this->halfMoves >= 100;
  }

  // alias in*()
  public function inHalfMovesExceeded()
  {
      return $this->halfMovesExceeded();
  }

  public function inDraw()
  {
      return
          $this->halfMovesExceeded() ||
          //~ $this->inCheckmate() ||
          $this->inStalemate() ||
          $this->insufficientMaterial() ||
          $this->inThreefoldRepetition()
      ;
  }

  public function gameOver()
  {
      return $this->inDraw() || $this->inCheckmate();
  }

  protected static function rank($i)
  {
      return $i >> 4;
  }

  protected static function file($i)
  {
      return $i & 15;
  }

  protected static function algebraic($i)
  {
      $f = self::file($i);
      $r = self::rank($i);

      return substr('abcdefgh', $f, 1).substr('87654321', $r, 1);
  }

  protected static function swap_color($color)
  {
      return $color == self::WHITE ? self::BLACK : self::WHITE;
  }

  // this f unction is used to uniquely identify ambiguous moves
  protected function getDisambiguator($move)
  {
      $moves = $this->generateMoves();

      $from = $move['from'];
      $to = $move['to'];
      $piece = $move['piece'];

      $ambiguities = 0;
      $sameRank = 0;
      $sameFile = 0;

      for ($i = 0, $len = count($moves); $i < $len; ++$i) {
          $ambiguityFrom = $moves[$i]['from'];
          $ambiguityTo = $moves[$i]['to'];
          $ambiguityPiece = $moves[$i]['piece'];

          /* if a move of the same piece type ends on the same to square, we'll
           * need to add a disambiguator to the algebraic notation
           */
          if (
              $piece === $ambiguityPiece &&
              $from !== $ambiguityFrom &&
              $to === $ambiguityTo
          ) {
              ++$ambiguities;
              if (self::rank($from) === self::rank($ambiguityFrom)) {
                  ++$sameRank;
              }
              if (self::file($from) === self::file($ambiguityFrom)) {
                  ++$sameFile;
              }
          }
      }

      if ($ambiguities > 0) {
          /* if there exists a similar moving piece on the same rank and file as
           * the move in question, use the square as the disambiguator
           */
          if ($sameRank > 0 && $sameFile > 0) {
              return self::algebraic($from);
          }

          /* if the moving piece rests on the same file, use the rank symbol as the
           * disambiguator
           */
          if ($sameFile > 0) {
              return substr(self::algebraic($from), 1, 1);
          }

          // else use the file symbol
          return substr(self::algebraic($from), 0, 1);
      }

      return '';
  }

  // convert a move from 0x88 to SAN
  protected function moveToSAN($move)
  {
      $output = '';
      if ($move['flags'] & self::BITS['KSIDE_CASTLE']) {
          $output = 'O-O';
      } elseif ($move['flags'] & self::BITS['QSIDE_CASTLE']) {
          $output = 'O-O-O';
      } else {
          $disambiguator = $this->getDisambiguator($move);

          // pawn e2->e4 is "e4", knight g8->f6 is "Nf6"
          if ($move['piece'] !== self::PAWN) {
              $output .= strtoupper($move['piece']).$disambiguator;
          }

          // x on capture
          if ($move['flags'] & (self::BITS['CAPTURE'] | self::BITS['EP_CAPTURE'])) {
              // pawn e5->d6 is "exd6"
              if ($move['piece'] === self::PAWN) {
                  $output .= substr(self::algebraic($move['from']), 0, 1);
              }

              $output .= 'x';
          }

          $output .= self::algebraic($move['to']);

          // promotion example: e8=Q
          if ($move['flags'] & self::BITS['PROMOTION']) {
              $output .= '='.strtoupper($move['promotion']);
          }
      }

      // check / checkmate
      $this->makeMove($move);
      if ($this->inCheck()) {
          $output .= count($this->generateMoves()) === 0 ? '#' : '+';
      }
      $this->undoMove();

      return $output;
  }

  protected function makePretty($uglyMove)
  {
      $move = $uglyMove;
      $move['san'] = $this->moveToSAN($move);
      $move['to'] = self::algebraic($move['to']);
      $move['from'] = self::algebraic($move['from']);

      $flags = '';
      foreach (self::BITS as $k => $v) {
          if (self::BITS[$k] & $move['flags']) {
              $flags .= self::FLAGS[$k];
          }
      }
      $move['flags'] = $flags;

      return $move;
  }





  public function ascii()
  {
      $s = '<pre>'.'   +------------------------+'.'<br />';
      // all 64 squares $i = 1,2... :
      for ( $i = self::SQUARES['a8'];
            $i <= self::SQUARES['h1'];
            ++$i
          )
      {
          // display first column value in row (rank) :
          if (self::file($i) === 0) {
              $s .= ' '.substr('87654321', self::rank($i), 1) .' |';
          }

          if ($this->board[$i] == null) {
              $s .= ' . ';
          } else {
              $piece = $this->board[$i]['type'];
              $color = $this->board[$i]['color'];

              $symbol = ($color === self::WHITE) ? strtoupper($piece) : strtolower($piece);

              $s .= ' '.$symbol.' ';
          }

          if (($i + 1) & 0x88) {
              $s .= '|'.'<br />';
              $i += 8;
          }
      }
      $s .= '   +------------------------+'.'<br />';
      $s .= '     a  b  c  d  e  f  g  h'.'</pre>'; //.'<br />'

      return $s;
  }

  // really need to think about full perft test
  public function perft($depth, $full = false)
  {
      $nodes = 0;
      $captures = 0;
      $enPassants = 0;
      $castles = 0;
      $promotions = 0;
      $checks = 0;
      $checkmates = 0;

      $moves = $this->generateMoves(['legal' => false]);
      $color = $this->get_turn();
      for ($i = 0, $len = count($moves); $i < $len; ++$i) {
          $this->makeMove($moves[$i]);

          if (!$this->kingAttacked($color)) {
              if ($depth - 1 > 0) {
                  $childs = $this->perft($depth - 1, true);
                  $nodes += $childs['nodes'];
                  $captures += $childs['captures'];
                  $enPassants += $childs['enPassants'];
                  $castles += $childs['castles'];
                  $promotions += $childs['promotions'];
                  $checks += $childs['checks'];
                  $checkmates += $childs['checkmates'];
              } else {
                  ++$nodes;
              }
          }
          $this->undoMove();
      }

      if ($full === false) {
          return $nodes;
      } else {
          return compact('nodes', 'captures', 'enPassants', 'castles', 'promotions', 'checks', 'checkmates');
      }
  }










  protected function generateMoves($options = [])
  {
      $cacheKey = $this->fen().json_encode($options);

      // check cache first
      if (isset($this->generateMovesCache[$cacheKey])) {
          return $this->generateMovesCache[$cacheKey];
      }

      $moves = [];
      $us = $this->get_turn();
      $them = self::swap_color($us);
      $secondRank = [self::BLACK => self::RANK_7,
                      self::WHITE => self::RANK_2];

      if (!empty($options['square'])) {
          $firstSquare = $lastSquare = $options['square'];
          $singleSquare = true;
      } else {
          $firstSquare = self::SQUARES['a8'];
          $lastSquare = self::SQUARES['h1'];
          $singleSquare = false;
      }

      // legal moves only?
      $legal = isset($options['legal']) ? $options['legal'] : true;

      // using anonymous f unction here, is it a bad practice?
      // its because we stick to use "self::", if its not anonymous, then it have to be "Chess::"
      $addMove = function ($turn, $chr_on_square, &$moves, $from, $to, $flags) {
          // if pawn promotion
          if (
              $chr_on_square[$from]['type'] === self::PAWN &&
              (self::rank($to) === self::RANK_8 || self::rank($to) === self::RANK_1)
          ) {
              $promotionPieces = [self::QUEEN, self::ROOK, self::BISHOP, self::KNIGHT];
              foreach ($promotionPieces as $promotionPiece) {
                  $moves[] = self::buildMove($turn, $chr_on_square, $from, $to, $flags, $promotionPiece);
              }
          } else {
              $moves[] = self::buildMove($turn, $chr_on_square, $from, $to, $flags);
          }
      };

      for ($i = $firstSquare; $i <= $lastSquare; ++$i) {
          if ($i & 0x88) {
              $i += 7;
              continue;
          } // check edge of board

          $piece = $this->board[$i];
          if ($piece === null || $piece['color'] !== $us) {
              continue;
          }

          if ($piece['type'] === self::PAWN) {
              // single square, non-capturing
              $square = $i + self::PAWN_OFFSETS[$us][0];
              if ($this->board[$square] == null) {
                  $addMove($us, $this->board, $moves, $i, $square, self::BITS['NORMAL']);

                  // double square
                  $square = $i + self::PAWN_OFFSETS[$us][1];
                  if ($secondRank[$us] === self::rank($i) && $this->board[$square] === null) {
                      $addMove($us, $this->board, $moves, $i, $square, self::BITS['BIG_PAWN']);
                  }
              }

              // pawn captures
              for ($j = 2; $j < 4; ++$j) {
                  $square = $i + self::PAWN_OFFSETS[$us][$j];
                  if ($square & 0x88) {
                      continue;
                  }
                  if ($this->board[$square] !== null) {
                      if ($this->board[$square]['color'] === $them) {
                          $addMove($us, $this->board, $moves, $i, $square, self::BITS['CAPTURE']);
                      }
                  } elseif ($square === $this->epSquare) { // get epSquare from enemy
                      $addMove($us, $this->board, $moves, $i, $this->epSquare, self::BITS['EP_CAPTURE']);
                  }
              }
          } else {
              for ($j = 0, $len = count(self::PIECE_OFFSETS[$piece['type']]); $j < $len; ++$j) {
                  $offset = self::PIECE_OFFSETS[$piece['type']][$j];
                  $square = $i;

                  while (true) {
                      $square += $offset;
                      if ($square & 0x88) {
                          break;
                      }

                      if ($this->board[$square] === null) {
                          $addMove($us, $this->board, $moves, $i, $square, self::BITS['NORMAL']);
                      } else {
                          if ($this->board[$square]['color'] === $us) {
                              break;
                          }
                          $addMove($us, $this->board, $moves, $i, $square, self::BITS['CAPTURE']);
                          break;
                      }

                      if ($piece['type'] == self::KNIGHT || $piece['type'] == self::KING) {
                          break;
                      }
                  }
              }
          }
      }

      // castling
      // a) we're generating all moves
      // b) we're doing single square move generation on king's square
      if (!$singleSquare || $lastSquare === $this->kings[$us]) {
          if ($this->castling[$us] & self::BITS['KSIDE_CASTLE']) {
              $castlingFrom = $this->kings[$us];
              $castlingTo = $castlingFrom + 2;

              if (
                  $this->board[$castlingFrom + 1] == null &&
                  $this->board[$castlingTo] == null &&
                  !$this->attacked($them, $this->kings[$us]) &&
                  !$this->attacked($them, $castlingFrom + 1) &&
                  !$this->attacked($them, $castlingTo)
              ) {
                  $addMove($us, $this->board, $moves, $this->kings[$us], $castlingTo, self::BITS['KSIDE_CASTLE']);
              }
          }

          if ($this->castling[$us] & self::BITS['QSIDE_CASTLE']) {
              $castlingFrom = $this->kings[$us];
              $castlingTo = $castlingFrom - 2;

              if (
                  $this->board[$castlingFrom - 1] == null &&
                  $this->board[$castlingFrom - 2] == null && // $castlingTo
                  $this->board[$castlingFrom - 3] == null && // col "b", next to rock
                  !$this->attacked($them, $this->kings[$us]) &&
                  !$this->attacked($them, $castlingFrom - 1) &&
                  !$this->attacked($them, $castlingTo)
              ) {
                  $addMove($us, $this->board, $moves, $this->kings[$us], $castlingTo, self::BITS['QSIDE_CASTLE']);
              }
          }
      }

      // return all pseudo legal moves (this includes moves that allow the king to be captured)
      if (!$legal) {
          $this->generateMovesCache[$cacheKey] = $moves;

          return $moves;
      }

      // filter out illegal moves
      $legalMoves = [];
      foreach ($moves as $i => $move) { // in php we have foreach :-p
          $this->makeMove($move);
          if (!$this->kingAttacked($us)) {
              $legalMoves[] = $move;
          }
          $this->undoMove();
      }

      $this->generateMovesCache[$cacheKey] = $legalMoves;

      return $legalMoves;
  }



  /* The internal representation of a chess move is in 0x88 format, and
   * not meant to be human-readable.  The code below converts the 0x88
   * square coordinates to algebraic coordinates.  It also prunes an
   * unnecessary move keys resulting from a verbose call.
   */

  public function moves($options = ['verbose' => false])
  {
      $moves = $this->generateMoves();
      array_walk($moves, function (&$move) use ($options) {
          $move = !empty($options['verbose']) ? $this->makePretty($move) : $this->moveToSAN($move);
      });

      return $moves;
  }



  public function __toString()
  {
      return $this->get_boardhtml();
  }


}