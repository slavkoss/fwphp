<?php

$ts = time();
echo 'The current timestamp is ' . time() . "\n";

$isodf = "Y-m-d H:i:s\n";

print date($isodf, $ts);

?>
