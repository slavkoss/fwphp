<?php
$title='Blog' ;
require_once("ahdr.php");


if(isset($_POST["Submit"]))
{
   $Username=escp($_POST["Username"]);
   $Password=escp($_POST["Password"]);
                   //$bodytag = str_replace("%body%", "black", "<body text='%body%'>");
                   //$Username=str_replace('"','\'', $conn->quote($_POST["Username"])) ; // mysql_real_escape_string
                   //$Password=str_replace('"','\'', $conn->quote($_POST["Password"])) ;

  if(empty($Username)||empty($Password)){
    $_SESSION["ErrorMessage"]="All Fields must be filled out, usr=$Username psw=$Password";
    Redirect_to("Login.php");
    
  }
  else{
    $Found_Account=Login_Attempt($Username,$Password);
    $_SESSION["User_Id"]=$Found_Account["id"];
    $_SESSION["Username"]=$Found_Account["username"];
    if($Found_Account){
    $_SESSION["SuccessMessage"]="Welcome  {$_SESSION["Username"]} ";
    Redirect_to("Dashboard.php");
      
    }else{
      $_SESSION["ErrorMessage"]="Invalid Username / Password";
    Redirect_to("Login.php");
    }
    
  }	
}	


?>


<div class="container-fluid">
<div class="row">
	
	<div class="col-sm-offset-4 col-sm-4">
		<br><br><br><br>
		<?php echo Message();
	      echo SuccessMessage();
	?>
	<h2>Welcome back !</h2>
	
<div>
<form action="Login.php" method="post">
	<fieldset>
	<div class="form-group">
	<label for="Username"><span class="FieldInfo">UserName:</span></label>
	<div class="input-group input-group-lg">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-envelope text-primary"></span>
	</span>
	<input class="form-control" type="text" name="Username" id="Username" placeholder="Username eg a">
	</div>	
	</div>
	
	<div class="form-group">
	<label for="Password"><span class="FieldInfo">Password:</span></label>
	<div class="input-group input-group-lg">
	<span class="input-group-addon">
	<span class="glyphicon glyphicon-lock text-primary"></span>
	</span>
	<input class="form-control" type="Password" name="Password" id="Password" placeholder="Password eg aaaa">
	</div>
	</div>
	
	<br>
<input class="btn btn-info btn-block" type="Submit" name="Submit" value="Login">
	</fieldset>
	<br>
</form>

	</div> <!-- Ending of Main Area-->
	
</div> <!-- Ending of Row-->
	
</div> <!-- Ending of Container-->

	    
	</body>
</html>