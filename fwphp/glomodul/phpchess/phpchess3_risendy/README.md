## Table of contents
* [General info](#general-info)
* [Features](#features)
* [Installation](#installation)
* [Usage](#usage)
* [Tests](#tests)

## General info
Simple pgn chess notation parser written in PHP. 
PGN should be in string format, default tags delimiter is newline. There should be at least one blank line between tags and moves because it is used to process the pgn string.

## Features
* extracting moves in string/json/array/object array formats
* getting specific moves (black or white)
* getting specific move comment
* getting first/last move
* extracting tags in string format
* getting tags value by name

## Installation
```
composer require risendy/pgn-parser
```




## Usage
To parse pgn string:
```
$ctr = new Ctr();
$ctr->parsePgn($pgn);
```
To get moves in string format:
```
$moves = $ctr->getMovesString();

result: string(15) "e4 e6 d4 d5 0-1"
```

To get moves in json format:
```
$json = $ctr->creJsonArr();

result:
{
   "tags":{
      "Event":"Lets Play!",
      "Site":"Chess.com",
      "Date":"2018.12.04",
      "Round":"?",
      "White":"guilherme_1910",
      "Black":"bmbio",
      "Result":"0-1",
      "TimeControl":"1\/259200:0"
   },
   "moves":[
      {
         "moveNumber":1,
         "white":"e4",
         "black":"e6"
      },
      {
         "moveNumber":2,
         "white":"d4",
         "black":null
      }
   ]
}
```

To get moves in array format:
```
$moves = $ctr->getSimpleMovesArray();

result:
array(5) {
  [0]=>
  string(2) "e4"
  [1]=>
  string(2) "e6"
  [2]=>
  string(2) "d4"
  [3]=>
  string(2) "d5"
  [4]=>
  string(3) "0-1"
}
```
To get moves in object array format:
```
$moves = $ctr->getmoves_obj();

result:
array(3) {
  [1]=>
  array(2) {
    [0]=>
    object(ChessMVC\Move)#22 (3) {
      ["move":"ChessMVC\Move":private]=>
      string(2) "e4"
      ["moveNumber":"ChessMVC\Move":private]=>
      int(1)
      ["moveColor":"ChessMVC\Move":private]=>
      string(1) "W"
    }
    [1]=>
    object(ChessMVC\Move)#23 (3) {
      ["move":"ChessMVC\Move":private]=>
      string(2) "e6"
      ["moveNumber":"ChessMVC\Move":private]=>
      int(1)
      ["moveColor":"ChessMVC\Move":private]=>
      string(1) "B"
    }
  }
  [2]=>
  array(2) {
    [0]=>
    object(ChessMVC\Move)#24 (3) {
      ["move":"ChessMVC\Move":private]=>
      string(2) "d4"
      ["moveNumber":"ChessMVC\Move":private]=>
      int(2)
      ["moveColor":"ChessMVC\Move":private]=>
      string(1) "W"
    }
    [1]=>
    object(ChessMVC\Move)#25 (3) {
      ["move":"ChessMVC\Move":private]=>
      string(2) "d5"
      ["moveNumber":"ChessMVC\Move":private]=>
      int(2)
      ["moveColor":"ChessMVC\Move":private]=>
      string(1) "B"
    }
  }
  [3]=>
  array(1) {
    [0]=>
    object(ChessMVC\Move)#26 (3) {
      ["move":"ChessMVC\Move":private]=>
      string(3) "0-1"
      ["moveNumber":"ChessMVC\Move":private]=>
      int(3)
      ["moveColor":"ChessMVC\Move":private]=>
      string(1) "W"
    }
  }
}
```
To get specific move instance:
```
$move = $ctr->getMove(2, 'B');

result:
object(ChessMVC\Move)#75 (4) {
["san":"ChessMVC\Move":private]=>
string(2) "d4"
["moveNumber":"ChessMVC\Move":private]=>
int(2)
["moveColor":"ChessMVC\Move":private]=>
string(1) "W"
["comment":"ChessMVC\Move":private]=>
string(4) "test"
```
To get specific move san:
```
$move = $ctr->getMove(2, 'B')->getSan();

result:
string(2) "d5"
```
To get specific move comment:
```
$move = $ctr->getMove(2, 'B')->getComment();

result:
string(4) "test"
```
To get tag value by name:
```
$tagValue = $ctr->getTag('Black');

result:
string(5) "bmbio"
```

## Tests
If you want to run tests use:
```
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/ChessMVCTest
```
