<?php

//require_once(__DIR__."/../autoload.php");
function autoloader($classname) { include $classname . '.php'; }
spl_autoload_register('autoloader');





echo '<h2>1. Create FEN (game position) programatically using FenParser0x88 class</h2>' ;

$parser = new FenParser0x88();
$parser->newGame();
$parser->move("g1f3");
$notation =  $parser->getNotation(); // returns Nf3
$fen = $parser->getFen();
echo '<h3>from move("g1f3") FEN is : ';  echo '</h3>'; print_r($fen);
// $fen = rnbqkbnr/pppppppp/8/8/8/5N2/PPPPPPPP/RNBQKB1R b KQkq - 1 1



echo '<h2>2. Get valid moves from FEN</h2>' ;

$parser = new FenParser0x88('6k1/6p1/4n3/8/8/8/B7/6K1 b - - 0 1');
$validBlackMoves = $parser->getValidMovesBoardCoordinates("black");
             //echo json_encode($validBlackMoves);
echo 'FEN=6k1/6p1/4n3/8/8/8/B7/6K1 b - - 0 1 and $validBlackMoves=<pre>'; print_r($validBlackMoves); echo '</pre>'; 







echo '<h2>3. Import games from PGN file</h2>' ;
//$parser = new PgnParser('arrowtest.pgn');
$parser = new PgnParser('1858_Morphy_consultants_Paris.pgn');
      //echo json_encode($parser->getParsedGames(false));
