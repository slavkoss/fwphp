<?php
$param = null; $par2 = null;
if (isset($_GET["param"])) $param = $_GET["param"];
if (isset($_GET["par2"])) $par2 = $_GET["par2"];
//list($param, $par2) = explode('|', $_REQUEST['user_text']);
//$response = strtoupper( $user_text ) ;
//echo $response ;
?>

<span style="”background-color:#cccccc;">Ispisala skripta: <?php echo basename(__FILE__) ; ?></span> 

<br><br>1. Ova php skripta je pozvana asinhronim JS requestom 
(kao klijent-serverski potprogram) sa parametrima:
<ol>
  <li>param=<?php echo $param; ?>
  <li>par2=<?php echo $par2; ?>
</ol>

<hr />
2. \n = Line break u JS alertu: lijeva kosa pa n, 
<strong>obavezno u dvostrukim navodnicima</strong> (&quot;&quot;).

<hr />
3. <strong>U JS alert ne ide html</strong>, npr $lt;hr>.<br>
Zato je bolje print php-a ispisivati JS-om u div-u ili spanu html-a.

<hr />
4. Vidi L1 (Ballard).
<br>