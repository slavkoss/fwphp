<?php

  session_start();

  define('__CONFIG__', true); 

  require_once 'class.user.php';
  $ousr = new USER();

  // if user ousr (session) is not active(not loggedin) this page will help 'home.php and profile.php' to redirect to login page
  // put this file within secured pages that users (users can't access without login)

  if(!$ousr->is_loggedin())
  {
    // if session no set redirects to login page
    $ousr->redirect('denied.php');
  }
