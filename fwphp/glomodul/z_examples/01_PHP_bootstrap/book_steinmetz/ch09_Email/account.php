<?php

require("accountverify.php");

$login = "joe";
$email_address = "joe@example.com";
$key = "vblcfumipvorodtspycacnhuikqtxbdt";

$db = mysql_connect("localhost", "username", "password");
mysql_select_db("wcphp", $db);

if (0 && make_verification($login, $email_address, $db)) {
    print "okay!";
}


if (activate_account($key, $db)) {
    print "account activated.";
} else {
    print "account not activated.";
}

print "\n";

if (is_active($login, $db)) {
    print "account active.";
} else {
    print "account not active.";
}

print "\n";

?>
