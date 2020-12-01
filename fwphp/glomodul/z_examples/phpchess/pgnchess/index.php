<?php
//https://github.com/programarivm/pgn-chess

//namespace PGNChess;

use PGNChess\src\Game;
//use PGNChess\src\Player;


use B12phpfw\core\zinc\Autoload ; //see below **HELPNS 

$ds = DIRECTORY_SEPARATOR ;
$QS = '?' ;


//         Defaults (prescribed, zadane values)
$moves_in_board = 2 ;
// SETTING 4*2=8 moves in 4-boards web page row :
if (isset($_POST['b'])) {$boards_in_row=$_POST['b'];} else {$boards_in_row=4;}

// (WebSocket server) LISTENING TO CHESS COMMANDS
// game moves script to include :
if (isset($_GET['g'])) {$pgnfle_toinc=$_GET['g'];} else {$pgnfle_toinc='001';}


// Opening Benoni, Benko gambit
$game_pgnString = '1.d4 Nf6 2.c4 c5 3.d5 b5 4.cxb5 a6 5.bxa6 Bxa6 6.Nc3 d6 7.e4 Bxf1 8.Kxf1 g6 9.g3';

// Opening RuyLopez, Exchange
$game_pgnString = '1.e4 e5 2.Nf3 Nc6 3.Bb5 a6 4.Bxc6 dxc6 5.d4 exd4 6.Qxd4 Qxd4 7.Nxd4';
// Opening RuyLopez, LucenaDefense
$game_pgnString = '1.e4 e5 2.Nf3 Nc6 3.Bb5 Be7';
// Opening RuyLopez, Open
$game_pgnString = '1.e4 e5 2.Nf3 Nc6 3.Bb5 Nf6 4.O-O Nxe4';

// Opening Sicilian, Closed
$game_pgnString = '1.e4 c5 2.Nc3 Nc6 3.g3 g6 4.Bg2 Bg7 5.d3 d6';
// Opening Sicilian, Open
$game_pgnString = '1.e4 c5 2.Nf3 d6 3.d4 cxd4 4.Nxd4 Nf6 5.Nc3';

// Players Adams
$game_pgnString = '1.e4 e6 2.d4 d5 3.Nd2 Nf6 4.e5 Nfd7 5.f4 c5 6.c3 Nc6 7.Ndf3 cxd4 8.cxd4 f6 9.Bd3 Bb4+ 10.Bd2 Qb6 11.Ne2 fxe5 12.fxe5 O-O 13.a3 Be7 14.Qc2 Rxf3 15.gxf3 Nxd4 16.Nxd4 Qxd4 17.O-O-O Nxe5 18.Bxh7+ Kh8 19.Kb1 Qh4 20.Bc3 Bf6 21.f4 Nc4 22.Bxf6 Qxf6 23.Bd3 b5 24.Qe2 Bd7 25.Rhg1 Be8 26.Rde1 Bf7 27.Rg3 Rc8 28.Reg1 Nd6 29.Rxg7 Nf5 30.R7g5 Rc7 31.Bxf5 exf5 32.Rh5+';

//$game_pgnString = file_get_contents(self::DATA_FOLDER."/game/$filename");
// Checkmate
$game_pgnString = '1.f3 e5 2.g4 Qh4';
//$game_pgnString = '1.f3 {aaaaaaaaa 111111...} e5 2.g4 Qh4 (variant...)';
$game_pgnString = '1.e4 e5 2.Bc4 Nc6 3.Qh5 Nf6 4.Qxf7';







     $wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
              // 2. URL_DOM AIN = dev1:8083 :
            . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

      $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;
      $uri_arr = explode($QS, $REQUEST_URI) ; 
      $module_relpath = rtrim(ltrim($uri_arr[0],'/'),'/');
      $module_url = $wsroot_url.$module_relpath.'/';


//1. settings - properties - assign global variables to use them in any code part
$module_dir_path = str_replace('\\','/', __DIR__) .'/' ;
$app_dir_path = dirname($module_dir_path) .'/' ; //to app dir eg "glomodul" dir and app
//to web server doc root or our doc root by ISP  $module_towsroot = eg '../../../'
$wsroot_path = str_replace('\\','/', realpath('../../../../')) .'/' ;
$shares_path = $wsroot_path.'zinc/' ; //includes, globals, commons, reusables

