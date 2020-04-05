<?php
namespace B12phpfw\clickmeModule ; //FUNCTIONAL NAME SPACING (not dir names ee positional)
//Instead of require 'm.php'; require 'v.php';  require 'c.php'; :
//    ***** namespaced cls name --> cls script path *****

//Instead of require 'm.php'; require 'v.php';  require 'c.php'; :
//    ***** namespaced cls name --> cls script path *****
class Autoloader
{
  private static function get_module_cls_script_path($class, $nsprefix) {
    //replace name space backslash to current operating system directory separator
    $DS = DIRECTORY_SEPARATOR ;

    $cls_script_path = __DIR__ .'/'
      . str_replace( [$nsprefix,'\\'] //substrings to replace
                       , ['', '/']    //replacements
                       , $class       //in string
        ).'.php'; //append cls script extension and convert (to Windows) backslash :
   $cls_script_path = str_replace(['/','\\'], [$DS,$DS], $cls_script_path) ;

   return $cls_script_path ;
  }

  public static function autoload($class) //namespaced className
  {
    // ********** 1. module_ cls_ script_ path **********  eg B12phpfw\\clickmeModule
    $cls_script_path1 = self::get_module_cls_script_path($class, $nsprefix1='B12phpfw\\clickmeModule\\') ;

    // ********** 2. cls_ script_ path_ external_ module **********
    //$cls_script_path = $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';


      // ********** 3. r e q u i r e  cls_ script_ path **********
      switch (true) {
        case file_exists($cls_script_path1): include_once $cls_script_path1 ; break;
        //case file_exists($cls_script_path2): include_once $cls_script_path2;  break;
        //case file_exists($cls_script_path_external_m): include_once $cls_script_path_external_m; break;
        default:
          if ('1') { echo 'For namespaced class '. $class
            . '<br />Possible CLASS SCRIPTS NAMES derived from functional namespaces,'
            . '<br />ee from vendor name space prefixes :'
            . "<br />\"$nsprefix1\" are :"
            ; // or \"$nsprefix2\" or \"$nsprefix3\" or \"$nsprefix4\"
            echo '<pre>';
            print_r([$cls_script_path1]); //, $cls_script_path2, $cls_script_path3, $cls_script_path4
            //print_r('Namespaced class '. $class .' has not class script ?');
            echo '</pre>';
          }
          break;
      }
  }
}
//spl_autoload_register('config\Autoloader::autoload');



/*
class Autoloader
{
    public static function autoload($class) //namespaced className
    {
        //replace name space backslash to directory separator of the current operating system
        //if dirs structure: $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
        //$fileName = $class . '.php';
      $ns_vendor_module = 'B12phpfw\\clickmeModule' ;

      //$cls_script_path_external_m = $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

      $cls_script_path_module = __DIR__ .'/'
        . str_replace( [$ns_vendor_module,'\\'] //substrings to replace
                         , ['', '/']            //replacements
                         , $class               //in string
          ).'.php';                             //append cls script extension
        switch (true) {
          //case file_exists($cls_script_path_external_m):
          //  include_once $cls_script_path_external_m ;
          //  break;
          case file_exists($cls_script_path_module):
            include_once $cls_script_path_module ;
            break;
          default:
            echo '<pre>'; print_r('Namespaced class '. $class .' does not exist'); echo '</pre>';
            break;
        }
    }
}
//spl_autoload_register('config\Autoloader::autoload');
*/
