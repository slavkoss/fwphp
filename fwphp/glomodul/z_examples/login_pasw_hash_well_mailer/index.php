<?php
/*
 * J:\awww\www\fwphp\glomodul\z_examples\login_pasw_hash\index.php
 * Based on PHPLoginAuthTut (Tutorial) : https://alexwebdevelop.com/user-authentication/
 * See https://www.binarytides.com/php-add-login-with-github-to-your-website/
 *     https://techglimpse.com/git-push-github-token-based-passwordless/

   If you want to password-protect any page, add such snippet of code at the beginning of it:
  session_start(); // Starts the session 
  if($_SESSION['Active'] == false){ // Redirects user to login.php if not logged in
    header("location:login.php");
    exit;
  }


*/
//string before login_pasw_hash is not required :
namespace B12phpfw\PHPLoginAuthTut\login_pasw_hash ;
//use B12phpfw\core\b12phpfw\Autoload ;
require('ini.php') ;  // bootstrap script is on module level

$account = new Account();  // Create a new Account object



/*  ******************************************************************
 Uncomment the following code blocks, one at a time, to test different Account operations.
********************************************************************** */

// 1. Crud - R e a d existing account $name_psw or  C r e a t e  new acc. $name_psw
$name_psw = 'usrnam_hashedp' ; // 8 TO 16 CHARS
try {  
    $idUsr = $account->getIdFromName($name_psw);
    if (is_null($idUsr)) { 
       $idUsr = $account->addAccount($name_psw, $name_psw);
       echo '<h3>The new account ID of $name_psw='. $name_psw .' is $idUsr=' . $idUsr .'</h3>'; 
    }
    else { echo '<h3>Existing account ID of $name_psw '. $name_psw .' is ' . $idUsr .'</h3>'; } 
}
catch (Exception $e) {
  echo $e->getMessage();
  die();
} 



// 2. crUd - Edit an account. Try passing invalid parameters to test error messages.
$name_psw2 = 'usrnam_hashedp2' ;
try {  $account->editAccount($idUsr, $name_psw2, $name_psw2, TRUE); }
catch (Exception $e) {
  echo $e->getMessage();
  die();
} echo '<h3>Edit of account id '. $idUsr .' successful, new $name_psw2='. $name_psw2 .'</h3>';




// 3. cRud - Login with username and password.
$login = FALSE;
try { $login = $account->login($name_psw2, $name_psw2); }
catch (Exception $e) {
  echo $e->getMessage();
  die();
}

if ($login) {
  echo 'Authentication successful.';
  echo 'Account ID: ' . $account->getId() . '<br>';
  echo 'Account name: ' . $account->getName() . '<br>';
  if ($account->isAuthenticated()) echo '$account->authenticated is TRUE.' . '<br>';
  else echo '$account->authenticated is FALSE.' . '<br>';
} else {   echo 'Authentication failed.'; }


                      // 5. cRud - S ession login
                      /*
                      $login = FALSE;
                      try {  $login = $account->sessLogin(); }
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
                      /* try
                      {
                        $login = $account->login($name_psw2, $name_psw2);
                        
                        if ($login)
                        {
                          echo 'Authentication successful.';
                          echo 'Account ID: ' . $account->getId() . '<br>';
                          echo 'Account name: ' . $account->getName() . '<br>';
                        }
                        else
                        {
                          echo 'Authentication failed.<br>';
                        } */
  $account->logout();

                        /* $login = $account->sessLogin();
                        if ($login)
                        {
                          echo 'Authentication successful.';
                          echo 'Account ID: ' . $account->getId() . '<br>';
                          echo 'Account name: ' . $account->getName() . '<br>';
                        }
                        else
                        {
                          echo 'Authentication failed.<br>';
                        } */
                      /* }
                      catch (Exception $e)
                      {
                        echo $e->getMessage();
                        die();
                      } */

echo '<br>Logout successful.';
echo 'Account ID: ' . $account->getId() . '<br>';
echo 'Account name: ' . $account->getName() . '<br>';
if ($account->isAuthenticated()) echo '$account->authenticated is TRUE.' . '<br>';
else echo '$account->authenticated is FALSE.' . '<br>';


                      // 7. Close other open S essions (if any).
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
                        
                        $account->closeOtherSessns();
                      }
                      catch (Exception $e)
                      {
                        echo $e->getMessage();
                        die();
                      }

                      echo 'S essions closed successfully.';
                      */


// cruD - Delete an account.
try { $account->deleteAccount($idUsr); }
catch (Exception $e) {
  echo $e->getMessage();
  die();
} echo '<h3>Account $idUsr='. $idUsr .' deleted successful.'.'</h3>';

