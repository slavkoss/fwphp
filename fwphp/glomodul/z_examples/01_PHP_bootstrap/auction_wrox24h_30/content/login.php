<?php
/**
 * login.php
 *
 * Login
 *
 * @version    1.2 2011-02-03
 * @package    Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
?>
<h1>Login</h1>

<form action="index.php" method="post" name="maint" id="maint">

  <fieldset class="maintform">
    <legend>Login</legend>
    <ul>
      <li><label for="user_name" class="required">User Name</label><br />
        <input type="text" name="user_name" id="user_name" class="required" /></li>
      <li><label for="password" class="required">Password</label><br />
        <input type="password" name="password" id="password" class="required" /></li>
    </ul>

    <?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="task" id="task" value="login" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="login" value="Login" />
    <a class="cancel" href="index.php">Cancel, return to Home Page</a>
  </fieldset>
</form>
