<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\logo_upload.php
// http://dev:8083/t_oci8/ACXE2/logo_upload.php
session_start();
require('_02autoload.php');
//require('Db.php');
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
$page->printHeader("AnyCo Corp. Upload Logo");
$page->printMenu($sess->username, $sess->isPrivilegedUser());
printcontent($sess);
$page->printFooter();
 
// Functions
function printcontent($sess) {
    echo "<div id='content'>";
    if (!isset($_FILES['lob_upload'])) {
        printform();
    } else {
        $blobdata = file_get_contents($_FILES['lob_upload']['tmp_name']);
        if (!$blobdata) {  
            // N.b. this test could be enhanced to confirm the image is a JPEG
            printform();
        } else {
            $db = new \Oracle\Db("Equipment", $sess->username);
            $sql = 'INSERT INTO pictures (pic)
                    VALUES(EMPTY_BLOB()) RETURNING pic INTO :blobbind';
            $db->insertBlob($sql, 'Insert Logo BLOB', 'blobbind', $blobdata);
            echo '<p>New logo was uploaded</p>';
        }
    }
    echo "</div>";  // content
}

function printform() {
    echo <<<EOF
Upload new company logo:
<form action="logo_upload.php" method="POST" enctype="multipart/form-data">
<div>
   Image file name: <input type="file" name="lob_upload">
   <input type="submit" value="Upload"
</div>
<form
EOF;
}

?>