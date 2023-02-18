<?php
$wsroot_url = ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
     // 2. URL_DOM AIN = dev1:8083 :
  . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

$curtime = date("Y-m-d H:i:s");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1"> <!--shrink-to-fit=no-->
  <title><?=isset($title)?$title:'TMPL'?></title>
  <!-- 4.3.1 -->
  <link rel="stylesheet" href="<?=$wsroot_url?>vendor/b12phpfw/themes/bootstrap/css/styles.css">
<!--link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"-->

<style>
   body {
  padding-top: 5px;
}
</style>
</head>


<body>
