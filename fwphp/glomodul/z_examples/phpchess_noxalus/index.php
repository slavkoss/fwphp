<?php
// Jeu d'Echec  https://github.com/Noxalus/PHP-Chess  2020.06.07,  2012 year
session_start();

$url = 'http://sspc2:8083/fwphp/glomodul/z_examples/phpchess_noxalus/index.php' ;

function autoloader($classname) { include 'classes/' . $classname . '.php'; }
spl_autoload_register('autoloader');

// $ a c t i o n  =  U R L  R E Q U E S T  (C O M M A N D  TO  OUR CODE)
$urlarr = parse_url($_SERVER['REQUEST_URI']) ;
$urlquery = isset($urlarr['query']) ? $urlarr['query'] : '' ;
if ($urlquery) {
  $urlqryarr = explode('/',$urlquery) ;
  $action = $urlqryarr[0] ;
} else {
  $urlqryarr = [] ;
  $action = 'NO_ACTION' ; 
}
                   //echo '</h3>'. __FILE__ .' SAYS: '.' line='. __LINE__ .'</h3>';
                   //echo '<pre>$urlarr of $_SERVER[\'REQUEST_URI\'] ='; print_r($urlarr); echo '</pre>';
                   //echo '<pre>$urlqryarr='; print_r($urlqryarr); echo '</pre>';
                   //exit(0);


// http://sspc2:8083/fwphp/glomodul/z_examples/phpchess_noxalus/index.php?reset
// B o a r d
if (!isset($_SESSION['board'])) {
                   //echo '</h3>'. __FILE__ .' SAYS: '.' line='. __LINE__ .'</h3>';
                   //exit(0);
    $board = new Board(); // $this->board = array(); $this->CurrPlayerColor = Color::White;
        //$this->blackPieces = array();  $this->blackKing = null; $this->whitePieces = array();
        //$this->whiteKing = null;  $this->turnCounter = 0;  $this->h istory = new H istory();
    $board->Init();
} else {
    $board = unserialize($_SESSION['board']) ; 
}


// L o g
if (!isset($_SESSION['logs'])) { $logs = new Log();
} else { $logs = unserialize($_SESSION['logs']) ; //$logs = uns erialize($_SESSION['logs']);
}

if ( !$urlquery && !$board->IsFinished() ) { $logs->Add($board->DisplayTurn(), 'info'); } 




