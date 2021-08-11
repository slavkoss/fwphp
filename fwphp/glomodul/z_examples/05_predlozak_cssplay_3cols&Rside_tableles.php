<!DOCTYPE html>
<html lang="hr">
<head>
<!-- http://sspc1:8083/fwphp/glomodul/help_sw/test/predlozak_side_mnu_tableles.html
  J:\wamp64\www\fwphp\glomodul\help_sw\test\predlozak_side_mnu_tableles.html
J:\awww\apl\dev1\afwww\glomodul\help\help_moj\1_moj_site_iskon\predlozak_side_mnu_tableles.html
J:\zwamp64\vdrive\web\fwphp\glomodul\help\help_moj\1_moj_site_iskon\predlozak_side_mnu_tableles.html
     see http://www.cssplay.co.uk/

  J:\wamp64\www\fwphp\zinc\themes\site\2_4_col_main.css
  = ../../../zinc/themes/site/2_4_col_main.css  - WORKS IF 2CLICK .HTML (NO WEB SERVER)
  = /fwphp/zinc/themes/site/2_4_col_main.css - WORKS IF .php URL CALLED (WEB SERVER CALL)
-->
<meta id="viewport" name="viewport" content="width=device-width">
<meta charset="utf-8">
<!--[if lt IE 9]>
 <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
 <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

<title>4cols</title>

<meta name="Author" content="phporacle & Stu Nicholls">
<meta name="Keywords" content="style, cascading, sheets, Experiments, code, CSSplay
   , phporacle, Stu, Nicholls, demonstrations, menus, layouts, site, menu
   , Cutting, edge, free">
<meta name="Description"
      content="CSS ~ Cutting edge Cascading Style Sheets. Experiments in CSS">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/ico">


<link href='/zinc/themes/2_4_col_main.css' rel='stylesheet' type='text/css'>
<link href='/zinc/themes/2_4_col_home.css' rel='stylesheet' type='text/css'>
<style>
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}
</style>

</head>

<body id="www-cssplay-co-uk" class="home">



    <!-- TOP  H E A D E R and T I T L E  class="fontgray" <--on white -->
    <!--img src="/fwphp/b12fw/img/header_medium.jpg"
           title="Mobile Friendly Website" alt="Mobile Friendly Website">
     &nbsp;
    -->
    <header>
      <h1>
        <span>I</span><span>N</span><span>S</span><span>T</span><span>A</span><span>L</span>
        Oracle Forms 11.1.2.2.0
      </h1>
      <p>on Windows 10 64, Oracle DB 11g XE</p>
    </header>



    <!--
       TOP BLACK T O O L B A R
       DOES NOT WORK IF URL CALL (WEB SERVER CALL)
       AND link href='../../../zinc/themes/site/
    -->
    <ul class="main">
      <li id="home"><a href="/index.html">HOME</a></li>
      <li id="demos"><a href="/menu/">DEMOS</a></li>
      <li id="menus"><a href="/menus/">MENUS</a></li>
      <li id="layouts"><a href="/layouts/">LAYOUTS</a></li>
      <li id="boxes"><a href="/boxes/">BOXES</a></li>
      <li id="mozilla"><a href="/mozilla/">MOZILLA</a></li>
      <li id="explorer"><a href="/ie/">EXPLORER</a></li>
      <li id="opacity"><a href="/opacity/">OPACITY</a></li>
    </ul>



