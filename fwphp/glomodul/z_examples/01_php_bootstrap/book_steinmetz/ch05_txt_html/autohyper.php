<?php
$stuff = 'blah blah blah<a href="http://www.o--o.net">my site</a>
http://www.cnn.com/

blah blah';

print "$stuff\n\n";

print preg_replace('|(?<!href=")(https?://[A-Za-z0-9+\-=._/*(),@\'$:;&!?]+)|',
		   '<a href="$1">$1</a>',
		   $stuff);
?>

