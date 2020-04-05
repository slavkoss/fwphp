<?php
// L:\1_instalac\2_instalac_ora11g\forms_instalac\1_forms11\00_instalac_help\00oraForms11_1_2_2_0_instalac_moj.html
// J:\awww\www\fwphp\glomodul\help_sw\oracle\00oraForms11_1_2_2_0_instalac_moj.php
    define( 'STARTUP_TIME', microtime( true ) );
    //TRUE to get total memory allocated froms ystem, including unused pages.
    //If not set or FALSE only the used memory is reported. 
    define( 'STARTUP_MEMORY', memory_get_usage( true ) ); //currently allocated to PHP script
?>
<!DOCTYPE HTML>
<html lang="hr-HR"><head><title>INSTALAC Forms 11.1.2.2.0 (sep 2015)</title>
   <meta charset="utf-8">
   
   <!--link rel="shortcut icon" href="Other/Help/images/favicon.ico"-->
   <!--link rel="stylesheet" media="screen" href="/fwphp/zinc/themes/site/simplest.css" /-->
   
   <!--simplest.css localy :-->
  <style>
body {
  font-family: Verdana, Arial, Helvetica, sans-serif;
  /* width: 100%; */
      /* white-space: pre-wrap; */
      /* word-wrap: break-word; */
  font-size: 100%;
  color: #000;
  margin: 20px;
  background: #E6E8EA;
  text-align: center;
}
a {
  color: #3c3c3c;
  font-weight: bold;
}
a:link {
}
a:visited {
}
a:active {
}
a:hover {
  color: #000000;
}
h1, h2, h3, h4, h5, h6 {
  font-family: Arial, sans-serif;
  font-weight: normal;
}
h1 {
  color: #3c3c3c;
  font-weight: bold;
  letter-spacing: -2px;
  font-size: 2.2em;
  border-bottom: 2px solid silver;
  padding-bottom: 5px;
}
h2 {
  font-size: 1.5em;
  border-bottom: 1px solid silver;
  padding-bottom: 3px;
  clear: both;
}
h3 {
  font-size: 1.2em;
}
h4 {
  font-size: 1.1em;
}
h5 {
  font-size: 1.0em;
}
h6 {
  font-size: 0.8em;
}
img {
  border: 0;
}
ol, ul, li {
  font-size: 1.0em;
}
ol ol {
  list-style-type: lower-alpha;
}
p, table, tr, td, th {
  font-size: 1.0em;
}
pre {
  font-family: Courier New, Courier, monospace;
  font-size: 1.0em;
}
strong, b {
  font-weight: bold;
}
table, tr, td {
  font-size: 1.0em;
  border-collapse: collapse;
}
td, th {
  border: 1px solid #aaaaaa;
  border-collapse: collapse;
  padding: 3px;
}
th {
  background: #3667A8;
  color: #fff;
}
/* L O G O, C O N T E N T, F O O T E R  T R D L*/
.content {
  text-align: left;
  /*margin-top: 40px;*/
  margin-left: auto;
  margin-right: auto;
  /* width: 780px; */
  width: 80%;
  background-color: #FFFFFF;
  border-left: 1px solid Black;
  border-right: 1px solid Black;
  padding: 3px 7px 300px 7px;
  line-height: 150%;
}
.logo {
  background: #567C14; /* url("images/help_background_header.png") repeat-x; */
  color: white;
  /* width: 840px; */
  width: 76%;
  margin-top: 40px;
  margin-left: auto;
  margin-right: auto;
  text-align: left;
  border-right: 1px solid black;
  border-left: 1px solid black;
  padding: 12px 30px;
  line-height: 150%;
}
.footer {
  background: #000; /* url("images/help_background_footer.png") repeat-x; */
  color: white;
  width: 76%;
  height: 64px;
  margin-left: auto;
  margin-right: auto;
  text-align: left;
  border-right: 1px solid black;
  border-left: 1px solid black;
  padding: 12px 30px;
  line-height: 150%;
}
.logo img {
  padding-left: 0px;
  border: none;
  position: relative;
  top: -4px;
}
/*
    * html .content {
      width: 80%;
    }
    * html .logo, * html .footer {
      width: 80%;
    }
    .content h1 {
      margin: 0px;
    }
    h1.hastagline {
      border: 0;
    }
    h2.tagline {
      color: silver;
      clear: none;
      margin-top: 0em;
    }
*/




          /* T O P  DROPDOWN  M E N U  (row 1) */
#positioner {
  position: relative;
  width: 100%;
  height: 25px;
  /*align: center;*/
  background: #fff;
  margin-left: 0%;
  margin-right: 0%;
  padding: 1px 3px;
}
.holder {
  position: absolute;
  width: 105px;
  height: 25px;
  top: 0;
}
dl.menu {
  width: 250px;
  float: left;
  margin: -32000px 0 0 -9999px;
}
.p1 {
  left: 0%;
}
.p2 {
  left: 14.2%;
}
.p3 {
  left: 28.4%;
}
.p4 {
  left: 42.6%;
}
.p5 {
  left: 56.8%;
}
.p6 {
  left: 71%;
}
.p7 {
  left: 85.2%;
}
dl.menu a {
  display: block;
  height: 25px;
  font: normal 11px/25px verdana, sans-serif;
  text-decoration: none;
  text-indent: 10px;
  border-bottom: 1px solid #fff;
  border-left: 1px solid #fff;
}
dl.menu dt {
  float: left;
  padding: 0;
  position: relative;
  left: 9999px;
  z-index: 50;
  margin: 32000px 0 0 0;
}
dl.menu dt a {
  width: 124px;
  background: #aaa;
  float: left;
  color: #fff;
}
dl.menu dt a.sub {
  background: #888 url(dl-pullup/arrow.gif) no-repeat 110px center;
  color: #fff;
}
dl.menu dt a:hover,  dl.menu dt a:focus,  dl.menu dt a:active {
  margin-right: 1px;
  text-decoration: none;
  background-color: #888;
  color: #fc0;
}
dl.menu dd {
  float: left;
  padding: 0;
  margin: 0;
}
dl.menu dd.dd3 {
  height: 104px;
}
dl.menu dd.dd4 {
  height: 130px;
}
dl.menu dd.dd5 {
  height: 156px;
}
dl.menu dd:hover {
  clear: both;
}
dl.menu dd a {
  position: relative;
  height: 25px;
  background: #aaa;
  width: 124px;
  color: #fff;
  left: 9999px;
  top: -100%;
  z-index: 60;
}
dl.menu dd a:hover,  dl.menu dd a:focus,  dl.menu dd a:active {
  margin-right: 1px;
  background: #888;
  color: #fc0;
}
/* T O P  B U T T O N S  M E N U  (row 2) */
#hMenu {
  border-style: solid;
  border-color: #545454;
  border-width: 1px 0;
  width: 100%;
  height: 25px;
  background: #cbd1c3; /*no-repeat 15px 9px;*/ /* url(menuBullet1.gif) ; */
  /*padding: 0 0 0 5px;*/
  margin-left: 0%;
  margin-right: 0%; /*margin-right: auto;*/
}
#hMenu ul {
  margin: 0 0 0 -40px !important;
  /*margin: 0; */
  width: 100%;
  list-style: none;
  text-align: center;
  /* background: transparent url(menuBullet3.gif) no-repeat 650px 9px !important; */
  background: transparent no-repeat 615px 9px; /* url(menuBullet3.gif) ; */
}
#hMenu ul li {
  display: inline;/*padding: 0 0 0 23px;*/
        /* background: url(menuBullet2.gif) no-repeat 4px 6px !important; */
        /* background: url(menuBullet2.gif) no-repeat 4px 9px; */
}
/* whole row */
#hMenu ul li#frst {
  padding: 0;
  background: none !important;
}
#hMenu ul li a {
  color: darkgreen;
  font: bold 14px/25px Georgia, Times New Roman, Times, serif;
  text-decoration: none;
  padding: 3px 8px;
}
#hMenu ul li a:hover {
  text-decoration: none;
  background-color: #e1e5db;
}

/* PRINTER STYLES */
@media print {
body, .content {
  margin: 0;
  padding: 0;
}
.navigation, .locator, .footer a, .message, .footer-links {
  display: none;
}
.footer, .content, .header {
  border: none;
}
a {
  text-decoration: none;
  font-weight: normal;
  color: black;
}
}
.auto-style1 {
  background-color: #FFFF00;
}
  .auto-style2 {
    font-weight: bold;
  }
  .auto-style3 {
    font-weight: normal;
  }
  .auto-style4 {
    color: #FF0000;
  }
  .auto-style5 {
    font-family: Verdana, Arial, Helvetica, sans-serif;
  }
  .auto-style6 {
    color: #FF00FF;
  }
  .auto-style7 {
 background-color: #FFFF00;
 font-weight: normal;
}
  .auto-style8 {
 text-decoration: none;
}
  </style></head><body>

<div class="logo">
  <h2><span>INSTAL</span> Oracle Forms 11.1.2.2.0 (september 2015) &nbsp;</h2>
    
    <!--img src="Other/Help/images/help_logo_top.png" width="211" height="47"--> 
    
</div>
  <!-- E N D  11111 div class="logo" -->

