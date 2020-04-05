<?php
require_once 'config.php';

if(isset($_POST['edit'])){

    //Main errors array
    $errors = array();

    //get values & sanitize them
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $website = filter_input(INPUT_POST, 'website', FILTER_SANITIZE_URL);
    $image = isset($_FILES['image']) ? $_FILES['image'] : '';

    $user = $_SESSION['user'];

    //name error
     if(strlen($name)>50 || strlen($name)<2){
         $errors['name_err'] = 'Name min limit is 2 & max is 50 characters';
     }

     //username
     if(strlen($username)>15 || strlen($username)<1){
         $errors['username_err'] = 'Username min limit is 1 & max is 15 characters';
     }

    //email
    $reg_email = '/^[a-z0-9]+(\.|_)?[a-z0-9]+@[a-z0-9]+(.com|.net|.org|.me)$/i';
    if(!preg_match($reg_email, $email)){
        $errors['email_err'] = 'Enetered email is invalid';
    }



    //Website
    if(empty($website)){
        $errors['website_err'] = 'Invalid entry';
    }


    if($image['error']!=4)
    {
        //upload file

      //create i mage directory if doesn't exists
      if(!is_dir(MODULE_PATH.'/images')){
           mkdir(MODULE_PATH.'/images');
      }

      if($image['error']==4){
         $errors['image_err']='Please, upload file';
      }
      //elseif($image['type']!='image/png' && $image['type']!='image/jpeg'){
      //    $errors['image_err']='Only, png/jpeg image is allowed';
      //}

      $image_info = pathinfo($image['name']);
      extract($image_info);
      $image_convention = $filename . time() . ".$extension";

      move_uploaded_file($image['tmp_name'], MODULE_PATH . "/images/" .  $image_convention);

    }else{
        $image_convention = $user->aimage;
    }


    if(!count($errors)){
        //Store them into database
        $stmt = $objDB->prepare('
        UPDATE admins SET aname = ?, user_email = ?, username=?, website=?, aimage=? 
        WHERE id=?
        ');
                  if ('0') { echo basename(__FILE__).' SAYS : <pre>';
                  echo '<br />$name             ='; print_r($name); 
                  echo '<br />$email            ='; print_r($email); 
                  echo '<br />$username         ='; print_r($username); 
                  echo '<br />$website          ='; print_r($website); 
                  echo '<br />$image_convention ='; print_r($image_convention); 
                  echo '<br />$user->id         ='; print_r($user->id); 
                  echo '</pre>'; }
        $stmt->bind_param( 'sssssi', //param types
           $name, $email, $username, $website, $image_convention, $user->id
        );

        if($stmt->execute()){
            setMsg('msg_notify', 'Your account has been updated successfully.');
        }

        $_SESSION['user'] = getUserById($user->id);
        redirect('profile.php');

    } else{
        setMsg('errors', $errors);
        redirect('edit_profile.php');
    }


}