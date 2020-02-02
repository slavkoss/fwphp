<?php

class Person {
	
	var $first_name;
	var $last_name;
	
	var $arm_count = 2;
	var $leg_count = 2;
	
	function say_hello() {
		echo "Hello from inside the class ". get_class($this) .".<br />";
	}
	function full_name() {
		return $this->first_name . " " . $this->last_name;
	}
}

$person = new Person();
echo $person->arm_count ."<br />";
$person->arm_count = 3;
$person->first_name = 'Lucy';
$person->last_name = 'Ricardo';

$new_person = new Person();
$new_person->first_name = 'Ethel';
$new_person->last_name = 'Mertz';

echo $person->full_name() ."<br />";
echo $new_person->full_name() ."<br />";

$vars = get_class_vars('Person');
foreach($vars as $var => $value) {
	echo "{$var}: {$value}<br />";
}

echo property_exists('Person', 'first_name') ? 'true' : 'false';

?>