<div class="content">
    
    <!--      1. T O P  DROPDOWN  M E N U  (row 1) (Banner)         -->
    <div id="positioner">
    <div class="holder p1">
      <dl class="menu">
        <dt><a href="#url">HOME</a>
          <!-- submenu items-->
          <!--dd class="dd1"> 
            <a href="#download">Intro, downl.</a>
          </dd-->
            </dt>
      </dl>
    </div>
      
      
      
      <!-- submenu -->
        <div class="holder p2">
      <dl class="menu">
          <!-- submenu -->
              <dt><a class="sub" href="#download">1. Download 1/8</a>
          <!-- submenu items-->
          <!--dd class="dd1"> 
            <a href="#download">Intro, downl.</a>
          </dd-->
            </dt>
      </dl>
    </div>
    <div class="holder p3">
      <dl class="menu">
        <dt><a class="sub" href="#oradbinstalac">11g XE inst 2/8</a>
          <!--dd class="dd5">
          <a href="#url">1aaaaaaaa</a>
          </dd-->
            </dt>
      </dl>
    </div>
    <div class="holder p4">
      <dl class="menu">
        <dt><a class="sub" href="#url">WLS app server 3/8</a></dt>
        <dd class="dd2"><a href="#wlsinstalac_jdk64">jdk-7u80-win 64bit 
        exe</a> <a href="#url">wls1036_generic.jar</a> </dd>
      </dl>
    </div>
    <div class="holder p5">
      <dl class="menu">
        <dt><a class="sub" href="#frmrepinstalac">F, R instal 4/8</a>
          <!--dd class="dd3">
           <a href="#frmrepinstalac">...disk1_1of2.zip</a>
          </dd-->
            </dt>
      </dl>
    </div>
    <div class="holder p6">
      <dl class="menu">
        <dt><a href="#url">2. Frms verify 5/8</a></dt>
        <dd class="dd2"><a href="#frmsverify">Verify Forms inst.</a>
        <a href="#repsverify">Verify Rep. inst.</a> <a href="#crerepsvr">
        Standalone rep.s.</a> </dd>
      </dl>
    </div>
    <div class="holder p7">
      <dl class="menu">
        <dt><a href="#url">3. Cre frm &amp; rep</a></dt>
        <dd class="dd2"><a href="#javawebstartlauncher">J. Web Start 
        (9/8)</a> <a href="#crefrm">Cre frm (6/8)</a> <a href="#crerep">
        Cre rep (7/8)</a> <a href="#callrep">Call rep (8/8)</a> </dd>
      </dl>
    </div>
  </div>
    
    <!--                    1. izbornik 2.redak (Banner)                       -->
    <div id="hMenu">
    <ul>
      <li id="frst"><a href="">POČETAK</a> <a href="#">O PROGRAMU</a>
      <a href="#">OPREMA</a> <a href="#">LOKACIJE KONTAKT</a> <a href="#">
      AAAAAAAA</a> <a href="#">BBBBBBBB</a> <a href="#">CCCCCCCC</a> </li>
    </ul>
  </div>
    <!--                    E N D  T O P  (row 1,2)               --> 
    
    
    
    
    
    <!--           C O N T E N T             -->
    <p>&nbsp;</p>
  <h2 style="color: lightgray;">Oracle Forms&amp;Rep 11.1.2.2.0 Mohamad`s 
  installation tutorial on Win 10 64 bit, Oracle 11g XE 64 bit </h2>
  <p>&nbsp;</p>
  <h2>Summary of convert <span class="auto-style3"> 
      &nbsp;Forms 6i -&gt; Forms 11</span>&nbsp; &amp; run fmx</h2>
  <span class="auto-style3">
  <p>- javaws.exe is like <strong>ifrun.exe</strong> for Forms 6i<br>- 
      02_test_tipdok.jnlp is XML ~20 rows, contains <strong>
      module=D:\ASG\POSSYS11\tipdok.fmx</strong> 
    (J:\apl\possys11\forms\TEST_F11.fmx)</p>
  </span>
  <ol>
    <li>Remote 
      desktop -&gt; slavko-win7 -&gt; icon
    "<strong>Start Weblogic admin server</strong>"<br>
    Store  in file :<br>
    C:\Oracle\Middleware\user_projects\domains\ClassicDomain\servers\AdminServer\security\<strong>boot.properties </strong>    username=weblogic<br>
    password=...&nbsp; &nbsp;  (mypswx2)&nbsp; which first run encrypts to (slavko doma):<br>
    <br>
    #Mon Oct 15 10:45:04 CEST 2018<br>
    password={AES}u+Uv/Y3+X0bEqFnVENS013ycjmroDCR9qhk7gbovBp4\=<br>
    username={AES}RaupDbjivoAI3r7TZp1nTbhyPureTQLDNaBKh0+yRfQ\=
    <br>
    <br>
    <p>When you run your form by pressing Ctrl+R, you get FRM-10142 because of the following two cases :</p>
    <ol>
      <li>The Weblogic Server is not running</li>
      <li>The Weblogic Server is running but your port number is not truly defined in Runtime Preferences of Forms. It's mostly defined 7001 as default, in your case it's 9001. The current setting of port number can be seen from last lines of startWebLogic.cmdcommand's screen<br>
        ( where you see string RUNNING provided you're successfull to run ) :</li>
    </ol>
<br>
    <br>
    </li>
    <li><strong><em>JAVA APPLET BROWSER PLUGIN </em></strong><br>
      shows 
      C:\Oracle\Middleware\Oracle_FRHome1\forms\test.fmx:<br>&nbsp;&nbsp;&nbsp;&nbsp; click IE 11 icon in taskbar (C:\Program 
      Files\Internet Explorer\iexplore.exe)<br>
      &nbsp;&nbsp;&nbsp;&nbsp; 
      click Test F11 in IE 11 favorites bar : <a href="http://slavko-win7:7001/forms/frmservlet" target="_blank">http://slavko-win7:7001/forms/frmservlet</a><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RUNS 
     C:\Oracle\Middleware\Oracle_FRHome1\forms\test.fmx<br>
      &nbsp; &nbsp; or http://slavko-win7:7001/forms/frmservlet?form=ugovor RUNS ugovor.fmx&nbsp;  in dir <br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; C:\Oracle\Middleware\Oracle_FRHome1\forms\ugovor.fmx <br>
      &nbsp; &nbsp; &nbsp; &nbsp; slavko doma: http://sspc1:7001/forms/frmservlet?form=TEST_F11<br>
      &nbsp; &nbsp; <strong>BETTER:</strong> <a href="http://slavko-win7:7001/forms/frmservlet?config=ugovor">http://slavko-win7:7001/forms/frmservlet?config=ugovor</a> RUNS  if we do this :<br>
      <em>C:\Oracle\Middleware\user_projects\domains\ClassicDomain</em>\config\fmwconfig\servers\AdminServer\applications\formsapp_11.1.2\config\<strong>formsweb.cfg<br>
      </strong><em>$DOMAIN_HOME</em>/config/fmwconfig/servers/<strong>WLS_FORMS</strong>/applications/formsapp_11.1.2/config ?<br>
      <pre>[<strong>ugovor</strong>]<br>form=ugovor.fmx<br>pageTitle=TEST_F11.fmx<br>workingDirectory=D:asg\possys11\   (J:\apl\possys11\forms\)<br>userid=mercedes/m1@slavko-win7     (mercedes/m1@ora11)<br>separateFrame=true<br>imageBase=codebase<br>archive=frmall.jar,my_icons.jar<br>#envFile=/path/to/myapp.env<br>...<br># Forms applet parameter 1024<br><strong>width</strong>=1200<br># Forms applet parameter 768<br>height=650<br>...<br><strong>colorScheme</strong>=swan</pre>
or <a href="http://slavko-win7:7001/forms/frmservlet?config=ugovor">http://slavko-win7:7001/forms/frmservlet?config=ugovor</a>&amp;width=1024&amp;height=768<br>
<br>
see :<br>
<a href="https://oracle-base.com/articles/11g/oracle-forms-and-reports-11gr2-configuration-notes">https://oracle-base.com/articles/11g/oracle-forms-and-reports-11gr2-configuration-notes</a><br>
<a href="https://docs.oracle.com/cd/E24269_01/doc.11120/e24477/basics.htm#FSDEP134">https://docs.oracle.com/cd/E24269_01/doc.11120/e24477/basics.htm#FSDEP134</a><br>
<a href="https://docs.oracle.com/cd/E24269_01/doc.11120/e24477/basics.htm#FSDEP135">https://docs.oracle.com/cd/E24269_01/doc.11120/e24477/basics.htm#FSDEP135</a><br>
<br>
FORMS_PATH (regedit) is:<br>
C:\Oracle\Middleware\Oracle_FRHome1\forms;C:\Oracle\Middleware\asinst_1\FormsComponent\forms
<br>
<br>
eg http://example.com:8888/forms/frmservlet?config=myapp&amp;form=hrapp<br>
&nbsp; <br>
<br>
    </li>
    <li><strong><em>WEBSTART IS BETTER THAN JAVA APPLET BROWSER PLUGIN</em><br>
      shows fmx-s in 
     eg D:\ASG\POSSYS11 :<br>
    </strong>&nbsp;&nbsp;&nbsp;&nbsp; 
      click icon 03_test.jnlp 32bit JDK 1.8 javaws.exe<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      RUNS C:\Oracle\Middleware\Oracle_FRHome1\forms\test.fmx<br>&nbsp;&nbsp;&nbsp;&nbsp; 
      click icon <strong>02_test_tipdok_launcher.jnlp 32bit JDK 1.8 
      javaws.exe</strong>&nbsp; <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; conn <span class="auto-style6">
      <a href="mailto:mercedes/m1@asg-razvoj/xe" class="auto-style8">mercedes/m1@asg-razvoj/xe</a></span><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      RUNS 
      <a href="file:///D:/ASG/POSSYS11/tipdok.fmx" class="auto-style8">D:\ASG\POSSYS11\tipdok.fmx</a> - 
      <strong>CRUD-works !</strong> rows 
      of table t_tip_doc&nbsp; <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -
      <span class="auto-style6"><strong>F11 is 
      F7 in F6i, ctrl+F11 is F8 in F6i...</strong></span><br>&nbsp;&nbsp;&nbsp;&nbsp; 
      ikonu 01_... za ugovor.fmx nisam stigao<br>&nbsp;&nbsp;&nbsp;&nbsp;  
    icon "Stop Weblogic admin server"<br>&nbsp;&nbsp;&nbsp;&nbsp; </li>
    <li><span class="auto-style3"> 
      In <strong>Forms builder</strong> I did : <br>Edit -&gt; Preferences 
      -&gt; Runtime :<br>App server URL :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <a href="http://SLAVKO-WIN7:7001/forms/frmservlet">
        http://SLAVKO-WIN7:7001/forms/frmservlet</a><br>Web browser location 
      : C:\Program Files\Internet Explorer\iexplore.exe<br>
      <a href="file:///D:/ASG/POSSYS11/tipdok.fmb"><strong>
        D:\ASG\POSSYS11\</strong><span class="auto-style6"><strong>tipdok.fmb</strong></span></a>&nbsp;&nbsp; 
      conn:&nbsp;&nbsp; <span class="auto-style6"><strong>
        <a href="mailto:mercedes/m1@asg-razvoj/xe">mercedes/m1@asg-razvoj/xe</a>&nbsp;&nbsp;&nbsp; 
        <br>
        &nbsp;&nbsp;&nbsp;&nbsp; ctrl+s&nbsp;&nbsp;
        shift+ctrl+k&nbsp;&nbsp;&nbsp; ctrl+t - </strong>same as </span></span><span class="auto-style6"> 
          F6i - no problems</span>
      <br>&nbsp;
    </li>
    <li><strong>Instalac. files and Help instalac Forms 11</strong> 
      : 
      <br>D:\ASG\1_instalac\1_ora_instalacija_help\forms11\00_instalac_help_forms11\<strong>00ora 
        Forms 11_1_2_2_0_instalac_moj.html</strong>
    </li>
  </ol>
  <span class="auto-style3">
  </span>
    <p>&nbsp;</p>
    <p>see <a href="https://blogs.oracle.com/stevenchan/java-web-start-now-available-for-ebs-121-and-122">https://blogs.oracle.com/stevenchan/java-web-start-now-available-for-ebs-121-and-122</a><br>
    </p>
    <p><strong>works in F11</strong>:         &quot;C:\Program Files (x86)\Java\jdk1.8.0_92\bin\javaws.exe&quot; -localfile J:\apl\possys11\forms\02_test_F11.jnlp</p>
    <p>&nbsp;</p>
    <h2><span class="h2_csscls">1.1.1 Intro, download, instalac. steps</span></h2>
  <h2>I installed this 2018.08.0<span lang="hr">5</span></h2>
  <p>Why this tutorial for Forms 11.1.2.2.0 (September 2015) <span lang="hr">
  &nbsp;and not for newest </span>&nbsp;Forms 12.2.1.3.0<span lang="hr"> :</span></p>
  <ol>
    <li class="auto-style2"><span class="auto-style3">Se below <span lang="hr">"Eight videos"</span>
    <span lang="hr">-</span></span><strong><span class="auto-style3" lang="hr"> </span></strong> 
        <span class="auto-style3"><strong>BEST</strong> !<span lang="hr"> 
    But I think not needed, because pictures-style tutorials like this are 
    better.</span><br>
    Published on Jul 1, 2016</span><span lang="hr"><span class="auto-style3">,&nbsp; "Oracle Forms &amp; Reports 
    Builder Tutorial", Author </span> <strong><span class="auto-style3">Muhammad Abid</span></strong><span class="auto-style3">, channel 
        </span> </span>
    <p><span lang="hr"><a href="http://mabidpk.blogspot.com/">
    <span class="auto-style3">http://mabidpk.blogspot.com/</span></a><span class="auto-style3">.</span></span></p><span class="auto-style3">
    <span lang="hr">Thank you Mohamad !</span><br>
    </span>
    </li>
    <li>&nbsp;No tutorial for Forms 12.2.1.3.0<span lang="hr">, 
    and DB 11g XE</span> on inet. <br>
    </li>
    <li>&nbsp;fmw-1212certmatrix-1970069.xls <span lang="hr">
    for Forms 12 </span>says:&nbsp; "No support with Oracle DB XE" </li>
  </ol>
  <p>This file is 00ora Forms 11_1_2_2_0 instalac moj.html <br>
  </p>
  <div class="auto-style2">
    <br>
    Forms instalac :<br>
    <strong>usr=weblogic, psw=MYPSWx2</strong> <br>
    &nbsp;&nbsp;&nbsp;&nbsp; - needed for stop/start WLS (WebLogic appl.Server)<br>
  </div>
  <div class="auto-style2">
    <!--h2>page_title2</h2-->
    <!--// -----------
          // home page CONTENT or  C R U D  F O R M S or any html between hdr and ftr :
          // ----------- -->
      <p>&nbsp;</p>
    <p>&nbsp;</p>
    <h2 class="auto-style2">&nbsp;DB 11g XE and SQL Developer Downloads &amp; 
    inst.steps</h2>
    <ol>
      <li>Download Oracle Database Express Edition 11g Release 2, June 4, 
      2014 <br>
      <strong>1_OracleXE112_Win64.zip, 324 MB</strong> <br>
      <a href="http://www.oracle.com/technetwork/database/enterprise-edition/downloads/index.html">
      <span class="auto-style3">http://www.oracle.com/technetwork/database/enterprise-edition/downloads/index.html</span></a>
            
      <a href="http://www.oracle.com/technetwork/database/database-technologies/express-edition/downloads/index.html">
      <span class="auto-style3">http://www.oracle.com/technetwork/database/database-technologies/express-edition/downloads/index.html
      </span>
      </a><span class="auto-style3"><br>
      see
      </span>
      <a href="https://www.oracle.com/database/technologies/appdev/xe.html">
      <span class="auto-style3">https://www.oracle.com/database/technologies/appdev/xe.html</span></a>
      <br>
      <span style="font-weight: bold; color: rgb(0, 153, 0);">sqlplus /nolog</span><br>
      <span style="font-weight: bold; color: rgb(0, 153, 0);">conn sys/MYPSW as SYSDBA</span><span class="auto-style3"><br>
    DB XE Client sql*plus Releases  on my home PC :<br>
    <span style="font-weight: normal; color: rgb(0, 153, 0);">sql*plus 11.2.0.2.0 :</span>&nbsp;C:\<strong>oraclexe</strong>\app\oracle\product\11.2.0\server\bin\sqlplus.exe /nolog<br>
&nbsp;&nbsp;&nbsp;&nbsp; all three work : conn sys/MYPSW<strong>@XE</strong> as SYSDBA 
      and conn sys/MYPSW<strong>@ora7</strong> as SYSDBA<br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>conn sys / as SYSDBA</strong> (also without &quot;/&quot;)<br>
    <span style="font-weight: normal; color: rgb(0, 153, 0);">sql*plus 12.2.0.1.0 :</span> C:\<strong>ora_odt_odac12_2\product\12.2.0\client_1</strong>\sqlplus.exe /nolog <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - both XE, ora7 NOT WORKING !&nbsp; NOT WORKING : conn sys / as SYSDBA<br>
Older, not so good :
<br>
      <span style="font-weight: normal; color: rgb(0, 153, 0);">sql*plus 11.1.0.7.0 :</span> 
      C:\Oracle\<strong>Middleware\Oracle_FRHome1</strong>\BIN\sqlplus.exe /nolog <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - both XE, ora7  NOT WORKING ! but works conn 
      sys/MYPSW@sspc1/XE as SYSDBA !!!<br>
      <span style="font-weight: normal; color: rgb(0, 153, 0);">sql*plus 10.1.0.4.2 :</span>&nbsp; C:\<strong>OraDS10Home1</strong>\BIN\sqlplus.exe 
      /nolog <strong>or GUI</strong><br>
&nbsp;&nbsp;&nbsp;&nbsp; - both XE, ora7  NOT WORKING !&nbsp;&nbsp; conn 
      sys/MYPSW@sspc1 as SYSDBA&nbsp; NOT WORKING !<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; works conn hr/hr@ora7<br>
      Instant client is not needed at home PC ;<br>
      <a href="https://www.oracle.com/technetwork/topics/winx64soft-089540.html" target="_blank">https://www.oracle.com/technetwork/topics/winx64soft-089540.html</a>&nbsp;<br>
      </span><br>
      <p>listener.ora,&nbsp; tnsnames.ora<br>
      lsnrctl status&nbsp; (CLI as admin)<br>
      lsnrctl start</p>
      <br>
      </li>
      <li>Download Oracle SQL Developer Windows 64-bit with JDK 9 included
      <br>
      Version 18.2.0.183.1748,&nbsp;&nbsp; July 3, 2018 <br>
      2<strong>_sqldeveloper-18.2.0.183.1748-x64.zip, 424 MB</strong>&nbsp;
      <br>
      <p>
      <a href="http://www.oracle.com/technetwork/developer-tools/sql-developer/downloads/index.html">
      <span class="auto-style3">http://www.oracle.com/technetwork/developer-tools/sql-developer/downloads/index.html
      </span>
      </a></p>
      <br>
      </li>
    </ol>
    <h2>Oracle Fusion Middleware SW Downloads &amp; inst. steps 01, 02, 03</h2>
    <ol>
      <li><span class="auto-style7"><strong>JDK</strong></span><span class="auto-style3"> Java Archive Downloads - Java SE 8 <br>
      </span>
      <strong>
      <a href="http://www.oracle.com/technetwork/java/javase/downloads/java-archive-downloads-javase7-521261.html" target="_blank">
            <span class="auto-style3">http://www.oracle.com/technetwork/java/javase/downloads/java-archive-downloads-javase7-521261.html&nbsp;
      </span>
      </a> </strong><span class="auto-style3">
      <strong>
      <br> </strong></span>
      <strong>
      <span class="auto-style3">01_jdk-7u80-windows-x64.exe, 140.09 MB, 
        </span> </strong><span class="auto-style3">&nbsp; 
      </span> 
      <strong>
      <span class="auto-style3">64 bit </span> </strong>
            <span class="auto-style3"><br> 
      <br>
      
      </span>
      
      <a href="http://www.oracle.com/technetwork/java/javase/downloads/java-archive-javase8-2177648.html" target="_blank">
            <span class="auto-style3">http://www.oracle.com/technetwork/java/javase/downloads/java-archive-javase8-2177648.html
      </span>
      </a><span class="auto-style3"><br></span>
            <strong class="auto-style3">04_jdk-8u92-windows-i586.exe, 188.43 MB,&nbsp;&nbsp; 
      32 bit </strong><span class="auto-style3"><br>
      </span>
      </li>
      <li><span class="auto-style7"><strong>WLS</strong></span><span class="auto-style3"> - Oracle WebLogic Server 10.3.6,&nbsp; Installers with Oracle 
      WebLogic Server and Oracle Coherence&nbsp; - Generic (997 MB) <br>
      </span>
      <a href="http://download.oracle.com/otn/nt/middleware/11g/wls/1036/wls1036_generic.jar">
      <span class="auto-style3">http://download.oracle.com/otn/nt/middleware/11g/wls/1036/wls1036_generic.jar</span></a><span class="auto-style3">&nbsp;
      <br>
      </span>
      <a href="http://www.oracle.com/technetwork/middleware/weblogic/downloads/wls-main-097127.html">
      <span class="auto-style3">http://www.oracle.com/technetwork/middleware/weblogic/downloads/wls-main-097127.html</span></a>
      <span class="auto-style3">
      <br>
      </span>
      <strong><span class="auto-style3">02_wls1036_generic.jar,&nbsp; 997 MB</span></strong><span class="auto-style3">&nbsp;&nbsp; <br>
      <br>
      </span>
      </li>
      <li><span class="auto-style7"><strong>F&amp;R</strong></span><span class="auto-style3"> Download Oracle Forms and Reports 11g Release 2&nbsp; Released: 
      01/2014<br>
      
      </span>
      
      <a href="http://www.oracle.com/technetwork/developer-tools/forms/downloads/forms-downloads-11g-2735004.html">
      <span class="auto-style3">http://www.oracle.com/technetwork/developer-tools/forms/downloads/forms-downloads-11g-2735004.html</span></a>
      <span class="auto-style3">
      <br>
      </span>
      <strong><span class="auto-style3">03_01_ofm_frmrpts_win_11.1.2.2.0_64_disk1_1of2.zip, 1233 MB</span></strong><span class="auto-style3"> 
      = last Forms&amp;Rep 11g<br>
      </span>
      <strong><span class="auto-style3">03_02_ofm_frmrpts_win_11.1.2.2.0_64_disk1_2of2.zip, 1020 MB</span></strong>
      <br>
      </li>
    </ol>
    <p>&nbsp;</p>
    <h2><strong>Based on Muhammad Abid</strong>`s 9 videos :</h2>
    <ol>
      <li><span class="auto-style3">&nbsp;Downloading Oracle 11g SW&nbsp;
      </span>
      <a href="https://www.youtube.com/watch?v=4tgtHPJGc7o"> 
            <span class="auto-style3">https://www.youtube.com/watch?v=4tgtHPJGc7o 
            </span> </a>
      <span class="auto-style3">&nbsp;</span></li>
      <li><span class="auto-style3">Installing Oracle Database Express Edition 11g R2
        </span>
        <a href="https://www.youtube.com/watch?v=UfHBpCZQ2ak"> 
          <span class="auto-style3">https://www.youtube.com/watch?v=UfHBpCZQ2ak</span></a>
      </li>
      <li>
      <span class="auto-style3">&nbsp;Installing Ora. WLS (WebLogic appl.Server) 11gR1 10.3.6
      </span>
      <a href="https://www.youtube.com/watch?v=V28grNBv0VQ">  
            <span class="auto-style3">https://www.youtube.com/watch?v=V28grNBv0VQ 
            </span> </a>
      <span class="auto-style3">
      <br>
      </span></li><li>
      <span class="auto-style3">&nbsp;Installing and Configuring Oracle Forms and Reports 11gR2 
      (11.1.2.2.0)
      </span>
      <a href="https://www.youtube.com/watch?v=XTLBJ2_6A2c"> 
            <span class="auto-style3">https://www.youtube.com/watch?v=XTLBJ2_6A2c 
            </span> </a>
      <span class="auto-style3">
      <br>
      __________________________________<br>
      </span></li><li>
      <span class="auto-style3">Verifying Oracle Forms and Reports Installation and&nbsp; 
      Configuration </span> <a href="https://www.youtube.com/watch?v=ZeXUsWMmjCk">
      <span class="auto-style3">https://www.youtube.com/watch?v=ZeXUsWMmjCk</span></a><span class="auto-style3"><br>
      </span></li><li>
      <span class="auto-style3">&nbsp;Creating a Form Using Oracle Forms Builder
      </span>
      <a href="https://www.youtube.com/watch?v=XGuNn0JXtPM">
      <span class="auto-style3">https://www.youtube.com/watch?v=XGuNn0JXtPM 
        </span> </a>
      </li>
      <li><span class="auto-style3">&nbsp;Creating a Report Using Oracle Reports Builder
      </span>
      <a href="https://www.youtube.com/watch?v=4bh1NyqmSpQ">
      <span class="auto-style3">https://www.youtube.com/watch?v=4bh1NyqmSpQ</span></a></li>
      <li><span class="auto-style3">&nbsp;Integrating Oracle Reports with Oracle Forms
      </span>
      <a href="https://www.youtube.com/watch?v=E0YiYoNIemg">
      <span class="auto-style3">https://www.youtube.com/watch?v=E0YiYoNIemg</span></a></li>
      <li><span class="auto-style3">Running Oracle Forms 11g Applications Using Java Web Start 
      Launcher, No Any Web Browser Required<br>
      </span>
      <a href="https://www.youtube.com/watch?v=L7l0UeEjCDU" target="_blank">
      <span class="auto-style3">https://www.youtube.com/watch?v=L7l0UeEjCDU</span></a> <br>
      </li>
    </ol>
    <div class="mybrown cms_main">
      <a id="download"></a>
      <h2>&nbsp;</h2>
      <h2>&nbsp;</h2>
      <h2>Instalac steps 01,02,03 &amp; Downloads</h2>
    </div>
    <p>
    <img alt="1 of 8 - 03 Download my.jpg" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%281%20of%208%29%20-%2003%20Download%20my.jpg" height="411" width="673"></p>
    <p>&nbsp;Pic 1 of 8 - 03 <strong>Slavko doma downloads </strong><span lang="hr"><strong>
    and instalac steps<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 1 of 8 = 
    video ord.no 1 of&nbsp; 8 videos,&nbsp;&nbsp; 03 is picture ord.no for 
    video 1 of 8<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ASG :&nbsp; PC 
    slavko-win7&nbsp;&nbsp; D:\ASG\1_instalac\1_ora_instalacija_help\forms11</strong></span></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <div class="mybrown cms_main">
      <h2>&nbsp;</h2>
      <h2>&nbsp;</h2>
      <a id="oradbinstalac"></a>
      <h2 class="h2_csscls">1.2.1 Instalac ora DB XE 11g R2 (video 1/8)</h2>
    </div>
    <p>
    <img alt="(2 of 8 - 01  Inst ora DB XE 11g R2" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%282%20of%208%29%20-%2001%20%20Inst%20ora%20DB%20XE%2011g%20R2.jpg" height="310" width="752"></p>
    <p>Pic 2 of 8 - 01 <strong>Inst ora DB XE 11g R2 - 
    1_OracleXE112_Win64.zip</strong>&nbsp; </p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>
    <img alt="2 of 8 - 02  Inst SQL Developer" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%282%20of%208%29%20-%2002%20%20Inst%20SQL%20Developer.jpg" height="510" width="932"></p>
    <p>Pic 2 of 8 - 02 <strong>Inst SQL Developer - 
    2_sqldeveloper-18.2.0.183.1748-x64.zip</strong>&nbsp; </p>
    <p>&nbsp;</p>
    <div class="mybrown cms_main">
      <h2>&nbsp;</h2>
      <h2>&nbsp;</h2>
      <h2>&nbsp;</h2>
      <p>&nbsp;</p>
      <h2>&nbsp;</h2>
      <a id="wlsinstalac_jdk64"></a>
      <h1>1.3 Instalac ora WLS 11g R1 10.3.6. (WebLogic 
      appl. Server) (video 2/8)</h1>
    </div>
    <p>
    <img alt="3 of 8 - 01 Inst Ora WLS 11g R1 10.3.6. - jdk64 - what" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%283%20of%208%29%20-%2001%20Inst%20Ora%20WLS%2011g%20R1%2010.3.6.%20-%20jdk64%20-%20what.jpg" height="411" width="673"></p>
    <p>Pic 3 of 8 - 01 <strong>Instalac (2click)&nbsp; 
    01_jdk-7u80-windows-x64.exe = what<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    for Ora WLS 11g R1 10.3.6. - run as admin</strong></p>
    <p>&nbsp;</p>
    <p>
    <img alt="3 of 8 - 02 Inst Ora WLS 11g R1 10.3.6. - jdk64 - where" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%283%20of%208%29%20-%2002%20Inst%20Ora%20WLS%2011g%20R1%2010.3.6%20-%20jdk64%20-%20where.jpg" height="268" width="733"></p>
    <p>Pic 3 of 8 - 02 <strong>Inst&nbsp; 01_jdk-7u80-windows-x64.exe = 
    where<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    for Ora WLS 11g R1 10.3.6.</strong></p>
    <p>&nbsp;</p>
    <a id="wlsinstalac_jar"></a>
    <p>
    <img alt="3 of 8 - 03 Inst Ora WLS 11g R1 10.3.6. - CLI wls jar" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%283%20of%208%29%20-%2003%20Inst%20Ora%20WLS%2011g%20R1%2010.3.6%20-%20CLI%20wls%20jar.jpg" height="337" width="255"></p>
    <p>Pic 3 of 8 - 03 <strong>Inst Ora WLS 11g R1 10.3.6. - 
    02_wls1036_generic.jar - CLI </strong>a<span class="auto-style2">s admin 
    on win10 <br>&nbsp;&nbsp;&nbsp;&nbsp; or winkey -&gt; cmd -&gt; right click -&gt; 
    run as admin</span></p>
    <p>&nbsp;</p>
    <p>
    <img alt="3 of 8 - 04 Inst Ora WLS 11g R1 10.3.6. - CLI wls jar" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%283%20of%208%29%20-%2004%20Inst%20Ora%20WLS%2011g%20R1%2010.3.6%20-%20CLI%20wls%20jar.jpg" height="496" width="809"></p>
    <p>Pic 3 of 8 - 04,05,06 <strong>Inst Ora WLS 11g R1 10.3.6. - 
    02_wls1036_generic.jar - CLI jar </strong>- <strong>Open CLI admin</strong> 
    and type :</p>
    <pre><strong>Open CLI admin <span class="auto-style2">winkey -&gt; cmd -&gt; right click -&gt; run as admin</span></strong>
