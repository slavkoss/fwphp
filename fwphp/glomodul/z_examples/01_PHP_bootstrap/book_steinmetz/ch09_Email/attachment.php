<?php
include_once("phpmailer/class.phpmailer.php");
$mail = new PHPMailer;
$mail->ClearAddresses();
$mail->AddAddress('bri@aem7.net', 'Brian Ward');
$mail->From = 'test@example.com';
$mail->FromName = 'Test Name';
$mail->Subject = 'Test Message Subject';
$mail->Body = 'This is the test message body.';
$mail->AddAttachment("/home/bri/goofy.jpg", "goofy.jpg");
if ($mail->Send()) {
    echo "Message sent.";
} else {
    echo $mail->ErrorInfo;
}
?>