<div id="wrapper" onclick="">

  <section id="tutorial">

    <!-- ********** B E G I N N  div id="info" ********** -->
    <div id="info">
      <div class="top-banner">
      <!--
                    2. TOP  I M A G E
      -->
      <img src="/zinc/img/hdr_polje.jpg" alt="header.jpg" title="header.jpg"
           style="display:block; height:150px; width:100%;">
        <!-- TOP  T I T L E-->
        <h1>
          <span class="head1">CASCADING</span> <span class="head2">STYLE</span> <span class="head3">SHEETS</span>
          <br />
          Main menu PHP PDO MVC PSR-4 Oracle11g MySQL
        </h1>
      </div>









          <!--
                          4. THREE TOP  M I D  C O L U M N S
          -->
      <div id="midCol">
        <!--h3><span lang="hr">Main menu</span></h3-->



          <!-- 1. dl 1 : -->
                                                    <dl class="latest col1">
          <dt>1.1</dt>
            <dd title="title 1.1.1">&nbsp;&nbsp;1.1.1</dd>
          <dt>1.2</dt>
             <dd><a href="/afwww/glomodul/help/" title="titleeeeee">1.2.1</a></dd>
             <dd>&nbsp;&nbsp;1.2.2</dd>
          </dl><!--e n d col1 NEXT dl IN SAME L. --><dl class="latest col2">
          <dt>2.1</dt>
             <dd>&nbsp;&nbsp;2.1.1</dd>
             <dd>&nbsp; _____ SEPARATORRRR2 _____ &nbsp;</dd>
             <dd><a href="/afwww/cms1/Blog.php " title='xxxxxxxx'>2.1.2 </a></dd>
          <dt>2.2</dt>
             <dd>2.2.1</dd>
          </dl><!-- e n d col2 NEXT dl IN SAME L. --><dl class="latest col3">
          <dt>3.1</dt>
          <dd><a href="" title="aaaaaaaaa">3.1.1 aaaaaa</a></dd>



        <h4>Responsive Table with horizontal scrollbar
            <br />2click html does not work (THROUGH WEB SERVER WORKS!)</h4>
      <!--error in M I D   C O L  --div class="w3-container"-->
      <div style="overflow-x:auto;">
        <!--div class="w3-responsive"-->
           <table>
            <tr>
              <th> First Name </th><th> Last Name </th><th>Points</th>
              <th>Points</th><th>Points</th><th>Points</th><th>Points</th><th>Points</th>
            </tr>
            <tr>
              <td>1. Jill</td><td>Smith</td><td>51</td>
              <td>52</td><td>53</td><td>54</td><td>55</td><td>56</td>
            </tr>
            <tr>
              <td>2. Eve</td><td>Jackson</td><td>94</td>
              <td>94</td><td>94</td><td>94</td><td>94</td><td>94</td>
            </tr>
          </table> <!-- class="w3-table-all"-->
        <!--/div--> <!-- class="w3-responsive"-->
      </div> <!-- class="w3-container"-->



          </dl><!-- e n d class="latest col3 -->


      </div> <!-- ********** E N D  M I D   C O L U M  N div id="midCol" ********** -->


      <p>
      123456789012345678 aaa bbb qq bb 1HHHHHHHHH11
      GGGGGGGGGGGGGGGGGG 1HHHHHHHHH11
      </p>


    </div> <!-- ********** E N D div id="info" ********** -->






          <!-- ********** B E G I N N  div id="rightCol" ********** -->
          <div id="rightCol">



            <div class="boxTop">
              <p><b>This is NAVIGATION div id="rightCol"</b></p>
            </div>




            <div class="box300 col3">
              <br>
              <div class="cse-branding-right">
                <div class="cse-branding-form">
                  <form action="search.html" id="cse-search-box">
                    <div>
                      <input type="hidden" name="ie" value="UTF-8">
                      <input type="search" name="q" class="search"
                             placeholder="enter search">
                      <input type="submit" name="sa" value="Traži" class="cse-search">
                    </div>
                  </form>
                </div>
              </div>
            </div>





            <div class="box300 col3 tad">
              <p>This is div class="box300 col3 tad"</p>
              <p>Virtual Private Servers with 3-way storage on each
                 <a href="https://www.vpsserver.com/">VPS Server</a></p>
            </div>

            <div class="box300 col3 tad">
              <p>If you are looking for hosting provider for your next project,
                 here are <a href="http://www.top5hosting.co.uk/">
                             the best UK web hosting providers.</a>
              </p>
            </div>



            <div class="box300 col1">
              <h3 class="support">
                  Help <span>P</span><span>H</span><span>P</span> coding</h3>
              <div style="width:220px; margin:0 auto;">
                <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                  <div>
                    <input type="hidden" name="cmd" value="_s-xclick" />
                    <input type="hidden" name="hosted_button_id" value="3206316" />
                    <input type="image" src="/new-images/paypal.png" name="submit"
                           alt="Img paypal not found" />
                    <img alt="" src="https://www.paypal.com/en_GB/i/scr/pixel.gif"
                         width="1" height="1" />
                  </div>
                </form>
              </div>
              <p>DATA & CODE FLOW<br></p>
            </div>





            <div class="box300 col4">
              <h3 class="follow">
              Help <span>H</span><span>T</span><span>M</span><span>L</span>&<span>J</span><span>S</span> coding
              </h3>
              <br>
              <p><a href="http://facebook.com/StuCSSplay" rel="nofollow"><img src="/new-images/facebook.png" alt="Facebook" /></a>&nbsp;<a href="http://twitter.com/stucssplay" rel="nofollow"><img src="/new-images/twitter.png" alt="Twitter" /></a>&nbsp;<a href="http://www.cssplay.co.uk/feed.xml" title="RSS2.0 feed"><img src="/new-images/rss.png" alt="rss feed" title="RSS2.0 feed" /></a>&nbsp;<a href="/facebook-fan-page.html" rel="nofollow"><img src="/new-images/fanpage.png" alt="Facebook Fan Page" /></a><br>
              </p>
              <div class="g-plusone"></div>
            </div>





            <div class="box300 col5">
              <h3 class="pages">Help <span>C</span><span>S</span><span>S</span> coding</h3>
              <ul>
                <li><a href="https://www.w3schools.com/w3css/w3css_slideshow.asp ">W3SCHOOLS</a></li>
                <li><a href="http://www.cssplay.co.uk/">CSSPLAY</a></li>
                  <a href="http://www.stunicholls.com/" rel="nofollow">Stu Nicholls</a>
                  &nbsp; <a href="http://www.istu.co.uk/" rel="nofollow">iStu</a></li>
                <li><a href="http://www.meyerweb.com/">Eric Mayer </a></li>
              </ul>
            </div>



          </div>
          <!-- **********  E N D  div id="rightCol" ********** -->



            <!--
               white footer
            -->
      <div class="footer">
        <hr />
        <p>&copy; 2001-... &trade;phporacle - All rights reserved</p>
      </div>



  </section>


      <!--
         black footer
      -->
    <ul class="sub">
      <li><a href="http://phporacle.altervista.org" title="phporacle blog">Comments</a></li>
      <li><a href="/service.html">Design &amp; Assistance</a></li>
      <li><a href="/faqs.html">FAQs</a></li>
      <li><a href="/w3c/contact.html">Contact</a></li>
      <li><a href="/w3c/privacy.html">Privacy Policy</a></li>
      <li><a href="/support.html">Support</a></li>
    </ul>

</div> <!-- ********** E N D  div id="wrapper" ********** -->


        <h4>Responsive Table with horizontal scrollbar
            <br />2click html does not work (THROUGH WEB SERVER WORKS!)</h4>
      <!--error in M I D   C O L  --div class="w3-container"-->
      <div style="overflow-x:auto;">
        <!--div class="w3-responsive"-->
           <table>
            <tr>
              <th> First Name </th><th> Last Name </th><th>Points</th>
              <th>Points</th><th>Points</th><th>Points</th><th>Points</th><th>Points</th>
            </tr>
            <tr>
              <td>1. Jill</td><td>Smith</td><td>51</td>
              <td>52</td><td>53</td><td>54</td><td>55</td><td>56</td>
            </tr>
            <tr>
              <td>2. Eve</td><td>Jackson</td><td>94</td>
              <td>94</td><td>94</td><td>94</td><td>94</td><td>94</td>
            </tr>
          </table> <!-- class="w3-table-all"-->
        <!--/div--> <!-- class="w3-responsive"-->
      </div> <!-- class="w3-container"-->

</body>
</html>
