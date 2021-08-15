<?php
/**
* http://dev1:8083/fwphp/glomodul/z_examples/?i/homeCtrClsAkcName/p1/p2
*   homeCtrClsAkcName may be "examples"
* J:\awww\www\fwphp\glomodul\z_examples\index.php
*
* simplest.c ss or mini3.c ss
*/
?>

<!DOCTYPE HTML>
<html lang="hr-HR">
<head><title>EXAMPLES</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="/zinc/img/favicon.ico">
  <link type="text/css" rel="stylesheet" media="all" href="/zinc/themes/mini3.css" />
  <style>
  </style><!--script src="utl_inc.js"></script-->
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
           <dt><a href="#url">HOME (refresh this page)</a></dt>
        </dl>
      </div>

      <div class="holder p2">
        <dl class="menu">

          <dt><a href="01_phpinfo.php">phpinfo</a></dt>

          <dd>
            <a href="02_info_php_pdo.php">PDO & OCI8 info</a> &nbsp;
            <a href="03_info_php_apache_config_scripts.php">config</a> &nbsp;
          </dd>

        </dl>
      </div>

      <div class="holder p3">

        <dl class="menu">

          <!--dt><a href="#url" class="sub">Utilities</a></dt-->
          <dt><span>Utilities</span></dt>

          <dd>
            <a title="Parse url query string" class="sub" href="03_test_parse_url.php">URL qrystring</a> &nbsp;
            <a title="call_child_fn_from_parent_cls" class="sub" href="03_call_child_fn_from_parent_cls.php">call_child_fn_from_parent_cls</a> &nbsp;
            
            <br>
            <a title="login_form_validation.php" class="sub"
               href="login_form_validation.php">Login form validation</a> &nbsp;

            <a title="encrypt/decrypt password hash" class="sub"
               href="03_encrypt_decrypt_password_hash.php">Encript/decript psw</a> &nbsp;

            <br />
              <!--    J:\xampp\htdocs\fwphp\glomodul\z_examples\pagination_hr_countries -->
              <a title="Pagination hr countries" class="sub" href="./MVC_FW/pagination_hr_countries/">Pagination hr countries</a> &nbsp;

              <a title="Steinmetz" class="sub" href="./book_video\03steinmetz_2008/ch01_INC_prev_next_links_ARR_rowcolor/paginator_navbar_no_rows.php">Pagination (Steinmetz)</a> &nbsp;

          </dd>

        </dl>

      </div>


      <div class="holder p4">

        <dl class="menu">

          <dt><span>Templates (Predlošci)</span></dt>

          <dd>
            <a href="06_flex_img_gallery.html">flex imggal</a> &nbsp;
            <a href="05_simplestcss_pgBreakBefore_open_close.php">simplestcss</a> &nbsp;
            <a href="05_index_2col.php">2col</a> &nbsp; &nbsp; &nbsp; &nbsp;

            <a title="Template with {{ }} placeholders, assigned using ob (output buffering) PHP functions. Is ob unneccessary complication ?" href="05_ob_templ.php">ob->template</a> &nbsp;
            <a href="05_predlozak_cssplay_3cols&Rside_tableles.php">cssplay</a>
          </dd>

        </dl>

      </div><!-- class="holder p4" Templates -->




      <div class="holder p5">

        <dl class="menu">

          <dt><span>Code examples</span></dt>

          <dd>
            <a href="MVC_FW/FLEX_minisite2017"
            title="">Basic site main menu module code idea (no B12phpfw)</a>. It is easy to use Bootstrap 4 instead of FLEX
                     (good exercize), but pages are slower.

            <br /><a href="php_patterns/singleton_B12phpfw.php?i/read_post/"
            title="">Basic B12phpfw CRUD code idea 1</a> : In 2 scripts: Home_ctr.php, singleton_B12phpfw.php. 
			Not easy to learn (as any framework, but easyer -:)).

            <br /><a href="MVC_FW/03xuding_glob/"
            title="">Basic B12phpfw CRUD code idea 2</a> : how to use B12phpfw code for CRUD admins table rows.


          </dd>



          <br><dt><span>Books, videos</span></dt>

          <dd>
            <a href="MVC_FW/FLEX_minisite2017"
            title="">Basic site main menu module code idea (no B12phpfw)</a>. It is easy to use Bootstrap 4 instead of FLEX
                     (good exercize), but pages are slower.

            <br /><a href="php_patterns/singleton_B12phpfw.php?i/read_post/"
            title="">Basic B12phpfw CRUD code idea 1</a> : In 2 scripts: Home_ctr.php, singleton_B12phpfw.php. 
			Not easy to learn (as any framework, but easyer -:)).

            <br /><a href="MVC_FW/03xuding_glob/"
            title="">Basic B12phpfw CRUD code idea 2</a> : how to use B12phpfw code for CRUD admins table rows.


          </dd>




        </dl>

      </div><!-- class="holder p5" Code examples -->



    </div><!-- id="positioner"-->


	<h2>Tests menu is lsweb module</h2>
<p>

<!-- http://dev1:8083/fwphp/glomodul
     J:\awww\www\fwphp\glomodul\z_examples\index.php
-->
Using <b>lsweb module</b> browse and run any PHP script :
  <a href="../lsweb/Lsweb.php/?cmd=<?=str_replace('\\','/', __DIR__ )?>">Other examples</a>

</p>

<hr />
<p>
ftr ftr ftr...
</p>
