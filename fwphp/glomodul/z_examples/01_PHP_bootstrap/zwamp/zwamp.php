<?php
/* http://dev/                        http://localhost/ je zwamp doc root
   J:\dev_web\htdocs\zwamp.php  J:\zwamp\vdrive\web\index.php
//
pomoc razvojna (yii aplikacija):
    razvoj: http://dev/inc/fw/photogallery/www/
            http://localhost:8083/inc/fw/photogallery/www/
            http://localhost/photogallery/www/
    J:\zwamp\vdrive\web\photogallery   J:\wamp\www\photogallery
    spremi u:  J:\dev_web\htdocs\inc\fw\photogallery\www\index.php
//
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
//   1.Alati  2.Programi (projekti)  3.Aliasi i virt.hostovi
//   4.Lista ispod (php extenzije)
// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
*/
// ~~~~~~~~ md = Main-site Doc.root ~~~~~~~~~~~~
$fle             = __FILE__;
$suppress_localhost = false;
$server_software    = $_SERVER['SERVER_SOFTWARE'];
$mdpath             = $_SERVER['DOCUMENT_ROOT']; 
   // eg J:\dev_web\htdocs\       realpath ?
   // conf files & f3fw root are same nivo eg  $mdpath.'/../lib/base.php'
$murl = 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"];  // eg  http://dev:8082
//
$zwamp_conffile = realpath($mdpath.'/zwamp_conf.php');
//$wampConfFile2 = realpath($mdpath.'/zwamp_conf2.php');
//$wampConfFile = realpath($mdpath.'/../conf/zwamp_conf.php');
        //bilo:  ../wampmanager.conf 
if (!is_file($zwamp_conffile))
    die ("Ne mogu pročitati putanju \$zwamp_conffile=$zwamp_conffile, upišite točan path u varijablu \$zwamp_conffile u skripti "
          .basename($fle,'php').'_conf.php');
//
require_once($zwamp_conffile); // c o n f 2  se ucitava u c o n f
           // texts (lang) & kodovi ikona
//
//
//
// ****************************************************
// 1. G E T  AKTIVNOSTI STRANICE
// ****************************************************
//
// ----------------------------------------
// 1.1  jezik zadan u g e t param stranice
// ----------------------------------------
// Définition de la langue et des textes 
if (isset ($_GET['lang']))
{
  $jezik = htmlspecialchars($_GET['lang'],ENT_QUOTES);
  
  /* if ($jezik != 'en' && $jezik != 'fr' ) {
      $jezik = 'hr'; // default lang bio 'fr'
  } */
} else $jezik = 'hr';
/* if ( isset ($_SERVER['HTTP_ACCEPT_LANGUAGE']) 
         AND preg_match("/^hr/", $_SERVER['HTTP_ACCEPT_LANGUAGE'])
       ) $jezik = 'hr';
elseif ... (en, fr)... else $jezik = 'hr'; 
*/
//
// ----------------------------------------
// 1.2  1. T O O L S  - INKLUDIRANJE / header ("Location:...    
// ---------------------------------------- target="_blank"

//if (isset($_GET['phpinfo'])) { 
if (isset($_GET['phpinfo'])) {include($phpinfo_apsp); exit();}
   //{header ("Location: $phpinfo_url"); exit();}
//if (isset($_GET['phpinfo'])) {include($phpinfo_apsp); exit();}
                            // ili phpinfo();
if (isset($_GET['yiiinfo'])) {include($yiiinfo_apsp);  exit();} //{header ("Location: $yiiinfo_url"); exit();}
if (isset($_GET['composerphpinfo'])) {include($composerphpinfo_apsp);  exit();} 
// ************ _url ***********
if (isset($_GET['angularjsinfo'])) {header ("Location: $angularjsinfo_url"); exit();}
if (isset($_GET['f3fwinfo'])) {header ("Location: $f3fwinfo_url"); exit();}
if (isset($_GET['blogalterv'])) {header ("Location: $blogalterv_url"); exit();}
// *****************************
if (isset($_GET['11XEinfo'])) {include($XEinfo_apsp);   exit();}    //{header ("Location: $XEinfo_url"); exit();}
//
// ----------------------------------------~~~~~~~~~~~~~~~~
// 1.3  prikaz images, npr http://dev/?img=pngFolder
// ----------------------------------------~~~~~~~~~~~~~~~~
// 
if (isset($_GET['img']))
{
    switch ($_GET['img'])
    {
        case 'pngFolder' :
        header("Content-type: image/png");
        echo base64_decode($pngFolder);
        exit();
        
        case 'pngFolderGo' :
        header("Content-type: image/png");
        echo base64_decode($pngFolderGo);
        exit();
        
        case 'gifLogo' :
        header("Content-type: image/gif");
        echo base64_decode($gifLogo);
        exit();
        
        case 'pngPlugin' :
        header("Content-type: image/png");
        echo base64_decode($pngPlugin);
        exit();
        
        case 'pngWrench' :
        header("Content-type: image/png");
        echo base64_decode($pngWrench);
        exit();
        
        case 'favicon' :
        header("Content-type: image/x-icon");
        echo base64_decode($favicon);
        exit();
        
        default:
        header("Content-type: image/x-icon");
        { //echo base64_decode($pngFolder) . base64_decode($favicon);
          echo base64_decode($favicon);
            //,'<br />' , 
        exit();
        }
    }
}


   
   
   
//header('Status: 301 Moved Permanently', false, 301);      
//header('Location: /aviatechno/index.php');      
//exit();       
// *********************************************
//  P G H D R
// *********************************************
ob_start();
   include('zwamp_hdr.php');
