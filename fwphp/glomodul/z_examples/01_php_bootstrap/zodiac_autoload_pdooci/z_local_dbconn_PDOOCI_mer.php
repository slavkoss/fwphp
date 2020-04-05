<?php
use PDOOCI\PDO as PDO;
//J:\zwamp64\vdrive\web\papl1\01sifrarnici\tipdokumenta\inc\dbconn.php
//define("DSN", "sspc1/XE:pooled;charset=UTF8"); // UTF8 EE8MSWIN1250
define("DSN", getenv( 'USERDOMAIN', true) ?: getenv('USERDOMAIN')
                      ."/XE:pooled;charset=UTF8"); // UTF8 EE8MSWIN1250
define("USR", "mercedes");  define("PSW", "m1");
//require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php'; //E.Rangel's pdooci in DROOTPATH
require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db/PDO.php';
$options = array(PDO::ATTR_PERSISTENT => true);
try{
  $db = new PDO(DSN, USR, PSW, $options);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo 'PDOOCI on OCI8 connection successful, DSN='.DSN.', USR='.USR.', PSW='.PSW; // uncomment for testing
}catch (PDOException $ex){
  echo "Greška spajanja na tablice korisnika DSN=".DSN.' '.$ex->getMessage();
}

/*
// php's built-in pdo oci extension :
     //define("DSN", "mysql:host=localhost;dbname=todo"); //php's built-in
// must be XE, ora7 from tnsnames.ora works only in sql+ !! :
*/
/*
//sss 10.jul 2016 test conn. identifier :
//in class PDO extends \PDO,  public function __construct,  before
//try {    if (!is_null($options) && array_key_exists( ...
echo '<pre>'; 
     echo '$options=';        print_r($options); 
     echo '$username=';       print_r($username); 
     echo '<br />$password='; print_r($password); 
     echo '<br />$data=';     print_r($data); 
     echo '<br />$charset=';  print_r($charset); 
echo '</pre>';
*/