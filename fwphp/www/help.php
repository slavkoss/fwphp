    <!-- 
    /**
    * J:\awww\www\fwphp\www5\help.php
    */
     -->

<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1 shrink-to-fit=no">
  <title><?=$title?></title>
  
  <!--link rel="stylesheet" href="/zinc/themes/bootstrap/css/bootstrap.min.css"-->
  <link rel="stylesheet" href="/zinc/themes/flex_2cols.css">
</head>


<body>
<main><!--2.  m a i n  - container for a r t i c l e  &  a s i d e -->

  <article><!-- m a i n . a r t i c l e -->
    <div class="alert alert-success">

<?php
//require_once($this->pp1->wsroot_path.'zinc/ftr.php');   class="alert alert-success"
//text-decoration: none;   background:black;
  
if ('') //if ($autoload_arr['dbg']) 
{
  echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>' ; 
  //if (isset($this->uriq)) //if (is_object($this)) 
  if (isset($this)) 
  {
  echo '<pre>'; // style="background:black;"
  //echo '<b>$autoload_arr</b>='; print_r($autoload_arr); 
  echo '<b>Module`s property pallete like in Oracle Forms $this->pp1</b>='; print_r($this->pp1); 
  echo '<b>URI`s query string $this->uriq</b>='; print_r($this->uriq); 
  echo '<b>$_ GET</b>='; print_r($_GET); 
  echo '<b>$_POST</b>='; print_r($_POST); 
  echo '<b>$_SESSION</b>='; print_r($_SESSION); 
  echo '</pre><br />'; 
  } else {
  echo '<pre style="color:black;">';
  echo '<b>$_ GET</b>='; print_r($_GET); 
  echo '<b>$_POST</b>='; print_r($_POST); 
  //echo '<b>$_SESSION</b>='; print(json_encode($_SESSION,JSON_PRETTY_PRINT)); 
  echo '<b>$_SESSION</b>='; print_r($_SESSION); 
  echo '</pre><br />'; 
  //echo '<br /><span style="color: violet; font-size: large; font-weight: bold;">Loading script of cls $nsclsname='.$nsclsname.'</span>'
  }

} ?>

    <?php echo '<b>'. __FILE__ . ' SAYS:</b>'; ?>
    <h1>LINKS</h1>


    <h2>I. Model (PDO application server)</h2>
          <!-- ****************************************** -->
          <!-- title="My example code and real life modules"-->
         <a id="crud"></a>
         
    <!--
       <a href="/<=$path_rel_examples>/01_ PHP_bootstrap/ACXE2/" >oci8 PDOOCI CRUD ACXE2</a>

       &nbsp; <a href="/<=$path_rel_examples>/01_ PHP_bootstrap/wishPDO/" >wishPDO PDOOCI</a> 
            
            -->
          <!-- ************************************************** -->

          <!-- ************************************************** -->
          <br /><!-- title="My example code and real life modules"-->
    CRUD MySQL

            <a href="/<?=dirname($path_rel_examples)?>/encrypt_decrypt_password_hash.php" target="_blank">encrypt_decrypt_password_hash.php</a>&nbsp;&nbsp;

            <!--http://dev1:8083/fwphp/glomodul/z_user_crud_pdo1stSTEPS/ -->
            
            <a href="/<?=$path_rel_examples?>user_crud_pdo1stSTEPS/" target="_blank">User CRUD PDO (first steps)</a>

          &nbsp;<br><a href="/<?=$path_rel_examples?>AJAX/01_cars_diaz/" target="_blank">
    AJAX search, CRUD</a>&nbsp;&nbsp;&nbsp;
    <a href="/<?=$path_rel_examples?>0302pdo_search_moj_rep_filter_named_params.php" target="_blank">PDO SQLite search 
    (filter rows)</a>

          &nbsp;<br>
    <a href="/<?=$path_rel_examples?>AJAX/enter_tab_emul_validate_best.php" target="_blank">
    enter_tab_emul_validate_best.php</a>&nbsp; <br>
    <a href="/<?=$path_rel_examples?>login/loginbootstraptemplate/" target="_blank">
    login, reg, bootstrap, html</a>&nbsp;&nbsp;&nbsp;
    <a href="/<?=$path_rel_examples?>login/login_tutspoint/login.php" target="_blank">
    login_tutspoint</a>&nbsp;&nbsp;
    <a href="/<?=$path_rel_examples?>login/login/" target="_blank">login</a>&nbsp;&nbsp;
    <a href="<?=$path_rel_examples?>login/login_reg_profile/1_template_20180828/" target="_blank">
    login_</a><a href="/<?=$path_rel_examples?>login/login_bookmark">bookmark</a>&nbsp;&nbsp;
    <a href="/<?=$path_rel_examples?>login/login_secure" target="_blank">login_secure</a>&nbsp;&nbsp;
    <a href="/<?=$path_rel_examples?>login/kalob/" target="_blank">login_kalob</a><br>
    <a href="/<?=$path_rel_examples?>01_PHP_bootstrap/book_popel/" target="_blank">PDO Popel books, <b>invoice items</b></a>&nbsp;&nbsp; <br>


          <a href="/<?=$path_rel_examples?>user1/" >User login (first steps)</a>
          &nbsp;<a href="/<?=$path_rel_examples?>login_bookmark/" >User <b>login & bookmarks</b></a>
            <!-- <br /> -->
             &nbsp; <a href="/<?=$path_rel_examples?>auction_wrox24h_30/" title="Users login not working.
            Beautiful, simple GUI (CSS).
            Has blog functionality (posts table).
            Excellent alternative of menu classes tree but in my opinion not near so good.
            (Wrox 2011 PHP 24 hours)."
                   >Categories - things with pictures</a>

                &nbsp;&nbsp; 
    <a href="/<?=$path_rel_examples?>jokeyank/public/" title="Why own php fw: Not for me same as Pair, Nano, Mini3... Too complicated, not clear, only link tables are ok. Login : admin/demo  code 2017. year"
                       >UsrMsgs-jokes&nbsp;&nbsp;&nbsp; </a>





                    <br>
    <a href="/<?=$path_rel_examples?>jokeyank/public/" title="Why own php fw: Not for me same as Pair, Nano, Mini3... Too complicated, not clear, only link tables are ok. Login : admin/demo  code 2017. year"
                       >CRUD PDO</a>





                <!--
               title='Aplication advanced type "(User`s) M essages" : "Todo - Done"'>____SOCNET (TODO type)___ -->

              
              <a  href="/<?=$path_rel_examples?>socnet/" title="Login : php/php or html/html or..."><b>Socnet</b> Nixon 4thED, 2015</a>

               &nbsp; <a  href="/<?=$path_rel_examples?>gallery_powers/" title="Login : php/php or html/html or...Pictures in OS folders."><b>Gallery & Blog</b>, Powers 2014</a>

               &nbsp; <a  href="/<?=$path_rel_examples?>gallery_skoglund/gallery/public/" title="Login : php/php or html/html or...Pictures in MySQL DB."><b>Gallery</b>, Skoglund 2015</a>
               &nbsp; <a  href="/<?=$path_rel_examples?>gallery_skoglund/gallery/public/admin/" title="Login : php/php or html/html or...Pictures in MySQL DB."><b>Gallery</b>, Skoglund 2015, admin</a>

               &nbsp; <a  href="/<?=$path_rel_examples?>login_auction_Ullman/" title="Login : php/php or html/html or...">Ullman JS 2012</a>&nbsp;&nbsp;&nbsp;
    <br>
               

              <!-- title='Aplication advanced type "(User`s) M essages" : "Todo - Done"'>___KALENDAR (TODO type)___ -->
              <!-- J:\awww\www\fwphp\glomodul\user_post_kalendar_fmb  -->
              <a  href="/<?=$path_rel_glomodul?>user_post_kalendar_fmb/kalendar/" 
                      title='60 kB. See "Flexbox kalendar". TODO like MKD and MSG.'>Kalendar original</a>
          <!-- ************************************************** -->







        <!--
             M I D D L E  C O L U M N  2
         title="Bootstrap 4.x (fast, eg login form 230 mili seconds with no PDO CRUD) and own CSS (200 times faster, has all important Bootstrap functionality for small screens eg this page 0,15 mili seconds)"
         -->

           <a id="view"></a>
      <br /><br />
      <h2>II. View (CSS, JS), other</h2>

         

          <!-- ************************************************** 
              title="CSS responsive layouts. During developing this web multisite MVC scripts I tested many ideas 
              - here are I think the best View ideas."
          -->
              CSS responsive layouts

              <!-- http://dev1:8083/fwphp/glomodul/help_sw/test/flexmoj/00_predlozak_side_mnu_tableles.php -->

              <a href="<?='..'?>/glomodul/user_post_fmb"
                     title="B12phpfw template with Bootstrap 4.x (fast), but this template and Simplest page below is faster. Link (routing) is
                     1. My older idea : rps['upto_rootm_str']/glomodul/user_post_fmb
                     2. To me idea 1. seems worse than
                            URLMODULE=URLALLSITES.PATHMODULEBELOWWSDOC
                     3. Best I think is _config class which contains $conf array.
                          I am not shure what is best considering site hosting, Linux...
                          (This is deleloped on home PC, Apache virtual host
                           for more sites - eg fwphp site)
                     ">

           <strong>Msg mnu&amp;DBCRUD template</strong></a>&nbsp;- B12phpfw ver.4&nbsp; 
    - pagination, (tree classes for menus&nbsp;I tested, I do not use).&nbsp;&nbsp;&nbsp;
    <br /><a href="/<?=dirname($path_rel_examples)?>/predlozak_dropmnus.html" 
                     title="Dropdown menus - my favorite fast page">Simplest page</a> (this page based on 
    <a href="/<?=$path_rel_examples?>flexmoj/flex01_2col.php" target="_blank" title="Flexbox 2 columns">Flexbox 2 columns</a>&nbsp; 
    is simpler - css 70 lines + I added 70 !)&nbsp; &nbsp; <br /> <a  href="/<?=dirname($path_rel_examples)?>/test/01menu_OOP" title="">
                  OOP inherited menus</a>

                  &nbsp; &nbsp; 

                  &nbsp; &nbsp; <br /> <a  href="https://www.w3schools.com/w3css/w3css_slideshow.asp" title="HTML5 slideshow (W3 site)">
                  HTML5 slideshow (W3)</a>&nbsp;&nbsp;&nbsp;&nbsp; <br /><!-- flexbox -->
    <a href="/<?=$path_rel_examples?>flexmoj/" target="_blank" title="flexbox test dir">Flexbox</a>

                  &nbsp; &nbsp; 
    <a href="/<?=$path_rel_examples?>flexmoj/flex03_fixed_hdr_ftr.php" target="_blank" title="Flexbox sticky hdr ftr">Flexbox sticky hdr ftr</a>

                  &nbsp; &nbsp; 
    <a href="/<?=$path_rel_examples?>flexmoj/flex01_2col.php" target="_blank" title="Flexbox 2 columns">Flexbox 2 columns</a>
                  &nbsp; &nbsp; 
    <a href="/<?=$path_rel_examples?>flexmoj/flex05_calendar.html" target="_blank" title="Flexbox kalendar">
                  <b>Flexbox kalendar</b></a>
          <!-- ************************************************** -->


          <!-- ************************************************** -->
              <br /> <a href="/<?=$path_rel_examples?>flexmoj/00_predlozak_side_mnu_tableles.php"
                     title="flexbox test dir">Stu Nicholls CSSplay template</a>&nbsp;&nbsp;

              <a  href="http://www.cssplay.co.uk/"
                     title="Stu Nicholls: CSSPLAY site">CSSplay site</a>&nbsp;&nbsp;&nbsp;&nbsp; <a  href="/<?=dirname($path_rel_examples)?>/test/flexmoj/template_predlozak_2cols.html" title="Fast 2 columns template">
              <b>HFS & Ngrok DDNS</b> (Tpl.2col)</a>&nbsp;&nbsp;&nbsp;&nbsp;
              <br /><br /><a  href="/<?=dirname($path_rel_examples)?>/help_win.html" 
              title="">Help</a> - Windows keys, GT TEXT - ocr
          <!-- ************************************************** -->


          <!-- ************************************************** -->
              <br>Oracle DB help

              <a
              href="file:///L:/1_instalac/2_instalac_ora11g/forms_instalac/1_forms11/00_instalac_help/00oraForms11_1_2_2_0_instalac_moj.html"
                     title="In page for web server (eg http://...) IS NOT WORKING URL for ibrowser eg file:///L:/... BUT WORKS right click -> Copy Link Location -> put URL file:///L:/... in new ibrowser tab !!">
              9 videos Forms 11g inst. (HTML)</a>&nbsp;&nbsp;&nbsp;

              <a
              href="file:///L:/1_instalac/2_instalac_ora11g/forms_instalac/1_forms11/00_instalac_help/00oraForms12_instalac_moj.html"
                     title="In page for web server (eg http://...) IS NOT WORKING URL for ibrowser eg file:///L:/... BUT WORKS right click -> Copy Link Location -> put URL file:///L:/... in new ibrowser tab !!">
              Forms 12c inst. (HTML)</a>

              <a
              href="/<?=dirname($path_rel_examples)?>/oracle/00oraForms11_1_2_2_0_instalac_moj.php"
                     title="">
              9 videos Forms 11g install (PHP)</a>
          <!-- ************************************************** -->


          <!-- ************************************************** -->
              &nbsp;<br /><br />Other šđčćž
              <a  href="/<?=dirname($path_rel_examples)?>/other/Gulas_Zvornicki_sitni_cevab.html"
                 title="">
              Gulaš</a>

              <a href="" title="ddd">...</a>
          <!-- ************************************************** -->









        <!--
             M I D D L E  C O L U M N  3
         -->
        

         <a id="tests"></a>
              
    <br /><br />
              
    <h2>III. Tests&nbsp; (PHP app.server)</h2>


          <!-- **************************************************
            old href="<='../../zinc/utl/ls web/ls web.php?cmd='. $helpsw_ path?>"
        http://dev1:8083/fwphp/glomodul/lsweb/l sweb.php/?cmd=J:/awww/www//fwphp/glomodul/help_sw/test
          -->
          <!-- title="Learning examples"-->
              My tests &amp; Demos
        
        <a href="/<?=$path_rel_glomodul?>lsweb/lsweb.php/?cmd=' . $wsroot_path.$path_rel_help?>"
           target="_blank">ALL HELP SW (lsweb)</a>
        &nbsp; <a href="/<?=$path_rel_examples?>" target="_blank" title="Help dir">Help dir</a>
        &nbsp; 
    <a href="<?=$wsroot_url?>phpmyadmin" target="_blank" title="getenv('COMPUTERNAME')">PHPMyAdmin</a>
        &nbsp; 
    <a href="/<?=$path_rel_examples?>00info_php.php" target="_blank" title="Help dir">PHP info</a>
        <br />
        <a href="/<?=$path_rel_examples?>curl/curl/curl_test.php" target="_blank" title="Help dir">cURL test & SSL (https)</a>
        

            <hr />

          <!-- ************************************************** -->
    <!-- ************************************************** --><br>PHP frameworks
                <!-- /../zbig/yiibasic/requirements.php -->
    <a href="/<?=$path_rel_examples?>yiirequirements/" target="_blank">Yii2 requir.</a>&nbsp;&nbsp;
    <a href="<?='..'.'/../zbig/yiibasic/web/'?>" target="_blank">Yii2 (Caldarelli)</a>
    <!-- title='Aplication type "(User`s) Messages" : "Content Management System", "Customer Relations Management"'-->&nbsp;&nbsp;&nbsp;
    <a href="http://dev1:8083/zbig/blog_laravel/public/" target="_blank">Laravel</a>&nbsp;&nbsp;&nbsp;
    <a href="http://dev1:8083/zbig/xcodeig/public" target="_blank">Codeigniter 4</a>&nbsp;
    <br><br>BLOG (CMS type - <strong>summernote, gump</strong>)&nbsp;&nbsp;
    <a href="/<?=$path_rel_examples?>cms_extern/simplecms/" target="_blank" title="Bootstrap 4 &amp; Summernote 2018.02.27
                       Like SimpleMDE works well only for simpler texts.
                       Eg can not display &quot;Simplest page&quot; dropdown menus.">Simple CMS</a>

                  &nbsp; 
    <a href="/<?=$path_rel_examples?>cms_extern/simplecms/admin" target="_blank" title="Bootstrap 4 &amp; Summernote 2018.02.27
                       Like SimpleMDE works well only for simpler texts.
                       Eg can not display &quot;Simplest page&quot; dropdown menus.">
    ...Simple CMS backend</a>&nbsp; usr/psw : admin/demo
    <!-- *******OLD (Akram), but lot of functionality *******
                     J:\awww\www\fwphp\glomodul\help_sw\test\cms_extern
                     -->
                     
    <pre>
