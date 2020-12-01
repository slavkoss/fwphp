<?php
// 34 fns
namespace AmyBoyd\PgnParser;

class GameSetGet
{
  /**
   * Filename of PGN txtDB (contains more games) this game came from.
   */
  protected $PgnFle_Name;
  protected $pgn;
  /**
   * All moves concatenated, with 2move numbers removed. Example: "e4 e5 f4 exf4".
   */
  protected $moves;
  protected $movesCount;
  protected $event;
  protected $site;
  /**
   * Format not guaranteed.
   */
  protected $date;
  protected $round;
  protected $white;
  protected $black;
  protected $result;
  protected $whiteElo;
  protected $blackElo;
  /**
   * Opening E C O code.
   */
  protected $eco;
  protected $opening;

  protected $annotator;



  /**
   * Set moves
   * @param string $moves
   */
  public function setMoves($moves)
  {
    $moves = trim($moves);

    $this->moves = $moves;
    $this->movesCount = count(explode(' ', $moves));
  }

    /**
     * Get moves
     * @return string
     */
  public function getMoves()
  {
             //echo '<h3>$this->moves='; print_r($this->moves); echo  '</h3>';
    return $this->moves;
  }

  public function getMovesArray()
  {
             //echo '<pre>movesarr=$gameo->get Moves Array()'; print_r(explode(' ', $this->moves)); echo  '</pre>';
    return explode(' ', $this->moves);
  }






  public function setMovesCount($movesCount)
  {
    $this->movesCount = $movesCount;
  }

  public function getMovesCount()
  {
    return $this->movesCount;
  }


  /**
   * Set f romPgnDBse (file name).
   * @param string $f romPgnDBse
   */
  public function setPgnFleName($PgnFle_Name)
  {
    $this->PgnFle_Name = $PgnFle_Name;
  }

  /**
   * Get f romPgnDBse
   * @return string File name.
   */
  public function getPgnFleName()
  {
    return $this->PgnFle_Name; // get Pgn fle_ path  was get From Pgn DB()
  }


    /**
     * Set event
     * @param string $event
     */
  public function setEvent($event)
  {
    if ($event === '?' || $event === '') {
      $this->event = null;
    } else {
      $event = Util::foreignLettersToEnglishLetters($event);
      $event = Util::titleCaseIfCurrentlyAllCaps($event);
      $this->event = $event === '?' ? null : $event;
    }
  }

    /**
     * Get event
     * @return string
     */
  public function getEvent()
  {
    return $this->event;
  }

    /**
     * Set site
     * @param string $site
     */
  public function setSite($site)
  {
    if ($site === '?' || $site === '') {
      $this->site = null;
    } elseif (strlen(preg_replace('/[^a-zA-Z]/', '', $site) < 2)) {
      // Some sites have been non-letter gibberish.
      $this->site = null;
    } else {
      $site = Util::foreignLettersToEnglishLetters($site);
      $site = Util::titleCaseIfCurrentlyAllCaps($site);
      $this->site = $site;
    }
  }

    /**
     * Get site
     * @return string
     */
  public function getSite()
  {
    return $this->site;
  }

    /**
     * Set date
     * @param string $date
     */
  public function setDate($date)
  {
    $this->date = $date;
  }

    /**
     * Get date
     * @return string
     */
  public function getDate()
  {
    return $this->date;
  }

    /**
     * Get year.
     * @return int
     */
  public function getYear()
  {
    if (strlen($this->date) >= 4) {
      $year = substr($this->date, 0, 4);
      $year = str_replace('?', '', $year);

      return ($year ? (int) $year : null);
    }

    return null;
  }

    /**
     * Get the date formatted smartly.
     * @return string
     */
  public function getDatePrettyPrint()
  {
    $date = str_replace('?', '', $this->date);
    $date = explode('.', $date);
    $date = array_filter($date);

    if (count($date) == 2 || count($date) == 3) {
      $month = date('F', mktime(0, 0, 0, $date[1], 1));
      $date = "$month, $date[0]";
    } elseif (count($date) == 1) {
      $date = $date[0];
    } else {
      $date = null;
    }

    return $date;
  }

    /**
     * Get the event and site concatenated smartly.
     * @return string
     */
  public function getEventSitePrettyPrint()
  {
    $eventSite = null;
    if ($this->event && $this->site) {
      if (strpos($this->event, $this->site) !== false) {
        // Event contains site.
        $eventSite = $this->event;
      } else {
        $eventSite = "$this->event, in $this->site";
      }
    } elseif ($this->event) {
      $eventSite = $this->event;
    } elseif ($this->site) {
      $eventSite = $this->site;
    }

    return $eventSite;
    }

  public function getEventSiteDatePrettyPrint()
  {
    $eventSite = $this->getEventSitePrettyPrint();
    $date = $this->getDatePrettyPrint();

    if ($eventSite && $date) {
        return "$eventSite, $date";
    } elseif ($eventSite) {
        return $eventSite;
    } elseif ($date) {
        return $date;
    } else {
        return null;
    }
  }

