<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\index.php
// http://dev:8083/t_oci8/ACXE2/index.php
session_start(); //  before any output is created  
require('ses_pg.inc.php');
 
$sess = new \Equipment\Session;
$sess->clearSession(); // = logout = allows the file to serve as a logout page
 
if ( !isset($_POST['username']) ) {
    $page = new \Equipment\Page;
    $page->printHeader("Welcome to AnyCo Corp.");
    echo <<< EOF
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
EOF;
// Important: dont have white space on the 'EOF;' line before or after the tag
    $page->printFooter();
} else {
    if ($sess->authenticateUser($_POST['username'])) {
        $sess->setSession();
        header('Location: B5_tbl_vv.php');
    } else {
        header('Location: index.php');
    }
}
 
?>



<?php
//  H:\dev_web\htdocs\t_oci8\ACXE2\ses_pg.inc.php
namespace Equipment;
// zakomentirati ako necemo prikaz loga u  h d r <-- URL of company logo
//define('LOGO_URL', 'http://dev:8083/t_oci8/ACXE2/logo_img_cre.php');

class Session {
    public $username = null;
    public $empstartrow = 1;
    public $csrftoken = null;

    public function authenticateUser($username) {
        switch ($username) {
            case 'admin':
            case 'simon':
                $this->username = $username;
                return(true);  // OK to log in
            default:
                $this->username = null;
                return(false); // Not OK
        }
    }
 
    public function isPrivilegedUser() {
        if ($this->username === 'admin')
            return(true);
        else
            return(false);
    }
    
    
    public function setSession() {
        $_SESSION['username']    = $this->username;
        $_SESSION['empstartrow'] = (int)$this->empstartrow;
        $_SESSION['csrftoken']   = $this->csrftoken;
    }
 
    public function getSession() {
        $this->username = isset($_SESSION['username']) ?
             $_SESSION['username'] : null;
        $this->empstartrow = isset($_SESSION['empstartrow']) ?
             (int)$_SESSION['empstartrow'] : 1;
        $this->csrftoken = isset($_SESSION['csrftoken']) ?
             $_SESSION['csrftoken'] : null;
    }
 
   // Logout current user
    public function clearSession() {
        $_SESSION = array();
        $this->username = null;
        $this->empstartrow = 1;
        $this->csrftoken = null;
    }

    public function setCsrfToken() {
        $this->csrftoken = mt_rand();
        $this->setSession();
    }
      
}  // e n d  c l a s s  S e s s i o n


// ***************************************************************
//Page class provide methods to output blocks of HTML output 
//so each web page has same appearance.
// ***************************************************************
class Page {