<strong>RewriteEngine On</strong>
<strong>RewriteBase</strong> /fwphp/glomodul/help_sw/test/cms_extern/simplecms/
RewriteCond %{REQUEST_FILENAME} !-d [NC]
RewriteCond %{REQUEST_FILENAME} !-f [NC]
RewriteRule ^(.*)$ <strong>index.php</strong>?pid=$1 [QSA,L]   </pre>


    <a href="/<?=$path_rel_examples?>cms_extern/cmsakram/Blog.php%20" title="Lot of functionality but OLD BOOTSTRAP &amp; OLD PHP PROGRAMMING STYLE video  http://jazebakram.com/ &quot;Build CMS Blog...&quot;">OLD CMS frontend (has Search)</a>
    <a href="/<?=$path_rel_examples?>cms_extern/cmsakram/dashboard.php" title="Login is commented. Lot of functionality but OLD BOOTSTRAP &amp; OLD PHP PROGRAMMING STYLE video  http://jazebakram.com/ &quot;Build CMS Blog...&quot;">...OLD CMS backend admin</a>
    <!-- *******OLD (Diaz), but lot of functionality ******* --><br>
    <a href="/<?=$path_rel_examples?>cms_extern/cmsdiaz/" title="Lot of functionality but OLD BOOTSTRAP &amp; OLD PHP PROGRAMMING STYLE video  http://jazebakram.com/ &quot;Build CMS Blog...&quot;">OLD CMS2 frontend (has Search)</a>

                     &nbsp; 
    <a href="/<?=$path_rel_examples?>cms_extern/cmsdiaz/admin/" title="Login is commented. Lot of functionality but OLD BOOTSTRAP &amp; OLD PHP PROGRAMMING STYLE video">...OLD CMS2 backend admin</a>
    <!--title='Aplication type "(User`s) M essages" : "Content Management System", "Customer Relations Management"'-->
    <br><br>BLOG (CMS type) external modules&nbsp;


                
          <a href="/<?=$path_rel_examples?>cms_extern/yellowcms/" title="&quot;DB&quot; is flat files md">YellowCMS files CRUD, search</a>&nbsp;&nbsp;
                
                  <a href="/<?=$path_rel_examples?>cms_extern/wondercms/" title="&quot;DB&quot; is one .json file">
    WonderCMS 2.4.2</a> (Summernote)&nbsp;&nbsp;

                

                     <!-- ******* http://dev1:8083/zbig/anchorcms/ ******* -->
    <br>
    <a href="/zbig/anchorcms/" title="700 kB (5 MB), March 2018. Posts, Comments, Pages, Categories, Users. Lot of functionality, eg Search, NEWEST PHP PROGRAMMING STYLE. Anchor CMS is based on Nano php fw. Both are excellent newest programming techniques, pretty COMPLICATED-&gt;SLOW BECAUSE OF BAD CODE FLOW, NOT WELL EXPLAINED (as almost all inet and books examples). Nano is on my home PC without Bootstrap slower then any of six bootstrap 4 templates ! That is why Why own php fw (Mkd and Msg module) or no php fw -(CMS module).">
    CMS Anchor</a>&nbsp; usr/psw : admin/admin1&nbsp;
    <br>
    <a href="<?='/zbig/pair_user'?>" title="class ActiveRecord 2000 lines, 74 f u n c t i o n s !?.">Pair php fw - users</a>
    <!--http://dev1:8083/fwphp/glomodul/help_sw/test//nano/public/?/=home -->
    <a href="/<?=$path_rel_examples?>nano/public/?/=home" title="92 kB, Jan 2016. See Anchor CMS which is based on Nano php fw.
                              Error: Call to a member function send() on null in
                              J:\awww\www\fwphp\glomodul\help_sw\test\nano\app\run.php ? - NOT EXPLAINED, TO COMPLICATED, SLOW CODE.">&nbsp;&nbsp;&nbsp; Nano php fw</a>
    <!-- ************************************************** -->
    <!--
               O N E  C O N T E N T  C O L U M N  B E L O W  C O L .   1,2,3
             --><?php //require_once 'home_03_content.php'; ?>
    <p>&nbsp;</p>


        <br /><br />
        <b>FAQ&nbsp; Code snippets</b>
        <pre>~~~~~~~~~~~~~ <b>ROUTING, see index.php and conf_... scripts
    </b>
    php 7 has constants arrays - more elegant code
            
            


    ~~~~~~~~~~~~~ <strong>array_filter</strong>
    $myarray = array_filter($myarray, 'strlen'); //removes null values but leaves &quot;0&quot;
    $myarray = array_filter($myarray); //removes all null values
    array_values() returns all the values from the array and indexes the array numerically.
    //NOT SO : to preserve elem. i.e. exact string '0', needed is custom callback php&amp;gt;=5.3:
    $urlqry_arr=array_values(array_filter($urlqry_arr,function($value){return $value!=='';}));
    $urlqry_arr=array_values(array_filter($urlqry_arr, 'strlen'));

    ~~~~~~~~~~~~~ <strong>foreach</strong>
    foreach($urlqry_arr as $key =&amp;gt; $val)
    {
    echo $key.'='; echo $val;
    //if (is_null($val) or !$val) unset($key); else echo ' --not (isnull($val) or !$val)';}
    //if ($val == '') unset($urlqry_arr($key)); // ERROR !!!
    }

    ~~~~~~~~~~~~~ <strong>VARIABLE VARIABLES and PASSING BY REFERENCE</strong>
    //cannot be used with PHP's Superglobal arrays within functions or class methods. 
    The variable $this is also a special variable that cannot be referenced dynamically.
    $varname = 'hello'; //eg loop: $IDm[oney_type] from entered item or from moneytypes tbl
    $$varname = 'world'; //same as $hello = 'world';
    echo &quot;$varname ${$varname}&quot;; //same as echo &quot;$varname $hello&quot;; //outputs: 'hello world'

    $string = &quot;foo&quot;;
    ${$string}_bar = &quot;&quot;; // Creates the empty string $foo_bar

    $price_for_monday = 10;
    $price_for_tuesday = 20;
    $price_for_wednesday = 30;
    $today = 'tuesday';
    $price_for_today = ${'price_for_' . $today};
    echo $price_for_today; // will return 20


    $first_var = 1;
    $second_var = 2;
    $third_var = 3;
    $which_one = array_rand('first', 'second', 'third');

    //Let's consider the result is &quot;second&quot;.
    $modifier = $$which_one; //Now $modifier has value 2.
    $modifier++; //Now $modifier's value is 3. &lt;---------
    echo $second_var; //Prints out 2

    //Consider we wish to modify the value of $second_var
    $modifier = &amp;$$which_one; //PASSING BY REFERENCE
    $modifier++; //Now value of $second_var is 3 too. &lt;---------
    echo $second_var; //Prints out 3


    //to set variables if they don't have value yet:
    //this works under any scope, even when called inside another function!
    function setvar($n,$v=''){global $$n; if(!isset($$n)) $$n=$v ; }
    //~~~~~~~~~~~~~ e n d VARIABLE VARIABLES and PASSING BY REFERENCE

