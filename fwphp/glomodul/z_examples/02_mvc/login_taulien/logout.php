<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\login_taulien\logout.php
  session_start();
  session_destroy();
  session_write_close();
  setcookie(session_name(),'',0,'/');
  session_regenerate_id(true);

  header('Location: '. $module_relpath  .'/web/index.php');
?>
