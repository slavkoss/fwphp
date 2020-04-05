<?php
if (isset($_COOKIE["test"])) {
    print "Cookies enabled.";
} else {
    if (isset($_REQUEST["testing"])) {
	print "Cookies disabled.";
    } else {
	setcookie("test", "1", 0, "/");
	header("Location: $_SERVER[PHP_SELF]?testing=1");
    }
}
?>
