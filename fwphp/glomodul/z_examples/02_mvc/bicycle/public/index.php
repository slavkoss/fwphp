<?php
  require_once('../private/initialize.php');
  include(PRIVATE_PATH . 'hdr.php');
?>

<div id="main">
  <ul id="menu">
    <li><a href="<?php echo url_for('bicycles.php'); ?>">View Our Inventory</a></li>
    <li><a href="<?php echo url_for('about.php'); ?>">About Us</a></li>
  </ul>
    
</div>

<?php

  $super_hero_image = '/zinc/img/img_big/lav.jpg';
  include(PRIVATE_PATH . 'ftr.php');
