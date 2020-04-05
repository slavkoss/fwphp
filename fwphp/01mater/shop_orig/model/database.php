<?php
// Set up the database connection
/*
// my h ome develop. PC :
$dsn = 'mysql:host=localhost;dbname=z_blogcms'; //z_shop my_guitar_shop2
$username = 'root'; //shop_user mgs_user
$password = '';  //pa55word
*/

// eu5 free hosting : not localhost
$dsn = 'mysql:host=fdb21.freehostingeu.com;dbname=3266814_cms'; //my_guitar_shop2
$username = '3266814_cms'; //mgs_user
$password = 'pozega141';   //pa55word


$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
try {
    $db = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('errors/db_error_connect.php');
    exit();
}

                  /* //original :
                  $dsn = 'mysql:host=localhost;dbname=my_guitar_shop2';
                  $username = 'mgs_user';
                  $password = 'pa55word';
                  $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                  */