<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\B6_tbl_vv.php
session_start();
require('_02autoload.php');
//require('Db.php');
//require('Session.php');
//require('Page.php');
 
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