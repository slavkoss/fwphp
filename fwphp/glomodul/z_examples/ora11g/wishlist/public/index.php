<!DOCTYPE HTML>
<?php
session_start();
require_once("Includes/db.php");
$logonSuccess = false;
$loginFormVisibility = "visible";

// verify user's credentials
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $logonSuccess = (
            WishDB::getInstance()->verify_wisher_credentials(
                    $_POST['user'], $_POST['userpassword']
            )
            );
    if ($logonSuccess == true) {
        $_SESSION['user'] = $_POST['user'];
        header('Location: editWishList.php');
        exit;
    }
} else {
    if (isset($_SESSION["user"])) {
        $logonSuccess = true;
    }
}
if (true === $logonSuccess) {
    $loginFormVisibility = "hidden";
}
?>


<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Wish List Application</title>
      <link href="wishlist.css" type="text/css" rel="stylesheet" media="all" />
  </head>
  <body>



    <div id="XXXcontent">
      <div class="logon">
        <a href="createNewWisher.php">
           Create (register) Wish List (master eg user, TODO list of msgs group) with psw</a>
      </div>

      <div class="XXXwelcome">
          <!--img src="static/logo1.jpg" alt="logo"/>
          <img src="static/logo2.jpg" alt="logo"/>
          <br/>
          <img src="static/logo3.jpg" alt="logo"/>
          <img src="static/logo5.jpg" alt="logo"/-->
      </div>

      <div class="logon">
          <input type="submit" name="myWishList" value="Log in to Wish List (master with psw) >>"
                 onclick="javascript:showHideLogonForm()"/>
          <form name="logon" action="index.php" method="POST"
                style="visibility:<?php echo $loginFormVisibility; ?>">
              Username (or msgs group) eg ss or a : <input type="text" name="user"/>
              Msgs group password eg ss or a:  <input type="password" name="userpassword"/><br/>
              <div class="error">
                  <?php
                  if ($_SERVER['REQUEST_METHOD'] == "POST") {
                      if (!$logonSuccess)
                          echo "Invalid name and/or password";
                  }
                  ?>
              </div>
              <input type="submit" value="Edit Wish List (master with psw)"/>
          </form>
      </div>

      <div class="showWishList">
          <input type="submit" name="showWishList"
                 value="Show details of Wish List (master with psw) >>"
                 onclick="javascript:showHideShowWishListForm()"/>
          <form name="wishList" action="wishlist.php"
                method="GET" style="visibility:hidden">
              <input type="text" name="user"/>
              <input type="submit" value="Go" />
          </form>
      </div>
      <div class="createWishList">
          <!--a href="createNewWisher.php">Create (register) usr (master) </a-->
      </div>
    </div>

    <script type="text/javascript" src="wishlist.js"></script>
  </body>
</html>