$pghdr = ob_get_contents();
ob_end_clean();

// *********************************************
//  P G B O D Y
// *********************************************
$pgbody = <<< EOPGBODY
   <!-- ====================================
    1. LINKOVI TOOLS (pomoć i alati)
   ====================================== -->
   <!--div style="margin-top:5px;border-top:1px solid #999;"></div
   
   -->
   <div class="third left">
   <h2>{$txtlang[$jezik]['1mainleft']}</h2>
   <ul class="tools">
      <li>
         <a target="_blank" href="?11XEinfo=1">11XEinfo</a>
         <a target="_blank" href="?phpinfo=1">phpinfo()</a>
         <a target="_blank" href="?yiiinfo=1">yiiinfo</a>
         <a target="_blank" href="?composerphpinfo=1">composerinfo</a>
         <a target="_blank" href="?f3fwinfo=1">f3fwinfo</a>
         <a target="_blank" href="?angularjsinfo=1">angularjsinfo</a>
         <a target="_blank" href="?blogalterv=1">blogalterv</a>
      </li>
      <hr />
      <li><a target="_blank" href="phpmyadmin/">phpmyadmin</a></li>
   </ul>
   </div>
   
   <div class="third left">
   <h2>{$txtlang[$jezik]['2maincenter']}</h2>

   <ul class="projects">
      $projectContents
   </ul>
   
   </div>
   
   <div class="third right">
   <h2>{$txtlang[$jezik]['3mainright']}</h2>

   <ul class="aliases">
       ${aliasContents}         
   </ul>

   </div>
   <!-- KRAJ Tools, Projects, Aliases -->
 
   <div style="clear:both;"></div>
  



  <!-- SW verzije -->
   <h2>{$txtlang[$jezik]['4maindown']} </h2>

   <dl class="xxcontent">
      <!-- {$txtlang[$jezik]['versa']}
      ${apacheVersion}&nbsp;&nbsp;-&nbsp; -->
      
      {$txtlang[$jezik]['server']}
      ${server_software}
      <a href='http://{$txtlang[$jezik][$doca_version]}'>Docs</a>

      &nbsp;&nbsp;&nbsp;{$txtlang[$jezik]['versp']}
      ${phpVersion}&nbsp;&nbsp;<a href='http://{$txtlang[$jezik]['docp']}'>Docs</a>
      
      <br />{$txtlang[$jezik]['phpExt']}
      <dd><ul>${phpExtContents}</ul></dd>
      
      {$txtlang[$jezik]['versora']}
      ${oracleVersion} &nbsp;<a href='http://{$txtlang[$jezik]['docoraxe']}'>Docs</a>

      &nbsp;&nbsp;&nbsp;{$txtlang[$jezik]['versm']}
      ${mysqlVersion} &nbsp;<a href='http://{$txtlang[$jezik]['docm']}'>Docs</a>

   </dl>

    
EOPGBODY;

// *********************************************
//  P G B O D Y 2
// *********************************************
ob_start();
   include('./z_doc/MongoDB.html');
$pgbody_mongodb = ob_get_contents();
ob_end_clean();
//<script type="text/javascript" src="MongoDB.js"></script>
//<script type="text/javascript"> document.body.appendChild(sadrzajstr); </script>

// *********************************************
// I S P I S  O V E  W E B  S T R A N I C E
// *********************************************
echo <<< EOPG
    $pghdr
    $pgbody
EOPG;
//$pgbody_mongodb
?>
<br /><hr /> 

