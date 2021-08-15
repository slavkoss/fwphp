<?php
// J:\awww\apl\dev1\04knjige\kalendar\kal\cre_upd.php
//declare(strict_types=1); // php 7
//$dir = __DIR__ ; include_once 'inc/config.php';
// If user is not logged in, send them to main file
if ( !isset($_SESSION['user']) ) {header('Location: ./'); exit;}

// View Output hdr
$page_title = "Msg Formular"; $fmte = 'css';
$css_files = array("style.$fmte", "admin.$fmte");


include_once 'inc/hdr.php';

// Mdl Load calendar (home.php)
$cal = new Home();
?>
<div id="content">
   <?php echo $cal->RowCUfrm(); ?>
</div><!-- end #content -->

<?php include_once 'inc/ftr.php'; ?>