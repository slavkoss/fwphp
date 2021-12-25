<?php
//J:\awww\www\fwphp\glomodul\z_examples\login_pasw_hash\Mailer_DPowers\PHPMailer_send.php
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
    // SMTP server
    $mail->isSMTP();                                  //Send using SMTP
    list( 
       $mail->Host
      ,$mail->Username
      ,$mail->Password
      ,$mail->SMTPSecure //for me : 'tls'
      ,$mail->Port
      // emails from - to :
      ,$setFrom
      ,$addAddress
    ) = require $wsroot_path .'vendor/b12phpfw/PHPmailer_ini.php'; // not r equire_ once !!
    //PHPmailer_ ini.php' contains only one statement: return [...data in above list...] ;

    //Recipients
    $mail->setFrom($email, 'Mailer'); //$mail->setFrom($setFrom, 'Mailer');
    $mail->addAddress($addAddress, 'User');     //Add a recipient

    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Subject: ';
    $mail->Body    = $body ; //'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = $altbody ; //'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
