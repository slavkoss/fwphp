<?php
//  H:\dev_web\htdocs\t_oci8\ACXE2\ses_pg. inc. php

namespace Equipment;

// zakomentirati ako necemo prikaz loga u  h d r <-- URL of company logo
//define('LOGO_URL', 'http://dev:8083/t_oci8/ACXE2/logo_img_cre.php');
//define('LOGO_URL', 'http://dev1:8083/afinc/img/header.jpg');

// ***************************************************************
//Page class provide methods to output blocks of HTML output 
//so each web page has same appearance.
// ***************************************************************
class Page {

    public function printHeader($title) 
    {
      $title = htmlspecialchars($title, ENT_NOQUOTES, 'UTF-8');
      ?>
      <!DOCTYPE HTML>
      <html>
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" href="style_acxe.css">
        <title>$title</title>
      </head>
      <body>
      <div id="header">
      <?php
      // Important: don't have white space on 'EOF;' line before or after tag
      if (defined('LOGO_URL')) {
         echo '<img src="' . LOGO_URL . '" alt="Company Icon">&nbsp;';
      }
      echo "$title</div>";
    }

    public function printFooter() {
        echo "</body></html>\n";
    }
    
// left hand navigation menu - method print it:
    public function printMenu($username, $isprivilegeduser) 
    {
      $username = htmlspecialchars($username, ENT_NOQUOTES, 'UTF-8');
      ?>
      <div id='menu'>
        <div id='user'>
           Korisnik (authentificated): ...<br />
           Prava (authorized): $username 
        </div>
        <ul>
          <li><a href='B5_tbl_vv.php'>Tablica</a></li>
          <?php
          if ($isprivilegeduser) {
            ?>
            <li><a href='B5B6_vv.php'>Ispis stavki</a></li>
            <li><a href='B6_graph_page.php'>Graf stavki</a></li>
            <li><a href='logo_upload.php'>Upload Logo</a></li>
            <?php
          }
          ?>
          <li><a href="index.php">Promjena prava</a></li>
        </ul>
      </div>
      <?php
    }
    
}  // e n d  c l a s s  P a g e
 
