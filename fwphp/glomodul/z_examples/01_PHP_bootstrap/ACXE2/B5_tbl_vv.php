<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\B5_tbl_vv.php
define('NUMRECORDSPERPAGE', 5);
 
session_start();
require('_02autoload.php');
//require('Db.php');
//require('Session.php');
//require('Page.php');
 
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