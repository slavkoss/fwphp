<?php
//
require 'vendor/autoload.php';
use \PChess\Chess\Chess;
use \PChess\Chess\Output\UnicodeOutput;

$chess = new Chess();
$moves = '
1. e4 e5 2. Nf3 d6 3. d4 Bg4 4. dxe5 Bxf3 5. Qxf3 dxe5 6. Bc4 Nf6 7. Qb3 Qe7 
8. Nc3 {(8. Qxb7 Qb4+)} c6 9. Bg5 b5 10. Nxb5 cxb5
11. Bxb5 Nbd7 
12. O-O-O Rd8 13. Rxd7 Rxd7 14. Rd1 {Diag. 1} Qe6 15. Bxd7+ Nxd7 16. Qb8 Nxb8 17. Rd8# 1-0';
$mv[1] = 'e4'; 
$mv[2] = 'e5'; 
$mv[3] = 'Nf3'; 
$mv[4] = 'd6'; 
$mv[5] = 'd4'; 
$mv[6] = 'Bg4'; 
$mv[7] = 'dxe5'; 
$mv[8] = 'Bxf3'; 
$mv[9] = 'Qxf3'; 
$mv[10] = 'dxe5'; 
$mv[11] = 'Bc4'; 
$mv[12] = 'Nf6'; 
$mv[13] = 'Qb3'; 
$mv[14] = 'Qe7'; 
$mv[15] = 'Nc3'; 
$mv[16] = 'c6'; 
$mv[17] = 'Bg5'; 
$mv[18] = 'b5'; 
$mv[19] = 'Nxb5'; 
$mv[20] = 'cxb5'; 
$mv[21] = 'Bxb5'; // <==========
$mv[22] = 'Nbd7'; 
$mv[23] = 'O-O-O'; 
$mv[24] = 'Rd8'; 
                          //while (!$chess->gameOver()) {
                             //$moves = $chess->moves();
                             //$move = $moves[random_int(0, count($moves) - 1)];
                             //$chess->m ove($move);
                          //}

    $ii=1;
    while ( isset($mv[$ii]) ):
    {
      $chess->move($mv[$ii]); 
      $ii++ ;
    } endwhile ;

echo '<pre>'; echo (new UnicodeOutput())->render($chess) . '<br />'; echo '</pre>';