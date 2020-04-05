<?php

session_start();

if ($_REQUEST["name"]) {
    $_SESSION["name"] = $_REQUEST["name"];
}
if ($_REQUEST["color"]) {
    $_SESSION["color"] = $_REQUEST["color"];
}

if ($_REQUEST["clear"]) {
    unset($_SESSION["name"]);
    unset($_SESSION["color"]);
}

$name = $_SESSION["name"];
$color = $_SESSION["color"];

if ($name) {
    print "Your name is <b>$name</b>.<br />";
}
if ($color) {
    print "Your favorite color is <b>$color</b>.<br />";
}
print '<a href="sessionform.php">Edit details</a>';
print ' | <a href="sessionview.php?clear=1">Clear values</a>';

?>
