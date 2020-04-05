<?php
// J:\awww\www\zinc\conn_mysql\conn_dbi_obj.php
// We may change $pp1->dbi_obj on any lower level (site, groupof modules, module)
$pp1->dbi_obj = (object)[
         'db_new_instance'=>'db_new_instance' //'' or 'db_new_instance' or '1'
       , 'dbi'=>'mysql'
       //, 'host'=>getenv('USERDOMAIN',true)?:getenv('USERDOMAIN') //sspc2 not allowed !!
       , 'host'=>'localhost'
       , 'dbnm'=>'cmsakram','user'=>'root', 'pass'=>''] ; //cmsakram or tema...