    public function printHeader($title) {
        $title = htmlspecialchars($title, ENT_NOQUOTES, 'UTF-8');
        echo <<<EOF
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
     "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
  <meta http-equiv="Content-Type"
        content="text/html; charset=utf-8">
  <link rel="stylesheet" type="text/css" href="/inc/style_acxe.css">
  <title>$title</title>
</head>
<body>
<div id="header">
EOF;
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
    public function printMenu($username, $isprivilegeduser) {
        $username = htmlspecialchars($username, ENT_NOQUOTES, 'UTF-8');
        echo <<<EOF
<div id='menu'>
<div id='user'>
Korisnik: ...<br />
Prava: $username 
</div>
<ul>
<li><a href='B5_tbl_vv.php'>Tablica</a></li>
EOF;
        if ($isprivilegeduser) {
            echo <<<EOF
<li><a href='B5B6_vv.php'>Ispis stavki</a></li>
<li><a href='B6_graph_page.php'>Graf stavki</a></li>
<li><a href='logo_upload.php'>Upload Logo</a></li>
EOF;
        }
        echo <<<EOF
<li><a href="index.php">Promjena prava</a></li>
</ul>
</div>
EOF;
    }
}  // e n d  c l a s s  P a g e
 
?>




<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\B5_tbl_vv.php
define('NUMRECORDSPERPAGE', 5);
 
session_start();
require('db.inc.php');
require('ses_pg.inc.php');
 
$sess = new \Equipment\Session;
$sess->getSession();
if ( !isset($sess->username) || empty($sess->username) ) {
    header('Location: index.php');
    exit;
}
 
$page = new \Equipment\Page;
$page->printHeader("AnyCo Corp. Employees List");
$page->printMenu($sess->username, $sess->isPrivilegedUser());
printcontent($sess, calcstartrow($sess));
$page->printFooter();
 
// Functions

function printcontent($sess, $startrow) {
    echo "<div id='content'>";
 
    $db = new \Oracle\Db("Equipment", $sess->username);
    $sql = "SELECT employee_id, first_name || ' ' || last_name AS name,
            phone_number FROM employees ORDER BY employee_id";
    $res = $db->execFetchPage($sql, "Equipment Query", $startrow,
           NUMRECORDSPERPAGE);
    if ($res) {
        printrecords($sess, ($startrow === 1), $res);
    } else {
        printnorecords();
    }
 
    echo "</div>";  // content
    // Save the session, including the current data row number
    $sess->empstartrow = $startrow;
    $sess->setSession();
}

function calcstartrow($sess) {
    if (empty($sess->empstartrow)) {
  $startrow = 1;
    } else {
        $startrow = $sess->empstartrow;
        if (isset($_POST['prevemps'])) {
            $startrow -= NUMRECORDSPERPAGE;
            if ($startrow < 1) {
                $startrow = 1;
            }
        } else if (isset($_POST['nextemps'])) {
            $startrow += NUMRECORDSPERPAGE;
        }
    }
    return($startrow);
}

function printrecords($sess, $atfirstrow, $res) {
    echo <<< EOF
        <table border='1'>
        <tr><th>Zaposlenik</th><th>Telef. broj</th><th>Stavke (oprema)</th></tr>
EOF;
    foreach ($res as $row) {
        $name = htmlspecialchars($row['NAME'], ENT_NOQUOTES, 'UTF-8');
        $pn   = htmlspecialchars($row['PHONE_NUMBER'], ENT_NOQUOTES, 'UTF-8');
        $eid  = (int)$row['EMPLOYEE_ID'];
        echo "<tr><td>$name</td>";
        echo "<td>$pn</td>";
        echo "<td><a href='B6_tbl_vv.php?empid=$eid'>Pokaži</a> ";
        if ($sess->isPrivilegedUser()) {
            echo "<a href='B6_cre.php?empid=$eid'>+dodaj</a>";
            echo "<a href='B6_cre_multi.php?empid=$eid'> +nekoliko</a>\n";
        }
        echo "</td></tr>\n";
    }
    echo "</table>";
    printnextprev($atfirstrow, count($res));
}

function printnextprev($atfirstrow, $numrows) {
    if (!$atfirstrow || $numrows == NUMRECORDSPERPAGE) {
        echo "<form method='post' action='B5_tbl_vv.php'><div>";
        if (!$atfirstrow)
            echo "<input type='submit' value='< Preth.' name='prevemps'>";
        if ($numrows == NUMRECORDSPERPAGE)
            echo "<input type='submit' value='Sljed.>' name='nextemps'>";
        echo "</div></form>\n";
    }
}

// to display a message when there are no records to show:
function printnorecords() {
    if (!isset($_POST['nextemps'])) {
        echo "<p>No Records Found</p>";
    } else {
        echo <<<EOF
            <p>No More Records</p>
            <form method='post' action='B5_tbl_vv.php'>
            <input type='submit' value='< Previous' name='prevemps'></form>
EOF;
    }
}

 
?>




<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\B6_tbl_vv.php
session_start();
require('db.inc.php');
require('ses_pg.inc.php');
 
$sess = new \Equipment\Session;
$sess->getSession();
if (!isset($sess->username) || empty($sess->username) || !isset($_GET['empid'])) 
   { header('Location: index.php');  exit; }
$empid = (int) $_GET['empid']; //  filter user input, escape output
//
$page = new \Equipment\Page;
$page->printHeader("AnyCo Corp. Show Equipment");
$page->printMenu($sess->username, $sess->isPrivilegedUser());
      //  To prevent ugly default err msg, PHPs output buff is used, tj:
      //  umjesto: printcontent($sess, $empid); treba ga wrap in try-catch block :
      ob_start();
      try {
          printcontent($sess, $empid);
      } catch (Exception $e) {
          ob_end_clean(); 
          echo "<div id='content'>\n";
             echo "Greška u ispisu sadržaja stranice (errmsg0001)";
          echo "</div>";
      }
      ob_end_flush();
$page->printFooter();
 
// Functions
function printcontent($sess, $empid) {
    echo "<div id='content'>\n";
    $db = new \Oracle\Db("Equipment", $sess->username);
    $empname = htmlspecialchars(getempname($db, $empid), ENT_NOQUOTES, 'UTF-8');
    echo "$empname has: ";
    //throw new Exception; // za test Display Custom errmsg0001
        // ispise: Steven King has: Fatal error: Uncaught exception 'Exception' in...
    $sql = "BEGIN get_equip(:id, :rc); END;";
    //  return array of records, printed in loop.
    // REF CURSOR bind parameter :rc needs to be bound specially. 
    // Since bind var. name could be arbitrarily chosen or located anywhere 
    // in statement text, its name is passed separately into refcurExecFetchAll() 
    // and it is not included in array of normal bind variables.
    $res = $db->refcurExecFetchAll($sql, "Get Equipment List",
            "rc", array(array(":id", $empid, -1)));
    if (empty($res['EQUIP_NAME'])) {
        echo "no equipment";
    } else {
        echo "<table border='1'>\n";
        foreach ($res['EQUIP_NAME'] as $item) {
            $item = htmlspecialchars($item, ENT_NOQUOTES, 'UTF-8');
            echo "<tr><td>$item</td></tr>\n";
        }
        echo "</table>\n";
    }
    echo "</div>";  // content
}

function getempname($db, $empid) {
    $sql = "SELECT first_name || ' ' || last_name AS emp_name
        FROM employees
        WHERE employee_id = :id";
    $res = $db->execFetchAll($sql, "Get EName", array(array(":id", $empid, -1)));
    $empname = $res[0]['EMP_NAME'];
    return($empname);
}

?>




<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\B5B6_vv.php
// sve ufe i primke, sve primke i pris), link "Equipment Report"

session_start();
require('db.inc.php');
require('ses_pg.inc.php');
 
$sess = new \Equipment\Session;
$sess->getSession();
if (!isset($sess->username) || empty($sess->username)
        || !$sess->isPrivilegedUser()) {
    header('Location: index.php');
    exit;
}
 
$page = new \Equipment\Page;
$page->printHeader("AnyCo Corp. Equipment Report");
$page->printMenu($sess->username, $sess->isPrivilegedUser());
printcontent($sess);
$page->printFooter();
 
// Functions
function printcontent($sess) {
    echo "<div id='content'>";
    $db = new \Oracle\Db("Equipment", $sess->username);
 
    $sql = "select first_name || ' ' || last_name as emp_name, equip_name
        from employees left outer join equipment
        on employees.employee_id = equipment.employee_id
        order by emp_name, equip_name";
 
    $db->setPrefetch(200); // Report generated in 0.002 seconds
    //$db->setPrefetch(0); // Report generated in 0.008 seconds
 
    $time = microtime(true);
    $db->execute($sql, "Equipment Report");
    echo "<table>";
    while (($row = $db->fetchRow()) != false) {
        $empname = htmlspecialchars($row['EMP_NAME'], ENT_NOQUOTES, 'UTF-8');
        $equipname = htmlspecialchars($row['EQUIP_NAME'], ENT_NOQUOTES, 'UTF-8');
        echo "<tr><td>$empname</td><td>$equipname</td></tr>";
    }
    echo "</table>";
    $time = microtime(true) - $time;
    echo "<p>Report generated in " . round($time, 3) . " seconds\n";
    echo "</div>";  // content
}

?>



<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\B6_cre.php
//  process flow of operation is similar to index.php
session_start();
require('db.inc.php');
require('ses_pg.inc.php');
 
$sess = new \Equipment\Session;
$sess->getSession();
if (!isset($sess->username) || empty($sess->username)
        || !$sess->isPrivilegedUser()
        || (!isset($_GET['empid']) && !isset($_POST['empid']))) {
    header('Location: index.php');
    exit;
}
$empid = (int) (isset($_GET['empid']) ? $_GET['empid'] : $_POST['empid']);
 
$page = new \Equipment\Page;
$page->printHeader("AnyCo Corp. Add Equipment");
$page->printMenu($sess->username, $sess->isPrivilegedUser());
printcontent($sess, $empid);
$page->printFooter();
 
// Functions
function printcontent($sess, $empid) {
    echo "<div id='content'>\n";
    $db = new \Oracle\Db("Equipment", $sess->username);
    if (!isset($_POST['equip']) || empty($_POST['equip'])) {
        printform($sess, $db, $empid);
    } else {
        ////////////// 
            if (!isset($_POST['csrftoken'])
                || $_POST['csrftoken'] != $sess->csrftoken) {
               // C S R F token they submitted doesnt match one we sent
               header('Location: index.php');
               exit;
            }
       ///////////////////
        $equip = getcleanequip();
        if (empty($equip)) {
            printform($sess, $db, $empid);
        } else {
            doinsert($db, $equip, $empid);
            echo "<p>Added new equipment</p>";
            echo '<a href="B6_tbl_vv.php?empid='
                 . $empid . '">Show Equipment</a>' . "\n";
        }
    }
    echo "</div>";  // content
}

function printform($sess, $db, $empid) {
    $empname = htmlspecialchars(getempname($db, $empid), ENT_NOQUOTES, 'UTF-8');
    $empid = (int) $empid;
    $sess->setCsrfToken();
    echo <<<EOF
Add equipment for $empname
<form method='post' action='${_SERVER["PHP_SELF"]}'>
<div>
    Equipment name <input type="text" name="equip"><br />
    <input type="hidden" name="empid" value="$empid">
    <input type="hidden" name="csrftoken" value="$sess->csrftoken">
    <input type="submit" value="Submit">
</div>
</form>
EOF;
}

function getcleanequip() {
    if (!isset($_POST['equip'])) {
        return null;
    } else {
        //$equip = $_POST['equip'];
        //remove HTML tags :
        $equip = filter_input(INPUT_POST, 'equip', FILTER_SANITIZE_STRING);
        return(trim($equip)); //  filter (sanitize) input
    }
}

function doinsert($db, $equip, $empid) {
 $sql = "INSERT INTO equipment (employee_id, equip_name) VALUES (:ei, :nm)";
    $db->execute($sql, "Insert Equipment", 
           array( array("ei", $empid, -1),
                  array("nm", $equip, -1)
           )
    );
}

function getempname($db, $empid) {
    $sql = "SELECT first_name || ' ' || last_name AS emp_name
        FROM employees
        WHERE employee_id = :id";
    $res = $db->execFetchAll($sql, "Get EName", array(array("id", $empid, -1)));
    $empname = $res[0]['EMP_NAME'];
    return($empname);
}

?>


<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\B6_cre_multi.php
session_start();
require('db.inc.php');
require('ses_pg.inc.php');
 
$sess = new \Equipment\Session;
$sess->getSession();
if (!isset($sess->username) || empty($sess->username)
        || !$sess->isPrivilegedUser()
        || (!isset($_GET['empid']) && !isset($_POST['empid']))) {
    header('Location: index.php');
    exit;
}
$empid = (int) (isset($_GET['empid']) ? $_GET['empid'] : $_POST['empid']);
 
$page = new \Equipment\Page;
$page->printHeader("AnyCo Corp. Add Equipment");
$page->printMenu($sess->username, $sess->isPrivilegedUser());
printcontent($sess, $empid);
$page->printFooter();
 
// Functions
function printcontent($sess, $empid) {
    echo "<div id='content'>\n";
    $db = new \Oracle\Db("Equipment", $sess->username);
    if (!isset($_POST['equip']) || empty($_POST['equip'])) {
        printform($sess, $db, $empid);
    } else {
        ////////////// 
            if (!isset($_POST['csrftoken'])
                || $_POST['csrftoken'] != $sess->csrftoken) {
               // C S R F token they submitted doesnt match one we sent
               header('Location: index.php');
               exit;
            }
       ///////////////////
        $equip = getcleanequip();
        if (empty($equip)) {
            printform($sess, $db, $empid);
        } else {
            doinsert($db, $equip, $empid);
            echo "<p>Added new equipment</p>";
            echo '<a href="B6_tbl_vv.php?empid='
                 . $empid . '">Show Equipment</a>' . "\n";
        }
    }
    echo "</div>";  // content
}

function printform($sess, $db, $empid) {
    $empname = htmlspecialchars(getempname($db, $empid), ENT_NOQUOTES, 'UTF-8');
    $empid = (int) $empid;
    $sess->setCsrfToken();
    echo <<<EOF
Add equipment for $empname
<form method='post' action='${_SERVER["PHP_SELF"]}'>
<div>
    Equipment name <input type="text" name="equip[]"><br />
    Equipment name <input type="text" name="equip[]"><br />
    Equipment name <input type="text" name="equip[]"><br />
    <input type="hidden" name="empid" value="$empid">
    <input type="hidden" name="csrftoken" value="$sess->csrftoken">
    <input type="submit" value="Submit">
</div>
</form>
EOF;
}

function getcleanequip() {
    if (!isset($_POST['equip'])) {
        return array();
    } else {
        $equiparr = array();
        foreach ($_POST['equip'] as $v) {     // Strip out unset values
            $v = trim($v);
            if (!empty($v))
                $equiparr[] = $v;
        }
        return($equiparr);
    }
}

function doinsert($db, $equiparr, $empid) {
    $arraybinds = array(array("eqa", $equiparr, SQLT_CHR));
    $otherbinds = array(array("eid", $empid, -1));
    $sql = "BEGIN equip_pkg.insert_equip(:eid, :eqa); END;";
    $db->arrayInsert($sql, "Insert Equipment List", $arraybinds, $otherbinds);
}


function getempname($db, $empid) {
    $sql = "SELECT first_name || ' ' || last_name AS emp_name
        FROM employees
        WHERE employee_id = :id";
    $res = $db->execFetchAll($sql, "Get EName", array(array("id", $empid, -1)));
    $empname = $res[0]['EMP_NAME'];
    return($empname);
}

?>


// *************************************
// *************************************


<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\logo_img_cre.php
// H:\dev_web\htdocs\t_oci8\ACXE2\suza2.JPG 
/*  
 Create JPEG image of company logo
 Don't have any text or white space before "<?php" tag because 
 it will be incorporated into image stream and corrupt picture.
Logo is displayed in Page::printHeader(). Every standard app page 
will show logo.
To display uploaded logo in edit ses_pg.inc.php un-comment LOGO_ URL 
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
require('db.inc.php');
require('ses_pg.inc.php');
 
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



<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\logo_upload.php
// http://dev:8083/t_oci8/ACXE2/logo_upload.php
session_start();
require('db.inc.php');
require('ses_pg.inc.php');
 
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



<?php
/* H:\dev_web\htdocs\t_oci8\ACXE2\B6_getjson_count.php
 Service returning detail counts (statistics) in JSON format
 There is no authentication in this web service. It is "external" to 
 this app. All it requires is a username entry in the POST data
 Script queries details and uses PHPs json_encode() 
 Output returned by the web service e.g is :
{"cardboard box":1,"pen":4,"computer":2,"telephone":3,"paper":3,"car":1}

JSON format is often used to efficiently transfer data between 
browser and PHP server. This web service could be used 
directly in many of available JSON graphics libraries.
*/
 
require('db.inc.php');
 
if (!isset($_POST['username'])) {
    header('Location: index.php');
    exit;
}
 
$db = new \Oracle\Db("Equipment", $_POST['username']);
 
$sql = "select equip_name, count(equip_name) as cn
        from equipment
        group by equip_name";
$res = $db->execFetchAll($sql, "Get Equipment Counts");
 
$mydata = array();
foreach ($res as $row) {
    $mydata[$row['EQUIP_NAME']] = (int) $row['CN'];
}
 
echo json_encode($mydata);
 
?>




<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\B6_graph_img_cre.php
/* Create JPEG image of equipment allocation statistics
   Don't have any text or white space before the "<?php" tag 
   because it will be incorporated into image stream and corrupt picture.
call web service and create a graph.
Change below web service URL to match your system.
*/
define('WEB_SERVICE_URL', "http://dev:8083/t_oci8/ACXE2/B6_getjson_count.php");
 
session_start();
require('ses_pg.inc.php');
 
$sess = new \Equipment\Session;
$sess->getSession();
if (!isset($sess->username) || empty($sess->username)
    || !$sess->isPrivilegedUser()) {
    header('Location: index.php');
    exit;
}
$data = callservice($sess);
do_graph("Equipment Count", 600, $data);
 
// Functions
function callservice($sess) {
    // Call web "service" to get the Equipment statistics
    $calldata = array('username' => $sess->username);
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
       'content' => http_build_query($calldata)
        )
    );
    $ctx = stream_context_create($options);
    $result = file_get_contents(WEB_SERVICE_URL, false, $ctx);
    if (!$result) {
        $data = null;
    } else {
        $data = json_decode($result, true);
 
        // Sort an array by keys using an anonymous function
        uksort($data, function($a, $b) {
            if ($a == $b)
                return 0;
            else
                return ($a < $b) ? -1 : 1;
            });
        }
    return($data);
}

