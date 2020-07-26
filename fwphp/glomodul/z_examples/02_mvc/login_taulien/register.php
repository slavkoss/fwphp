<?php 
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\login_taulien\register.php
  define('__CONFIG__', true); // Allow the config
  require_once "config.php"; 

  if($_SERVER['REQUEST_METHOD'] == 'POST') 
  {
    //header('Content-Type: application/json'); // Always return JSON format    

    $return = [];

    $email = Filter::String( $_POST['email'] );

    $user_found = User::Find($email);

    if($user_found) {
      // User exists 
      // We can also check to see if they are able to log in. 
      $return['error'] = "You already have an account";
      $return['is_logged_in'] = false;
    } else {
      // User does not exist, add them now. 

      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $dml = "INSERT INTO users(email, password) VALUES(LOWER(:email), :password)" ;
      $addUser = $con->prepare($dml);
      $addUser->bindParam(':email', $email, PDO::PARAM_STR);
      $addUser->bindParam(':password', $password, PDO::PARAM_STR);
      $addUser->execute();

      $user_id = $con->lastInsertId();

      $_SESSION['user_id'] = (int) $user_id;

      //for jquery: $return['redirect'] = '/dashboard.php?message=welcome';
      //for jquery: $return['is_logged_in'] = true;
    }

    //for jquery: echo json_encode($return, JSON_PRETTY_PRINT); exit;
    header('Location: '. $module_relpath  .'/dashboard.php?message=welcome');  exit;
  } else {
    // Die. Kill the script. Redirect the user. Do something regardless.
    exit('Invalid URL');
  }
?>
