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

    <!-- Header -->

    <!-- Main -->
    <main class="container">

          <!-- *********************************************
                 1.1  U t i l s
          ********************************************* -->
      <b>I. Links to modules (and utils). Modules are folders with functionality like Oracle fmb-s.
            This is Mnu module home page.</b>

      <!-- Grid Bootstrap -->
      <div class="row row-example">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div> <!-- -->
              <a target="_blank" title="Users (=master, same as msgtype), messages (=detail) , replies (=subdetail) or todo/done or...any master-detail. CRUD PDO of MySQL DB tbl rows."
                 href="<?=$pp1->msg?>">1. Blog (Msg-s) MySQL DB</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" title="Redirect_to( <?=dirname($pp1->module_url) .'/glomodul/mkd/'?> ). Mkd module. Rich text edit on web. SimpleMDE & Parsedown. CRUD of .txt or .md or .mkd oper.sys texsts. Summernote add is easy."
                 href="<?=$pp1->mkd?>">2. Mkd (ed txt files)</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" title="Read files & folders from web server docroot disk, call php scripts."
                 href="<?=$pp1->lsweb?>">3. lsweb</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" title="" href="<?=$pp1->examples?>">4. Examples</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" title="Read files & folders from web server docroot disk, call php scripts."
                 href="dev_suite.php">5. INFO</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" title="" href="<?=$pp1->phpmyadmin?>">6. phpMyAdmin</a> </div> </div>
      </div><!--e n d  Grid Bootstrap -->

          <!-- *********************************************
                    1.2  C R U D 
          ********************************************* -->
        <b>II. CRUD PDO trait (MODEL). Modules on MySQL, SQLite, Oracle.</b>

      <div class="row row-example">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
            <a target="_blank" title="" href="<?=$glomodul_url?>adrs/">7. Songs Mini3 MySQL PDO</a></div></div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
            <a target="_blank" title=""
               href="<?=$examples_url?>todo_csv_js/todolist/web/">8. Todolist SQLite PDO</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" title="Users equipment (or messages or...) - any master-detail. CRUD PDO of Oracle 11g XE DB tbl rows." href="<?=$pp1->acxe?>">9. ACXE Oracle PDO</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" title="" href="<?=$examples_url?>ora11g/wishlist/public/"10. >Wish Oracle PDO</a> </div> </div>
      </div><!--e n d  Grid Bootstrap -->

          <!-- *********************************************
                    1.3 V I E W
          ********************************************* -->
      <b>III. View - CSS for responsive Web pages.</b>

      <div class="row row-example">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" title="Pico css help" 
                 href="<?=$glomodul_url?>z_examples/cssfw/picocss/">11. Pico css v1.4.4</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
            <a target="_blank" title="Skeleton help" 
               href="<?=$glomodul_url?>z_examples/cssfw/skeleton/">12. Skeleton V2.0.4 (2014)</a></div></div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" title="Bootstrap templates (PHP)" 
                 href="<?=QS?>i/b_tmplts">13. Bootstrap 5, PHP 8</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" title="Free Bootstrap templates (PHP)" 
                 href="https://startbootstrap.com/?showAngular=false&showVue=false&showPro=false">
              14. Free Bootstrap templates</a> </div> </div>
      </div><!--e n d  Grid Bootstrap -->



          <!-- *********************************************
                    2. A B O U T
          ********************************************* -->
      <div id="lcs">
        <h1><strong>LCS</strong> - Build social profiles</h1>

        <?=$img_url_done_link_white?>
         <b>L</b><a href="#explore1">EARN</a>
         something - Connect and explore what your friends write. 
         <br>Hard work on learning is worth nothing if not explained & shared.

        <br /><br /><?=$img_url_done_link_white?>
        <b>C</b><a href="#create2">REATE</a>
        - explain - write text about something.

        <br /><br /><?=$img_url_done_link_white?>
        <b>S</b><a href="#share3">HARE</a> what you create. 

        <p>&nbsp;</p>

        This view script <?=__FILE__?> is included in home.php.
        <br>
        h_... means one of 4 parts of home page (this top intro-menu and 3 page parts).
        </p>
      </div>



    </main><!--e n d  Main -->
