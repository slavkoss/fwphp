<?php
//                   J:\awww\www\zinc\Dbconn_allsites_mysql.php
//   to be copied to J:\awww\www\zinc\Dbconn_allsites.php
// single access point to our database (singleton class).
namespace B12phpfw ;
use PDO;
abstract class Dbconn_allsites
{
    protected static $dbi        = null;
    private static   $instance   = null;
    protected static $do_pgntion = null;

    private function __construct() {
    }

    public static function get_or_new_dball($caller)
    {
      self::$dbi = 'mysql' ;
      if(is_null(self::$instance)) {
        $dsn = "mysql:host=localhost;dbname=z_blogcms" ;
        $options = [
           PDO::ATTR_PERSISTENT   => true
          ,PDO::ATTR_ERRMODE      => PDO::ERRMODE_EXCEPTION
          ,PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING
        ];
        self::$instance=new PDO($dsn,'root','',$options);
        //self::$instance=new PDO("mysql:host=localhost;dbname=z_blogcms",'root','',$options);
      }
      return self::$instance;
    }

    public static function getdbi($caller='')
    {
      return self::$dbi ;
    }


}
