<?php
//$conn_params = 
//     list( self::$do_pgntion, self::$dbi, self::$db_hostname, self::$db_name
//    , self::$db_username, self::$db_userpwd) 
//    = require __DIR__ . '/Dbconn_allsites.php'; // not r equire_ once !!
//return [ null, 'mysql', 'localhost', 'z_blogcms', 'root', ''] ;
return [ null, 'mysql', 'fdb21.freehostingeu.com', '3266814_cms', '3266814_cms', 'pozega141'] ;


/* //////////////// old :
//                   J:\awww\www\b12phpfw\Dbconn_allsites_mysql.php
//   to be copied to J:\awww\www\b12phpfw\Dbconn_allsites.php
// single access point to our database (singleton class).
namespace B12phpfw\core\b12phpfw ;
//use PDO;
//abstract = Cls or Method for inheritance to avoid code redundancy, not to cre obj
abstract class Dbconn_allsites
{
    protected static $dbi        = null;  // mysql or oracle or any dbi you wish
    private static   $instance   = null; // singleton !
    //command for all tables global read fn "rr" to read paginated ee to read rows block (recordset) :
    protected static $do_pgntion = null;

    private function __construct() {
    }

    public static function get_or_new_dball($caller)
    {
      self::$dbi = 'mysql' ;
      if(is_null(self::$instance)) {
        $dsn = "mysql:host=fdb21.freehostingeu.com;dbname=3266814_cms" ;
        $options = [
           \PDO::ATTR_PERSISTENT   => true
          ,\PDO::ATTR_ERRMODE      => \PDO::ERRMODE_EXCEPTION
          ,\PDO::ATTR_ORACLE_NULLS => \PDO::NULL_TO_STRING
        ];
        self::$instance=new \PDO($dsn,'3266814_cms','pozega141',$options);
        //self::$instance=n ew \PDO("mysql:host=localhost;dbname=z_blogcms",'root','',$options);
      }
      return self::$instance;
    }

    public static function getdbi($caller='') { return self::$dbi ; }


}
*/