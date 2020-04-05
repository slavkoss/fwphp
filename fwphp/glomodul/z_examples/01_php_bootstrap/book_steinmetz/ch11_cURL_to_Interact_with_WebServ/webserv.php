<?php
$db = mysql_connect("localhost", "username", "password");
mysql_select_db("wcphp");

header("Content-type: text/xml");

$category = $_REQUEST["category"];

if ($category) {
    $results = mysql_query("SELECT DISTINCT category FROM product_info", $db);
    $categories = array();
    while ($row = mysql_fetch_array($results)) {
	$categories[] = $row["category"];
    }
    if (!in_array($category, $categories)) {
	printerror("invalid category");
	exit;
    }
}

$results = mysql_query("
      SELECT product_name, product_id, price
        FROM product_info
       WHERE category = '$category'", $db);

$doc = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?>
<Items></Items>
');

while ($product = mysql_fetch_array($results)) {
    $child = $doc->addChild("Item");
    $child->addChild("Name", $product["product_name"]);
    $child->addChild("ID", $product["product_id"]);
    $child->addChild("Price", $product["price"]);
}
print $doc->asXML();

function printerror($message) {
    $message = htmlentities($message);
    print "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<Error>$message</Error>
";
}
?>
