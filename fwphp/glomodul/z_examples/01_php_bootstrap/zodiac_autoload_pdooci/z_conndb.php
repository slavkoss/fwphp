<?php
namespace B12phpfw\glomodul\help_sw\test\pdooci_autoload_zodiac;
// J:\wamp64\www\fwphp\glomodul\help_sw\test\pdooci_autoload_zodiac\_conndb.php
// J:\awww\apl\dev1\inc\db\_4DbConnGlbl.php
//make sure spl_autoload_register is done BEFORE session_start()

use PDO; //use PDOOCI\PDO as PDO;
//require_once(APLDIR.DS.'vendor'.DS.'phpfwaplw'.DS.'autoload.php');
//require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db/PDOOCI/PDO.php';

class _conndb
{
    public static  $DBI = 'pdooci';
    ///private static $DSN = 'sspc1/XE:pooled;charset=UTF8'; //UTF8 EE8MSWIN1250
    private static $DSN = getenv('USERDOMAIN', true) ?: getenv('USERDOMAIN')
                .'/XE:pooled;charset=UTF8'; //UTF8 EE8MSWIN1250
    private static $USR = 'hr';
    private static $PSW = 'hr';

    private static $dbi  = null; // object variabla db instance

    public function __construct() {
        die('Init static class functions is not allowed');
    }

    public static function getInstance() //connect()
    {
      //           SINGLETON PATTERN 
      // - only one PDO conn. exist across whole app.
      // DO NOT MISSUSE SINGLETONS AS GLOBAL VARIABLES
      //      but use Dependency Injection instead
      if ( null == self::$dbi )
      {
        $pdo_options[PDO::ATTR_ERRMODE]    = PDO::ERRMODE_EXCEPTION;
        $pdo_options[PDO::ATTR_PERSISTENT] = true;  

        try
        {
          self::$dbi=new PDO(
            self::$DSN,self::$USR,self::$PSW,$pdo_options);
                            if(TEST) { self::dbg_confdb(
                            __LINE__,__FUNCTION__,__FILE__ );}
        } catch(PDOException $e) {
          msg_conn_failed();
          die($e->getMessage());
        }
      }
       return self::$dbi;

    }

    public static function disconnect()
    {
        self::$dbi = null;
    }


  protected static function msg_conn_failed()
  { ?><SCRIPT LANGUAGE="JavaScript"><!-- Begin
    alert( '<?php echo str_replace('<br>','\n'
                      ,str_replace('<br>','\n',
      '000. '.str_replace('\\','\\\\',basename(__FILE__)).' SAYS:'
      //.'<br>000.01 '.'json encoded :'
      .'<br>***ERROR _4DbConnGlbl DSN='.self::$DSN
      .',<br>USR='.self::$USR
      .'<br>'.$ex->getMessage()
                       ));?>'
    ); //alert(t1+"\n"+t2+"\n"+t3);
    // End --></SCRIPT><?php 
  }


  
  
  
 
  // ~~~~~~~
  // ~~~~~~~

  protected static function dbg_confdb(
     $lne = __LINE__,$fn=__FUNCTION__,$fle = __FILE__
  )
  {
    //echo '<b>'.__FILE__.' SAYS:</b><pre>';
    //echo 'PDOOCIonOCI8 connection successful, DSN='.DSN.', USR='.USR.', PSW='.PSW; echo '</pre>';
    ?><SCRIPT LANGUAGE="JavaScript"><!-- Begin
    alert( '<?php echo str_replace('<br>','\n',str_replace('<br>','\n'
    , 'step 4. '.str_replace('\\','\\\\',basename(__FILE__)).' SAYS:<br>'
      .'000.01 '.'json encoded :'
      .'PDOOCIonOCI8 connection successful, DSN='.self::$DSN
      .',<br>USR='.self::$USR.', PSW='.self::$PSW
         ));?>'
    ); //alert(t1+"\n"+t2+"\n"+t3);
    // End --></SCRIPT><?php
     /*
     echo '<h4>redak '.$lne.', '.$fle
        .SPAN_BLUE_BOLD.' step 4. fn '.$fn.'</span>'
     .' SAYS:</h4>';
     echo '<pre>';
       echo '<br />'.'$views='; print_r($views);
       echo '<br />'.'$akc params='; print_r($akc params);
       echo '<br />'.'$ctr='; print_r($ctr);
       echo '<br />'.'$akc='; print_r($akc);
     echo '</pre>'; 
    */
  }

  
} // e n d  c l s  
  
  
  
          //self::$dbi =  new PDO( "mysql:host=".self::$dbHost.";"
          //."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
  
  
