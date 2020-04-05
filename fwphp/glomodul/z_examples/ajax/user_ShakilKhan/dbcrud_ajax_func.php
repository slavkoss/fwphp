<?php
/**
*  J:\awww\www\fwphp\glomodul4\help_sw\test\login\user\dbcrud_ajax_func.php
*/
namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
          /*if (isset($_GET['address'])) 
          { echo json_encode(array('error' => 'dbcrud_ ajax_ func.php : begin SAYS: '
            .'$_GET[address])='.$_GET['address']
            )); } else{echo json_encode(array('error' => 'dbcrud_ ajax_ func.php : begin SAYS: '));}
          */
include 'DbCrud.php'; include 'DbCrud_module.php'; $db = new DbCrud_module; //G LOBAL $db;
switch (true) {
case isset($_GET['address']) and $_GET['address'] == 'true': 
   add_ed_address($db); break;
case isset($_GET['bio']) and $_GET['bio'] == 'true': 
   bio($db); break;
case isset($_GET['change_name']) and $_GET['change_name'] == 'true': 
   update_name($db); break;
case isset($_GET['password']) and $_GET['password'] == 'true': 
   change_password($db); break;
case isset($_GET['add_facebook']) and $_GET['add_facebook'] == 'true': 
   add_facebook_account($db); break;
case isset($_GET['add_linkedin']) and $_GET['add_linkedin'] == 'true':
   add_linkedin_account($db); break;
//default: break;
} // e n d  s w i t c h


function add_ed_address($db){
    $address = $_POST['add_address'];
    $user_id = $_SESSION['user_id_loggedin'];
    $r = $db->get_byid($db, $user_id);
    $db->prepareSQL('UPDATE users SET address = ? WHERE user_id = ?');
    $db->bindvalue(1,$address,\PDO::PARAM_STR);
    $db->bindvalue(2,$user_id,\PDO::PARAM_INT);
          /*if (isset($_GET['address']))
          { echo json_encode(array('error' => 'dbcrud_ ajax_ func.php : 22222 SAYS: '
            .'$_POST[add_address]='.$_POST['add_address']
            )); } */

    if($db->execute()){
      if(empty($r->address)){
            $_SESSION['address_success'] = "<i class='fa fa-check-circle'></i> Your address is successfully Added";
            echo json_encode(array("error" => 'success'));
      } else {
        $_SESSION['address_success'] = 
          "<i class='fa fa-check-circle'></i> Your address is successfully Updated";
        echo json_encode(array("error" => 'success'));
      }
    } else {echo json_encode(array("error" => 'error: adress NOT UPDATED'));}  //}

}


function bio($db){
    $bio = $_POST['bio'];
    $user_id = $_SESSION['user_id_loggedin'];
    $r = $db->get_byid($db, $user_id);
    $db->prepareSQL('UPDATE users SET bio = ? WHERE user_id = ?');
    $db->bindvalue(1,$bio,\PDO::PARAM_STR);
    $db->bindvalue(2,$user_id,\PDO::PARAM_INT);
    if($db->execute()){
      if(empty($r->bio)){
         $_SESSION['bio_success'] = "<i class='fa fa-check-circle'></i> Your biography is successfully Added";
            echo json_encode(array("error" => 'success'));
      } else {
        $_SESSION['bio_success'] = 
          "<i class='fa fa-check-circle'></i> Your biography is successfully Updated";
        echo json_encode(array("error" => 'success'));
      }
    } else {echo json_encode(array("error" => 'error: biography NOT UPDATED'));}  //}

}


function update_name($db){
    $name = $_POST['change_name'];
    $name_reg = "/^[a-zA-Z ]+$/";
    $user_id = $_SESSION['user_id_loggedin'];
    if(preg_match($name_reg, $name)){
      $db->prepareSQL('UPDATE users SET user_name = ? WHERE user_id = ?'); 
      $db->bindvalue(1,$name,\PDO::PARAM_STR);
      $db->bindvalue(2,$user_id,\PDO::PARAM_INT);
      if($db->execute()){
         $_SESSION['name_update'] = "<i class='fa fa-check-circle'></i> Your name is successfully updated";
         echo json_encode(array('error' => 'success'));
      }
    } else {
      echo json_encode(array('error' => 'pattern', 'msg' => 'Name: only character allowed'));
    }

}


function change_password($db){
    $current_password = $_POST['current_password'];
    $new_password     = $_POST['new_password'];
    $user_id          = $_SESSION['user_id_loggedin'];
    $r = $db->get_byid($db, $user_id);
    if(password_verify($current_password, $r->user_pass)){
        $password_reg = "/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/";
        if(preg_match($password_reg, $new_password )){
            $new_pwd = password_hash($new_password, PASSWORD_DEFAULT);

            $db->prepareSQL('UPDATE users SET user_pass = ? WHERE user_id = ?'); 
            $db->bindvalue(1,$new_pwd,\PDO::PARAM_STR);
            $db->bindvalue(2,$user_id,\PDO::PARAM_INT);

            if($db->execute()){
              $_SESSION['password_success'] = '<i class="fa fa-check-circle"></i> Your Password is succesfully updated!';
              echo json_encode(array('error' => 'success'));
            }
        } else {
          echo json_encode(array('error' => 'pattren', 'msg' => '8 characters or longer. Combine upper and lowercase letters and numbers'));
        }
    } else {
      echo json_encode(array('error' => 'current_password_wrong', 'msg' => 'Current Paassword is wrong'));
    }

}



function add_facebook_account($db){
    $facebook_val = $_POST['facebook_val'];
    $user_id = $_SESSION['user_id_loggedin'];
    $r = $db->get_byid($db, $user_id);
      $db->prepareSQL('UPDATE users SET facebook = ? WHERE user_id = ?');
      $db->bindvalue(1,$facebook_val,\PDO::PARAM_STR);
      $db->bindvalue(2,$user_id,\PDO::PARAM_INT);
    if(empty($r->facebook)){
      if($db->execute()){
         $_SESSION['facebook_success'] = '<i class="fa fa-check-circle"></i> Your Facebook account is successfully added';
         echo json_encode(array('error' => 'success'));
      } else {
         echo json_encode(array('error' => 'error'));
      }
    } else {
       if($db->execute()){
         $_SESSION['facebook_success'] = '<i class="fa fa-check-circle"></i> Your Facebook account is successfully Updated';
         echo json_encode(array('error' => 'success'));
       } else {
          echo json_encode(array('error' => 'error'));
       }
    }

}


function add_linkedin_account($db){
    $linkedin_val = $_POST['linkedin_val'];
    $user_id = $_SESSION['user_id_loggedin'];
    $r = $db->get_byid($db, $user_id);
      $db->prepareSQL('UPDATE users SET linkedin = ? WHERE user_id = ?');
      $db->bindvalue(1,$linkedin_val,\PDO::PARAM_STR);
      $db->bindvalue(2,$user_id,\PDO::PARAM_INT);
    if(empty($r->linkedin)) {
       if($db->execute()){
         $_SESSION['linkedin_success'] = '<i class="fa fa-check-circle"></i> Your Linkedin account is successfully added';
         echo json_encode(array('error' => 'success'));
       } else {
          echo json_encode(array('error' => 'error'));
       }
    } else {
       if($db->execute()){
         $_SESSION['linkedin_success'] = '<i class="fa fa-check-circle"></i> Your Linkedin account is successfully Updated';
         echo json_encode(array('error' => 'success'));
       } else {
          echo json_encode(array('error' => 'error'));
       }
    }

}
