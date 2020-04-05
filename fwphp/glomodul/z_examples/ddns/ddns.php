<!DOCTYPE html>
<html><head>








  
    <meta charset="UTF-8"><title>What Is My IP?</title>
    
  	<style type="text/css">
    body {
    	margin: 0;	padding: 0;
      font: 18px Arial, Helvetica, sans-serif;
      background: #DFCC89;
    }
    #main-content {
      margin: 0% 10% 0% 10%;
      font: 18px Arial, Helvetica, sans-serif;
      /* text-align: center; */
      text-align: left;
      color: #3D2399;
    }
    #main-content h1 {
      font: 40px Arial, Helvetica, sans-serif;
    }
    #main-content p {
      font: 24px "Times New Roman", Times, Georgia, serif;
    }
    #main-content p strong {
      font-size: 20px;
      color: #000000;
    }
    
    
    
  	</style></head><body>
    

    <div id="main-content">




<h1>DDNS - Dynamic DNS</h1>
Access my dyndns from local network ee access my dynamic DNS domain name inside my LAN.
<br>

I dont want to redirect from Dyn hostname to 192.168.x.x (create an entry in my hosts file  with Dyn hostname and the LAN IP), <br>


but how i can access from inside network to my dyndns ?&nbsp;
Solutio below would be better without (see below) localtest.me or fuf.me but I do not know how to do it.<br>


<div style="margin-left: 120px;">I did not used this (not clear explanations):<br>
Few home routers support what's known as NAT Reflection or Loopback, see 
<a href="http://opensimulator.org/wiki/NAT_Loopback_Routers" target="_blank">http://opensimulator.org/wiki/NAT_Loopback_Routers</a>. 
NAT loopback connection basically is accessing a LAN side device via it's NAT'ed WAN IP from the internal LAN network.
<br>
Setting up Microsoft Loopback adapter allows you to have multiple service appear at the same port.
<br>
</div>


<h2>WORKS My home site from local network :</h2>



<h2><a href="http://phporacle.mooo.com.localtest.me:8083/" target="_blank">http://phporacle.mooo.com.localtest.me:8083/</a></h2>



<h2><a href="http://phporacle.mooo.com.fuf.me:8083/" target="_blank">http://phporacle.mooo.com.fuf.me:8083/</a></h2><br>
<h2>WORKS&nbsp; My home site from inet is without (see below) localtest.me or fuf.me :</h2>
<h2><a href="http://phporacle.mooo.com:8083/" target="_blank">http://phporacle.mooo.com:8083/</a></h2>
<br>
How I did it :<br>
<br>
<h2>11111 Open port in router and firewall</h2>
On Windows XP PC (different router) <span style="font-weight: bold;">subdomains like fuf.me or localtest.me</span> are not needed,<br>
but on Win 8.1 and 10 router Siemens Gigaset SX763 WLAN dsl&nbsp; are now needed (few monts ago not !!).<br>
<br>
1. open port 8083 or simmilar in router - port 8083 forward to my PC static IP 192.168.x.x (ipv4 network adapter properties !)<br>

2. open port 8083 in Windows firewall for TCP access (UDP also ?)<br>

&nbsp;&nbsp;&nbsp; 2.1 WINKEY+R -&gt; type WF.msc<br>

&nbsp;&nbsp;&nbsp; 2.2 In the Windows Firewall with Advanced Security,
in the left pane, <br>

&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; left-click Inbound Rules -&gt;
click New Rule in the action pane.<br>

&nbsp;&nbsp;&nbsp; 2.3 In the Rule Type dialog box, select Port, and
then click Next...<br>
<br>
<div style="margin-left: 160px;">
ZWAMP does next in Windows firewall : <br>

httpd.exe &nbsp;&nbsp; &nbsp; J:\zwamp64\vdrive\.sys\Apache2\bin\httpd.exe<br>

