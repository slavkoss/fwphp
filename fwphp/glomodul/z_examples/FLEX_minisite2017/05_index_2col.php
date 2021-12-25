<?php
// site  U R L :   $_SERVER['REQUEST_SCHEME']
$url = '//'.$_SERVER['SERVER_NAME']
       . ':'.$_SERVER['SERVER_PORT']
       // dirs below web server doc root (all apps relative dir):
       . '/'.basename(dirname(__FILE__))
;
// http://dev1:8083/fwphp/index.php
// https://dev1:8083/fwphp/index.php

$urlcall = [
  // S I D E  L I N K S :  http://dev1:8083/aplw/MarkdownCheatsheet.php
    'home' => $url 
  , 'MarkdownCheatsheet' => $url.'/aplw/glomodul/help/mkd/01_pomoc_MarkdownCheatsheet.php'
  , 'user'         => $url.'/aplw/glomodul/user/'
  , 'kalendar'     => $url.'/aplw/glomodul/kalendar/'
  , 'bookmark'     => $url.'/aplw/glomodul/bookmark/'
  , 'bookm_song'   => $url.'/aplw/glomodul/bookm_song/'
  , 'tipdok'       => $url.'/aplw/possys/tipdok/'
  , 'artikl'       => $url.'/aplw/possys/artikl/'
  , 'helpappgroup' => $url.'/aplw/help/'
  // http://sspc1:8083/utl/ddns.php
  , 'ddns'         => $url.'/utl/ddns.php'
  , 'ddnsdev'      => $url.'/aplw/glomodul/help/Web%20Server%20Development%20Windows,%20Ubuntu,%20Fedora.php'
  , 'myddns'       => 'http://phporacle.mooo.com'.':'.$_SERVER['SERVER_PORT'].'/'
  , 'myddnslocal'  => 'http://phporacle.mooo.com.localtest.me'
                      .':'.$_SERVER['SERVER_PORT'].'/'
  //
  // F O O T E R  L I N K S :
  , 'lsweb'         => $url.'/utl/lsweb/lsweb.php'
  , 'info_php'      => $url.'/utl/01info/00info_php.php'
  , 'phpmyadmin'    => $url.'/phpmyadmin/index.php'
  , 'zwampmenu'     => $url.'/tests/zwampmenu/index_zwamp.php'
  , 'phpsysinfo'    => $url.'/utlbig/phpsysinfo/'
  , 'webgrind'      => $url.'/utlbig/webgrind/'
  , 'phporablog'    => 'http://phporacle.altervista.org'
  , 'github'        => 'https://github.com/slavkoss/fwphp'
];

if (isset($_SERVER['HTTPS']) )
{
    $http = 'https';
}
else
{
    $http = 'http';
}
?>


<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="utf-8" />
  
  <title>IZBORNIK</title>
  
  <link rel="stylesheet" media="screen" href="/vendor/b12phpfw/themes/two_cols.css" />
        <style>
            html, body
            {
                font-size: 1.0em;
            }
        </style>
</head>


<body>

  <div id="wrapper">
  
    <div id="header">
      <!-- H D R -->  
          PHP PDO CRUD Home - Glavni izbornik (Main menu)
    </div>
