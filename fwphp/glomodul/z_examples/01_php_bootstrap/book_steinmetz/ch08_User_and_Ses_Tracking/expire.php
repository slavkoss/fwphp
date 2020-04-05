<?
function login_validate() {
    /* reset the timeout on a login session */
    /* default timeout is ten minutes (600 seconds) */
    $timeout = 600; 
    $_SESSION["expires_by"] = time() + $timeout; 
}

function login_check() {
    @session_start();
    /* checks for session activity timeout */
    $exp_time = intval($_SESSION["expires_by"]);
    if (time() < $exp_time) {
	/* session still valid; refresh the time */
	login_validate();
	return true; 
    } else {
	/* session expired; remove session variable */
	unset($_SESSION["expires_by"]);
	return false; 
    }
}

session_start(); 

if (!login_check()) {
    header("Location: login.php");
    exit(0); 
}

?>