switch ($action)
{
  case 'reset':
    $_SESSION = [] ; //session_destroy();
    //header('Location: index.php');
                    //echo '<pre>$_SESSION='; print_r($_SESSION); echo '</pre>';
                    //exit(0);
    $logs->Clear();
    $board = new Board();
    $board->Init();
    break;

  case 'clear': $logs->Clear(); break;


  // History
  case 'prev': $board->Previous(); break;
  case 'next': $board->Next(); break;



  // Promotion
  case 'promotion' :
    if (    isset($urlqryarr[1]) && ctype_digit($urlqryarr[1]) // x from right 0
             && isset($urlqryarr[2]) && ctype_digit($urlqryarr[2]) // y from down 0
    )
    {
          $Position_from = unserialize($_SESSION['Position_from']) ; //$ o r i g i n
          $piece = $board->GetPiece($Position_from);
          $x = $urlqryarr[1] ; //$ _GET['x'];
          $y = $urlqryarr[2] ; //$ _GET['y'];

          echo '<div id="promotion-box"><h1>Please choose your promotion !</h1>';

          $pieceTypes = array('bishop', 'knight', 'rook', 'queen');
          foreach ($pieceTypes as $type)
          {
              // t means move_target, "to x,y"
              echo '<a href="index.php?a=t&x=' . $x . '&y=' . $y . '&choice=' . $type . '"><img src="sprites/' . $piece->GetColor() . '_' . $type . '.png" /></a>';
          }
          
          echo '</div>';
    }
    break ;



  // -------------------------------------
  // Display the current player  t u r n
  // -------------------------------------
  // ee requested action move_ origin x,y
  case 'f': //f means move_origin ee "from x,y in URLQRY - see below ?f/3/1 means from e2"
    // http://sspc2:8083/fwphp/glomodul/z_examples/phpchess_noxalus/index.php?f/3/1
                        //echo '</h3>'. __FILE__ .' SAYS: '.' line='. __LINE__ .'</h3>';
                        //exit(0);
      if (    isset($urlqryarr[1]) && ctype_digit($urlqryarr[1]) // x from right 0
           && isset($urlqryarr[2]) && ctype_digit($urlqryarr[2]) // y from down 0
      )
      {
          $Position_from = new Position((int)$urlqryarr[1], (int)$urlqryarr[2]); //x from right 0, y from down 0 ee $this->x = $x;
                      //echo '<br />line='. __LINE__ . '<pre>$Position_from='; print_r($Position_from); echo '</pre>'; 
          $piece = $board->GetPiece($Position_from);
                      //echo '<pre>$piece='; print_r($piece); echo '</pre>'; // see this script end 
          if ($piece !== null)
          {
              if ($piece->GetColor() == $board->GetCurrPlayerColor()) //was Get Turn
              {
                  $board->ComputeRealPossibleCells($piece);                                        
                  if (count($piece->GetPossibleCells()) == 0)
                  {
                      $board->CleanPossibleCells($board->GetCurrPlayerColor());
                      $logs->Add('No move available for this piece !', 'error');
                      header('Location: index.php');
                  }
                  else
                      $_SESSION['Position_from'] = serialize($Position_from) ;
              }
              else
              {
                  $logs->Add('This is not your turn !', 'error');
              }
          }
      } //e n d  x,y from is set
      break;



  case 't': // t means move_target, ee "to x,y"
    if (isset($_SESSION['Position_from']))
    {
        if (
              isset($urlqryarr[1]) && ctype_digit($urlqryarr[1]) // x from right 0
           && isset($urlqryarr[2]) && ctype_digit($urlqryarr[2]) // y from down 0
        )
        {
          // URL for "to e4" is :  http://sspc2:8083/fwphp/glomodul/z_examples/phpchess_noxalus/index.php?a=t&x=3&y=3
          //$Position_from = uns erialize($_SESSION['Position_from']);
          $Position_from = unserialize($_SESSION['Position_from']) ; 
                //echo '<pre>$Position_from='; print_r($Position_from); echo '</pre>'; 
          $piece = $board->GetPiece($Position_from);
                //echo '<pre>$piece='; print_r($piece); echo '</pre>'; 
          $Position_to = new Position((int)$urlqryarr[1], (int)$urlqryarr[2]);
                    //$Position_to = new P osition((int)$ _GET['x'], (int)$ _GET['y']);
                //echo '<pre>$Position_to='; print_r($Position_to); echo '</pre>'; 
                    // $Position_to=Position Object ( [x] => 3  [y] => 3 ) 


                    if ( $board->IsPromotion($piece, $Position_to) 
                         && empty($_GET['choice'])
                    )
                    {
                        header( 'Location: index.php?a=promotion&x=' 
                                . $Position_to->x . '&y=' . $Position_to->y);
                        exit;
                    }
                    else
                    {
                        if (!empty($_GET['choice']))
                            $_SESSION['promotion'] = $_GET['choice'];

                        if ($board->Move($Position_from, $Position_to))
                        {
                          /* // M o v e  does :
                             $this->board[$Position_to->x][$Position_to->y] = $piece;
                             $this->board[$Position_from->x][$Position_from->y] = null;
                             $piece->SetPosition($Position_to, $this->turnCounter);
                             $this->history->Add($Position_from, $Position_to, $piece, $Position_toPiece, $type); */
                          //echo '<br />line='. __LINE__ . '<pre>$Position_to='; print_r($Position_to); echo '</pre>';
                          //exit(0) ;
                            $board->NextTurn();
                        }
                        else
                        {
                            $logs->Add('Invalid move !!', 'error');
                        }
                    }
        } else //no x,y in  U R L
        {
           $logs->Add('Invalid move !', 'error');
        }

        unset($_SESSION['Position_from']);
        //no need !!!  header('Location: index.php');
    } //e n d  to x,y  and  isset($_SESSION['Position_from'])
      break;




      default: break;
} //e n d  s w i t c h  a c t i o n




$_SESSION['board'] = serialize($board) ; // = s erialize($board);
$_SESSION['logs']  = serialize($logs) ; // s erialize($logs);










?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>CHESS</title>
  <link href="style/style.css" type="text/css" rel="stylesheet" media="all" />
  <!-- #f1f1c1 = yellow -->
  <style>

  </style>
</head>

<body>

