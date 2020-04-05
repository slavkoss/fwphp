<?php
//J:\awww\apl\dev1\04knjige\kalendar\kal\public\del.php
//declare(strict_types=1); // php 7
$status = session_status();
if ($status == PHP_SESSION_NONE){ session_start(); } //if there is no active session

// Make sure an ID was passed and the user is logged in
// Collect ID from URL string or If no ID is supplied or user is not logged in, go to main file
if ( isset($_POST['event_id']) && isset($_SESSION['user']) ) { $id = (int) $_POST['event_id']; }
else { header('Location: ./'); exit; }

$dir = __DIR__ ; include_once 'inc/config.php';
// Mdl Load calendar (home.php)
$cal = new Home($dbo);
$markup = $cal->rowDelFrm($id);

// View Output header
$page_title = "Briši redak"; $fmte = 'css';
$css_files = array("style.$fmte", "admin.$fmte");
include_once 'inc/hdr.php';
?>
<div id="content">

   <?php echo $markup; ?>
   
</div><!-- end #content -->
<?php
include_once 'inc/ftr.php';
?>