$pp1 = (object) //=like Oracle Forms property palette (module level) but all sites level
[   'dbg'=>'1', 'stack_trace'=>[[str_replace('\\','/', __FILE__ ).', lin='.__LINE__]]

  //1.1
  , 'wsroot_path'=>$wsroot_path
  , 'shares_path'=>$shares_path

  //1.2
  , 'module_version'=>'1.0.0.0 Chess' //, 'vendor_namesp_prefix'=>'B12phpfw'

  //1.3 Dirs paths where are class scripts to autoload. Dir name is last in namespace and use. 
  , 'module_path_arr'=>[
    //MUST BE NUM INDEXED for auto loader loop (not 'string'=>...)
    $module_dir_path // = thismodule_cls_dir_path = $pp1->module_path
    //dir of global clses for all sites :
    ,$shares_path //,str_replace('\\','/',realpath($module_ towsroot.'zinc')) .'/'
    // module classes :
    ,$module_dir_path.'src/'
    ,$module_dir_path.'src/Castling/'

    ,$module_dir_path.'src/Evaluation/'
    ,$module_dir_path.'src/Evaluation/Value/'

    ,$module_dir_path.'src/Event/'
    ,$module_dir_path.'src/Event/Picture/'

    ,$module_dir_path.'src/Exception/'

    ,$module_dir_path.'src/Heuristic/'
    ,$module_dir_path.'src/Heuristic/Picture/'

    ,$module_dir_path.'src/ML/Supervised/Regression/Labeller/Primes/'
    ,$module_dir_path.'src/ML/Supervised/Regression/Sampler/Primes/'

    ,$module_dir_path.'src/PGN/'

    ,$module_dir_path.'src/Piece/'
    ,$module_dir_path.'src/Piece/Type/'
  ]
] ;

//2. global cls loads classes scripts automatically
                //instead require_once __DIR__ . '/src/Game.php' ; :
require($pp1->shares_path .'Autoload.php'); //or Composer's autoload cls-es
$autoloader = new Autoload($pp1); 

//3. process request from ibrowser & send response to ibrowser :




if (
  !isset($_GET['g']) // game in file
  and !isset($_GET['s']) // game in local string above
)
{
    ///////////////////////////////////////////////
    // M E N U  OF GAMES and  C H E S S  H E L P
    ///////////////////////////////////////////////
   include __DIR__ .'/../games_menu.php';
   include __DIR__ .'/../help_chess.php';
   exit(0);
}



if (isset($_GET['s']))
{
    ///////////////////////////////////////////////
    // 1. GAME IN LOCAL STRING ABOVE - FOR TESTING
    ///////////////////////////////////////////////
    echo '<h3>$player->play()->getBoard();</h3>';

    // Opening Benoni, Benko gambit
    $game_pgnString = '1.d4 Nf6 2.c4 c5 3.d5 b5 4.cxb5 a6 5.bxa6 Bxa6 6.Nc3 d6 7.e4 Bxf1 8.Kxf1 g6 9.g3';

    // Opening RuyLopez, Exchange
    $game_pgnString = '1.e4 e5 2.Nf3 Nc6 3.Bb5 a6 4.Bxc6 dxc6 5.d4 exd4 6.Qxd4 Qxd4 7.Nxd4';
    // Opening RuyLopez, LucenaDefense
    $game_pgnString = '1.e4 e5 2.Nf3 Nc6 3.Bb5 Be7';
    // Opening RuyLopez, Open
    $game_pgnString = '1.e4 e5 2.Nf3 Nc6 3.Bb5 Nf6 4.O-O Nxe4';

    // Opening Sicilian, Closed
    $game_pgnString = '1.e4 c5 2.Nc3 Nc6 3.g3 g6 4.Bg2 Bg7 5.d3 d6';
    // Opening Sicilian, Open
    $game_pgnString = '1.e4 c5 2.Nf3 d6 3.d4 cxd4 4.Nxd4 Nf6 5.Nc3';

    // Players Adams
    $game_pgnString = '1.e4 e6 2.d4 d5 3.Nd2 Nf6 4.e5 Nfd7 5.f4 c5 6.c3 Nc6 7.Ndf3 cxd4 8.cxd4 f6 9.Bd3 Bb4+ 10.Bd2 Qb6 11.Ne2 fxe5 12.fxe5 O-O 13.a3 Be7 14.Qc2 Rxf3 15.gxf3 Nxd4 16.Nxd4 Qxd4 17.O-O-O Nxe5 18.Bxh7+ Kh8 19.Kb1 Qh4 20.Bc3 Bf6 21.f4 Nc4 22.Bxf6 Qxf6 23.Bd3 b5 24.Qe2 Bd7 25.Rhg1 Be8 26.Rde1 Bf7 27.Rg3 Rc8 28.Reg1 Nd6 29.Rxg7 Nf5 30.R7g5 Rc7 31.Bxf5 exf5 32.Rh5+';

    //$game_pgnString = file_get_contents(self::DATA_FOLDER."/game/$filename");
    // Checkmate
    $game_pgnString = '1.f3 e5 2.g4 Qh4';
    //$game_pgnString = '1.f3 {aaaaaaaaa 111111...} e5 2.g4 Qh4 (variant...)';
    $game_pgnString = '1.e4 e5 2.Bc4 Nc6 3.Qh5 Nf6 4.Qxf7';
} //e n d   game in local string above - for testing



