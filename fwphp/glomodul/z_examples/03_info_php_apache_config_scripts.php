<?php
?>
<!DOCTYPE HTML>
<html lang="hr-HR">
  <head><title>00info_php2</title>
  <meta charset="utf-8">
  <!--link rel="shortcut icon" href="Other/Help/images/favicon.ico"-->
  <link type="text/css" rel="stylesheet" media="all" href="/zinc/themes/simplest.css" />
  <!--link type="text/css" rel="stylesheet" media="all" href="Other/Help/style.css" /-->
  <style>

  </style>
  <!--script src="utl_inc.js"></script-->
  </head>


  <body>
  <!--div class="logo">
    <h3><span style="color: lightgray;">00info_php2</span>&nbsp;</h3>


  </div-->
  <!-- E N D  11111 div class="logo"  width="211" height="47"  -->

  <div class="content">
    <!--img src="/zinc/img/header.jpg" width="100%"-->






    <!--      1. T O P  DROPDOWN  M E N U  (row 1) (Banner)         -->
      <!-- submenu -->
          <!-- submenu items-->
                                      <!-- dd class="dd2"   a class="sub"-->
    <div id="positioner">

      <div class="holder p1">
        <dl class="menu">
          <dt><a href="index.php">HOME</a></dt>
        </dl>
      </div>

      <div class="holder p2">
        <dl class="menu">

          <dt><a href="#url">conf</a></dt>

          <dd>
            <a href="#httpdconf">httpd.conf</a>
            <a href="#phpini">php.ini</a>
          </dd>

        </dl>
      </div>

      <div class="holder p3">
        <dl class="menu">
          <dt><a class="sub" href="#virtualhost">virtual host</a></dt>
        </dl>
      </div>


      <div class="holder p4">
        <dl class="menu">
          <dt><a class="sub" href="#hosts">hosts</a></dt>
        </dl>
      </div>


    </div>




    <!--              1. izbornik 2.redak (Banner)                -->
    <div id="hMenu">
      <ul>
        <li id="frst"> 
          <a href="">POČETAK</a>

      <a href="https://www.apachefriends.org/download.html" target="_blank">XAMP</a>(<a href="http://www.wampserver.com/en/" target="_blank">WAMP</a>
      <a href="https://windows.php.net/" 
         title="Better all downloads from XAMP site !" 
        target="_blank">PHP for Windows</a><a href="https://www.apachelounge.com/" title="Better all downloads from WAMP site !" 
        target="_blank">Apache lounge</a>) 
      <a href="https://letsencrypt.org/"
    title="    Free, automated, open Certificate Authority.. As of Juny 2018, Let’s Encrypt root, ISRG Root X1, is directly trusted by Microsoft products and by all major root programs, including Microsoft, Google, Apple, Mozilla, Oracle, and Blackberry.
    Non SSL links can be transparently redirected to the SSL locations."
    target="_blank">Let's Encrypt</a>

          <a href="#">O PROGRAMU</a>
          <a href="#">KONTAKT</a>

        </li>
      </ul>
    </div>
    <!--                    E N D  T O P  (row 1,2)               --> 







    <!--           C O N T E N T             -->
    <?php
      //require_once(__DIR__ . '/00info_php2_content.php');
    ?>










<br />
<a id="virtualhost"></a>
<h2>Verify virtual host config - VIRTUAL HOSTS AND hosts SCRIPT&nbsp; <strong>httpd.exe -S</strong><br>
</h2>
 	 SyMenu Cmder Windows CLI (for git, psysh...) :   eg in 
	  J:\aplp\aplp\0_symenu\ProgramFiles\SPSSuite\SyMenuSuite\Cmder_sps<br>
	  j:<br>J:\&gt; cd J:\awww\www<br><strong>displays :</strong><br>J:\awww\www 
	  (master -&gt; origin)<h2><strong>J:\xampp\apache\bin\httpd.exe -S</strong></h2>
	  <p><strong>displays :</strong><br></p>
	  <pre>VirtualHost configuration:
