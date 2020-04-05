<?php

require_once("card_include.php"); 
$token = preg_replace('/[^a-z0-9]/', '', $_REQUEST['token']); 

$sql = "SELECT S.sender_name, S.sender_email, S.message,
               S.recip_name, S.recip_email, S.notified, 
               C.content, C.width, C.height 
          FROM cards_sent S,
               card_list C
         WHERE C.ID = S.ID
           AND S.token = '$token'";

$result = @mysql_query($sql, $connection) or die (mysql_error());
if (mysql_num_rows($result) == 0) {
    die('Invalid card.');
}

$row = mysql_fetch_array($result);

print '<span style="font-family: sans-serif; font-size: 12px">';
print '<p>A card for you!</p>';

display_card($row);
print '<br />';

print '<strong>' . stripslashes($row["sender_name"]) . '</strong> writes:';
print '<br />';
print stripslashes($row["message"]);
	
if (!$row['notified']) {
    /* notify sender that the message was picked up */
    include_once("phpmailer/class.phpmailer.php");
    $mail = new PHPMailer;
    $mail->ClearAddresses();
    $mail->AddAddress($row['sender_email'], $row['sender_name']);
    $mail->From = 'example@example.com';
    $mail->FromName = 'E-card People';
    $mail->Subject = 'e-card retrieved';
    $mail->Body = "Your e-card to $row[recip_name] has been picked up.

	Sincerely,
	Those e-card guys";
    $mail->Send();
		
    $sql = "UPDATE cards_sent
	       SET notified = 1
	     WHERE token = '$token'";
    @mysql_query($sql, $connection);
}
?>
