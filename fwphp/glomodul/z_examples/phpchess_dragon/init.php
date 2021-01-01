<?php
//http://sspc2:8083/fwphp/glomodul/z_examples/phpchess/dragonchess/?
// rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1
//http://sspc2:8083/fwphp/glomodul/z_examples/phpchess_dragon/?move=rnbqkbnr%2Fpppppppp%2F8%2F8%2F4P3%2F8%2FPPPP1PPP%2FRNBQKBNR+b+KQkq+e3+0+1
// rnbqkbnr%2Fpppppppp%2F8%2F8%2F4P3%2F8%2FPPPP1PPP%2FRNBQKBNR+b+KQkq+e3+0+1

//https://github.com/RedDragonWebDesign/php-chess  2020.11.17

$time = microtime();
$time = explode(' ', $time);
$time = $time[1] + $time[0];
$start = $time;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once('helpers/helper_functions.php');
require_once('models/ChessRulebook.php');
require_once('models/ChessBoard.php');
require_once('models/ChessPiece.php');
require_once('models/ChessMove.php');
require_once('models/ChessSquare.php');

$board = new ChessBoard();