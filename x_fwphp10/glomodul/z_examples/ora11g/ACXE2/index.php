<?php
//  requires PHP >= 5.3
// H:\dev_web\htdocs\t_oci8\ACXE2\index.php
// http://dev:8083/t_oci8/ACXE2/index.php
//see http://www.oracle.com/webfolder/technetwork/tutorials/obe/db/11g/r2/prod/appdev/opensrclang/php/php.htm
session_start(); //  before any output is created  
require('_02autoload.php');
//require('Session.php');
//require('Page.php');
 
$sess = new \Equipment\Session;
$sess->clearSession(); // = logout = allows the file to serve as a logout page
 
if ( !isset($_POST['username']) ) {
    $page = new \Equipment\Page;
    
    $page->printHeader("Welcome to AnyCo Corp.");
    ?>
      <div id="content">
         <h3>Select User</h3>
         <form method="post" action="index.php">
         <div>
            <input type="radio" name="username" value="admin">Administrator<br />
            <input type="radio" name="username" value="simon">Simon<br />
            <input type="submit" value="Prijava">
         </div>
         </form>
      </div>
    <?php
// Important: dont have white space on the 'EOF;' line before or after the tag
    
    $page->printFooter();

} else { // i s s e t($_ POST['user name']
    if ($sess->authenticateUser($_POST['username'])) {
        $sess->setSession(); // usr name, mast. start row
        header('Location: emp_tbl.php');
    } else {
        header('Location: index.php');
    }
}
 
?>