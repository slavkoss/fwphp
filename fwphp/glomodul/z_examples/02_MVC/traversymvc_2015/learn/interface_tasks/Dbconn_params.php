<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_MVC\traversymvc\learn\interface_tasks\Dbconn_params.php
//namespace B12phpfw ;
//use PDO;
/* was :
class Dbconn_params {
    protected $host = "localhost";
    protected $name = "tema";
    protected $user = "root";
    protected $password = "";
}
*/
//see Dbconn_allsites
class Dbconn_params
{
    protected static $dbi        = null;
    private static   $instance   = null;

    private function __construct() {
    }

    public static function get_or_new_dball($caller)
    {
      self::$dbi = 'mysql' ;
      if(is_null(self::$instance)) {
        $dsn = "mysql:host=localhost;dbname=tema" ;
        //$dsn = "mysql:host=localhost;dbname=cmsakram" ;
        $options = [
           PDO::ATTR_PERSISTENT   => true
          ,PDO::ATTR_ERRMODE      => PDO::ERRMODE_EXCEPTION
          ,PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING
        ];
        self::$instance=new PDO($dsn,'root','',$options);
        //self::$instance=new PDO("mysql:host=localhost;dbname=cmsakram",'root','',$options);
      }
      return self::$instance;
    }

    public static function getdbi($caller='')
    {
      return self::$dbi ;
    }


}
