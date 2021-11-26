<?php
session_start();

define('__CONFIG__', true); 

require("class.user.php");
$ousr = new USER();

if($ousr->is_loggedin()!="")
{
  $ousr->redirect('home.php');
}

if(isset($_POST['btn-login']) and $_POST['btn-login'] == 'SIGN IN')
{
                  echo '<pre>$_POST='; print_r($_POST) ; echo '</pre>'; 
  $uname = strip_tags($_POST['txt_uname_email']);
  $umail = strip_tags($_POST['txt_uname_email']);
  $upass = strip_tags($_POST['txt_password']);

  if($ousr->doLogin($uname,$umail,$upass))
  {
    $ousr->redirect('home.php');
  }
  else
  {
    $error = "<b><font color='red'>Wrong Details !</font></b>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Sign In</title>
</head>
<body>

<div id="main">
       <form  method="post" >
        <h1 >Sign In</h1>
        <?php
      if(isset($error))
      {
        ?>
          <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
        <?php
      }
    ?>
        <input type="text"  name="txt_uname_email" placeholder="Username or email" required />
        <input type="password"  name="txt_password" placeholder="Your Password" />
            <input value="SIGN IN" type="submit" name="btn-login" class="button">

            <p>Don't have account! <a href="sign-up.php">Sign Up</a></p>
      </form>



</div>

</body>
</html>