function do_graph($title, $width, $items) {
    $border = 50;             // border space around bars
    $caption_gap = 4;         // space between bar and its caption
    $bar_width = 20;          // width of each bar
    $bar_gap = 40;            // space between each bar
    $title_font_id = 5;       // font id for the main title
    $bar_caption_font_id = 5; // font id for each bar's title
 
    // Image height depends on number of items
    $height = (2 * $border) + (count($items) * $bar_width) +
        ((count($items) - 1) * $bar_gap);
 
    // Find horizontal distance unit for one item
    $unit = ($width - (2 * $border)) / max($items);
 
    // Create image and add the title
    $im = ImageCreate($width, $height);
    if (!$im) {
        trigger_error("Cannot create image<br />\n", E_USER_ERROR);
    }
    $background_col = ImageColorAllocate($im, 255, 255, 255); // white
    $bar_col = ImageColorAllocate($im, 0, 64, 128);           // blue
    $letter_col = ImageColorAllocate($im, 0, 0, 0);           // black
   ImageFilledRectangle($im, 0, 0, $width, $height, $background_col);
    ImageString($im, $title_font_id, $border, 4, $title, $letter_col);
    // Draw each bar and add a caption
    $start_y = $border;
    foreach ($items as $caption => $value) {
        $end_x = $border + ($value * $unit);
        $end_y = $start_y + $bar_width;
        ImageFilledRectangle($im, $border, $start_y, $end_x, $end_y, $bar_col);
        ImageString($im, $bar_caption_font_id, $border,
            $start_y + $bar_width + $caption_gap, $caption, $letter_col);
        $start_y = $start_y + ($bar_width + $bar_gap);
    }
 
    // Output complete image.
    // Any text, error message or even white space that appears before 
    // this (including any white space before "<?php" tag) will corrupt 
    // image data.  Comment out "header" line to debug any issues.
    header("Content-type: image/jpg");
    ImageJpeg($im);
    ImageDestroy($im);
}    
    
            
?>




