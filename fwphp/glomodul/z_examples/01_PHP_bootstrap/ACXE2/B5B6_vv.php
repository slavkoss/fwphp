<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\B5B6_vv.php
// sve ufe i primke, sve primke i pris), link "Equipment Report"

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