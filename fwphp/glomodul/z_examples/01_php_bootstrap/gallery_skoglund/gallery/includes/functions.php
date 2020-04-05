<?php

function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function output_message($message="") {
  if (!empty($message)) { 
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}

//  __autoload() is deprecated, use spl_autoload_register() instead
  spl_autoload_register(
  function($fqcn) //Full Qualified Class Name eg B12phpfw\fwphp\www4 (B12phpfw=PATHWSROOT)
  {
    /*$fqcn = strtolower($fqcn);
    $path = LIB_PATH.DS."{$fqcn}.php";
    if(file_exists($path)) {
      require_once($path);
    } else {
      die("The file {$fqcn}.php could not be found.");
    } */
    
      try {
        $class_file = LIB_PATH.DS . strtolower($fqcn) . '.php'; 
        if (is_file($class_file)) {
          require_once $class_file;
        } else {
          throw new Exception("Unable to load class $fqcn in file $class_file.");
        }
      } catch (Exception $e) {
        echo 'Exception caught: ',  $e->getMessage(), "\n";
      }

  }); // e n d  f n  c l o s u r e
/*
function __autoload($class_name) {
  $class_name = strtolower($class_name);
  $path = LIB_PATH.DS."{$class_name}.php";
  if(file_exists($path)) {
    require_once($path);
  } else {
    die("The file {$class_name}.php could not be found.");
  }
}
*/


function include_layout_template($template="") {
  include(SITE_ROOT.DS.'public'.DS.'layouts'.DS.$template);
}


function log_action($action, $message="") {
  $logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
  $new = file_exists($logfile) ? false : true;
  if($handle = fopen($logfile, 'a')) { // append
    $timestamp = strftime("%Y-%m-%d %H:%M:%S", time());
    $content = "{$timestamp} | {$action}: {$message}\n";
    fwrite($handle, $content);
    fclose($handle);
    if($new) { chmod($logfile, 0755); }
  } else {
    echo "Could not open log file for writing.";
  }
}

function datetime_to_text($datetime="") {
  $unixdatetime = strtotime($datetime);
  return strftime("%B %d, %Y at %I:%M %p", $unixdatetime);
}

?>