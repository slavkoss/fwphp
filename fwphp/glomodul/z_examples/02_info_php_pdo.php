<?php
// J:\awww\www\fwphp\glomodul\help_sw\test\01info\00info_php_pdo.php
//require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

//use P DOO CI\PDO; // later is PDO MySQL !!!
//use B12phpfw\db\_4DbConnGlbl;
//$db = _4DbConnGlbl::get_or_new_dball();
//$this->db = _4DbConnGlbl::get_or_new_dball();

//J:/wlaragon64/www/dev1/vendor/autoload.php
    //NOT J:/wlaragon64/www/vendor/autoload.php
    // Laragon vhost: {name}.dev -> I made dev1
    //DocumentRootList=J:\wlaragon64\www||J:\wlaragon64\www\dev1



echo __FILE__.' said : '.'<br />';

echo "<h3>include_path=".get_include_path()."</h3>";


//https://www.w3resource.com/php/super-variables/$_SERVER.php
$findit=array('/php/super-variables/test.php'
  , '/php/super-variables/test1123.php'
  , $_SERVER['SCRIPT_NAME']
         //= , '/fwphp/glomodul/z_examples/'.basename(__FILE__)
  , '/php/super-variables/php-self-advanced-example1.php'
);
for ($j=0; $j<count($findit); $j++) {
  if ($_SERVER['PHP_SELF']==$findit[$j]) echo "<h2>PHP Super Globals</h2>";
}
                /**
                http://dev1:8083/fwphp/glomodul/z_examples/01_phpinfo.php?aaa/111
                $_SERVER['DOCUMENT_ROOT']   J:/awww/www/ 

                $_SERVER['REQUEST_METHOD']   GET
                $_SERVER['REQUEST_URI']   /fwphp/glomodul/z_examples/01_phpinfo.php?aaa/111
                $_SERVER['SCRIPT_NAME']   /fwphp/glomodul/z_examples/01_phpinfo.php 
                $_SERVER['QUERY_STRING']   aaa/111

                $_SERVER['REQUEST_SCHEME']   http 
                $_SERVER['SERVER_NAME']      dev1 
                $_SERVER['SERVER_PORT']      8083
                $_SERVER['HTTP_HOST']        dev1:8083 

                SERVER_ADDR is the address of the server PHP code is run on. 
                REMOTE_ADDR = IP address from which the user is viewing the current page
                            = IP address the request arrived on
                on localhost REMOTE_ADDR is same as SERVER_ADDR

                On PHP 5.2, one must write
                $ip = getenv('REMOTE_ADDR', true) ? getenv('REMOTE_ADDR', true) : getenv('REMOTE_ADDR') 
                */
$ip = getenv('REMOTE_ADDR', true) ?: getenv('REMOTE_ADDR') ;

$ipdocroot = array_key_exists('SERVER_ADDR',$_SERVER) ? $_SERVER['SERVER_ADDR'] : $_SERVER['LOCAL_ADDR'];

echo "<h3>ip=".$ip."</h3>";               // fe80::6dbd:14a1:dc3f:fbf8
echo "<h3>ipdocroot=".$ipdocroot."</h3>"; // fe80::6dbd:14a1:dc3f:fbf8
echo "<h3>ipdocroot=".gethostbyname($_SERVER['SERVER_NAME'])."</h3>"; //127.0.0.1






if (empty(PDO::getAvailableDrivers()))
     {
       //throw new PDOException ("PDO does not support any driver.");
       print("PDO does not support any driver.");
     }
echo '<pre>PDO::getAvailableDrivers()='; print_r(PDO::getAvailableDrivers()); echo '</pre>';
 
echo "Installed PDO drivers my fn getPDODriverList : " . getPDODriverList(" , ", false); 





