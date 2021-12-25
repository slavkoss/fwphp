<?php
session_start();

define('__CONFIG__', true); 
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
  $user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
  $uname = strip_tags($_POST['txt_uname']);
  $umail = strip_tags($_POST['txt_umail']);
  $upass = strip_tags($_POST['txt_upass']);


  if($uname=="")  {
    $error[] = "<b><font color='red'>provide username !</font></b>";
  }
  else if($umail=="")  {
    $error[] = "<b><font color='red'>provide email id !";
  }
  else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))  {
      $error[] = "<b><font color='red'>Please enter a valid email address !</font></b>";
  }
  else if($upass=="")  {
    $error[] = "<b><font color='red'>provide password !</font></b>";
  }
  else if(strlen($upass) < 4){
    $error[] = "<b><font color='red'>Password must be atleast 4 characters</font></b>";
  }
  else
  {
    try
    {
      $stmt = $user->runQuery("SELECT user_name, user_email FROM users WHERE user_name=:uname OR user_email=:umail");
      $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
      $row=$stmt->fetch(PDO::FETCH_ASSOC);

      if($row['user_name']==$uname) {
        $error[] = "<b><font color='red'>sorry username already taken !</font></b>";
      }
      else if($row['user_email']==$umail) {
        $error[] = "<b><font color='red'>sorry email id already taken !</font></b>";
      }
      else
      {
        if($user->register($uname,$umail,$upass)){
          $user->redirect('sign-up.php?joined');
        }
      }
    }
    catch(PDOException $e)
    {
      echo $e->getMessage();
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="style.css" type="text/css">

    <title>Sign up</title>
</head>

<body>

<div id="main">


        <form method="post" >
            <h1>Sign up.</h1>
            <?php
      if(isset($error))
      {
         foreach($error as $error)
         {
           ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
        }
      }
      else if(isset($_GET['joined']))
      {
         ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='index.php'>login</a> here
                 </div>
                 <?php
      }
      ?>

            <input type="text" class="form-control" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" />


            <input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID" value="<?php if(isset($error)){echo $umail;}?>" />


              <input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />


              <input value="SIGN UP" type="submit" class="button" name="btn-signup">


            <p>have an account ! <a href="index.php">Sign In</a></p>
        </form>


</div>

</body>
</html>
