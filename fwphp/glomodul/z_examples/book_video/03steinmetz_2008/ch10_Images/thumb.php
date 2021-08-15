<?php

function mkthumb($filename, $thumbname) {
    /* generate an image thumbnail */
    $thumb_width = 125; 
    $thumb_height = 125; 

    if (preg_match('/\.gif$/i', $filename)) {
	$src_image = imagecreatefromgif($filename); 
    } else if (preg_match('/\.png$/i', $filename)) {
	$src_image = imagecreatefrompng($filename); 
    } else {
	/* assume jpeg by default */
	$src_image = imagecreatefromjpeg($filename);
    }

    $width = imagesx($src_image);
    $height = imagesy($src_image);

    if (($height > $thumb_height) || ($width > $thumb_width)) {
	/* create a thumbnail */
	if ($width > $height) {
	    $ratio = $thumb_width / $width; 
	} else {
	    $ratio = $thumb_height / $height;
	}

	$new_width = round($width * $ratio);
	$new_height = round($height * $ratio); 

	$dest_image = ImageCreateTrueColor($new_width, $new_height);
	imagecopyresampled($dest_image, $src_image, 0, 0, 0, 0,
			   $new_width, $new_height, $width, $height); 
	imagedestroy($src_image); 
    } else {
	/* image is already small enough; just output */
	$dest_image = $src_image;
    }

    imagejpeg($dest_image, $thumbname); 
    imagedestroy($dest_image); 
} 

$upfile = $_FILES["upfile"]["tmp_name"];
$fn = $_FILES["upfile"]["name"];
$thumb_filename = "thumbs/$fn";

if ($upfile) {
    mkthumb($upfile, $thumb_filename);
    print "<img src=\"$thumb_filename\" />";
} else { ?>
    <form action="thumb.php" enctype="multipart/form-data" method="post">
    Upload an image:<br />
    <input name="upfile" type="file" /><br />
    <input name="Submit" type="submit" value="Upload Image" />
    <?
}
?>