<?php
//echo 'aaaaaaaaaaaaaaaaaaaaaaaaa';
?>    
    
    <div id="main">
      <div class="row">
      
        <div id="Content">
          <h2>&nbsp; HTML 5, CSS 3, PHP, JS</h2>
          
          <h3>&nbsp; Git and Github</h3>
          
          <p>To copy this script (and -a = all changed files since last copy) to your local (git commit) and remote (git push) Github repository (see details in git_help.ini):
          <p>in Windows CLI (C:\Windows\SysWOW64\cmd.exe), in J:\awww\apl\dev1\fwphp
          <p>&nbsp; &nbsp; &nbsp; or in Git Bash CLI slavk@sspc1 MINGW64 /j/awww/apl/dev1/fwphp (master)
          <p>git status
          <p>git add SOME_DIR SOMEPATH_TO_SCRIPT...
          <p>git commit -am "Improved"  (git commit -am "Initial commit")
          <p>git pull
          <p>git push -u origin master

          
          
          <h3>&nbsp; DDNS (Dynamic DNS)</h3>
          
          <p>After completing 3 steps below (see details link "My DDNS"):
          <p>On intranet click link "My DDNS from local netw." eg  
          <a href="http://phporacle.mooo.com.localtest.me:8083/">http://phporacle.mooo.com.localtest.me:8083/</a>
          <br /><a href="http://localtest.me:8083/">http://localtest.me:8083/</a> is free (non commercial) wildcarded DNS Domain which always resolve back to 127.0.0.1 (your local machine)
          <p>On internet click link "My DDNS from internet" eg 
          <a href="http://phporacle.mooo.com:8083/">http://phporacle.mooo.com:8083/</a>
          
          <ol>
          <li>Find your inet provider's nonstatic public IP adress eg 213.191.136.167 eg here: <a href="https://www.yougetsignal.com/">https://www.yougetsignal.com/</a>
          
          <li>Register (sign up) eg here: <a href="https://freedns.afraid.org/">https://freedns.afraid.org/</a> for free or payed DDNS account
          <li>Send your public IP adress eg 213.191.136.167 to DDNS provider so :<br />
 https://freedns.afraid.org/nic/update?hostname=phporacle.mooo.com&amp;myip=213.191.136.167 <br />(asks user name and password aquired in register step)
          </ol>

        </div> <!--end div id="content"-->
    
    
    
    
    
    
        <!-- R I G H T  M E NU (L I N K S)  #help  $_SERVER['PHP_SELF'] -->  
        <div id="nav"> 
          <ol>
          <li><a href="./aplw/glomodul/help/">Help</a>
          &nbsp;&nbsp;<a href="./utl/down_upload/">down-up load</a>
          
          <li>
          <a href="<?=$url?>">Home http</a>
          &nbsp;&nbsp;<a href="<?='https://'.$url?>">Home https</a>
          <br />
          </li>

          <hr />
          <!-- U R L  calling SPA-s 
               WORKS  http://dev1:8083/aplw/possys/bookm_song/h
               NOT NOW   http://sspc1:8083/bookm_song/h (complicated routing)
          --> 
          <li><a href="<?=$urlcall['user']?>">Users</a>
          <li><a href="<?=$urlcall['artikl']?>">Artikl Oracle 11G</a>
          <li><a href="<?=$urlcall['tipdok']?>">Tip dokumenta Oracle 11G</a>
          <li><a href="<?=$urlcall['kalendar']?>">Kalendar (msgs, todos) MySql</a>
          <li><a href="<?=$urlcall['bookm_song']?>">Adrese (links): Songs MySql</a>
          <li><a href="<?=$urlcall['bookmark']?>">Adrese: Bookmarks MySql</a>
          <li><a href="<?=$urlcall['helpappgroup']?>">Help predložak (template) no DB</a>
          <li><a href="<?=$urlcall['MarkdownCheatsheet']?>">Markdown Cheat Sheet</a>
          <!--li><a href="./00dev/test/ajax/ngjs/emp.php">Šifrarnik hr.Emp</a-->
          <!--
               http://sspc1:8083/utl/ddns.php
               http://phporacle.mooo.com.localtest.me:8083/
          -->
          <hr />
          <li><a href="<?=$urlcall['ddns']?>">My DDNS</a>
          <br /><a href="<?=$urlcall['ddnsdev']?>">My DDNS development</a>
          <br /><a href="<?=$urlcall['myddnslocal']?>">My DDNS from local netw.</a>
          <br /><a href="<?=$urlcall['myddns']?>">My DDNS from internet</a>
          </ol>
        </div> <!--end div id="nav"-->
      
      
      
      
      
      
      </div> <!--end div class="row"-->
    </div> <!--end div id="main"-->
  </div> <!--end div id="wrapper"-->
    
    
    
    
                  <!-- F O O T E R -->    
  <div id="msgftr">
  </div> <!--end div id="msgftr"-->
  
  
<?php  
  if (isset($_SERVER['HTTPS']) )
{
    //echo "SECURE connection: \$_SERVER['HTTPS'] is set";
    $phptxt = 'SECURE connection: $_SERVER[HTTPS] is set';
}
else
{
    //echo "UNSECURE connection: \$_SERVER['HTTPS'] is NOT set.";
    $phptxt =  'UNSECURE connection: $_SERVER[HTTPS] is NOT set';
}
?>
  <script>
     var vmsgftr =  document.getElementById('msgftr');
     if (location.protocol == 'https:') 
        //alert('<h1>Page is using HTTPS 
        vmsgftr.innerHTML = '<hr><?=str_replace('\\','\\\\',__FILE__)?>
        says: ' + ' <?=$phptxt?>'
        +',&nbsp;&nbsp; JS says: ' + ' location.protocol=<b>' + location.protocol
        +'</b>';
     else 
        vmsgftr.innerHTML = '<hr><?=str_replace('\\','\\\\',__FILE__)?>
        says: ' + ' <?=$phptxt?>'
        +',&nbsp;&nbsp; JS says: ' + ' location.protocol=' + location.protocol
        ;
  </script>
  
  

&nbsp;&nbsp;<a href="<?=$urlcall['lsweb']?>">lsweb</a>
&nbsp;&nbsp;<a href="<?=$urlcall['info_php']?>" target="_blank">info_php</a>
&nbsp;&nbsp;<a href="<?=$urlcall['phpmyadmin']?>" target="_blank">phpMyAdmin</a>
&nbsp;&nbsp;<a href="<?=$urlcall['zwampmenu']?>" target="_blank">Z-WAMP menu</a>
&nbsp;&nbsp;<a href="<?=$urlcall['phpsysinfo']?>" target="_blank">phpsysinfo</a>
&nbsp;&nbsp; <!-- (alias) for J:\zwamp64\vdrive\.sys\webgrind : -->
<a href="<?=$urlcall['webgrind']?>" target="_blank">Webgrind</a>
&nbsp;&nbsp; <a href="<?=$urlcall['phporablog']?>" target="_blank">phporacle blog</a>
&nbsp;&nbsp; <a href="<?=$urlcall['github']?>" target="_blank">Github</a>

          <!--a href="http://localhost:8083/index.php?XDEBUG_PROFILE=true" target="_blank">xdebug & webgrind</a><br-->
          
          <!--a href="http://localhost:8083/webgrind/" target="_blank">Webgrind</a><br-->



