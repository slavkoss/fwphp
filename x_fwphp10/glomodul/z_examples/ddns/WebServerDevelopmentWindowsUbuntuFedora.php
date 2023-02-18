<!DOCTYPE html>
<html lang="hr">

<head>
<meta content="hr" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>WEBSDEV</title>
<style type="text/css">
.auto-style1 {
  font-family: "Courier New", Courier, monospace;
}
</style>
</head>

<body>

<h2>Web Server Development Windows, Ubuntu, Fedora</h2>

<h3>Enter few characters in search field (or nothing for all users)</h3>
<?php
$user_name = 'root';
$password   = '';
//$database   = 'tema';
$server  =  'localhost:3306';
$db  =  'tema';

$find_fld = '';
if (isset($_GET['find_fld'])) $find_fld = $_GET['find_fld'];


            $dsn = "mysql:host=".$server.";dbname=".$db;
            try {
              $conn = new PDO($dsn, $user_name, $password //, $options
              );
              //if(0*TEST) 
                echo '<b>$conn = new PDO($dsn, $user_name, $password...</b>';
            } catch ( Exception $e )
            { // If the DB connection fails, output the error
                die ( $e->getMessage() );
            }

$sql =  "select user_id, user_name from users where user_name like '%$find_fld%'";

echo  "<p  style=\"font-size:  1.1em;  color:blue\">";
    
    foreach ($conn->query($sql) as $row) {
        print $row['user_id'] . "\t";
        print $row['user_name'] . "<br />";    }
    
echo"</p>";

//$result->close();
//$conn->close(); //mysqli_close($conn);
?>

<form  action="#"  method="get">
  <input  type="text"  name="find_fld"  style="color:red;
  font-size:24px">
  <input  type="submit"  value="Search PDO"  style="color:red; font-size:24px">
</form>





<?php
$user_name = 'root';
$password   = '';
//$database   = 'tema';
$server  =  'localhost:3306';
$db  =  'tema';

$find_fld = '';
if (isset($_GET['find_fld'])) $find_fld = $_GET['find_fld'];

//$conn  =  mysqli_connect($server,  $user_name,  $password);
$conn  =  new mysqli($server,  $user_name,  $password, $db); // or $link
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//$mysqli->select_db($db);  //mysqli_select_db($db);
if ($result = $conn->query("SELECT DATABASE()")) {
    $row = $result->fetch_row();
    printf("Default database is %s.\n", $row[0]);
    $result->close();
}

$sql  =  "select user_id, user_name from users where user_name like '%$find_fld%'";
// "SELECT Name FROM City LIMIT 10"
if ($result = $conn->query($sql)) {
    printf("<br / >Select returned %d rows.", $result->num_rows);
    // free result set
    //$result->close();
}
//$result  =  mysqli_query($sql);
echo  "<p  style=\"font-size:  1.1em;  color:blue\">";
    while  ($row  =  mysqli_fetch_array($result))
    {
echo  "$row[user_id],  $row[user_name]<br  />";
    }  
echo"</p>";

$result->close();
$conn->close(); //mysqli_close($conn);
?>

<form  action="#"  method="get">
  <input  type="text"  name="find_fld"  style="color:red;
  font-size:24px">
  <input  type="submit"  value="Search mysqli"  style="color:red; font-size:24px">
</form>



<strong><br><br>URLs on LAN :</strong><br>
<a href="http://sspc1:8083/fwphp/aplw/glomodul/help/Web%20Server%20Development%20Windows,%20Ubuntu,%20Fedora.php">
http://sspc1:8083/fwphp/aplw/glomodul/help/Web%20Server%20Development%20Windows,%20Ubuntu,%20Fedora.php</a>
<pre>&lt;?php
$ip = $_SERVER['REMOTE_ADDR'];
echo "&lt;p style=\"font-size:24px; color: green; text-align: center\"&gt;Your IP address is $ip&lt;/p&gt;";
?&gt;</pre>
outputs&nbsp;&nbsp;&nbsp;&nbsp; :
<?php
$ip  =  $_SERVER['REMOTE_ADDR'];
echo  "<span  style=\"font-size:24px;  color:  green;  text-align:  center\">
Your IP address is $ip</span>";
?>