<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\B6_graph_page.php
/*
  Display page containing graph
Image is included in normal HTML img tag.
If image doesn't display, it might be a problem in B6_graph_img.php 
due to text such as an error message or even because of white space 
before the <?php tag. This text will be included in image stream 
and make the picture invalid. To help debug this kind of problem 
you could comment out $session checks 
and also header() call in B6_graph_img.php.
 */
 
session_start();
require('ses_pg.inc.php');
 
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
<img src='B6_graph_img.php' alt='Graph of office equipment'>
</div>
EOF;
 
$page->printFooter();
?>





/* H:\dev_web\htdocs\t_oci8\ACXE2\s t y l e _ a c x e .c s s */
body {
    background: #FFFFFF;
    color:      #000000;
    font-family: Arial, sans-serif;
}
 
table {
    border-collapse: collapse;
    margin: 5px;
}
 
tr:nth-child(even) {background-color: #FFFFFF}
tr:nth-child(odd) {background-color: #EDF3FE}
 
td, th {
    border: solid #000000 1px;
    text-align: left;
    padding: 5px;
}
 
#header {
    font-weight: bold;
    font-size: 160%;
    text-align: center;
    border-bottom: solid #334B66 4px;
    margin-bottom: 10px;
}
#menu {
    position: absolute;
    left: 5px;
    width: 180px;
    display: block;
    background-color: #dddddd;
}
#user {
    font-size: 90%;
    font-style:italic;
    padding: 3px;
}
 
