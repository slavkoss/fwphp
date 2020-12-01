<?php
// 10 fns
namespace AmyBoyd\PgnParser;

class PgnParser
{
  private $filePath;  // Absolute path, e.g. "/path/to/games.pgn".
  private $fileName; // If "filePath" is "/path/to/games.pgn", this is "games.pgn".

  private $games;
  private $comments;
  private $variants;

  private $multiLineAnnotationDepth = 0;
  public $currentGame;  //was private $currentGame;



  /**
   * @param string $filePath The absolute or relative path to a file. Must not be a directory.
   */
  public function __construct($filePath)
  {
    $this->filePath = $filePath;
    $this->fileName = basename($filePath);
    $this->parse();
  }

  /**
   * @return Game[] All of the games from the file.
   */
  public function getGames()
  {
    return $this->games;
  }

  /**
   * @return Game
   */
  public function getGame($index)
  {
    return $this->games[$index];
  }

  public function setCommentsArray($cmnt)
  {
    $this->comments[] = $cmnt ; //str_replace($result,'', $line)
  }

  public function getCommentsArray()
  {
    return $this->comments;
  }

  /**
   * @return int How many games were in the file.
   */
  public function countGames()
  {
    return count($this->games);
  }



  //               P R I V A T E  F N S
  private function createCurrentGame()
  {
    $this->currentGame = new GameSetGet(); //fns in Game.php are accessible
    //assign DB (.pgn file) name $this->PgnFle_Name = $this->fileName; :
    $this->currentGame->setPgnFleName($this->fileName); 
    $this->multiLineAnnotationDepth = 0;
  }

  private function parse()
  {
    $handle = fopen($this->filePath, "r");

    $this->createCurrentGame();

    $pgnBuffer = null;
    $haveMoves = false;
    while (($line = fgets($handle, 4096)) !== false) 
    {
      // When reading files line-by-line, there is a \n at the end, so remove it.
      $line = trim($line);
      if (empty($line)) {
        continue;
      }

      if (strpos($line, '[') === 0 && $this->multiLineAnnotationDepth === 0) {
        // Starts with [ so must be meta-data - document row columns - fields.
        // If already have meta-data AND m oves, then we are now at the end of a game's
        // m oves and this is the start of a new game.
        if ($haveMoves) {
            $this->completeCurrentGame($pgnBuffer);
            $this->createCurrentGame();
            $haveMoves = false;
            $pgnBuffer = null;
        }

        $this->addMetaData($line);
        $pgnBuffer .= $line . "\n";
      } else {
        // This is a line of m oves.
        $this->addMoves($line);
        $haveMoves = true;
        $pgnBuffer .= "\n" . $line;
      }
    }
                       //echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS :   $this->currentGame->getMoves() : </h3>'.'<pre>'; print_r($this->currentGame->getMoves()); echo  '</pre>'; 

    $this->completeCurrentGame($pgnBuffer);

    fclose($handle);
  }



  /**
   * @param string $line "[Date "1953.??.??"]"
   * called from parse()
   */
  private function addMetaData($line)
  {
    if (strpos($line, ' ') === false) {
      throw new \Exception("Invalid metadata: " . $line);
    }
                    //echo '<h3>'. __METHOD__ .', line '. __LINE__ .' SAYS : </h3>'; 
                    //echo '<pre>$line='; print_r($line); echo  '</pre>';
    //If limit is set and positive, returned array will contain maximum of limit elements with last element containing rest of string. 
    //If the limit parameter is negative, all componentsexcept the last -limit are returned. 
    //If the limit parameter is zero, then this is treated as 1. 
    list($key, $val) = explode(' ', $line, 2); // 2 is limit
    $key = strtolower(trim($key, '['));
    $val = trim($val, '"]');

    switch ($key) {
      case 'event':
        $this->currentGame->setEvent($val);
        break;
      case 'site':
        $this->currentGame->setSite($val);
        break;
      case 'date':
      case 'eventdate':
        if (!$this->currentGame->getDate()) {
            $this->currentGame->setDate($val);
        }
        break;
      case 'round':
        $this->currentGame->setRound($val);
        break;
      case 'white':
        $this->currentGame->setWhite($val);
        break;
      case 'black':
        $this->currentGame->setBlack($val);
        break;
      case 'whiteelo':
        $this->currentGame->setWhiteElo($val);
        break;
      case 'blackelo':
        $this->currentGame->setBlackElo($val);
        break;
      case 'result':
        $this->currentGame->setResult($val);
        break;
      case 'eco':
        $this->currentGame->setEco($val);
        break;
      case 'opening':
        $this->currentGame->setOpening($val);
        break;
      case 'annotator':
        $this->currentGame->setAnnotator($val);
        break;
      case 'plycount':
        $this->currentGame->setMovesCount($val);
        break;
      default:
        // Ignore others
        break;
    }
  }