<style type="text/css">
.align-right {float:right;margin:0 0 15px 15px;}
.frame {padding:8px;border:1px solid #ccc;}
</style>
<p>This  Z:WAMP page <a href="http://localhost/">http://localhost/</a>&nbsp; &nbsp; <br>
Requirements&nbsp; <a href="http://dev/inc/utl/yiiinfo.php">http://dev/inc/utl/yiiinfo.php</a>&nbsp; &nbsp; <a href="http://dev/inc/utl/phpinfo2.php"> http://dev/inc/utl/phpinfo2.php</a></p>
<p><a target="_blank" href="http://dev/inc/oci8testOOP_HR.php">http://dev/inc/oci8testOOP_HR.php</a>&nbsp; </p>
<h2>Z-WAMP Server Pack&nbsp;portable</h2>
<p>Excellent tray-icon-right-click-menu but should have cobnfig file for 
<a href="#firstlinsource" >first lines source code</a>.
      
</p>
<p>Z-WAMP project site&nbsp;&nbsp; <a href="http://zwamp.sourceforge.net/">http://zwamp.sourceforge.net/</a>&nbsp; <br>
  Download <a href="http://sourceforge.net/projects/zwamp/files">http://sourceforge.net/projects/zwamp/files</a> - operating 
system (32-bit/i386 or 64-bit/x86_64). <br>
http://sourceforge.net/p/zwamp/discussion/1093015/thread/dbdeafbe/5146/</p>
<p>C:&#92;Windows&#92;system32>wmic os get osarchitecture -> 64-bit<br>
Ver 2.2.1 <strong>zwamp-x64-2.2.1-full.zip</strong> 687 MB  (sa help-ovima) 2013-02-23

contains:</p>
<ol>
  <li>Doc - Apache, PHP, HTML5, MySQL, JS&nbsp;&nbsp;  50 MB<br>
    <br>
  </li>
  <li>Apache 2.4.3&nbsp;  13 MB</li>
  <li>PHP 5.4.12&nbsp;&nbsp; 50 MB</li>
  <li>MiniPerl 5.14.2 &nbsp; 2 MB<br>
    <br>
    <a href="http://sourceforge.net/projects/zwamp/files"><img src="Z-WAMP%20Server%20Pack%20Win_files/screenshot.png" class="align-right frame" alt="Screenshot" /></a></li>
  <li><strong>Alternative PHP Cache APC 3.1.13</strong></li>
  <li><strong>XCache 3.0.0</strong></li>
  <li>XDebug 2.2.1<br>
    <br>
  </li>
  <li>Adminer 3.5.1&nbsp; <a href="http://www.adminer.org" rel="nofollow">http://www.adminer.org/</a><br>
  </li>
  <li>MySQL 5.6.10&nbsp; <strong>150 MB</strong> (set up a MySQL root account and password as soon as you can)</li>
  <li>PHP MongoDB Admin</li>
  <li>MongoDB 2.2.3 (PHP 1.3.4 driver)&nbsp; <strong>425 MB</strong></li></ol>

<h3>Usage</h3>
<p>Remove all traces of other WAMP stacks installed on your Windows PC to prevent conflicts. </p>
<p>Double check your <tt><strong>PATH</strong></tt> environment variable. By default, Apache uses TCP port 80 for incoming 
  HTTP requests. Configure other software, e.g. Skype, to use alternative 
  TCP ports.</p>
<p>Unpack  ZIP archive in any directory on your hard disk. You can also transfer the files to a USB stick. </p>
<p>If you prefer non-portable setup, create  shortcut to <tt>zwamp.exe</tt> on your desktop, <tt>quick launch bar</tt> or the <tt>Start Menu</tt>, double-click the shortcut and you're done with setup! </p>
<p>Z-WAMP will create a virtual drive on your computer (<tt>Z:</tt> usually) and an icon should appear immediately in your system tray. <strong>Right-click on this icon</strong> to access all features of the Z-WAMP stack.</p>
<p>Once  Web server is up, you can drop all your Web site files in <tt>/web</tt> directory. Type <tt><span><a href="http://localhost/" class="smarterwiki-linkify">http://localhost</a></span></tt> in  Web browser's address bar and you now have a working Web site.</p>
<p>If you want Z-WAMP to run automatically every time you log into your
  computer,  enable  "<strong>Run on Windows startup</strong>" ZWAMP menu option. If you wish to uninstall the package,  delete folder where you installed it.</p>
<p>ver. 2.2.1 x64, 23. 2.2013 sadrži (ja raspakirao najnovije novembar 2014)i:</p>


<?php
echo '' //$this->getServerInfo() 
. 'PHP ver. '.PHP_VERSION
//. ', datum ispisa: ' . $this->getNowDate()
. '<br />'.'Ova skripta: <strong>'
           .__FILE__.'</strong>';
?>


<p>Z je npr J:\zwamp\vdrive, subst Z: &quot;J:\zwamp\vdrive&quot;<br>
  PHP 5+ (PHP Version 5.5.17) requirement : <br>
  host system to have Visual C++ installed - MSVC11 (Visual C++ 2012) on Win NT my PC 6.3 build 9200 (Win 8.1 Business Edition) AMD64<br>
  you need to increase max_input_vars if your forms have a lot of variables. Older versions of php didn\'t have this limitation.<br>
</p>
<p>z:.sys\apache2\bin\httpd.exe (Apache/2.4.10 (Win64)) Z:\.sys\php\php.ini<br>
  $_SERVER[&quot;QUERY_STRING&quot;] phpinfo=1 REQUEST_URI	/?phpinfo=1 HTTP Request	GET /?phpinfo=1 HTTP/1.1<br>
  OCI8 Version	2.0.8 SQLite3 module version	0.7-dev SQLite Library	3.8.4.3 <br>
  OpenSSL Library Version	OpenSSL 1.0.1i 6 Aug 2014<br>
  Phar EXT version	2.0.2<br>
  Internal Sendmail Support for Windows	enabled <br>
  libxml2 Version	2.9.1 XMLReader	enabled XMLWriter	enabled<br>
  XSL	enabled libxslt Version	1.1.27 libxslt compiled against libxml Version	2.7.8 EXSLT	enabled libexslt Version	0.8.16<br>
</p>
<p>For me, app using port 80 was SKYPE! <br>
  netstat -ao<br>
  to find process ID (PID) of appl. already listening port 80: open up Win Task Manager (Ctrl + Shift + Esc) to find matching process. <br>
  If there is no PID column, in Task Manager menu bar, click &quot;View&quot; &amp; then &quot;Select Columns...&quot;. Check off PID, click OK, &amp; find offending app. <br>
  In Skype: &quot;Tools&quot;-&gt;&quot;Options...&quot;-&gt;&quot;Advanced&quot;-&gt;&quot;Connection&quot;-&gt;uncheck &quot;Use port 80 and 443 as alternatives for incoming connections&quot;<br>
  -&gt;&quot;Save&quot;-&gt;restart Skype. </p>
<p> </p>
<h2>F3 PHP micro framework</h2>
<h3>Bong Cosca ZWAMP &amp; F3 author: Shameless Plug</h3>
<p><a href="http://fatfree.sourceforge.net/">http://fatfree.sourceforge.net</a> Unlike other PHP frameworks, F3 
  aims to be usable, not usual. </p>
<p>1. Instalacija F3, mape, dependence - ver. <a href="http://localhost/f3fw/">http://localhost/f3fw/</a></p>
<h3>2. Pomoć i prvi primjeri <a href="http://localhost/f3fw/z_doc/F3_php_fw_bcosca.php">http://localhost/f3fw/z_doc/F3_php_fw_bcosca.php</a></h3>
<h3>3. Primjeri routinga <a target="_blank" href="http://dev/inc/fw/t1_f3fw/">http://dev/inc/fw/t1_f3fw/</a></h3>
<h2>PHP Reports</h2>
<p><a href="http://fatfreeframework.com/home">http://github.com/taq/phpreports</a></p>
<p>or : <a href="http://sourceforge.net/projects/reportico/?source=recommended">http://sourceforge.net/projects/reportico/?source=recommended</a><br />
</p>
<h2>Notepad Replacer</h2>
<p><a href="http://www.binaryfortress.com/NotepadReplacer/Discussions/View/wont-install-properly-on-win2008-sp2-x64/?ID=04b032d7-ba27-49cf-b6cd-5057ec4a7b8e">http://www.binaryfortress.com/NotepadReplacer/Discussions/View/wont-install-properly-on-win2008-sp2-x64/?ID=04b032d7-ba27-49cf-b6cd-5057ec4a7b8e </a> <br />
Replace Microsoft Notepad with Notepad++ (windows 8)
:</p>
<p>Regedit node created with <strong>NotepadReplacerSetup-1.1.6.exe</strong> :</p>
<p>HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Image File Execution Options\notepad.exe. <br />
  <br>
  string (REG_SZ) name "Debugger" <br>
value "C:\Program Files (x86)\Notepad Replacer\<strong>NotepadReplacer.exe</strong>" /z&nbsp; &nbsp;--BEZ &quot; i BEZ /z</p>
<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; which opens J:\aplp\aplp\3_edit\3_Notepad++\notepad++.exe</p>



<h2><a name="firstlinsource"></a>First lines of zwamp.exe source code</h2>
<pre>
{*
    Z-WAMP Server Pack
    Copyright © 2009-2012 F3::Factory/<strong>Bong Cosca</strong>
    Colaboration: www.dinlabs.com/<strong>Lucas Martín</strong> <br>                     (Compatibility with FreePascal 2.7.1) <br>                  and Add tango <strong>iconset from iconfinder.com for free</strong>
    All rights reserved
    Licensed under the terms of the GNU Public License v3
*}

{$AppType GUI}
{$Mode DELPHI}
{$Resource zwamp.res}
{$Resource manifest.rc}

program ZWAMP;
uses
    ComObj,FileInfo,RegExpr,Registry,SysUtils,Variants,Windows;
type
    Service=Record
        exe,path,args:String;
    end;
    VersionInfo=Record
        owner,version,name,license:String;
    end;
const
    // Globals
    GUID:String='{39d8c3af-1f05-4587-a217-5b6acbae4b9a}';
    CRLF:String=#13#10;
    // Services
    SVC_Apache:Service=(
        exe:'httpd.exe';
        path:'<strong>\.sys\apache2\bin</strong>';
        args:'';
    );
    SVC_MemCache:Service=(
        exe:'memcached.exe';
        path:'<strong>\.sys\memcache</strong>';
        args:'';
    );
    SVC_MongoDB:Service=(
        exe:'mongod.exe';
        path:'<strong>\.sys\mongodb</strong>';
        args:'--journal --dbpath \.sys\mongodb\data';
    );
    SVC_MySQL:Service=(
        exe:'mysqld.exe';
        path:'<strong>\.sys\mysql\bin</strong>';
        args:'--defaults-file=\.sys\mysql\my.ini --console'+'';
    );
    SVC_PHP:Service=(
        exe:'php.exe';
        path:'<strong>\.sys\php</strong>';
        args:'';
    );
    SVC_PERL:Service=(
        exe:'perl.exe';
        path:'<strong>\.sys\miniperl\bin</strong>';
        args:'';
    );
    // Config files
    CFG_Apache:String='<strong>\.sys\apache2\conf\httpd.conf</strong>';
    CFG_vHosts:String='<strong>\.sys\apache2\conf\vhosts.conf</strong>';
    CFG_MySQL:String='<strong>\.sys\mysql\my.ini</strong>';
    CFG_PHP:String='<strong>\.sys\php\php.ini</strong>';
    CFG_Windows:String='<strong>\system32\drivers\etc\hosts</strong>';
    // Log files
    LOG_Access:String='<strong>\.sys\apache2\logs\access.log</strong>';
    LOG_Error:String='<strong>\.sys\apache2\logs\error.log</strong>';
    // URLs
    WEB_Adminer:String='<strong>http://localhost/adminer</strong>';
    WEB_APC:String='<strong>http://localhost/apc</strong>';
    WEB_MemCache:String='<strong>http://localhost/memcache</strong>';
    WEB_MongoDB:String='<strong>http://localhost/mongodb</strong>';
    WEB_PHPinfo:String='<strong>http://localhost/phpinfo</strong>';
    WEB_DONATE:String='<strong>https://www.paypal.com/cgi-bin/webscr</strong>?'+
        'cmd=_s-xclick&hosted_button_id=6HZ8WY96FZLKN';
    WEB_Home:String='<strong>http://zwamp.sourceforge.net</strong>';
    WEB_Download:String='<strong>http://sourceforge.net/projects/zwamp/files</strong>';
    WEB_VC10:String='<strong>http://support.microsoft.com/kb/2019667</strong>';
    // Documentation
    DOC_Path:String='<strong>\.sys\docs</strong>';
    DOC_Apache:String='<strong>apache24.chm</strong>';
    DOC_HTML5:String='<strong>html5.pdf</strong>';
    DOC_Javascript:String='<strong>javascript.pdf</strong>';
    DOC_MongoDB:String='<strong>mongodb.pdf</strong>';
    DOC_MySQL:String='<strong>mysql-5.5.pdf</strong>';
    DOC_PHP:String='<strong>php.chm</strong>';
    // Registry keys
    REG_Path:String='System\CurrentControlSet\Control\'+
        'Session Manager\Environment';
    REG_App:String='Software\ZWAMP';
    REG_UAC:String='Software\Microsoft\Windows\CurrentVersion\'+
        'Policies\System';
    REG_Auto:String='Software\Microsoft\Windows\CurrentVersion\Run';
    // Product codes for Visual C++ redistributable package
    MSVC:Array[1..6] of String=(
        // VC9
        '{350AA351-21FA-3270-8B7A-835434E766AD}',
        '{FF66E9F6-83E7-3A3E-AF14-8DE9A809A6A4}',
        // VC10
        '{196BB40D-1578-3D01-B289-BEFC77A11A1E}',
        '{DA5E371C-6333-3D8A-93A4-6FD5B20BCC6E}',
        '{F0C3E5D1-1ADE-321E-8167-68EF0DE699A5}',
        '{1D8E6291-B0D5-35EC-8441-6616F567A0F7}'
    );
    ...
</pre>



<p>
<?php
echo '$_SERVER[\'HTTP_ACCEPT_LANGUAGE\'] = ' . $_SERVER['HTTP_ACCEPT_LANGUAGE']; 
echo '<br /><br />This script is from WAMP: reads zwamp_conf.php in <h2>SADRŽAJ VARIJABLE $zwamp_conffileContents</h2>'; 
//print_r($zwamp_conffileContents); 
echo <<< EOTXT
$zwamp_conffileContents
EOTXT;
?>
8.10.2014
</p>
<p>&nbsp;</p>
<p>#<strong>C:\Windows\system32\drivers\etc\hosts</strong><br>
  #<br>
  127.0.0.1       <strong>localhost</strong><br>
  ::1             localhost<br>
  127.0.0.1       <strong>dev</strong><br>
  ::1             dev<br>
  127.0.0.1       <strong>yii</strong><br>
  ::1             yii<br>
  #<br>
  127.0.0.1      <strong>web</strong><br>
  ::1            web<br>
  127.0.0.1      <strong>www</strong><br>
::1            www</p>
<p>#<strong> Z:\.sys\Apache2\conf\vhosts.conf</strong><br>
  <strong># ZWAMP does:   (subst Z: &quot;J:\zwamp\vdrive&quot;)</strong> <br>
  <strong># http://dev/</strong><br>
  &lt;VirtualHost *:80&gt;<br>
DocumentRoot &quot;J:\dev_web\htdocs&quot;<br>
ServerName dev<br>
&lt;/VirtualHost&gt;</p>
<p><strong># http://yii/</strong><br>
  &lt;VirtualHost *:80&gt;<br>
  DocumentRoot &quot;J:\dev_web\htdocs\aplyii\frontend\web&quot;<br>
  ServerName yii<br>
&lt;/VirtualHost&gt;</p>
<p># ---------------------------------<br>
  <strong># http://localhost/</strong><br>
  &lt;VirtualHost *:80&gt;<br>
  DocumentRoot &quot;J:\zwamp\vdrive\web&quot;<br>
  ServerName localhost<br>
&lt;/VirtualHost&gt;</p>
<p><strong># http://web/</strong><br>
  &lt;VirtualHost *:80&gt;<br>
  DocumentRoot &quot;J:\zwamp\vdrive\web&quot;<br>
  ServerName web<br>
&lt;/VirtualHost&gt;</p>
<p><strong># http://www/</strong><br>
  &lt;VirtualHost *:80&gt;<br>
  DocumentRoot &quot;J:\zwamp\vdrive\web&quot;<br>
  ServerName www<br>
  &lt;/VirtualHost&gt;<br>
</p>
<p><strong># J:\zwamp\vdrive\.sys\Apache2\conf\httpd.conf<br>
  # Z:\.sys\Apache2\conf\httpd.conf</strong><br>
  LoadModule alias_module modules/mod_alias.so<br>
  LoadModule authz_core_module modules/mod_authz_core.so<br>
  LoadModule authz_host_module modules/mod_authz_host.so<br>
  LoadModule autoindex_module modules/mod_autoindex.so<br>
  LoadModule deflate_module modules/mod_deflate.so<br>
  LoadModule dir_module modules/mod_dir.so<br>
  LoadModule env_module modules/mod_env.so<br>
  LoadModule expires_module modules/mod_expires.so<br>
  LoadModule filter_module modules/mod_filter.so<br>
  LoadModule headers_module modules/mod_headers.so<br>
  LoadModule log_config_module modules/mod_log_config.so<br>
  LoadModule mime_module modules/mod_mime.so<br>
  LoadModule rewrite_module modules/mod_rewrite.so<br>
  LoadModule setenvif_module modules/mod_setenvif.so<br>
  LoadModule status_module modules/mod_status.so<br>
LoadModule vhost_alias_module modules/mod_vhost_alias.so</p>
<p>ServerName localhost:80<br>
  #ServerAdmin admin@localhost<br>
  ServerAdmin slavko.srakocic@inet.hr<br>
  ServerSignature Off<br>
  Listen 80</p>
<p>AcceptFilter http none<br>
  HostnameLookups Off<br>
  ExtendedStatus Off</p>
<p>ErrorLog logs/error.log<br>
  ErrorLogFormat &quot;[%t] [%l] %7F: %E: %M&quot;<br>
  LogLevel error</p>
<p>AddHandler cgi-script .cgi .pl</p>
<p>LoadModule php5_module /.sys/php/php5apache2_4.dll<br>
  AddType application/x-httpd-php .php<br>
  PHPIniDir /.sys/php</p>
<p>&lt;Directory /&gt;<br>
  &lt;IfModule setenvif_module&gt;<br>
  SetEnvIf Request_URI &quot;^/w00tw00t&quot; BLOCK<br>
  Require env BLOCK<br>
  &lt;/IfModule&gt;<br>
  Options -Indexes +FollowSymLinks -SymLinksIfOwnerMatch<br>
  Require all granted<br>
  AllowOverride all<br>
&lt;/Directory&gt;</p>
<p>&lt;Directory &quot;j:/zwamp/vdrive/web/t1_f3fw/&quot;&gt;<br>
  Options -Indexes +FollowSymLinks -SymLinksIfOwnerMatch<br>
  # AllowOverride controls what directives may be placed in .htaccess files.<br>
  AllowOverride all<br>
  # Controls who can get stuff from this server.<br>
  Require all granted<br>
&lt;/Directory&gt;</p>
<p>&lt;Files ~ &quot;^\.ht&quot;&gt;<br>
  Require all denied<br>
  &lt;/Files&gt;<br>
</p>
<p> # http://dev/<br>
  # NE RADI http://localhost/dev/   Alias /dev J:/dev_web/htdocs<br>
  &lt;Directory J:/dev_web/htdocs/&gt;<br>
  Options All<br>
  AllowOverride All<br>
  Require all granted<br>
  &lt;/Directory&gt;<br>
  <br>
  &lt;Directory &quot;J:/dev_web/htdocs/aplyii/frontend/web/&quot;&gt;<br>
  Options All<br>
  AllowOverride All<br>
  Require all granted<br>
  &lt;/Directory&gt;<br>
  <br>
  &lt;Directory &quot;j:/zwamp/vdrive/web/&quot;&gt;<br>
  Options All<br>
  AllowOverride All<br>
  Require all granted<br>
&lt;/Directory&gt;</p>
<p> <br>
  <br>
  &lt;IfModule alias_module&gt;<br>
  #mod_alias is designed to handle simple URL manipulation tasks. For more complicated tasks such as manipulating query string, use tools provided by mod_rewrite.<br>
  #Alias /image /ftp/pub/image<br>
  #request for http://example.com/image/foo.gif would cause the server to return the file /ftp/pub/image/foo.gif.</p>
<p> # http://localhost/adminer/<br>
  Alias /adminer /.sys/adminer<br>
  &lt;Directory /.sys/adminer&gt;<br>
  Options All<br>
  AllowOverride AuthConfig<br>
  Require all granted<br>
  &lt;/Directory&gt;<br>
  # Ovo javi warninge kojih nema gore !!! :<br>
  # vidi i J:\zwamp\vdrive\alias\adminer.conf prema wamp-u<br>
  #Alias /adminer J:/zwamp/vdrive/.sys/adminer<br>
  #	&lt;Directory J:/zwamp/vdrive/.sys/adminer&gt;<br>
  #		Options All<br>
  #		AllowOverride AuthConfig<br>
  #		Require all granted<br>
#	&lt;/Directory&gt;</p>
<p> # http://localhost/phpsysinfo/<br>
  Alias /phpsysinfo /.sys/phpsysinfo<br>
  &lt;Directory /.sys/phpsysinfo&gt;<br>
  Options All<br>
  AllowOverride AuthConfig<br>
  Require all granted<br>
  &lt;/Directory&gt; <br>
  <br>
  <br>
  Alias /phpmyadmin /.sys/phpmyadmin<br>
  &lt;Directory /.sys/phpmyadmin&gt;<br>
  Options All<br>
  AllowOverride AuthConfig<br>
  Require all granted<br>
&lt;/Directory&gt;</p>
<p> Alias /apc /.sys/apc<br>
  &lt;Directory /.sys/apc&gt;<br>
  Options All<br>
  AllowOverride AuthConfig<br>
  Require all granted<br>
&lt;/Directory&gt;</p>
<p> Alias /memcache /.sys/memcache<br>
  &lt;Directory /.sys/memcache&gt;<br>
  Options All<br>
  AllowOverride AuthConfig<br>
  Require all granted<br>
&lt;/Directory&gt;</p>
<p> Alias /mongodb /.sys/mongodb<br>
  &lt;Directory /.sys/mongodb&gt;<br>
  Options All<br>
  AllowOverride AuthConfig<br>
  Require all granted<br>
&lt;/Directory&gt;</p>
<p> Alias /phpinfo /.sys/php/info.php<br>
  &lt;Directory /.sys/phpinfo&gt;<br>
  Options All<br>
  AllowOverride AuthConfig<br>
  Require all granted<br>
  &lt;/Directory&gt;<br>
&lt;/IfModule&gt;</p>
<p>&lt;IfModule deflate_module&gt;<br>
  AddEncoding x-compress Z<br>
  AddEncoding x-gzip gz tgz<br>
  DeflateCompressionLevel 9<br>
  &lt;IfModule filter_module&gt;<br>
  AddOutputFilterByType DEFLATE text/html text/plain text/xml<br>
  &lt;/IfModule&gt;<br>
  DeflateFilterNote Input instream<br>
  DeflateFilterNote Output outstream<br>
  DeflateFilterNote Ratio ratio<br>
  LogFormat '&quot;%r&quot; %{outstream}n/%{instream}n (%{ratio}n%%)' deflate<br>
  &lt;Directory /&gt;<br>
  SetOutputFilter DEFLATE<br>
  BrowserMatch ^Mozilla/4 gzip-only-text/html<br>
  BrowserMatch ^Mozilla/4\.0[678] no-gzip<br>
  BrowserMatch \bMSIE !no-gzip !gzip-only-text/html<br>
  &lt;IfModule setenvif_module&gt;<br>
  SetEnvIfNoCase Request_URI \.(?:gif|jpe?g|png)$ no-gzip dont-vary<br>
  SetEnvIfNoCase Request_URI \.(?:avi|flv|mov|mp3)$ no-gzip dont-vary<br>
  SetEnvIfNoCase Request_URI \.pdf$ no-gzip dont-vary<br>
  SetEnvIfNoCase Request_URI \.(?:exe|t?gz|zip|bz2|sit|rar|7z)$ no-gzip dont-vary<br>
  &lt;/IfModule&gt;<br>
  &lt;/Directory&gt;<br>
&lt;/IfModule&gt;</p>
<p>&lt;IfModule dir_module&gt;<br>
  DirectoryIndex index.php index.pl index.html index.htm<br>
&lt;/IfModule&gt;</p>
<p>&lt;IfModule log_config_module&gt;<br>
  LogFormat &quot;%h %l %u %t \&quot;%r\&quot; %&gt;s %b \&quot;%{Referer}i\&quot; \&quot;%{User-Agent}i\&quot;&quot; combined<br>
  LogFormat &quot;%v %h %l %u %t \&quot;%r\&quot; %&gt;s %b&quot; common<br>
  &lt;IfModule setenvif_module&gt;<br>
  # Don't log requests from loopback interface<br>
  SetEnvIf Remote_Addr &quot;127\.0\.0\.1&quot; DONTLOG<br>
  CustomLog logs/access.log common env=!DONTLOG<br>
  &lt;/IfModule&gt;<br>
  &lt;IfModule !setenvif_module&gt;<br>
  CustomLog logs/access.log common<br>
  &lt;/IfModule&gt;<br>
&lt;/IfModule&gt;</p>
<p>&lt;IfModule mime_module&gt;<br>
  TypesConfig conf/mime.types<br>
  AddType application/x-compress .Z<br>
  AddType application/x-gzip .gz .tgz<br>
&lt;/IfModule&gt;</p>
<p>&lt;IfModule ssl_module&gt;<br>
  SSLRandomSeed startup builtin<br>
  SSLRandomSeed connect builtin<br>
&lt;/IfModule&gt;</p>
<p>&lt;IfModule vhost_alias_module&gt;<br>
  Include conf/vhosts.conf<br>
  &lt;/IfModule&gt;<br>
</p>

<?php
    //$pghdr
    //$pgbody
echo <<< EOPG
    $pgbody_mongodb
EOPG;
?>

</body>
</html>
