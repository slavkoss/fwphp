<?php 
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\login_taulien\dashboard.php
  define('__CONFIG__', true); // Allow the config
  require_once "config.php"; 

  Page::ForceLogin($module_relpath);

  $User = new User($_SESSION['user_id'], $module_relpath);

require_once "hdr.php"; 
?>
    <div class="uk-section uk-container">
      <h2>Dashboard</h2>

      <p>Hello <?php echo $User->email; ?>, you registered at <?php echo $User->reg_time; ?></p>

      <p><a href="logout.php">Logout</a></p>



      <p>Ideas for extending this system:</p>
      <ul>
        <li>NEW FEEDS</li>
        <li>FRIEND FEED</li>
        <li>CHANGE EMAIL</li>
        <li>CHANGE PASSWORD</li>
        <li>RESET PASSWORD</li>
        <li>INVITE MODULE </li>
        <li>ADD FIRST NAME</li>
        <li>ADD LASTNAME</li>
        <li>ADD EMAIL CONFIRMATION</li>
        <li>ADD SMS CONFIRMATION (VIA TWILIO)</li>
      </ul>
      <p>Pick one of these and build it yourself. It'll be fun! Don't forget to ask questions in our group: <a href="https://www.facebook.com/groups/1088943884540928/">https://www.facebook.com/groups/1088943884540928/</a>
      </p>
    </div>

    <?php require_once "ftr.php"; ?> 
  </body>
</html>
