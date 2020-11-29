<?php
//      C O N T R O L L E R  AND  G A M E  M E T H O D S
namespace ChessMVC;


use ChessMVC\Move;
//use ChessMVC\Tag;
use ChessMVC\Cleaner;
use ChessMVC\Mdl;

class Ctr {
 private object $mdl;
 private object $cleaner;
 
 //private array $gamePgnString = [];
 private array $moves_str_arr = [];
 private array $moves_obj = []; 
 private object $gameTags ;
 private string $pgnHdrStr = '';
 private string $movesText = '';
 private string $movesTextWithComments = '';
 private $gameResult;

 function __construct() {
  $this->mdl     = new Mdl();
  $this->cleaner = new Cleaner();
 }

 public function parsePgn($gamePgnString){
  //$this->gamePgnString = $gamePgnString;
               echo '<h2>'. __METHOD__ .' SAYS: ' .'</h2>';
               echo '<b>parse SAYS 1: $gamePgnString=</b>'.'<pre>'; print_r($gamePgnString) ; echo '</pre>';

  $hdr_moves_arr = $this->mdl->pgnHdr($gamePgnString) ;
  $this->pgnHdrStr = $hdr_moves_arr['hdr_str']; //extract
               echo '<b>parse SAYS 2: $this->pgnHdrStr</b>'; echo '<pre>'; print_r($this->pgnHdrStr) ; echo '</pre>'; //|||||
  if (!$this->pgnHdrStr) { echo '<h3>***ERROR SAYS 2: NOT ($this->pgnHdrStr)</h3>' ; }
  else {
    $this->creTagsObj();
                         echo '<b>parse SAYS 3: $this->getTag(\'EVENT\')=</b>'.'<pre>'; print_r($this->getTag('EVENT')) ; echo '</pre>';


    $pgnMovesStr = $hdr_moves_arr['moves_str']; //extract
               echo '<b>parse SAYS 4: $pgnMovesStr=</b>'; echo '<pre>'; print_r($pgnMovesStr) ; echo '</pre>'; //|||||

    $this->movesText = $this->cleaner->clearMoveStr($pgnMovesStr);
                 echo '<b>parse SAYS 4: $this->movesText=</b>'.'<pre>'; print_r($this->movesText) ; echo '</pre>';

    $this->movesTextWithComments = $this->cleaner->clearMoveStr($pgnMovesStr, $comments = true);
                 echo '<b>parse SAYS 5: $this->movesTextWithComments=</b>'.'<pre>'; print_r($this->movesTextWithComments) ; echo '</pre>';
     
    $this->moves_str_arr = explode(' ', $this->movesText) ;
                                     //$this->createSimpleMovesArray();
                 echo '<b>parse SAYS 6: $this->moves_str_arrmoves_str_arr[0])=</b>'.'<pre>'; print_r($this->moves_str_arr) ; echo '</pre>'; // Array( [0] => e4  [1] => e5...
    $this->CreMovesObj();
                 echo '<b>parse SAYS 7: $this->moves_obj[18]=</b>'.'<pre>'; print_r($this->moves_obj) ; echo '</pre>';
                    /*Array (
                          [1] => Array (
                                  [0] => ChessMVC\Move Object (
                                          [san:ChessMVC\Move:private] => e4
                                          [moveNumber:ChessMVC\Move:private] => 1
                                          [moveColor:ChessMVC\Move:private] => W
                                          [comment:ChessMVC\Move:private] => 
                                      )
                                  [1] => ChessMVC\Move Object (
                                          [san:ChessMVC\Move:private] => e5
                                          [moveNumber:ChessMVC\Move:private] => 1
                                          [moveColor:ChessMVC\Move:private] => B
                                          [comment:ChessMVC\Move:private] => 
                                      )
                           )
                          [2] => Array (... */
  }
 }


  private function creTagsObj() { 
               echo '<h3>'. __METHOD__ .' SAYS here is created private object $gameTags' .'</h3>';
                  //$hdrElemArr = explode( PHP_EOL, $this->pgnHdrStr );
                  //$hdrElemArr = explode( "\n", $this->pgnHdrStr );
    $hdrElemArr = explode( '<br />', $this->pgnHdrStr );
    $hdrElemArr = $this->cleaner->removeEmptyArrayElements($hdrElemArr);
    $hdrElemArr = $this->cleaner->trimArrayElements($hdrElemArr);
                         //echo '<b>cretags SAYS 1: $hdrElemArr=</b><pre>'; print_r($hdrElemArr) ; echo '</pre>';

    $hdrTagsArr = [] ;
    if ($hdrElemArr) {
      for ($i=0; $i < sizeof($hdrElemArr); $i++):
      { 
        $tagKey   = strtoupper($this->mdl->tagKey($hdrElemArr[$i]));
        $tagValue = $this->mdl->tagValue($hdrElemArr[$i]);

        $tag = (object)['tag'=>$hdrElemArr[$i], 'key'=>$tagKey, 'value'=>$tagValue] ;
                         /*stdClass Object(
                          [tag] => [Event "London"]
                          [key] => EVENT
                          [value] => London ) */
        //or $tag = new Tag($hdrElemArr[$i], $tagKey, $tagValue);
                         //echo '<b>cretags SAYS 2: $tag=</b><pre>'; print_r($tag) ; echo '</pre>';
                         /*ChessMVC\Tag Object (
                            [tag:ChessMVC\Tag:private] => [Event "London"]
                            [key:ChessMVC\Tag:private] => EVENT
                            [value:ChessMVC\Tag:private] => London ) */
        $hdrTagsArr[$tagKey] = $tag;
      } endfor ;
      $this->gameTags = (object)$hdrTagsArr;
    }
                         //echo '<b>cretags SAYS 2: $this->gameTags=</b><pre>'; print_r($this->gameTags) ; echo '</pre>';
  }