// ******************************************
echo "<h1>1. MySQL PHP PDO</h1>";
// ******************************************
pdomysql:
define('DB_HOST', 'localhost');
define('DB_PORT', '3306');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
try {
    $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT;
    $conn = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
    echo "<h3>PHP PDO MySQL is working!</h3>";
}
catch (PDOException $e) {
    echo "<h3>PHP PDO MySQL is NOT working!</h3>";
    //die($e->getMessage());
    //goto p hpinfol abel;
}


$attributes = array( "DRIVER_NAME",
    "AUTOCOMMIT", 
    "ERRMODE", "CASE", "CLIENT_VERSION", 
    "CONNECTION_STATUS",
    "ORACLE_NULLS", "PERSISTENT", 
    //"PREFETCH", // Warning: PDO::getAttribute(): SQLSTATE[IM001]: Driver does not support this function: driver does not support that attribute
    "SERVER_INFO", "SERVER_VERSION"
    //"TIMEOUT" //not support that attribute
);
// 01-Dec-2016 11:13 
// Mysql on version  "5.6.29" not support "PDO::ATTR_PREFETCH"  and "PDO::ATTR_TIMEOUT" 

foreach ($attributes as $val) {
    echo "PDO::ATTR_$val=";
    echo $conn->getAttribute(constant("PDO::ATTR_$val")) . "<br />";
    //echo $conn->getAttribute("PDO::ATTR_$val") . "\n";
}



//if ($db->getAttribute(PDO::ATTR_DRIVER_NAME) == 'mysql') {
//  echo "Running on mysql; doing something mysql specific here\n";
//}


            try {
                 //if (!in_array("oci8",PDO::getAvailableDrivers(),TRUE))
                 if (!in_array("oci",PDO::getAvailableDrivers(),TRUE))
                 {
                    //throw new PDOException (
                    print (
                      "<b>NOT INSTALLED PHP PDO DB DRIVER oci FOR Oracle 11g</b>"
                    );
                 }
             }
             catch (PDOException $pdoEx)
             {
                 echo "<h3>Database Error .. Details :</h3><br /> {$pdoEx->getMessage()}";
                 //goto pdooci ; //p hpinfol abel;
             }
             
?>

<h3>
 <a href="http://dev1:8083/fwphp/glomodul/mkd/?edit=01/001_db/oracle_DB18c_devsuite10g_F6i_to_apex.txt">
 Install Oracle DB 18c XE
 </a>
</h3>

<?php





//pdooci:
// ******************************************
echo "<h1>2. Oracle DB 11g, 18c... XE PHP PDO</h1>";
// ******************************************
//works : Sqlplus HR/HR@XEPDB1     Sqlplus HR/HR@ora7
//        Sqlplus HR/HR@SSPC2:1521/XEPDB1

//global $DSN, $USR, $PSW;
global $DSN, $USR, $PSW;
$USR = 'hr'; //case insensitive
$PSW = 'hr'; //case sensitive

//Data Source Name : SERVER_NAME=dev1   SERVER_PORT=8083   HTTP_HOST=dev1:8083
//$USERDOMAIN = getenv('USERDOMAIN', true) ?: getenv('USERDOMAIN') ; //dev1:8083
$USERDOMAIN = filter_var( $_SERVER['SERVER_NAME'] , FILTER_SANITIZE_URL ) ;
//11g XE : $DSN = 'oci:dbname=sspc1/XE:pooled;charset=UTF8'; //charset=UTF8 EE8MSWIN1250
//18c XE : $DSN = 'oci:dbname=sspc1/ora7:pooled;charset=UTF8'; //charset=UTF8 EE8MSWIN1250

// $DSN is : oci:dbname=dev1:1521/XE:pooled;charset=UTF8 //ok
$DSN = 'oci:dbname=' 
  . $USERDOMAIN //filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL )
  .':1521/XE:pooled;charset=UTF8' //ok
  //.':SSPC1/XE:pooled;charset=UTF8' // :SSPC1 or :sspc1 are not working 
  //.':1521/XEPDB1'
  //.':pooled;charset=UTF8' //charset=UTF8 EE8MSWIN1250
