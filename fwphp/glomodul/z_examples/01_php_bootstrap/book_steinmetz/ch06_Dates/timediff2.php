<?php

function calculate_time_difference($timestamp1, $timestamp2, $time_unit) {
    // determines difference between two timestamps

    $timestamp1 = intval($timestamp1);
    $timestamp2 = intval($timestamp2);
    if ($timestamp1 && $timestamp2) {
        $time_lapse = $timestamp2 - $timestamp1;

        $seconds_in_unit = array(
          'second'   => 1,
          'minute'   => 60, 
          'hour'     => 3600,
          'day'      => 86400, 
          'week'     => 604800, 
        );
   
        if ($seconds_in_unit[$time_unit]) {
            return round($time_lapse/$seconds_in_unit[$time_unit]); 
        }
    }

    return false; 
}

//Get the current time and seven days from now as an example
$timestamp_1 = time(); 
$timestamp_2 = strtotime('+7 days'); 

$units = array("second", "minute", "hour", "day", "week");
foreach ($units as $u) {
    $nunits = calculate_time_difference($timestamp_1, $timestamp_2, $u);

    echo $nunits . " $u(s) have passed between " . date("m-d-Y", $timestamp_1) . ' and ' . date("m-d-Y", $timestamp_2); 
    print "\n";
}

print abs(5 - 62);
print "\n";


?>
