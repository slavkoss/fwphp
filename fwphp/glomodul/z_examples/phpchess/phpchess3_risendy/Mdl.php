<?php
//extract pgnHdr($gamePgnString), tagKey($tag), tagValue($tag), MovesTxt($pgnHdrStr, $pgn)
//        comment($nextMove)
namespace ChessMVC;

// https://regex101.com/
class Mdl
{

  //const HEADER_REGEX = '/^(\[((?:\r?\n)|.)*\])(?:\r?\n){2}/'; //NOT WORKING
  //const HEADER_REGEX   = '/\[([\w]+)\s+\"([\s\S]*)\"\]/'; // \r?\n=CRLF (optional CR - Linux)
      /*WORKS so :
        $matches=Array
        (
            [0] => [Event "London"] //ok   $matches[0] is whole ok
        [Site "London ENG"]         //ok
        [Date "1851.06.21"]         //ok
        ...                         //ok
        [PlyCount "45"]             //ok
            [1] => Event     //error
            [2] => London"]  //error
        [Site "London ENG"]  //not visible because of 2 errors above
        ...
        */
  const HEADER_KEY_REGEX = '/^\[([A-Z][A-Za-z]*)\s.*\]$/';
  const HEADER_VALUE_REGEX = '/^\[[A-Za-z]+\s"(.*)"\]$/';
  const COMMENTS_REGEX = '/(\{[^}]+\})+?/';
  const MOVE_VARIATIONS_REGEX = '/(\([^\(\)]+\))+?/';
  const MOVE_NUMBER_REGEX = '/\d+\.(\.\.)?/';
  const MOVE_INDICATOR_REGEX = '/\.\.\./';
  const ANNOTATION_GLYPHS_REGEX = '/\$\d+/';
  const MULTIPLE_SPACES_REGEX = '/\s+/';

  function __construct() {

  }


  // *************************************************
  //        1. E X T R A C T  FROM .pgn FILE
  // *************************************************
  public function pgnHdr($gamePgnString)
  {
                   echo '<h2>'. __METHOD__ .' SAYS: here are created hdr_str, moves_str</h2>';
    //Returns master (tags) of game_ pgn String
    $pgnHdrStr = '' ;
    $pgnMovesStr = $gamePgnString ;
    $game_pgnArr = explode('<br />', nl2br($gamePgnString)) ;
                      //echo '<b>ehdr SAYS 1: $game_pgnArr=</b>'.'<pre>'; print_r($game_pgnArr) ; echo '</pre>';
    foreach ($game_pgnArr as $line):
    {
      $line2 = trim($line) ; // why is here '1' ?
                      //echo '<pre>extract hdr $line2='; print_r($line2) ; echo '</pre>';
      if (substr($line2,0,1) === '[') { $pgnHdrStr .= $line2 .'<br />' ; }

      $pgnMovesStr = str_replace($line, '', $pgnMovesStr); 

    } endforeach ;
                      //echo '<b>mdl extract hdr SAYS 1: $pgnHdrStr=</b><pre>'; print_r($pgnHdrStr) ; echo '</pre>';
                      //echo '<b>mdl extract hdr SAYS 1: $pgnMovesStr=</b><pre>'; print_r($pgnMovesStr) ; echo '</pre>';

    return ['hdr_str' => $pgnHdrStr, 'moves_str' => trim($pgnMovesStr)] ;
  }



  public function tagKey($tag) {
    // const HEADER_KEY_REGEX = '/^\[([A-Z][A-Za-z]*)\s.*\]$/';
    preg_match(self::HEADER_KEY_REGEX, $tag, $matchesKey);
  
    if (!$matchesKey) return false;

    return $matchesKey[1];
  }

  public function tagValue($tag) {
    preg_match(self::HEADER_VALUE_REGEX, $tag, $matchesValue);
  
    if (!$matchesValue) return false;

    return $matchesValue[1];
  }



  //public function MovesTxt($pgnHdrStr, $pgn) {
  //  return str_replace($pgnHdrStr, '', $pgn);
  //}



