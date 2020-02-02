<?php
//J:\awww\www\fwphp\glomodul4\help_sw\test\gallery_skoglund\gallery\includes\initialize.php
// Define the core paths
// Define them as absolute paths to make sure that require_once works as expected

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

$UPTO_WSROOT = '../../../../../../../../' ; //PATHWSROOT=J:\awww\www\
$PATHWSROOT = realpath($UPTO_WSROOT) ; // .'/zinc/_ConfAllSites4.php';
defined('IMG_PATH') ? null : define('IMG_PATH', $PATHWSROOT.DS.'zinc'.DS.'img');

// module root :
defined('SITE_ROOT') ? null : 
  define('SITE_ROOT', dirname(__DIR__));
  //define('SITE_ROOT', '/fwphp/glomodul4/help_sw/test/gallery_skoglund/gallery');
  //define('SITE_ROOT', DS.'Users'.DS.'kevin'.DS.'Sites'.DS.'photo_gallery');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.'/includes');

// load config file first
require_once(LIB_PATH.'/config.php');

// load basic functions next so that everything after can use them
require_once(LIB_PATH.'/functions.php');

// load core objects
require_once(LIB_PATH.'/session.php');
require_once(LIB_PATH.'/database.php');
require_once(LIB_PATH.'/database_object.php');
require_once(LIB_PATH.'/pagination.php');

//require LIB_PATH.'/PHPMailer/src/Exception.php';
//require LIB_PATH.'/PHPMailer/src/PHPMailer.php';
//require LIB_PATH.'/PHPMailer/src/SMTP.php';
          //require_once(LIB_PATH."/phpMailer/class.phpmailer.php");
          //require_once(LIB_PATH."/phpMailer/class.smtp.php");
          //require_once(LIB_PATH."/phpMailer/language/phpmailer.lang-en.php");

// load database-related classes
require_once(LIB_PATH.'/user.php');
require_once(LIB_PATH.'/photograph.php');
require_once(LIB_PATH.'/comment.php');

?>