#content {
    margin-left: 200px;
}



/* start H:\dev_web\htdocs\t_oci8\ACXE2\ddl_ACXE.sql
cd C:\oraclexe\app\oracle\product\11.2.0\server\bin
sqlplus / as sysdba  ili sqlplus hr/hr@sspc/XE
-- p s w = ss141
execute dbms_cnidection_pool.start_pool();
select * from DBA_CPOOL_INFO; -- <--- mora biti ACTIVE
select * from V$CPOOL_STATS; -- <-- ako nije ACTIVE pokaze nista
*/
CREATE TABLE equipment(
    id          NUMBER PRIMARY KEY,
    employee_id REFERENCES employees(employee_id) ON DELETE CASCADE,
    equip_name  VARCHAR2(20) NOT NULL
)
/
CREATE SEQUENCE equipment_seq;
CREATE TRIGGER equipment_trig BEFORE INSERT ON equipment FOR EACH ROW
BEGIN
  -- prior to 11g :
  select equipment_seq.nextval into :NEW.ID from dual; 
  -- 11g :
  --:NEW.id := equipment_seq.NEXTVAL;
END;
/

CREATE TABLE pictures (id NUMBER, pic BLOB);
 
CREATE SEQUENCE pictures_seq;
CREATE TRIGGER pictures_trig BEFORE INSERT ON pictures FOR EACH ROW
BEGIN
    select pictures_seq.nextval into :NEW.ID from dual; 
    --:NEW.id := pictures_seq.NEXTVAL;
