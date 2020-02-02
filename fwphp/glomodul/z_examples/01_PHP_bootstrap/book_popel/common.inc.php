<?php
// J:\awww\apl\dev1\z30GB\04knjige\02popel\ch7books_in_out\common.inc.php
// conn, showHeader, showFooter, showError, exceptionHandler
require_once('mdl.php');
$connStr = 'mysql:host=localhost;dbname=tema';
$user = 'root';
$pass = '';
      //$connStr = 'oci:host=sspc1;dbname=sspc1/XE'; 
      //$connStr = 'oci:host=sspc1;dbname=sspc1/XE:pooled;charset=UTF8';
      //$user = 'mercedes';
      //$pass = 'm1';
      //$connStr = 'sqlite:/www/hosts/localhost/pdo.db';
      //$connStr = 'pgsql:host=localhost dbname=cars';
/**
 * render header on every page, including opening html tag, 
 * head section and the opening body tag.
 * It should be called before any output of the page itself.
 * @param  string $title = page title 
 */
function showHeader($title) // , $nolink = 'books'
{
  ?>
  <html>
  <head><title><?=htmlspecialchars($title)?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
  <h2><?=htmlspecialchars($title)?></h2>
  <a href="index.php">BOOKS (detail Block2) & Authors (master B1)</a>&nbsp;&nbsp;&nbsp;
  <a href="B1_tbl.php">AUTHORS (suppliers, material documents)</a>&nbsp;&nbsp;&nbsp;
  <a href="lnktbl.php">BORROWERS (buyers, links, veze)</a>
   &nbsp;&nbsp;&nbsp;
  <a href="exp_B2_xml.php">EXPORT B2->XML</a>
  <hr>
  <?php
}
/**
 * This function will 'close' the body and html
 * tags opened by the showHeader() function
 */
function showFooter() 
{
    global $conn;
    
    if($conn instanceof PDO) {
      $driverName = $conn->getAttribute(PDO::ATTR_DRIVER_NAME);
      echo "<br/><br/>";
      echo "<small>Connecting using PDO syntax & $driverName driver</small>";
    }
    ?>
    </body>
    </html>
    <?php
} 
// Create connection object
//$conn = n ew PDO($connStr, $user, $pass);
/**
 * This function will display an error message, call the 
 * showFooter() function and terminate the application
 * @param  string $message  the error message
 */
function showError($message) 
{
  echo "<h2>Error</h2>";
  echo nl2br(htmlspecialchars($message));
  showFooter();
  exit();
}

/**
 * This is the default exception handler
 * @param Exception $e  the uncaught exception
 */
function exceptionHandler($e) 
{
  showError("Sorry, the site is under maintenance\n" 
    . $e->getMessage());
}


// Set the global excpetion handler
set_exception_handler('exceptionHandler');


/*
// Create the connection object
try 
{
  $conn = n ew PDO($connStr, $user, $pass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} 
catch(PDOException $e) 
{
  showHeader('Error');
  showError("Greška\n" . $e->getMessage());
}
*/