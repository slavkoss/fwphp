<?php

$file = 'filetest.txt';
if($handle = fopen($file, 'w')) { // overwrite

	fwrite($handle, 'abc'); // returns number of bytes or false
	$content = "123\n456";  // double quotes matter (with \n)
	fwrite($handle, $content);
	
	fclose($handle);
} else {
	echo "Could not open file for writing.";
}

// file_put_contents: shortcut for fopen/fwrite/fclose
// overwrites existing file by default (so be CAREFUL)
$file = 'filetest.txt';
$content = "111\n222\n333";
if($size = file_put_contents($file, $content)) {
  echo "A file of {$size} bytes was created.";
}

?>