<br><br>
<?php

/**         S I T E  C O N T R O L L E R  (URLCALL-s)

if (!defined('APPDIR')) { define('APPDIR', 'possys'); }

$MODULEDOCPATH = __DIR__ ;
$dbkon = ''; // where user table is (to login)

require_once $_SERVER['DOCUMENT_ROOT'].'/b12fw/_confglo.php'; //defines globals

//$script_to_include = 'ctr_home.php';
//1. here NOT defin. nonexistent web adr. to include noOOPCONTROLLERscripts
//   because this site controller does not include scripts
//2. router

require_once 'config.php'; // c r e a t e s  $urlcall


//WORKS  : http://dev1:8083/aplw/possys/bookm_song/help
//NOT NOW: http://sspc1:8083/bookm_song/help (complicated routing)
*/

/*
//$config array is acting as a drop-in replacement for the values found in the openssl.cnf file, so it must contain all of the override values that you need even if the function they're being sent to won't use them.

//Also, if you change the 'digest_alg' to something like 'sha256' and still get an MD5 signed CSR check your openssl.cnf file to see whether the digest algorithm you want to use is actually supported.
// dir c:\Users\local\ssl\openssl.cnf
$config = array(
    //'config' => '/usr/local/nessy2/share/ssl/openssl.cnf',
    'config' => 'J:/Apache24/conf/openssl.cnf',
    //'config' => 'J:\Apache24\conf\openssl.cnf',
    //"digest_alg" => "sha256",
    //"digest_alg" => "sha512",
    //"digest_alg" => "sha1",
    //"private_key_bits" => 4096,
    "private_key_bits" => 2048,
    "private_key_type" => OPENSSL_KEYTYPE_RSA,
        'encrypt_key' => true,
        'x509_extensions' => 'v3_ca',
);

$dn = array(
    "countryName" => "GB",
    "stateOrProvinceName" => "Somerset",
    "localityName" => "Glastonbury",
    "organizationName" => "The Brain Room Limited",
    "organizationalUnitName" => "PHP Documentation Team",
    //"commonName" => "www.enib.fr",
    //"commonName" => "Wez Furlong",
    "commonName" => "localhost",
    "emailAddress" => "wez@example.com"
);
$privkeypass = '1234';
$numberofdays = 365;
//$CAcrt = "file://ca.crt";
//$CAkey = array("file://ca.key", "myPassWord");

// Create the keypair
   
// Create client private and public key
$privkey = openssl_pkey_new($config);
echo '11111 '; var_dump(openssl_error_string());
// Generate a certificate signing request
$csr = openssl_csr_new($dn, $privkey, array('digest_alg' => 'sha256'));
//$csr = openssl_csr_new($dn, $privkey, $config); //, $config
echo '<br>22222 '; var_dump(openssl_error_string());
openssl_csr_export($csr, $csrout) and var_dump($csrout);

// Generate a self-signed cert, valid for 365 days
$configArgs = array(
    'digest_alg' => 'sha256'
   ,"x509_extensions" => "v3_req");
//$x509 = openssl_csr_sign($csr, $CAcrt, $CAkey, 100, $configArgs);
$x509 = openssl_csr_sign($csr, null, $privkey, $numberofdays, $configArgs);
//$sscert = openssl_csr_sign($csr, null, $privkey, $numberofdays);
//openssl_x509_export($sscert, $publickey);

// Save your private key, CSR and self-signed cert for later use
openssl_csr_export($csr, $csrout) and var_dump($csrout);
openssl_x509_export($x509, $certout) and var_dump($certout);
openssl_pkey_export($privkey, $pkeyout, "mypassword") and var_dump($pkeyout);

// Show any errors that occurred here
while (($e = openssl_error_string()) !== false) {
    echo $e . "\n";
}
*/





/*
// Get private key
openssl_pkey_export($privkey, $privatekey, $privkeypass);

openssl_csr_export($csr, $csrStr);

// Get public key
$publickey=openssl_pkey_get_details($privkey);
$publickey=$publickey["key"];

//echo $privatekey; // Will hold the exported PriKey
//echo $publickey;  // Will hold the exported PubKey
//echo $csrStr;     // Will hold the exported Certificate

echo "Private Key:<BR>$privatekey<br><br>Public Key:<BR>$publickey<BR><BR>";

$cleartext = '1234 5678 9012 3456';

echo "Clear text:<br>$cleartext<BR><BR>";

openssl_public_encrypt($cleartext, $crypttext, $publickey);

echo "Crypt text:<br>$crypttext<BR><BR>";

openssl_private_decrypt($crypttext, $decrypted, $privatekey);

echo "Decrypted text:<BR>$decrypted<br><br>";
*/
?>

</body>
</html>