mysqld.exe&nbsp;&nbsp; J:\zwamp64\vdrive\.sys\mysql\bin\mysqld.exe<br>
</div>



<br>
My C:\Windows\System32\drivers\etc\hosts<br>

127.0.0.1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; localhost dev1<br>

::1&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; localhost dev1<br>
<br>
<br>

    
    
<?php // proxy_intermediate_buffer_server_request_hdr is modified
include('ddns_whatismyip.php');
?>
    
<br>
<br>

<br>or<br>
<br>
rem J:\zwamp64\vdrive\web\utl\wcurl_phporacle.mooo.com.bat<br>
@cls<br>
cd %~DP0<br>
@echo Updating FreeDNS<br>
@J:\CURL\<span style="font-weight: bold;">CURL</span> -k http://freedns.afraid.org/dynamic/update.php?RFFqMGxON2s5V1RXSm51VE84bkJjamdIOjE3MDE3ODUw<br>
@pause<br>
<br>
or<br>
<br>
rem J:\zwamp64\vdrive\web\utl\wget_phporacle.mooo.com.bat<br>
cd %~DP0<br>
<span style="font-weight: bold;">J:\CURL\wget</span> -q --read-timeout=0.0
--waitretry=5 --tries=400 --background
http://freedns.afraid.org/dynamic/update.php?RFFqMGxON2s5V1RXSm51VE84bkJjamdIOjE3MDE3ODUw<br><br><br>
<br>
<br>
<br>
<br>

<h3 xmlns="http://www.w3.org/1999/xhtml" id="sites-page-title-header" style="margin: 0px; padding: 3px 10px; font-size: 22px; font-weight: bold; color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-style: normal; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px;" align="left"><span id="sites-page-title" dir="ltr" tabindex="-1" style="outline-color: invert; outline-style: none; outline-width: medium;">Public DNS Pointing To localhost (127.0.0.1)</span></h3>

<a href="http://www.fidian.com/programming/public-dns-pointing-to-localhost" target="_blank">http://www.fidian.com/programming/public-dns-pointing-to-localhost</a><br>

<h2 style="font-family: verdana,sans-serif; color: rgb(0, 0, 0); font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">Hosts File</h2>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">The first and easiest method is where one edits their hosts file (<code style="color: rgb(0, 96, 0);">/etc/hosts</code><span>&nbsp;</span>in Linux,<span>&nbsp; </span><code style="color: rgb(0, 96, 0);">C:\Windows\System32\Drivers\etc\hosts</code><span>&nbsp;</span>for some versions of Windows) and add lines like this:</div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><br></div>

<div class="sites-codeblock sites-codesnippet-block" style="border: 1px solid rgb(211, 211, 211); padding: 0.5em 0px 0.5em 1em; background-color: rgb(239, 239, 239); display: block; line-height: 1; color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px;"><div><code style="color: rgb(0, 96, 0);">127.0.0.1 client1.local</code></div><div><code style="color: rgb(0, 96, 0);">127.0.0.1 client2.dev</code></div><div><code style="color: rgb(0, 96, 0);">127.0.0.1 client3</code></div></div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><br></div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">At
work, we have up to five different hostnames for each of our clients.
&nbsp;Adding yet another client means dozens of developers that now need to
edit their hosts file. &nbsp;Oh, the pain and agony when you have to do this
for hundreds of domains!</div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><br></div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><i>What if we could have a single top-level domain that always resolved to localhost?</i></div>

<br>

<h2 style="font-family: verdana,sans-serif; color: rgb(0, 0, 0); font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">DNS Entries - Windows</h2>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">If you are using Windows DNS, you can create a new zone (I did not):</div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><br></div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><div class="sites-codeblock sites-codesnippet-block" style="border: 1px solid rgb(211, 211, 211); padding: 0.5em 0px 0.5em 1em; background-color: rgb(239, 239, 239); display: block; line-height: 1;"><div>dnscmd /RecordAdd local * 3600 A 127.0.0.1</div><div>dnscmd /RecordAdd local @ 3600 A 127.0.0.1</div></div></div>