<table id="t01">
<tr>

    <td style="width:52%">
        <div id="board">
            <?php $board->DrawBoard(); ?>
        </div>
    </td>

    <td >
    <div id="info">




        <!-- RIGHT T O P  M N U  R O W 1  xx-large -->
        <p style="text-align: center;">
          <a href="index.php?reset" style="font-weight: bold; font-size: large;">&lt;&lt; (R e s e t  game)</a><br />

        <!-- RIGHT T O P  M N U  R O W 2 -->
          <a href="index.php?prev" style="float: left; font-style: italic;">&lt;-- Previous</a>
          <a href="index.php?clear" style="font-style: italic;">(Clear logs)</a>
          <a href="index.php" style="float: right; font-style: italic;">Next --></a>

        </p>


        <!-- RIGHT  M O V E S  L I S T -->
        <br /><div class="logs">
          1. <a href="<?=$url?>?f/3/1">From e2</a> &nbsp;
          <a href="<?=$url?>?t/3/3">To e4</a> &nbsp; &nbsp;
          <a href="<?=$url?>?f/3/6">From e7</a> &nbsp;
          <a href="<?=$url?>?t/3/4">To e5</a>
        </div>

        <!-- L O G S -->
        <br /><div class="logs">
          <?php $logs->Display(); ?>
        </div>




        <script>
          // Auto scroll for log's window
          var elem = document.getElementById('logs');
          elem.scrollTop = elem.scrollHeight;
        </script>

    </div>
    </td>

</tr>
</table>