&nbsp;


<br>same hardcoded: 
Your IP address is fe80::e4fc:46ba:1d30:393d<br><br>
<a href="http://phporacle.mooo.com.localtest.me:8083/fwphp/aplw/glomodul/help/Web%20Server%20Development%20Windows,%20Ubuntu,%20Fedora.php">
http://phporacle.mooo.com.localtest.me:8083/fwphp/aplw/glomodul/help/Web%20Server%20Development%20Windows,%20Ubuntu,%20Fedora.php</a>
<br>outputs : <span style="font-size:24px;  color:  green;  text-align:  center">
Your IP address is 127.0.0.1
<span style="font-size:24px;  color:  green;  text-align:  center">- this sees 
DDNS whith localtest.me</span><br></span><br><strong>or URL on inet :</strong><br> <a href="http://tools.pingdom.com">http://tools.pingdom.com</a>. 
  At the Test Now text field, enter the DDNS URL :<br>
  <a href="http://phporacle.mooo.com:8083/">http://phporacle.mooo.com:8083/</a><a href="http://sspc1:8083/fwphp/aplw/glomodul/help/Web%20Server%20Development%20Windows,%20Ubuntu,%20Fedora.php">fwphp/aplw/glomodul/help/Web%20Server%20Development%20Windows,%20Ubuntu,%20Fedora.php</a><br>
outputs two output above IP address displayed is the IP address of the remote 
online tool so :
<span style="font-size:24px;  color:  green;  text-align:  center"><br>Your IP 
address is 5.178.78.78 (213.191.136.167 Zagreb)<br>Your IP address is 127.0.0.1 
- this sees DDNS <span style="font-size:24px;  color:  green;  text-align:  center">
whith localtest.me</span></span><p>&nbsp;</p>
<h3>Why? Do I need a full-fledged Web server for my home or office?</h3>

<ol>
  <li>&nbsp;Set up and maintain a Web site in order to avoid the <strong>
  expense</strong> of hiring someone else.</li>
  <li>&nbsp;More <strong>advanced</strong> than a free Web hosting site will 
  allow. Eg :<br />
  database queries or to show input from a Web camera.</li>
  <li>&nbsp;You wish to <strong>learn</strong> more about the Internet-related 
  technology by following a hands-on approach.</li>