<h2 style="font-family: verdana,sans-serif; color: rgb(0, 0, 0); font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><a name="TOC-dnsmasq---Linux-MacOS" style="color: rgb(0, 102, 204);"></a>dnsmasq - Linux, MacOS</h2>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">On
Linux systems, you can install dnsmasq to pretend to be a real DNS
server and actually respond with 127.0.0.1 for all subdomains of a top
level domain. &nbsp;So, if you wanted *.local to always resolve to your own
domain, then you can use URLs like this:</div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><br></div>

<div class="sites-codeblock sites-codesnippet-block" style="border: 1px solid rgb(211, 211, 211); padding: 0.5em 0px 0.5em 1em; background-color: rgb(239, 239, 239); display: block; line-height: 1; color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px;"><div><code style="color: rgb(0, 96, 0);">http://client1.local/</code></div><div><code style="color: rgb(0, 96, 0);">http://client2.local/</code></div><div><code style="color: rgb(0, 96, 0);">http://client3.local/</code></div></div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><br></div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">You only need to install and set up dnsmasq. &nbsp;There's some well-written instructions at&nbsp;<a href="http://drhevans.com/blog/posts/106-wildcard-subdomains-of-localhost" style="color: rgb(85, 26, 139);">http://drhevans.com/blog/posts/106-wildcard-subdomains-of-localhost</a>&nbsp;that you can follow; I won't repeat them here.</div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><br></div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">The
drawback of this setup is that you now have to install and configure
dnsmasq on every machine where you want to use this trick.</div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><br></div>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><i>What if someone set up DNS entries and basically did this for you?</i></div>

<h2 style="font-family: verdana,sans-serif; color: rgb(0, 0, 0); font-style: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);"><a name="TOC-Available-Wildcarded-DNS-Domains" style="color: rgb(0, 102, 204);"></a>Available Wildcarded DNS Domains</h2>

<span style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255); display: inline ! important; float: none;">Some
kind hearted people already set up wildcarded domains for you already.
&nbsp;You can use any top level domain below and any subdomain of these and
they will always resolve back to 127.0.0.1 (your local machine).</span><br>

<br>

<a href="http://localtest.me:8083/" target="_blank">http://localtest.me:8083/</a>&nbsp;&nbsp; or&nbsp; <a href="http://fuf.me:8083/" target="_blank">http://fuf.me:8083/</a>&nbsp;&nbsp;&nbsp; - WORKS same as <a href="http://localthost:8083/" target="_blank">http://localthost:8083/</a><br>

or same for:&nbsp;&nbsp;&nbsp;<span style="font-weight: bold;"> 2011 -&nbsp; September 2017: </span><br>
<ol>
  <li>http://fuf.me:8083/ - Managed by me; it will always point to localhost for IPv4 and IPv6</li>
  <li>http://localtest.me:8083/ - Also <span style="font-weight: bold;">has an SSL cert - see&nbsp;</span><a href="http://readme.localtest.me/" style="color: rgb(85, 26, 139); font-weight: bold;">http://readme.localtest.me</a></li>
  <li>http://127-0-0-1.org.uk:8083/</li>
  <li>http://42foo.com:8083/</li>
  <li>http://vcap.me:8083/</li>
  <li>http://beweb.com:8083/</li>
  <li>http://yoogle.com:8083/</li>
  <li>http://lvh.me:8083/</li>
  <li>http://ulh.us:8083/<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; no more
http://ortkut.com:8083/&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
http://feacebook.com:8083/<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
http://ratchetlocal.com:8083/&nbsp;&nbsp;&nbsp;&nbsp;
http://smackaho.st:8083/</li>
</ol>

