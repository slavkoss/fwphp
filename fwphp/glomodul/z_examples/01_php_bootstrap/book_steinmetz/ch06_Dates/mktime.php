<?php
$first_of_this_month = mktime(0, 0, 0, intval(date("m")), 1);

$next_month_timestamp = strtotime("+1 month"); 

$first_of_next_month = mktime(0, 0, 0, intval(date("m", $next_month_timestamp)), 1, intval(date("y", $next_month_timestamp))); 

print date("Y-m-d h:i:sa", $first_of_this_month) . "\n";
print date("Y-m-d h:i:sa", $next_month_timestamp) . "\n";
print date("Y-m-d h:i:sa", $first_of_next_month) . "\n";

print date("Y-m-d h:i:s", $first_of_next_month) . "\n";
print date("Y-m-d H:i:s") . "\n";

?>
