<?php
/* H:\dev_web\htdocs\t_oci8\ACXE2\equip_getjson_count.php
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
 
require('_02autoload.php');
//require('Db.php');
 
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
