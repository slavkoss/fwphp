<?php

$fahrenheit = $_POST['data'];  //This recieves the data passed from JavaScript

$celsius = (($fahrenheit - 32) * 5) / 9;
$celsius = number_format($celsius, 7);

print $celsius;

?>