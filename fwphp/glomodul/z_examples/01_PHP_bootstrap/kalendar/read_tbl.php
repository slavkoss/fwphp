<?php
// View
$cal = new Home($requested_month);  //$cal = n ew Home('2019-10-05 01:00:00');

$page_title = "Poruke kalendar mySQL";
$fmte = 'css';
$css_files = array("style.$fmte", "admin.$fmte", "ajax.$fmte");

include_once 'inc/hdr.php'; ?>

<div id="content">
  <?php echo $cal->outMonth() // Display calendar HTML ?>
</div>
<p><?php echo isset($_SESSION['user'])
    ? "Prijavljen je korisnik: ".$_SESSION['user']['name'] : "Niste prijavljeni!"; ?></p>
<!-- end #content -->

<?php include_once 'inc/ftr.php';
//if('1') { index_help(); }