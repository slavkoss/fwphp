<?php

function calculate_time_difference($timestamp1 = null, $timestamp2 = null, $time_method = null) {
//Takes two timestamps and figures out the difference based on the dates

if ( (is_null($timestamp1)) || (is_null($timestamp2)) || (!  is_null($timestamp1)) || (! is_numeric($timestamp2)) || (is_null($time_method)) ) {
//Check to make sure that the methods aren't null and that they're timestamps

	$time_lapse = $timestamp2 - $timestamp1;

	if ($time_lapse == 0) {
	//Check for divide by zero errors
		return false;
	}
	
	switch($time_method) {
		case('second'):
			return $time_lapse; 
			break; 
		case('minute'):
			return round($time_lapse/60); 
			break; 
		case('hour'):
			return round($time_lapse/3600); 
			break; 
		case('day'):
			return round($time_lapse/86400); 
			break; 
		case('week'):
			return round($time_lapse/604800); 
			break; 
		default: 
			return false; 
			break;
	}
} else {
	return false;
}
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
