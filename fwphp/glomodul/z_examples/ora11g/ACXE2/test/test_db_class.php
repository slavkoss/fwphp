<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\test_db_class.php
require('db.inc.php');
 
$db = new \Oracle\Db("test_db", "Chris");
$sql = "SELECT first_name, phone_number FROM employees ORDER BY employee_id";
$res = $db->execFetchAll($sql, "Query Example");
// echo "<pre>"; var_dump($res); echo "</pre>\n";
 
echo "<table border='1'>\n";
echo "<tr><th>Name</th><th>Phone Number</th></tr>\n";
foreach ($res as $row) {
    $name = htmlspecialchars($row['FIRST_NAME'], ENT_NOQUOTES, 'UTF-8');
    $pn   = htmlspecialchars($row['PHONE_NUMBER'], ENT_NOQUOTES, 'UTF-8');
    echo "<tr><td>$name</td><td>$pn</td></tr>\n";
}
echo "</table>";
 
?>