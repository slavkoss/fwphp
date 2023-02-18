<?php
// H:\dev_web\htdocs\t_oci8\ACXE2\equip_graph_img_cre.php
/* Create JPEG image of equipment allocation statistics
   Don't have any text or white space before the "<?php" tag 
   because it will be incorporated into image stream and corrupt picture.
call web service and create a graph.
Change below web service URL to match your system.
*/
define('WEB_SERVICE_URL', "http://dev:8083/t_oci8/ACXE2/equip_getjson_count.php");
 
session_start();
require('_02autoload.php');
//require('Session.php');
//require('Page.php');
 
$sess = new \Equipment\Session;
$sess->getSession();
if (!isset($sess->username) || empty($sess->username)
    || !$sess->isPrivilegedUser()) {
    header('Location: index.php');
    exit;
}
$data = callservice($sess);
do_graph("Equipment Count", 600, $data);
 
// Functions
function callservice($sess) {
    // Call web "service" to get the Equipment statistics
    $calldata = array('username' => $sess->username);
    $options = array(
        'http' => array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
       'content' => http_build_query($calldata)
        )
    );
    $ctx = stream_context_create($options);
    $result = file_get_contents(WEB_SERVICE_URL, false, $ctx);
    if (!$result) {
        $data = null;
    } else {
        $data = json_decode($result, true);
 
        // Sort an array by keys using an anonymous function
        uksort($data, function($a, $b) {
            if ($a == $b)
                return 0;
            else
                return ($a < $b) ? -1 : 1;
            });
        }
    return($data);
}

function do_graph($title, $width, $items) {
    $border = 50;             // border space around bars
    $caption_gap = 4;         // space between bar and its caption
    $bar_width = 20;          // width of each bar
    $bar_gap = 40;            // space between each bar
    $title_font_id = 5;       // font id for the main title
    $bar_caption_font_id = 5; // font id for each bar's title
 
    // Image height depends on number of items
    $height = (2 * $border) + (count($items) * $bar_width) +
        ((count($items) - 1) * $bar_gap);
 
    // Find horizontal distance unit for one item
    $unit = ($width - (2 * $border)) / max($items);
 
    // Create image and add the title
    $im = ImageCreate($width, $height);
    if (!$im) {
        trigger_error("Cannot create image<br />\n", E_USER_ERROR);
    }
    $background_col = ImageColorAllocate($im, 255, 255, 255); // white
    $bar_col = ImageColorAllocate($im, 0, 64, 128);           // blue
    $letter_col = ImageColorAllocate($im, 0, 0, 0);           // black
   ImageFilledRectangle($im, 0, 0, $width, $height, $background_col);
    ImageString($im, $title_font_id, $border, 4, $title, $letter_col);
    // Draw each bar and add a caption
    $start_y = $border;
    foreach ($items as $caption => $value) {
        $end_x = $border + ($value * $unit);
        $end_y = $start_y + $bar_width;
        ImageFilledRectangle($im, $border, $start_y, $end_x, $end_y, $bar_col);
        ImageString($im, $bar_caption_font_id, $border,
            $start_y + $bar_width + $caption_gap, $caption, $letter_col);
        $start_y = $start_y + ($bar_width + $bar_gap);
    }
 
    // Output complete image.
    // Any text, error message or even white space that appears before 
    // this (including any white space before "<?php" tag) will corrupt 
    // image data.  Comment out "header" line to debug any issues.
    header("Content-type: image/jpg");
    ImageJpeg($im);
    ImageDestroy($im);
}    
    
            
?>

