<?php

$s = 'blah<a href="a.php">blah</a><a href="b.php">blah</a>';
if (preg_match('/<a\s+[^>]*href="[^"]+"/i', $s, $matches)) {
    print "match: $matches[0]\n";
}
if (preg_match('/<a\s+[^>]*href="([^"]+)"/i', $s, $matches)) {
    print "match: $matches[1]\n";
}
if (preg_match('/<a\s+[^>]*href="([^"]+)"/i', $s, $matches, PREG_OFFSET_CAPTURE)) {
    print "match: ";
    print_r($matches);
}

if (preg_match_all('/<a\s+[^>]*href="([^"]+)"/i', $s, $matches)) {
    print "match: ";
    print_r($matches);
}

?>
