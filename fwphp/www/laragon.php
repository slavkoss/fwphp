<!DOCTYPE html><html lang="hr">
    <head>
    
       <title>laragon.txt</title>
    
       <title>HTMLofMKD</title>

       <link rel="stylesheet" href="/zinc/themes/mini3.css">
       <!--link rel="stylesheet" href="/vendor/highlight_js/styles/default.c ss"-->
       <!--Ugly, no lines in tbls -->
       <!--script src="/vendor/highlight_js/highlight.pack.js"></script-->
  <style>
      /*
      html, body {
          height: 100%;
      }

      body {
          margin: 10%;
          padding: 2%;
          width: 100%;
          display: table;
          font-weight: 100;
          font-family: 'Karla';
      }

      .container {
          text-align: left;
          display: table-cell;
          vertical-align: middle;
      }

      .content {
          text-align: left;
          display: inline-block;
      }

      .container_center {
          text-align: center;
          display: table-cell;
          vertical-align: middle;
      }

      .content_center {
          text-align: center;
          display: inline-block;
      }

      .title {
          font-size: 96px;
      }

      .opt {
          margin-top: 30px;
      }

      .opt a {
        text-decoration: none;
        font-size: 150%;
      }
      
      a:hover {
        color: red;
      }
      */
  .auto-style1 {
	margin-left: 80px;
}
  </style>

       <script>
          /*
          document.addEventListener('DOMContentLoaded', (event) => {
            document.querySelectorAll('pre code').forEach((block) => {
              hljs.highlightBlock(block);
            });
          });
          */
       </script>


          </head> 
          
<body style="margin: 1em; padding: 30px 10% 50px 10%; 
   font-size: 1.2em; font-family: Corbel, Arial, Helvetica, sans-serif ;
">

  <div class="container_center">
    <div class="content_center">

      <div class="title" title="Laragon">
		  <h1>Laragon portable info</h1>
		  <p><strong>laragon.7z</strong>, 19 MB - PHP 5.4, MySQL 5.1 - easy to 
		  add newer tools - see below.</p>
		</div>

      <div class="info">PHP version: <?php print phpversion(); ?>

        <span><a title="phpinfo()" href="../glomodul/z_examples/00_index_of_important.php">info</a></span><br />

        Document Root: <?php print ($_SERVER['DOCUMENT_ROOT']); ?><br />
      </div>

      <div class="opt">
        <div><a title="Getting Started" href="http://laragon.org/?q=getting-started">Getting Started</a><br></div>
      </div>

    </div>




  <div class="container">
    <div class="content">
		<html lang="hr">

		<head>


          </head>

		<body>
          <h2>1. WAMP Server for Local WordPress - Laragon</h2>
<p><a href="https://laragon.org/docs/index.html">https://laragon.org/docs/index.html</a></p>
<p><a href="https://forum.laragon.org/category/5/tutorials">https://forum.laragon.org/category/5/tutorials</a> <strong>- Add newer PHP... XDebug, PostgreSQL, Python, ruby, Rails, Golang</strong></p>
<p>Also <a href="https://github.com/denoland/deno/">https://github.com/denoland/deno/</a> - provide a productive and secure scripting environment for  modern programmer. It is built on top of V8, Rust, and TypeScript.</p>
<p><a href="https://www.webtng.com/best-wamp-server-for-local-wordpress-laragon-is-easy/">https://www.webtng.com/best-wamp-server-for-local-wordpress-laragon-is-easy/</a></p>
<p><a href="https://getwebassist.com/laragon-local-development/">https://getwebassist.com/laragon-local-development/</a></p>
<p><a href="https://laragon.org/download/">https://laragon.org/download/</a> </p>
<p>Can Install WordPress using Laragon's &quot;quick create&quot; feature.</p>
<p>&nbsp;</p>
		  <p><strong>2.1 Add another PHP version</strong> :</p>
