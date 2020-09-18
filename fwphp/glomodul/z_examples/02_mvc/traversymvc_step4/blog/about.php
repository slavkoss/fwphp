<?php
//require $pp1->module_app_path . '/views/inc/header.php';
require $pp1['$pp1->module_app_path'] . '/views/inc/header.php';
?>

  <h1>About</h1>
  <p>This is a social network type app built on the TraversyMVC framework</p>
  <p>App Version: <?php echo $data['version']; ?></p>

<?php
$call_from_path = __FILE__ ; require $pp1->module_app_path . '/views/inc/footer.php';