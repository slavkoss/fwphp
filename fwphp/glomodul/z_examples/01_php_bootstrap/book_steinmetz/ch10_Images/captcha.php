<?php

session_start(); 

/* look for a submitted password */
if ($_REQUEST["tt_pass"]) {
    if ($_REQUEST["tt_pass"] == $_SESSION["tt_pass"]) {
	echo "passphrase correct.";
    } else {
	echo "passphrase incorrect.";
    }
    exit(0);
}

/* by default, send the form */

print '<form action="' . $_SERVER['PHP_SELF'] . '" method="post">';
?>

Type the following lowercase letters to proceed:<br />
(If you can't read this, reload the page)<br />
<img src="captcha_image.php"><br /><br />
Letters: <input name="tt_pass" type="text" size="10" maxlength="10">
<input type="submit">
</form>
