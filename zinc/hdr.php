<?php
$shares_url = $pp1->shares_url ;
/*if ( isset($pp1) and is_object($pp1) ) {
  if ( isset($pp1->wsroot_ url) and null !== $pp1->wsroot_ url ) { $wsroot_ url=$pp1->wsroot_ url; }
  else { $wsroot_ url = '/' ; } ;
}
*/
?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1 shrink-to-fit=no">
  <title><?=isset($title)?$title:'MSG'?></title>

  <!-- 4.3.1 -->
  <!--link rel="stylesheet" href="<=$wsroot_ url>zinc/themes/bootstrap/css/bootstrap.min.css"-->
  <?php
  if ('1'): { // '0' for testing to see own  d e b u g  m s g s
    $css = $shares_url .'themes/bootstrap/css/bootstrap.min.css' ;
    echo '<link rel="stylesheet" href="'.$css.'">';

    if (isset($css1)) echo '<link rel="stylesheet" href="'.$css1.'">'; //and !($c ss1==='NO')

    if (isset($css2)) echo '<link rel="stylesheet" href="'.$css2.'">';
    if (isset($css3)) echo '<link rel="stylesheet" href="'.$css3.'">';
    if (isset($css4)) echo '<link rel="stylesheet" href="'.$css4.'">';
    if (isset($css5)) echo '<link rel="stylesheet" href="'.$css5.'">';
    if (isset($css6)) echo '<link rel="stylesheet" href="'.$css6.'">';
  } endif;
  ?>


</head>
<body>
