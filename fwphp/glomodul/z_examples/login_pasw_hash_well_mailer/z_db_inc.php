<?php
/*
 *   This example script can be downloaded from Alex Web Develop "PHP Login and Authentication Tutorial":   https://alexwebdevelop.com/user-authentication/
*/
$host = 'localhost';   /* Host name of the MySQL server */
$user = 'root';        /* MySQL account username */
$passwd = '';          /* MySQL account password */
$schema = 'z_blogcms'; /* The schema you want to use */
$pdo = NULL;           /* The PDO object */
$dsn = 'mysql:host=' . $host . ';dbname=' . $schema; /* Connection string, or "data source name" */

/* Connection inside a try/catch block */
try
{  
   $pdo = new PDO($dsn, $user,  $passwd); /* PDO object creation */
   /* Enable exceptions on errors */
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
   /* If there is an error an exception is thrown */
   echo 'Database connection failed<br>';
   print_r($e);
   die();
}