<div>
    <?php
    echo '<br />line='. __LINE__ ;
    if (isset($Position_from)) {echo '<br />$Position_ from=<pre>'; print_r($Position_from); echo '</pre>';}
    if (isset($piece))  {
      echo '<br />$piece=<pre>'; print_r($piece); echo '</pre>';
      echo '<br />$piece->GetPossibleCells()=<pre>'; print_r($piece->GetPossibleCells()); echo '</pre>';
    }
    if (isset($Position_to)) {echo '<br />$Position_ to=<pre>'; print_r($Position_to); echo '</pre>';} 

     $board->history->DisplayBoardHis() ;



  //sspc2:8083/fwphp/glomodul/z_examples/phpchess_noxalus/index.php?f/3/1
  //  f/3/1 = from e2   t/3/3 = to e4
  $urlarr = parse_url($_SERVER['REQUEST_URI']) ;
  echo '<br />$urlarr of $_SERVER[\'REQUEST_URI\'] =<pre>'; print_r($urlarr); echo '</pre>';
  //   [path]  => /fwphp/glomodul/z_examples/phpchess_noxalus/index.php
  //   [query] => f/3/1

  //if http://sspc2:8083/fwphp/glomodul/z_examples/phpchess_noxalus/index.php
  //          [path] => /fwphp/glomodul/z_examples/phpchess_noxalus/index.php

  //if http://sspc2:8083/fwphp/glomodul/z_examples/phpchess_noxalus/
  //          [path] => /fwphp/glomodul/z_examples/phpchess_noxalus/

  $urlquery = isset($urlarr['query']) ? $urlarr['query'] : '' ;
  echo '<br />$urlquery=<pre>'; print_r($urlquery); echo '</pre>';

  $urlqryarr = [] ;
  if ($urlquery) {$urlqryarr = explode('/',$urlquery) ;}
  echo '<br />$urlqryarr=<pre>'; print_r($urlqryarr); echo '</pre>';

  //echo '<br />$_SESSION=<pre>'; print_r($_SESSION); echo '</pre>';
  if (isset($_SESSION['Position_from'])) {echo '<br />ses.P osition_f rom=<pre>'; print_r(unserialize($_SESSION['Position_from'])); echo '</pre>';} 

  //if (isset($_SESSION['logs'])) {echo '<pre>ses.logs='; print_r(unserialize($_SESSION['logs'])); echo '</pre>';} 


  if (isset($_SESSION['board'])) {
    $ses_board = unserialize($_SESSION['board']) ;
    // e4 and e5 :
    echo '<br />$ses_board->board[3][1]=<pre>'; print_r($ses_board->board[3][1]); echo '</pre>';
    echo '<br />$ses_board->board[3][3]=<pre>'; print_r($ses_board->board[3][3]); echo '</pre>';
    echo '<br />$ses_board->board[3][4]=<pre>'; print_r($ses_board->board[3][4]); echo '</pre>';
  } 



  /*
  $url = 'http://username:password@hostname:9090/path?arg=value#anchor';

  var_dump(parse_url($url));
  array(8) {   ["scheme"]=>   string(4) "http"   ["host"]=>   string(8) "hostname" 
    ["port"]=> int(9090)   ["user"]=> string(8) "username"   ["pass"]=> string(8) "password"
    ["path"]=>   string(5) "/path"   ["query"]=>   string(9) "arg=value" 
    ["fragment"]=>   string(6) "anchor"
  }

  var_dump(parse_url($url, PHP_URL_SCHEME));       string(4) "http"
  var_dump(parse_url($url, PHP_URL_USER));         string(8) "username"
  var_dump(parse_url($url, PHP_URL_PASS));         string(8) "password"
  var_dump(parse_url($url, PHP_URL_HOST));         string(8) "hostname"
  var_dump(parse_url($url, PHP_URL_PORT));         int(9090)
  var_dump(parse_url($url, PHP_URL_PATH));         string(5) "/path"
  var_dump(parse_url($url, PHP_URL_QUERY));        string(9) "arg=value"
  var_dump(parse_url($url, PHP_URL_FRAGMENT));     string(6) "anchor"
  */



              // URL for "from e2" is :  http://sspc2:8083/fwphp/glomodul/z_examples/phpchess_noxalus/index.php?f/3/1
               //[04:14:14] ---------- T u r n  #1 ----------
               //[04:14:14] White player's t u r n !
               // and possible squares are green

               /* $Position_from=Position Object
                  (
                      [x] => 3
                      [y] => 1
                  )

                  $piece=Pawn Object
                  (
                      [position:protected] => Position Object
                          (
                              [x] => 3
                              [y] => 1
                          )

                      [color:protected] => 0
                      [possibleCells:protected] => Array
                          (
                              [0] => Position Object
                                  (
                                      [x] => 3
                                      [y] => 2
                                  )

                              [1] => Position Object
                                  (
                                      [x] => 3
                                      [y] => 3
                                  )

                          )

                      [history:protected] => Array
                          (
                          )

                  ) 



                  // after "to e4, e5" :  
                  $board->history=

                  Array
                  (
                      [0] => Array
                          (
                              [piece] => Array
                                  (
                                      [color] => 0
                                      [type] => Pawn
                                      [Position_from] => Position Object
                                          (
                                              [x] => 3
                                              [y] => 1
                                          )

                                      [Position_to] => Position Object
                                          (
                                              [x] => 3
                                              [y] => 3
                                          )

                                  )

                              [Position_to] => 
                              [type] => Array
                                  (
                                      [name] => classic
                                  )

                          )

                      [1] => Array
                          (
                              [piece] => Array
                                  (
                                      [color] => 1
                                      [type] => Pawn
                                      [Position_from] => Position Object
                                          (
                                              [x] => 3
                                              [y] => 6
                                          )

                                      [Position_to] => Position Object
                                          (
                                              [x] => 3
                                              [y] => 4
                                          )

                                  )

                              [Position_to] => 
                              [type] => Array
                                  (
                                      [name] => classic
                                  )

                          )

                  )




                  $ses_board->board[3][3]=

                  Pawn Object
                  (
                      [position:protected] => Position Object
                          (
                              [x] => 3
                              [y] => 3
                          )

                      [color:protected] => 0
                      [possibleCells:protected] => Array
                          (
                          )

                      [history:protected] => Array
                          (
                              [0] => Array
                                  (
                                      [0] => 0
                                      [1] => Position Object
                                          (
                                              [x] => 3
                                              [y] => 1
                                          )

                                  )

                          )

                  )


                  $ses_board->board[3][4]=

                  Pawn Object
                  (
                      [position:protected] => Position Object
                          (
                              [x] => 3
                              [y] => 4
                          )

                      [color:protected] => 1
                      [possibleCells:protected] => Array
                          (
                          )

                      [history:protected] => Array
                          (
                              [0] => Array
                                  (
                                      [0] => 1
                                      [1] => Position Object
                                          (
                                              [x] => 3
                                              [y] => 6
                                          )

                                  )

                          )

                  )








                  // after "reset" should be :
                  $board->history= Array
                  (
                      [0] => Array (
                              [piece] => Array (
                                      [color] => 0
                                      [type] => Pawn
                                      [Position_from] => Position Object
                                          (
                                              [x] => 3
                                              [y] => 1
                                          )

                                      [Position_to] => Position Object
                                          (
                                              [x] => 3
                                              [y] => 3
                                          )

                                  )

                              [Position_to] => [type] => Array
                                  (
                                      [name] => classic
                                  )
                          )
                  )



                  */


   ?>
</div>


</body>
</html>