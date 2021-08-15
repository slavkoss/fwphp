<?php
/**
 * index.php   * @since      Since Release 1.0
 * @version    1.2 2011-02-03 * @package    Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions * @license    GNU General Public License
 */
require_once 'includes/init.php';
$logged_in   = Contact::isLoggedIn();
$accessLevel = Contact::accessLevel();
?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <title>Smithside Auctions</title>
  <link href="css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
  <div id="header"><a href="index.php"><img src="/zinc/img/img_big/auction/banner.jpg"  alt="banner img" /></a> </div>
  
      <div id="navigation"><?php echo Menu::setMenu(); ?><div class="clearfloat"></div></div>
      <div class="message"><?php echo $message; ?></div>
      <div class="sidebar"><?php loadContent('sidebar', ''); ?></div>
      
      <div class="content"><?php loadContent('content', 'home'); ?></div><div class="clearfloat"></div>
  
  <div id="footer"><p>&copy; <?php echo date('Y'); ?>  Smithside Auctions</p></div>
</div><!-- end container -->
</body>
</html>