<div style="color: rgb(0, 0, 0); font-family: verdana,sans-serif; font-size: 13.3333px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">Now, with these wildcarded domains, <span style="font-weight: bold;">you don't need to do any modification of your system for requests to come back to your own server</span>.
&nbsp;For instance, you can go to http://127-0-0-1.org.uk:8083/ and the
web page request will always head back to your own server. &nbsp;You'll
still need to <span style="font-weight: bold;">configure your web server to answer on this hostname</span> as above said, but at least the DNS portion of the problem is now solved.</div>

<br>

<h2>WORKS:</h2>

<h2><a href="http://phporacle.mooo.com.localtest.me:8083/" 
target="_blank">http://phporacle.mooo.com.localtest.me:8083/</a></h2>

<h2><a href="http://phporacle.mooo.com.fuf.me:8083/" 
target="_blank">http://phporacle.mooo.com.fuf.me:8083/</a></h2>


<br>
<br>
<br>

   
   
<h2>Install&nbsp; cURL (SSL-enabled) Win command-line tool</h2><br>
<p style="border: 0px none ; margin: 0px 0px 1em; padding: 0px; font-style: normal; font-weight: normal; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Arial,&quot;Helvetica Neue&quot;,Helvetica,sans-serif; vertical-align: baseline; clear: both; color: rgb(36, 39, 41); letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">If you install<span>&nbsp;</span><a href="http://git-scm.com/downloads" style="border: 0px none ; margin: 0px; padding: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(80, 174, 198); text-decoration: none; cursor: pointer;">Git for Windows</a><span>&nbsp;</span>you get Curl automatically too. There are some advantages:</p>
<ul style="border: 0px none ; margin: 0px 0px 1em 30px; padding: 0px; font-style: normal; font-weight: normal; font-stretch: inherit; font-size: 15px; line-height: inherit; font-family: Arial,&quot;Helvetica Neue&quot;,Helvetica,sans-serif; vertical-align: baseline; list-style-type: disc; list-style-image: none; list-style-position: outside; color: rgb(36, 39, 41); letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; background-color: rgb(255, 255, 255);">
<li style="border: 0px none ; margin: 0px 0px 0.5em; padding: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">Git takes care of the<span>&nbsp;</span><code style="border: 0px none ; margin: 0px; padding: 1px 5px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 13px; line-height: inherit; font-family: Consolas,Menlo,Monaco,&quot;Lucida Console&quot;,&quot;Liberation Mono&quot;,&quot;DejaVu Sans Mono&quot;,&quot;Bitstream Vera Sans Mono&quot;,&quot;Courier New&quot;,monospace,sans-serif; vertical-align: baseline; background-color: rgb(239, 240, 241);">PATH</code><span>&nbsp;</span>setup during installation automatically.</li><li style="border: 0px none ; margin: 0px 0px 0.5em; padding: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">You get the<span>&nbsp;</span><a href="http://www.gnu.org/software/bash/" style="border: 0px none ; margin: 0px; padding: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline; color: rgb(80, 174, 198); text-decoration: none; cursor: pointer;">GNU bash</a>, a really powerful shell, in my opinion much better than the native Windows console.</li><li style="border: 0px none ; margin: 0px; padding: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: inherit; line-height: inherit; font-family: inherit; vertical-align: baseline;">You get many other useful Linux tools like tail, cat, grep, gzip, pdftotext, less, sort, tar, vim and even Perl.</li>
</ul>

<section style="display: block; color: rgb(0, 0, 0); font-family: Arial,Helvetica,sans-serif; font-size: 12px; font-style: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px;"></section>
<div style="margin-left: -0.5em;"><ol><p><a href="http://www.oracle.com/webfolder/technetwork/tutorials/obe/cloud/13_2/messagingservice/files/installing_curl_command_line_tool_on_windows.html" target="_blank">http://www.oracle.com/webfolder/technetwork/tutorials/obe/cloud/13_2/messagingservice/files/installing_curl_command_line_tool_on_windows.html</a><br>
</p>
  <p>This tutorial shows you how to access Oracle Messaging Cloud
