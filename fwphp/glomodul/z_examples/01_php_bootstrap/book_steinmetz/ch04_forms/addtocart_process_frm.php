<?php

$ids   = $_POST["ids"]; 
//$names = $_POST["names"]; 
$quantities = $_POST["quantities"];

if (is_array($quantities)) {
  foreach ($quantities as $key => $item_qty) 
  {
    $item_qty = intval($item_qty);	
    if ($item_qty <> '0') {
      $id = $ids[$key]; 
      print "You added $item_qty of user ID $id - you can log in this user.<br>";
    }
  }
}


/*
$product_id = $_POST["product_id"]; 
$quantity = $_POST["quantity"];

if (is_array($quantity)) {
    foreach ($quantity as $key => $item_qty) {
        $item_qty = intval($item_qty);	
        if ($item_qty > 0) {
            $id = $product_id[$key]; 
            print "You added $item_qty of Product ID $id.<br>";
        }
    }
}
*/


?>
