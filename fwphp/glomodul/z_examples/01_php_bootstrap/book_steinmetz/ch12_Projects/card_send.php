<?php
require_once("card_include.php"); 

/* validate card ID */
$ID = $_REQUEST['ID']; 
if ((!is_numeric($ID)) || ($ID == '') || ($ID < 1) ) {
    die("Invalid ID"); 
}

$sql = "SELECT ID, category, content, width, height, description
	  FROM card_list
	WHERE ID = $ID";

$result = @mysql_query($sql, $connection) or die (mysql_error());
if (mysql_num_rows($result) == 0) {
    die('Invalid ID.');
}
$card = mysql_fetch_array($result);

/* determine mode - are we displaying or sending a card? */
if (isset($_POST['recip_email'])) {
    /* sending card sent */
	
    /* check and clean data */
    $send_email = substr($_POST['sender_email'], 0, 50); 
    $send_name = substr($_POST['sender_name'], 0, 50);
    $rec_email = substr($_POST['recip_email'], 0, 50); 
    $rec_name = substr($_POST['recip_name'], 0, 50); 
    $message = substr($_POST['message'], 0, 600); 
    $message = strip_tags($message); 
    $rec_name = strip_tags($rec_name); 
    $send_name = strip_tags($send_name); 
	
	
    if ($_POST['message'] == '') {
	die("You must give a message!"); 
    }

    /* transform the text message into HTML */
    require("autop.php");
    $message = autop($message);
	
    /* create a pickup token */
    $token = md5(strval(time()) . $send_email . $rec_email . $ID);

    /* insert the row into sent cards */
    $sql = 'INSERT INTO cards_sent
	               (sender_email, sender_name, message,
	                recip_email, recip_name, token, ID)
	         VALUES
	("' . $send_email . '", "' .
	 mysql_escape_string($send_name) . '", "' .
	 mysql_escape_string($message) . '", "' .
	 $rec_email . '", "' .
	 mysql_escape_string($rec_name) . '", "' .
	 $token . '", ' .
	 $ID .  ')';
    $result = @mysql_query($sql, $connection) or die (mysql_error());
	
    /* PHPMailer class for sending mail */
    include_once("phpmailer/class.phpmailer.php");
    $mail = new PHPMailer;

    $mail->ClearAddresses();
    $mail->AddAddress($rec_email, $rec_name);
    print "$rec_email, $rec_name<br />";
    $mail->From = 'cards@example.com';
    $mail->FromName = $send_name;
    $mail->Subject = "You have received an e-card from $send_name!";
    $mail->Body = "You have received an e-card!\n";
    $mail->Body .= "Please go to http://www.example.com/card_show.php?token=$token to view it.\n\n";
    $mail->Body .= "Sincerely,\nThose e-card guys";

    if ($mail->Send()) {
	print 'Your e-card was sent!';
    } else {
	print 'There was an error: ' . $mail->ErrorInfo;
    }
} else {
    /* display card and sending form */
	
    print '<span style="font-family: sans-serif; font-size: 12px;">';
    print '<form action="card_send.php" method="post">';

    print '<input name="ID" type="hidden" value="' . $card['ID'] . '">';
    display_card($card);
    print '<br />';

    ?>
    Recipient Email:<br />
    <input name="recip_email" type="text" size="30" maxlength="50">
    <br /><br />
    Recipient Name:<br />
    <input name="recip_name" type="text" size="30" maxlength="50">
    <br /><br />
    Message (No HTML, 600 characters max):<br />
    <textarea name="message" cols="40" rows="6"></textarea>
    <br /><br />
    Sender Email:<br />
    <input name="sender_email" type="text" size="30" maxlength="50">
    <br /><br />
    Sender Name:<br />
    <input name="sender_name" type="text" size="30" maxlength="50"></td></tr>
    <br /><br />
    <input name="" type="submit" value="Send Your Card!"></td></tr>
    </form>
    </span>
    <?php
}
?>
