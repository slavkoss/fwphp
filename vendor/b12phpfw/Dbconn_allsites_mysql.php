<?php
//     list( self::$do_pgntion, self::$dbi, self::$db_hostname, self::$db_name
//    , self::$db_username, self::$db_userpwd) 
//    = require __DIR__ . '/Dbconn_allsites.php'; // not r equire_ once !!
return [ null, 'mysql', 'localhost', 'z_blogcms', 'root', ''] ;

/* ///////////// old :
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\core\b12phpfw ;
//use PDO;
//abstract = Cls or Method for inheritance to avoid code redundancy, not to cre obj
abstract class Dbconn_allsites
{
    
    private static $instance   = null ; // singleton !
    
    //for all tbls global read fn "rr" to read paginated ee to read rows block (recordset) :
    protected static $do_pgntion = null;

    protected static $dbi = 'mysql' ; // mysql or oracle or any  d b i  you wish
    private static $hostpc = 'localhost';
    private static $dbname = 'z_blogcms';
    private static $user   = 'root';
    private static $pass   = '';



    private function __construct() {
    }

    public static function get_or_new_dball($caller='') //or connect_db
    {
      //get    = returns created dbobj (db instance, mem.adress of cls vars & fns) 
      //or_new = creates and returns dbobj
      //dball  = here (Dbconn_allsites) and Db_allsites is abstract code for any db, any tbl
      if(is_null(self::$instance)) {
        $dsn = 'mysql:host='. self::$hostpc .';dbname='. self::$dbname .';' ;
        $options = [
           \PDO::ATTR_PERSISTENT   => true
          ,\PDO::ATTR_ERRMODE      => \PDO::ERRMODE_EXCEPTION
          ,\PDO::ATTR_ORACLE_NULLS => \PDO::NULL_TO_STRING
        ];
        self::$instance=new \PDO($dsn,self::$user,self::$pass,$options);
        //self::$instance=n ew P DO("mysql:host=localhost;dbname=z_blogcms",'root','',$options);
      }
      return self::$instance;
    }

    public static function getdbi($caller='') { return self::$dbi ; }

    public static function disconnect() { self::$instance = null; }

    //JS  M s g  dialog IMPLEMENTATION DELEGATED TO CONF & UTILS CLS Config_ allsites
    //abstract protected function createEntity(array $row);
    //abstract protected static function jsmsg(array $msg);

}
*/
/*
* For now (todo refactoring this code) J:\awww\www\b12phpfw\Dbconn_allsites_mysql.php
*   is copied to J:\awww\www\b12phpfw\Dbconn_allsites.php
*        SINGLE ACCESS POINT TO OUR DATABASE (SINGLETON CLASS)
* SINGLETON PATTERN with a class that establishes a database connection, 
* and restricts the number of instances to only one.
* https://phpenthusiast.com/blog/the-singleton-design-pattern-in-php
* All variables point to the same object :
* $object1 = Singleton::get_ or_new_dball(); $object2 = Singleton::get_ or_new_dball(); ...
* $instanc e Hold class instance - is private so it won't be changed from outside cls. It is also static so it is shared by all instances
* How singleton generates global variable : 
*   STATIC VARIABLE (IF NOT ALSO PRIVATE) CAN BE ACCESSED FROM EVERYWHERE.
*/