/*
PDOs significant benefit is that it provides uniform access to multiple dbs.
*/

//$fqcn = 'PDOOCI\\PDO'; //fully-qualified cls name 
//loadClass($fqcn); //test_autolooad($clsnamefull)

//define("DBI", 'pdooci'); // 'pdooci' or 'pdoora', mysql, sqlite
//define("DSN", "sspc1/XE:pooled;charset=UTF8"); // UTF8 EE8MSWIN1250
//define("USR", "mercedes");  define("PSW", "m1");
          //self::$dbi = new PDO('mysql:host=localhost;dbname=php_mvc', 'root', 'psw', $pdo_options);
          
        //require_once $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php'; //E.Rangel's pdooci in ROOTDIR
        
//for eg require_once $_SERVER['DOCUMENT_ROOT'].'/inc/db/PDO.php';
// test_autolooad($prefix, $class) // return: void
// parameterss: 
//   'Foo\\Bar\\' = project-specific name space prefix 
//                = for me PDOOCI  or Phpfw\\Gloincdb
//   fully-qualified class name = for me 'PDOOCI\PDO'
 // After registering autoload function with SPL, following new
 // would cause autoload fn to attempt to load :
 //      \Foo\Bar\Baz\Qux class = fully-qualified class name 
 //      PDOOCI\PDO class = fully-qualified class name 
 // from /path/to/project/src/Baz/Qux.php:
 //      new \Foo\Bar\Baz\Qux; // Baz = class name space  Qnx = class name
 //      new PDOOCI\PDO; // PDOOCI = class name space  PDO = class name

 
 
/*
conn mercedes/m1@ora7      je javio (tj ne može se konektirati ni jedan klijent) :
ORA-011033: ORACLE initialization or shutdown in progress. 

sqlplus /nolog
connect / as sysdba
shutdown abort
startup nomount
alter database mount;
alter database open;
                       ORA-00333: redo log read error block 1590 count 6905
                     
shutdown abort
startup mount
recover database 
                      ORA-00283: recovery session canceled due to errors
                      ORA-00333: redo log read error block 1590 count 458
PA NE IDE alter database open;

Imao sam error ORA-011033: ORACLE initialization or shutdown in progress
https://stackoverflow.com/questions/53676/how-to-resolve-ora-011033-oracle-initialization-or-shutdown-in-progress
sqlplus /nolog
connect / as sysdba
Show parameter control_files
        ispise :   C:\ORACLEXE\APP\ORACLE\ORADATA\XE\CONTROL.DBF
select a.group#, b.status, a.member
from v$logfile a ,v$log b 
where a.group#=b.group# and b.status='CURRENT';
       ispise :  1 CURRENT
         C:\ORACLEXE\APP\ORACLE\FAST_RECOVERY_AREA\XE\ONLINELOG\O1_MF_1_FDMSD302_.LOG
shutdown abort
startup mount
recover database using backup controlfile until cancel;
          asks: Specify log: {<RET>=suggested | filename | AUTO | CANCEL}
C:\ORACLEXE\APP\ORACLE\FAST_RECOVERY_AREA\XE\ONLINELOG\O1_MF_1_FDMSD302_.LOG
                        or C:\APP\USER\ORADATA\ORACLEDB\REDO03.LOG
alter database open resetlogs;

*/

?>
