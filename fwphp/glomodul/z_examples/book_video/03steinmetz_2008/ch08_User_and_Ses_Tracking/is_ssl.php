<?php
function is_SSL() {
    /* Checks to see whether the page is in secure mode */
    if ($_SERVER['SERVER_PORT'] == "443") { 
        return true;
    } else {
        return false;
    }
} 

if (is_SSL()) {
    print "secure ($_SERVER[SERVER_PORT])";
} else {
    print "not secure ($_SERVER[SERVER_PORT])";
}
?>