END;
/

CREATE OR REPLACE PROCEDURE get_equip(eid_p IN NUMBER, RC OUT SYS_REFCURSOR) AS
BEGIN
    OPEN rc FOR SELECT   equip_name
                FROM     equipment
                WHERE    employee_id = eid_p
                ORDER BY equip_name;
END;
/
/*
CREATE OR REPLACE PACKAGE equip_pkg AS
    TYPE arrtype IS TABLE OF VARCHAR2(20) INDEX BY PLS_INTEGER;
    PROCEDURE insert_equip(eid_p IN NUMBER, eqa_p IN arrtype);
END equip_pkg;
/
CREATE OR REPLACE PACKAGE BODY equip_pkg AS
    PROCEDURE insert_equip(eid_p IN NUMBER, eqa_p IN arrtype) IS
    BEGIN
        FORALL i IN INDICES OF eqa_p
            INSERT INTO equipment (employee_id, equip_name) 
                                   VALUES (eid_p, eqa_p(i));
    END insert_equip;
END equip_pkg;
/
*/
CREATE OR REPLACE PACKAGE equip_pkg AS
    TYPE arrtype IS TABLE OF VARCHAR2(20) INDEX BY PLS_INTEGER;
    PROCEDURE insert_equip(eid_p IN NUMBER, eqa_p IN arrtype);
END equip_pkg;
/
CREATE OR REPLACE PACKAGE BODY equip_pkg AS
    PROCEDURE insert_equip(eid_p IN NUMBER, eqa_p IN arrtype) IS
    BEGIN
        FORALL i IN INDICES OF eqa_p
            INSERT INTO equipment (employee_id, equip_name) 
                                   VALUES (eid_p, eqa_p(i));
    END insert_equip;
END equip_pkg;
/

INSERT INTO equipment (employee_id, equip_name) VALUES (100, 'pen');
INSERT INTO equipment (employee_id, equip_name) VALUES (100, 'telephone');
...
COMMIT;
