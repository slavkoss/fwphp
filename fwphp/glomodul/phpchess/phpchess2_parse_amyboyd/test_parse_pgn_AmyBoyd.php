<?php
//J:\awww\www\fwphp\glomodul\phpchess\z_chess_parse_amyboyd\test_parse_pgn_AmyBoyd.php

// https://github.com/amyboyd/pgn-parser
//https://github.com/DHTMLGoodies/chessParser

namespace AmyBoyd\PgnParser;  //or use AmyBoyd\PgnParser as pgnp;

$ds = DIRECTORY_SEPARATOR ;
$QS = '?' ;

include 'PgnParser.php' ;
include 'GameSetGet.php' ;
include 'Util.php' ;


     $wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
              // 2. URL_DOM AIN = dev1:8083 :
            . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

      $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;
      $uri_arr = explode($QS, $REQUEST_URI) ; 
      $module_relpath = dirname(rtrim(ltrim($uri_arr[0],'/'),'/'));
      $module_url = $wsroot_url.$module_relpath.'/';

  $url = dirname($module_url) ;
  $gameidx = 0 ; // >0 is not finished
  //not finished : $pgnfle1=$url.'...1961_Koblenz_theory_and_practice_from_chess.pgn';
  //$pgnfiles = [ $pgnfle1 => 12 ]; //__DIR__

echo '<pre>$uri_arr='; print_r($uri_arr) ; echo '</pre>';
echo '<h4>$module_url='.$module_url.'</h4>';



echo '<h1>1. PgnParser class methods</h1>';
  $pgnfle1=$url.'/games/1851_anderssen_kieseritzky_London.pgn' ;
  //$pgnfle1=$url.'/games/book_1961_Koblenz_theory_practice/1858_Morphy_konzult_Paris.pgn' ;
  //$pgnfle1=$url.'/games/book_1961_Koblenz_theory_practice/1937_Keres_Book_Kemeri.pgn' ;



    $parser = new PgnParser($pgnfle1);
    $gameo  = $parser->currentGame ; // game object

    $game   = $parser->getGame($gameidx); //may be more games in Pgn Fle_ Name file
    $moves = $gameo->getMoves() ;

    $MovesArray = $gameo->getMovesArray() ; // = explode(' ', $moves);
    $CommentsArray = $parser->getCommentsArray() ; // = explode(' ', $moves);

echo '<h3>'. __FILE__ .', line '. __LINE__ .' SAYS : </h3>'; 
echo '<pre>$game=$parser->getGame(0)='; print_r($game); echo  '</pre>';



echo "<h1>Document - meta-data - document row columns - fields</h1>";

echo '$gameo->getPgnFleName()='; print_r($gameo->getPgnFleName());
echo '<br />$gameo->getEvent()='; print_r($gameo->getEvent());
echo '<br />$gameo->getSite()='; print_r($gameo->getSite());
echo '<br />$gameo->getEventSitePrettyPrint()='; print_r($gameo->getEventSitePrettyPrint());
echo '<br />$gameo->getDate()='; print_r($gameo->getDate());
echo '<br />$gameo->getYear()='; print_r($gameo->getYear());
echo '<br />$gameo->getDatePrettyPrint()='; print_r($gameo->getDatePrettyPrint());
echo '<br />$gameo->getEventSiteDatePrettyPrint()='; print_r($gameo->getEventSiteDatePrettyPrint());

echo '<br />$gameo->getRound()='; print_r($gameo->getRound());
echo '<br />$gameo->getWhite()='; print_r($gameo->getWhite());
echo '<br />$gameo->getBlack()='; print_r($gameo->getBlack());
echo '<br />$gameo->getResult()='; print_r($gameo->getResult());
echo '<br />$gameo->getWhiteElo()='; print_r($gameo->getWhiteElo());
echo '<br />$gameo->getBlackElo()='; print_r($gameo->getBlackElo());
echo '<br />$gameo->getEco()='; print_r($gameo->getEco());
echo '<br />$gameo->getOpening()='; print_r($gameo->getOpening());
echo '<br />$gameo->getAnnotator()='; print_r($gameo->getAnnotator());
echo '<br />' ;
echo '<br />$gameo->getPgn()='; print_r($gameo->getPgn());
echo '<br />' ;
echo '<br />$gameo->toJSON()=<pre>'; print_r($gameo->toJSON()); echo  '</pre>';
echo '<br />' ;
echo '<br />$gameo->getMovesCount()='; print_r($gameo->getMovesCount());




echo "<h1>Items - moves & annotations - comments, variants</h1>";

echo '<pre>$gameo->getMovesArray()='; print_r($MovesArray); echo  '</pre>';
echo '<pre>$parser->getCommentsArray()='; print_r($CommentsArray); echo  '</pre>';






echo '<h1>&nbsp;</h1>';
echo '<h1>2. Util class methods</h1>';

echo '<p>1. Š ù ´ ß Æ foreignLettersToEnglishLetters are : '. Util::foreignLettersToEnglishLetters('Š ù ´ ß Æ') .'</p>';
            //or echo pgnp\Util::foreignLettersToEnglishLetters('Š ù ´ ß Æ') ;



echo '<br /><p>2.1 Util::titleCaseIfCurrentlyAllCaps(\'Asss DFG\')  is : '. Util::titleCaseIfCurrentlyAllCaps('Asss DFG') .'</p>' ;

echo '<p>2.2 Util::titleCaseIfCurrentlyAllCaps(\'HELLO THERE\')  is : '. Util::titleCaseIfCurrentlyAllCaps('HELLO THERE') .'</p>' ;

echo '<p>2.3 Util::titleCaseIfCurrentlyAllCaps(\'KE$HA\')  is : '. Util::titleCaseIfCurrentlyAllCaps('KE$HA') .'</p>' ;



echo '<br /><p>3.1 Util::normalizePlayerName(\'?\')  is : '. Util::normalizePlayerName('?') .'</p>' ;
echo '<p>3.2 Util::normalizePlayerName(\'ANONYMOUS\')  is : '. Util::normalizePlayerName('ANONYMOUS') .'</p>' ;
echo '<p>3.3 Util::normalizePlayerName(\'Šaaa b.. ùaaa\')  is : '. Util::normalizePlayerName('Šaaa b.. ùaaa') .'</p>' ;
echo '<p>3.4 Util::normalizePlayerName(\'GARRY KASPAROV\')  is : '. Util::normalizePlayerName('GARRY KASPAROV') .'</p>' ;







echo '<br /><hr />' ;