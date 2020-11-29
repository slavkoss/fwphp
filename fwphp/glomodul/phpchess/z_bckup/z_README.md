### https://github.com/ryanhs/chess.php  one class Chess.php 2019.08.26
Doc : https://ryanhs.github.io/chess.php/
See https://github.com/Noxalus/PHP-Chess  
   Big : https://github.com/phpchess/phpchess  

chess.php is a PHP chess library that is used for basically everything but the AI :
1. chess move generation/validation
2. piece placement/movement
3. check/checkmate/stalemate detection

NOTE: this is a port of [chess.js](https://github.com/jhlywa/chess.js) for php  

[![Latest Stable Version](https://poser.pugx.org/ryanhs/chess.php/v/stable)](https://packagist.org/packages/ryanhs/chess.php)
[![Build Status](https://travis-ci.org/ryanhs/chess.php.svg?branch=master)](https://travis-ci.org/ryanhs/chess.php)
[![MIT License](https://poser.pugx.org/ryanhs/chess.php/license)](https://packagist.org/packages/ryanhs/chess.php)  

## Installation

use composer with `composer require ryanhs/chess.php`   
or put in your composer.json  
```
"require": {
  "ryanhs/chess.php": "^1.0"
}
```
if you doesn't know composer, its a really usefull tools in php for package management,   
try to learn composer [here](https://getcomposer.org/doc/00-intro.md)


## Coding Style camelCase
about coding style, naming system..
because this is a PHP, i try to stick to use PHP-PSR, like game_over() become gameOver()  

just keep in mind, any function name transformed into camelCase


## BUGS

-

## TODO

-

## MAINTAINER/COLLABORATOR NEEDED

As this project **not** in heavy development state, a maintainer/collaborator needed.  
If you interested to become a collaborator, please tell me. :-)

## Chess.js
you can check original chess.js [here]( https://github.com/jhlywa/chess.js )  
User Interface
By design, chess.js is headless and does not include user interface. Many developers have had success integrating chess.js with the chessboard.js library. See an example :
https://chessboardjs.com/examples#5002  

```js
//JAVASCRIPT  
// NOTE: this example uses the chess.js library:
// https://github.com/jhlywa/chess.js

var board = null
var game = new Chess()

function makeRandomMove () {
  var possibleMoves = game.moves()

  // exit if the game is over
  if (game.game_over()) return

  var randomIdx = Math.floor(Math.random() * possibleMoves.length)
  game.move(possibleMoves[randomIdx])
  board.position(game.fen())

  window.setTimeout(makeRandomMove, 500)
}

board = Chessboard('myBoard', 'start')

window.setTimeout(makeRandomMove, 500)


HTML
<div id="myBoard" style="width: 400px"></div>
```


## Example Code
The code below plays a complete game of chess ... RANDOMLY.

```php
<?php

require 'vendor/autoload.php';
use \Ryanhs\Chess\Chess;

$chess = new Chess();
while (!$chess->gameOver()) {
  $moves = $chess->moves();
  $move = $moves[mt_rand(0, count($moves) - 1)];
  $chess->move($move);
}

//Returns a string containing an ASCII diagram of the current position :
echo $chess->ascii() . PHP_EOL;
```

## Chess.php DOCUMENTATION (API)
you can check it here: [https://ryanhs.github.io/chess.php](https://ryanhs.github.io/chess.php)

### Forsyth–Edwards Notation (FEN)
https://en.wikipedia.org/wiki/Forsyth%E2%80%93Edwards_Notation
FEN is a standard notation for describing a particular board position of a chess game. The purpose of FEN is to provide all the necessary information to restart a game from a particular position.

A text file with only FEN data records should have the file extension ".fen".  

FEN record - 6 fields separated by space :  

1. Piece placement (from White's perspective). Each rank is described, starting with rank 8 and ending with rank 1; within each rank, the contents of each square are described from file "a" through file "h". Following the Standard Algebraic Notation (SAN), each piece is identified by a single letter taken from the standard English names (pawn = "P", knight = "N", bishop = "B", rook = "R", queen = "Q" and king = "K"). White pieces are designated using upper-case letters ("PNBRQK") while black pieces use lowercase ("pnbrqk"). Empty squares are noted using digits 1 through 8 (the number of empty squares), and "/" separates ranks.

2. Active color. "w" means White moves next, "b" means Black moves next.

3. Castling availability. If neither side can castle, this is "-". Otherwise, this has one or more letters:  
"K"=White can castle kingside, "Q"=White can castle queenside, "k"=Black can castle kingside, and/or "q" (Black can castle queenside). A move that temporarily prevents castling does not negate this notation.

4. En passant target square in algebraic notation. If there's no en passant target square, this is "-". If a pawn has just made a two-square move, this is the position "behind" the pawn. This is recorded regardless of whether there is a pawn in position to make an en passant capture.[6]

5. Halfmove clock: This is the number of halfmoves since the last capture or pawn advance. The reason for this field is that the value is used in the fifty-move rule.[7]

6. Fullmove number: The number of the full move. It starts at 1, and is incremented after Black's move.

FEN FOR STARTING POSITION :
        1=rows (files)                      2  3   4 5 6=Fullmove_number  
 B row 1  B row 2...      W row 7  W row 8  2=Color of next move  
                                               3=Castling availability K,Q for W, k,q for B  
rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1  

After 1. e4:  
rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1  
  
After 1. ... c5:  
rnbqkbnr/pp1ppppp/8/2p5/4P3/8/PPPP1PPP/RNBQKBNR w KQkq c6 0 2  
  
And then after 2. Nf3:  
rnbqkbnr/pp1ppppp/8/2p5/4P3/5N2/PPPP1PPP/RNBQKB1R b KQkq - 1 2  

