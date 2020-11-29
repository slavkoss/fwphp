<?php

use \Ryanhs\Chess\Chess;

// hdr, moves :



    //         Defaults (prescribed, zadane values)
    $moves_in_board = 2 ;

if (isset($_GET['g'])) 
{
  ///////////////////////////////////////////////
  //     1. SHOW GAME selected in menu
  ///////////////////////////////////////////////

    require 'Chess.php';  //51 kB   require 'vendor/autoload.php';

    //$css_files = ["chess.css"]; // no css
    $ds = DIRECTORY_SEPARATOR ;
    $QS = '?' ;

    // 4*2=8 moves in 4-boards web page row :
    if (isset($_POST['b'])) {$boards_in_row=$_POST['b'];} else {$boards_in_row=4;}
    // game moves script to include :
    if (isset($_GET['g'])) {$pgnfle_toinc=$_GET['g'];} else {$pgnfle_toinc='001';}

     $wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
              // 2. URL_DOM AIN = dev1:8083 :
            . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

      $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;
      $uri_arr = explode($QS, $REQUEST_URI) ; 
      $module_relpath = rtrim(ltrim($uri_arr[0],'/'),'/');
      $module_url = $wsroot_url.$module_relpath.'/';

                          //$fle_to_inc_path = __DIR__ . $ds .'games'. $ds . $pgnfle_toinc .'.php' ;
  //Moves screen to include, in URL is basename eg g=001 :
  //http://dev1:8083/fwphp/glomodul/phpchess/pgnchess/games/mat_in1.pgn
  $url_to_inc = dirname($module_url) . '/games'. '/' . $pgnfle_toinc .'.pgn' ;
  $game_pgnString = file_get_contents($url_to_inc ) ;
                          //$lines = str_replace("\n", '<br />', $game_pgnString);
                          //$lines = explode('<br />', $lines);
                           echo 'ln '. __LINE__ .' SAYS: '.'<pre>$module_url='. $module_url .'</pre>';
                           //echo '<pre>NO MORE $fle_to_inc_path='. $fle_to_inc_path  .'</pre>';
                           echo '<pre>$url_to_inc='. $url_to_inc .'</pre>';
                           echo '<pre>$game_pgnString=<br />'. $game_pgnString .'</pre>';
                           //echo '<pre>$lines='; print_r($lines) .'</pre>';



  $chess = new Chess();
  //include $fle_to_inc_path ;

                             //noooo : $pgn_arr = $chess->loadPgn($game_pgnString); or :
                             //$pgn_arr = Chess::pgn2hdr_mv_hlp($game_pgnString); or :
  $pgn_arr = $chess->pgn2hdr_mv_hlp($game_pgnString);
                           echo 'ln '. __LINE__ .' SAYS: '.'<pre>$pgn_arr='; print_r($pgn_arr); echo  '</pre>';
            //$return = $chess->loadPgn($pgn_arr);
            //$fen = $chess->fen() ;
            //echo 'FEN=' . $fen . '<br />';
            //$chess->load_fen($fen);

  $hdr = $pgn_arr['header'] ;
  $mv  = $pgn_arr['moves'] ;
  $hlp = $pgn_arr['hlp'] ;
                           //echo 'ln '. __LINE__ .' SAYS: '.'<pre>$hdr='; print_r($hdr); echo  '</pre>';
                           //echo '<pre>$mv='; print_r($mv); echo  '</pre>';

  //FEN CHESS NOTATION FOR 32  P I E C E S  STARTING POSITION : 
  //$fen = '';
  //if (!isset($chess->get_set_hdrtag()['FEN'])) { $fen_startboard = $chess->fen() ; } // or :
  
  switch (true) {
    case  ( !isset($hdr['FEN']) ):
      $fen_startboard = $chess->fen() ; break ; //starting board
    //board with some moves done :
    case  ( isset($hdr['FEN']) ): $fen_startboard = $hdr['FEN'] ; break ;
    default: break;
  }
                //if (!isset($chess->get_set_hdrtag()['FEN'])) { $fen_startboard = $chess->fen() ; } // or :
                //else { $fen_startboard = $chess->get_set_hdrtag()['FEN'] ;  }
  $chess->load_fen($fen_startboard) ;

  
         // $chess->load_fen('rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1')
         // Empty board  '8/8/8/8/8/8/8/8 w KQkq - 0 1 = to fill with move(),load_fen()

                      //echo 'ln '. __LINE__ .' SAYS: '.'<pre>$mv='; print_r($mv); echo  '</pre>';
                      //$ii = 1 ; while (isset($mv[$ii])) { echo "<pre>\$mv[$ii]="; print_r($mv[$ii]); echo  '</pre>'; $ii++ ; }

    echo '<div class="chess">';
      //<!-- game info   .' 0x88='. 0x88  = 136    $mv[0] -->
      //echo 'ln '. __LINE__ .' SAYS: '.'<pre>'; print_r($pgn_arr['header']); echo '</pre>'; 




    $ii = 0 ;
    //$boards_rows = 1; 
    // All halfmoves in Moves with help a rray :
      //<!-- We display chess board for each 2 moves, $boards_in_row times -->
    echo '<table width="100%" cellspacing="0px" cellpadding="0px" border="1px">';

    while (true):
    {
       if ( $ii === count($mv) ) break ; //DISPLAY MORE CHESS BOARDS IN TBLROW

       if ( $ii === 0 )  echo '<tr>' ; //DISPLAY MORE CHESS BOARDS IN TBLROW


       //if (!isset($mv[$ii])) 
       //if ( isset($chess->get_set_hdrtag()['FEN']) or isset($chess->get_set_hdrtag()['fen']) )
       if ( isset($hdr['FEN']) ) //or isset($hdr['fen'])
       {
          //if ($ii-1 > -1)
          //{
            //Chess table after 1st halfmove of last move, no 2nd halfmove
                                     //$chess->move($mv[$ii-1]);
            //$help_2moves = isset($mv['hlp0']) ? $mv['hlp0'] : '' ;
            $help_2moves = '' ;

                                //$help_2moves = isset($mv['hlp0']) ? $mv['hlp0'] : '' ;
            echo '<td style="vertical-align:top; padding:5px;">' ;
              echo $chess->board_html( $help_2moves ) ;
            echo '</td>' ;
            echo '</tr>' ;
          //}
         break;
       }



      //1. halfmove
      //if ($mv[$ii] == 'O-O') { $chess->move('Kf1'); //$chess->move('Rf1'); } else { 
      $chess->move($mv[$ii]); //}



        if ($ii%$moves_in_board === 0)
        { 
          // DISPLAY CHESS BOARD FOR EACH 2 HALFMOVES :
          //3. comment of 2 moves
          //$help_2moves = isset($mv['hlp'. $ii]) ? $mv['hlp'. $ii] : '' ;
            switch (true) {
              case  ( isset($hlp[$ii]) ): $help_2moves = $hlp[$ii] ; break ;
              case  ( isset($hlp[$ii-1]) ): $help_2moves = $hlp[$ii-1] ; break ;
              default: $help_2moves = '' ; break;
            }


          //2. Chess table after both halfmoves
          echo '<td style="vertical-align:top; padding:5px;">' ;
            echo $chess->board_html( $help_2moves ) ;
          echo '</td>' ;


          if ($ii%($boards_in_row * $moves_in_board) === 0) {
            //DISPLAY MORE CHESS BOARDS IN TBLROW
            echo '</tr><tr>' ;
          } 


        } //e n d  DISPLAY CHESS BOARD FOR EACH 2 HALFMOVES


      $ii++ ;
    } endwhile ;

    //<!-- We display chess board for each 2 moves, $boards_in_row times -->
    echo '</table>';



    echo '<p><br /><hr />';
    echo 'ln '. __LINE__ .' SAYS: '.'<pre>$chess->get_set_hdrtag()='; print_r($chess->get_set_hdrtag()); echo '</pre>';
    echo '<p><p>$chess->p gn()=<br />'. $chess->movesUntilNow_str();
    

    echo '<div>';
    echo '<p>&copy; 2001-'; echo date("Y");
            if (isset($_SESSION['user'])) {
               echo " Prijavljen je korisnik: ".$_SESSION['user']->user_name.'</p>' ;
            } else { //echo " Niste prijavljeni!";  //echo $_DisplayLinks()
            }
    echo '</p>
      </div><br />

    </div>';

} else
{
    //////////////////////////////////////////////////////////////
    //     2. M E N U  OF GAMES and  C H E S S  H E L P
    //////////////////////////////////////////////////////////////


  ?>
  <!doctype html>
  <html>
  <head>
    <meta charset="utf-8" />
    <title>Chess</title>
                <?php //foreach ( $css_files as $css_file ): ?>
                  <!--link rel="stylesheet" type="text/css" media="screen,projection" href="<?=$css_file?>"/-->
                <?php //endforeach; ?>
                <style>
                .auto-style2 {
  color: #808000;
}
.auto-style1 {
  color: #008000;
}
.auto-style3 {
  color: #000000;
}
                .auto-style7 {
          color: rgb(0, 0, 255);
        }
                .auto-style4 {
  margin-left: 40px;
}
                </style>
  </head>


<body>

<?php 

  include '../games_menu.php';
  include '../help_chess.php';

} // get parms




?>

</body>
</html>