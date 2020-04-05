<?php
// J:\awww\www\fwphp\glomodul\help_sw\test\gallery_powers\ctrmenu.php
//        H:\dev_web\htdocs\t_oci8\ctrmenu.php
//ako se ova skripta uvrstava u pojedinu stranicu:
//$curpg = basename($_SERVER['SCRIPT_FILENAME']); //basename(__FILE__)
//ako se ova skripta uvrstava samo u  i n d e x . p h p:
$cpg = $_SESSION['pgbdy']; //current page
$cpgx = '';
?>
<!--  ul id="nav"  -->
<ul id="nav">
  <li><a href="ctr.php?inc=home.php" <?php if ($cpg == 'home.php') {
     echo 'id="here"';} ?>>Prva <?php echo $cpgx;?></a></li>
  <li><a href="ctr.php?inc=blog.php" <?php if ($cpg == 'blog.php') {
     echo 'id="here"';} ?>>Blog <?php echo $cpgx;?></a></li>
  <li><a href="ctr.php?inc=slike.php" <?php if ($cpg == 'slike.php') {
     echo 'id="here"';} ?>>Slike</a></li>
  <li><a href="ctr.php?inc=contact.php" <?php if ($cpg == 'contact.php') {
      echo 'id="here"';} ?>>Kontakt</a></li>
   <li><a href="ctr.php?inc=help.php" <?php if ($cpg == 'help.php') {
      echo 'id="here"';} ?>>Pomoć</a></li>
</ul>