$pgn_arr =$parser->getParsedGames(false) ;
echo '<h3>'. __FILE__ .' SAYS: '.' line='. __LINE__ .'</h3>'; 
echo '$pgn_arr=<pre>'; print_r($pgn_arr); echo '</pre>';
/*
$pgn_arr=

Array
(
    [0] => Array
        (
            [metadata] => Array
                (
                    [opening] => Philidor defense
                    [castle] => 1
                )

            [event] => G0001 Koblenz or Koblencs School chess game 1961
            [site] => opera house in Paris, during Bellini's opera Norma or Barber of Seville
            [date] => 1858.??.??
            [round] => ?
            [white] => Morphy
            [black] => konsultants (alleati) - two strong amateurs: the German noble Karl II, Duke of Brunswick and the French aristocrat Comte Isouard de Vauvenargues.
            [result] => 1-0
            [eco] => C41
            [annotator] => pag. 4  https://kupdf.net/download/koblenz-a-sahovsko-umijece_58fb4daedc0d60c562959ebb_pdf#
            [plycount] => 33
            [fen] => rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1
            [moves] => Array
                (
                    [0] => Array
                        (
                            [m] => e4
                            [from] => e2
                            [to] => e4
                            [fen] => rnbqkbnr/pppppppp/8/8/4P3/8/PPPP1PPP/RNBQKBNR b KQkq e3 0 1
                        )

                    [1] => Array
                        (
                            [m] => e5
                            [comment] => Example of positional play to prepare combinations in "Romantic Era" games: 

     
    rapid development 
    center control 
    open verticals and diagonals 
    value of sacrifices in mating combinations... 


                            [from] => e7
                            [to] => e5
                            [fen] => rnbqkbnr/pppp1ppp/8/4p3/4P3/8/PPPP1PPP/RNBQKBNR w KQkq e6 0 2
                        )

                    [2] => Array
                        (
                            [m] => Nf3
                            [from] => g1
                            [to] => f3
                            [fen] => rnbqkbnr/pppp1ppp/8/4p3/4P3/5N2/PPPP1PPP/RNBQKB1R b KQkq - 1 2
                        )

                    [3] => Array
                        (
                            [m] => d6
                            [comment] => d6 is Philidor's Defence, named after Francois-Andre Danican Philidor, the leading chess master of the second half of the 18th century (100 years before Morphy) and a pioneer of modern chess strategy. He was also a noted opera composer. It is a solid opening, but slightly passive, and it ignores the important d4-square. Most modern players prefer 2...Nc6, and 2...Nf6 - Petrov Defence.
                            [from] => d7
                            [to] => d6
                            [fen] => rnbqkbnr/ppp2ppp/3p4/4p3/4P3/5N2/PPPP1PPP/RNBQKB1R w KQkq - 0 3
                        )

                    [4] => Array
                        (
                            [m] => d4
                            [from] => d2
                            [to] => d4
                            [fen] => rnbqkbnr/ppp2ppp/3p4/4p3/3PP3/5N2/PPP2PPP/RNBQKB1R b KQkq d3 0 3
                        )

                    [5] => Array
                        (
                            [m] => Bg4
                            [comment] => 3...Bg4 is considered an inferior move today, this was accepted theory at the time.[1] Today 3...exd4 or 3...Nf6 are usual. Philidor's original idea, 3...f5, is a risky alternative.
                            [from] => c8
                            [to] => g4
                            [fen] => rn1qkbnr/ppp2ppp/3p4/4p3/3PP1b1/5N2/PPP2PPP/RNBQKB1R w KQkq - 1 4
                        )

                    [6] => Array
                        (
                            [m] => dxe5
                            [from] => d4
                            [to] => e5
                            [fen] => rn1qkbnr/ppp2ppp/3p4/4P3/4P1b1/5N2/PPP2PPP/RNBQKB1R b KQkq - 0 4
                        )

                    [7] => Array
                        (
                            [m] => Bxf3
                            [comment] => If 4...dxe5, then 5.Qxd8+ Kxd8 6.Nxe5 and White wins a pawn and Black has lost the ability to castle. Black, however, did have the option of 4...Nd7 5.exd6 Bxd6, when he is down a pawn but has some compensation in the form of better development.
                            [from] => g4
                            [to] => f3
                            [fen] => rn1qkbnr/ppp2ppp/3p4/4P3/4P3/5b2/PPP2PPP/RNBQKB1R w KQkq - 0 5
                        )

                    [8] => Array
                        (
                            [m] => Qxf3
                            [comment] => Steinitz's recommendation 5.gxf3 dxe5 6.Qxd8+ Kxd8 7.f4 is also good, but Morphy prefers to keep the queens on. After Black recaptures the pawn on e5, White has a significant lead in development.
                            [from] => d1
                            [to] => f3
                            [fen] => rn1qkbnr/ppp2ppp/3p4/4P3/4P3/5Q2/PPP2PPP/RNB1KB1R b KQkq - 0 5
                        )

                    [9] => Array
                        (
                            [m] => dxe5
                            [from] => d6
                            [to] => e5
                            [fen] => rn1qkbnr/ppp2ppp/8/4p3/4P3/5Q2/PPP2PPP/RNB1KB1R w KQkq - 0 6
                        )

                    [10] => Array
                        (
                            [m] => Bc4
                            [from] => f1
                            [to] => c4
                            [fen] => rn1qkbnr/ppp2ppp/8/4p3/2B1P3/5Q2/PPP2PPP/RNB1K2R b KQkq - 1 6
                        )

                    [11] => Array
                        (
                            [m] => Nf6
                            [comment] => This seemingly sound developing move runs into a surprising refutation. After White's next move, both f7 and b7 will be under attack. Better would have been to directly protect the f7-pawn with the queen, making White's next move less potent.
                            [from] => g8
                            [to] => f6
                            [fen] => rn1qkb1r/ppp2ppp/5n2/4p3/2B1P3/5Q2/PPP2PPP/RNB1K2R w KQkq - 2 7
                        )

                    [12] => Array
                        (
                            [m] => Qb3
                            [from] => f3
                            [to] => b3
                            [fen] => rn1qkb1r/ppp2ppp/5n2/4p3/2B1P3/1Q6/PPP2PPP/RNB1K2R b KQkq - 3 7
                        )

                    [13] => Array
                        (
                            [m] => Qe7
                            [comment] => Black's only good move. White was threatening mate in two moves, for example 7...Nc6 8.Bxf7+ Ke7 (or Kd7) 9.Qe6#. 7...Qd7 loses the rook to 8.Qxb7 followed by 9.Qxa8 (since 8...Qc6? would lose the queen to 9.Bb5). Notice that 7...Qe7 saves the rook with this combination: 8.Qxb7 Qb4+ forcing a queen exchange. Although this move prevents immediate disaster, Black is forced to block the f8-bishop, impeding development and kingside castling.
                            [from] => d8
                            [to] => e7
                            [fen] => rn2kb1r/ppp1qppp/5n2/4p3/2B1P3/1Q6/PPP2PPP/RNB1K2R w KQkq - 4 8
                        )

                    [14] => Array
                        (
                            [m] => Nc3
                            [comment] => (8. Qxb7 Qb4+) Morphy could have won a pawn by 8.Qxb7 Qb4+ 9.Qxb4 Bxb4+. White can also win material with 8.Bxf7+ Qxf7 9.Qxb7, but Black has dangerous counterplay after 9...Bc5! and 10.Qxa8 O-O, or 10.Qc8+ Ke7 11.Qxh8 Bxf2+!. "But that would have been a butcher?s method, not an artist's." (Lasker).[2] In keeping with his style, Morphy prefers rapid development and initiative over material. At depth 42 on Stockfish 11 the evaluation for the top 3 moves is as follows: 1. Qxb7 (2.15) 2. Nc3 (2.10) 3. O-O (1.61)
                            [from] => b1
                            [to] => c3
                            [fen] => rn2kb1r/ppp1qppp/5n2/4p3/2B1P3/1QN5/PPP2PPP/R1B1K2R b KQkq - 5 8
                        )

                    [15] => Array
                        (
                            [m] => c6
                            [comment] => The best move, allowing Black to defend his pawn without further weakening the light squares, which have been weakened by Black trading off his light-square bishop.
                            [from] => c7
                            [to] => c6
                            [fen] => rn2kb1r/pp2qppp/2p2n2/4p3/2B1P3/1QN5/PPP2PPP/R1B1K2R w KQkq - 0 9
                        )

                    [16] => Array
                        (
                            [m] => Bg5
                            [comment] => Black is in what?s like a zugzwang position here. He can?t develop the[Queen?s] knight because the pawn is hanging, the bishop is blocked because of the Queen.--Fischer
                            [from] => c1
                            [to] => g5
                            [fen] => rn2kb1r/pp2qppp/2p2n2/4p1B1/2B1P3/1QN5/PPP2PPP/R3K2R b KQkq - 1 9
                        )

                    [17] => Array
                        (
                            [m] => b5
                            [comment] => Black attempts to drive away the bishop and gain some time, but this move allows Morphy a strong sacrifice to keep the initiative. This move loses but it is difficult to find anything better; for example 9...Na6 10.Bxf6 gxf6 11.Bxa6 bxa6 12.Qa4 Qb7 and Black's position is very weak.
                            [from] => b7
                            [to] => b5
                            [fen] => rn2kb1r/p3qppp/2p2n2/1p2p1B1/2B1P3/1QN5/PPP2PPP/R3K2R w KQkq b6 0 10
                        )

                    [18] => Array
                        (
                            [m] => Nxb5
                            [comment] => Morphy chooses not to retreat the bishop, which would allow Black to gain time for development.
                            [from] => c3
                            [to] => b5
                            [fen] => rn2kb1r/p3qppp/2p2n2/1N2p1B1/2B1P3/1Q6/PPP2PPP/R3K2R b KQkq - 0 10
                        )

                    [19] => Array
                        (
                            [m] => cxb5
                            [comment] => Black could have prolonged the game by playing 10...Qb4+, forcing the exchange of queens, but White wins comfortably after either 11.Nc3 or 11.Qxb4 Bxb4+ 12.c3!
                            [from] => c6
                            [to] => b5
                            [fen] => rn2kb1r/p3qppp/5n2/1p2p1B1/2B1P3/1Q6/PPP2PPP/R3K2R w KQkq - 0 11
                        )

                    [20] => Array
                        (
                            [m] => Bxb5+
                            [comment] => Not 11.Bd5? Qb4+, unpinning the knight and allowing the rook to evade capture.
                            [from] => c4
                            [to] => b5
                            [fen] => rn2kb1r/p3qppp/5n2/1B2p1B1/4P3/1Q6/PPP2PPP/R3K2R b KQkq - 0 11
                        )

                    [21] => Array
                        (
                            [m] => Nbd7
                            [from] => b8
                            [to] => d7
                            [fen] => r3kb1r/p2nqppp/5n2/1B2p1B1/4P3/1Q6/PPP2PPP/R3K2R w KQkq - 1 12
                        )

                    [22] => Array
                        (
                            [m] => O-O-O
                            [from] => e1
                            [to] => c1
                            [fen] => r3kb1r/p2nqppp/5n2/1B2p1B1/4P3/1Q6/PPP2PPP/2KR3R b kq - 2 12
                        )

                    [23] => Array
                        (
                            [m] => Rd8
                            [comment] => The combination of the pins on the knights and the open file for White's rook will lead to Black's defeat.
                            [from] => a8
                            [to] => d8
                            [fen] => 3rkb1r/p2nqppp/5n2/1B2p1B1/4P3/1Q6/PPP2PPP/2KR3R w k - 3 13
                        )

                    [24] => Array
                        (
                            [m] => Rxd7
                            [from] => d1
                            [to] => d7
                            [fen] => 3rkb1r/p2Rqppp/5n2/1B2p1B1/4P3/1Q6/PPP2PPP/2K4R b k - 0 13
                        )

                    [25] => Array
                        (
                            [m] => Rxd7
                            [comment] => Removing another defender.
                            [from] => d8
                            [to] => d7
                            [fen] => 4kb1r/p2rqppp/5n2/1B2p1B1/4P3/1Q6/PPP2PPP/2K4R w k - 0 14
                        )

                    [26] => Array
                        (
                            [m] => Rd1
                            [comment] => Compare the activity of the white pieces with the idleness of the black pieces. At this point, Black's d7-rook cannot be saved, since it is pinned to the king by the bishop and attacked by the rook, and though the knight defends it, the knight is pinned to the queen.
                            [from] => h1
                            [to] => d1
                            [fen] => 4kb1r/p2rqppp/5n2/1B2p1B1/4P3/1Q6/PPP2PPP/2KR4 b k - 1 14
                        )

                    [27] => Array
                        (
                            [m] => Qe6
                            [comment] => Qe6 is a futile attempt to unpin the knight (allowing it to defend the rook) and offer a queen trade, to take some pressure out of the white attack. Even if Morphy did not play his next crushing move, he could have always traded his bishop for the knight, followed by winning the rook.
                            [from] => e7
                            [to] => e6
                            [fen] => 4kb1r/p2r1ppp/4qn2/1B2p1B1/4P3/1Q6/PPP2PPP/2KR4 w k - 2 15
                        )

                    [28] => Array
                        (
                            [m] => Bxd7+
                            [from] => b5
                            [to] => d7
                            [fen] => 4kb1r/p2B1ppp/4qn2/4p1B1/4P3/1Q6/PPP2PPP/2KR4 b k - 0 15
                        )

                    [29] => Array
                        (
                            [m] => Nxd7
                            [comment] => If 15...Qxd7, then 16.Qb8+ Ke7 17.Qxe5+ Kd8 18.Bxf6+ gxf6 19.Qxf6+ Kc8 20.Rxd7 Kxd7 21.Qxh8 and White is clearly winning. Moving the king leads to mate: 15...Ke7 16.Qb4+ Qd6 (16...Kd8 17.Qb8+ Ke7 18.Qe8#) 17.Qxd6+ Kd8 18.Qb8+ Ke7 19.Qe8# or 15...Kd8 16.Qb8+ Ke7 17.Qe8#.
                            [from] => f6
                            [to] => d7
                            [fen] => 4kb1r/p2n1ppp/4q3/4p1B1/4P3/1Q6/PPP2PPP/2KR4 w k - 0 16
                        )

                    [30] => Array
                        (
                            [m] => Qb8+
                            [comment] => Morphy finishes with a queen sacrifice.
                            [from] => b3
                            [to] => b8
                            [fen] => 1Q2kb1r/p2n1ppp/4q3/4p1B1/4P3/8/PPP2PPP/2KR4 b k - 1 16
                        )

                    [31] => Array
                        (
                            [m] => Nxb8
                            [from] => d7
                            [to] => b8
                            [fen] => 1n2kb1r/p4ppp/4q3/4p1B1/4P3/8/PPP2PPP/2KR4 w k - 0 17
                        )

                    [32] => Array
                        (
                            [m] => Rd8#
                            [from] => d1
                            [to] => d8
                            [fen] => 1n1Rkb1r/p4ppp/4q3/4p1B1/4P3/8/PPP2PPP/2K5 b k - 1 17
                        )

                )

        )

)
*/





