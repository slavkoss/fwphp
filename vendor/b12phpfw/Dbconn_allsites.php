<?php
// J:\awww\www\b12phpfw\Dbconn_allsites.php
// Is required in trait Db_allsites
//$conn_params = 
//     list( self::$do_pgntion, self::$dbi, self::$db_hostname, self::$db_name
//    , self::$db_username, self::$db_userpwd) 
//    = require __DIR__ . '/Dbconn_allsites.php'; // not r equire_ once !!
return [ null, 'mysql', 'localhost', 'z_blogcms', 'root', ''] ;
/*
self::$do_pgntion  = null        ;
self::$dbi         = 'mysql'     ;   // mysql or oracle or any  d b i  you wish
self::$db_hostname = 'localhost' ;
self::$db_name     = 'z_blogcms' ;
self::$db_username = 'root'      ;
self::$db_userpwd  = ''          ;

self::$dsn = self::$dbi.':host='.self::$db_hostname.';dbname='.self::$db_name.';' ;
*/
        //To do : improve this (refactoring this code)
        //  For now J:\awww\www\b12phpfw\Dbconn_allsites_mysql.php
        //  is copied to J:\awww\www\b12phpfw\Dbconn_allsites.php
/* oracle :
$host = // USERDOMAIN = pcname eg sspc2 is ok for oracle not for mysql
  getenv('USERDOMAIN',true)?:getenv('USERDOMAIN').'/XE:pooled;charset=UTF8' ;
$dsn  ='oci:dbname='.$host ;
self::$instance = new \PDO($dsn, 'hr', 'hr', $options);
*/