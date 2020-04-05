<?php

//Database Main Object
function objDB(){
    $objDB = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if($objDB->connect_error){
      die("Connection not established");
    }
    return $objDB;
}


function upload_image($image){

  //create i mage directory if doesn't exists
  if(!is_dir(MODULE_PATH.'/images')){
       mkdir(MODULE_PATH.'/images');
  }

  if($image['error']==4){
      die('image file not uploaded');
  }

  if($image['type']!='image/png'){
       die('Only, png image files are allowed');
  }

  $image_info = pathinfo($image['name']);
  extract($image_info);
  $image_convention = $filename . time() . ".$extension";

  if(move_uploaded_file($image['tmp_name'], MODULE_PATH . "/images/" . $imageConvention)){
      return $image_convention;
  }else{
      return false;
  }

}


//format: 24 September, 2018
function cTime($timestamp){
    return date('j F, Y', $timestamp);
}



//checking user by email
function checkUserByEmail($email){

     //make database connection
     $objDB = objDB();
     $stmt = $objDB->prepare(
            'SELECT * FROM admins WHERE user_email=?'
     );
     $stmt->bind_param('s', $email);
     $stmt->execute();
     $stmt->store_result();
     return $stmt->num_rows;
}


//checking user by username
function checkUserByUsername($username){
    $objDB = objDB();
     $stmt = $objDB->prepare(
            'SELECT * FROM admins WHERE username=?'
     );

     $stmt->bind_param('s', $username);

     $stmt->execute();

     $stmt->store_result();

     return $stmt->num_rows;
}



//check user activation
function checkUserActivation($username){
  $objDB = objDB();
  //Store them into database
  $stmt = $objDB->prepare("SELECT * FROM admins WHERE username=? AND is_active='1'");
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $stmt->store_result();
  return $stmt->num_rows;
}

//redirection reuseable function
function redirect($file){
    header("Location:".MODULE_URL.'/'.$file);
}


//setting a msg
function setMsg($name, $value, $class = 'success'){
    if(is_array($value)){
        $_SESSION[$name] = $value;
    }else{
        $_SESSION[$name] = "<div class='alert alert-$class text-center'>$value</div>";
    }

}

//getting a msg
function getMsg($name){
    if(isset($_SESSION[$name])){
        $session=$_SESSION[$name];
        unset($_SESSION[$name]);
        return $session;
    }
}


function getUserById($user_id){

    $objDB = objDB();

    //Store them into database
     $stmt = $objDB->prepare(
            'SELECT * FROM admins WHERE id=?'
     );

     $stmt->bind_param('i', $user_id);

     $stmt->execute();

     //get the data
     $result = $stmt->get_result();

     return $result->fetch_object();
}



function verifyUserAccount($code){

    $objDB = objDB();


     $stmt = $objDB->prepare(
            "UPDATE admins SET is_active = '1' , reset_code = '' WHERE reset_code = ?"
     );

     $stmt->bind_param('s', $code);

     $stmt->execute();

     $stmt->store_result();

     return $stmt->affected_rows;
}



function checkUserByCode($code){

    $objDB = objDB();

    //Store them into database
     $stmt = $objDB->prepare(
            'SELECT * FROM admins WHERE reset_code = ?'
     );

     $stmt->bind_param('s', $code);

     $stmt->execute();

     $stmt->store_result();

     return $stmt->num_rows;
}

//If user is logged In
function isUserLoggedIn(){
    if(isset($_SESSION['user']) || isset($_COOKIE['user'])){
        return true;
    }else{
        return false;
    }
}





 //Send the email mail
function send_mail($detail=array())
{
    if( !empty($detail['to']) && !empty($detail['message']) 
        && !empty($detail['subject']) && !empty($detail['from']))
    {
       //mail($detail['to'], $detail['subject'], $detail['message']) ;

        $mail = new PHPMailer(true);
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'xxx';  //your-smtp-host = main and backup SMTP servers
        $mail->SMTPAuth = true;        // Enable SMTP authentication
        $mail->Username = 'xxx';  // SMTP username
        $mail->Password = 'xxx'; // Pozega141 Sl34Sra  SMTP password
        $mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // 25 or 587 TCP port to connect to

        //Recipients
        $mail->setFrom('no-reply@proteinwriter.com', $detail['from']);
        $mail->addAddress($detail['to'], '');     // Add a recipient

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $detail['subject'];
        $mail->Body    = $detail['message'];
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
              return false;
            } else {
                return true;
            } 


    }else{

        die('Your Mail Handler requires four main paramters');

    }
}

/*
Search "f unction " (14 hits in 1 file)
* Line 4:   f unction o bjDB(){
* Line 17:  f unction u pload_image($image){
* Line 46:  f unction c Time($timestamp){
* Line 120: f unction r edirect($file){
* Line 126: f unction s etMsg($name, $value, $class = 'success'){
* Line 136: f unction g etMsg($name){
* Line 218: f unction s end_mail($detail=array()){
*
* Line 53:  f unction c heckUserByEmail($email){
* Line 79:  f unction c heckUserByUsername($username){
* Line 100: f unction c heckUserActivation($username){
* Line 145: f unction g etUserById($user_id){
* Line 166: f unction v erifyUserAccount($code){
* Line 186: f unction c heckUserByCode($code){
* Line 205: f unction i sUserLoggedIn(){
*/