if (isset($_GET['g']))
{
  ///////////////////////////////////////////////
  //  2. SHOW GAME file selected in menu
  ///////////////////////////////////////////////
                      //$fle_to_inc_path = __DIR__ . $ds .'games'. $ds . $p gnfle_toinc .'.php' ;
  //Moves screen to include, in URL is basename eg g=001 :
  $url_to_inc = dirname($module_url) . '/games'. '/' . $pgnfle_toinc .'.pgn' ;

  $game_pgnString = file_get_contents($url_to_inc ) ;
                          //$lines = str_replace("\n", '<br />', $game_pgnString);
                          //$lines = explode('<br />', $lines);
                           echo 'ln '. __LINE__ .' SAYS: '.'<pre>$module_url='. $module_url .'</pre>';
                           //echo '<pre>NO MORE $fle_to_inc_path='. $fle_to_inc_path  .'</pre>';
                           echo '<pre>$url_to_inc='. $url_to_inc .'</pre>';
                           echo '<pre>$game_pgnString=<br />'. $game_pgnString .'</pre>';
                           //echo '<pre>$lines='; print_r($lines) .'</pre>';
} //e n d   game in local string above - for testing






    $game = new Game();

    // ************** GAME_PGNSTRING, PAIRS, MOVES ************** 
    //$pgn_arr = pgnString2arr($game_pgnString);
    //          echo '<pre>$pgn_arr='; print_r($pgn_arr) ; echo '</pre>';

    $pairs = array_filter(preg_split('/[0-9]+\./', $game_pgnString));
    $moves = [];
              echo __FILE__  .', line '. __LINE__ .' SAYS: '.'<pre>$game_pgnString='; print_r($game_pgnString) ; echo '</pre>';
              echo '<pre>$pairs='; print_r($pairs) ; echo '</pre>';
    foreach ($pairs as $pair) {
        $moves[] = array_values(array_filter(explode(' ', $pair)));
    }
    $moves = array_values(array_filter($moves));
              echo '<pre>$moves='; print_r($moves) ; echo '</pre>';
    for ($i = 0; $i < count($moves); ++$i) {
        $whiteMove = str_replace("\r", '', str_replace("\n", '', $moves[$i][0]));
              echo '<pre>$whiteMove='; print_r($whiteMove) ; echo '</pre>';
        //$this->assertEquals(true, $game->play('w', $whiteMove));
        $game->play('w', $whiteMove);

        if (isset($moves[$i][1])) {
            $blackMove = str_replace("\r", '', str_replace("\n", '', $moves[$i][1]));
              echo '<pre>$blackMove='; print_r($blackMove) ; echo '</pre>';
            //$this->assertEquals(true, $game->play('b', $blackMove));
            $game->play('b', $blackMove);
        }
    }




    // ************** GAME_PGNSTRING ************** 
    $game_pgnString = $game->movetext();
              echo '<pre>$game->game_pgnString()='; print_r($game_pgnString) ; echo '</pre>';





    // ************** HISTORY, STATUS, BOARD_DISPL ************** 
    $history = $game->history();
              echo '<pre>$game->history()='; print_r($history) ; echo '</pre>';

    $status = $game->status();
    //          echo '<pre>$game->status()='; print_r($game->status()) ; echo '</pre>';

    //$filenameData = filenameData();
    //          echo '<pre>$filenameData='; print_r($filenameData) ; echo '</pre>';


    board_html($game, $status->squares->used);


    //Usage  For further details please look at the unit tests.



    exit(0);






                            /* // $status->turn  or ->castling or ->squares->free
                               // or attack or space
                            $game->status()=stdClass Object
                                [turn] => b
                                [castling] => Array
                                        [w] => Array
                                                [castled] => 
                                                [O-O] => 1
                                                [O-O-O] => 1
                                        [b] => Array
                                                [castled] => 
                                                [O-O] => 1
                                                [O-O-O] => 1
                                [squares] => stdClass Object
                                        [free] => Array
                                                [0] => a3
                                                [1] => a4
                                                ...
                                        [used] => stdClass Object
                                                [w] => Array
                                                        [0] => a1
                                                        [1] => b1
                                                        ...
                                                        [15] => f7
                                                [b] => Array
                                                        [0] => a8
                                                        [1] => c8
                                                        ...
                                                        [14] => f6
                                [attack] => stdClass Object
                                        [w] => Array
                                                [0] => d7
                                                [1] => e8
                                                [2] => f6
                                                [3] => f8
                                                [4] => g7
                                        [b] => Array
                                                [0] => e4
                                                [1] => f7
                                [space] => stdClass Object
                                        [w] => Array
                                                [0] => a3
                                                [1] => a6
                                                ...
                                        [b] => Array
                                                [0] => a3
                                                [1] => a5
                                                ...
                               */



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


