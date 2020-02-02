<?php
include_once("class.phpmailer.php");
$mail = new PHPMailer;
$mail->ClearAddresses();
$mail->AddAddress('theferrett@theferrett.com', 'The Ferrett');
$mail->From = 'you@example.com';
$mail->FromName = 'Your Name';
$mail->Subject = 'Test Message Subject';
$mail->Body = 'This is the test message body.';
if ($mail->Send()) {
    echo "Message sent.";
} else {
    echo $mail->ErrorInfo;
}
?>
