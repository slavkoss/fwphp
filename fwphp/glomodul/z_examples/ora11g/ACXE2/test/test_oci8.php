<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\test_oci8.php
//$c = oci_connect('hr', 'hr', 'sspc2/xe');
$c = oci_connect('hr', 'hr', getenv('USERDOMAIN', true) ?: getenv('USERDOMAIN').'/xe');

if (!$c) {
    $m = oci_error();
    trigger_error('Could not connect to database: '. $m['message'], E_USER_ERROR);
}
$s = oci_parse($c, "SELECT * FROM employees");
if (!$s) {
    $m = oci_error($c);
    trigger_error('Could not parse statement: '. $m['message'], E_USER_ERROR);
}
$r = oci_execute($s);
if (!$r) {
    $m = oci_error($s);
    trigger_error('Could not execute statement: '. $m['message'], E_USER_ERROR);
}
$r = oci_fetch_all($s, $res);
if (!$r) {
    $m = oci_error($s);
    trigger_error('Could not fetch rows: '. $m['message'], E_USER_ERROR);
}
echo "<table border='1'>\n";
foreach ($res as $row) {
    echo "<tr>\n";
    foreach ($row as $item) {
        echo "  <td>".($item!==null?htmlentities($item, 
                       ENT_QUOTES):"&nbsp;")."</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";
 
?>