; 


?>

<dl><dd>
<p>
ERROR if we use ora7 (alias of XEPDB1) : because <b>PHP does not see tnsnames.ora</b> also does not see ora7 alias of XEPDB1 (plugable DB name) :
<br /><b>XE (container DB) and XEPDB1 (plugable DB) are visible to DB clients even if tnsnames.ora does not exist.</b>
</p>

If $DSN = $DSN = 'oci:dbname=' . $USERDOMAIN .':1521/XEPDB1'
  <br />='oci:dbname=SSPC2:1521/<b>ora7</b>', hr/hr, ERRMODE_EXCEPTION, ATTR_PERSISTENT=true

<br />Then SQLSTATE[HY000]: pdo_oci_handle_factory: ORA-12514: TNS:listener does not currently know of service requested in connect descriptor (ext\pdo_oci\oci_driver.c:723)
</dd></dl>


<p><b>$DSN is : <?=$DSN?></b>, $USR=<?=$USR?> $PSW=<?=$PSW?>, ERRMODE_EXCEPTION, ATTR_PERSISTENT=true</p>


<?php

$conn  = null; // object variabla db instance
    //$pdo_options[PDO::ATTR_ERRMODE]    = PDO::ERRMODE_EXCEPTION;
    //$pdo_options[PDO::ATTR_PERSISTENT] = true;  
    try
    {
      //$conn=new P DOO CI\PDO($DSN, $USR, $PSW, $pdo_options);
      //$conn=new PDO($DSN, $USR, $PSW, $pdo_options);
      $conn=new PDO($DSN, $USR, $PSW);
      print(__FILE__.', '.__LINE__.' said: <h3>PHP PDO OCI CONNECTED : 
        $conn=new PDO($DSN, $USR, $PSW);
         </h3>');
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
      //$conn->setAttribute(PDO::ATTR_PERSISTENT, true );
    } catch(PDOException $e) {
      //msg_conn_failed();
      //die($e->getMessage());
      print('<br />'.__FILE__.', '.__LINE__.' said: ');
      print('<h3>'.$e->getMessage()).'</h3>';
      goto ocilabel ; //p hpinfol abel
    }

    
$attributes = array( "DRIVER_NAME",
    "AUTOCOMMIT", 
    "ERRMODE", "CASE", "CLIENT_VERSION", 
    //"CONNECTION_STATUS", //not support that attribute
    "ORACLE_NULLS", "PERSISTENT", 
    "PREFETCH", // Warning: PDO::getAttribute(): SQLSTATE[IM001]: Driver does not support this function: driver does not support that attribute
    "SERVER_INFO", "SERVER_VERSION"
    //,"TIMEOUT" //not support that attribute
);
// 01-Dec-2016 11:13 
// Mysql on version  "5.6.29" not support "PDO::ATTR_PREFETCH"  and "PDO::ATTR_TIMEOUT" 

foreach ($attributes as $val) {
    echo "PDO::ATTR_$val=";
    print_r($conn->getAttribute(constant("PDO::ATTR_$val"))) ;
    echo "<br />";
    //echo $conn->getAttribute("PDO::ATTR_$val") . "\n";
}
    
    
     //hr.employees.*,
$sql = "
SELECT
     emps.employee_id            employee_id1,
     departments.department_id   department_id2,
     emps.job_id                 job_id1,
     emps.manager_id             manager_id1,

     emps.first_name             first_name1,
     emps.last_name              last_name1,
     mngrs.first_name            manager_first_name,
     mngrs.last_name             manager_last_name,

     emps.hire_date              hire_date1,
     emps.salary                 salary1,
     emps.commission_pct         commission_pct1
 FROM departments
    LEFT JOIN employees emps ON departments.department_id = emps.department_id
    LEFT JOIN employees mngrs ON emps.manager_id = mngrs.employee_id
 WHERE  rownum < ?
 ORDER BY emps.last_name
" ;
try {
  //$sth = $this->db->prepare('SELECT '
  $sth = $conn->prepare($sql);

  $sth->execute([2]); //anonymus bindvars

  $sth->setFetchMode(PDO::FETCH_OBJ);
  $row = $sth->fetch();

  // V I E W
  echo '<pre>SELF JOIN EXAMPLE First row (ORDER BY employees.last_name) '; print_r($row); echo '</pre>';
    
} catch( PDOException  $e ) {
     echo '<pre>errrrrr aaaaaaaa'; print_r($e); echo '</pre>';
}

?>
<pre>
PS J:\app\oraclexe\product\18.0.0\dbhomeXE\bin> Sqlplus hr/hr@ora7
SQL*Plus: Release 18.0.0.0.0 - Production on Sun Sep 6 10:50:21 2020
Version 18.4.0.0.0  Copyright (c) 1982, 2018, Oracle.  All rights reserved.
Connected to: Oracle Database 18c Express Edition Release 18.0.0.0.0 - Production
Version 18.4.0.0.0

SQL> desc employees
 Name                                      Null?    Type
 ----------------------------------------- -------- ----------------------------
 EMPLOYEE_ID                               NOT NULL NUMBER(6)
 FIRST_NAME                                         VARCHAR2(20)
 LAST_NAME                                 NOT NULL VARCHAR2(25)
 EMAIL                                     NOT NULL VARCHAR2(25)
 PHONE_NUMBER                                       VARCHAR2(20)
 HIRE_DATE                                 NOT NULL DATE
 JOB_ID                                    NOT NULL VARCHAR2(10)
 SALARY                                             NUMBER(8,2)
 COMMISSION_PCT                                     NUMBER(2,2)
 MANAGER_ID                                         NUMBER(6)
 DEPARTMENT_ID                                      NUMBER(4)
</pre>




<br /><br />
<?php
ocilabel:


//require 'xxx.php';
// ******************************************
echo "<h1>3. Oracle DB 11g, 18c... XE PHP oci_ pconnect</h1>";
// ******************************************

// C O N T R O L L E R
?>
      <p>PARAMETER $connstring if FULL form contains xepdb1 = DB SERVICE_NAME.
      <br />This connect string in tnsnames.ora is named XEPDB1 - same as name of default pluggable DB created during install. Contains users : all sample schemas, APEX apps...

      <p>PARAMETER $connstring if EASY form contains XEPDB1 = name of default pluggable DB created during install
<pre>
         DATA FLOW M -> V and M -> C, SIGNALS FLOW C -> M -> V 
                                                   <----------
</pre>
DATA FLOW M -> V is data to present to user.
<br />DATA FLOW M -> C triggers C code or V events (click link or button...)
<?php

// M O D E L
//      (SERVICE_NAME = xepdb1)
//      (SERVICE_NAME = xe)
$conn = oci_conn(
  "
  (DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = sspc1)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = xe)
    )
  )
  "

  , '<br>3.1 FULL CONNECT STRING LIKE IN TNSNAMES.ORA') ;

