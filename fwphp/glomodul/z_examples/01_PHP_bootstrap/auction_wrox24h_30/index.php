<?php
/**
 * index.php
 *
 * Main file
 *
 * @version    1.2 2011-02-03
 * @package    Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
require_once 'includes/init.php';
$logged_in = Contact::isLoggedIn();
$accessLevel = Contact::accessLevel();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Smithside Auctions</title>
<link href="css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">

  <div id="header">
    <a href="index.php">
      <img src="/zinc/img/img_big/auction/banner.jpg"  alt="Smithside Auctions banner img" />
    </a> 
  </div><!-- end header -->
  
  <div id="navigation">
    <?php echo Menu::setMenu(); ?>
    <div class="clearfloat"></div>
  </div><!-- end navigation -->

  <div class="message">
    <?php echo $message; ?> 
  </div><!-- end message -->  
  
  <div class="sidebar">
    <?php loadContent('sidebar', ''); ?>
  </div><!-- end sidebar -->
  
  <div class="content">
    <?php loadContent('content', 'home'); ?>
  </div><!-- end content -->
  
  <div class="clearfloat"></div>
  
  <div id="footer">
    <p>&copy; <?php echo date('Y'); ?>  Smithside Auctions</p>
  </div><!-- end footer -->

</div><!-- end container -->
</body>
</html>
