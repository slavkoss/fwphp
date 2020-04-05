<?php
$string = "I approve of Senator Foghorn's performance in the War on Buttermilk.  My name is Ferrett Steinmetz, and I approved this message.";
$search_term = "approve";
// Does it appear in the string?
$pos = strpos($string, 'approve');
if ($pos === False) {
    print "$term not in string\n";
} else {
    print "position: $pos\n";
    print "last position: " . strval(strrpos($string, $search_term)) . "\n";
    print strstr($string, $search_term) . "\n";
    // prints "approve of Senator Foghorn's ... "
    print substr($string, strrpos($string, $search_term)) . "\n";
    // prints "approved this message."
}
?>
