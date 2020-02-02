<?php
/* configuration */

$root = "/home/www/wcphp/images";		/* image directory root */
$urlroot = "http://www.example.com/images";	/* URL root */
$max_width = 420;				/* max width */
$max_height = 600;				/* max height */
$overwrite_images = true;			/* allow overwrite */

/* permitted subdirectories */
$target_dirs = array("article", "banners");

/* end config */

if (!function_exists(getimagesize)) {
    die("getimagesize() required.");
}

/* get upload information */
$location = strval($_POST['location']);
$newname = strval($_POST['newname']);
$upfile = $_FILES['upfile']['tmp_name'];
$upfile_name = $_FILES['upfile']['name'];

/* delete any unwanted characters in the target name */
if ($newname) {
    $newname = preg_replace('/[^A-Za-z0-9_.-]/', '', $newname);
} else {
    $newname = preg_replace('/[^A-Za-z0-9_.-]/', '', $upfile_name);
}

/* validate parameters */
if (!in_array($location, $target_dirs)) {
    /* invalid location */
    die("invalid target directory.");
} else {
    $urlroot .= "/$location";
}

if (!$upfile) {
    /* no file */
    die("no file for upload.");
}

/* verify file type */
$file_types = array(
    "image/jpeg"	=> "jpg",
    "image/pjpeg"	=> "jpg",
    "image/gif"		=> "gif",
    "image/png"		=> "png",
);
$width = null;
$height = null; 

/* extract MIME type and size for the image */
$img_info = getimagesize($upfile);
$upfile_type = $img_info["mime"];
list($width, $height, $t, $attr) = $img_info;

/* validate type */
if (!$file_types[$upfile_type]) {
    die("image must be in JPEG, GIF, or PNG format.");
} else {
    $file_suffix = $file_types[$upfile_type];
}

/* validate size */
if ($width > $max_width || $height > $max_height) {
    die("size $width x $height exceeds maximum $max_width x $max_height.");
}

/* force file suffix */
$newname = preg_replace('/\.(jpe?g|gif|png)$/i', "", $newname);
$newname .= ".$file_suffix";
$new_fullpath = "$root/$location/$newname";

if ((!$overwrite_images) && file_exists($new_fullpath)) {
    die("file exists; will not overwrite.");
}

/* copy the file into final location */
if (!copy($upfile, $new_fullpath)) {
    die("copy failed.");
}

$image_url = "$urlroot/$newname";

/* display status */
print "HTML for image:</strong><br><textarea cols=\"80\" rows=\"4\">";
print "<img src=\"$image_url\" $attr alt=\"$newname\" border=\"0\"/>";
print "</textarea><br>";
print '<a href="upload.html">Upload another image?</a>';

?>