<ol class="auto-style1">
<li><a href="https://windows.php.net/downloads/releases/">https://windows.php.net/downloads/releases/</a>    eg  <strong>php-7.4.10-nts-Win32-vc15-x64.zip, 
26 MB</strong><br />
or  &quot;archives&quot; subfolder (ie <a href="https://windows.php.net/downloads/releases/archive">https://windows.php.net/downloads/releases/archive</a> )</li>
<li>Extract downloaded to: {LARAGON_ROOT}\bin\php\<strong>php-7.4.10-nts-Win32-vc15-x64</strong></li>
<li>Select new version at: Laragon Menu &gt;PHP&gt; Version &gt; php-7.4.0-Win32-vc15-x64</li>
</ol>
<p>If something's wrong, check and install correspond VC Redist (VC11, VC14, VC15...).</p>
<ol>
<li>x64 means 64-bit</li>
<li>xx86 means 32-bit</li>
<li><strong>nts means Non Thread Safe</strong> - if using Nginx instead of a multi-threaded Apache, use <strong>more efficient nts version <a href="https://stackoverflow.com/questions/1623914/what-is-thread-safe-or-non-thread-safe-in-php">https://stackoverflow.com/questions/1623914/what-is-thread-safe-or-non-thread-safe-in-php</a> .</strong></li>
</ol>
<h3>&nbsp;</h3>
		  <h3>2.2 Add another Apache version</h3>
<ol>
<li><a href="https://www.apachelounge.com/download/VC14/binaries/">https://www.apachelounge.com/download/VC14/binaries/</a>   
<br>eg <strong>httpd-2.4.46-win64-VC15.zip, 10MB </strong></li>
<li>Extract downloaded to: {LARAGON_ROOT}\bin\apache\httpd-2.4.46-win64-VC15.zip</li>
<li>Select new version at: Laragon Menu &gt; Apache &gt; Version 
&gt;httpd-2.4.46-win64-VC15.zip</li>
</ol>
<h3>&nbsp;</h3>
		  <h3>2.3 Add another Nginx version - NOT WORKING (lot of &quot;Bad Gateway&quot; errors, 
		  then stopped)</h3>
<p>Nginx port change : Menu -&gt; Nginx -&gt; Sites enabled -&gt; 00-default.conf</p>
<ol>
<li><a href="http://nginx.org/download/">http://nginx.org/download/</a>   eg <strong>nginx-1.19.2.zip, 
1.7 MB !!</strong></li>
<li>Extract downloaded to: {LARAGON_ROOT}\bin\nginx\<strong>nginx-1.19.2</strong></li>
<li>Select the new version at: Laragon Menu &gt; Nginx &gt; Version &gt; nginx-1.19.2</li>
</ol>
<h3>&nbsp;</h3>
		  <h3>2.4 Add another MariaDB&nbsp; or MySQL version</h3>
<ol>
<li>
<p><a href="https://dev.mysql.com/get/Downloads/">https://dev.mysql.com/get/Downloads/</a>   MySQL-5.7/mysql-5.7.18-winx64.zip<br />
Extract the downloaded to: {LARAGON_ROOT}\bin\mysql\mysql-5.7.18-winx64  </p>
<p>See below Note for MariaDB - <strong>I use it</strong> :<br />
<a href="https://downloads.mariadb.org/mariadb/">https://downloads.mariadb.org/mariadb/</a>  eg <strong>mariadb-10.5.5-winx64.zip, 
70 MB</strong>  </p>
<p>Select new version at: Laragon Menu &gt; MySQL &gt; Version &gt; mysql-5.7.18-winx64  </p>
<p>Note: If you use MariaDB, extract it to: {LARAGON_ROOT}\bin\mysql\<strong>mariadb-10.5.5-winx64</strong>  Laragon will automatically create correspond DataDir for MariaDB on 
<strong>data/mariadb</strong></p>
</li>
</ol>
<h3>&nbsp;</h3>
		  <h3>2.5 Add phpMyAdmin 01_phpMyAdmin-4.9.5-english.zip&nbsp; 6.3 MB</h3>
<p><a href="https://www.phpmyadmin.net/downloads">https://www.phpmyadmin.net/downloads</a>  and extract to {LARAGON_DIR}\etc\apps\phpMyAdmin.<br />
SHA256 hash matches<br />
cf1adc96dcdc46360a90f10df98fefb3bfd9e5a243b52645021dc590682cffb3</p>
<p>Acess phpMyAdmin at: <a href="http://localhost:8083/phpmyadmin">http://localhost:8083/phpmyadmin</a></p>
		  <p>&nbsp;</p>
<h2>3. Install PHP's Oracle OCI8 extension (works with both Apache &amp; Nginx)</h2>
<ol>
<li>
Download OCI8 extension to access Oracle DB <strong>php_oci8-2.2.0-7.4-nts-vc15-x64.zip</strong> from 
<a href="https://pecl.php.net/package/oci8/2.2.0/windows" target="_blank">https://pecl.php.net/package/oci8/2.2.0/windows</a> . Use 'pecl install oci8' to install for PHP 7. I only unzip
<strong>php_oci8_12c.dll</strong> <strong>147456 B</strong>, 2019.12.04 in  :
<code><br>J:\awww\bin\php\php-7.4.10-nts-Win32-vc15-x64\ext</code> on dev site, or in<br />
<code>J:\ylaragon\bin\php\php-7.4.10-nts-Win32-vc15-x64\ext</code> on test site.<br>
</li>
	<li>
&nbsp;Download Oracle Instant Client <strong>
	instantclient-basic-windows.x64-19.8.0.0.0dbru.zip</strong> file:<br />
<a href="http://www.oracle.com/technetwork/topics/winx64soft-089540.html">http://www.oracle.com/technetwork/topics/winx64soft-089540.html</a> Note: You must accept &quot;Accept License Agreement&quot; and &quot;create an account (Free)&quot;  
	<br>
</li>
<li>
<p>Extract downloaded zip files to <strong>PHP dir</strong>  (Menu &gt; PHP &gt; Version &gt; dir:php-xxx-xxx)<br />
<code>J:\awww\bin\php\php-7.4.10-nts-Win32-vc15-x64</code></p>
</li>
<li>
<p>Enable: click <code>Menu &gt; PHP &gt; Extensions &gt; php_oci8_12c.dll</code></p>
</li>
<li>
<p>Restart Apache. You should see Oracle OCI information on phpinfo().</p>
</li>
</ol>
<h3>&nbsp;</h3>
		  <h3>Instant Client Installation for Microsoft Windows 64-bit</h3>
<p>See the <a href="https://www.oracle.com/database/technologies/instant-client.html">Instant Client Home Page</a> for more information about Instant Client packages. Client-server version interoperability is detailed in <a href="https://support.oracle.com/epmos/faces/DocumentDisplay?id=207303.1">Doc ID 207303.1</a>.</p>
<p>For example, Oracle Call Interface 19, 18 and 12.2 can connect to Oracle Database 11.2 or later. Some tools may have other restrictions.</p>
<ol>
<li>Download the appropriate Instant Client packages for your platform - Basic or Basic Light</li>
<li>Unzip packages dir. eg <code>C:\oracle\instantclient_19_3</code></li>
<li><strong>Add this dir to PATH</strong> environment variable. If you have multiple versions of Oracle libraries installed, make sure the new directory occurs <strong>first in the path</strong>. Restart any terminal windows or otherwise make sure the new PATH is used by your applications.</li>
<li>Download and install correct Visual Studio Redistributable from Microsoft. Instant Client 19 requires the <a href="https://support.microsoft.com/en-us/help/2977003/the-latest-supported-visual-c-downloads"><strong>Visual Studio 2017 redistributable</strong></a>. Instant Client 18 and 12.2 require the <a href="https://support.microsoft.com/en-us/help/2977003/the-latest-supported-visual-c-downloads">Visual Studio 2013 redistributable</a>. Instant Client 12.1 requires the <a href="https://support.microsoft.com/en-us/help/2977003/the-latest-supported-visual-c-downloads">Visual Studio 2010 redistributable</a>.</li>
<li>
<p>If you intend to co-locate optional Oracle configuration files such as <strong>tnsnames.ora, sqlnet.ora, ldap.ora, or oraaccess.xml</strong> with Instant Client, then create a subdirectory such as<br />
<code>C:\oracle\instantclient_19_3\network\admin</code><br />
This is default Oracle client configuration dir for apps linked with this Instant Client.  </p>
<p>Alternatively, Oracle client configuration files can be put in another, accessible directory. Then set the environment variable TNS_ADMIN to that directory name.</p>
</li>
<li>Start your application.</li>
</ol>
<p>ODBC users should follow the <a href="https://www.oracle.com/database/technologies/releasenote-odbc-ic.html">ODBC Installation Instructions</a>.</p>
<p>2020.01.16 To get this working with latest Laragon &amp; PHP I had to download <strong>instant client version 12</strong> and <strong>place DLLs in Laragon root folder (alongside laragon.exe)</strong>. Placing them in php dir or Apache bin dir did not work.</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
<h2>4. Virtual host</h2>
		  <p><strong>See Menu -&gt; www -&gt; Switch document root - any dir on PC may 
		  contain PHP, HTML... scripts which can be executed.</strong></p>
<ol>
<li>
<p>Menu -&gt; Preferences -&gt; General tab - you can change your projects directory and you can set domain for virtual host name eg: {project_name}.me. By the default host name is <code>http://project_name.dev</code>.</p>
</li>
<li>
<p>When you create<strong> new folder in Document Root</strong> folder of laragon, <strong>laragon automatically creates virtual host</strong>. if you want see the project with virtual host<br />
click <strong>&quot;Menu&quot; button -&gt; select www</strong>, now you can see your project with virtual hostname. <strong>click hostname </strong>to navigate in the browser.</p>
</li>
</ol>
<h2>&nbsp;</h2>
		  <p>&nbsp;</p>
<h2>5. mod_php Apache module or <strong>CGI/FastCGI or FastCGI/PHP-FPM</strong></h2>
		  <p>A Thread Safe version should be used if you want to install PHP as an Apache module where worker is the MPM.<br />
For multithreaded webservers, such as <strong>IIS5 and IIS6, you should use threaded version of PHP</strong>.  
		  </p>
<p>IMAP (Win/Unix) Library is not thread safe - not recommended for use in a multi-threaded environment.  </p>
		  <p>Apache MPM prefork with modphp is used because it is <strong>easy to configure/install</strong>. Performance-wise it is fairly inefficient. 
My Server API is most frequent <strong>CGI/FastCGI</strong>. Preferred way to do the stack is eg <strong>FastCGI/PHP-FPM</strong>. That way you can use much faster MPM Worker. The whole PHP remains non-threaded, but Apache serves threaded (like it should).</p>
<p>Apache HTTP web server supports multiple <strong>models for handling requests</strong>, one of which called <strong>worker MPM uses threads</strong>. But it supports another <strong>concurrency model called prefork MPM uses processes</strong> - that is, web server will create/dedicate a single process for each request.</p>
<p>There are multiple ways to <strong>chain the web server with PHP</strong>. For Apache HTTP Server, the most popular is <strong>&quot;mod_php&quot; module</strong> - actually PHP itself, but compiled as a module for web server, and so <strong>PHP gets loaded right inside it</strong> .  </p>
<p>Since with mod_php, PHP gets loaded right into Apache, if Apache is going to handle concurrency using its <em>Worker MPM (that is, using Threads) then PHP must be able to operate within this same multi-threaded environment</em> - meaning, <strong>PHP has to be thread-safe</strong> to be able to play ball correctly with Apache!  </p>
<p>At this point, you should be thinking &quot;OK, so if I'm using a multi-threaded web server and I'm going to embed PHP right into it, then I must use the thread-safe version of PHP&quot;. And this would be correct thinking. However, as it happens, <strong>PHP's thread-safety is highly disputed (diskutabilan)</strong>. It's a use-if-you-really-really-know-what-you-are-doing ground.  </p>
<p>Advice would be to not use PHP in a multi-threaded environment if you have the choice!  </p>
<p>Speaking only of <strong>Unix-based environments</strong>, I'd say that fortunately, you only have to think of this if you are going to use PHP with Apache web server, in which case you are advised to go with the <strong>prefork MPM of Apache (which doesn't use threads, and therefore, PHP thread-safety doesn't matter)</strong> and all GNU/Linux distributions that I know of will take that decision for you when you are installing Apache + PHP through their package system, without even prompting you for a choice. If you are going to use other webservers such as <strong>nginx or lighttpd, you won't have the option to embed PHP into them anyway</strong>. You will be looking at using <strong>FastCGI or something equal</strong> which works in a different model where <strong>PHP is totally outside of the server with multiple PHP processes used for answering requests through e.g. FastCGI</strong>. For such cases, <strong>thread-safety also doesn't matter</strong>. To see which version your website is using put a file containing &lt;?php phpinfo(); ?&gt; on your site and look for the Server API entry. This could say something like CGI/FastCGI or Apache 2.0 Handler.  </p>
<p>If you also look at command-line version of PHP - thread safety does not matter.  </p>
<p>Non thread safe version is faster and/or less buggy, or otherwise they would have just offered thread safe version and not bothered to give us choice!</p>
<p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <h2>6. NO NEED : How to enable a manually created virtual host</h2>
		  <p><strong>See Menu -&gt; www -&gt; Switch document root - any dir on PC may 
		  contain PHP, HTML... scripts which can be executed.</strong></p>
<p>create a Virtual Host file without &quot;auto.&quot; prefix, Laragon will respect any changes in the file.</p>
<p>Assume you have a project name: dev1 (or myproj) You can create a file name<br />
<strong>etc/apache2/sites-enabled/dev1.conf</strong> with content like this:</p>
<pre><code>&lt;VirtualHost \*:8083&gt; 
  DocumentRoot "J:/awww/www/"
    ServerName dev1
    ServerAlias \*.dev1.dev
    &lt;Directory "J:/awww/www/"&gt;
       AllowOverride All
       Require all granted
    &lt;/Directory&gt;
&lt;/VirtualHost&gt;</code></pre>
<p>Note: You need to put dev1 and dev1.dev entry to your hosts file. The quickest way is let Laragon auto-create Virtual Hosts for you (not convinient for B12phpfw ?), then you just remove the &quot;auto.&quot; prefix from the Virtual Host file.</p>
<h3>&nbsp;</h3>
		  <h3>&nbsp;I do not use this : apvh.bat to create AP(ache) V(irtual) H(ost) using command line for Laragon</h3>
<p><a href="https://github.com/bantya/CmdVirtualHost">https://github.com/bantya/CmdVirtualHost</a></p>
<p>Change the SSL files directory on line 9 according to yours. i.e. set SSL_PATH=F:/laragon/etc/ssl/ -&gt; set SSL_PATH=Your/Laragon/installation/path/etc/ssl/</p>
<p>Open the Terminal and cd into the directory where all your virtual hosts are stored. (for me: <strong>J:\ylaragon\etc\apache2\sites-enabled</strong>)  </p>
<p>apvh {sitename} {directory} {ssl}  </p>
<p>? Where:<br />
sitename: Sitename containing .domain name.<br />
directory: <strong>full absolute path</strong> to the site directory - must not contain trailing slahes (\ or /).<br />
ssl: Use ssl to have the virtual host for SSL else empty.  </p>
<p>?? Remember:<br />
This script assumes that you have <strong>added virtual host entry to<br />
C:\Windows\System32\drivers\etc\hosts</strong> file and in alt_names section in the openssl template file (for me: in J:\ylaragon\bin\laragon\tpl\openssl.conf.tpl, not in J:\ylaragon\usr\tpl\openssl.conf.tpl)  </p>
<p>?? Acronyms:<br />
apvh === Apache virtual host.<br />
India == Indians never delay in anything.</p>
		  <pre>@echo off

:: Author https://github.com/bantya
:: Manually create apache virtual hosts file for Laragon

set SITE\_NAME=%1
set SITE\_PATH=%2
set WANT\_SSL=%3
set SSL\_PATH=F:/laragon/etc/ssl/

if &quot;%SITE\_PATH:~-1,1%&quot; neq &quot;/&quot; (
set SITE\_PATH=%SITE\_PATH:\\=/%/
)

if &quot;%WANT\_SSL%&quot; == &quot;&quot; (
echo.
(
echo.^&lt;VirtualHost \*:80^&gt;
echo. DocumentRoot &quot;%SITE\_PATH%&quot;
echo. ServerName %SITE\_NAME%
echo. ServerAlias \*.%SITE\_NAME%
echo. ^&lt;Directory &quot;%SITE\_PATH%&quot;^&gt;
echo. AllowOverride All
echo. Require all granted
echo. ^&lt;/Directory^&gt;
echo.^&lt;/VirtualHost^&gt;
) ^&gt; %SITE\_NAME%.conf
)

if &quot;%WANT\_SSL%&quot; == &quot;ssl&quot; (
echo.
(
echo.define ROOT &quot;%SITE\_PATH%&quot;
echo.define SITE &quot;%SITE\_NAME%&quot;
echo.
echo.^&lt;VirtualHost \*:80^&gt;
echo. DocumentRoot &quot;${ROOT}&quot;
echo. ServerName ${SITE}
echo. ServerAlias \*.${SITE}
echo. ^&lt;Directory &quot;${ROOT}&quot;^&gt;
echo. AllowOverride All
echo. Require all granted
echo. ^&lt;/Directory^&gt;
echo.^&lt;/VirtualHost^&gt;
echo.
echo.^&lt;VirtualHost \*:443^&gt;
echo. DocumentRoot &quot;${ROOT}&quot;
echo. ServerName ${SITE}
echo. ServerAlias \*.${SITE}
echo. ^&lt;Directory &quot;${ROOT}&quot;^&gt;
echo. AllowOverride All
echo. Require all granted
echo. ^&lt;/Directory^&gt;
echo.
echo. SSLEngine on
echo. SSLCertificateFile %SSL\_PATH%%SITE\_NAME%.crt
echo. SSLCertificateKeyFile %SSL\_PATH%%SITE\_NAME%.key
echo.^&lt;/VirtualHost^&gt;
) ^&gt; %SITE\_NAME%.conf
)

echo.Your Apache virtual-host file %SITE\_NAME%.conf is created.
pause
start .

nts and nsp&gt;</pre>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <h2>7.
PHP's interactive console  </h2>
		  <p>
		  <a href="https://www.sitepoint.com/interactive-php-debugging-psysh/">https://www.sitepoint.com/interactive-php-debugging-psysh/</a><br />
		  </p>
<pre><code>php -a
Interactive shell

php &gt; $a = 'Hello world!';
php &gt; echo $a;
Hello world!
php &gt;</code></pre>
<p>Interactive shell is not a <strong>REPL</strong> (Read-Eval-Print Loop) since it lacks the print - seen $a immediately after assigning it.</p>
<p><a href="http://psysh.org/manual/en/php_manual.sqlite">http://psysh.org/manual/en/php_manual.sqlite</a>  for Psysh see <a href="https://github.com/bobthecow/psysh/wiki/PHP-manual">https://github.com/bobthecow/psysh/wiki/PHP-manual</a></p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p>&nbsp;</p>
		  <p><br /></p>
<hr />
<pre><code>C:\WINDOWS\system32&gt;path
PATH=
J:\app\ss\product\18.0.0\dbhomeXE\bin;
J:\app\ss\product\11.2.0\dbhome_1\bin;
C:\Program Files (x86)\Common Files\Oracle\Java\javapath;
C:\Python27\;
C:\Python27\Scripts;
C:\orant\bin;
C:\WINDOWS\system32;
C:\WINDOWS;
C:\WINDOWS\System32\Wbem;
C:\WINDOWS\System32\WindowsPowerShell\v1.0\;
C:\WINDOWS\System32\OpenSSH\;

J:\xampp\php;  NOT GOOD

C:\ProgramData\ComposerSetup\bin;
C:\orant\jdk\bin;
C:\Program Files\dotnet\;
C:\Program Files\Microsoft SQL Server\130\Tools\Binn\;
C:\Program Files\Microsoft SQL Server\Client SDK\ODBC\170\Tools\Binn\;
C:\Program Files\nodejs\;
C:\ProgramData\chocolatey\bin;
C:\Program Files (x86)\Microsoft SQL Server\150\DTS\Binn\;
C:\Program Files (x86)\Microsoft SQL Server\150\Tools\Binn\;
C:\Program Files\Microsoft SQL Server\150\Tools\Binn\;
C:\Program Files\Microsoft SQL Server\150\DTS\Binn\;
C:\Program Files (x86)\Common Files\Acronis\VirtualFile\;
C:\Program Files (x86)\Common Files\Acronis\VirtualFile64\;
C:\Program Files (x86)\Common Files\Acronis\FileProtector\;
C:\Program Files (x86)\Common Files\Acronis\FileProtector64\;
C:\Program Files (x86)\Common Files\Acronis\SnapAPI\;
C:\Users\ss\AppData\Local\Microsoft\WindowsApps;
C:\Users\ss\AppData\Roaming\Composer\vendor\bin;
C:\Users\ss\AppData\Roaming\npm;
C:\Users\ss\.dotnet\tools;C:\Users\ss\AppData\Local\Microsoft\WindowsApps;C:\Users\ss\.dotnet\tools

composer require psy/psysh:@stable
on Windows J:\awww\www&gt;.\vendor\bin\psysh        on Linux ./vendor/bin/psysh
                    or : 
                    git clone https://github.com/bobthecow/psysh.git
                    cd psysh
                    composer install
                    ./bin/psysh
                    or:
                    wget https://psysh.org/psysh
                    chmod +x psysh
                    ./psysh</code></pre>
<p><a href="https://forum.laragon.org/topic/877/tutorial-how-to-install-magento-with-laragon">https://forum.laragon.org/topic/877/tutorial-how-to-install-magento-with-laragon</a></p>
<p><a href="https://forum.laragon.org/topic/241/tutorial-how-to-add-your-favourite-editor-to-laragon-and-the-windows-right-click-menu">https://forum.laragon.org/topic/241/tutorial-how-to-add-your-favourite-editor-to-laragon-and-the-windows-right-click-menu</a></p>
<p><a href="https://forum.laragon.org/topic/1073/tutorial-how-to-auto-change-apache-version-after-changing-php-version">https://forum.laragon.org/topic/1073/tutorial-how-to-auto-change-apache-version-after-changing-php-version</a></p>
<p><a href="https://forum.laragon.org/topic/1384/how-i-can-acces-to-phpmyadmin-from-other-pc-in-my-local-red">https://forum.laragon.org/topic/1384/how-i-can-acces-to-phpmyadmin-from-other-pc-in-my-local-red</a></p>
<p><a href="https://forum.laragon.org/topic/1306/access-denied-how-to-manage-quick-apps">https://forum.laragon.org/topic/1306/access-denied-how-to-manage-quick-apps</a></p>
<p><a href="https://forum.laragon.org/topic/1117/tutorial-using-global-php-ini">https://forum.laragon.org/topic/1117/tutorial-using-global-php-ini</a></p>
<p>[<a href="https://forum.laragon.org/topic/817/how-to-access-the-localhost-in-remote-computer-through-lan-network">https://forum.laragon.org/topic/817/how-to-access-the-localhost-in-remote-computer-through-lan-network</a>]<br />
(<a href="https://forum.laragon.org/topic/817/how-to-access-the-localhost-in-remote-computer-through-lan-network">https://forum.laragon.org/topic/817/how-to-access-the-localhost-in-remote-computer-through-lan-network</a>)  </p>
<p><strong>For MS Expression web :</strong></p>
<pre><code>&lt;body style="margin: 1em; padding: 30px 10% 50px 10%; 
font-size: 1.2em; font-family: Corbel, Arial, Helvetica, sans-serif ;
"&gt;</code></pre>




    </div>
  </div>

  </div>




</body>
</html>