emp_tbl_v($conn) ;


$conn = oci_conn(
    // usr/psw@
    "sspc1:1521/XE"
    //"sspc1:1521/XEPDB1"
  , '<br>3.2 EASY CONNECT STRING') ;

emp_tbl_v($conn) ;









//phpinfolabel:
// J:\awww\www\vendor\b12phpfw\showsource.php
echo '<br /><br /><hr />'; include(dirname(dirname(dirname(__DIR__))) .'/vendor/b12phpfw/showsource.php');
//echo '<br /><br /><hr />'; include(dirname(dirname(dirname(__DIR__))) .'/zinc/showsource.php');
//phpinfo();
// ************************ E N D








// *************************************************
//  F N s
// *************************************************


function emp_tbl_v($conn = null)
{
  // V I E W  F N  DATA FLOW M -> V and M -> C, SIGNALS FLOW C -> M -> V 
  //                                                         <----------
  $stid = oci_parse($conn, 'SELECT * FROM employees where rownum < 3');

  oci_execute($stid);

  echo "<table border='1'>\n  ";
  while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
      echo "<tr>\n";
      foreach ($row as $item) {
          echo "    <td>" 
            . ($item !== null ? htmlentities($item, ENT_QUOTES) : "&nbsp;") 
            . "</td>\n";
      }
      echo "</tr>\n";
  }
  echo "</table>\n";


} ;





