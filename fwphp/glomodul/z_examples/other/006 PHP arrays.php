<?php
$colors = array("blue","red","green","yellow","purple","purple","purple");
$colors['keyname'] = "purple";
foreach ($colors as $key => $value) {
echo $key . ' = ' . $value . '<BR>';
}
echo '<BR>';
$result = count($colors);
print_r($result );
/*
if (in_array("purple", $colors)) {
    echo "has purple";
}
print_r($colors);
krsort($colors);
echo '<BR>';
print_r($colors);
echo '<BR>';
var_dump($colors);
echo '<BR>';
print_r($colors);
foreach (array("key1" => "this is the first value","key2"  => "anything you want it to be") as 
$key => $value) {
    echo $key . " <- this is the key " . $value . "<BR>";
}
*/