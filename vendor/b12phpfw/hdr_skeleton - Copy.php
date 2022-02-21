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

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title><?=isset($title)?$title:'MSG'?></title>
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– 
      $css = $shares_url .'themes/bootstrap/css/styles.css' ;
    echo '<link rel="stylesheet" href="'.$css.'">';
    if (isset($css1)) echo '<link rel="stylesheet" href="'.$css1.'">'; //and !($c ss1==='NO')
  -->
  <link href='/vendor/b12phpfw/themes/skeleton/raleway_300_400.css' rel='stylesheet' type='text/css'>
  <!--link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'-->
  

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– ../../dist/css/  -->
  <link rel="stylesheet" href="/vendor/b12phpfw/themes/skeleton/normalize.css">
  <link rel="stylesheet" href="/vendor/b12phpfw/themes/skeleton/skeleton.css">
  <link rel="stylesheet" href="custom.css">

  <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!--script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script-->

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <!--link rel="icon" type="image/png" href="images/favicon.png"-->

</head>

<body>

<!--div class="container"-->