function oci_conn($connstring, $helptxt)
{

  $conn = oci_pconnect("hr", "hr", $connstring);

  if (!$conn) {
      $e = oci_error();
      $e = htmlentities($e['message'], ENT_QUOTES);
      echo '<br />***** '. __FUNCTION__ .' said: UNSUCCESSFULL oci_ connect ***** '.$e;
      ?>
      <p><b>$connstring is : <?=$connstring?></b>, $USR=<?=$USR?> $PSW=<?=$PSW?>
      </p>
      <?php
      //trigger_error($e, E_USER_ERROR);
      return null; //goto oc ilabe l2 ; //p hpinfol abel
  } else { ?>

    <h3><?=__FUNCTION__?> said: psw is CASE SENSITIVE : Successful $conn = oci_pconnect("hr", "HR", $connstring);  : <?=$helptxt?></h3>
      <?='<pre>$connstring='. $connstring .'</pre>'?>

    <?php
    return $conn ;
  }

} ;






function getPDODriverList($p_comma = " , ", $p_display = true){
  
 $ARR_DRIVERS = array();
 $CountDrivers = 0;
 foreach(PDO::getAvailableDrivers() AS $DRIVERS) :
       
     $CountDrivers++;
     $ARR_DRIVERS[$CountDrivers] = $DRIVERS;
  
 endforeach;
  
 $_GET_DRIVER_LIST = implode($p_comma, $ARR_DRIVERS);
  
 if( $p_display ): echo $_GET_DRIVER_LIST; else : return $_GET_DRIVER_LIST; endif;
  
 }

function getServerAddress() {
if(array_key_exists('SERVER_ADDR', $_SERVER))
    return $_SERVER['SERVER_ADDR'];
elseif(array_key_exists('LOCAL_ADDR', $_SERVER))
    return $_SERVER['LOCAL_ADDR'];
elseif(array_key_exists('SERVER_NAME', $_SERVER))
    return gethostbyname($_SERVER['SERVER_NAME']);
else {
    // Running CLI
    if(stristr(PHP_OS, 'WIN')) {
        return gethostbyname(php_uname("n"));
    } else {
        $ifconfig = shell_exec('/sbin/ifconfig eth0');
        preg_match('/addr:([\d\.]+)/', $ifconfig, $match);
        return $match[1];
    }
  }
}







