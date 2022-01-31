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
<!--header id="home-section" 
  style="background:url('/vendor/b12phpfw/img/header.jpg') no-repeat; background-size:cover; "
-->


  <div class="section values">
    <div class="container">

      <div class="row">


        <div class="one-third column value">
          <h2 class="value-multiplier">1. Modules</h2>
          <h5 class="value-heading">Links, utilities, modules</h5>
          <p class="value-description">Modules are folders like Oracle fmb.</p>
          <!-- *********************************************
                 1.1  U t i l s  L E F T  S I D E  M N U 
          ********************************************* -->
          <div>
              <a class="button button-primary" target="_blank" 
                 title="Redirect_to( <?=dirname($pp1->module_url) .'/glomodul/mkd/'?> ). Mkd module. Rich text edit on web. SimpleMDE & Parsedown. CRUD of .txt or .md or .mkd oper.sys texsts. Summernote add is easy."
                 href="<?=$pp1->mkd?>">Mkd (ed txt files)</a>

              <a class="button button-primary" target="_blank" 
                 title="Read files & folders from web server docroot disk, call php scripts."
                 href="<?=$pp1->lsweb?>">lsweb</a>

              <a class="button button-primary" target="_blank" 
                 title="Read files & folders from web server docroot disk, call php scripts."
                 href="dev_suite.php">INFO</a>

              <a class="button button-primary" target="_blank" 
                 title=""
                 href="<?=$pp1->phpmyadmin?>">phpMyAdmin</a>

              <a class="button button-primary" target="_blank" 
                 title=""
                 href="<?=$pp1->examples?>">Examples</a>
          </div>

        </div><!-- 1.1  U t i l s  -->





        <div class="one-third column value">
          <h2 class="value-multiplier">2. CRUD</h2>
          <h5 class="value-heading">CRUD PDO trait (MODEL)</h5>
          <p class="value-description"></p>
          <!-- *********************************************
                    1.2  C R U D  (LEFT  M N U)
          ********************************************* -->
          <!-- class="btn btn-warning btn-block" -->
          <div>
              <a class="button button-primary" target="_blank" 
                 title="Users (=master, same as msgtype), messages (=detail) , replies (=subdetail) 
                       or todo/done or...any master-detil. CRUD PDO of MySQL DB tbl rows."
                 href="<?=$pp1->msg?>">Blog (Msg-s) MySQL DB</a>

              <a class="button button-primary" target="_blank" 
                 title=""
                 href="<?=$glomodul_url?>adrs/">Songs Mini3 PDO</a>

              <a class="button button-primary" target="_blank" 
                 title="Users equipment (or messages or...) - any master-detail. CRUD PDO of Oracle 11g XE DB tbl rows."
                       class="btn btn-outline-secondary"
                 href="<?=$pp1->acxe?>">ACXE (Ora.DB)</a>

              <a class="button button-primary" target="_blank" 
                 title=""
                 href="<?=$examples_url?>todo_csv_js/todolist/web/">Todolist SQLite</a>

              <a class="button button-primary" target="_blank" 
                 title=""
                 href="<?=$examples_url?>ora11g/wishlist/public/">Wish Ora</a>
          </div>
        </div><!--e n d  1.2  C R U D  (RIGHT  M N U)-->





          <!-- *********************************************
                    1.3 V I E W
          ********************************************* -->
        <div class="one-third column value">
          <h2 class="value-multiplier">3. VIEW</h2>
          <h5 class="value-heading">CSS</h5>
          <p class="value-description"></p>
          <div>
              <a class="button button-primary" target="_blank" 
                 title="Bootstrap templates (PHP)" 
                 href="<?=QS?>i/b_tmplts">Bootstrap 5, PHP 8</a>
              
              <a class="button button-primary" target="_blank" 
                 title="Free Bootstrap templates (PHP)" 
                 href="https://startbootstrap.com/?showAngular=false&showVue=false&showPro=false">
              Free Bootstrap templates</a>
          </div>
        </div> <!-- E N D  V I E W -->
      </div><!-- E N D   r o w -->





          <!-- *********************************************
                    2. A B O U T
          ********************************************* -->
      <div>
      <h1 class="display-4"><strong>LCS</strong> - Build social profiles</h1>

        <?=$img_url_done_link_white?>
         <b>L</b>EARN something - Connect and explore what your friends write. 
         Hard work on learning is worth nothing if not explained & shared.

        <br /><br /><?=$img_url_done_link_white?>
        <b>C</b>REATE - explain - write text about something.

        <br /><br /><?=$img_url_done_link_white?>
        <b>S</b>HARE what you create. 
      </div>


      <div>
        Created with PHP 8.0.12, Skeleton V2.0.4 (2014 year) or Bootstrap 5.1.3. 
        This is typical static web page with dynamic (PHP) links. 
        <br><br>
        This view script <?=__FILE__?> is included in home.php.
        <br>
        h_... means one of 4 parts of home page (this top intro-menu and 3 page parts).
      </div>


    </div><!-- E N D   c o n t a i n e r -->
  </div><!-- E N D   s e c t i o n -->











