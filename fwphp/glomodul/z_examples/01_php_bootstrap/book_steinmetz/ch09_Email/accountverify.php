<?php

function make_verification($login, $email, $db) {
    /* generate an account verification link and send it to the user */

    /* generate key */
    $key = ""; $i = 0;
    while ($i < 32) {
	$key .= chr(rand(97, 122));
	$i++;
    }

    /* place the key in the table; first delete any pre-existing key */
    $query = "DELETE FROM pending_logins WHERE login = '$login'";
    mysql_query($query, $db);
    $query = "INSERT INTO pending_logins (login, ukey) VALUES ('$login', '$key')";
    mysql_query($query, $db);
    if (mysql_error($db)) {
	print "Key generation error.";
	return false;
    }

    /* Activation URL */
    $url = "http://accounts.example.com/activate.php?k=$key";

    include_once("phpmailer/class.phpmailer.php");
    $mail = new PHPMailer;
    $mail->ClearAddresses();
    $mail->AddAddress($email, $login);
    $mail->From = 'generator@example.com';
    $mail->FromName = 'Account Generator';
    $mail->Subject = 'Account verification';
    $mail->Body = "To activate your account, please click on the account
generation URL below:

$url

";
    if ($mail->Send()) {
	print "Verification message sent.";
    } else {
	print $mail->ErrorInfo;
	return false;
    }
    return true;
}

function activate_account($key, $db) {
    /* activate an account based on a key */

    /* clean up the key if necessary */
    $key = preg_replace("/[^a-z]/", "", $key);

    $query = "SELECT login FROM pending_logins WHERE ukey = '$key'";
    $c = mysql_query($query, $db);
    if (mysql_num_rows($c) != 1) {
	return false;
    }
    $query = "DELETE FROM pending_logins WHERE ukey = '$key'";
    mysql_query($query, $db);
    if (mysql_error($db)) {
	return false;
    }
    return true;
}

function is_active($login, $db) {
    /* see if an account has been activated */
    $query = "SELECT count(*) AS c FROM pending_logins WHERE login = '$login'";
    $c = mysql_query($query, $db);
    if (mysql_error($db)) {
	return false;
    }
    $r = mysql_fetch_array($c);
    if (intval($r["c"]) > 0) {
	return false;
    }
    return true;
}

?>
