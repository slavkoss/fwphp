<?
$string = "heY hOw arE yoU doinG?";
echo strtoupper($string);
// Displays "HEY HOW ARE YOU DOING? "

echo strtolower($string); 
// displays "hey how are you doing?"

echo ucwords(strtolower($string)); 
// displays "Hey How Are You Doing?"


print "\n";

function fussy_capitalize($string) {
    // uppercases, but leave certain words in lowercase
    $uppercase_words = array("Of ","A ","The ","And ","An ", "Or "); 
    $lowercase_words = array("of ","a ","the ","and ","an ","or ");

    $string = ucwords(strtolower($string));
    $string = str_replace($uppercase_words, $lowercase_words, $string); 
    // uppercase the first word
    return ucfirst($string);
}

print fussy_capitalize("the rain in spain falls mostly on the plain\n");

?>