</ol>
<h3>What to do?</h3>
<ol>
  <li>&nbsp;Turn (even old) computer into a Web server using <strong>free</strong> Open
  Source programs.<br><br></li>
  <li>&nbsp;Configure your Operating System (OS) network layer to support Web Server 
  service :<br />
  providing the appropriate <strong>(static) IP address and open TCP port numbers.</strong><br>
  Lubuntu 14.04.2, based on minimal desktop LXDE (Lightweight X11 Desktop 
  Environment), fast performing and energy-saving and a selection of light 
  applications - very low hardware requirements. <a href="http://lubuntu.net/">
  http://lubuntu.net/</a> - burn an ISO image in Windows 7 - right-click on an 
  ISO image and choose Burn disc image (Windows Disc Image Burner). Lubuntu 
  was founded by <a href="https://twitter.com/mariobehling">Mario Behling</a> 
  and has been grown for many years by <a href="https://twitter.com/gilir">
  Julien Lavergne</a>. <br>Fedora 20 – is also covered in the appendix.<br>
  <br><strong>Cherokee</strong> is an open-source cross-platform web server 
  that runs on Linux, BSD variants, Solaris, Mac OS X, <strong>NOT on 
  Microsoft Windows</strong>. Graphical tool for administration cherokee-admin 
  and a modular light-weight design.&nbsp;
  <a href="http://www.cherokee-project.com/">http://www.cherokee-project.com/</a>
  <br><br></li>
  <li>Configure router (eg Level One FBR-1161 ADSL2+ router) to make your Web server 
  available for the entire <strong>Internet</strong>. Using <strong>Virtual 
  Servers service</strong> provided by your router, you will redirect HTTP 
  requests destined to the router’s sole public IP address to the private IP 
  address of your server -&nbsp; HTTP request destined for the router public 
  IP adress is&nbsp; forwarded by the router to web server.<br><br>Eg web 
  server is a host of LAN 192.168.1.0 and has been assigned<br>the private IP 
  address (=PC on whish is installed web server) 192.168.1.101. The Web server 
  will be accessible in the Internet by using the public IP address of the 
  router, IP address 94.69.219.68. The router has the private<br>IP address 
  102.168.1.1, which allows the router to be reachable from inside the LAN.<br>
  <br>Computer 192.168.1.101 must use a <strong>static</strong> private IP 
  address. You must therefore disable DHCP for your web server and must&nbsp; 
  manually configure the server’s static IP address, along with the Netmask, 
  Gateway, and DNS servers parameters. <br><br />
  </li>
  <li>Use a <strong>DDNS</strong> (Dynamic Domain Name Service) to obtain a free 
  name.ddns_provider.com eg webserver.dynu.com :<br>
  <ol>
    <li>Find your inet provider's nonstatic public IP adress eg 
    213.191.136.167 eg here: <a href="https://www.yougetsignal.com/">
    https://www.yougetsignal.com/</a> - Port Forwarding Tester to determine 
    if a specific port on the server is open</li>
    <li>Register (sign up) eg here: <a href="https://freedns.afraid.org/">
    https://freedns.afraid.org/</a> for free or payed DDNS account </li>
    <li>Send your public IP adress eg 213.191.136.167 to DDNS provider so :<br>
    https://freedns.afraid.org/nic/update?hostname=phporacle.mooo.com&amp;myip=213.191.136.167
    <br>(asks user name and password aquired in register step) </li>
  </ol>
  <br />
  <strong>Domain Name</strong> for your site <strong>on your LAN</strong> :<br>
  <a href="http://phporacle.mooo.com.localtest.me:8083/">
  http://phporacle.mooo.com.localtest.me:8083/</a> <br>(you need an external 
  computer - localtest.me - to see how your site looks from outside your LAN)<br>
  <br>To test your site with the new domain name obtained from&nbsp; DDNS 
  provider, go to <a href="http://tools.pingdom.com">http://tools.pingdom.com</a>. 
  At the Test Now text field, enter the new DDNS URL for your site
  <a href="http://phporacle.mooo.com:8083/">http://phporacle.mooo.com:8083/</a><br>
  <br>or <strong>from any PC on inet</strong> :<br>
  <a href="http://phporacle.mooo.com:8083/">http://phporacle.mooo.com:8083/</a><br>
  By registering your domain name with a Dynamic DNS (DDNS) service, you will
  <strong>map your router’s public IP address to a domain name</strong>.<br><br />
  </li>
  <li>Utilize online network tools for checking <strong>site connectivity, performance, 
  status, return visitor's IP 
  address</strong>.<br>Start multiple Virtual Servers (this is unrelated to 
  the router’s Virtual Servers service) that will run in parallel, dispatching 
  different content according to a set of rules that you configure. <br>Simple 
  administrative tasks; read log files, view graphs that show<br>the server’s 
  activities, etc. <br>Use online network tools to ensure that the site 
  behaves from outside your Local Area Network (LAN) as expected.<br>Find your inet provider's nonstatic public IP adress eg 
    213.191.136.167 eg here: <a href="https://www.yougetsignal.com/">
    https://www.yougetsignal.com/</a> - Port Forwarding Tester to determine 
    if a specific port on the server is open<br>or
    <a href="http://tools.pingdom.com">http://tools.pingdom.com</a> - 
    determine download speeds from various countries and determine which 
    ports are closed<br>or <a href="http://www.webpagetest.org/">
    http://www.webpagetest.org/</a> -&nbsp; to select servers (that 
    simulate web clients) from many different countries&nbsp; and also 
    different browsers for each server<br><br><strong>Wireshark</strong> 
  packet sniffer to inspect the client’s HTTP request when it arrives at the 
  server’s computer capturing packets sent and received by the server’s 
  computer.<br><br>When port forwarding is enabled, port forwarding server 
  alters the Host field as sent by client and&nbsp; replaces it with the 
  public IP address of the router concatenated with port number, e.g.:<br>
  Host: 87.202.110.63:8080<br>In that case Host field does not indicate the 
  server’s domain name and you cannot use the Mach Nickname matching option in 
  Cherokee web server to separate the two virtual servers based on domain 
  name. <br>Therefore, to use the Match Nickname option, we must <strong>
  disable Port Forwarding</strong> for domains registered for the two virtual 
  servers.<br><br>When using the HTTP Viewer network tool eg web-sniffer.net, 
  the tool acts as a Web client and queries the DDNS server to resolve your 
  Web server’s domain name to an IP address and then sends a request to the 
  Web server. It’s recommended to use the tool twice – once with the port 
  forwarding service enabled and once with the port forwarding service 
  disabled.<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  1.&nbsp; Online network tool eg web-sniffer recieves URL
  <a href="http://phporacle.mooo.com:8083/">http://phporacle.mooo.com:8083/</a><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  queries&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; sends&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  sends<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  ^ IPadr&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | connRequest&nbsp;&nbsp;&nbsp;&nbsp; 
  |Request<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  | DN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; v&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  v<br>1. DDNS server&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  INTERNET&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  3. web server<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  |<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  v<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  2. Port Forwarding server<br><br>2. DDNS server, contacted by 1. Online 
  network tool, resolves URL
  <a href="http://phporacle.mooo.com:8083/">http://phporacle.mooo.com:8083/</a> 
  to the IP address 192.168.5.1 (=my home PC router) of 2. Port Forwarding 
  server. <br>1. Online network tool acts as a client and sends connection 
  request to 2. Port Forwarding Server, which redirects client to the IP 
  address 192.168.5.1 of the router of the Web server’s LAN. <br>Redirected 
  address includes the appropriate port (e.g., port 8083) and, in this case, 
  new address becomes &lt;router’s public IP address&gt;:8083. <br>Client 1.&nbsp; 
  Online network tool then connects to router and with the Virtual Servers 
  router configuration, the client eventually connects to 3. Web Server IP 
  address 192.168.5.101.<br><br>With port-forwarding disabled DDNS system (1) 
  resolves the Web server’s domain name to the public IP address of the Web 
  server’s router 192.168.5.1 and router, with its Virtual Servers service, 
  redirects the request to 3. Web Server.<br>In this case, a Port Forwarding 
  server was not interfered with and the <strong>Host field in packet remained 
  unchanged</strong>.<br><br>Test page network tool (e.g., tools.pingdom.com) 
  acts as a client to request a page from Web server. When Web server receives 
  the request, a sniffer (e.g., Wireshark) can be used to grab the packet from 
  the LAN segment on which the Web server is attached. It’s recommended to run 
  Wireshark twice: with port forwarding enabled and with port forwarding 
  disabled.<br><br>When port forwarding is enabled, the Host field in the 
  packet captured by Wireshark has already been altered by the Port Forwarding 
  server of the DDNS system. The server’s domain name has been replaced by the 
  public IP address of the server’s router. The Match Nickname option of the 
  Cherokee Host Match tab cannot be used in this case to match the virtual 
  server because the Host field of the packet does not contain the server’s 
  domain name (e.g., webserver.dynu.com) but instead contains the &lt;router’s 
  public IP address&gt;: &lt;port forwarding number&gt; pair.<br><br>We’ll use
  <a href="http://www.webpagetest.org">http://www.webpagetest.org</a> to view 
  the HTML pages from both virtual servers. <br>Recall that we are not using 
  the Port Forwarding server; therefore, we must include port numbers in the 
  URLs:&nbsp;
  <a href="http://phporacle.mooo.com:8083/">http://phporacle.mooo.com:8083/</a><br>
  <br><br><br>To examine the headers of the HTTP protocol online network tool 
  HTTP Viewer is no more available:<br>
  <a href="http://www.rexswain.com/httpview.html">
  http://www.rexswain.com/httpview.html</a>&nbsp;&nbsp; - 10 December 2017: 
  Due to abuse reported by the National Cybersecurity &amp; Communications 
  Integration Center (NCCIC), my ISP has disabled my HTTP Viewer. Thanks a 
  lot, hackers!<br><br />
  </li>
  <li><strong>Build Web sites </strong>: static HTML or dynamic PHP content and DB (eg MySQL). 
  Online tutorials : <a href="http://www.w3.org">http://www.w3.org</a>,&nbsp;
  <a href="http://www.w3schools.com">http://www.w3schools.com</a>... <br>PHP 
  page we create here is online network tool to <strong>display IP address of 
  the visitor</strong>.<br><br>Document Root directory is /var/www or 
  /usr/local/var/www for Ubuntu but this value can be changed. Eg page placed 
  in docs subdirectory of /var/www and therefore accessed with relative (to 
  the document root) name docs/page1.html :<br>&lt;A HREF=“docs/page1.html” 
  style=“font-size:200%”&gt;About Cherokee&lt;/A&gt;<br>Image link external to the site 
  is placed in the images subdirectory and is referred to with the relative 
  name images/cherokee.png :<br>&lt;A HREF=“http://cherokee-project.com/”&gt;<br>
  &lt;img src=“images/cherokee.png”&gt;<br>&lt;/A&gt;<br><br>
  C:\WINDOWS\system32&gt;j:<br>J:\&gt;cd J:\zwamp64\vdrive\.sys\mysql\bin<br>mysql 
  -u root -p<br>Enter password: ****<br>Welcome to the MySQL monitor. Commands 
  end with ; or \g.<br>Your MySQL connection id is 15<br>Server version:
  <strong>5.7.16</strong> MySQL Community Server (GPL)<br>Copyright (c) 2000, 
  2016, Oracle and/or its affiliates. All rights reserved.<br>Type 'help;' or 
  '\h' for help. Type '\c' to clear the current input statement.<br>mysql&gt;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  create database bookstore;<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  create table books(book_id int auto_increment primary key, title 
  varchar(255) not null, author varchar(255) not null);<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  or<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  create table books(book_id int auto_increment, title varchar(255) not null, 
  author varchar(255) not null, primary key(book_id));<br><br>use tema<br>show 
  tables;<br><span class="auto-style1">+----------------+</span><br class="auto-style1">
  <span class="auto-style1">| Tables_in_tema |</span><br class="auto-style1">
  <span class="auto-style1">+----------------+</span><br class="auto-style1">
  <span class="auto-style1">| admins&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  |</span><br class="auto-style1"><span class="auto-style1">| events&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  |</span><br class="auto-style1"><span class="auto-style1">| pages&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  |</span><br class="auto-style1"><span class="auto-style1">| song&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  |</span><br class="auto-style1"><span class="auto-style1">| subjects&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  |</span><br class="auto-style1"><span class="auto-style1">| users&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
  |</span><br class="auto-style1"><span class="auto-style1">+----------------+</span><br>
  6 rows in set (0.00 sec)
  
  
  <br><br>desc admins;
  <pre>
