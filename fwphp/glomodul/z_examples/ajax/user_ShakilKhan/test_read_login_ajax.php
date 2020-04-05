<?php
//J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\read_login_ajax.php
//called from J:\awww\www\zbig\login\advanced_php_ajax\assets\js\read_login.js
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
include 'DbCrud.php'; include 'DbCrud_module.php'; $db = new DbCrud_module; //G LOBAL $db;

function login($db)
{
                     //echo '<pre>$_POST='; print_r($_POST); echo '</pre><br />';
  //if(isset($_GET['login_form']) and $_GET['login_form'] == 'true')
  //{
          //echo json_encode(['error' => 'success', 'msg' => json_encode($_POST)]);
    $email    = 'aa@aa.hr' ; //$_POST['login_email'];
    $password = 'Pozega141'; //$_POST['login_password'];

    $r = $db->get_byemail($db, $email);
    if(!empty($r->user_email)) //if(isset($r->user_pass)) //if($Query->rowCount() != 0){
    {
                     //echo '<pre>$r='; print_r($r); echo '</pre><br />';
      //hash 32 char eg my long psw with first uppercase: f31dbc75d39b92d5c1c0fba2bb2d7584
      $db_password = $r->user_pass;
      //eg if (password_verify('rasmuslerdorf', $hash)) ...
      if(password_verify($password, $db_password)){
        $_SESSION['user_id_loggedin'] = $r->user_id;
        echo json_encode(['error' => 'success', 'msg' => 'index.php']);
      } else{
        echo json_encode(['error' => 'no_password', 'msg' => 'Not Correct Password!'
           + ' You:'+$password+', in DB:'+$db_password
        ]);
      }
    }else{
        echo json_encode(['error' => 'no_email', 'msg' => 'Please Enter Correct Email!']);
    }


  //}
}
login($db);

?>