<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\equip_cre_multi.php
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