Service via the REST interface by using the cURL command-line tool.
cURL is free, open software that runs under various operating systems.<span>&nbsp;</span><br></p>
<p>This tutorial demonstrates cURL on a Windows 64-bit operating system
that is enabled for the secure sockets layer (SSL). The authentication
aspects of the Messaging Cloud Service require an SSL-enabled
environment.<span>&nbsp;</span><br></p><p>Your first task is to install the appropriate version of cURL for your SSL-enabled environment.<span>&nbsp;</span><br></p><p>There
is an ordered series of steps to follow to install cURL on Windows.
There are two libraries to install and they must be installed before
cURL will work with SSL. Also, they must be installed in this order to
work.<span>&nbsp;</span><span style="font-weight: bold;">Do not skip the step to install a recent certificate.</span></p></ol><ol><figure style="display: list-item; font-weight: bold; list-style-type: decimal; list-style-image: none; list-style-position: outside; margin-left: 1.5em;"><figcaption style="font-weight: normal;"></figcaption></figure>
  
  <p>Install Visual C++<span>&nbsp;</span><span style="font-weight: bold; text-decoration: underline;">2008</span><span>&nbsp;</span>Redistributable Package.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span><br><br>For 64-bit systems: Visual C++ 2008 Redistributables (x64) from<span>&nbsp;</span><a target="_blank" href="http://www.microsoft.com/en-us/download/details.aspx?id=15336" style="text-decoration: none;">http://www.microsoft.com/en-us/download/details.aspx?id=15336</a><br><br>For 32-bit systems: Visual C++ 2008 Redistributables (x32)</p>

<br><figcaption style="font-weight: normal;"></figcaption><figure style="display: list-item; font-weight: bold; list-style-type: decimal; list-style-image: none; list-style-position: outside; margin-left: 1.5em;"><figcaption style="font-weight: normal;"></figcaption></figure><p>Install Visual C++<span>&nbsp;</span><span style="font-weight: bold; text-decoration: underline;">2010</span><span>&nbsp;</span>Redistributable Package.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>&nbsp;</span><br><br>For 64-bit systems: Visual C++ 2010 Redistributables (x64) from<span>&nbsp;</span><a target="_blank" href="http://www.microsoft.com/en-us/download/details.aspx?id=14632" style="text-decoration: none;">http://www.microsoft.com/en-us/download/details.aspx?id=14632</a><br><br>For 32-bit systems: Visual C++ 2010 Redistributables (x32)</p><br><figcaption style="font-weight: normal;"></figcaption><figure style="display: list-item; font-weight: bold; list-style-type: decimal; list-style-image: none; list-style-position: outside; margin-left: 1.5em;"><figcaption style="font-weight: normal;"></figcaption></figure><p>Install Win(32/64) OpenSSL v1.0.0k Light from<span>&nbsp;</span><a target="_blank" href="http://www.shininglightpro.com/products/Win32OpenSSL.html" style="text-decoration: none;">http://www.shininglightpro.com/products/Win32OpenSSL.html</a>.<br><br>For 64-bit systems: Win64 OpenSSL v1.0.0k Light<br><br>For 32-bit systems: Win32 OpenSSL v1.0.0k Light</p><figcaption style="font-weight: normal;"></figcaption><figure style="display: list-item; font-weight: bold; list-style-type: decimal; list-style-image: none; list-style-position: outside; margin-left: 1.5em;"><figcaption style="font-weight: normal;"></figcaption></figure><p>In your browser, navigate to the cURL welcome page at<span>&nbsp;</span><a target="_blank" href="http://curl.haxx.se/" style="text-decoration: none;">http://curl.haxx.se</a><span>&nbsp;</span>and click<span>&nbsp;</span>Download.</p><figcaption style="font-weight: normal;"></figcaption><figure style="display: list-item; font-weight: bold; list-style-type: decimal; list-style-image: none; list-style-position: outside; margin-left: 1.5em;"><figcaption style="font-weight: normal;"></figcaption></figure><br>
<p>On the cURL Releases and Downloads page, click the link for the <span style="font-weight: bold;">SSL-enabled version</span> for your computer's operating system, download the zip file, and install it in a new folder on your computer.<span>&nbsp;</span><br><br>The cURL website offers a wizard to find the appropriate version for your computer's operating system.<span>&nbsp;</span><br><br>For this tutorial, the 64-bit generic, SSL-enabled version for Windows is selected.<br>
Copy curl.exe file into your Windows PATH folder. By default, this is C:\Windows\System32<br>
</p><figure style="display: list-item; font-weight: bold; list-style-type: decimal; list-style-image: none; list-style-position: outside; margin-left: 1.5em;"><figcaption style="font-weight: normal;"></figcaption></figure><p>Install recent CA Certificates.<span>&nbsp;</span>Do not skip this step.<br>
Download&nbsp;cacert.pem, a recent copy of valid CERT files, from<span>&nbsp;</span><a target="_blank" href="http://curl.haxx.se/docs/caextract.html" style="text-decoration: none;">http://curl.haxx.se/docs/caextract.html</a>.<br>
Copy it to the same folder where you placed<span>&nbsp;</span><code>curl.exe</code><span>&nbsp;</span>and rename it&nbsp;curl-ca-bundle.crt. <br>
Or: Move this file into your Windows PATH folder.</p>
  <p>Invoke<span>&nbsp;</span><code>curl.exe</code><span>&nbsp;</span>from a command window (in Windows, click<span>&nbsp;</span>Start &gt; Run&nbsp;and then enter&nbsp;"cmd"<span>&nbsp;</span>in the Run dialog box).</p>
