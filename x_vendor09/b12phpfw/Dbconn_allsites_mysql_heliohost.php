<?php
//J:\awww\www\vendor\b12phpfw\Dbconn_allsites_mysql_heliohost.php

//return [ null, 'mysql', 'localhost', 'z_blogcms', 'root', ''] ;
return [ null, 'mysql', 'johnny.heliohost.org', 'slavkoss_cmsakram', 'slavkoss_root', 'pozega141'] ;

/* // //////////////////////// O L D :
//                   J:\awww\www\b12phpfw\Dbconn_ allsites_mysql.php
//   to be copied to J:\awww\www\b12phpfw\Dbconn_ allsites.php
// single access point to our database (singleton class).
//Uncaught PDOException: SQLSTATE[HY000] [1045] Access denied for user 'slavkoss_root'@'johnny.heliohost.org' (using password: NO) in /home/slavkoss/public_html/zinc/Dbconn_ allsites.php:27
namespace B12phpfw\core\b12phpfw ;
//use PDO;
//abstract = Cls or Method for inheritance to avoid code redundancy, not to cre obj
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
        $dsn = "mysql:host=johnny.heliohost.org;dbname=slavkoss_cmsakram" ;
        //$dsn = "mysql:host=localhost;dbname=slavkoss_z_blogcms" ;
        $options = [
           PDO::ATTR_PERSISTENT   => true
          ,PDO::ATTR_ERRMODE      => PDO::ERRMODE_EXCEPTION
          ,PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING
        ];
        self::$instance=new PDO($dsn,'slavkoss_root','pozega141',$options);
        //self::$instance=n ew PDO($dsn,'root','',$options);
        //self::$instance=n ew PDO("mysql:host=localhost;dbname=z_blogcms",'root','',$options);
      }
      return self::$instance;
    }

    public static function getdbi($caller='') { return self::$dbi ; }


}
*/