<?php

session_start(); 

if($_GET['cap']) {
/*If the GET variable is set, then this script is asking us to create a JPEG file
based on the variable passed along in $_GET['cap'].  The variable should be in the form of 
offset_number1_number2_number3, as explained when we create the variable
*/
	
	//Decode the $_GET that's passed along in the URL
	$undecoded_phrase = explode('_', $_GET['cap']); 
	if (! isset($undecoded_phrase[1])) {
	//There were no underscores
		die('Invalid captcha image'); 
	}
	
	if ( (! is_numeric($undecoded_phrase[0])) || (count($undecoded_phrase) < 2) || (count($undecoded_phrase) > 6) ) {
	//The offset isn't correct, or it didn't explode correctly, or it had the wrong number of elements in the array
	//In either case, to heck with it
		die('Invalid captcha image'); 
	}
	
	//The first value should be the offset
	$offset = array_shift($undecoded_phrase); 
	$phrase = null; 
	
	//Loop through the remaining phrases and decode each value
	foreach ($undecoded_phrase as $key=>$value) {
		if ( (! is_numeric($value)) || ($value < 33) || ($value > (127+$offset)) ) {
		//It's not a valid number
			die('Invalid captcha image'); 
		}
		
		$phrase .= chr($value - offset); 
	}
	
	//Get the fonts stored in the directory the script is in
	$fonts = array(); 
	
	//Feel free to change this to whatever hardcoded path you store fonts in
	$path = dirname(__FILE__); 
	if ($handle = opendir($path)) {
		while (false !== ($file = readdir($handle))) {
		//Loop through the directory, finding all the TrueType files listed there
	   		if (substr(strtolower($file), -4, 4) == '.ttf') {
				$fonts[] = $path . '/' . $file;
			}
		}
	}	
	if (count($fonts) < 1)	{
		die('No fonts found'); 
	} 
	
	//Send the header
	header("Content-Type: image/jpeg");
	//Set the height of the image here - you can change it if you want, but the defaults work pretty well
	$width = 200;
	$height = 60; 
	$img = imagecreatetruecolor($width, $height);
	  
	//Draw the background with a random shade of pastel
	//First call to imagefilledrectangle always produces background color
    imagefilledrectangle($img, 0,0, $width,$height, imagecolorallocate($img, rand(210,255), rand(210,255), rand(210,255)));
	  
	//Choose random RGB colors between colors 
    $color_1 = rand(120, 185);
    $color_2 = rand(195, 280);
    
	//Next, we start making the background all weird and jaggedy
	//Create a bunch of different-colored four-cornered polygons to cover the background area
	  
	//Set the color bar width to a random amount between 10 and 30
	$colorbar_width = round(rand(10, 30));
    $i = 0;
    while ($i < $width) {
		//Create another color bar, shading across
		$colorbar_array = array($i, 0, //upper left point
		$colorbar_width, 0, //upper right point
		round(rand($colorbar_width-25, $colorbar_width+25)), $height, //Lower right point
		round(rand($i-15 , $i+15)), $height); // lower left point
		
		//Create the polygon, using four points from the array
		imagefilledpolygon($img, $colorbar_array, 4, imagecolorallocate($img, rand(210,255), rand(210,255), rand(210,255)));
		
		//Move forward across the X axis a random amount (it'll stop when we move off the right edge)
		$random_amount = round(rand(10, 30)); 
		$i += $random_amount;
        $colorbar_width += $random_amount; 
      }
	  
	  //Now let's create a bunch of veritical lines of different angles and thicknesses
	  $i = 0;
	  while ($i < $width) {
	   	//Create a big dark set of vertical lines
		$random_amount = round(rand(10, 30)); 
		$line_width = $i + $random_amount;
		$line_height = round(rand(1, 5)); 
		$line_total = ($line_width + $line_height); 
		if ($line_width >= $width) {
		//Make sure it doesn't go over the edge
			$line_width = $width - $line_height;
		}
		
		//Determines the slope of the line
		$offset = (round(rand(-3, 3)));
		
		$line_array = array($line_width, 0, //upper left point
		$line_width+$line_height, 0, //upper right point
		$line_width+$line_height+$offset, $height, //Lower right point
		$line_width+$offset, $height); // lower left point
		
		imagefilledpolygon($img, $line_array, 4, imagecolorallocate($img, rand($color_1,$color_2), rand($color_1,$color_2), rand($color_1,$color_2)));
		
        //Note that we could use as easily use imagefilled line here, if we wanted a single-pixel line
		$i += $random_amount;
      }
	  
	  $i = 0; 
	  while ($i < $height) {
	  //Create a big dark set of horizontal lines of random thicknesses
		$random_amount = round(rand(8, 15)); 
		$line_height = $i + $random_amount;
		$line_width = round(rand(1, 3)); 
		if ($line_height >= $height) {
		//Make sure it doesn't go over the top
			$line_height = $height - $line_width;
		}
		
		//Determines the angle of the line
		$offset = (round(rand(-6, 6)));
		
		$line_array = array(0, $line_height, //upper left point
		$width, $line_height+offset, //upper right point
		$width, $line_height+$line_width+$offset, //Lower right point
		0, $line_height+$line_width); // lower left point
		imagefilledpolygon($img, $line_array, 4, imagecolorallocate($img, rand($color_1,$color_2), rand($color_1,$color_2), rand($color_1,$color_2)));
		$i += $random_amount;
      }
	  
	  //Figure out how far to space the characters apart 
	  //We add to the phrase for padding
      $character_spacing = $width / (strlen($phrase)+2);
	  $initial_space = $character_spacing; 
	  $size = rand(22, $height/2);
      for ($i=0; $i<strlen($phrase); $i++) {
	  //Place each letter in its place
         $letter = $phrase[$i];
		 
		 //Set a random rotation 
         $rotation = rand(-30, 30);
		 
		 //Set a random place that won't be off the edge of the image
         $y = rand($size+4, $height-$size-4);
         $x = $character_spacing;
		 
		 //Move forward between 100% and 150% of the character spacing to make it erratic
         $character_spacing += round(rand($initial_space, $initial_space * 1.5));  
		 
		 if ($character_spacing > $width-($size)) {
		 //And check to make sure we haven't moved off the edge
		 	$character_spacing = $width-($size);
		}
		//Pick a random font from the array of stuff that we have
         $font = $fonts[rand(0, count($fonts)-1)];
		//Pick random RGB colors for the letter
         $r=rand(30,99); 
		 $g=rand(30,99); 
		 $b=rand(30,99); 
		 
		 //Create a letter and its shadow, with a slight offset
         $color_1  = imagecolorallocate($img, $r*1, $g*1, $b*1);
         $color_2  = imagecolorallocate($img, $r*3, $g*3, $b*3);
		 
		 //Print the shadow
		 imagettftext($img, $size, $rotation, $x, $y, $color_1, $font, $letter);
		 //And the letter
		 imagettftext($img, $size, $rotation, $x, $y-3, $color_2, $font, $letter);
         
		 //And set the size of the next letter
		 $size = rand(22, $height/2);
      }
	//Print the image to the screen, free the memory associated with $img, and exit
	ImageJPEG($img);
	Imagedestroy($img); 
	die; 
} 
//Otherwise, we're not displaying an image
//So check to see if someone's posted a guess as to what the captcha is
if ($_POST['captcha_guess']) {
	//Check to see if the hashed version of the user's guess 
	//matches the hashed value stored in the session
	if (md5($_POST['captcha_guess']) == $_SESSION['passmatch']) {
		//Send them on to the next page
		//May we suggest looking at #xx: Redirecting A User To A Different Page?
		echo "Hey, your form worked!";
		die; 
	} else {
		//It didn't work, and they may have misunderstood the word or just be a spambot
		//In either case, be gentle
		die; 
	}
}
//And if none of that's happened, then just display the form
//First, create the random four-letter password
$phrase = null;
//Figure out the number of characters we'll offset the image by
$offset = round(rand(1, 5)); 
/*The first digit of the encoded phrase (used to create the JPEG for Internet Explorer compliance)
is always a number between 1 and 5, and it's the number you add to the subsequent characters 
to get the true ASCII code.  
This isn't particularly uncrackable.  In fact, you could probably write a bot to figure this out in relatively short order.  However, we're relying on the fact that relatively few people will be using this script, and thus nobody will write a custom bot except for people specifically out to target your site. 
If you want an actually secure method, then use the mcrypt library to create a secure token to pass on in the URL, and use mcrypt to decode it.  That will pretty much fool everyone.  See #xx: Encrypting Data With Mcrypt for more details. */
$encoded_phrase = $offset;
	
//Create the phrase
for($i = 0; $i < 4; $i++) {
	//Select a random lowercase letter
	$random_number = rand(97, 122);
	$phrase.= chr($random_number); 
	$encoded_phrase .= '_' . ($random_number+offset);
}
	
//Store the MD5'd version in the session
$_SESSION['passmatch'] = md5($phrase); 
//echo the form	
echo '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">
	Please input the password you see here.  (All letters are lowercase.)  If you can\'t read the letters, refresh the page for a new set.<br />
   <img src="' . $_SERVER['PHP_SELF'] . '?cap=' . $encoded_phrase .'"><br />
   The phrase is: <input name="captcha_guess" type="text" size="5" maxlength="5"><br />
   <input name="" type="submit"></form>';
?>