/*
//PDO wants to use the default client, which will only use the tnsnames.ora in %ORACLE_HOME%\network\admin. Check that file and make sure your service is defined in there.
                        // Connect to a database defined in tnsnames.ora
                        //oci:dbname=mydb
                        // Connect using the Oracle Instant Client
                        //oci:dbname=//localhost:1521/mydb

1. Install the full Oracle 11g Client
2. Specifically alter your path to ensure that the Instant Client libraries are found first - making sure, of course, that you are impacting the effective path used by PHP, not just a PATH variable in a separate context...
I've never actually got PHP to work correctly with the Instant Client - I gave up and installed the full client - so my personal recommendation is option 1, but if that's not practical in your environment, work with the PATH first.

or

1. execute "phpinfo()";
2. in "Configure Command", you will see something like: "--with-pdo-oci=C:\php-sdk\oracle\instantclient10\sdk,shared" "--with-oci8=C:\php-sdk\oracle\instantclient10\sdk,shared" "--with-oci8-11g=C:\php-sdk\oracle\instantclient11\sdk,shared" ... till now ok!
3. download Oracle "Instant Client for Microsoft Windows 32-bit" and your "SDK" from http://www.oracle.com/technetwork/topics/winsoft-085727.html , even if your Windows is 64-bit: 
   3.1 download "Instant Client Package - Basic: All files required to run OCI, OCCI, and JDBC-OCI applications: instantclient-basic-win32-11.1.0.7.0.zip" 
   3.2 download "*Instant Client Package - SDK: Additional header files and an example makefile for developing Oracle applications with Instant Client: instantclient-sdk-win32-11.1.0.7.0.zip" 
   3.4 unpack two zip in same folder, you will see SDK into folder of instantclient_11 after unpacked; till here OK!
4. copy this unpacked folder to C:\Windows\SysWOW64\instantclient_11_1
5. create C:\php-sdk\oracle\instantclient11, and copy the content of C:\Windows\SysWOW64\instantclient_11_1 to C:\php-sdk\oracle\instantclient11
6. ADD to Windows Environment Variable PATH the follow: "C:\Windows\SysWOW64\instantclient_11_1"
7. open Wamp and enable php_oci8_11g extension
8. Check "phpinfo()" again; It works! Why??? Because 
   C:\wamp\bin\php\php5.3.13\ext\php_oci8_11g.dll or 
   C:\wamp\bin\php\php5.3.13\ext\php_oci8.dll 
   are 32-bit DLLs; into 64-bit environment, when your Windows needs a 32-bit version of "Oracle Instant Client", it will seek into C:\Windows\SysWOW64 .
*/
/*
 editing the php.ini file: 
extension=php_pdo.dll


The following examples show a PDO_OCI DSN for connecting to Oracle databases: 

// Connect to a database defined in tnsnames.ora
oci:dbname=mydb

// Connect using the Oracle Instant Client
oci:dbname=//localhost:1521/mydb


User Contributed Notes
 
Alexander Ashurkoff 26-Feb-2007 11:20 

 If you want to use PDO_OCI and get proper russian windows-1251 codepage, just add charset=CL8MSWIN1251 to your DSN.

 example:
<?php
 $dbc = new PDO('oci:dbname=192.168.10.145/orcl;charset=CL8MSWIN1251', 'username', 'password');


Also setting apache/registry/system environment variable NLS_LANG to RUSSIAN_CIS.CL8MSWIN1251 may helps you.  

 
Helpful User 12-Oct-2006 02:59 

 If you get the error: TNS: could not resolve service name

 Remember that the PDO wants to use the default client, which will only use the tnsnames.ora in %ORACLE_HOME%\network\admin. Check that file and make sure your service is defined in there.

 BTW, there is a bug with pdo_oci8 with 9i - don't use it. Make sure you just use pdo_oci.dll. 
*/



/*
try {
  $sth = $conn->prepare('SELECT '
  //$sth = $this->db->prepare('SELECT '
    . implode(',',['SIFRA_TIP_DOC','OPIS']) //$this->flds
    . ' FROM '.'T_TIP_DOC' //$this->tbl
    .' WHERE '.'SIFRA_TIP_DOC'.' < ?');
    //.' WHERE '.$this->id1name.' = ?');
  $sth->execute([100]); //bindvars
  //$sth->execute([$this->id1_get]); //bindvars
  $sth->setFetchMode(P DOO CI\PDO::FETCH_OBJ);
  $row = $sth->fetch();
  //$this->B1rec[$r->SIFRA_TIP_DOC] =
    //new _TipDokMdlEntity(
    //  $r->SIFRA_TIP_DOC, $r->OPIS, $r->RNUM
    //) ;
  echo '<pre>'; print_r($row); echo '</pre>';
    
} catch( PDOException  $e ) {
//} catch (Exception $e) {
     echo '<pre>aaaaaaaa'; print_r($e); echo '</pre>';
}
*/
?>