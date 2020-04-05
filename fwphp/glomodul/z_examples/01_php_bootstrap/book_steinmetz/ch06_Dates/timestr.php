<?php
    $sl = array(
	"2007-03-11",
	"2007-01-01",
	"2006-01-01",
	"2007-03",
	"2006",
    );

    foreach ($sl as $s) {
	print date("Y M d h:m:sa e", strtotime($s)) . "\n";
    }
?>