*:8083 is a NameVirtualHost
default server localhost (J:/xampp/apache/conf/extra/httpd-vhosts.conf:56)
port 8083 namevhost localhost (J:/xampp/apache/conf/extra/httpd-vhosts.conf:56)
<strong>port 8083 namevhost dev1 (J:/xampp/apache/conf/extra/httpd-vhosts.conf:70)</strong>
*:443 dev1 (J:/xampp/apache/conf/extra/httpd-ssl.conf:121)
ServerRoot: &quot;J:/xampp/apache&quot;
Main DocumentRoot: &quot;J:/xampp/htdocs&quot;
Main ErrorLog: &quot;J:/xampp/apache/logs/error.log&quot;
Mutex ssl-stapling: using_defaults
Mutex proxy: using_defaults
Mutex ssl-cache: using_defaults
Mutex default: dir=&quot;J:/xampp/apache/logs/&quot; mechanism=default
Mutex ssl-stapling-refresh: using_defaults
Mutex rewrite-map: using_defaults
PidFile: &quot;J:/xampp/apache/logs/httpd.pid&quot;
Define: DUMP_VHOSTS
Define: DUMP_RUN_CFG
Define: SRVROOT=/xampp/apache</pre>
 <p>&nbsp;</p>
	  <h2>Info about Apache server&nbsp; &nbsp; <strong>
	  J:\xampp\apache\bin\httpd.exe -V</strong></h2>
	  <p><strong>displays :</strong><br>
 </p>
 <pre>Server version: Apache/2.4.38 (Win64)
Apache Lounge VC15 Server built: Feb 28 2019 11:40:54
Server's Module Magic Number: 20120211:83
Server loaded: APR 1.6.5, APR-UTIL 1.6.1
Compiled using: APR 1.6.5, APR-UTIL 1.6.1
Architecture: 64-bit
Server MPM: WinNT
threaded: yes (fixed thread count)
forked: no
Server compiled with....
-D APR_HAS_SENDFILE
-D APR_HAS_MMAP
-D APR_HAVE_IPV6 (IPv4-mapped addresses disabled)
-D APR_HAS_OTHER_CHILD
-D AP_HAVE_RELIABLE_PIPED_LOGS
-D DYNAMIC_MODULE_LIMIT=256
-D HTTPD_ROOT=&quot;/apache&quot;
-D SUEXEC_BIN=&quot;/apache/bin/suexec&quot;
-D DEFAULT_PIDLOG=&quot;logs/httpd.pid&quot;
-D DEFAULT_SCOREBOARD=&quot;logs/apache_runtime_status&quot;
-D DEFAULT_ERRORLOG=&quot;logs/error.log&quot;
-D AP_TYPES_CONFIG_FILE=&quot;conf/mime.types&quot;
<strong>-D SERVER_CONFIG_FILE=&quot;conf/httpd.conf&quot;</strong></pre>
 <p>&nbsp;<br></p>
 <h2><strong><br>
 </strong><a id="hosts"></a>hosts script&nbsp;&nbsp; 
 C:\Windows\System32\drivers\etc\hosts</h2>
 <pre># localhost name resolution is handled within DNS itself.
127.0.0.1 localhost dev1
::1 localhost dev1

Coul be also :<br>#<br>127.0.0.1 phpmyadmin.localhost<br>## Local by Flywheel - Start ##<br>192.168.95.100 phporacle.local<br>192.168.95.100 www.phporacle.local<br>192.168.95.100 afwww.local<br>192.168.95.100 www.afwww.local<br>192.168.95.100 fwphp.local<br>192.168.95.100 www.fwphp.local<br>## Local by Flywheel - End ##<br>#<br># help should be better :<br>#192.168.10.10 dev1.ap homestead.app<br>#<br># Start of entries inserted by Spybot - Search &amp; Destroy<br># This list is Copyright 2000-2017 Safer-Networking Ltd.<br># NOT RECOMENDED HUGE LIST HERE<br># End of entries inserted by Spybot - Search &amp; Destroy</pre>
 <p>&nbsp;</p>
 <h2>Virtual hosts script <strong>&nbsp; 
 J:/xampp/apache/conf/extra/httpd-vhosts.conf</strong></h2>
 <pre>&lt;VirtualHost *:8083&gt;
   DocumentRoot &quot;/xampp/htdocs/&quot;
   ServerName localhost
&lt;/VirtualHost&gt;
&lt;VirtualHost *:8083&gt;
   DocumentRoot &quot;J:/awww/www/&quot;
   ServerName dev1
&lt;/VirtualHost&gt;</pre>
 <p>&nbsp;</p>
 <a id="httpdconf"></a><h2>&nbsp;J:\xampp\apache\conf\httpd.conf</h2>
 <pre>Define SRVROOT &quot;/xampp/apache&quot;
