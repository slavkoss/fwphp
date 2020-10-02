<?php
/**
  J:\awww\www\fwphp\www\h_right_side.php
  C O N T E N T  C O N T R O L L E R
*/
$tmp     = $img_url . 'ic_done_white_32dp.png' ;
$img_url_done_link_white = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';
?>
<!--   -->
<header id="home-section">

<div class="dark-overlay">
  <div class="home-inner">
    <div class="container">
      <div class="row">

          <!-- *********************************************
                    1.1 LEFT  C O N T E N T
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

                          <!--div class="d-flex flex-row">
                            <div class="p-4 align-self-start"><h4>Utilities</h4></div>
                          </div-->
            <!--div class="p-4 align-self-end">
                <h4>VIEW</h4>
                <p><a class="btn btn-outline-light" target="_blank" href="/<?=$path_rel_examples?>bootstrap">Six Bootstrap templates (PHP)</a></p>
                
                <p><a class="btn btn-outline-light" target="_blank" href="<?=$zbig_url?>bootstrap">Six Bootstrap templates (HTML)</a></p>
            </div-->




            <br />Style is Bootstrap 4.3.1 This view (report) is included script <?=__FILE__?>
               where h_... means part of  h o m e  page. <?=basename(__FILE__)?> is included in home.php.
               It is typical static web page.
            <!--/section-->

          </div><!-- LEFT COLUMN -->






          <!-- *********************************************
                   2. RIGHT S I D E  M N U 
          ********************************************* -->

                <!-- *********************************************
                         2.1  U t i l s  (RIGHT  M N U)
                ********************************************* -->
          <div class="col-lg-4">
            <div class="card bg-primary card-form">
              <div class="card-body">

              <div>
                <b>1. Important links, utilities (modules)</b>
                  <!-- long yellow button class="btn btn-warning btn-block" -->
                  <a class="btn btn-outline-light" target="_blank"
                     href="<?=$pp1->mkd?>"
                     title="Redirect_to( <?=dirname($pp1->module_url) .'/glomodul/mkd/'?> ). Mkd module. Rich text edit on web. SimpleMDE & Parsedown. CRUD of .txt or .md or .mkd oper.sys texsts. Summernote add is easy."
                     target="_blank">
                    Edit txt files


                  <!-- href="/<?=$app_glomodul_dir_path?>lsweb/Lsweb.php/" -->
                  <span>
                     <a class="btn btn-outline-light" target="_blank"
                        href="<?=$pp1->lsweb?>"
                        title="Read files & folders from web server docroot disk, call php scripts."
                     >lsweb</a>
                  </span>


                <!--  -->
                <a class="btn btn-outline-light" target="_blank" 
                href="laragon.php">INFO</a>


              </div>

              <div>

                <!--data-toggle="modal" data-target="#addUserModal"-->

                <!--ALSO WORKS : href="<?=$wsroot_url?>phpmyadmin"> -->
                <span><a class="btn btn-outline-light" target="_blank" 
                   href="<?=$pp1->phpmyadmin?>">phpMyAdmin</a>
                </span>

                <!--href="/<=$app_glomodul_dir_path>..."-->
                <span>
                  <a href="<?=$pp1->examples?>"
                     title=""
                     class="btn btn-outline-light" target="_blank">
                    Examples
                  </a>
                </span><!--data-toggle="modal" data-target="#addUserModal"-->


                <!-- http://sspc2:8083/fwphp/www/shell_exec.php?p=J:\awww\0_phpmanual.chm -->
                <!--span>
                  <a href="<=$pp1->phpmanual>"
                     class="btn btn-outline-light" target="_blank"
                  >Code</a>
                </span--><!--data-toggle="modal" data-target="#addUserModal"-->


              </div><!-- E N D  Utilities -->


              <!-- *********************************************
                        2.2  C R U D  (RIGHT  M N U)
              ********************************************* -->
              <!-- class="btn btn-warning btn-block" -->
              <div>
                <br /><b>2. CRUD PDO trait (MODEL)</b>&nbsp;

                <div>
                  <a href="<?=$pp1->msg?>"
                     title="Users (=master, same as msgtype), messages (=detail) , replies (=subdetail) 
                     or todo/done or...any master-detil. CRUD PDO of MySQL DB tbl rows."
                     class="btn btn-outline-light" target="_blank">
                    Blog (Msg-s)
                  </a>


              </div><!--data-toggle="modal" data-target="#addUserModal"-->



              </div> <!-- E N D  C R U D  r o w -->




              <div>
                <p>
                   <br /><span>Oracle DB</span>

                <!--href="/<=$path_rel_examples>..."-->
                <span>
                  <a href="<?=$pp1->acxe?>"
                     title="Users equipment (or messages or...) - any master-detail. CRUD PDO of Oracle 11g XE DB tbl rows."
                     class="btn btn-outline-light" target="_blank">
                    ACXE (Ora.DB)
                  </a>
                </span><!--data-toggle="modal" data-target="#addUserModal"-->

                  <a class="btn btn-outline-light" target="_blank" 
                     href="/<?=$path_rel_examples?>todolist/web/">Todolist (SQLite)</a>

                  <a class="btn btn-outline-light" target="_blank" 
                     href="/<?=$path_rel_examples?>01_PHP_bootstrap/wishPDO/">Wish Ora</a>
                </p>



                <span>MySQL DB</span>

                <!--   -->
                <a class="btn btn-outline-light" target="_blank" 
                   title="URL-s. See zinc/Dbconn_allsites_mysql_tema.php !"
                   href="/<?=$app_glomodul_dir_path?>adrs/">Songs Mini3 PDO</a>
              </div>












                  <div>
                  <br /><b>3. CSS (VIEW)</b>
                  <span><a class="btn btn-outline-light" target="_blank" 
                        title="Six Bootstrap templates (PHP)" 
                        href="<?=QS?>b_tmplts">Bootstrap 4 PHP</a>
                  </span>



              </div> <!-- E N D  C R U D  c o n t a i n e r-->


            </div><!-- class="card bg-primary card-form" -->
            </div><!-- class="col-lg-4" -->




      </div><!-- class="row"  S I D E  M N U -->
    </div><!-- class="container" -->

  </div><!-- class="home-inner" -->
</div><!-- class="dark-overlay" -->
</header>
