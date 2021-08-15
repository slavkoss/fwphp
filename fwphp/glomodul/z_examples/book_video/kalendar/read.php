<?php
//J:\awww\apl\dev1\04knjige\kalendar\kal\read.php
//declare(strict_types=1); // php 7
//if ( isset($_GET['event_id']) ) // Make sure ID was passed
{ // Make sure ID is an integer
  //$id = preg_replace('/[^0-9]/', '', $_GET['event_id']);
  $id = preg_replace('/[^0-9]/', '', $event_id);
  // If ID isn't valid, send the user to the main page
  if ( empty($id) ) {header('Location: ./'); exit;}
} //else // Send user to main page if no ID is supplied
  //{ header('Location: ./'); exit; }

$dir = __DIR__ ; //include_once 'inc/config.php';

// View Output hdr
$page_title = "Poruka pregled"; $fmte = 'css';
$css_files = array("style.$fmte", "admin.$fmte");

include_once 'inc/hdr.php';

// Mdl Load calendar (home.php)
$cal = new Home();
?>
<div id="content">

 <a href="./">&laquo; Natrag u kalendar</a><?php echo $cal->rowRead($id) ?>
 
</div><!-- end #content -->

<?php
include_once 'inc/ftr.php';