echo '<h2>4. Create parser from PGN String</h2>' ;

$pgn = '[Event "Moscow Championship (blitz) 2015"]
[Site "Moscow RUS"]
[Date "2015.09.06"]
[Round "19"]
[White "Morozevich, Alexander"]
[Black "Dubov, Daniil"]
[Result "0-1"]
[ECO "B20"]
[WhiteElo "2711"]
[BlackElo "2661"]
[PlyCount "146"]
[EventDate "2015.09.06"]

1. e4 c5 2. g3 g6 3. Bg2 Bg7 4. d3 Nc6 5. f4 e6 6. Nf3 d5 7. O-O Nf6 8. e5 Nd7
9. c4 Nb6 10. Qe2 O-O 11. Nc3 f6 12. exf6 Bxf6 13. Kh1 Bd7 14. Bd2 Nd4 15. Nxd4
cxd4 16. Nd1 dxc4 17. dxc4 Bc6 18. Bxc6 bxc6 19. Nf2 c5 20. Rae1 Qd7 21. b3
Rfe8 22. Nd3 Rac8 23. Qe4 Qc6 24. g4 Qxe4+ 25. Rxe4 Nd7 26. Be1 h5 27. gxh5
gxh5 28. Rf3 Kh7 29. Bf2 Kg6 30. Rxe6 Kf5 31. Rd6 Nb6 32. Rh3 h4 33. Kg2 Be7
34. Rh6 Ke4 35. Re6+ Kf5 36. Re5+ Kg6 37. Kf3 Nd7 38. Re6+ Kf7 39. f5 Bf6 40.
Bxh4 Rxe6 41. fxe6+ Kxe6 42. Bg3 Rf8 43. Rh5 Bg5+ 44. Kg2 Be3 45. Rd5 Re8 46.
Rd6+ Ke7 47. Ra6 Ra8 48. h4 Nf6 49. Nxc5 Nd7 50. Nd3 Rg8 51. Kf3 Rf8+ 52. Ke2
Rg8 53. Bf4 Bxf4 54. Nxf4 Nc5 55. Rxa7+ Kd6 56. b4 Re8+ 57. Kf3 Re3+ 58. Kg4
Ne4 59. Ra6+ Kd7 60. Ra5 Nf2+ 61. Kf5 d3 62. Rd5+ Kc7 63. h5 Rf3 64. Ke5 Re3+
65. Kf5 Rf3 66. h6 Nh3 67. h7 Rxf4+ 68. Kg6 Rh4 69. Kg7 Nf4 70. Rc5+ Kd6 71.
Rc8 Ne6+ 72. Kf6 d2 73. c5+ Kd7 0-1';

$parser = new PgnParser();
$parser->setPgnContent($pgn);
$game = $parser->getFirstGame();
                  //echo json_encode($game);
echo '<pre>'; print_r($game); echo '</pre>'; 



