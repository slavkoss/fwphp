<!-- J:\xampp\htdocs\zy_oopmvc_udemy\app\views\inc\header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous"-->
  <link rel="stylesheet" href="/zinc/themes/bootstrap/css/bootstrap.min.css">

  <!--link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"-->
  <link rel="stylesheet" href="/zinc/themes/bootstrap/css/fontawesomemin.css">

  <title><?php echo SITENAME; ?></title>
</head>

<body>
  <?php require dirname($pp1->module_path)  . '/navbar.php';
  //require $pp1->module_app_path . '/views/inc/navbar.php'; ?>
  <div class="container">