/*
$player = new Player($game_pgnString);
$player->play()->getBoard();

$game_pgnString = $game->game_pgnString();
          echo '<pre>$game->game_pgnString()='; print_r($game_pgnString) ; echo '</pre>';
$history = $game->history();
          echo '<pre>$history='; print_r($history) ; echo '</pre>';
*/


    function filenameData()
    {
        $data = [];
        for ($ii = 1; $ii <= 99; ++$ii) {
            $ii <= 9 ? $data[] = ["0$ii.pgn"] : $data[] = ["$ii.pgn"];
        }

        return $data;
    }




function XXXpgnString2arr($game_pgnString)
    {
      //r eturns  a r r a y = c ompact('h eader', 'm oves') :
      //PGN = Portable Games Notation (like XML)
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
                         echo __METHOD__ .' SAYS: ';
                         echo '<p>$allmoves_str='. $allmoves_str .'</p>';
                         echo '<pre>$movesTmp='; print_r($movesTmp) .'</pre>';

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
                              + Quantifier — Matches BETWEEN ONE AND UNLIMITED TIMES eg 1
                              
                              \. matches the character . literally (case sensitive) eg '.'
                              
                              \s? matches any whitespace character (equal to [\r\n\t\f\v ])
                              
                              ? Quantifier — Matches BETWEEN ZERO AND ONE TIMES, as many times as possible
                              */
                if ( !in_array($moveTmp, ['', '*', '1-0', '1/2-1/2', '0-1']) ) {
                    $moves[] = $moveTmp;
                }
            } endforeach ;
                         //echo __METHOD__ .' SAYS: '.'<pre>$hlp='; print_r($hlp) .'</pre>';


          return compact('header', 'moves', 'hlp');

    } //e n d  f n  pgnString 2 arr($game_ pgnString)





  function board_html(object $game, object $squares_used) //was ascii  $help_2moves=''
  {
    //$s = ''; //'<hr /><hr />';
    $wh='width="35" height="32"'; // square width, hight
                        //echo __METHOD__ .' SAYS: '.'<pre>$help_2moves='; print_r($help_2moves); echo  '</pre>';
    ///////////////////////////////////////////////////////
    // 1. Top hdr a, b, c...
    //////////////////////////////////////////////////////
    //ob_start(); ?>
    <table width="270px" cellspacing="0px" cellpadding="0px" border="1px">
    <!-- a,b,c... = first row top -->
    <tr height="10px" align=center bgcolor=#D3D3D3>
       <td></td><td>a</td><td>b</td><td>c</td><td>d</td>
       <td>e</td><td>f</td><td>g</td><td>h</td><td></td>
    </tr><?php
    //$fmtedtxt = ob_get_contents();
    //ob_end_clean(); //ob_ end_flush(), ob_ get_flush()...
    //$s .= $fmtedtxt ;




    ///////////////////////////////////////////////////////
    // 2. Displ. 8 rows
    //////////////////////////////////////////////////////
    // All 64 squares from row 8 black king row (rank)  white=FFFFFF, D3D3D3
    $cols = ['', 'a','b','c','d','e','f','g','h'] ;
                    echo basename(__FILE__)  .', line '. __LINE__ .', fn '. __METHOD__ .'(object $game, object $squares_used)  SAYS : '.'<pre>$squares_used='; print_r($squares_used) .'</pre>';
    for ($ii = 1; $ii <= 8; ++$ii)       // r o w s
    { ?>
      <tr height="10px" align=center>
        <td align=center width=20px bgcolor=#D3D3D3><?=9 - $ii?></td><?php
      for ($jj = 1; $jj <= 8; ++$jj)     // c o l u m n s
      { 
          // *************** EMPTY SQUARES : *********
        ?><td align=center width=20px bgcolor=<?php

          if ( $ii%2===0 ) {        // r o w s  8,6...
             if ( $jj%2===0 ) { echo '#FFFFFF' ; } else { echo '#D3D3D3' ; } 
          } else {                  // r o w s  7,5...
             if ( $jj%2===0 ) { echo '#D3D3D3' ; } else { echo '#FFFFFF' ; } 
          }
          echo '>'; 

          $square = $cols[$jj] . (9 - $ii) ; //eg e4
          //echo $square ; //echo (9 - $ii) .'.'. $jj ;
          // *************** NON EMPTY SQUARES : *********
          // ======= WHITE PIECES ON NON EMPTY SQUARES : =======
            if ( 
               in_array($square, $squares_used->w) or
               in_array($square, $squares_used->b) 
            )
            { 
              //Get piece by its position on board eg e4 = $cols[$jj] . (9 - $ii)
               $piece_obj = $game->piece($square) ; //= stdClass Object ( [color] => w  [identity] => P  [position] => e4   [moves] => Array ( )    ) 
               $color = $piece_obj->color ;
              //         i m a g e  t a g :
              $it1 = '<img src="../img/';
              if ($color === 'w') {
                switch (strtolower($piece_obj->identity)) {
                  case ('p'): $it=$it1.'0_pawn.png" alt="0_pawn.png" '.$wh.'>'; break;
                  case ('r'): $it=$it1.'0_rook.png" alt="0_rook.png" '.$wh.'>'; break ;
                  case ('n'): $it=$it1.'0_knight.png" alt="0_knight.png" '.$wh.'>'; break ;
                  case ('b'): $it=$it1.'0_bishop.png" alt="0_bishop.png" '.$wh.'>'; break ;
                  case ('k'): $it=$it1.'0_king.png" alt="0_king.png" '.$wh.'>'; break ;
                  case ('q'): $it=$it1.'0_queen.png" alt="0_queen.png" '.$wh.'>'; break ;
                  //default: $it='w?'; break;
                  default: $it=$piece_obj->identity; break;
                }
              } else {
                  switch (strtolower($piece_obj->identity)) {
                    case ('p'): $it=$it1.'1_pawn.png" alt="1_pawn.png" '.$wh.'>'; break ;
                    case ('r'): $it=$it1.'1_rook.png" alt="1_rook.png" '.$wh.'>'; break ;
                    case ('n'): $it=$it1.'1_knight.png" alt="1_knight.png" '.$wh.'>'; break ;
                    case ('b'): $it=$it1.'1_bishop.png" alt="1_bishop.png" '.$wh.'>'; break ;
                    case ('k'): $it=$it1.'1_king.png" alt="1_king.png" '.$wh.'>'; break ;
                    case ('q'): $it=$it1.'1_queen.png" alt="1_queen.png" '.$wh.'>'; break ;
                    default: $it='b?'; break;
                  }
              }
              //<!--img src="../img/0_pawn.png" alt="0_pawn.png" <=$wh> -->
              echo $it ;
            ?>

          </td>
        <?php
            }
      }
      ?>
      <td align=center width=20px bgcolor=#D3D3D3><?=9 - $ii?></td>
      </tr><?php
    }



    ///////////////////////////////////////////////////////
    // 3. ftr a, b, c...
    //////////////////////////////////////////////////////
      //ob_start(); ?>
        <!-- a,b,c... = last row bottom -->
        <tr height="10px" align=center bgcolor=#D3D3D3>
           <td></td><td>a</td><td>b</td><td>c</td><td>d</td>
           <td>e</td><td>f</td><td>g</td><td>h</td><td></td>
        </tr>
        </table>
        <?php
        //$fmtedtxt = ob_get_contents();
      //ob_end_clean(); //ob_ end_flush(), ob_ get_flush()...
      //$s .= $fmtedtxt ;


      ///////$s .= '</table>' ;


      //$s .= $help_2moves .'<br /><br />' ;


      //return $s;
  } //e n d  f n  a s c i i