ServerRoot &quot;/xampp/apache&quot;
Listen 8083

LoadModule access_compat_module modules/mod_access_compat.so
LoadModule actions_module modules/mod_actions.so
LoadModule alias_module modules/mod_alias.so
LoadModule allowmethods_module modules/mod_allowmethods.so
LoadModule asis_module modules/mod_asis.so
LoadModule auth_basic_module modules/mod_auth_basic.so
LoadModule authn_core_module modules/mod_authn_core.so
LoadModule authn_file_module modules/mod_authn_file.so
LoadModule authz_core_module modules/mod_authz_core.so
LoadModule authz_groupfile_module modules/mod_authz_groupfile.so
LoadModule authz_host_module modules/mod_authz_host.so
LoadModule authz_user_module modules/mod_authz_user.so
LoadModule autoindex_module modules/mod_autoindex.so
LoadModule cgi_module modules/mod_cgi.so
LoadModule dav_lock_module modules/mod_dav_lock.so
LoadModule dir_module modules/mod_dir.so
LoadModule env_module modules/mod_env.so
LoadModule headers_module modules/mod_headers.so
LoadModule include_module modules/mod_include.so
LoadModule info_module modules/mod_info.so
LoadModule isapi_module modules/mod_isapi.so
LoadModule log_config_module modules/mod_log_config.so
LoadModule cache_disk_module modules/mod_cache_disk.so
LoadModule mime_module modules/mod_mime.so
LoadModule negotiation_module modules/mod_negotiation.so
LoadModule proxy_module modules/mod_proxy.so
LoadModule proxy_ajp_module modules/mod_proxy_ajp.so
LoadModule rewrite_module modules/mod_rewrite.so
LoadModule setenvif_module modules/mod_setenvif.so
LoadModule socache_shmcb_module modules/mod_socache_shmcb.so
LoadModule ssl_module modules/mod_ssl.so
LoadModule status_module modules/mod_status.so

LoadModule vhost_alias_module modules/mod_vhost_alias.so

&lt;IfModule unixd_module&gt;
   User daemon
   Group daemon
&lt;/IfModule&gt;

ServerAdmin <a href="mailto:slavkoss22@gmail.com">slavkoss22@gmail.com</a>
ServerName localhost:8083

&lt;Directory /&gt;
   AllowOverride none
   Require all denied
&lt;/Directory&gt;

DocumentRoot &quot;/xampp/htdocs&quot;
&lt;Directory &quot;/xampp/htdocs&quot;&gt;
   Options Indexes FollowSymLinks Includes ExecCGI
   AllowOverride All
   Require all granted
&lt;/Directory&gt;
&lt;Directory &quot;J:/awww/www/&quot;&gt;
   Options Indexes FollowSymLinks Includes ExecCGI
   AllowOverride All
   Require all granted
&lt;/Directory&gt;

&lt;IfModule dir_module&gt;
DirectoryIndex index.php index.pl index.cgi index.asp index.shtml index.html index.htm \
default.php default.pl default.cgi default.asp default.shtml default.html default.htm \
home.php home.pl home.cgi home.asp home.shtml home.html home.htm
&lt;/IfModule&gt;

&lt;Files &quot;.ht*&quot;&gt;
Require all denied
&lt;/Files&gt;

ErrorLog &quot;logs/error.log&quot;
LogLevel warn
&lt;IfModule log_config_module&gt;
LogFormat &quot;%h %l %u %t \&quot;%r\&quot; %&gt;s %b \&quot;%{Referer}i\&quot; \&quot;%{User-Agent}i\&quot;&quot; combined
LogFormat &quot;%h %l %u %t \&quot;%r\&quot; %&gt;s %b&quot; common

&lt;IfModule logio_module&gt;
LogFormat &quot;%h %l %u %t \&quot;%r\&quot; %&gt;s %b \&quot;%{Referer}i\&quot; \&quot;%{User-Agent}i\&quot; %I %O&quot; combinedio
&lt;/IfModule&gt;

CustomLog &quot;logs/access.log&quot; combined
&lt;/IfModule&gt;

&lt;IfModule alias_module&gt;
ScriptAlias /cgi-bin/ &quot;/xampp/cgi-bin/&quot;
&lt;/IfModule&gt;

&lt;IfModule cgid_module&gt;

&lt;/IfModule&gt;

