<?php
//J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\cre_signup_ajax.php
// slavkoss22@gmail.com / my long psw with first uppercase a@a.a / Aaa11111
namespace B12phpfw ;
include 'DbCrud.php'; include 'DbCrud_module.php'; $db = new DbCrud_module;
switch (true) {
case isset($_POST['check_email']):                         check_email($db); break;
case isset($_GET['signup']) and $_GET['signup'] == 'true': singup_submit($db); break;
} //e n d  s w i t c h   //default: break;

function check_email($db){ //if(isset($_POST['check_email'])) {
            //echo json_encode(['error' => 'email_success', 'message' => 'begin R ajax php script']);
   $email = $_POST['check_email'];
     //SELECT '1' usrexists FROM `users` WHERE `user_email` = 'g@g.com'
     $db->prepareSQL("SELECT '1' usrexists FROM users WHERE user_email = ?");
     $db->bindvalue(1,$email,\PDO::PARAM_STR);
     $r = $db->fetchSingle() ;
   if(!isset($r->usrexists) or !$r->usrexists){
     echo json_encode(array('error' => 'email_success'));
   }
   else{ //TRUE means row found
      echo json_encode(array('error' => 'email_fail', 'message' => 'Sorry this email already exist'));
   } //} 

}//e n d  check email method   //check_email($db);

function singup_submit($db) { //if(isset($_GET['signup']) && $_GET['signup'] == 'true') {
        //echo json_encode(['error' => 'success', 'msg' => 'read_login_success.php']);
   $name     = $_POST['name'];
   $email    = $_POST['email'];
   $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
      $db->prepareSQL('INSERT INTO users (user_name, user_email, user_pass) VALUES (?,?,?)');
      $db->bindvalue(1,$name,\PDO::PARAM_STR);
      $db->bindvalue(2,$email,\PDO::PARAM_STR);
      $db->bindvalue(3,$password,\PDO::PARAM_STR);
   if($db->execute()){
      $_SESSION['user_name'] = $name;
      echo json_encode(['error' => 'success', 'msg' => 'frm.php']);
   } else{
      echo json_encode(array('error' => 'addrow_fail', 'msg' => 'Usr row not inserted'));
   } //}
} //singup_submit($db);