<figcaption style="font-weight: normal;"></figcaption><p>You can enter<span>&nbsp;</span><code>curl --help</code><span>&nbsp;</span>to see a list of cURL commands.</p><br></ol></div>
<a href="http://freedns.afraid.org/dynamic/" target="_blank">http://freedns.afraid.org/dynamic/</a><br>
<h2>DDNS record types</h2>
<font face="verdana, Helvetica, Arial" size="2"><b>Type:  A</b> - Point subdomain.domain.com (</font>
phporacle.mooo.com<font face="verdana, Helvetica, Arial" size="2">) to a
hard coded <b>IP Address</b>.  Most direct and straight forward
option, also note any change you make in the FreeDNS program is
reflected on the internet and made live immediately.  The only way
you will not see immediate results is if you have cached a query
on your computer by looking it up PRIOR to configuring it in the
FreeDNS program.</font><br>
<br>
<font face="verdana, Helvetica, Arial" size="2"><b>Type:  MX</b> - Point subdomain.domain.com to a
<b>mail server</b>.  These type of records are special for just
mail servers, they can co-exist with A records, and their only use
is for routing mail to a different location.  All mail implementations
check for this record first before attempting to route an e-mail
message.  If a MX record does not exist for a host, an e-mail
delivery would be attempted directly to the IP that the hostname
resolves to.</font><br>
<br>
<font face="verdana, Helvetica, Arial" size="2"><b>Type:  AAAA</b> - Point subdomain.domain.com to
a IPv6 address.  Useful for those who are using <span style="font-weight: bold;">IPv6</span> on their
personal networks or those who are using a <a style="font-weight: bold;" target="_new" onclick="window.close()" href="http://www.tunnelbroker.net/">IPv4 to IPv6</a><span style="font-weight: bold;"> tunnel at home</span>.</font><br>
<br>
<font face="verdana, Helvetica, Arial" size="2"><b>Type:  CNAME</b> - Point subdomain.domain.com to
another <b>hostname</b>.  Good for those who are using other dynamic
DNS services.  You can create a CNAME record to another host and
whatever <span style="font-weight: bold;">subdomain.domain.com you choose here will go to whatever
IP address the CNAMEd host has</span>.</font><br>
<br>
<font face="verdana, Helvetica, Arial" size="2"><b>Type:  NS</b> - Point subdomain.domain.com to
another <b>NAMESERVER</b>.  If you choose this option, then whatever
subdomain.domain.com address you choose using FreeDNS will have to
be configured and setup on the destination ADDRESS (nameserver)
that you choose.  This option basically means you are delegating
a FreeDNS host to another DNS server all together, so when you
choose this option you are telling every computer on the internet
to ask the 'address' where subdomain.domain.com is located at.  If
the host you point an NS record to is not <span style="font-weight: bold;">configured to answer for
the subdomain.domain.com</span> that you are using in FreeDNS then the
subdomain.domain.com host will not resolve.<br><br><font face="verdana, Helvetica, Arial" size="2"><b>Type:  TXT</b>
 - Lets you create TXT records, used for a number of different things, 
