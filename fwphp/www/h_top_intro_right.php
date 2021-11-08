<?php
/**
 *  J:\awww\www\fwphp\www\h_top_intro_right.php
 *                C O N T E N T  C O N T R O L L E R
 *  This is second of 5 home page parts (all are prefixed with "h_")
 *
 */
$tmp     = $img_url . 'ic_done_white_32dp.png' ;
$img_url_done_link_white = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';
?>

<!--header class="masthead"
        style="background: url('/vendor/b12phpfw/img/hdr_polje.jpg') no-repeat;
        background-size: cover "
>
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-left">
        <div class="d-flex justify-content-left">
            <div class="text-left"-->

<!-- hdr_polje.jpg header.jpg  dark-overlay   bg-black opacity-75-->
<header id="home-section" 
  style="background:url('/vendor/b12phpfw/img/header.jpg') no-repeat; background-size:cover; "
>


<div class="opacity-75">
  <div class="home-inner">
    <div class="container">
      <div class="row">

        <!-- *********************************************
                 1.1  U t i l s  L E F T  S I D E  M N U 
        ********************************************* -->
        <div class="col-lg-4">

          <!-- blue=bg-primary, bg-light, bg-black, gray=bg-secondary bg-transparent  card-form
               opacity-50
          -->
          <div class="card bg-transparent"> 
            <div class="card-header"> <!-- card-body -->

                  
                <div>
                  <span>1. Links, utilities (modules)</span>
                  <!-- long yellow button class="btn btn-warning btn-block" -->
                  <a class="btn btn-outline-secondary" target="_blank"
                     href="<?=$pp1->mkd?>"
                     title="Redirect_to( <?=dirname($pp1->module_url) .'/glomodul/mkd/'?> ). Mkd module. Rich text edit on web. SimpleMDE & Parsedown. CRUD of .txt or .md or .mkd oper.sys texsts. Summernote add is easy."
                     target="_blank">
                    Mkd (ed txt files)


                  <!-- href="/<?=$glomodul_path?>lsweb/Lsweb.php/" -->
                  <span>
                     <a class="btn btn-outline-secondary" target="_blank"
                        href="<?=$pp1->lsweb?>"
                        title="Read files & folders from web server docroot disk, call php scripts."
                     >lsweb</a>
                  </span>

                  <!--  -->
                  <a class="btn btn-outline-secondary" target="_blank" 
                  href="dev_suite.php">INFO</a>

                </div>

                <div>
                  <!--data-toggle="modal" data-target="#addUserModal"-->

                  <!--ALSO WORKS : href="<?=$wsroot_url?>phpmyadmin"> -->
                  <span><a class="btn btn-outline-secondary" target="_blank" 
                     href="<?=$pp1->phpmyadmin?>">phpMyAdmin</a>
                  </span>

                  <!--href="/<=$glomodul_path>..."-->
                  <span>
                    <a href="<?=$pp1->examples?>"
                       title=""
                       class="btn btn-outline-secondary" target="_blank">
                      Examples
                    </a>
                  </span><!--data-toggle="modal" data-target="#addUserModal"-->
                </div><!-- 1.1  U t i l s  (RIGHT  M N U) -->


                <!-- *********************************************
                          1.2  C R U D  (LEFT  M N U)
                ********************************************* -->
                <!-- class="btn btn-warning btn-block" -->
                <div>
                  <br /><span>2. CRUD PDO trait (MODEL)</span>&nbsp;

                  <div>
                    <a href="<?=$pp1->msg?>"
                       title="Users (=master, same as msgtype), messages (=detail) , replies (=subdetail) 
                       or todo/done or...any master-detil. CRUD PDO of MySQL DB tbl rows."
                       class="btn btn-outline-secondary" target="_blank">
                      Blog (Msg-s) MySQL DB
                    </a>
                  </div>

                </div><!--e n d  1.2  C R U D  (RIGHT  M N U)-->



                <div>
                  <p>
                     <br /><span>Oracle DB</span>

                  <!--href="/<=>..."-->
                  <span>
                    <a href="<?=$pp1->acxe?>"
                       title="Users equipment (or messages or...) - any master-detail. CRUD PDO of Oracle 11g XE DB tbl rows."
                       class="btn btn-outline-secondary" target="_blank">
                      ACXE (Ora.DB)
                    </a>
                  </span><!--data-toggle="modal" data-target="#addUserModal"-->

                    <a class="btn btn-outline-secondary" target="_blank" 
                       href="<?=$examples_url?>01_PHP_bootstrap/wishPDO/">Wish Ora</a>

                    <a class="btn btn-outline-secondary" target="_blank" 
                       href="<?=$examples_url?>todolist/web/">Todolist SQLite</a>

                  </p>


                  <span>MySQL DB</span>

                  <!--   -->
                  <a class="btn btn-outline-secondary" target="_blank" 
                     title="URL-s."
                     href="<?=$glomodul_url?>adrs/">Songs Mini3 PDO</a>
                </div>



                    <div>
                    <br /><span>3. CSS (VIEW)</span>
                    <span><a class="btn btn-outline-secondary" target="_blank" 
                          title="Bootstrap templates (PHP)" 
                          href="<?=QS?>i/b_tmplts">Bootstrap 5, PHP 8</a>
                    </span>

                    <span><a class="btn btn-outline-secondary" target="_blank" 
                          title="Free Bootstrap templates (PHP)" 
                href="https://startbootstrap.com/?showAngular=false&showVue=false&showPro=false">Free Bootstrap templates</a>
                    </span>

                    <span>&nbsp</span>

              </div> <!-- E N D  C R U D  r o w -->

                 
            </div> <!-- E N D  C R U D  c o n t a i n e r-->


          </div><!-- class="card bg-primary card-form" -->
           <br><br><br>
        </div><!-- class="col-lg-4" 2.1  U t i l s  (RIGHT  M N U) -->





                <!--h1 class="mx-auto my-0 text-uppercase">Grayscale</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">A free, responsive, one page Bootstrap theme created by Start Bootstrap.</h2>
                <a class="btn btn-primary" href="#about">Get Started</a-->



          <!-- *********************************************
                    2. TOP RIGHT  C O N T E N T
          ********************************************* -->
          <div class="col-lg-8 d-none d-lg-block">

              <h1 class="display-4"><strong>LCS</strong> - Build social profiles</h1>

              <div class="d-flex flex-row">
                <div class="p-4 align-self-start">
                <!--div class="p-4 align-self-end"-->
                  <?=$img_url_done_link_white?>
                   <b>L</b>EARN something - Connect and explore what your friends write. Hard work on learning is worth nothing if not explained & shared.

                  <br /><br /><?=$img_url_done_link_white?>
                  <b>C</b>REATE - explain - write text about something.

                  <br /><br /><?=$img_url_done_link_white?>
                  <b>S</b>HARE what you create. 
                </div>
              </div>


              Created with PHP 8.0.12,  Bootstrap 5.1.3. This is typical static web page with dynamic (PHP) links. 
              <br><br>
              This view script <?=__FILE__?> is included in home.php.
              <br>
              h_... means one of 5 parts of home page (top toolbar, this top intro-menu and 3 page parts). 
              <!--/section-->
              </strong>
          </div><!-- 1.1 TOP RIGHT  C O N T E N T   -  LEFT COLUMN -->






        </div><!-- class="row"  S I D E  M N U -->
      </div><!-- class="container" -->

    </div><!-- class="home-inner" -->
  </div><!-- class="dark-overlay" -->
</header>

