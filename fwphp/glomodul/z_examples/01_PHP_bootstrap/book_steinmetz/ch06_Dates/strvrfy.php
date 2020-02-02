<?php
$user_supplied_date = $_GET['date'];
$user_timestamp = strtotime($user_supplied_date);

// beginning/end of valid date range
$start_date = strtotime('2006-01-01');
$end_date = strtotime('2007-01-01');


if ($user_timestamp < $start_date ||
    $user_timestamp >= $end_date) {
    die('Date does not fall within the valid range of dates');
}

$database_date = date('Y-m-d', $user_timestamp);
// Now use $database_date in a database query

?>
