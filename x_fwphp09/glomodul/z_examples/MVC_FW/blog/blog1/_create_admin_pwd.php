<?php
/**
 * @author           Pierre-Henry Soria <phy@hizup.uk>
 * @copyright        (c) 2015-2017, Pierre-Henry Soria. All Rights Reserved.
 * @license          Lesser General Public License <http://www.gnu.org/copyleft/lesser.html>
 * @link             http://hizup.uk
 */

/** Allows to create an admin password easily **/
/* I use PHP 5.5 password hashing for this app test. Thanks this new PHP feature, the password gets a salt and it is much more secure than a simple SHA1 algorithm */

// echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT); //60 chars, current DEFAULT algorithm is BCRYPT

$sPwd = 'pwd123'; // Admin Password
//$sHashedPwd = password_hash($sPwd , PASSWORD_BCRYPT, array('cost' => 14));
$sHashedPwd = password_hash($sPwd , PASSWORD_DEFAULT);
echo 'Password is: ' . $sHashedPwd;

$sHashedPwd1 = '$2y$14$kefF6aqkuOEWo7CIFduNf.7O8BuGR4uWrIAFcHWm2u99OcLPDFWOe' ;
$sHashedPwd2 = '$2y$10$WSr0hjusxYrnY.Eq.UY.Re4p/Qhq0Dh3o8T8nYAYR48TvT0C.aaZa' ;

if (password_verify('pwd123', $sHashedPwd1)) { echo '<br>sHashedPwd1 is valid!';
} else { echo '<br>Invalid sHashedPwd1.'; }

if (password_verify('pwd123', $sHashedPwd2)) { echo '<br>sHashedPwd2 is valid!';
} else { echo '<br>Invalid sHashedPwd2.'; }

