<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\equip_graph_page.php
/*
  Display page containing graph
Image is included in normal HTML img tag.
If image doesn't display, it might be a problem in equip_graph_img.php 
due to text such as an error message or even because of white space 
before the <?php tag. This text will be included in image stream 
and make the picture invalid. To help debug this kind of problem 
you could comment out $session checks 
and also header() call in equip_graph_img.php.
 */
 
session_start();
require('_02autoload.php');
//require('Session.php');
//require('Page.php');
 
$sess = new \Equipment\Session;
$sess->getSession();
if (!isset($sess->username) || empty($sess->username)
         || !$sess->isPrivilegedUser()) {
    header('Location: index.php');
    exit;
}

$page = new \Equipment\Page;
$page->printHeader("AnyCo Corp. Equipment Graph");
$page->printMenu($sess->username, $sess->isPrivilegedUser());
 
echo <<<EOF
<div id='content'>
<img src='equip_graph_img.php' alt='Graph of office equipment'>
</div>
EOF;
 
$page->printFooter();
?>
