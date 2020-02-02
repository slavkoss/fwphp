<?php
switch (true) {
  case isset($wsroot_url)      : NULL ; break;
  case isset($pp1->wsroot_url) : $wsroot_url = $pp1->wsroot_url ; break;
  default: $wsroot_url = '/' ; break;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1 shrink-to-fit=no">
  <title><?=isset($title)?$title:'MSG'?></title>
  
  <!-- 4.3.1 -->
  <link rel="stylesheet" href="<?=$wsroot_url?>zinc/themes/bootstrap/css/bootstrap.min.css">
  <?php
  
  if (!isset($css1)) $css1 = 'styles.css' ;
  
  if (isset($css1)) echo '<link rel="stylesheet" href="'.$css1.'">';
  
  if (isset($css2)) echo '<link rel="stylesheet" href="'.$css2.'">';
  if (isset($css3)) echo '<link rel="stylesheet" href="'.$css3.'">';
  if (isset($css4)) echo '<link rel="stylesheet" href="'.$css4.'">';
  if (isset($css5)) echo '<link rel="stylesheet" href="'.$css5.'">';
  if (isset($css6)) echo '<link rel="stylesheet" href="'.$css6.'">';
  
  ?>
</head>
<body>
