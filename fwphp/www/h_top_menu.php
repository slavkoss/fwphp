<!-- 
  J:\awww\www\fwphp\www\h_top_menu.php
  C O N T E N T  C O N T R O L L E R -->
<header id="home-section">

  <div class="dark-overlay">
    <div class="home-inner">
      <div class="container">
        <div class="row">

          <!-- 
                    1.1 LEFT  M N U  TOP PART
          -->
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


            <!-- 
                     1.2 LEFT  M N U, ACTIONS utils
            -->
            <!--section id="action" class="py-4 mb-4 bg-dark"-->
            <div class="container">
              <div class="row">
                  <h2>Utilities</h2> &nbsp; 

                <div class="col-md-3">
                  <a href="/<?=$path_rel_glomodul?>mkd/"
                     class="btn btn-warning btn-block"
                     title="Rich text edit on web. Mkd means Markdown & Parsedown. CRUD of .txt or .md or .mkd texsts."
                     target="_blank">
                    <i class="fa fa-plus"></i>Mkd edit txt files
                  </a>
                </div><!--data-toggle="modal" data-target="#addUserModal"-->

                        <p><a class="btn btn-outline-light" target="_blank" 
                              href="/<?=$path_rel_glomodul?>lsweb/Lsweb.php/"
                              title="Read files & folders from web server docroot disk, call php scripts."
                           >lsweb</a>  
                        <a class="btn btn-outline-light" target="_blank" 
                           href="<?=$wsroot_url?>phpmyadmin">phpMyAdmin</a></p>


                <!--div class="col-md-3">
                  <a href="#" class="btn btn-primary btn-block" 
                  target="_blank">
                    <i class="fa fa-plus"></i> Add Post (SimpleMDE)
                  </a>
                </div--><!--data-toggle="modal" data-target="#addPostModal"
                    <a href="/<=$wsroot_path.'shell_exec.php'
                -->

                <div class="col-md-3">
                  <a 
                  href="shell_exec.php?p=<?=realpath($wsroot_path.'../').DS?>0_phpmanual.chm"
                     class="btn btn-primary btn-block" 
                     target="_blank"
                  >
                    <i class="fa fa-plus"></i>PHP manual
                  </a>
                </div><!--data-toggle="modal" data-target="#addUserModal"-->

                <!--div class="col-md-3">
                  <a href="<?=$wsroot_url?>phpmyadmin" class="btn btn-success btn-block" 
                     target="_blank">
                    <i class="fa fa-plus"></i>phpMyAdmin
                  </a>
                </div--><!--data-toggle="modal" data-target="#addCategoryModal"-->

              </div>
            </div>
            <!--/section-->


            <!-- 
                      1.3 LEFT  M N U, ACTIONS C R U D
            -->
            <!--section id="action" class="py-4 mb-4 bg-dark"
                href="/<=$path_rel_glomodul>msg_share/"
            -->
            <div class="container">
              <div class="row">
                  <h2>CRUD</h2>&nbsp; &nbsp; &nbsp;&nbsp;

                <div class="col-md-3">
                  <a href="/<?=$path_rel_glomodul?>blog/?p/1/i/home/"
                     class="btn btn-warning btn-block"
                     title="Users (=master, same as msgtype), messages (=detail) , replies (=subdetail) 
                     or todo/done or...any master-detil. CRUD PDO of MySQL DB tbl rows."
                     target="_blank">
                    Blog (Msg-s)
                  </a>
                </div><!--data-toggle="modal" data-target="#addUserModal"-->

                <div class="col-md-3">
                  <a href="/<?=$path_rel_examples?>01_PHP_bootstrap/ACXE2/"
                     class="btn btn-warning btn-block"
                     title="Users equipment or messages or...any master-detil. CRUD PDO of Oracle 11g XE DB tbl rows."
                     target="_blank">
                    <i class="fa fa-plus"></i>ACXE Oracle 11g
                  </a>
                </div><!--data-toggle="modal" data-target="#addUserModal"-->

                <div class="col-md-3">
                  <a href="/<?=$path_rel_glomodul?>z_examples/"
                     class="btn btn-warning btn-block"
                     title=""
                     target="_blank">
                    <i class="fa fa-plus"></i>Examples
                  </a>
                </div><!--data-toggle="modal" data-target="#addUserModal"-->



              </div><!--why - goals-->
            </div>

            <br />Style is Bootstrap 4.3.1 This view (report) is included script <?=__FILE__?>
               where h_... means part of  h o m e  page. <?=basename(__FILE__)?> is included in home.php.
               It is typical static web page.
            <!--/section-->

          </div><!-- LEFT COLUMN -->






          <!-- 
                   2. S I D E  M N U 
          -->
          <div class="col-lg-4">
            <div class="card bg-primary card-form">
              <div class="card-body">
              
                <!--h3>Sign Up Today text-center </h3-->
                <!--p>Please fill out this form to register</p-->
                <b>Important links (modules)</b>

                <!--p>Rich text edit on web <br /> <a class="btn btn-outline-light" target="_blank" href="http://dev1:8083/fwphp/glomodul/mkd/">Mkd - Markdown & Parsedown</a></p-->

                
                <h4>Model (PDO)</h4>
                <p>1. CRUD Ora 11g</p>

                <p><a class="btn btn-outline-light" target="_blank" 
                href="/<?=$path_rel_examples?>todolist/web/">Todolist (SQLite)</a>
                <a class="btn btn-outline-light" target="_blank" 
                   href="/<?=$path_rel_examples?>01_PHP_bootstrap/wishPDO/">wish Ora PDO</a></p>



                <p>2. CRUD MySQL</p>

                <!--p><a class="btn btn-outline-light" target="_blank" title="B12phpfw ver.5" href="http://dev1:8083/fwphp/glomodul/mkd/">MSG SHARE</a
                   href="<?=QS?>adr">Songs Mini3 PDO</a></p>
                -->
                <a class="btn btn-outline-light" target="_blank" 
                   title="URL-s. See zinc/Dbconn_allsites_mysql_tema.php !"
                   href="/<?=$path_rel_glomodul?>adrs/">Songs Mini3 PDO</a></p>



                  <h4>VIEW</h4>
                  <p><a class="btn btn-outline-light" target="_blank" 
                        title="Six Bootstrap templates (PHP)" 
                        href="<?=QS?>b_tmplts">Bootstrap PHP</a>
                  <!--a class="btn btn-outline-light" target="_blank" title="Six Bootstrap templates (HTML)" href="<=$zbig_url>bootstrap">Bootstrap (HTML)</a></p-->




              </div><!-- class="card-body" -->
            </div><!-- class="card bg-primary card-form" -->
          </div><!-- S I D E  M N U -->

        </div><!-- class="row" -->
      </div><!-- class="container" -->
    </div><!-- class="home-inner" -->
  </div><!-- class="dark-overlay" -->
</header>
