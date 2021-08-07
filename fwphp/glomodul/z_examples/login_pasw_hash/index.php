<?php
// J:\ylaragon\www\login_pasw_hash\index.php
/*
 * 	This example script can be downloaded from Alex Web Develop "PHP Login and Authentication Tutorial":
 * 	
 * 	https://alexwebdevelop.com/user-authentication/
 * 	
 * 	You are free to use and share this script as you like.
 * 	If you share it, please leave this disclaimer inside.
 * 	
 * 	Subscribe to my free newsletter and get my exclusive PHP tips and learning advice:
 * 	
 * 	https://alexwebdevelop.com/
 * 	
*/



/*	Start the Session, required for Session-based authentication.
	Remeber to call session_start() before sending any output to the remote client.
	Also, make sure to set a proper session cookie lifetime in your php.ini.
	
	For example, this sets the cookie lifetime to 7 days:
	session.cookie_lifetime=604800
*/
session_start();

/* Include the database connection file (remember to change the connection parameters) */
require './db_inc.php';

/* Include the Account class file */
require './account_class.php';

/* Create a new Account object */
$account = new Account();



/*	Uncomment the following code blocks, one at a time, to test different Account operations. */

/*
// 1. Crud - Insert a new account (execute twice to test the "already existing" account error)
try {	$newId = $account->addAccount('login_pasw_hash', 'login_pasw_hash'); }
catch (Exception $e) {
	echo $e->getMessage();
	die();
} echo 'The new account ID is ' . $newId; // 73
*/

// 2. crUd - Edit an account. Try passing invalid parameters to test error messages.
/*
$accountId = 1;
try {	$account->editAccount($accountId, 'myNewName', 'new password', TRUE); }
catch (Exception $e) {
	echo $e->getMessage();
	die();
} echo 'Account edit successful.';
*/

// 3. cruD - Delete an account.
/*
$accountId = 1;
try { $account->deleteAccount($accountId); }
catch (Exception $e) {
	echo $e->getMessage();
	die();
} echo 'Account delete successful.';
*/

// 4. cRud - Login with username and password.
/*
$login = FALSE;
try { $login = $account->login('myUserName', 'myPassword'); }
catch (Exception $e) {
	echo $e->getMessage();
	die();
}

if ($login) {
	echo 'Authentication successful.';
	echo 'Account ID: ' . $account->getId() . '<br>';
	echo 'Account name: ' . $account->getName() . '<br>';
} else { 	echo 'Authentication failed.'; }
*/

// 5. cRud - Session login
/*
$login = FALSE;
try {	$login = $account->sessionLogin(); }
catch (Exception $e) {
	echo $e->getMessage();
	die();
}
if ($login) {
	echo 'Authentication successful.';
	echo 'Account ID: ' . $account->getId() . '<br>';
	echo 'Account name: ' . $account->getName() . '<br>';
} else { echo 'Authentication failed.'; }
*/




// 6. Logout.
/*
try
{
	$login = $account->login('myUserName', 'myPassword');
	
	if ($login)
	{
		echo 'Authentication successful.';
		echo 'Account ID: ' . $account->getId() . '<br>';
		echo 'Account name: ' . $account->getName() . '<br>';
	}
	else
	{
		echo 'Authentication failed.<br>';
	}
	
	$account->logout();
	
	$login = $account->sessionLogin();
	
	if ($login)
	{
		echo 'Authentication successful.';
		echo 'Account ID: ' . $account->getId() . '<br>';
		echo 'Account name: ' . $account->getName() . '<br>';
	}
	else
	{
		echo 'Authentication failed.<br>';
	}
}
catch (Exception $e)
{
	echo $e->getMessage();
	die();
}

echo 'Logout successful.';
*/

// 7. Close other open Sessions (if any).
/*
try
{
	$login = $account->login('myUserName', 'myPassword');
	
	if ($login)
	{
		echo 'Authentication successful.';
		echo 'Account ID: ' . $account->getId() . '<br>';
		echo 'Account name: ' . $account->getName() . '<br>';
	}
	else
	{
		echo 'Authentication failed.<br>';
	}
	
	$account->closeOtherSessions();
}
catch (Exception $e)
{
	echo $e->getMessage();
	die();
}

echo 'Sessions closed successfully.';
*/
