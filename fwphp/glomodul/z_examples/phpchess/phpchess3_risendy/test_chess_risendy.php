<?php
// https://github.com/amyboyd/pgn-parser
//https://github.com/DHTMLGoodies/chessParser

namespace ChessMVC;  //like AmyBoyd\PgnParser

include 'Move.php' ;
//include 'z_Tag.php' ; //other way: entity containing attr. : tag, key, value. See getTag()
include 'Cleaner.php' ;
include 'Mdl.php' ;
include 'Ctr.php' ;

$gamePgnString1 = '
[Event "London"]
[Site "London ENG"]
[Date "1851.06.21"]
[EventDate "?"]
[Round "?"]
[Result "1-0"]
[White "Adolf Anderssen"]
[Black "Lionel Adalbert Bagration Felix Kieseritzky"]
[ECO "C33"]
[WhiteElo "?"]
[BlackElo "?"]
[PlyCount "45"]

1.e4 e5 2.f4 exf4 3.Bc4 Qh4+ 4.Kf1 b5 5.Bxb5 Nf6 6.Nf3 Qh6 
7.d3 Nh5 8.Nh4 Qg5 9.Nf5 c6 10.g4 Nf6 11.Rg1 cxb5 12.h4 Qg6
13.h5 Qg5 14.Qf3 Ng8 15.Bxf4 Qf6 16.Nc3 Bc5 17.Nd5 Qxb2
18.Bd6 {18.Bd6?! was not a good move, when 18. d4! is winning, just like 18. Be3! or 18. Re1!}
   Bxg1 {It is from this move that Blacks defeat stems. Wilhelm
Steinitz 1879 suggested : 18... Qxa1+; likely moves to follow are 19. Ke2 Qb2 20. Kd2 Bxg1.
Reuben Fine 1952 suggested : "If here, e.g. 18. . . . QxRa1+; 19. Ke2, QxRg1; then 20. Nxg7+, Kd8; 21. Bc7#."
in "The Middle Game in Chess" reprint 1972, at 20}
19. e5 Qxa1+ 20. Ke2 Na6 21.Nxg7+ Kd8 22.Qf6+ Nxf6 23.Be7#
{Very strange game ! Kieseritzky sure showed his limitation by going for piece-grabs. Kieseritzky had a plus score v Anderssen ! https://www.chessgames.com/perl/chessgame?gid=1018910 See https://lichess.org/study/NT0Qzi5p/3IX6FElR#0 }
1-0'; 

$gamePgnString2 = '
[event "#1 Chess: 2715 Problems, Combinations, and Games"]
[site "Collection 1994"]
[date "1994.??.??"]
[eventdate "?"]
[round "-"]
[white "WHITE MATES IN 1"]
[black "Mate in one White to move"]
[whiteelo "?"]
[blackelo "?"]
[fen "3q1rk1/5pbp/5Qp1/8/8/2B5/5PPP/6K1 w - - 0 1"]
[result "1-0"]
[index "0"]
[eco "?"]
[plycount "1"]
[ts "1486251250322"]

1. Qxg7#
'; //  {too easy} 1-0

echo '<h2>1. $ctr = new Ctr(); $ctr->parsePgn($gamePgnString1); </h2>';
$ctr = new Ctr();
$ctr->parsePgn($gamePgnString1);


/*
getTag($tagKey) {
getMove($moveNumber, $color = 'W') {
getFirstMove($color = 'W') {
getLastMove($color = 'W') {

getSimpleMovesArray() {
getmoves_obj() {

getMovesString() {
getpgnHdrString() {

getGameResult()
setGameResult($gameResult)
*/
//echo '<h2>1. Util class methods</h2>';
//$moves_string = $ctr->getMovesString(); //eg string(15) "e4 e6 d4 d5 0-1"
//                  echo 'ln '. __LINE__ .' SAYS: $moves_string='.'<pre>'. $moves_string .'</pre>';

$jsonarr = json_decode($ctr->creJsonArr()) ;
                    echo '<b>ln '. __LINE__ .' SAYS 1: $jsonarr->tags->EVENT (->tag, key, value)=</b><pre>'; print_r($jsonarr->tags->EVENT) ; echo '</pre>';
                    echo '<b>ln '. __LINE__ .' SAYS 1: $jsonarr->moves[1]=</b><pre>'; print_r($jsonarr->moves[1]) ; echo '</pre>';



