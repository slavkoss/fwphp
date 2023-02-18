<?php
// J:\awww\www\vendor\b12phpfw\Dbconn_allsites.php
switch ($_SERVER['HTTP_HOST']) {
  case 'phporacle.eu5.net' : 
    // not r equire_ once !!
    require __DIR__ . '/Dbconn_allsites_mysql_freehostingeu.php';
                //$_SERVER['DOCUMENT_ROOT']=/home/www/phporacle.eu5.net
                //$_SERVER['REQUEST_URI']=/fwphp/www/
                //$_SERVER['QUERY_STRING']=
                //$_SERVER['HTTP_HOST']=phporacle.eu5.net
    break;

  default: //dev1:8083 or SSPC2:8083
              /* oracle :
              $host = // USERDOMAIN = pcname eg sspc2 is ok for oracle not for mysql
                getenv('USERDOMAIN',true)?:getenv('USERDOMAIN').'/XE:pooled;charset=UTF8' ;
              $dsn  ='oci:dbname='.$host ;
              self::$instance = new PDO($dsn, 'hr', 'hr', $options);
              */
    self::$do_pgntion = null ;
    self::$dbi = 'mysql' ;
    self::$db_hostname = 'localhost' ;
    self::$db_name = 'z_blogcms' ;
    self::$db_username = 'root' ;
    self::$db_userpwd = '' ;
  break; 
}
