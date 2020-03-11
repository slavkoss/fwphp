<?php
/*
* For now (todo refactoring this code) J:\awww\www\zinc\Dbconn_allsites_mysql.php
*   is copied to J:\awww\www\zinc\Dbconn_allsites.php
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
//vendor_namesp_prefix \ processing (behavior) \ cls dir (POSITIONAL part of ns, CAREFULLY !)
namespace B12phpfw\core\zinc ;
use PDO;
//abstract = Cls or Method for inheritance to avoid code redundancy, not to cre obj
abstract class Dbconn_allsites
{
    protected static $dbi ; // mysql or oracle or any dbi you wish
    
    private static   $instance   = null ; // singleton !
    
    //command for all tables global read fn "rr" to read paginated ee to read rows block (recordset) :
    protected static $do_pgntion = null;



    private function __construct() {
    }

    public static function get_or_new_dball($caller='') //or connect
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

    public static function disconnect()
    {
        self::$instance = null;
    }

    //JS  M s g  dialog IMPLEMENTATION DELEGATED TO CONF & UTILS CLS Config_ allsites
    //abstract protected function createEntity(array $row);
    //abstract protected static function jsmsg(array $msg);

}
