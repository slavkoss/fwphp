<!doctype html>

<html lang="en">
  <head>
    <title>Chain Gang <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php 
       echo PUBLIC_REL_PATH . 'public.css' ;
       //echo url_for('/stylesheets/public.css');
       ?>" />
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo url_for('/index.php'); ?>">
          <img class="bike-icon" src="<?php 
               echo '/zinc/img/shit.jpg' ;
               //echo url_for('images/USDOT_bicycle_symbol.svg')
             ?>" /><br />
          Chain Gang
        </a>
      </h1>
    </header>
