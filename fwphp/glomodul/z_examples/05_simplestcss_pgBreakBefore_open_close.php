<?php
//http://dev1:8083/fwphp/www/
//http://dev1:8083/fwphp/www/
  $wsroot_url =  // http://dev1:8083/    //=URL_PROTOCOL or :
      ( (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https://' : 'http://' )
      . filter_var( $_SERVER['HTTP_HOST'] //URL_DOM AIN  .$_SERVER['REQUEST_URI']
      .'/', FILTER_SANITIZE_URL ) ;
  $page_title    = "H1 title - simplest.css demo" ;
  $path_rel_home = '/fwphp/www';
  $path_rel_img  = '/zinc/img/';
  $path_rel_css  = '/zinc/themes/';
  $path_rel_test = '/fwphp/glomodul/z_examples/';  // '../../test/'

    define('MODULE_TOWSROOT', '../../../') ; //to eg 'J:/awww/www/'
    define('WSROOT_PATH', str_replace('\\','/', realpath(MODULE_TOWSROOT) .'/') ); 
    define('MODULE_PATH', str_replace('\\','/', __DIR__.'/')) ; //define('MODULE_DIR', __DIR__) ;
    define('MODULE_RELPATH', rtrim(ltrim(MODULE_PATH, WSROOT_PATH),'/') ) ;
    define('MODULE_URL', $wsroot_url.MODULE_RELPATH);

?>
<!DOCTYPE html>
<html lang="hr-HR">

<head>
  <meta charset=utf-8" />
  <title></title>

  <!-- ibrowser tab icon -->
  <link rel="shortcut icon" href="<?=$path_rel_img?>favicon.ico">
  <link type="text/css" rel="stylesheet" media="all" href="<?=$path_rel_css?>simplest.css"/>
     <!-- or media="screen" -->
  <style>
  <!--
          /* 999=gray 666=darkgray fff=white #FCDEBC=
             T,R,D,L    
          */
  .hideme {display:none}
  .handcursor {cursor:pointer}
  -->
  </style>
</head>

<body>

  <div class="content"> 





    <!--      1. T O P  DROPDOWN  M E N U  (row 1) (Banner)         -->
      <!-- submenu -->
          <!-- submenu items-->
                                      <!-- dd class="dd2"   a class="sub"-->
    <div id="positioner">

      <div class="holder p1">
        <dl class="menu">
           <dt><a href="<?=MODULE_URL?>">HOME</a></dt>
      </div>

      <div class="holder p2">
        <dl class="menu">
           <dt><a href="<?=$wsroot_url.$path_rel_home?>">SITEHOME</a></dt>
      </div>

      <div class="holder p3">
        <dl class="menu">

          <dt><a href="#url">Txt formats</a></dt>

          <dd>
            <a href="#Hxtags">1. Hx tags</a><!--a id="Hxtags"></a-->
            <a href="#pgBreak">2. Page break</a>
            <a href="#tags" title="3. dl, dt, dd, paragraph, pre, ol, ul">
            3. Other tags</a>
            <a href="#tblhscroll">4. Tbl h. scrollbar</a>
          </dd>

        </dl>
      </div>

    </div><!--  e n d  d i v  i d = "positioner"  --

    
    <!--                    1. izbornik 2.redak (Banner)                       -->
    <div id="hMenu">

      <ul>
        <li id="frst">
      <!--div class="logo"-->
        <!--img width="211" height="47"--> 
        <img width="10%" title="<?=$path_rel_img?>meatmirror.jpg" class="handcursor"
             src="<?=$path_rel_img?>meatmirror.jpg" alt="<?=$path_rel_img?>meatmirror.jpg">
      <!--/div-->
        <a href="">POČETAK</a> <a href="#">O PROGRAMU</a><!--a id="Hxtags"></a-->
        <a href="#">OPREMA</a> <a href="#">LOKACIJE </a>
        <a href="#">KONTAKT</a>
        <a href="<?=$path_rel_test?>gallery_powers/index.php">GALLERY & BLOG</a> </li>
      </ul>
    </div><!--E N D  T O P  (row 1,2)               --> 



      <br />
      <H1><span style="color: gray;"><?=$page_title?></span>&nbsp;</H1>
      Top drop down menus do not work well in Pale moon ibrowser.
      <br /><br />
      <a id="Hxtags"></a>
      <H2><span style="color: gray;">1. H2 title - Other Hx tags</span>&nbsp;</H2>
      <h3><span style="color: gray;">H3 title - click BACKSPACE then SHIFT+BACKSPACE</span>&nbsp;</h3>
      <H4><span style="color: gray;">H4 title</span>&nbsp;</H4>
      Above are Hx tags, blah blah.

    <div>





      <span class="pgBreakBefore"></span>
      <a id="pgBreak"></a>
      <H2><span style="color: gray;">2. New page (page break) &lt;span class="pgBreakBefore">&lt;/span></span>&nbsp;</H2>
      Pdfcreator sees pgBreakBefore and creates new page.



      <br /><br />
      <a id="tags"></a>
      <H2><span style="color: gray;">3. dl, dt, dd, paragraph, pre, ol, ul</span>&nbsp;</H2>
      <dl><!--  class="menu" -->
        <dt>
          dl, dt, Before link <strong><a href="#tablehscroll">#tablehscroll &lt;a id="tablehscroll">&lt;/a></a></strong>
        </dt>
        <dd>
          dl, dd, before link 
          <a href="<?=$path_rel_test?>0302pdo_search_moj_rep_filter_named_params.php"
               >PDO SQLite search</a>
        </dd>
      </dl>

    <p>paragraph 1: blah blah&nbsp;
    </p>
    
    <ol>
    <li>ol li says: aaaaaa bbbbbbb</li>
    </ol>
    
    <ul>
    <li>ul li says: aaaaaa bbbbbbb</li>
    </ul>



    <p>paragraph 2: blah blah&nbsp;
    </p>
    <pre>pre, code, kbd, samp blah blah&nbsp;</pre>





      <br /><br />
      <a id="tblhscroll"></a>
      <H2><span style="color: gray;">4. Table with horizontal scrollbar (for narrow pages)</span>&nbsp;</H2>
      <div class="w3-container">
        <div class="w3-responsive">
          <table style="font-weight: normal;" class="w3-table-all">
            <tbody><tr>
              <th>Property (key)</th>
              <th>Value </th>
            </tr>

            <tr>
              <td>Oracle Home Location </td>
              <td>C:\Oracle\Middleware\Oracle_FRHome1</td>
            </tr>

            <tr>
              <td>Forms URL&nbsp; <strong>works only in IE &lt;=11</strong></td>
              <td>
              <p>
                <span class=""><strong>aaaaaaaa bbbbb :</strong></span>
                <br>Before link <strong><a href="#tablehscroll">#tablehscroll &lt;a id="tablehscroll">&lt;/a></a></strong>
              
                <br>Before link <a href="<?=$path_rel_test?>0302pdo_search_moj_rep_filter_named_params.php"
               >PDO SQLite search</a>
               <br> xxxxxxxx yyyyyyyyyyy
              </p>
              </td>
            </tr>

          </tbody></table>
          <!-- class="w3-table-all"-->
        </div>
        <!-- class="w3-responsive"-->
      </div>
      <!-- class="w3-container"-->



    </div><!--E N D  blah blah  --> 

  </div><!--E N D  c o n t e n t     --> 
  
</body>

</html>