<?php
// https://www.startutorial.com/articles/view/php-crud-tutorial-part-1 of 4 (Xsu Ding)
//use PDO ;

require_once(__DIR__.'/confglo.php');

require_once __DIR__.'/database.php';
$pdo = Database::connect();
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

include_once 'hdr.php';

switch (true) {
  case isset($_GET['c']): include 'create.php'; break;
  case isset($_GET['r']): include 'read.php'; break;
  case isset($_GET['u']): include 'update.php'; break;
  case isset($_GET['d']): include 'delete.php'; break;

  default: include_once 'home.php'; break;
}

include_once 'ftr.php';

/* To do :
Add pagination to PHP CRUD grid.
Implement search function in PHP CRUD grid.
Build image upload in PHP CRUD grid.
Use custom inputs such as select box/radio box in PHP CRUD grid.
*/