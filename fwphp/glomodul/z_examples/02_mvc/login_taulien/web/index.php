<?php 
//2018.11.09
define('__CONFIG__', true); // Allow the config

require_once "../config.php"; 

require_once "../hdr.php"; 
?>
    <div class="uk-section uk-container">
      <p>
        <a href="<?=$module_relpath?>/login_frm.php">Login</a> &nbsp; 
        <a href="<?=$module_relpath?>/register_frm.php">Register</a>
      </p>
    </div>

    <?php require_once "../ftr.php"; ?> 