</pre>
    <br />


</div><!-- class="alert alert-success bg-light blue=primary"-->

  </article><!-- e n d  m a i n . a r t i c l e -->


  <aside><!-- m a i n . a s i d e  right column for links -->


<div style="color:black;">


    <!-- end three midCol -->

         <a id="extlinks"></a>
  <h1>EXTERNAL LINKS</h1>
    <p>

    <a href="https://github.com/slavkoss/fwphp"  title="fwphp Github"> myGithub</a>
    &nbsp;&nbsp;
    <a href="http://phporacle.altervista.org/"  title="phporacle blog">myblog</a>

     <!-- http://dev1:8083/fwphp/glomodul/lsweb/l sweb.php/?cmd=J:/awww/www//fwphp/glomodul/help_sw -->
     &nbsp;<a href="/<?=$path_rel_glomodul?>lsweb/lsweb.php/?cmd='.$pathzbig?>"  
           title="phporacle blog articles downloaded on my local PC">myblog</a> on homePC (lsweb, zbig)

    </p>

    <p>

    <a href="http://www.oracle.com/technetwork/database/database-technologies/scripting-languages/php/overview/index.html"
       >
    Oracle`s PHP help</a>

    &nbsp; <a href="https://www.w3schools.com/tags/default.asp" >
    w3schools html</a>&nbsp; or
    <a href="https://www.w3schools.com/cssref/default.asp" >
    w3schools css</a>&nbsp;
    <a href="https://developer.mozilla.org/en-US/docs/Web/JavaScript" >
    Mozilla Javascript</a> &nbsp;<a href="https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display/" >Mozilla
    CSS</a>

    </p>



              <p>
              <a href="<?='https://w3guy.com/simple-form-validation-php-array/'?>"
                 >w3guy form validation</a>

              </p><p><a href="<?='http://vstest1/'?>" >.NET CRUD test</a>

              </p>






          <!--
             4. b l u e  r i g h t  l i n k s
          -->

          <h1>Help <span>JS</span></h1>
          <ul>
            <li><a href="https://www.w3schools.com/w3css/w3css_slideshow.asp ">W3SCHOOLS</a></li>
            <li><a href="http://www.cssplay.co.uk/">CSSPLAY</a>
              <a href="http://www.stunicholls.com/" rel="nofollow">Stu Nicholls</a>
              &nbsp; <a href="http://www.istu.co.uk/" rel="nofollow">iStu</a></li>
            <li><a href="http://www.meyerweb.com/">Eric Mayer</a></li>
          </ul>






         <a id="faq"></a>
        <br/><br/><h1><span>FAQ</span></h1>

        <br /><br /><b>FAQ&nbsp; WHAT and HOW : Application server</b> is our php code (scripts) called by web server when browser sends script to web server if URL in browser adress bar is "http://...". (Oracle Forms11 opposite : URL calls Application server code which calls web server code.)
        <br />We do not send script to web server (but only to browser) so : eg "file:///J:/awww/www/fwphp/www/trace_log.html" in browser adress bar.
        <br />In case "file:///...", for .php script IE 11 asks "Open (in text editor) or Save (download) ?".

        <br><br>
    <b>FAQ </b>&nbsp;According to Google™s Greg Michillie in May 2013. PHP ran over 75% of the world's websites, and over 82% by July 2016. End 2018 : PHP ~35 millions websites, ASP.NET 27, Ruby on Rails 1. In November 2018.
    
    <br /><br /><a href="https://w3techs.com/technologies/details/pl-php/all/all" target="_blank">w3techs.com</a> : PHP is used by 78.9% of all websites with a known server-side programming language. WordPress (PHP) powers over 32% of all the websites on the Internet. MediaWiki.

    <br /><br />PHP 7.2 is pushing 2-3X the number of requests per second as PHP 5.6. Java, Node 2X faster, Go 4X faster unless you use a extension like <a href="https://www.swoole.co.uk/" target="_blank">Swoole</a> to bootstrap PHP into memory. Reddit is written in Python. The moment you put a database behind Go, Node, Java and PHP, they all become just as slow.

    <br /><br />Most of the speed, security... depends on the developer skills and experience, not the language.
    <br /><br />Why you need to <a href="https://kinsta.com/blog/php-versions/" target="_blank">update</a> your PHP version ? 
          
    <a href="https://kinsta.com/blog/is-php-dead/" target="_blank">Is PHP dead </a>?
    <br />

        <br /><br>WAMP: <a href="<?='/../index_wamp.php'?>"
             title="not very useful ('Path science') !!"
             >menu</a>

    &nbsp; <a href="<?='../glomodul/help_sw/test/yiirequirements/wampmenumy/index_zwamp.php'?>"
             title="Romain Bourdon author of WAMP uses I think best php templating which is clear implemented in this script. 2014 I have seen how good it is but my clear implementation is 3 years later (I work this in my spare time)."
             >myMenu</a>

    &nbsp; <a href="http://forum.wampserver.com/read.php?2,138295,page=1"
             >WAMP site-instal</a><br />


</div>



  <pre>
    _.-'''''-._
  .'  _     _  '.
 /   (o)   (o)   \
|        &copy;        |
| Slavko Srakočić |
 \  '. Zagreb.'  /
  '.  ''---''  .'
    '-._____.' 
 </pre>




  </aside>



</main>
</body>