  public function comment($nextMove) {
    $regex =  preg_match(self::COMMENTS_REGEX, $nextMove, $matches);

    if ($matches) {
     return preg_replace(['/{/', '/}/'], '', $matches[1]);
    }

    return false;
  }
}





  // *************************************************
  //        2. 
  // *************************************************



  /*public f unction PgnHdr_original($pgn)
  { 
    //was extractTagsRegex
                  echo '<h2>'. __METHOD__ .' SAYS 1: preg_match $header_arr[0] is ok, 1 and 2 are not' .'</h2>';
                  //echo '<pre>$pgn='; print_r($pgn); echo '</pre>';
    $regex =  preg_match(self::HEADER_REGEX, $pgn, $header_arr);
                  echo 'SAYS 2: <pre>$header_arr='; print_r($header_arr); echo '</pre>';
    if (!$header_arr) return '0'; //false;
    return $header_arr[0]; //    return $header_arr[1];
  } */





/*
 const HEADER_KEY_REGEX   = '/^\[([A-Z][A-Za-z]*)\s.*\]$/';
 const HEADER_VALUE_REGEX = '/^\[[A-Za-z]+\s"(.*)"\]$/';

 const COMMENTS_REGEX = '/(\{[^}]+\})+?/';

 const MOVE_VARIATIONS_REGEX = '/(\([^\(\)]+\))+?/';

 const MOVE_NUMBER_REGEX = '/\d+\.(\.\.)?/';

 const MOVE_INDICATOR_REGEX = '/\.\.\./';

 const ANNOTATION_GLYPHS_REGEX = '/\$\d+/';

 const MULTIPLE_SPACES_REGEX = '/\s+/';
*/



/*public f unction PgnHdrMOJ($gamePgnString)
  {

      $header_arr = [] ;
      $pgnHdrStr = '' ;
      //$moves  = [];

        ///////////////////////////////////////////////////////
        // 1. separate lines : $pgn_ string  to  a r r a y
        //////////////////////////////////////////////////////
        //$game_pgnArr = str_replace("\r", '<br />', $gamePgnString);
        //                      //while (strpos($game_pgnArr, "\n\n") !== false) {
        //                         //$game_pgnArr = str_replace("\n\n", '<br />', $game_pgnArr);
        //                      //}
        //$game_pgnArr = str_replace("\n", '<br />', $game_pgnArr);
        //$game_pgnArr = explode('<br />', $game_pgnArr);
        //
        //$game_pgnArr = explode('<br />', nl2br($gamePgnString)) ;
        //                 //echo __METHOD__ .' SAYS: '.'<pre>$game_pgnArr='; print_r($game_pgnArr) ; echo '</pre>';


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
            $pos = strrpos($line, '[');
            if (!($pos === false)) //if (substr($line,1,1) == '[')
            {
              // there is '[' in  l i n e :
              $lntmp = rtrim(ltrim($line,'['),']') ;
                               //$lntmp = explode(' ', $lntmp);
              $lntmp = explode('"', $lntmp);
                               //$lntmp[0] = '"'. $lntmp[0] .'"';
              $lntmp[1] = str_replace('"','', $lntmp[1]);
                             //echo __METHOD__ .' SAYS: '.'<pre>$lntmp='; print_r($lntmp) ; echo '</pre>';
              $header_arr[ trim($lntmp[0]) ] = trim($lntmp[1]) ;
              $pgnHdrStr .= trim($lntmp[1]).'<br />' ;
              continue;
            } else {
              //if ($line) {$parseHeader = false;} else {continue;}
              $parseHeader = false;
            }
          } 
      return $pgnHdrStr ;
      //return $header_arr ;
    } endforeach ;
                        // WAS: $regex =  preg_match(self::HEADER_REGEX, $gamePgnString, $matches);
                        //if (!$matches) return false;
                        //return $matches[1];
                        // FAIL BEFORE N IN LONDON (https://regex101.com/) :
                        // /^(\[((?:\r?\n)|.)*\])(?:\r?\n){2}/
                        //[Event "London"]?
                        //[Site "London ENG"]
  }
*/

                              //$line = trim($line);
                              //if (!$line) { continue ; } //skip empty ln
                              ///if (substr($line,0,1) !== '[') { break ; }