  /**
   * Set round
   * @param string $round
   */
  public function setRound($round)
  {
    $this->round = $round === '?' ? null : $round;
  }

  /**
   * Get round
   * @return string
   */
  public function getRound()
  {
    return $this->round;
  }

  /**
   * Set white
   * @param string $white
   */
  public function setWhite($white)
  {
    $this->white = Util::normalizePlayerName($white);
  }

  /**
   * Get white
   * @return string
   */
  public function getWhite()
  {
    return $this->white;
  }

  /**
   * Set black
   * @param string $black
   */
  public function setBlack($black)
  {
    $this->black = Util::normalizePlayerName($black);
  }

  /**
   * Get black
   * @return string
   */
  public function getBlack()
  {
    return $this->black;
  }

  /**
   * Set result
   * @param string $result
   */
  public function setResult($result)
  {
    $this->result = ($result === '?' ? null : $result);
  }

  /**
   * Get result
   * @return string
   */
  public function getResult()
  {
    return $this->result;
  }

  /**
   * Set whiteElo
   * @param string $whiteElo
   */
  public function setWhiteElo($whiteElo)
  {
    $this->whiteElo = $whiteElo === '?' ? null : $whiteElo;
  }

  /**
   * Get whiteElo
   * @return string
   */
  public function getWhiteElo()
  {
    return $this->whiteElo;
  }

  /**
   * Set blackElo
   * @param string $blackElo
   */
  public function setBlackElo($blackElo)
  {
    $this->blackElo = $blackElo === '?' ? null : $blackElo;
  }

  /**
   * Get blackElo
   * @return string
   */
  public function getBlackElo()
  {
    return $this->blackElo;
  }

  /**
   * Set  e c o
   * @param string  $ e c o
   */
  public function setEco($eco)
  {
    $this->eco = $eco === '?' ? null : $eco;
  }

  public function setOpening($opening)
  {
    $this->opening = $opening === '?' ? null : $opening;
  }

  public function setAnnotator($annotator)
  {
    $this->annotator = $annotator === '?' ? null : $annotator;
  }

  /**
   * Get e c o
   * @return string
   */
  public function getEco()
  {
    return $this->eco;
  }

  public function getOpening()
  {
    return $this->opening;
  }

  public function getAnnotator()
  {
    return $this->annotator;
  }

  /**
   * Set p g n
   * @param string $ p g n
   */
  public function setPgn($pgn)
  {
    $this->pgn = nl2br(trim($pgn)) ;
  }

  /**
   * Get p g n
   * @return string
   */
  public function getPgn()
  {
    return $this->pgn;
  }




  public function toJSON()
  {
    $keys = array('pgn', 'moves', 'movesCount', 'site', 'event',
        'date', 'round', 'white', 'black', 'result', 'whiteElo',
        'blackElo', 'eco');
    $toExport = array();
    foreach ($keys as $key) {
      $toExport[$key] = $this->{$key};
    }

    return json_encode($toExport, JSON_PRETTY_PRINT);
  }
}



/*
  J:\awww\www\fwphp\glomodul\phpchess\p_Game.php (34 hits)
51:   p ublic f unction setMoves($moves)    63:   p ublic f unction getMoves()
                                            68:   p ublic f unction g etMovesArray()
77:   p ublic f unction setEvent($event)    92:   p ublic f unction getEvent()
101:  p ublic f unction setSite($site)     119:  p ublic f unction getSite()
128:  p ublic f unction setDate($date)     137:  p ublic f unction getDate()
                                           146:  p ublic f unction getYear()
                                           162:  p ublic f unction getDatePrettyPrint()
                                           184:  p ublic f unction getEventSitePrettyPrint()
                                           203:  p ublic f unction getEventSiteDatePrettyPrint()
223:  p ublic f unction setRound($round)   232:  p ublic f unction getRound()
241:  p ublic f unction setWhite($white)   250:  p ublic f unction getWhite()
259:  p ublic f unction setBlack($black)   268:  p ublic f unction getBlack()
277:  p ublic f unction setResult($result)         286:  p ublic f unction getResult()
295:  p ublic f unction setWhiteElo($whiteElo)     304:  p ublic f unction getWhiteElo()
313:  p ublic f unction setBlackElo($blackElo)     322:  p ublic f unction getBlackElo()
331:  p ublic f unction setEco($eco)               340:  p ublic f unction getEco()
349:  p ublic f unction setPgn($pgn)               358:  p ublic f unction g etPgn()

368:  p ublic f unction setMovesCount($movesCount) 363:  p ublic f unction getMovesCount()
377:  p ublic f unction set From Pgn DB($f romPgnDBse) 386:  p ublic f unction get From Pgn DB()

391:  p ublic f unction toJSON()
*/