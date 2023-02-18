<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\equip_cre.php
//  process flow of operation is similar to index.php
session_start();
require('_02autoload.php');
//require('Db.php');
//require('Session.php');
//require('Page.php');
 
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
            echo '<a href="emp_equip_tbl.php?empid='
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
        $equip = filter_input(INPUT_POST, 'equip', FILTER_SANITIZE_SPECIAL_CHARS);
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