most commonly for DKIM records (for combatting spam) so other receiving 
mail servers can verify email was sent from you by verifying your 
publically published crypto-signature.  Wrap your TXT "destination" in 
quotes (don't worry, the system will remind you if you forget).<br><br><font face="verdana, Helvetica, Arial" size="2"><b>Type:  SPF</b> - A anti-spam record, good to have on any domain you're sending email with.  See <a target="_new" onclick="window.close()" href="https://www.spfwizard.net/">https://www.spfwizard.net/</a> for more details.</font><br><br><font face="verdana, Helvetica, Arial" size="2"><b>Type:  LOC</b> - A means for Expressing Location
Information in the Domain Name System.<br><br>

<a target="_new" onclick="window.close()" href="http://www.faqs.org/rfcs/rfc1876.html">RFC1876</a> has the complete explanation.<br><br>

To find your latitude/longitude location, you may find <a target="_new" onclick="window.close()" href="http://www.maporama.com/">Map-O-Rama</a> of use.

<br><br>

<font face="verdana, Helvetica, Arial" size="2"><b>Type:  RP</b> - The Responsible Person RR. RP has the following format:<br><br>

RP &lt;mbox-dname&gt; &lt;txt-dname&gt;<br><br>

Both RDATA fields are required in all RP RRs.<br><br>

The first field, &lt;mbox-dname&gt;, is a domain name that specifies the
mailbox for the responsible person.<br><br>

The second field, &lt;txt-dname&gt;, is a domain name for which TXT RR's
exist.  A subsequent query can be performed to retrieve the
associated TXT resource records at <txt-dname>.<br><br>

<a target="_new" onclick="window.close()" href="http://www.faqs.org/rfcs/rfc1183.html">RFC1183</a> has the complete explanation.

<br><br>

<font face="verdana, Helvetica, Arial" size="2"><b>Type: SRV</b> - A 
'service' record, used by Session Initiation Protocol (SIP), and the 
Extensible Messaging and Presence Protocol (XMPP).  Also used by 
Minecraft.<br><br>

Some examples:<br><br>

Type: SRV<br>
Subdomain: _service._protocol.subdomain<br>
Destination: 4 fields, separated by a space (Priority Weight Port Target)<br>
<br>
Some more random examples:<br>
<br>
Type: SRV<br>
Subdomain: _minecraft._tcp.mc<br>
Domain: yourdomain.com<br>
Destination: 0 0 25676 dns.yourdomain.com<br>
<br>
Type: SRV<br>
Subdomain: _jabber._tcp<br>
Domain: yourdomain.com<br>
Destination: 10 0 5269 jabber.yourdomain.com<br>
<br>
Type: SRV<br>
Subdomain: _jabber._tcp<br>
Domain: yourdomain.com<br>
Destination: 20 0 5269 xmpp-server1.l.google.com</font></txt-dname></font></font></font></font><br>
<br>
<br>
<h2>Cool tips / hidden features</h2>
<font face="verdana, Helvetica, Arial" size="2">1).  If you use other dynamic DNS services and plan to continue using 
them, one easy way to keep your IP address up to date, is by simply 
changing your record to a CNAME in the 'subdomains' area to your other 
dynamic DNS hostname, then you do not need to bother setting up a <span style="font-weight: bold;">update
 script to Free DNS</span>.<br>
