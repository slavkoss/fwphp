<?php
// J:\awww\www\vendor\b12phpfw\PHPmailer_ini.php
return [
   //list(
    'mail.iskon.hr'       //$mail->Host
   ,'slavksra'            //$mail->Username
   ,'Pozega141'           //$mail->Password
   ,'tls'                 //$mail->SMTPSecure
   ,25                    //$mail->Port
   ,'slavko.srakocic@inet.hr' //$setFrom
   ,'slavkoss22@gmail.com'    //$addAddress
   //
   ,$setFrom
   ,$addAddress
  //) = require $wsroot_path .'vendor/b12phpfw/PHPmailer_ini.php'; // not r equire_ once !!
] ;


/*
//J:\awww\www\fwphp\glomodul\z_examples\login_pasw_hash\Swift_Mailer_DPowers\test_PHPMailer.php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

//Load Composer's autoloader
//require 'vendor/autoload.php';
$wsroot_path = str_replace('\\','/', realpath('../../../../../')) .'/' ;
require $wsroot_path .'vendor/PHPMailer/src/Exception.php';
require $wsroot_path .'vendor/PHPMailer/src/PHPMailer.php';
require $wsroot_path .'vendor/PHPMailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;          //Enable verbose debug output
    $mail->isSMTP();                                  //Send using SMTP

    
    //                THIS IS WORKING :
    $mail->Host       = 'mail.iskon.hr';              //Set the SMTP server to send through
                       //Noooo : $mail->SMTPAuth   = true; //Enable SMTP authentication
    $mail->Username   = 'slavksra';                   //SMTP username
    $mail->Password   = 'Pozega141'; //SMTP password 
    $mail->SMTPSecure = 'tls'; //Enable TLS encryption, `ssl` also accepted or PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port       = 25; //465, 25 = TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('slavko.srakocic@inet.hr', 'Mailer');
    $mail->addAddress('slavkoss22@gmail.com', 'Slavko Gmail User');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
*/
    /*
    //                THIS IS NOT WORKING :
        $mail->Host = 'smtp.inet.hr'; //mail.iskon.hr smtp.inet.hr = main and backup SMTP servers
                            //$mail->SMTPAuth = true;  // Enable SMTP authentication
        $mail->Username = 'slavksra';  // SMTP username
        $mail->Password = 'Pozega141'; // Pozega141 Sl34Sra  SMTP password
        //$mail->SMTPSecure = 'STARTTLS';  //tls Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // 25 or 587 TCP port to connect to
    */