<?php
// J:\awww\apl\dev1\z30GB\04knjige\02popel\ch7books_in_out\common.inc.php
//reqonce mdl, c onnparams, s howHeader, s howFooter, s howError, e xceptionHandler,
//  $conn c onnobj glob.var

require_once('mdl.php');

list( $do_pgntion, $dbi, $db_hostname, $db_name
    , $db_username, $db_userpwd) 
= require __DIR__ . '/dbconn_params.php'; // not r equire_ once !!
//return [ null, 'mysql', 'localhost', 'z_blogcms', 'root', ''] ;
$connStr = "$dbi:host=$db_hostname;dbname=$db_name"; // books 3 tbl
$user = $db_username ;
$pass = $db_userpwd ;

/**
 * render header on every page, including opening html tag, 
 * head section and the opening body tag.
 * It should be called before any output of the page itself.
 * @param  string $title = page title 
 */
function showHdr($title) // , $nolink = 'books'
{
  ?>
  <!doctype html>
  <html class="no-js" lang="">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=htmlspecialchars($title)?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <!--link rel="favicon" href="favicon.ico"-->

    <!--link rel="stylesheet" href="http://dev1:8083/zinc/themes/mini3.css" or : -->
    <link rel="stylesheet" href="/zinc/themes/mini3.css">

  </head>


  <body>
  <h2><?=htmlspecialchars($title)?></h2>

  <!--hr-->
  <?php
}

/**
 * This function will 'close' the body and html
 * tags opened by the show Hdr() function
 */
function showFtr($caller='') 
{
    global $conn;
    
    if($conn instanceof PDO) {
      $driverName = $conn->getAttribute(PDO::ATTR_DRIVER_NAME);
      echo "<br/><br/>";
      echo "<small>Connecting using PDO syntax & $driverName driver</small>";
    }
    ?>
            <?php echo '<p>'; print_r($caller) ; echo '</p>'; ?>
    </body>
    </html>
    <?php
} 

// Create connection object
//$conn = new PDO($connStr, $user, $pass);
/**
 * This fn will display an error message, call the 
 * show Ftr() fn and terminate the application
 * @param  string $message  the error message
 */
function showErr($message) 
{
  echo "<h2>Error</h2>";
  echo nl2br(htmlspecialchars($message));
  showFtr(__FUNCTION__);
  exit();
}

/**
 * This is the default exception handler
 * @param Exception $e  the uncaught exception
 */
function exceptionHandler($e) 
{
  showErr("Sorry, the site is under maintenance\n" 
    . $e->getMessage());
}
// Set the global excpetion handler
set_exception_handler('exceptionHandler');

// Create the connection object
try 
{
  $conn = new PDO($connStr, $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} 
catch(PDOException $e) 
{
  showHdr('Error');
  showErr("Greška\n" . $e->getMessage());
}
