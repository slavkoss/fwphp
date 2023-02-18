<?php
session_start();

// ***************************************** //
// **********  DECLARE VARIABLES  ********** //
// ***************************************** //
$self = $_SERVER['REQUEST_URI'];

$username = 'usr'; // from users tbl
$password = 'psw'; // from users tbl

$hash = md5('secret_key1'.'pswxyz123'.'secret_key2'); 

// ************************************ //
// **********  USER LOGOUT  ********** //
// ************************************ //

if(isset($_GET['logout'])) {
  unset($_SESSION['login']);
}


// ******************************************* //
// **********  1/3 USER IS LOGGED IN  ********** //
// ******************************************* //

if (isset($_SESSION['login']) && $_SESSION['login'] == $hash) {

  ?>
      
    <p>Hello <?php echo $username; ?>, you have successfully logged in!</p>
    <a href="?logout=true">Logout?</a>
      
  <?php
}


// *********************************************** //
// **********  2/3 FORM HAS BEEN SUBMITTED  ********** //
// *********************************************** //

else if (isset($_POST['submit'])) {

  if ($_POST['username'] == $username && $_POST['password'] == $password){
  
    //IF USERNAME AND PASSWORD ARE CORRECT SET THE LOG-IN S ESSION
    $_SESSION["login"] = $hash;
    header("Location: $_SERVER[PHP_SELF]");
    
  } else {
    
    // DISPLAY FORM WITH ERROR
    display_login_form($self);
    echo '<p>Username or password is invalid</p>';
    
  }
}
  
  
// *********************************************** //
// **********  3/3 SHOW THE LOG-IN FORM  ********** //
// *********************************************** //

else {
  display_login_form($self);
}


function display_login_form($self) { ?>

  <form action="<?php echo $self; ?>" method='post'>
    <label for="username">username</label><input value="usr" type="text" name="username" id="username">
    <label for="password">password</label><input value="psw" type="password" name="password" id="password">

    <input type="submit" name="submit" value="submit">
  </form>  

<?php } ?>
