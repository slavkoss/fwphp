<?php
// J:\awww\www\vendor\b12phpfw\Dbconn_allsites.php
// Assigned in t rait Db_ allsites so :
//     $conn_params = 
//         list( self::$do_pgntion, self::$dbi, self::$db_hostname, self::$db_name
//             , self::$db_username, self::$db_userpwd) 
//         = require __DIR__ . '/Dbconn_ allsites.php'; // not r equire_ once !!
//return [ null, 'mysql', 'localhost', 'z_blogcms', 'root', ''] ;
switch ($_SERVER['HTTP_HOST']) {
  case 'phporacle.eu5.net' : 
    // not r equire_ once !!
    require __DIR__ . '/Dbconn_allsites_mysql_freehostingeu.php';
                //$_SERVER['DOCUMENT_ROOT']=/home/www/phporacle.eu5.net
                //$_SERVER['REQUEST_URI']=/fwphp/www/
                //$_SERVER['QUERY_STRING']=
                //$_SERVER['HTTP_HOST']=phporacle.eu5.net
    break;
                        /*case 'phporacle.heliohost.org' : 
                          // not r equire_ once !!
                          require __DIR__ . '/Dbconn_allsites_mysql_heliohost.php';
                                      //$_SERVER['DOCUMENT_ROOT']=
                                      //$_SERVER['REQUEST_URI']=
                                      //$_SERVER['QUERY_STRING']=
                                      //$_SERVER['HTTP_HOST']=phporacle.heliohost.org
                          break; */
  default: //dev1:8083 or SSPC2:8083
              /* oracle :
              $host = // USERDOMAIN = pcname eg sspc2 is ok for oracle not for mysql
                getenv('USERDOMAIN',true)?:getenv('USERDOMAIN').'/XE:pooled;charset=UTF8' ;
              $dsn  ='oci:dbname='.$host ;
              self::$instance = new PDO($dsn, 'hr', 'hr', $options);
              */
    //return [null,'mysql','localhost','z_blogcms','root',''];
                //$_SERVER['DOCUMENT_ROOT']=J:/awww/www
                //$_SERVER['REQUEST_URI']=/fwphp/glomodul/blog/?i/home/p/1/
                //$_SERVER['QUERY_STRING']=i/home/p/1/
                //$_SERVER['HTTP_HOST']=dev1:8083
    //require __DIR__ . '/Dbconn_allsites_mysql.php'; // could contain :
    self::$do_pgntion = null ;
    self::$dbi = 'mysql' ;
    self::$db_hostname = 'localhost' ;
    self::$db_name = 'z_blogcms' ;
    self::$db_username = 'root' ;
    self::$db_userpwd = '' ;
  break; 
}