c:
cd C:\Program Files\Java\jdk1.7.0_80\bin   (64 bit we need to install WLS)<strong>
</strong><span class="auto-style3"><strong>java -jar D:\ASG\1_instalac\1_ora_instalacija_help\forms11\02_wls1036_generic.jar<br></strong></span><strong>Slavko doma : java -jar</strong> L:\1_instalac\2_instalac_ora11g\forms_instalac\1_forms11\<strong>02_wls1036_generic.jar</strong> </pre>
    <p>Statement above&nbsp;&nbsp;<strong>open Oracle installer - Weblogic 
    10.3.6.0<br>
    click "Next" to open next window Pic 3 of 8 - 07 :</strong></p>
    <p>&nbsp;</p>
    <p>
    <img alt="3 of 8 - 07" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%283%20of%208%29%20-%2007%20Inst%20Ora%20WLS%2011g%20R1%2010.3.6%20-%20wls%20jar%20-%20MW%20Home.jpg" height="430" width="593"></p>
    <p>Pic 3 of 8 - 07 <strong>Inst Ora WLS 11g R1 10.3.6. - 
    02_wls1036_generic.jar - MW Home is in C:\Oracle\Middleware</strong></p>
    <p>&nbsp;</p>
    <p>
    <img alt="3 of 8 - 08" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%283%20of%208%29%20-%2008%20Inst%20Ora%20WLS%2011g%20R1%2010.3.6%20-%20wls%20jar%20security%20upd.jpg" height="424" width="591"></p>
    <p>Pic 3 of 8 - 08,09,10,11 <strong>Inst Ora WLS 11g R1 10.3.6. - 
    02_wls1036_generic.jar <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    Security updates<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    1/4 stupid windows - click "Next"<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    2/4 stupid windows - click "Yes"<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    3/4 stupid windows - click "Yes"<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    4/4 stupid windows - check "I wish remain uninformed" an click "Continue"</strong></p>
    <p>&nbsp;</p>
    <p>In next window<strong> "WLS installation type"&nbsp; select "Typical" 
    and click "Next" to open next window :</strong></p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>
    <img alt="3 of 8 - 13" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%283%20of%208%29%20-%2013%20Inst%20Ora%20WLS%2011g%20R1%2010.3.6%20-%20wls%20jar.jpg" height="429" width="936"></p>
    <p>Pic 3 of 8 - 13,14,15 <strong>Inst Ora WLS 11g R1 10.3.6. - 
    02_wls1036_generic.jar - </strong>click "Next"<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <strong>"Browse" button is used if we have more JDK installations</strong>.</p>
    <p>&nbsp;</p>
    <p>In next window "Product instal. directories" leave :<br>MW Home : 
    C:\Oracle\Middleware<br>WLS : C:\Oracle\Middleware\wlserver_10.3<br>
    Oracle Coherence: C:\Oracle\Middleware\coherence_3.7<br>and <strong>&nbsp;</strong>click "Next"</p>
    <p>In next window<strong> "WLS shortcut" </strong>&nbsp;Select "All users" 
    Start Menu folder (or "Local users") and click "Next" to open Summary 
    window on next pocture.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    (see Pic 3 of 8 - 19&nbsp; = Win Start menu = Winkey menu -&gt; instaled 
    Oracle Weblogic appl.server is under letter O)</p>
    <p>
    <img alt="3 of 8 - 16" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%283%20of%208%29%20-%2016%20Inst%20Ora%20WLS%2011g%20R1%2010.3.6%20-%20wls%20jar.jpg" height="423" width="595"></p>
    <p>Pic 3 of 8 - 16,17,18 <strong>Inst Ora WLS 11g R1 10.3.6. - 
    02_wls1036_generic.jar - click "Next"</strong></p>
    <p><strong>Last window&nbsp; <span class="auto-style4">Uncheck "Run 
    quick..."</span> and click "Next"</strong></p>
    <p>&nbsp;</p>
    <p>
    <img alt="3 of 8 - 19" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%283%20of%208%29%20-%2019%20Inst%20Ora%20WLS%2011g%20R1%2010.3.6%20-%20wls%20jar.jpg" height="568" width="258"></p>
    <p>Pic 3 of 8 - 19 <strong>Inst Ora WLS 11g R1 10.3.6. - 
    02_wls1036_generic.jar <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    Winkey menu -&gt; Oracle Weblogic under letter O, on win7 is slightly 
    different<br>&nbsp;&nbsp; <span class="auto-style4">Do not click "Config 
    wizard"</span>,&nbsp; Forms install. will do it (Create Domain) - if 
    here <span class="auto-style4">ERROR</span> when Forms install. </strong></p>
    <div class="mybrown cms_main">
      <h2>&nbsp;</h2>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <a id="frmrepinstalac"></a>
      <h1>1.4 Instalac ora Oracle Forms &amp; Reports 
      11.1.2.2.0, 64 bit (video 4/8)</h1>
    </div>
    <p>
    <img alt="4 of 8 - 01" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%284%20of%208%29%20-%2001%20Inst%20Ora%20Forms%20&amp;%20Rep%2011.1.2.2.0.jpg"></p>
    <p>Pic 4 of 8 - 01<strong> Unpack&nbsp; 
    03_01_ofm_frmrpts_win_11.1.2.2.0_64_disk1_1of2.zip &amp; 2of2 <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    to folders - see next picture.</strong></p>
    <p>&nbsp;</p>
    <p>
    <img alt="4 of 8 - 02" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%284%20of%208%29%20-%2002%20Inst%20Ora%20Forms%20&amp;%20Rep%2011.1.2.2.0.jpg"></p>
    <p>Pic 4 of 8 - 02,03,04&nbsp; <strong>Inst&nbsp; 
    03_01_ofm_frmrpts_win_11.1.2.2.0_64_disk1_1of2.zip &amp; 2of2<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    In folder Disk1 RUN AS ADMIN setup.exe </strong></p>
    <p>&nbsp;</p>
    <p>
    <img alt="4 of 8 - 05" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%284%20of%208%29%20-%2005%20Inst%20Ora%20Forms%20&amp;%20Rep%2011.1.2.2.0.jpg" height="518" width="642"></p>
    <p>Pic 4 of 8 - 05,06,07 <strong>Inst&nbsp; 
    03_01_ofm_frmrpts_win_11.1.2.2.0_64_disk1_1of2.zip &amp; 2of2<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </strong>In next window (step 2/15) select "Skip software updates" and 
    click "Next"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    In next window (step 4/15) select "Install and configure" and click 
    "Next"</p>
    <p>&nbsp;</p>
    <p>
    <img alt="4 of 8 - 08" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%284%20of%208%29%20-%2008%20Inst%20Ora%20Forms%20&amp;%20Rep%2011.1.2.2.0.jpg" height="524" width="952"></p>
    <p>Pic 4 of 8 - 08,09 <strong>Inst&nbsp; 
    03_01_ofm_frmrpts_win_11.1.2.2.0_64_disk1_1of2.zip &amp; 2of2<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    click "Continue"</strong></p>
    <p>&nbsp;</p>
    <p>
    <img alt="4 of 8 - 10" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%284%20of%208%29%20-%2010%20Inst%20Ora%20Forms%20&amp;%20Rep%2011.1.2.2.0.jpg" height="521" width="645"></p>
    <p>Pic 4 of 8 - 10,11 <strong>Inst&nbsp; 
    03_01_ofm_frmrpts_win_11.1.2.2.0_64_disk1_1of2.zip &amp; 2of2<br>
    </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="file:///C:/Oracle/Middleware">C:\Oracle\Middleware</a> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    Oracle_FRHome1<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="file:///C:/Oracle/Middleware/asinst_1" target="_blank">
    file:///C:/Oracle/Middleware/asinst_1</a> <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    asinst_1<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="file:///C:/Oracle/Middleware/wlserver_10.3" target="_blank">
    file:///C:/Oracle/Middleware/wlserver_10.3</a> </p>
    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; In 
    next window (step 6/15) select "Configure for development" <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; or for Deployement 
    and click "Next"</p>
    <p>&nbsp;</p>
    <p>
    <img alt="4 of 8 - 12" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%284%20of%208%29%20-%2012%20Inst%20Ora%20Forms%20&amp;%20Rep%2011.1.2.2.0.jpg" height="518" width="648"></p>
    <p>Pic 4 of 8 - 12,13 <strong>Inst&nbsp; 
    03_01_ofm_frmrpts_win_11.1.2.2.0_64_disk1_1of2.zip &amp; 2of2<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    weblogic<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    sasa22sasa22<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
    ClassicDomain<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="file:///C:/Oracle/Middleware/user_projects/domains" target="_blank">
    file:///C:/Oracle/Middleware/user_projects/domains</a>
    </strong></p>
    <p><strong><br>
    </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; In next window (step 8/14 Email) 
    unselect "I wish security updates" and click "Next"</p>
    <p>&nbsp;</p>
    <p>
    <img alt="4 of 8 - 14" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%284%20of%208%29%20-%2014%20Inst%20Ora%20Forms%20&amp;%20Rep%2011.1.2.2.0.jpg" height="522" width="644"></p>
    <p>THIS PICTURE MUST HAVE ONLY Forms and Rep Dev. Env. nodes - ONLY TWO 
    !!<br>Pic 4 of 8 - 14-22 <strong>Inst&nbsp; 
    03_01_ofm_frmrpts_win_11.1.2.2.0_64_disk1_1of2.zip &amp; 2of2<br>
    </strong>In next window (step 11/15) select "Auto port configuration" 
    and click "Next"<br>
    In next window (step 11/15) select "Do not use proxy settings" and click 
    "Next"<br>&nbsp;&nbsp; THIS WINDOW SHOULD NOT BE :&nbsp; In next window 
    uncheck "Use app identity store" <span class="auto-style1">???</span><br>
    In next window (step 12/15) "Install. Summary" click "Save" (to response 
    file eg see below<br>
    <a href="file:///D:/ASG/1_instalac/1_ora_instalacija_help/forms11/Disk1/OraFormsForms11.1.2.2.0_CONFIG_OPTIONS.txt" target="_blank">
    file:///D:/ASG/1_instalac/1_ora_instalacija_help/forms11/Disk1/OraFormsForms11.1.2.2.0_CONFIG_OPTIONS.txt</a><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; and click "Install"<br>
    <a href="file:///D:/ASG/1_instalac/1_ora_instalacija_help/forms11/Disk1/OraForms11.1.2.2.0_END_INSTAL_CONFIG.txt" target="_blank">
    file:///D:/ASG/1_instalac/1_ora_instalacija_help/forms11/Disk1/OraForms11.1.2.2.0_END_INSTAL_CONFIG.txt</a> </p>
    <p>Installation log :<br>
    <a href="file:///C:/Program%20Files/Oracle/Inventory/logs/install2018-08-23_05-27-04PM.log" target="_blank">
    file:///C:/Program 
    Files/Oracle/Inventory/logs/install2018-08-23_05-27-04PM.log</a> </p>
    <p></p>
    <p>
    <img alt="4 of 8 - 23" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%284%20of%208%29%20-%2023%20Inst%20Ora%20Forms%20&amp;%20Rep%2011.1.2.2.0.jpg" height="610" width="260"></p>
    <p>Pic 4 of 8 - 23&nbsp; <strong>Inst&nbsp; 
    03_01_ofm_frmrpts_win_11.1.2.2.0_64_disk1_1of2.zip &amp; 2of2</strong></p>
    <p></p>
    <p>
    <img alt="4 of 8 - 24" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%284%20of%208%29%20-%2024%20Inst%20Ora%20Forms%20&amp;%20Rep%2011.1.2.2.0.jpg" height="362" width="755"></p>
    <p>Pic 4 of 8 - 24&nbsp; <strong>Inst&nbsp; 
    03_01_ofm_frmrpts_win_11.1.2.2.0_64_disk1_1of2.zip &amp; 2of2</strong></p>
    <div class="mybrown cms_main">
      <h2>&nbsp;</h2>
      <div class="mybrown cms_main">
        <p>&nbsp;</p>
        <h2>&nbsp;</h2>
        <a id="frmsverify"></a>
        <h2 class="h2_csscls">2.1.1 Verifying Forms 11.1.2.2.0, 64 bit
        <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; instalattion &amp; configuration (video 5/8)</h2>
      </div>
      <p style="font-weight: normal;">Oracle`s help for URLs below :</p>
      <p style="font-weight: normal;"><a href="https://docs.oracle.com/cd/E24269_01/doc.11120/e23960/verify.htm#FRINS350" target="_blank">https://docs.oracle.com/cd/E24269_01/doc.11120/e23960/verify.htm#FRINS350</a></p>
      <p style="font-weight: normal;">
        <a style="font-weight: normal;" href="file:///D:/ASG/1_instalac/1_ora_instalacija_help/forms11/Disk1/OraFormsForms11.1.2.2.0_CONFIG_OPTIONS.txt" target="_blank">
        file:///D:/ASG/1_instalac/1_ora_instalacija_help/forms11/Disk1/OraFormsForms11.1.2.2.0_CONFIG_OPTIONS.txt</a><br>
      which we named and created (button "Save") during 
      Forms instalac (see Pic 4 of 8 - 14-22) contains :</p>
      <h3>Type: Oracle Forms and Reports Installation <br>
      Configuration Options </h3>
      <div class="w3-container">
        <div class="w3-responsive">
          <table style="font-weight: normal;" class="w3-table-all">
            <tbody><tr>
              <th>Property </th>
              <th>Value </th>
            </tr>
            <tr>
              <td>Middleware Home Location</td>
              <td>C:\Oracle\Middleware </td>
            </tr>
            <tr>
              <td>Oracle Home Location </td>
              <td>C:\Oracle\Middleware\Oracle_FRHome1</td>
            </tr>
            <tr>
              <td>Oracle Instance Location</td>
              <td>C:\Oracle\Middleware\asinst_1 </td>
            </tr>
            <tr>
              <td>Oracle Instance </td>
              <td>asinst_1 </td>
            </tr>
            <tr>
              <td>Domain Option </td>
              <td>Create Domain </td>
            </tr>
            <tr>
              <td>Domain Name </td>
              <td>ClassicDomain </td>
            </tr>
            <tr>
              <td>Domain Home </td>
              <td>
              C:\Oracle\Middleware\user_projects\domains\ClassicDomain</td>
            </tr>
            <tr>
              <td>Domain Host Name </td>
              <td>slavko-win7&nbsp;&nbsp; doma: sspc1 </td>
            </tr>
            <tr>
              <td>Domain Port No </td>
              <td>7001 </td>
            </tr>
            <tr>
              <td>User Name </td>
              <td>weblogic psw=sasa22sasa22</td>
            </tr>
            <tr>
              <td>Automatic Port Detection </td>
              <td>true </td>
            </tr>
            <tr>
              <td>URL </td>
              <td>
              <p><strong>
              <a href="http://sspc1:7001/" target="_blank">
              http://sspc1:7001 </a></strong></p>
              </td>
            </tr>
            <tr>
              <td>Administrator Console </td>
              <td>
              <p><strong>
              <a href="http://sspc1:7001/console" target="_blank">
              http://sspc1:7001/console</a></strong></p>
              </td>
            </tr>
            <tr>
              <td>Forms URL&nbsp; <strong>works only in IE &lt;=11</strong></td>
              <td>
              <p><span class="auto-style6"><strong>start appl.server 
              WLS and in IE 11 :</strong></span><br><strong>
              <a href="http://slavko-win7:7001/forms/frmservlet" target="_blank">http://slavko-win7:7001/forms/frmservlet</a></strong><br><strong>
              <a href="http://sspc1:7001/forms/frmservlet" target="_blank">
              http://sspc1:7001/forms/frmservlet</a></strong><br>
              needs ibrowser plugin - see below</p>
              </td>
            </tr>
            <tr>
              <td>Reports URL </td>
              <td>
              <p>&nbsp;<strong><a href="http://sspc1:7001/reports/rwservlet/help" target="_blank">http://sspc1:7001/reports/rwservlet/help</a></strong><br>
              contains command "getserverinfo" ee:<br>
              <strong>
              <a href="http://sspc1:7001/reports/rwservlet/getserverinfo" target="_blank">
              http://sspc1:7001/reports/rwservlet/getserverinfo</a> 
              - </strong>outputs "REP-52262: Diagnostic output is 
              disabled.<strong>"<br>
              </strong>&nbsp;&nbsp; see below edit <strong>
              rwservlet.properties</strong></p>
              </td>
            </tr>
          </tbody></table>
          <!-- class="w3-table-all"-->
        </div>
        <!-- class="w3-responsive"-->
      </div>
      <!-- class="w3-container"-->
          <h3>Before visiting URLs above we must <span class="auto-style6">
      <strong>start appl.server WLS</strong></span>. On winows 10 64 bit so :</h3>
      <pre>winkey -&gt; All apps -&gt; oracle classic instance asins... -&gt; Start Weblogic Admin Server<br>              <br>usr=weblogic,    psw=sasa22sasa22<br>        <br>Outputs: ...started in RUNNING mode</pre>
      <h3><strong>32 bit ibrowser plugin for frmservlet&nbsp; displays .fmx<br>in 
      IE 11 (or in Firefox ver 52 32 bit</strong>&nbsp; - not working for 
      me), IE 11 works after next installation :</h3>
      <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
      Firefox ibrowser plugin for frmservlet : Add-ons -&gt; Plugins must show : 
      jre1.8.0_92</h3>
      <p class="auto-style3"><strong>Iinstall (2click) AS ADMIN</strong> :</p>
      <p class="auto-style3"><span class="auto-style6"><strong>04_jdk-8u92-windows-i586.exe</strong></span> &lt;- 32 bit !<br>where 
      is installed :&nbsp; 
      C:\Program Files (x86)\Java\jre1.8.0_92</p>
      <p>&nbsp;</p>
      <p>edit
      <a href="file:///C:/Oracle/Middleware/user_projects/domains/ClassicDomain/config/fmwconfig/servers/AdminServer/applications/formsapp_11.1.2/config/formsweb.cfg">
C:\Oracle\Middleware\user_projects\domains\ClassicDomain\config\fmwconfig\servers\AdminServer\applications\formsapp_11.1.2\config\<strong>formsweb.cfg</strong></a></p>
      <p>
      <img alt="5 of 8 05" src="Ora%20Forms%20&amp;%20Rep%20Builder%20Tut%20%285%20of%208%29%20-%2005%20Verif%20inst%20F%20&amp;%20Rep%20-%20jdk%2032%20bit%20for%20Forms%20URL%20config.jpg" height="379" width="1154"></p>
      <p>Pic 5 of 8 - 05&nbsp; <strong>edit <br></strong></p>
      <p>
      <a href="file:///C:/Oracle/Middleware/user_projects/domains/ClassicDomain/config/fmwconfig/servers/AdminServer/applications/formsapp_11.1.2/config/formsweb.cfg">
C:\Oracle\Middleware\user_projects\domains\ClassicDomain\config\fmwconfig\servers\AdminServer\applications\formsapp_11.1.2\config\<strong>formsweb.cfg</strong></a></p>
      <p>formsweb.cfg,&nbsp; line 116:&nbsp; "# <strong>Page displayed to 
      users to allow them to download Sun's Java Plugin</strong>."&nbsp; :</p>
      <pre># Page displayed to users to allow them to download Sun's Java Plugin.<br># Sun's Java Plugin is typically used for non-Windows clients.<br># (NOTE: you should check this page and possibly change the settings)<br>jpi_download_page=http://java.sun.com/products/archive/j2se/<strong>6u12</strong>/index.html<br># Parameter related to the version of the Java Plugin<br><strong>jpi_classid</strong>=clsid:CAFEEFAC-<strong>0016</strong>-0000-<strong>0012</strong>-ABCDEFFEDCBA<br># Parameter related to the version of the Java Plugin<br><strong>jpi_codebase</strong>=http://java.sun.com/update/<strong>1.6.0</strong>/<strong>jinstall-6</strong>-windows-i586.cab#Version=<strong>1,6,0,12</strong>
# Parameter related to the version of the Java Plugin
<strong>jpi_mimetype</strong>=application/x-java-applet;jpi-version=<strong>1.6.0_12</strong>
# Applet parameter for Sun's Java Plugin
legacy_lifecycle=false</pre>
      <p>jpi_download_page : change <strong>6u12 to 8u92</strong></p>
      <p>jpi_classid : change <strong>0016 to 0018 </strong>and<strong> 
      0012 to 0092</strong></p>
      <p>jpi_codebase : change <strong>1.6.0 to 1.8.0 </strong>and<strong> 
      jinstall-6 to jinstall-8 </strong>and<strong> 1,6,0,12 to 1,8,0,92</strong></p>
      <p>jpi_mimetype : change <strong>1.6.0_12 to 1.8.0_92</strong></p>
      <p>&nbsp;</p>
      <h1><span class="auto-style3">Java Applet troubleshooting tips</span></h1>
      <p>Control Panel &gt; Java will most likely only show you the 64 bit 
      control panel.</p>
      <p>C:\Program Files (x86)\Java&nbsp;&nbsp;- <strong>32 bit</strong><br>
      <span class="auto-style3">&nbsp; &nbsp;</span><strong><span class="auto-style3"> 1. folder jdk1.8.0_92</span></strong><span class="auto-style3">&nbsp;(Using JRE version 1.8.0_181-b13 
      Java HotSpot(TM) Client VM) <br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- runs Forms applet 11.1.2.2 in IE 11 <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - runs webstart :<strong>works in F11</strong>:         &quot;C:\Program Files (x86)\Java\jdk1.8.0_92\bin\javaws.exe&quot; -localfile J:\apl\possys11\forms\02_test_F11.jnlp</span><span class="auto-style3"><br>
      </span></p><span class="auto-style3">
      <p>&nbsp;&nbsp;&nbsp; 2. folder jre1.8.0_181 - can not run webstart, 
      error "Unsigned app..."</p></span>
      <p>&nbsp;</p>
      <p>C:\Program Files\Java&nbsp; - <strong>64 bit</strong><br>
      <span class="auto-style3">&nbsp;&nbsp;&nbsp; jdk1.7.0_80&nbsp;&nbsp;&nbsp; - - can not run webstart, error 
      "Unsigned entry..."<br>
&nbsp;&nbsp;&nbsp; jre1.8.0_181<br>
      </span></p><ol>
      <li>
        <span class="auto-style3">You’ll need to specifically launch the </span> <strong>
        <span class="auto-style3">32bit javacpl</span></strong><span class="auto-style3"> 
        panel via <br>
        C:\Program Files (x86)\Java\jdk1.8.0_92\jre\bin\<span class="auto-style6"><strong>javacpl.exe</strong></span>
        <strong>&nbsp;</strong> (original
        C:\Program Files (x86)\Java\jdk1.6.0_35\jre\bin\)<strong><br>
        </strong>- enable the Advanced &gt; Java Console &gt; Show Console, to get some 
        visibility on any exceptions firing<br>
        - very crucial tip : Advanced &gt; Default Java for browsers &gt; 
        Microsoft Internet Explorer is always greyed out <br>&nbsp; but you can 
        select that node and hit </span> <strong>
        <span class="auto-style3">space bar</span></strong><span class="auto-style3"> to 
        </span> 
        <span class="auto-style3">check</span><span class="auto-style3"> it (nuts)</span></li>
        <li><span class="auto-style3">tab "Security" -&gt; button "Edit 
        (exception) site list" add 
              <a href="http://slavko-win7:7001/forms/frmservlet" target="_blank">http://slavko-win7:7001</a> 
        (both javacpl.exe see it)</span></li><li>
        <span class="auto-style3">it is also probably helpful to go back to the </span> <strong>
        <span class="auto-style3">64bit 
        javacpl</span></strong><span class="auto-style3"><br>
        </span>
        <strong><span class="auto-style3">C:\Program 
        Files\Java\jdk1.7.0_80\jre\bin\</span><span class="auto-style6">javacpl.exe</span></strong><span class="auto-style3"><br>
        and </span> <strong>uncheck</strong><span class="auto-style3"> Advanced &gt; Default Java for 
        browsers &gt; Microsoft Internet Explorer there</span></li>
      </ol><span class="auto-style3">
      <p>&nbsp;</p>
      </span>
            <p class="auto-style3"><strong>see at page beginning Summary of convert Forms 6i tipdok.fmb &amp; 
                run F11 form tipdok.fmx</strong><br>
      </p>
            <p class="auto-style3">&nbsp;</p>
      <p><strong class="auto-style3">Browser dependency<br>
      IE (v11 works) is the only browser that will properly launch the 
      32bit java applet for us on Windows 10 x64 (not Chrome, not Firefox, 
      not Edge)</strong><span class="auto-style3"><br>
      IE11 can actually run in 64bit or 32bit mode depending on what each 
      page’s elements require and due to the 32bit java tags mentioned 
      above, it spawns into a 32bit IExplore.exe process</span></p>
      <p>&nbsp;</p>
      <a id="repsverify"></a>
      <h2 class="h2_csscls">2.1.2 Verifying Reports 11.1.2.2.0, 64 bit
      instalattion &amp; configuration (video 5/8)</h2>
      <p style="font-weight: normal;">Oracle`s help for URLs below :</p>
      <p style="font-weight: normal;">
      <a href="https://docs.oracle.com/html/E24479_01/pbr_verify004.htm" target="_blank">
      https://docs.oracle.com/html/E24479_01/pbr_verify004.htm</a></p>
      <p style="font-weight: normal;">&nbsp;</p>
      <p style="font-weight: normal;">
      <a href="http://sspc1:7001/reports/rwservlet/getserverinfo" target="_blank">
      http://sspc1:7001/reports/rwservlet/getserverinfo</a> - 
      outputs "REP-52262: Diagnostic output is disabled."&nbsp; 
      To eliminate it :</p>
      <ol style="font-weight: normal;">
        <li>edit&nbsp;
        <a href="file:///C:/Oracle/Middleware/user_projects/domains/ClassicDomain/config/fmwconfig/servers/AdminServer/applications/reports_11.1.2/configuration/rwservlet.properties">
C:\Oracle\Middleware\user_projects\domains\ClassicDomain\config\fmwconfig\servers\AdminServer\applications\reports_11.1.2\configuration\rwservlet.properties</a>
        <br>
        <p>put after inprocess tag :</p>
        <p>&nbsp;&lt;inprocess&gt;yes&lt;/inprocess&gt;<br>
        &lt;webcommandaccess&gt;L2&lt;/webcommandaccess&gt;</p>
        </li>
        <li>
        <p>Stop Weblogic Admin Server<br>
        Start Weblogic Admin Server</p>
        </li>
      </ol>
      <a id="crerepsvr"></a>
      <h2 class="h2_csscls">2.1.3 Creating new 
      standalone (there is also "In-process") Reports Server 
      (video 5/8)</h2>
      <p>Oracle`s help for URLs below :</p>
      <a style="font-weight: normal;" href="https://docs.oracle.com/cd/E14571_01/bi.1111/b32121/pbr_conf008.htm#RSPUB23348" target="_blank">
      https://docs.oracle.com/cd/E14571_01/bi.1111/b32121/pbr_conf008.htm#RSPUB23348</a>
      <p style="font-weight: normal;">&nbsp;</p>
      <p style="font-weight: normal;">For example, to create a new Server named test_server, run the 
      following commands on the commandline:</p>
      <pre>--ORACLE_INSTANCE/bin/opmnctl createcomponent <br>--not <a href="file:///C:/oraclexe/app/oracle/product/11.2.0/server/bin/">C:\oraclexe\app\oracle\product\11.2.0\server\bin\</a>

<strong>cd </strong><a href="file:///C:/Oracle/Middleware/asinst_1/bin/"><strong>C:\Oracle\Middleware\asinst_1\bin\</strong></a><strong>
opmnctl.bat
 createcomponent</strong> -adminUsername weblogic -adminHost sspc1 -adminPort 7001 -oracleHome C:\Oracle\Middleware\Oracle_FRHome1 -oracleInstance C:\Oracle\Middleware\asinst_1 -instanceName asinst_1 -componentName myrptsvr -componentType ReportsServerComponent</pre>
      <p>Details are logged in 
      C:\Oracle\Middleware\asinst_1\diagnostics\logs\OPMN\opmn\provision.log</p>
      <pre><strong>opmnctl.bat status</strong></pre>
      <pre>Processes in Instance: asinst_1<br>---------------------------------+---------------<br>ias-component | process-type       | pid | status<br>---------------------------------+---------------<br>myrptsvr      | ReportsServerComp~ | N/A | <strong>Down</strong></pre>
      <p>&nbsp;</p>
      <p>Oracle`s help for URLs below :</p>
      <p>
      <a style="font-weight: normal;" href="https://docs.oracle.com/cd/E14571_01/bi.1111/b32121/pbr_strt001.htm#RSPUB23242" target="_blank">
      
      https://docs.oracle.com/cd/E14571_01/bi.1111/b32121/pbr_strt001.htm#RSPUB23242</a>&nbsp;
      </p>
      <pre><span class="bold"><strong>opmnctl.bat </strong>startproc</span> ias-component=myrptsvr</pre>
      <pre>C:\Oracle\Middleware\asinst_1\bin&gt;<strong>opmnctl.bat status</strong>

Processes in Instance: asinst_1
---------------------------------+-----------------
ias-component | process-type       | pid   | status
---------------------------------+-----------------
myrptsvr      | ReportsServerComp~ | 24164 | <strong>Alive (running)</strong></pre>
      <p>&nbsp;</p>
      <pre><a href="http://sspc1:7001/reports/rwservlet/getserverinfo?server=myrptsvr"><strong>http://sspc1:7001/reports/rwservlet/getserverinfo?server=myrptsvr</strong></a> </pre>
      <p>After Stop Weblogic Admin Server status is still running myrptsvr 
      ! So we need :</p>
      <pre><span class="bold"><strong>opmnctl.bat </strong>stopproc</span> ias-component=myrptsvr</pre>
      <pre>&nbsp;</pre>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <div class="mybrown cms_main">
        <a id="crefrm"></a>
        <h2 class="h2_csscls">3.1.1 Creating form using form builder 
        (video 6/8)</h2>
      </div>
      <div class="mybrown cms_main">
        <p><a href="file:///J:/apl/possys11">J:\apl\possys11</a>&nbsp; 
        contains dirs:&nbsp; forms, reps, libs</p>
        <pre>winkey -&gt; All apps -&gt; oracle classic instance asins... -&gt; Forms Builder</pre>
        <pre>Tools -&gt; Data block wizard -&gt; <strong>hr/hr@sspc1</strong></pre>
        <p><span class="auto-style3">EMPLOYEES</span></p><span class="auto-style3">
        <p>Start Weblogic Admin Server </p>
        </span><p><span class="auto-style3">Forms Builder -&gt; Edit -&gt; Preferences -&gt; Runtime -&gt; 
        Appl.Server URL -&gt; </span> <a href="http://sspc1:7001/forms/frmservlet">
        <strong><span class="auto-style3">http://sspc1:7001/forms/frmservlet</span></strong></a> 
        <span class="auto-style3"> <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Browser: "</span><strong><span class="auto-style3">C:\Program Files\internet 
        explorer\iexplore.exe</span></strong><span class="auto-style3">"</span></p>
        <p><strong><span class="auto-style3">Button "Run form" WORKS !</span></strong></p>
        <p>&nbsp;</p><p>
        <span class="auto-style3">
C:\Oracle\Middleware\user_projects\domains\ClassicDomain\config\fmwconfig\servers\AdminServer\applications\formsapp_11.1.2\config\</span><strong><span class="auto-style3">formsweb.cfg</span></strong></p>
        <p><span class="auto-style3">find "width",&nbsp;&nbsp;&nbsp; change:&nbsp; 
        </span> <strong><span class="auto-style3">750 to 
        1000</span></strong><span class="auto-style3">&nbsp; and its 
        </span> <strong><span class="auto-style3">height=600 to 500...</span></strong></p>
        <p>&nbsp;</p><span class="auto-style3">
        <p>see file default.env</p>
        <p>ctrl+s&nbsp;&nbsp;&nbsp; shift+ctrl+k&nbsp;&nbsp;&nbsp; 
        ctrl+t</p></span>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <a id="crerep"></a>
        <h2 class="h2_csscls">3.1.2 Creating report using report builder 
        (video 7/8)</h2>
      </div>
      <div class="mybrown cms_main">
        SQL Developer -&gt; Query Builder :
        <pre>SELECT<br>hr.employees.*,<br>hr.departments.department_id AS department_id2,<br>hr.employees.employee_id AS employee_id1,<br>hr.employees.first_name AS first_name1,<br>hr.employees.last_name AS last_name1,<br>hr.employees.hire_date AS hire_date1,<br>hr.employees.job_id AS job_id1,<br>hr.employees.salary AS salary1,<br>hr.employees.commission_pct AS commission_pct1,<br>hr.employees.manager_id AS manager_id1,<br>employees1.first_name AS manager_first_name,<br>employees1.last_name AS manager_last_name<br>FROM<br>hr.departments left<br>JOIN hr.employees ON hr.departments.department_id = hr.employees.department_id<br>LEFT JOIN hr.employees employees1 ON hr.employees.manager_id = employees1.employee_id</pre>
        <p>Start Report bulder like Form builder in previuous chapter :</p>
        <pre>winkey -&gt; All apps -&gt; oracle classic instance asins... -&gt; Reports Builder</pre>
        <p>Reports wizard -&gt; put in query above</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <a id="callrep"></a>
        <h2 class="h2_csscls">3.1.3 Integrating report with form (video 
        8/8)</h2>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <h2><a id="callrep2" name="javawebstartlauncher"></a><span class="auto-style3">3.1.4 Run Oracle Forms 11g Apps Using Java Web Start          Launcher,  Browser not Required (<span class="h2_csscls">video</span> 
          9 of 8)</span></h2>
        <ol>
          <li><span class="auto-style3">run using Java Web Start Launcher</span></li>
<span class="auto-style3">
          <li>run from Java Cache Viewer</li>
          <li>run in IE 11 or in Firefox 52 ESR 32-bit (browser 
          vendors have dropped support for NPAPI and other plug-ins meaning there are no more Java/Flash/Silverlight inside the browser)<br>
          <br>
          </li>
          <li>select between different versions of Java Web Start 
          Launcher on the same system<br>
          <br>
          </li>
          <li>configure Java Security Exception Site List to allow 
          apps blocked by Java security checks</li>
          <li>run Jar ﬁle signed with an expired certificate</li>
        </span></ol><p>
          <span class="auto-style3">Oracle Forms applications are launched from a browser, it is 
        actually Java Runtime Environment<br>
          </span>
        JRE on client that run or host Forms applications<span class="auto-style3">.
        <br>
        </span></p>
        <blockquote>
        <blockquote>
          <blockquote>
            <p>
              <span class="auto-style3">After more than fifteen years of web browsers 
              supporting integration with Java Plug-in, many 
              browser vendors are moving to a </span> plugin-free 
              model - Google Chrome, Firefox, Opera<span class="auto-style3"> - 
              it's getting increasingly difficult to run Oracle 
              Forms applications through browsers, </span> only IE 
              11 still (2018 year) runs Oracle Java Plugin for 
              Forms11<span class="auto-style3">.</span></p>
            </blockquote>
          </blockquote>
        </blockquote><p>
            <span class="auto-style3">Oracle Forms needs new ways of being deployed if it is to 
            continue using Java technology on the client tier. Java Web 
            Start allows you to run Oracle Forms runtime, </span> directly 
            from the desktop, rather than needing a browser, but sill needs 
            JDK which is (extended) supported till 2025 - jdk1.8.0_92<span class="auto-style3">&nbsp;(Using 
              JRE version 1.8.0_181-b13 Java HotSpot(TM) Client VM)</span>.
              <span class="auto-style3">Java Web Start will give an Oracle Forms application
              </span>
            appearance of being a natively installed application 
            rather than a web app<span class="auto-style3"> because when running, the 
              application </span> is not contained by the boundaries of the 
            browser<span class="auto-style3">. </span></p>
        <span class="auto-style3">
        <blockquote>
          <p>This is also often desirable with Point of Sale 
          applications where the only application used on the device 
          is the POS application or in cases where the application is 
          designed to use the full screen.</p>
        </blockquote>
        <p>Similar to what Google Chrome did, the legacy NPAPI (Netscape 
        Plugin Application Programming Interface) support in Firefox 52 
        has been removed in March 2017. What will happen is if Firefox 
        is updated to version 52 or above (54...) and you try to run 
        Forms, you will see a blank screen which will result in the 
        Forms application to not start at all. </p>
        </span><p><span class="auto-style3">Java Web Start is considered a </span> semi-browserless 
          conﬁguration<span class="auto-style3">. Because this is a mostly browser-less 
            conﬁguration, </span> features like single sign-off and 
          JavaScript integration are not supported<span class="auto-style3"> when using the 
            Java Web Start conﬁguration. A </span> browser is optional and 
          would only be required if single sign-on is used<span class="auto-style3">. Java 
            Web Start software:</span></p>
        <span class="auto-style3">
        <ol>
          <li>Provides an easy, one-click activation of applications</li>
          <li>Guarantees that you are always running the latest 
          version of the application</li>
          <li>Eliminates complicated installation or upgrade 
          procedures</li>
        </ol>
        <p>Getting Java Web Start Software</p>
        </span><p><span class="auto-style3">Java Web Start is </span> included in the Java Runtime 
        Environment (JRE)<span class="auto-style3"> since release of Java 5.0. This means 
        that when you install Java, you get Java Web Start installed 
        automatically. The Java Web Start software is launched 
        automatically, when a Java application using Java Web Start 
        technology is downloaded for the ﬁrst time. The Java Web Start 
        software </span> caches (stores) the entire application locally 
        on your computer<span class="auto-style3">. Thus, any subsequent launches are 
        almost instantaneous as all the required resources are already 
        available locally. </span></p>
        <p>
          <span class="auto-style3">Using Java Web Start, Software application can be launched by
          </span>
        opening application’s JNLP ﬁle from 
        </p>
        <ol>
          <li><span class="auto-style3">any web browser</span></li>
          <span class="auto-style3">
          <li>desktop icon </li>
          <li>Java Application Cache Viewer</li>
          </span>
        </ol>
        <p></p>
        <h2>&nbsp;</h2>
        <h2>1. Opening application’s JNLP ﬁle from desktop icon</h2>
        <p>
        <a href="https://oracle-base.com/articles/11g/oracle-forms-11g-and-java-web-start" target="_blank">
        <span class="auto-style3">https://oracle-base.com/articles/11g/oracle-forms-11g-and-java-web-start</span></a></p>
        <h2>Test Form 1</h2>
        <p>Before you start trying to run your main app, check you can 
        run the basic test form "...sucess...":</p>
        <h2>C:\Oracle\Middleware\Oracle_FRHome1\forms\test.fmx</h2>
        <p><strong><span class="auto-style3">Shortcut for launcher 03_test.jnlp file below :</span></strong></p>
        <p><span class="auto-style3">Shortcut name eg :&nbsp; &nbsp;03_test.jnlp 32bit JDK 1.8 
        javaws.exe</span></p><p>
        <span class="auto-style3">Target :&nbsp; "C:\Program Files 
        (x86)\Java\jdk1.8.0_92\bin\javaws.exe" -localfile 
        "<a href="file:///J:/apl/possys11/forms/03_test.jnlp">J:\apl\possys11\forms\</a></span><strong><span class="auto-style3"><a href="file:///J:/apl/possys11/forms/03_test.jnlp">03_test.jnlp</a></span></strong><span class="auto-style3">"<br>&nbsp;&nbsp;&nbsp; 
        ASG: D:\ASG\POSSYS11\03_test.jnlp</span></p><span class="auto-style3">
        <p>Start in :&nbsp; "C:\Program Files 
        (x86)\Java\jdk1.8.0_92\bin"</p></span>
        <p>&nbsp;</p>
        <p>Create file J:\apl\possys11\forms\03_test.jnlp :</p>
        <pre>&lt;?xml version="1.0" encoding="utf-8"?&gt;<br>    &lt;!-- <br>       J:\apl\possys11\forms\03_test.jnlp<br>       is JNLP file to Java web start Forms 11.1.2.2.0 (september 2015) form<br>       C:\Oracle\Middleware\Oracle_FRHome1\forms\test.fmx<br>       works, not needed: http://sspc1:7001/forms/java/frmall.jar   <br>    --&gt;<br>  &lt;jnlp spec="1.7+" <strong>codebase</strong>="http://sspc1:7001/forms/java"&gt;<br>    &lt;information&gt;<br>      &lt;title&gt;Test Form (Dev)&lt;/title&gt;<br>      &lt;vendor&gt;Oracle Corporation&lt;/vendor&gt;<br>      &lt;description&gt;Test Form (Dev) in WebStart&lt;/description&gt;<br>    &lt;/information&gt;<br>    <br>    &lt;security&gt;<br>      &lt;all-permissions/&gt;<br>    &lt;/security&gt;<br>    <br>    &lt;resources&gt;<br>      &lt;j2se version="1.7+"/&gt;<br>      &lt;jar href="frmall.jar"/&gt;<br>    &lt;/resources&gt;<br>    &lt;applet-desc name="Test Form (Dev)" <br>                 main-class="oracle.forms.engine.Main" width="1" height="1"&gt;<br>        &lt;param name="height" value="750" /&gt;<br>        &lt;param name="width" value="1040" /&gt;<br>        &lt;param name="serverURL" value="/forms/lservlet?ifcfs=/forms/frmservlet?ifsessid=WLS_FORMS.formsapp.999<strong>&amp;#38;</strong>acceptLanguage=en-US"/&gt;<br>      &lt;param name="serverArgs" value="module=<strong>test.fmx</strong>"/&gt;<br>      &lt;param name="lookAndFeel" value="Oracle"/&gt;<br>      &lt;param name="colorScheme" value="blaf"/&gt;<br>      &lt;param name="logo" value="no"/&gt;<br>    &lt;/applet-desc&gt;<br>  &lt;/jnlp&gt;<br>&lt;/xml&gt;</pre>
        <p><strong><span class="auto-style3">Adjust server URL in the "codebase" attribute</span></strong><span class="auto-style3"> 
        to match your URL, eg 
        https://forms11g.localdomain:8890/forms/java.</span></p><span class="auto-style3">
        <p>In a production installation this should be the URL handled 
        by a load balancer or reverse proxy, but it works the same for a 
        direct reference.</p>
        <p>Notice the use of "&amp;#38;" in the "ServerURL" parameter. If 
        you use an "&amp;" directly you will get errors about illegal 
        characters in the URL.</p>
        <p></p></span>
        <p>
        <a href="https://develishdevelopment.wordpress.com/2012/01/22/oracle-forms-11-running-as-application-in-java-webstart-2/" target="_blank">
        <span class="auto-style3">https://develishdevelopment.wordpress.com/2012/01/22/oracle-forms-11-running-as-application-in-java-webstart-2/</span></a><span class="auto-style3"><br>
        Webstart in forms 11g it is not as easy as in 10g, but it works 
        too!</span></p><p>
        <span class="auto-style3"><br>
        Java Web Start Requires a launcher file </span> <strong>
        <span class="auto-style3">C:\Oracle\Middleware\Oracle_FRHome1\forms\java\frmall.jar</span></strong><span class="auto-style3"> 
        (located in ORACLE_HOME/forms/java) which comes installed with 
        Oracle Forms 11g. This JAR file is </span> <strong>
        <span class="auto-style3">signed with MD5 
        algorithms</span></strong><span class="auto-style3">. Beginning April 17, 2017, starting with 
        Java 8u131, MD5-hashes are no longer accepted in certiﬁcates -
        </span>
        <strong><span class="auto-style3">jdk1.8.0_92</span></strong><span class="auto-style3">&nbsp;Using JRE version 1.8.0_181-b13 
        works but (JRE ?) asks for certificate. <br>
        JAR files signed with MD5 algorithms are treated as unsigned 
        JARs by Oracle due to the security weaknesses in MD5 signatures. 
        Any jar files signed with MD5 will be disabled when running 
        Oracle Forms application. if you are running Oracle Forms 11gR2 
        (11.1.2.2.0) or earlier, you will get this warning and your 
        application will fail to start.<br>
        Following options can ﬁx the issue:</span></p><ol>
        <li>
          <span class="auto-style3">Upgrade to Oracle Forms 12c (</span><strong><span class="auto-style3">does not work with 
          DB 11g XE ?, direct conversion Forms 6i ?</span></strong><span class="auto-style3">)</span></li><span class="auto-style3">
          <li>Apply Patch 19933795 to Oracle Forms</li>
          </span><li><span class="auto-style3">Use an </span> <strong><span class="auto-style3">older JRE version than 8u131 (lt’s a 
          security risks.)</span></strong> <span class="auto-style3"> <br>
          </span>
          <strong><span class="auto-style3">l'm showing you this workaround now</span></strong><span class="auto-style3">.</span></li><li>
          <span class="auto-style3">Add your Forms accessing URL to </span> <strong>
          <span class="auto-style3">Java Control 
          Panel’s Security Exception</span></strong><span class="auto-style3"> (you’ll need to do it to 
          every PC where Forms application will run).<br>
          </span>
          <strong><span class="auto-style3">I'll show you how to do this one too.</span></strong><span class="auto-style3"><br>
          </span></li>
        </ol><span class="auto-style3">
        <p>I have multiple Java versions jdk1.7.0_80 64-bit as well as 
        jdk1.8.0_131 32-bit installed on my PC.</p>
        </span><p><span class="auto-style3">C:\Program Files (x86)\Java&nbsp;&nbsp;- </span> <strong>
        <span class="auto-style3">32 bit</span></strong><span class="auto-style3"><br>
&nbsp; &nbsp;</span><strong><span class="auto-style3"> 1. folder jdk1.8.0_92</span></strong><span class="auto-style3">&nbsp;(Using !!! JRE version 
        </span> <strong>
        <span class="auto-style3">1.8.0_181-b13</span></strong><span class="auto-style3"> Java HotSpot(TM) Client VM) <br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- runs Forms applet 11.1.2.2 in IE 11 <br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - runs webstart :<br>
        "C:\Program Files (x86)\Java\jdk1.8.0_92\bin\</span><strong><span class="auto-style3">javaws.exe</span></strong><span class="auto-style3">" 
        -localfile 
        "L:\1_instalac\2_instalac_ora11g\forms_instalac\1_forms11\</span><strong><span class="auto-style3">launcher.jnlp</span></strong>"<span class="auto-style3"><br>
        </span></p><p>
        <span class="auto-style3">&nbsp;&nbsp;&nbsp; 2. folder </span> <strong>
        <span class="auto-style3">jre1.8.0_181</span></strong><span class="auto-style3"> - 
        can not run webstart, error "Unsigned app..."</span></p><span class="auto-style3">
        <p>&nbsp;</p>
        </span><p><span class="auto-style3">C:\Program Files\Java&nbsp; - </span> <strong>
        <span class="auto-style3">64 bit</span></strong><span class="auto-style3"><br>
&nbsp;&nbsp;&nbsp; jdk1.7.0_80&nbsp;&nbsp;&nbsp; - - can not run webstart, error 
        "Unsigned entry..."<br>
&nbsp;&nbsp;&nbsp; jre1.8.0_181</span></p><p>
        <span class="auto-style3">Directly</span><strong><span class="auto-style3"> clicking the JNLP ﬁle automatically launces 
        the Forms application</span></strong><span class="auto-style3"> with the latest Java Web Start 
        and in my case it’s showing an exception so </span> </p>
        <p><strong><span class="auto-style3">I may (less secure) associate my JNLP ﬁle with Java 
        Web Start version that installed with jdk1.7.0_80 instead of 
        jdk1.8.0_131 to not ask for expired certificate.</span></strong></p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <h2>Test Form 2</h2>
        <h2>J:\apl\possys11\forms\TEST_F11.fmx</h2>
        <p><strong><span class="auto-style3">Shortcut for launcher 02_test_F11.jnlp file below :</span></strong></p>
        <p><span class="auto-style3">Shortcut name eg :&nbsp; &nbsp;02_test_F11_launcher.jnlp 32bit JDK 
        1.8 javaws.exe<br>&nbsp;&nbsp; ASG: 02_test_tipdok_launcher.jnlp 
        32bit JDK 1.8 javaws.exe</span></p><p>
        <span class="auto-style3">Target :&nbsp; "C:\Program Files 
        (x86)\Java\jdk1.8.0_92\bin\javaws.exe" -localfile 
        "J:\apl\possys11\forms\</span><strong><span class="auto-style3">02_test_F11.jnlp</span></strong><span class="auto-style3">"</span></p><span class="auto-style3">
        <p>Start in :&nbsp; "C:\Program Files 
        (x86)\Java\jdk1.8.0_92\bin"</p>
        <p>&nbsp;</p>
        </span><p><span class="auto-style3">Create file </span> <strong><span class="auto-style3">J:\apl\possys11\forms\03_test.jnlp</span></strong><span class="auto-style3"> 
        :</span></p>
        <pre>&lt;?xml version="1.0" encoding="utf-8"?&gt;<br>  &lt;!-- <br>          J:\apl\possys11\forms\02_test_F11.jnlp<br>          is JNLP file to Java web start Forms 11.1.2.2.0 (september 2015) form<br>          J:\apl\possys11\forms\TEST_F11.fmx<br>          works, not needed: http://sspc1:7001/forms/java/frmall.jar <br>          en-US<br>          --&gt;<br>  &lt;jnlp spec="1.7+" <strong>codebase</strong>="http://sspc1:7001/forms/java" href=""&gt;<br>  &lt;information&gt;<br>    &lt;title&gt;Ora F builder test webstart&lt;/title&gt;<br>    &lt;vendor&gt;Oracle Corporation&lt;/vendor&gt;<br>    &lt;description&gt;Oracle Forms in WebStart&lt;/description&gt;<br>  &lt;/information&gt;<br>        <br>  &lt;security&gt;<br>    &lt;all-permissions /&gt;<br>  &lt;/security&gt; <span class="auto-style3">

</span><strong>  </strong><span class="auto-style3"><strong>&lt;update check="timeout" policy="always"/&gt;<br>  &lt;resources&gt;<br>    &lt;j2se version="1.7+"/&gt;<br>    &lt;jar href="frmall.jar" size="" main="true"/&gt;<br>  &lt;/resources&gt;<br><br></strong></span><strong>  </strong><span class="auto-style3"><strong>&lt;applet-desc name="OracleForms" main-class="oracle.forms.engine.Main" width="1" height="1"&gt; &lt;param name="height" value="900" /&gt;<br>    &lt;param name="width" value="1600" /&gt;<br>    &lt;param name="serverURL" value="/forms/lservlet?ifcfs=/forms/frmservlet?ifsessid=WLS_FORMS.formsapp.999</strong></span><strong><span class="auto-style3">&amp;#38;</span></strong><span class="auto-style3"><strong>acceptLanguage=en-US"/&gt; &lt;param name="serverArgs" value="module=</strong></span><strong><span class="auto-style3">J:\apl\possys11\forms\TEST_F11.fmx</span></strong><span class="auto-style3"><strong>"/&gt;<br>    &lt;param name="lookAndFeel" value="oracle" /&gt;<br>    &lt;param name="colorScheme" value="swan" /&gt;<br>    &lt;param name="logo" value="no" /&gt;<br>  &lt;/applet-desc&gt;<br>&lt;/jnlp&gt; </strong></span></pre>
        <pre></pre>
        <p><strong><span class="auto-style3">Adjust server URL in the "codebase" attribute</span></strong><span class="auto-style3"> 
        to match your URL, eg 
        https://forms11g.localdomain:8890/forms/java.</span></p><span class="auto-style3">
        <p>In a production installation this should be the URL handled 
        by a load balancer or reverse proxy, but it works the same for a 
        direct reference.</p>
        <p>Notice the use of "&amp;#38;" in the "ServerURL" parameter. If 
        you use an "&amp;" directly you will get errors about illegal 
        characters in the URL. </p></span> 
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <h2><strong>Run Possys 11</strong></h2>
        <h2>J:\apl\possys11\forms\ugovor.fmx</h2>
        <p><strong><span class="auto-style3">Shortcut for launcher 01_POSSYS11.jnlp file below :</span></strong></p>
        <p><span class="auto-style3">Shortcut name eg :&nbsp; &nbsp;01_POSSYS11.jnlp 32bit JDK 1.8 
        javaws.exe</span></p><p>
        <span class="auto-style3">Target :&nbsp; "C:\Program Files 
        (x86)\Java\jdk1.8.0_92\bin\javaws.exe" -localfile 
        "J:\apl\possys11\forms\</span><strong><span class="auto-style3">01_POSSYS11.jnlp</span></strong><span class="auto-style3">"</span></p><span class="auto-style3">
        <p>Start in :&nbsp; "C:\Program Files 
        (x86)\Java\jdk1.8.0_92\bin"</p></span>
        <p>&nbsp;</p>
        <p>Create file <strong>J:\apl\possys11\forms\01_POSSYS11.jnlp</strong> 
        :</p>
        <pre>&lt;?xml version="1.0" encoding="utf-8"?&gt;<br>  &lt;!-- <br>          J:\apl\possys11\forms\<strong>01_POSSYS11.jnlp</strong>
          is JNLP file to Java web start Forms 11.1.2.2.0 (september 2015) form
          J:\apl\possys11\forms\<strong>ugovor.fmx</strong>
          works, not needed: http://sspc1:7001/forms/java/frmall.jar 
          en-US
          --&gt;
  &lt;jnlp spec="1.7+" <strong>codebase</strong>="http://sspc1:7001/forms/java" href=""&gt;<br>  &lt;information&gt;<br>    &lt;title&gt;Ora F builder test webstart&lt;/title&gt;<br>    &lt;vendor&gt;Oracle Corporation&lt;/vendor&gt;<br>    &lt;description&gt;Oracle Forms in WebStart&lt;/description&gt;<br>  &lt;/information&gt;<br>        <br>  &lt;security&gt;<br>    &lt;all-permissions /&gt;<br>  &lt;/security&gt;<span class="auto-style3">
</span><span class="auto-style5"><strong>    </strong></span><span class="auto-style3"><strong>&lt;update check="timeout" policy="always"/&gt;<br>  &lt;resources&gt;<br>     &lt;j2se version="1.7+"/&gt;<br>     &lt;jar href="frmall.jar" size="" main="true"/&gt;<br>  &lt;/resources&gt;<br></strong></span><strong>  </strong><span class="auto-style3"><strong>&lt;applet-desc name="OracleForms" main-class="oracle.forms.engine.Main" width="1" height="1"&gt; &lt;param name="height" value="900" /&gt;<br>    &lt;param name="width" value="1600" /&gt;<br>    &lt;param name="serverURL" value="/forms/lservlet?ifcfs=/forms/frmservlet?ifsessid=WLS_FORMS.formsapp.999</strong></span><strong><span class="auto-style3">&amp;#38;</span></strong><span class="auto-style3"><strong>acceptLanguage=en-US"/&gt; &lt;param name="serverArgs" value="module=</strong></span><strong><span class="auto-style3">J:\apl\possys11\forms\ugovor.fmx</span></strong><span class="auto-style3"><strong>"/&gt;<br>    &lt;param name="lookAndFeel" value="oracle" /&gt;<br>    &lt;param name="colorScheme" value="swan" /&gt;<br>    &lt;param name="logo" value="no" /&gt;<br>  &lt;/applet-desc&gt;<br>&lt;/jnlp&gt; </strong></span></pre>
        <pre></pre>
        <p><strong><span class="auto-style3">Adjust server URL in the "codebase" attribute</span></strong><span class="auto-style3"> 
        to match your URL, eg 
        https://forms11g.localdomain:8890/forms/java.</span></p><span class="auto-style3">
        <p>In a production installation this should be the URL handled 
        by a load balancer or reverse proxy, but it works the same for a 
        direct reference.</p>
        <p>Notice the use of "&amp;#38;" in the "ServerURL" parameter. If 
        you use an "&amp;" directly you will get errors about illegal 
        characters in the URL. </p></span> 
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <h2>2. Running a Java Web Start Application From the Java Cache 
        Viewer</h2>
        <p><span class="auto-style3">ee Opening application’s JNLP ﬁle from Java Application Cache 
        Viewer</span></p><span class="auto-style3">
        <p>If you are using at least Java Platform, Standard Edition 6 
        or later, you can run a Java Web Start application through the 
        Java Cache Viewer.</p>
        <p>When Java Web Start software first loads an application, 
        information from the application's JNLP file is stored in the 
        local Java Cache Viewer. To launch the application again, you do 
        not need to return to the web page where you first launched it; 
        you can launch it from the Java Cache Viewer.</p>
        <p></p>
        <p>winkey -&gt; "Configure java" opens Java control panel -&gt; 
        General -&gt; button View<br>
&nbsp;&nbsp;&nbsp; -&gt; at dialog top select "Show Applications" -&gt; run it, but 
        first button Settings <br>
&nbsp;&nbsp;&nbsp; -&gt; Delete files Trace and Cache</p>
        </span><p><span class="auto-style3">Even after closing the Java Web Start Launcher the associated
        </span>
        <strong><span class="auto-style3">jp2launcher.exe process</span></strong><span class="auto-style3"> doesn't shut down 
        itself and sometime multiple Processes of “Java Web Start 
        Launcher" are showing up in the Task Manager wasting system 
        memory, so </span> <strong><span class="auto-style3">manually stop it</span></strong>.</p>
        <p>&nbsp;</p>
        <p></p>
        <h2>3. Alternative workaround "Firefox Setup 52.2.1esr.exe" 
        32-bit release, 29-Jun-2017</h2>
        <p class="auto-style3"> Opening application’s JNLP ﬁle from ibrowser<br>
          <a href="https://ftp.mozilla.org/pub/firefox/releases/">https://ftp.mozilla.org/pub/firefox/releases/</a> <br>
        <a href="https://ftp.mozilla.org/pub/firefox/releases/52.9.0esr/win32/en-US/">https://ftp.mozilla.org/pub/firefox/releases/52.9.0esr/win32/en-US/</a><br>
        <a href="https://ftp.%20mozilla.org/pub/firefox/releases/52.2.1esr/win32/en-US/" target="_blank">
        <span class="auto-style3">https://ftp. 
        mozilla.org/pub/firefox/releases/52.2.1esr/win32/en-US/</span></a><span class="auto-style3">&nbsp;
        </span></p>
        <p class="auto-style3">C:\Program Files (x86)\Java\jdk1.8.0_92\jre\bin\plugin2\npjp2.dll        </p>
        <p>Firefox 52 esr and do not work:<br>
          <span class="auto-style3">C:\Program Files (x86)\Java\jre1.8.0_181\bin\plugin2\npjp2.dll<br>
        C:\Program Files (x86)\Java\jre1.8.0_181\bin\dtplugin\npdeployJava1.dll</span></p>
        <p>IE 11 works:<br>
          <span class="auto-style3">C:\Program Files\Java\jre1.8.0_181\bin\ssv.dll<br>
C:\Program Files\Java\jre1.8.0_181\bin\jp2ssv.dll</span><br>
        </p>
        <p class="auto-style3">&nbsp;</p>
        <span class="auto-style3">
        <p>Mozilla offers an Extended Support Release (ESR) version of 
        Firefox speciﬁcally for use by organizations who        need extended support for mass deployments. Only Mozilla Firefox 
        52 ESR 32-bit release will continue offering support for the 
        standards-based plugin support technology required to launch 
        Java Applets. <br>
        Mozilla maintains Firefox ESR Releases for approximately one 
        year. Developers and users still relying on the Java plugin 
        technology in the 32-bit Mozilla Firefox web browser should 
        consider migrating to a different solution.  64-bit 
        version of Firefox does not support NPAPI plug-ins, 
        including Java.</p>
        <p><strong>Pale Moon</strong> is fork of well known Mozilla Firefox web browser, but with a few crucial differences, some of them is add-on capability, old-fashion, classical, adjustable user interface, support Linux, Windows and unofficially MacOS.</p>
        <p>Help —&gt; Troubleshooting Information and then click on button Profile directory, your file manager will opens at the following direcotory:        
          <span class="auto-style3">
        </span></p>
        <p>/home/USERNAME/.moonchild productions/pale moon/generic_alphanumeric.default/</p>
        </span>
        <p class="auto-style3">This is a good news, as you can run Firefox and Pale Moon side by side, as there are no influence between them (separate profile directory under the user HOME).<br>
          <a href="https://www.josip-pojatina.com/en/firefox-npapi-java-plugin-support-and-flash-support-part-2/">https://www.josip-pojatina.com/en/firefox-npapi-java-plugin-support-and-flash-support-part-2/</a>
        </p>
        <span class="auto-style3">        </span><span class="auto-style3">
        <p></p>
        <p>The Exception Site List feature was introduced in the release 
          ofJava 7 Update 51. Listed below are cases which will allow 
          applications to run by adding the application URL to the 
        exception site list:</p>
        <p>winkey -&gt; "Configure java" opens Java control panel -&gt; 
          Security -&gt; button "Edit sitelist" <br>
        -&gt; ad to exceptions :&nbsp; http://sspc1:7001/ </p>
        <ol>
          <li>If application is not signed with a certificate from 
          trusted certificate authority.</li>
          <li>lf application is hosted locally.</li>
          <li>Jar file not having the Permission manifest attribute.</li>
          <li>Application signed with an expired certiﬁcate.</li>
          <li>Certiﬁcate used to sign the application cannot be 
          checked for revocation.</li>
        </ol>
        <p></p>
        <p>IMPORTANT!</p>
        <p>In case you still see a blank browser window, most likely you 
          need to modify the formsweb.cfg file.<br>
        </p>
        <p>
        C:\Oracle\Middleware\user_projects\domains\ClassicDomain\config\fmwconfig\servers\AdminServer\applications\formsapp_11.1.2\config\formsweb.cfg</p>
        </span>
        <p>&nbsp;</p>
      <p>&nbsp;</p>
      <h2></h2>
      <h2><span class="auto-style3">2017.10.01 : for DB 11g (not XE)</span></h2>
        <p>
      <strong>
      <a href="https://www.beejblog.com/2017/10/oracle-forms-11g-development-installation-tips.html">
      <span class="auto-style3">https://www.beejblog.com/2017/10/oracle-forms-11g-development-installation-tips.html</span></a></strong><span class="auto-style3"> 
      :<br>
      We’re using the </span> <strong><span class="auto-style3">web servlet</span></strong><span class="auto-style3"> stuff which runs our 
      forms as java applets… it’s actually a pretty slick (smooth) rich 
      client arrangement for the bygone (gone, departed) era it heralds 
      from. (90’s - legacy conversion project at work) . <span class="hl">
      <br>
      “xcopy" deploy of the main “Oracle Home" folder 
      (c:\oracle\middleware) to my other team members’ machines</span>… 
      plus the appropriate registry branch (e.g. 
      HKEY_LOCAL_MACHINE\SOFTWARE\ORACLE\KEY_OH1949191890)</span></p>
      <h3><strong class="auto-style3">Both 32 &amp; 64bit required</strong></h3>
      <p><span class="auto-style3">JDK required – JRE’s not enough.<br>
      we are running on Win10 x64 naturally preferring to install 64bit 
      executables…<br>
      thereby running the 64bit Forms Builder installation which requires 
      64bit JDK…<br>
      however the </span> <strong><span class="auto-style3">servlet web site</span></strong><span class="auto-style3"> generates 32bit java 
      tag references (i’m kinda thinking IE was 32bit only at the time) so 
      we also need the 32bit JDK installed</span></p><p>
      <span class="auto-style3">JDK 1.6.0u35 – through painful trial and error i’ve settled on 
      this fairly dated release… i’ve seen various components in this 
      whole stack run on more recent JDK’s but </span> <strong>
      <span class="auto-style3">subsequent obscure 
      runtime errors</span></strong><span class="auto-style3"> beat me into submission</span></p>
      <p>&nbsp;</p>
      <h3>Main Installation Steps</h3>
      <p><span class="auto-style3">stop your virus checker’s active file scan – we’re on McAfee 
      enterprise and everybody is pretty spooked that it interferes with 
      these ancient installs and i had enough problems to go ahead and 
      rule it out<br>
      </span>
      <strong><span class="auto-style3">WebLogic Server v1.0.3.6 hard dependency</span></strong><span class="auto-style3"><br>
      i loosely understand weblogic as the web server backend, “servlets", 
      which deliver the pages and java applets<br>
      as mentioned, we’re targeting the 11g/11.x stack which drives this 
      1.0.3.6 version requirement… seriously, trust me, save yourself the 
      trouble, any other version is not going to work with the 11.x Oracle 
      Forms stack which comes next<br>
      see download links at the bottom of this page</span></p><p>
      <span class="auto-style3">CRUCIAL – make sure to get the “Generic" jar – specifically 
      wls1036_generic.jar<br>
      CRUCIAL – launch wls1036_generic.jar specifically via the golden JDK 
      above under</span><strong><span class="auto-style3"> ELEVATED aka Admin command line</span></strong><span class="auto-style3"> like so<br>
      </span>
      <strong><span class="auto-style3">C:\Program Files\Java\jdk1.6.0_35\bin -jar 
      wls1036_generic.jar</span></strong><span class="auto-style3"><br>
      </span>
      <strong><span class="auto-style3">DO NOT just double click the .jar</span></strong><span class="auto-style3"> to launch, that 
      will typically launch via JRE WHICH WILL ACTUALLY INSTALL WITHOUT 
      ERROR AND THEN BITE YOU when it comes to the Oracle Forms piece… i 
      know, nuts!<br>
      We went with the </span> <strong><span class="auto-style3">default c:\oracle “home" path</span></strong><span class="auto-style3">… 
      which wound up creating a single </span> <strong>
      <span class="auto-style3">c:\oracle\middleware folder</span></strong><span class="auto-style3"><br>
      Oracle Forms 11.x (v11.1.2.0 is current latest)<br>
      the x64 zips worked for us…<br>
      download &amp; extract those zips and fire up the </span> <strong>
      <span class="auto-style3">Disk1\setup.exe&nbsp;&nbsp; AS ADMIN (ELEVATED</span></strong>)<span class="auto-style3"><br>
      and one big important choice is to choose </span> <strong>
      <span class="auto-style3">“Install Software 
      – Do Not Configure"</span></strong><span class="auto-style3">… we’ll do the configure step next<br>
      we stuck with the </span> <strong><span class="auto-style3">default “Oracle_FRHome1" path</span></strong><span class="auto-style3"><br>
      </span>
      <strong><span class="auto-style3">skip security updates (that ship has long since sailed ;)</span></strong><span class="auto-style3"><br>
      once the install finishes then fire up <strong><br>
      c:\oracle\middleware\Oracle_FRHome1\bin\config.bat&nbsp;&nbsp; AS 
      ADMIN (ELEVATED</strong></span>)<span class="auto-style3"><br>
      </span>
      <strong><span class="auto-style3">select “configure for development" vs deployment</span></strong><span class="auto-style3"><br>
      </span>
      <strong><span class="auto-style3">provide the previous weblogic and oracle home paths</span></strong>…<span class="auto-style3"><br>
      </span>
      <strong><span class="auto-style3">we just went with FormInstance1 for the instance path</span></strong><span class="auto-style3"><br>
      </span>
      <strong><span class="auto-style3">“for development only", didn’t select the reports bits</span></strong><span class="auto-style3"><br>
      </span>
      <strong><span class="auto-style3">auto port configuration = yes</span></strong><span class="auto-style3"><br>
      Lastly were specific environmental configs, YMMV<br>
copy our default.env file to
c:\oracle\middleware\user_projects\domains\FORMDomain\config\fmwconfig\servers\AdminServer\applications\formsapp_11.1.2\config<br>
copy our formsweb.cfg =&gt;
c:\oracle\middleware\user_projects\domains\FORMDomain\config\fmwconfig\servers\AdminServer\applications\formsapp_11.1.2\config<br>
      copy our tnsnames.ora and sqlnet.ora =&gt; 
      c:\oracle\middleware\FORMInstance\config<br>
      copy jacob.jar =&gt; c:\oracle\middleware\Oracle_FRHome1\forms\java<br>
      copy jacob.dll =&gt; c:\oracle\middleware\Oracle_FRHome1\forms\webutil 
      (NOT down to either \win32|\win64)<br>
      CRUCIAL – </span> <strong><span class="auto-style3">update registry 
      HKEY_LOCAL_MACHINE\SOFTWARE\ORACLE\KEY_OH1949191890\FORMS_PATH to 
      include your forms “.fmb, .mmb, etc" file paths</span></strong><span class="auto-style3">… we had 
      separate folders for images, forms, libs &amp; menus files to be 
      included there<br>
      this “KEY_OH1949191890" path is probably different for each 
      installation</span><strong><span class="auto-style3"><br>
      </span>
      </strong></p>
      <p><span class="auto-style3">In \javacpl.exe <br>
      Add exception URL </span> <a href="http://sspc1:7001/forms/frmservlet">
      <span class="auto-style3">http://sspc1:7001/forms/frmservlet</span></a><span class="auto-style3">&nbsp; <br>
      and Advanced -&gt;"Default Java for browser" not checked for 64 bit 
      \javacpl.exe :</span></p><span class="auto-style3">
      <p><br>
      C:\Program Files (x86)\Java\jdk1.8.0_92\jre\bin\javacpl.exe&nbsp; 
      (32 bit)&nbsp;&nbsp;&nbsp; ORIGINAL : <br>
      C:\Program Files (x86)\Java\jdk1.6.0_35\jre\bin\javacpl.exe </p></span> 
      <p>
      <a href="file:///C:/Program%20Files/Java/jdk1.7.0_80/jre/bin/javacpl.exe%20%20%2864%20bit">
      <span class="auto-style3">C:\Program Files\Java\jdk1.7.0_80\jre\bin\javacpl.exe&nbsp; (64 bit)</span></a></p>
      <br>
        <p class="auto-style3">&nbsp;</p>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <h1>Setup Oracle Test Environment with Vagrant 
        in one command</h1>
        <p>
        <a href="https://mobiliardbblog.wordpress.com/2018/06/18/setup-oracle-test-environment-with-vagrant-in-one-command/">
        <span class="auto-style3">https://mobiliardbblog.wordpress.com/2018/06/18/setup-oracle-test-environment-with-vagrant-in-one-command/
        </span>
        </a></p>
        <p><span class="auto-style3">By
        </span>
        <a href="https://mobiliardbblog.wordpress.com/author/fuhreralain/" rel="author" title="Posts by Alain Fuhrer">
        <span class="auto-style3">Alain Fuhrer</span></a><span class="auto-style3">,
        <time datetime="2018-Jun-MonT10:06:48UTC" pubdate="pubdate">June 
        18, 2018</time> </span></p><span class="auto-style3">
        <p>Who often needs an Oracle test environment to test or verify 
        something. Up to now, a Virtual Box environment had to be set up 
        and configured for this purpose. This was sometimes quite time 
        consuming and when I didn’t do it regularly I had to keep 
        looking up how certain things work in Virtual Box. <br>
        <br>
        The following work has to be done to set up an Oracle 
        environment:</p>
        <ul>
          <li>Configure Network in Virtualbox (NAT, Port Forwarding)</li>
          <li>Setup Operating System</li>
          <li>Configure Network of OS</li>
          <li>Install required Packages to install Oracle Binaries</li>
          <li>Install Binaries and setup network settings (listener, 
          sqlnet)</li>
          <li>Setup Oracle Database</li>
        </ul>
        </span><p><span class="auto-style3">Finally, after all these tasks, it is possible to test 
        something that may only take a few minutes.<br>
        There are great news now, because this is history now. Oracle 
        has published an official repository in GitHub for Oracle 
        products which are available in a vagrant box. These include an 
        Oracle 12.2 and an 11g database environment. The following steps 
        apply to </span> <strong><span class="auto-style3">Windows, Linux and Mac</span></strong><span class="auto-style3"><br>
        &nbsp;</span></p>
        <p><strong><span class="auto-style3">What is Vagrant?</span></strong><span class="auto-style3"><br>
        Vagrant is a free Ruby application for creating and managing 
        virtual machines. Vagrant enables simple software distribution, 
        especially in software and web development, and serves as a 
        wrapper between virtualization software such as VirtualBox, 
        KVM/QEMU, VMware and Hyper-V and software configuration 
        management applications or system configuration tools such as 
        Chef, Saltstack and Puppet</span></p><span class="auto-style3">
        <p>With Vagrant it is now possible to perform all the tasks 
        listed above with a simple command. The following requirements 
        must be met:</p>
        <ul>
          <li>Virtual Box is installed</li>
          <li>Vagrant is installed</li>
          <li>Compunter has a working Internet connection</li>
        </ul>
        <p>&nbsp;</p>
        <p>Now we are ready to set up an Oracle environment in a few 
        steps:</p></span>
        <ol>
          <li><strong><span class="auto-style3">copy the repository locally to the computer</span></strong></li>
        </ol>
        <pre><span class="auto-style3"> git clone https://github.com/oracle/vagrant-boxes</span></pre><span class="auto-style3">
        <p>If no GIT client is installed on the computer, the repository 
        can also be downloaded and unpacked as a zip file.</p>
        </span><p><span class="auto-style3">2.&nbsp;</span><strong><span class="auto-style3">copy 11g or 12.2 Ora. SW in the 64bit Linux 
        version to appropriate folder of the unpacked or cloned 
        repository</span></strong></p>
        <pre><span class="auto-style3">        not so: cp linuxx64_12201_database.zip vagrant-boxes\OracleDatabase\11.2.0.2 or :<br>C:\vagrant-boxes\OracleLinux\7&gt;</span><strong><span class="auto-style3">vagrant status</span></strong><span class="auto-style3">   to check Vagrantfile status and possible plugin(s) required<br>C:\vagrant-boxes\OracleLinux\7&gt;</span><strong><span class="auto-style3">vagrant up</span></strong></pre>
        <ol start="3">
          <li><strong><span class="auto-style3">go to the directory where the software was 
          copied and type in the following:</span></strong></li>
        </ol>
        <pre><span class="auto-style3">Vagrant up</span></pre><span class="auto-style3">
        <p>This command executes all work automatically. The whole 
        process takes between 15 and 45 minutes, depending on your 
        notebook</p>
        </span><ul><span class="auto-style3">
          <li>At the end of the setup you have the following at your 
          disposal:</li>
          <li>New Virtualbox environment with an Oracle 12.2 CDB and a 
          PDB</li>
          </span><li><span class="auto-style3">Oracle Database Express is available at
          </span>
          <a href="https://localhost:5500" rel="nofollow">
          <span class="auto-style3">https://localhost:5500</span></a></li>
          <li><span class="auto-style3">ssh connection is configured to localhost:2222 and 
          automatically integrated into Vagrant</span></li>
        </ul><span class="auto-style3">
        <p>The passwords for the Oracle database are shown at the end of 
        the setup and can be adjusted if required.</p>
        </span><pre><span class="auto-style3">default: INSTALLER: setPassword.sh file setup<br></span><strong><span class="auto-style3">default: ORACLE PASSWORD FOR SYS, SYSTEM AND PDBADMIN: VIxtcphKIQs=1</span></strong><span class="auto-style3">
default: INSTALLER: Installation complete, database ready to use!</span></pre><span class="auto-style3">
        <p>Once the environment is ready, it can be connected as follows</p>
        <pre>Vagrant ssh</pre>
        <p>After that you are automatically logged in as vagrant user on 
        the environment. This user has sudo rights to become Oracle.</p>
        </span><pre><span class="auto-style3">sudo su - oracle<br></span></pre>
        <p></p>
      </div>
      <p>&nbsp;</p>
      <p></p>
    </div>
  </div>
</div>
  <!-- E N D  22222 div class="c ontent" -->

  <div class="footer">
    © 2001-... ™phporacle - All rights reserved &nbsp; &nbsp;<a href="http://phporacle.altervista.org" title="phporacle blog">Comments</a> 
    &nbsp; &nbsp;<a href="/faqs.html">FAQs</a> 
    
          <?php
          $decimale = 6;
          $time_end = explode(" ", microtime());
          $time_end = $time_end[0] + $time_end[1];
          $time = round($time_end - STARTUP_TIME, $decimale) * 1000;
          
          $mem1 = round(STARTUP_MEMORY/(1024*1024), $decimale);
          $mem2 = round(memory_get_usage(true)/(1024*1024), $decimale);
          $mem  = $mem2 - $mem1;
          
          echo '<br />Page rendered in '.$time.' mili seconds'
               .', using '.round($mem,3).' MB '.'(='.$mem2.' - '.$mem1.')' 
               //.', Nr DB queries ' . $data['o']['NrDBqueries'] //$main_ctr->NrDBqueries
          ;
          ?>
    
    </div>
  <!-- E N D  33333 div class="footer" -->

</body></html>