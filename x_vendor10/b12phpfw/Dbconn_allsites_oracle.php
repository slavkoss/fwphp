<?php
//J:\awww\www\vendor\b12phpfw\Dbconn_allsites_oracle.php
return [ //'1' 
   null
   , 'oci'
   //, getenv('USERDOMAIN',true)?:getenv('USERDOMAIN').'/XE:pooled;charset=UTF8'
   //, getenv('USERDOMAIN').'/XE:pooled;charset=UTF8'
   , 'dev1:1521/XE:pooled;charset=UTF8'
   , 'hr', 'hr', 'hr'] ;

/*  //////////// old :
//                   J:\awww\www\b12phpfw\Dbconn_ allsites_oracle.php
//   to be copied to J:\awww\www\b12phpfw\Dbconn_ allsites.php
// single access point to our database (singleton class).
namespace B12phpfw\core\b12phpfw ;
//use PDO;
//abstract = Cls or Method for inheritance to avoid code redundancy, not to cre obj

*/
      //WORKING ALL THREE : (getenv('USERDOMAIN') does not work for MySql !!)
      //,'host'=>getenv('USERDOMAIN',true)?:getenv('USERDOMAIN').'/XE:pooled;charset=UTF8'
      //,'host'=>'sspc2/XE:pooled;charset=UTF8'
      //,'host'=>'localhost/XE:pooled;charset=UTF8'
      //
      // Safely get the value of an environment variable, ignoring whether 
      // or not it was set by a SAPI or has been changed with putenv
      //$ip = getenv('REMOTE_ADDR', true) ?: getenv('REMOTE_ADDR')