+-----------------+--------------+------+-----+---------+----------------+
| Field           | Type         | Null | Key | Default | Extra          |
+-----------------+--------------+------+-----+---------+----------------+
| id              | int(11)      | NO   | PRI | NULL    | auto_increment |
| first_name      | varchar(255) | YES  |     | NULL    |                |
| last_name       | varchar(255) | YES  |     | NULL    |                |
| email           | varchar(255) | YES  |     | NULL    |                |
| username        | varchar(255) | YES  | MUL | NULL    |                |
| hashed_password | varchar(255) | YES  |     | NULL    |                |
+-----------------+--------------+------+-----+---------+----------------+
6 rows in set (0.00 sec)</pre>
  insert into books (title, author) values (‘Waving The Web’, ‘Tim Berners 
  Lee’);<br>insert into books (title, author) values (‘Just for Fun’, ‘Linus 
  Torvalds’);<br>insert into books (title, author) values (‘How the Web was 
  Born’, ‘Gillies &amp; Cailliau’);<br><br>select * from <span class="auto-style1">
  users</span>;<br>select user_id, user_name from <span class="auto-style1">
  users </span>where user_name like “%%”;<br><br>To exit MySQL enter:<br>
  mysql&gt; \c<br>and then:<br>mysql&gt; exit<br><br><br><br>    
  
  </li>
</ol>

</body>

</html>
