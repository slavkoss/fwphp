<?php

echo 'The current timestamp is ' . time();
print "\n";

$tformats = array(
    "Friday",
    "next Friday",
    "+1 week Friday",
    "+1 week",
    "-2 months",
    "October 1, 2005",
    "2005-10-01",
    "12:01 p.m. Friday",
    "Friday 12:01 p.m.",
    "12:01 p.m. Next Friday",
    "+7 days 12:01 p.m.",
);

$isodf = "Y-m-d H:i:s";

foreach ($tformats as $tf) {
    print "$tf: ";
    print date($isodf, strtotime($tf));
    print "\n";
}

print " ---- \n";

print date($isodf, mktime(12, 00, 0)) . "\n";
print date($isodf, mktime('', '', '', '12', '01', '2005')) . "\n";
print date($isodf, mktime(0, 0, 0, 12, 1, 2005)) . "\n";
print date($isodf, mktime(0, 0, 0, date("m"), 1)) . "\n";

$next_month_timestamp = strtotime("+1 month"); 
$first_of_next_month = mktime(0, 0, 0, date("m", $next_month_timestamp), 1, date("y", $next_month_timestamp)); 
print date($isodf, $first_of_next_month) . "\n";

if (checkdate(5,6,2006)) {
    print "hi\n";
}

$timestamp = 1151928000; 
$date_output = date("M j, Y ha", $timestamp); 
print "1: $date_output\n";
$date_output = date("M j, Y ha", 1151884800); 
print "2: $date_output\n";

print date("\d d \D D \j j \l l \S S \w w \z z") . "\n";
print date("\W W") . "\n";
print date("\F F \m m \M M \N N \\t t") . "\n";
print date("\L L \Y Y \y y") . "\n";
print date("\A A \a a \B B \g g \G G \h h \H H \i i \s s") . "\n";
print date("\I I \O O \T T \Z Z") . "\n";
print date("\c c") . "\n";
print date("\\r r") . "\n";

$dformats = array(
	"l",
	"M",
	"H:m",
	"G:i:s A",
	"m-d-Y",
	"M-j-y",
	"M-d-Y h:m:s a",
);

foreach ($dformats as $df) {
    print "$df .... " . date($df) . "\n";
}

$timestamp = strtotime("2005-07-03"); 
$day_of_week = date('l', $timestamp); 
echo 'The day of the week is ' . $day_of_week;
print "\n";


?>
