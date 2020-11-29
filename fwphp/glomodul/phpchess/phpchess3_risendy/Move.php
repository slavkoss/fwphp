<?php
namespace ChessMVC;

class Move {
    const WHITE_WIN = '1-0';
    const BlACK_WIN = '0-1';
    const DRAW = '0-0';
    const POSSIBLE_RESULTS = ['1-0', '0-1', '1/2-1/2', '*'];

 private $san;
 private $moveNumber;
 private $moveColor;
 private $comment;

 function __construct($san, $moveNumber, $comment, $moveColor) {
  $this->san = $san;
  $this->moveNumber = $moveNumber;
  $this->comment = $comment;
  $this->moveColor = $moveColor;
 }

 public static function staticCheckIfGameResult($san) {
        if ($key = array_search($san, self::POSSIBLE_RESULTS)){
            return self::POSSIBLE_RESULTS[$key];
        }

        return false;
    }

 public function getSan() {
  return $this->san;
 }

 public function getComment() {
  return $this->comment;
 }

    /**
     * @return mixed
     */
    public function getMoveNumber()
    {
        return $this->moveNumber;
    }
}