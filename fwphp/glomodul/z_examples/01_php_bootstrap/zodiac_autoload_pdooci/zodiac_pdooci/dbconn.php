<?php
//use PDOOCI\PDO as PDO;
//J:\zwamp64\vdrive\web\papl1\01sifrarnici\tipdokumenta\inc\dbconn.php
define("DSN", "sspc1/XE:pooled;charset=UTF8"); // UTF8 EE8MSWIN1250
define("USERNAME", "mercedes");  define("PASSWORD", "m1");
//require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php'; //E.Rangel's pdooci in DROOTPATH
//J:\wamp64\www\fwphp\vendor\taq\pdooci\src\PDO.php
require_once $_SERVER['DOCUMENT_ROOT'].'/fwphp/vendor/taq/pdooci/src/PDO.php';
$options = array(PDO::ATTR_PERSISTENT => true);
try{
  $conn = new PDOOCI\PDO(DSN, USERNAME, PASSWORD, $options);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "connection successful"; // uncomment for testing
}catch (PDOException $ex){
  echo "Greška spajanja na tablice korisnika ".USERNAME.' '.$ex->getMessage();
}
/*

// php's built-in pdo oci extension :
     //define("DSN", "mysql:host=localhost;dbname=todo"); //php's built-in
// must be XE, ora7 from tnsnames.ora works only in sql+ !! :
define("DSN", "oci:host=sspc1/XE:pooled;charset=EE8MSWIN1250"); 
     //$db = new PDO('oci:host=localhost/XE:pooled;charset=EE8MSWIN1250'
define("USERNAME", "hr");  define("PASSWORD", "hr");
$options = array(PDO::ATTR_PERSISTENT => true);
try{
  $conn = new PDO(DSN, USERNAME, PASSWORD, $options); //php's built-in
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "connection successful"; // uncomment for testing
}catch (PDOException $ex){
  echo "Greška spajanja na tablice korisnika ".USERNAME.' '.$ex->getMessage();
}
*/