  private function removeAnnotations($line)
  {
    $result  = null;
    $comment = null;
    //str_split=Conv string->arr: str_split( string $string[, int $split_length = 1] ) : array
    foreach (str_split($line) as $char) {
      if ($char === '{' || $char === '(') {
        $this->multiLineAnnotationDepth++;
      }

      if ($this->multiLineAnnotationDepth === 0) { $result .= $char;
      } else { $comment .= $char; }

      if ($char === '}' || $char === ')') {
        $this->multiLineAnnotationDepth--;
      }
    }


    $this->setCommentsArray($comment);
                      //echo __METHOD__ .', line '. __LINE__ .' SAYS : called from addMoves() '; echo '<pre>$line='; print_r($line); echo  '</pre>'; echo '<pre>$result='; print_r($result); echo '</pre>'; 
    return $result;
  }

  /**
   * @param string $line "Qe7 22. Nhg4 Nxg4 23. Nxg4 Na5 24. b3 Nc6"
   */
  private function addMoves($line)
  {
    $line = $this->removeAnnotations($line);

    // Remove the move numbers, so "1. e4 e5 2. f4" becomes "e4 e5 f4"
    $line = preg_replace('/\d+\./m', '', $line);
                        /*     /\d+\./gm
                        \d+ matches a digit (equal to [0-9])
                        + Quantifier - Matches 1 or more times preceding token
                        \. matches char "." (case sensitive)
                        Global pattern flags
                        g modifier: global. All matches (dont return after first match)
                        m modifier: multi line. Causes ^ and $ to match the begin/end of each line (not only begin/end of string) */

    // Remove the result (1-0, 1/2-1/2, 0-1, \$1) from the end of the line, if there is one.
    $line = preg_replace('/(1-0|0-1|1\/2-1\/2|\*)$/', '', $line);

    // If black's move is after an annotation, it is formatted as: "annotation } 17...h5".
    // Remove those dots (one is already gone after removing "17." earlier.
    $line = str_replace('..', '', $line);

    $line = preg_replace('/\$[0-9]+/', '', $line);
    $line = preg_replace('/\([^\(\)]+\)/', '', $line);

    // And finally remove excess white-space.
    $line = trim(preg_replace('/\s{2,}/', ' ', $line));

                      //echo __METHOD__ .', line '. __LINE__ .' SAYS : called from parse() (if no m oves it is line of comment) : '.'<pre>'; print_r($line); echo  '</pre>'; 

    $this->currentGame->setMoves(
      $this->currentGame->getMoves() ? $this->currentGame->getMoves() . " " . $line : $line
    );

  }

  private function completeCurrentGame($pgn)
  {
    $this->currentGame->setPgn($pgn);
    $this->games[] = $this->currentGame;
    $this->multiLineAnnotationDepth = 0;
  }


}

/*
  J:\awww\www\fwphp\glomodul\phpchess\p_PgnParser.php (10 hits)
34:   p ublic  f unction _ _construct($filePath)
44:   p ublic  f unction g etGames()       return $this->games;
52:   p ublic  f unction g etGame($index)  return $this->games[$index];
60:   p ublic  f unction c ountGames()     return count($this->games);

// assign $this->c urrentGame :
65:   p rivate f unction c reateCurrentGame()  //called from  p a r s e()
72:   p rivate f unction p arse()              //called from  __construct($filePath)

112:  p rivate f unction r emoveA nnotations($line)
133:  p rivate f unction a ddMetaData($line)
189:  p rivate f unction a ddMoves($line)
212:  p rivate f unction c ompleteCurrentGame($pgn)
*/