2).  If you use only Free DNS, and have multiple hostnames to update, 
you can leave 1 of them a A record, and make the rest of them CNAME's so
 you do not have to issue multiple updates each time.<br>
3).  If you want to <span style="font-weight: bold;">redirect your users to a webpage when you go 
offline</span>, you can add the string &amp;offline=1 to your update string, 
and your record will then be converted to a web forward record.  To edit
 the offline URL, click 'subdomains', then click the subdomain you wish 
to edit, then click 'forward to URL' and fill it out with all your 
offline info, then save it.<br>
4).  If you are behind a firewall and Free DNS is not detecting your IP 
address correctly, you can add &amp;address=127.0.0.2 to the update 
string, to <span style="font-weight: bold;">override Free DNS auto-detection</span>.  To see the order and/or 
HTTP variables checked that Free DNS attempts to detect your IP address,
 you can <a href="http://freedns.afraid.org/dynamic/check.php"><font color="black">click here</font></a><br>


<br><br>
<b>DEFINITIONS:</b><br>
<u>Direct URL</u> - The URL used to update FreeDNS with your current IP 
address.  You can right click the link and copy shortcut to get the 
update URL.<br><br>

<u>Grab URL Script</u> - This is a link that generates a Windows .bat file you can use to update your IP address.  You may however prefer to use <a target="_new" href="http://freedns.afraid.org/scripts/freedns.clients.php"><font color="black">Free DNS Clients</font></a> available for a cleaner more automatic solution, not all of these are free.<br><br>

<u>Edit Record</u> - Self explanatory.  If you don't know what this means, contact me for a brutal hazing.</font><br>
<br>
<font color="black" face="verdana, Helvetica, Arial" size="2">The 
expiration time value is controlled by FreeDNS.  In FreeDNS, the <span style="font-weight: bold;">cache 
values (called a TTL, time to live)</span> is set to 3600 seconds by default (1
 hour).  With that said, you must wait a maximum of one hour for your 
previous cache to expire.</font><br>
<br>
<font color="black" face="verdana, Helvetica, Arial" size="2">If you 
wish to verify that your update has made it into FreeDNS, instead of 
waiting, you can query against freedns.afraid.org's nameservers directly
 from your computer like so:<br>
<br>
click start menu -&gt; click run -&gt; type "<span style="font-weight: bold;">nslookup</span>" without quotes, press enter. You should see a black box.  Inside of it, type:<br>
<br>
"<span style="font-weight: bold;">server ns1.afraid.org</span>" press enter <br>
Default Server:&nbsp; ns1.afraid.org<br>
Addresses:&nbsp; 2607:f0d0:1102:d5::2<br>
&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 50.23.197.94<br>
<br>
then phporacle.mooo.com.</font><font color="black" face="verdana, Helvetica, Arial" size="2">afraid.org.fuf.me:8083&nbsp; = </font><font color="black" face="verdana, Helvetica, Arial" size="2">"yourhostname.afraid.org" press enter<br>
*** ns1.afraid.org can't find phporacle.mooo.com.afraid.org.fuf.me:8083: No response from server<br>
<br>
There are also 3rd party DNS utilities available for windows that would 
even let you see how many seconds are left in the cache in your ISPs 
nameserver.</font><br>
<br>
<br><br>
<br>
<br>

Fake email for email askers on inet :<br>
mojmail@tempr.email  https://tempr.email/inbox.htm<br>
<br>
</div></body></html>