 //private f unction createSimpleMovesArray() {
 // $this->moves_str_arr = explode(' ', $this->movesText);
 //}
 private function CreMovesObj() {
  $stringMovesWithComment = explode(' ', $this->movesTextWithComments); 

  if ($stringMovesWithComment) {
   $moveCounter = 1;
   $lastColor = 'B';

   for ($i = 0; $i < sizeof($stringMovesWithComment); $i++) {
    $comment = false;
                $currentMove = $stringMovesWithComment[$i];

                if ($i == sizeof($stringMovesWithComment) - 1) {
                    $gameResult = Move::staticCheckIfGameResult($currentMove);

                    if ($gameResult) {
                        $this->setGameResult($gameResult);
                    }
                }

                if (isset($stringMovesWithComment[$i+1])){
                    $nextMove = $stringMovesWithComment[$i+1];
                    $comment = $this->mdl->comment($nextMove);
                }

    $isComment = $this->mdl->comment($currentMove);

    if ($isComment) {
        continue;
                }

    //white
    if ($lastColor == 'B') {
     $move = new Move($stringMovesWithComment[$i], $moveCounter, $comment, 'W');

     $this->moves_obj[$moveCounter][] = $move;
     $lastColor = 'W';
    }
    //black
    else
    {
     $move = new Move($stringMovesWithComment[$i], $moveCounter, $comment, 'B');
     $this->moves_obj[$moveCounter][] = $move;

                    $lastColor = 'B';
     $moveCounter++;
    }
   }
  }
 }

    public function creJsonArr() {
        $jsonArray = [];
             /* 
               //$this->getTag('EVENT')
               $this->gameTags=stdClass Object (
                  [EVENT] => stdClass Object (
                          [tag] => [Event "London"]
                          [key] => EVENT
                          [value] => London ) */
        foreach ($this->gameTags as $tagkey => $tagval) {
            $jsonArray['tags'][$tagkey] = $tagval;
            //$jsonArray['tags'][$tag->getKey()] = $tag->getValue();
        }

        foreach ($this->moves_obj as $move) {
            if ((isset($move[0])) ? $moveWhite = $move[0]->getSan() : $moveWhite = NULL);
            if ((isset($move[1])) ? $moveBlack = $move[1]->getSan() : $moveBlack = NULL);

            $jsonArray['moves'][] = [
                'moveNumber' => $move[0]->getMoveNumber(),
                'white' => $moveWhite,
                'black' => $moveBlack,
            ];
        }

        return json_encode($jsonArray, JSON_PRETTY_PRINT);
    }



  // ***************************************************
  //    *****  function S E T  -  G E T  *****
  // ***************************************************
 public function getTag($tagKey) {
  if (!isset($this->gameTags->$tagKey)){
   throw new \Exception("Non existent tag name", 1);
  }
                         //echo '<b>gettag SAYS : $this->gameTags=</b><pre>'; print_r($this->gameTags) ; echo '</pre>';
                         /* stdClass Object (
                              [EVENT] => stdClass Object (
                                      [tag] => [Event "London"]
                                      [key] => EVENT
                                      [value] => London )
                              [SITE] => stdClass Object... */
  return $this->gameTags->$tagKey->value ; //->getValue()
 }



 public function getMove($moveNumber, $color = 'W') {
  if ($color == 'W') {$index = 0;} else {$index = 1;}

  if (!isset($this->moves_obj[$moveNumber])) {
   throw new Exception("Non existent move number", 1);
  }

  return $this->moves_obj[$moveNumber][$index];
 }


 public function getFirstMove($color = 'W') {
  if ($color == 'W') {$index = 0;} else {$index = 1;}

  if (!isset($this->moves_obj[1][$index])){
   throw new \Exception("Non existent move number", 1);
  }

  return $this->moves_obj[1][$index]->getSan();
 }


 public function getLastMove($color = 'W') {
  if ($color == 'W') {$index = 0;} else {$index = 1;}

  if (!isset($this->moves_obj[sizeof($this->moves_obj)][$index])) {
   throw new \Exception("Non existent move number", 1);
  }

  return $this->moves_obj[sizeof($this->moves_obj)][$index]->getSan();
 }


 public function getSimpleMovesArray() {
  return $this->moves_str_arr;
 }

 public function getmoves_obj() {
  return $this->moves_obj;
 }


    public function getMovesString() {
        return $this->movesText;
    }


    public function getpgnHdrString() {
        return $this->pgnHdrStr;
    }


    /**
     * @return mixed
     */
    public function getGameResult()
    {
        return $this->gameResult;
    }


    /**
     * @param mixed $g ameResult
     */
    public function setGameResult($gameResult)
    {
        $this->gameResult = $gameResult;
    }



}