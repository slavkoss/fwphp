<?php
// H:\dev_web\htdocs\t_oci8\ctr.php
session_start();

$inc = filter_input(INPUT_GET, 'inc', FILTER_SANITIZE_SPECIAL_CHARS);
$pic = filter_input(INPUT_GET, 'pic', FILTER_SANITIZE_SPECIAL_CHARS);
//echo "<a href='?c all=$c all'>C all script</a>";
//echo ' ****************', $_GET['inc']; // = $SITEURL.'/'.$APLDIR.'/' ;
//ctr.php?inc=slike.php&pic=
if (!is_null($inc)) {
   $_SESSION['pgbdy'] = $inc;
   
   if (!is_null($pic)) 
      // za  s l i k e . p h p :
      header('Location: '."index.php?pic=$pic");
   else header('Location: '. 'index.php');
} else {
    echo '<h3>'. __FILE__
    .'<br/>Ova skripta se ne poziva direktno nego iz druge skripte !</h3>';
//$tmp1 = $_GET['inc'];
//\$_GET['inc'] is null
  echo <<<EOTXT
<br/>Zove ju ftr.php, link "Test=0 or 1" koji je ekvivalent za:
<br/>DVOKLIK NA STATUSNI PODATAK U F6i
<br/><br/>Sve skripte stranica koje se prikazuju u ibrowseru
<br/>npr http://dev:8082/t_oci8/ se uvijek zovu bez get ili post param. iz ovakvog programa
<br/><strong>(jer F5 PONAVLJA AKCIJU ZADANU PARAMETRIMA, JER IH NE BRIŠE),</strong>
<br/>a ovakvi programi obave sve u vezi sa param.skripte pa zovu
<br/>skriptu npr http://dev:8082/t_oci8/.
EOTXT;
}
/*
   //$_SESSION['c urpg'] = $inc;
    switch ($inc) { 
    case 0: 
      $_SESSION['c urpg'] = 'home.php';
      //return true; 
    case 1: 
    case 2: 
      $this->_messages[] = "$filename exceeds maximum size: " . 
        $this->getMaxSize(); 
      return true; 
    default: 
   }
*/  
?>
