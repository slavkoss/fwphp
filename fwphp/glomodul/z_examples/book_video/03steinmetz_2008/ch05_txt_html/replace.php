<?php

$string = "It's wabbit season!\n";
print(str_replace("wabbit", "duck", $string));

$string = str_replace("wabbit", "", $string);
// $string = str_replace("wabbit", "duck", $string);

print $string;

$string = "I like bacon and a hamburger\n";
$ugly_words = array("hamburger", "bacon", "bucket o'grease"); 
$string = str_replace($ugly_words, "Atkins-friendly foods", $string);
print $string;

$string = "I like bacon and a hamburger\n";
$ugly_words = array("hamburger", "bacon", "bucket o'grease"); 
$replacements = array("carrot", "broccoli", "2% milk");
$string = str_replace($ugly_words, $replacements, $string);
print $string;

?>
