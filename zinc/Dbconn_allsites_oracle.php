<?php
//                   J:\awww\www\zinc\Dbconn_allsites_oracle.php
//   to be copied to J:\awww\www\zinc\Dbconn_allsites.php
// single access point to our database (singleton class).
namespace B12phpfw ;
use PDO;
abstract class Dbconn_allsites
{
    private static   $instance   = null;
    protected static $dbi        = null;
    protected static $do_pgntion = null;

    private function __construct() {
    }

    public static function get_or_new_dball($caller)
    {
      self::$dbi = 'oracle' ;
      if(is_null(self::$instance)) {
        $options = [
           PDO::ATTR_PERSISTENT   => true
          ,PDO::ATTR_ERRMODE      => PDO::ERRMODE_EXCEPTION
          ,PDO::ATTR_ORACLE_NULLS => PDO::NULL_TO_STRING
        ];

        $host = // USERDOMAIN = pcname eg sspc2 is ok for oracle not for mysql
          getenv('USERDOMAIN',true)?:getenv('USERDOMAIN').'/XE:pooled;charset=UTF8' ;
        $dsn  ='oci:dbname='.$host ;
        self::$instance = new PDO($dsn, 'hr', 'hr', $options); 
        //$dsn = "mysql:host=localhost;dbname=z_blogcms" ;
        //self::$instance=new PDO($dsn,'root','',$options);
      }
      return self::$instance;
    }

    public static function getdbi($caller='')
    {
      return self::$dbi ;
    }


}
      //WORK ALL THREE : (etenv('USERDOMAIN') does not work for MySql !!)
      //,'host'=>getenv('USERDOMAIN',true)?:getenv('USERDOMAIN').'/XE:pooled;charset=UTF8'
      //,'host'=>'sspc2/XE:pooled;charset=UTF8'
      //,'host'=>'localhost/XE:pooled;charset=UTF8'
      //
      // Safely get the value of an environment variable, ignoring whether 
      // or not it was set by a SAPI or has been changed with putenv
      //$ip = getenv('REMOTE_ADDR', true) ?: getenv('REMOTE_ADDR')
      // define  h o s t :
      //, 'host'=>'define  h o s t  in Config_ allsites.php'
