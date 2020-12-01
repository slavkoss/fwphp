## PGN Chess

[![Latest Stable Version](https://poser.pugx.org/programarivm/pgn-chess/v/stable)](https://packagist.org/packages/programarivm/pgn-chess)
[![Build Status](https://travis-ci.org/programarivm/pgn-chess.svg?branch=master)](https://travis-ci.org/programarivm/pgn-chess)
[![Total Downloads](https://poser.pugx.org/programarivm/pgn-chess/downloads)](https://packagist.org/packages/programarivm/pgn-chess)
[![License: GPL v3](https://img.shields.io/badge/License-GPL%20v3-blue.svg)](https://www.gnu.org/licenses/gpl-3.0)

<p align="center">
  <img src="https://github.com/programarivm/pgn-chess/blob/master/resources/chess-board.jpg" />
</p>

Chess board representation to play chess games.

> See it in action at [PGN Chess Server](https://github.com/programarivm/pgn-chess-server), which is a WebSocket server listening to chess commands. Also, [PGN Chess Data](https://github.com/programarivm/pgn-chess-data) is another repo providing you with CLI tools to manage a database of PGN games as well as to train a supervised learning model with [Rubix ML](https://rubixml.com/).

### Install

Via composer:

    $ composer require programarivm/pgn-chess

### Instantiation

Just instantiate a game and play PGN moves:

```php
use PGNChess\Game;

$game = new Game;

$isLegalMove = $game->play('w', 'e4');
```
The call to the `$game->play` method returns `true` or `false` depending on whether or not a chess move can be run on the board.

### Game methods

#### `isCheck()`

Finds out if the game is in check.

```php
$isCheck = $game->isCheck();
```

#### `isMate()`

Finds out if the game is over.

```php
$isMate = $game->isMate();
```

#### `status()`

Gets the current game's status.

    $status = $game->status();

`$status` is a PHP object containing useful information about the game being played.

| Property       | Description                                |
|----------------|--------------------------------------------|
| `turn`         | The current player's turn                  |
| `squares`      | Free/used squares on the board             |
| `attack`       | Squares being attacked by both players     |
| `space`        | Squares being controlled by both players   |
| `castling`     | The castling status of the two kings       |

The following sequence of moves:

```php
$game = new Game;

$game->play('w', 'd4');
$game->play('b', 'c6');
$game->play('w', 'Bf4');
$game->play('b', 'd5');
$game->play('w', 'Nc3');
$game->play('b', 'Nf6');
$game->play('w', 'Bxb8');
$game->play('b', 'Rxb8');

$status = $game->status();
```

Will generate a `$status` object which properties are accessed this way:

```php
// current turn
$game->status()->turn;

// used/free squares
$game->status()->squares->used;
$game->status()->squares->free;

// squares being attacked by both players
$game->status()->attack;

// squares being controlled by both players
$game->status()->space;

// castling status of both players
$game->status()->castling;
```

#### `piece()`

Gets a piece by its position on the board.

    $piece = $game->piece('c8');

`$piece` is a PHP object containing information about the chess piece selected:

| Property       | Description                                |
|----------------|--------------------------------------------|
| `color`        | The piece's color in PGN format            |
| `identity`     | The piece's identity in PGN format         |
| `position`     | The piece's position on the board          |
| `moves`        | The piece's possible moves                 |

The following code:

```php
$game = new Game;

$piece = $game->piece('b8');
```

Will generate a `$piece` object which properties are accessed this way:

```php
$piece->color;
$piece->identity;
$piece->position;
$piece->moves;
```

#### `pieces()`

Gets the pieces on the board by color.

    $blackPieces = $game->pieces('b');

`$blackPieces` is an array of PHP objects containing information about black pieces.

| Property       | Description                                |
|----------------|--------------------------------------------|
| `identity`     | The piece's identity in PGN format         |
| `position`     | The piece's position on the board          |
| `moves`        | The piece's possible moves                 |

The following code:

```php
$game = new Game;

$blackPieces = $game->pieces('b');
```

Will generate a `$blackPieces` array of objects which properties are accessed this way:

```php
$blackPieces[1]->identity;
$blackPieces[1]->position;
$blackPieces[1]->moves;
```
#### `history()`

Gets the game's history in the form of an array of `stdClass` objects.

    $history = $game->history();

#### `movetext()`

Gets the game's movetext in text format.

    $movetext = $game->movetext();

#### `captures()`

Gets the pieces captured by both players as an array of `stdClass` objects.

    $captures = $game->captures();

### Usage

For further details please look at the [unit tests](https://github.com/programarivm/pgn-chess/tree/master/tests).

### Development

Should you want to play around with the development environment follow the steps below.

Bootstrap the environment:

  bash/dev/start.sh

Run the tests:

  docker exec -it pgn_chess_php_fpm vendor/bin/phpunit --configuration phpunit-docker.xml

### License

The GNU General Public License.

### Contributions

Would you help make this library better? Contributions are welcome.

- Feel free to send a pull request
- Drop an email at info@programarivm.com with the subject "PGN Chess Contributions"
- Leave me a comment on [Twitter](https://twitter.com/programarivm)

Many thanks.