&lt;Directory &quot;/xampp/cgi-bin&quot;&gt;
AllowOverride All
Options None
Require all granted
&lt;/Directory&gt;

&lt;IfModule headers_module&gt;
RequestHeader unset Proxy early
&lt;/IfModule&gt;

&lt;IfModule mime_module&gt;
TypesConfig conf/mime.types
AddType application/x-compress .Z
AddType application/x-gzip .gz .tgz
AddHandler cgi-script .cgi .pl .asp
AddType text/html .shtml
AddOutputFilter INCLUDES .shtml
&lt;/IfModule&gt;

&lt;IfModule mime_magic_module&gt;
MIMEMagicFile &quot;conf/magic&quot;
&lt;/IfModule&gt;

Include conf/extra/httpd-mpm.conf

Include conf/extra/httpd-multilang-errordoc.conf

Include conf/extra/httpd-autoindex.conf

Include conf/extra/httpd-languages.conf

Include conf/extra/httpd-userdir.conf

Include conf/extra/httpd-info.conf

<strong>Include conf/extra/httpd-vhosts.conf</strong>

Include &quot;conf/extra/httpd-proxy.conf&quot;

Include &quot;conf/extra/httpd-default.conf&quot;

Include &quot;conf/extra/httpd-xampp.conf&quot;

&lt;IfModule proxy_html_module&gt;
Include conf/extra/proxy-html.conf
&lt;/IfModule&gt;

Include conf/extra/httpd-ssl.conf
&lt;IfModule ssl_module&gt;
SSLRandomSeed startup builtin
SSLRandomSeed connect builtin
&lt;/IfModule&gt;

AcceptFilter http none
AcceptFilter https none
&lt;IfModule mod_proxy.c&gt;
&lt;IfModule mod_proxy_ajp.c&gt;
Include &quot;conf/extra/httpd-ajp.conf&quot;
&lt;/IfModule&gt;
&lt;/IfModule&gt;
</pre>




















<h2>&nbsp;</h2>
<p>&nbsp;</p>
<a id="phpini"></a><h2>J:\xampp\php\php.ini</h2>


<pre>engine = On
short_open_tag = Off
precision = 14
output_buffering = 4096
zlib.output_compression = Off
implicit_flush = Off
unserialize_callback_func =
serialize_precision = -1
disable_functions =
disable_classes =
zend.enable_gc = On
expose_php = On
max_execution_time = 30
max_input_time = 60
memory_limit = 128M
error_reporting = E_ALL
display_errors = On
display_startup_errors = On
log_errors = On
log_errors_max_len = 1024
ignore_repeated_errors = Off
ignore_repeated_source = Off
report_memleaks = On
html_errors = On
variables_order = &quot;GPCS&quot;
request_order = &quot;GP&quot;
register_argc_argv = Off
auto_globals_jit = On
post_max_size = 8M
auto_prepend_file =
auto_append_file =
default_mimetype = &quot;text/html&quot;
default_charset = &quot;UTF-8&quot;
include_path = J:\xampp\php\PEAR
doc_root =
user_dir =
extension_dir = &quot;J:\xampp\php\ext&quot;
enable_dl = Off

file_uploads = On
upload_tmp_dir = &quot;J:\xampp\tmp&quot;
upload_max_filesize = 2M
max_file_uploads = 20
allow_url_fopen = On
allow_url_include = Off
default_socket_timeout = 60
zend_extension = &quot;J:/xampp/php/ext/php_xdebug.dll&quot;
extension=bz2
extension=curl
extension=fileinfo
extension=gd2
extension=gettext
extension=intl
extension=mbstring
extension=exif
extension=mysqli
; Use with Oracle Database 12c Instant Client :
extension=oci8_11g
extension=pdo_mysql
extension=pdo_oci
extension=pdo_sqlite
extension=soap

asp_tags=Off
display_startup_errors=On
track_errors=Off
y2k_compliance=On
allow_call_time_pass_reference=Off
safe_mode=Off
safe_mode_gid=Off
safe_mode_allowed_env_vars=PHP_
safe_mode_protected_env_vars=LD_LIBRARY_PATH
error_log=&quot;J:\xampp\php\logs\php_error_log&quot;
register_globals=Off
register_long_arrays=Off
magic_quotes_gpc=Off
magic_quotes_runtime=Off
magic_quotes_sybase=Off
extension=php_openssl.dll
extension=php_ftp.dll

cli_server.color = On

