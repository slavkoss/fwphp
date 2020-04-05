<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\logo_img_cre.php
// H:\dev_web\htdocs\t_oci8\ACXE2\suza2.JPG 
/*  
 Create JPEG image of company logo
 Don't have any text or white space before "<?php" tag because 
 it will be incorporated into image stream and corrupt picture.
Logo is displayed in Page::printHeader(). Every standard app page 
will show logo.
To display uploaded logo in edit Session.php un-comment LOGO_ URL 
definition:
define('LOGO_URL', 'http://localhost/logo_img_cre.php');

Displaying logo is similar in concept to how graph image was displayed in
previous chapter. Since BLOB is already in JPEG format, 
GD extension is not required.

Queries most recent logo and sends it back as a JPEG stream. If the image 
appears corrupted, comment out the header() and echo function calls 
and check if any text or white space is being emitted by the script.
User name check differs from those used in previous sections. Logo is 
displayed on all pages including the login page before the web user name is known. 
Because Db accepts user name for end-to-end tracing, logo_img_cre.php uses a 
bootstrap user name unknown-logo.
*/
 
session_start();
require('_02autoload.php');
//require('Db.php');
//require('Session.php');
//require('Page.php');
 
$sess = new \Equipment\Session;
$sess->getSession();
if (isset($sess->username) && !empty($sess->username)) {
    $username = $sess->username;
} else { // index.php during normal execution, or other external caller
    $username = "unknown-logo";
}
 
$db = new \Oracle\Db("Equipment", $username);
$sql = 'SELECT pic FROM pictures WHERE id = (SELECT MAX(id) FROM pictures)';
$img = $db->fetchOneLob($sql, "Get Logo", "pic");
 
header("Content-type: image/jpg");
echo $img;
?>
