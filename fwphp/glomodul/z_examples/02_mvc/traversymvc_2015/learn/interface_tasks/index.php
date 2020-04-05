<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_MVC\traversymvc\learn\interface_tasks\index.php
//namespace B12phpfw ;
//use PDO;

include 'Dbconn_params.php';
include "Database.php";
//include "User.php";

$db = new Database ;

$username_cre = 'test' ;
$password_cre = 'test' ;

//             C R E A T E   dbi for all tables, sites, MySql, Oracle...
    $CurrentTime = time(); $DateTime = strftime("%Y-%m-%d %H:%M:%S",$CurrentTime);
    $flds     = "registration_date,user_name,user_pass" ;
    $qrywhat = "VALUES(:dateTime,:username,:password)" ;
    $binds = [
      ['placeh'=>':dateTime',  'valph'=>$DateTime, 'tip'=>'str']
     ,['placeh'=>':username',  'valph'=>$username_cre, 'tip'=>'str']
     ,['placeh'=>':password',  'valph'=>$password_cre, 'tip'=>'str']
    ] ;
$cursor = $db->cc($db,'users',$flds,$qrywhat,$binds);
    if($cursor){
      echo "<h3>C R E A T E : User with name ".$username_cre." added Successfully</h3>" ;
    }else { 
      echo "<h3>C R E A T E : User with name ".$username_cre." NOT added. Something went wrong !</h3>" ;
    }



//          R E A D   dbi for all tables, sites, MySql, Oracle...
$c_r = $db->rr("SELECT * FROM users WHERE user_name=:username" //AND user_pass=:password
  , [ ['placeh'=>':username', 'valph'=>$username_cre, 'tip'=>'str']
  ]
, __FILE__ .' '.', ln '. __LINE__) ;
$r = $db->rrnext($c_r);
  $dbpass = $r->user_pass;
  $id_cre = $r->user_id;

echo "<h3>R E A D : Logged in user is $r->user_name</h3>" ;

if(password_verify($password_cre, $dbpass)) {
    echo "<h3>***** password_verify SUCCESSFUL >*****</h3>" ;
    //exit(0) ;
}


echo "<h3>***** password_verify NOT SUCCESSFUL >*****</h3>" ;

$dbpass = password_hash($password_cre, PASSWORD_DEFAULT); //$_POST["password"]
if(password_verify($password_cre, $dbpass)) {
    echo "<h3>***** After password_hash, password_verify SUCCESSFUL >*****</h3>" ;
    //exit(0) ;
}





//                   U P D A T E
$id = $r->user_id;
      $flds     = "SET user_pass = :dbpass" ;
      $qrywhere = "WHERE user_id=:id" ;
      $binds = [
          ['placeh'=>':dbpass', 'valph'=>$dbpass, 'tip'=>'str']
        , ['placeh'=>':id', 'valph'=>$id, 'tip'=>'int']
      ] ;
$cursor = $db->uu($db,'users',$flds,$qrywhere,$binds);

    if($cursor){
      echo "<h3>U P D A T E : User with name ".$username_cre." updated Successfully.</h3>"
       .'psw '.$password_cre.'===>'.$dbpass
      ;
    }else {
      echo "<h3>U P D A T E : User with name ".$username_cre." NOT updated new \$dbpass = $dbpass</h3>" ;
    }


//                   D E L E T E
$cursor = $db->dd('user_id', 'users', $id_cre);
//$cursor = $db->dd('user_id', 'users', -100);
       echo '<h3>D E L E T E :</h3><pre>'; echo '<br />Allways empty : $cursor='; print_r($cursor) ; echo '</pre>';
//if($cursor){ echo "<h3>D E L E T E : User with name ".$username_cre." deleted Successfully</h3>" ;
//}else {echo "<h3>D E L E T E : User with name ".$username_cre." NOT deleted</h3>";}

//          R E A D   dbi for all tables, sites, MySql, Oracle...
$c_r = $db->rr("SELECT * FROM users WHERE user_name=:username" //AND user_pass=:password
  , [ ['placeh'=>':username', 'valph'=>$username_cre, 'tip'=>'str']
  ]
, __FILE__ .' '.', ln '. __LINE__) ;
$r = $db->rrnext($c_r);
if ($r) {
  echo "<h3>R E A D : User to delete is $username_cre, read him returns: $r->user_name</h3>" ;
} else {
  echo "<h3>R E A D : User $username_cre deleted !</h3>" ;
}



exit(0) ;



//$_SERVER['DOCUMENT_ROOT'] is bad if we have inet hosting !
//include $_SERVER['DOCUMENT_ROOT'] . '/zinc/Dbconn_allsites.php' ;
//include $_SERVER['DOCUMENT_ROOT'] . '/zinc/Db_allsites.php' ; //extends Dbconn_allsites

//Dbconn_params::get_or_new_dball(basename(__FILE__),__LINE__,__METHOD__); //=dbinstance



/*
//             older programming style :
include "Database.php";
include "User.php";

$db  = new Database ;
$usr = new User ;

$usr->login('ss','ss') ; //usr,psw
echo "<h3>Logged in user is ...</h3>" ;
*/