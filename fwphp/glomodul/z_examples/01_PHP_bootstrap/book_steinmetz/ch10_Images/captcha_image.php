<?php
/* captcha_image.php */

/* passphrase length */
$pass_length = 4;

/* image dimensions */
$width = 200;
$height = 60; 

/* TTF font path */
$font_path = dirname(__FILE__);

session_start(); 

/* create a passphrase */
$passwd = "";
$i = 0;
while ($i < $pass_length) {
    $passwd .= chr(rand(97, 122));
    $i++;
}

/* store passphrase */
$_SESSION["tt_pass"] = $passwd;

/* get a list of available fonts */
$fonts = array(); 

if ($handle = opendir($font_path)) {
    while (false !== ($file = readdir($handle))) {
	/* look for TTF fonts */
	if (substr(strtolower($file), -4, 4) == '.ttf') {
	    $fonts[] = $font_path . '/' . $file;
	}
    }
}	

if (count($fonts) < 1)	{
    die("No fonts found!"); 
} 

/* image header */
header("Content-Type: image/jpeg");
/* invalidate cache */
header("Expires: Mon, 01 Jul 1998 05:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

/* create image */
$img = imagecreatetruecolor($width, $height);
  
/* fill background with a random shade of pastel */
$bg = imagecolorallocate($img, rand(210,255), rand(210,255), rand(210,255));
imagefilledrectangle($img, 0,0, $width, $height, $bg);

/* make the background jaggedy by creating different-colored four-cornered
   polygons to cover the background area */
  
/* create swaths between 10 and 30 pixels wide across the image */
$right = rand(10, 30);
$left = 0;
while ($left < $width) {
    $poly_points = array(
	$left, 0,                                 /* upper left */
        $right, 0,                                /* upper right */
        rand($right-25, $right+25), $height,      /* lower right */
        rand($left-15, $left+15), $height);       /* lower left */
    
    /* create the polygon, using four points from the array */
    $c = imagecolorallocate($img, rand(210,255), rand(210,255), rand(210,255));
    imagefilledpolygon($img, $poly_points, 4, $c);
	
    /* advance to the right edge */
    $random_amount = rand(10, 30); 
    $left += $random_amount;
    $right += $random_amount; 
}

/* choose base value range for vertical and horizontal lines */
$c_min = rand(120, 185);
$c_max = rand(195, 280);

/* draw random vertical lines across the width */
$left = 0;
while ($left < $width) {
    $right = $left + rand(3, 7);
    $offset = rand(-3, 3);                       /* offset for angle */
	
    $line_points = array(
	$left, 0,                                /* upper left */
        $right, 0,                               /* upper right */
        $right + $offset, $height,               /* lower right */
        $left + $offset, $height);               /* lower left */
	
    $pc = imagecolorallocate($img, rand($c_min, $c_max),
                                   rand($c_min, $c_max),
                                   rand($c_min, $c_max));
    imagefilledpolygon($img, $line_points, 4, $pc);
	
    /* advance to the right */
    $left += rand(20, 60);
}
  
/* create random horizontal lines across the height */
$top = 0; 
while ($top < $height) {
    $bottom = $top + rand(1, 4);
    $offset = rand(-6, 6);                    /* offset for angle */
	
    $line_points = array(
        0, $top,                              /* upper left */
        0, $bottom,                           /* lower left */
        $width, $bottom + $offset,            /* lower right */
        $width, $top + $offset);              /* upper right */
    $pc = imagecolorallocate($img, rand($c_min, $c_max),
				   rand($c_min, $c_max),
				   rand($c_min, $c_max));
    imagefilledpolygon($img, $line_points, 4, $pc);
    $top += rand(8, 15);
}
  
/* determine character spacing */
$spacing = $width / (strlen($passwd)+2);

/* initial x coordinate */
$x = $spacing; 

/* draw each character */
for ($i = 0; $i < strlen($passwd); $i++) {
    $letter = $passwd[$i];
    $size = rand($height/3, $height/2);
    $rotation = rand(-30, 30);
	 
    /* random y position with room for character descenders */
    $y = rand($height * .90, $height - $size - 4);

    /* pick a random font */
    $font = $fonts[array_rand($fonts)];

    /* pick a color for the letter */
    $r = rand(100, 255); $g = rand(100, 255); $b = rand(100, 255);

    /* create letter and shadow colors */
    $color = imagecolorallocate($img, $r, $g, $b);
    $shadow = imagecolorallocate($img, $r/3, $g/3, $b/3);
	 
    /* draw shadow, then letter */
    imagettftext($img, $size, $rotation, $x, $y, $shadow, $font, $letter);
    imagettftext($img, $size, $rotation, $x-1, $y-3, $color, $font, $letter);

    /* advance across the canvas */
    $x += rand($spacing, $spacing * 1.5);  
}

imagejpeg($img);          /* send image output */
imagedestroy($img);       /* free image memory */

?>