pdo_mysql.default_socket=&quot;MySQL&quot;
pdo_mysql.default_socket=

SMTP = mail.iskon.hr
smtp_port = 25
;Iskon 25, 587

mail.add_x_header = Off

odbc.allow_persistent = On
odbc.check_persistent = On
odbc.max_persistent = -1
odbc.max_links = -1
odbc.defaultlrl = 4096
odbc.defaultbinmode = 1

ibase.allow_persistent = 1
ibase.max_persistent = -1
ibase.max_links = -1
ibase.timestampformat = &quot;%Y-%m-%d %H:%M:%S&quot;
ibase.dateformat = &quot;%Y-%m-%d&quot;
ibase.timeformat = &quot;%H:%M:%S&quot;

mysqli.max_persistent = -1
mysqli.allow_persistent = On
mysqli.max_links = -1
mysqli.default_port = 3306
mysqli.default_socket =
mysqli.default_host =
mysqli.default_user =
mysqli.default_pw =
mysqli.reconnect = Off

mysqlnd.collect_statistics = On
mysqlnd.collect_memory_statistics = On

pgsql.allow_persistent = On
pgsql.auto_reset_persistent = Off
pgsql.max_persistent = -1
pgsql.max_links = -1

pgsql.ignore_notice = 0
pgsql.log_notice = 0

bcmath.scale = 0

browscap = &quot;J:\xampp\php\extras\browscap.ini&quot;

session.save_handler = files
session.save_path = &quot;J:\xampp\tmp&quot;
session.use_strict_mode = 0
session.use_cookies = 1
session.use_only_cookies = 1
session.name = PHPSESSID
session.auto_start = 0
session.cookie_lifetime = 0
session.cookie_path = /
session.cookie_domain =
session.cookie_httponly =
session.cookie_samesite =
session.serialize_handler = php
session.gc_probability = 1
session.gc_divisor = 1000
session.gc_maxlifetime = 1440
session.referer_check =
session.cache_limiter = nocache
session.cache_expire = 180
session.use_trans_sid = 0
session.sid_length = 26
session.trans_sid_tags = &quot;a=href,area=href,frame=src,form=&quot;
session.sid_bits_per_character = 5

zend.assertions = 1

tidy.clean_output = Off

soap.wsdl_cache_enabled=1
soap.wsdl_cache_dir=&quot;/tmp&quot;
soap.wsdl_cache_ttl=86400
soap.wsdl_cache_limit = 5

ldap.max_links = -1

curl.cainfo = &quot;J:\xampp\apache\bin\curl-ca-bundle.crt&quot;

openssl.cafile = &quot;J:\xampp\apache\bin\curl-ca-bundle.crt&quot;

[Syslog]
define_syslog_variables=Off
[Session]
define_syslog_variables=Off
[Date]
date.timezone=Europe/Berlin
[MySQL]
mysql.allow_local_infile=On
mysql.allow_persistent=On
mysql.cache_size=2000
mysql.max_persistent=-1
mysql.max_link=-1
mysql.default_port=3306
mysql.default_socket=&quot;MySQL&quot;
mysql.connect_timeout=3
mysql.trace_mode=Off
[Sybase-CT]
sybct.allow_persistent=On
sybct.max_persistent=-1
sybct.max_links=-1
sybct.min_server_severity=10
sybct.min_client_severity=10
[MSSQL]
mssql.allow_persistent=On
mssql.max_persistent=-1
mssql.max_links=-1
mssql.min_error_severity=10
mssql.min_message_severity=10
mssql.compatability_mode=Off
mssql.secure_connection=Off       <?php
    echo 'PHP SAYS:  šđčćž';
    //echo '<br />__FILE__='.__FILE__;

    echo '<br /><br />$_SERVER[\'REMOTE_ADDR\']='.$_SERVER['REMOTE_ADDR']
         .' $_SERVER[\'SERVER_PORT\']='.$_SERVER['SERVER_PORT'];
    echo '<br />PHP_SAPI='.PHP_SAPI;
    ?>  </pre>










<br /><br /><br /><br />
<?php
echo '<hr />';
echo '$_SERVER[\'REMOTE_ADDR\']='.$_SERVER['REMOTE_ADDR'];

?>



  </div>
  <!-- E N D  22222 div class="c ontent" -->





  <div class="footer">
    <hr />
    f o o t e r
  </div>
  <!-- E N D  33333 div class="footer" -->










  </body>
</html>