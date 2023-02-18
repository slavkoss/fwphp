<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\guitar_shop\model\database.php
// Set up the database connection

// my h ome develop. PC :
$dsn = 'mysql:host=localhost;dbname=z_shop'; //my_guitar_shop2
$username = 'mgs_user'; //shop_user  mgs_user  'root' ; //
$password = 'pa55word';  //pa55word             '' ; //

/*
// eu5 free hosting : not localhost
$dsn = 'mysql:host=fdb21.freehostingeu.com;dbname=3266814_cms'; 
$username = '3266814_cms'; //mgs_user
$password = 'MYLONGER_SIMPLE';   //pa55word
*/

$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
    $db = new PDO($dsn, $username, $password, $options);
                        //echo '<pre>'.'$db='; print_r($db); echo '</pre>';
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('errors/db_error_connect.php');
    exit();
}
