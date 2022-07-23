<!DOCTYPE html>
<html lang="en">
    <head>
        <!--
           /vendor/b12phpfw... works if called from web server, not if called with 2click !!
        -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>B12phpfw</title>

        <!-- Favicon
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        -->
        <!-- Bootstrap Icons
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        -->
                <!-- Google fonts
                <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
                <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        -->
        <link href="/vendor/b12phpfw/themes/bootstrap/css/Merriweather_Sans_400_700.css" rel="stylesheet" />
        <link href="/vendor/b12phpfw/themes/bootstrap/css/Merriweather_Sans_400_300.css" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS
                   <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        -->
        <link href="/vendor/b12phpfw/themes/bootstrap/css/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)
                    <link href="css/styles.css" rel="stylesheet" />
        -->
        <link href="/vendor/b12phpfw/themes/bootstrap/css/styles_creative.css" rel="stylesheet" />

        <style>
        
   
        
        </style>


    </head>



  <body id="page-top">


        <!-- Top Navigation: About, Services, Portfolio, Contact-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Top</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#explore1">1. Learn</a></li>
                        <li class="nav-item"><a class="nav-link" href="#create2">2. Explain</a></li>
                        <li class="nav-item"><a class="nav-link" href="#share3">3. Share</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>



        <!-- Masthead - Links -->
        <header class="masthead">
            <div class="container px-4 px-lg-5 h-100">
                <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-end">

                        <h1 class="text-white font-weight-bold">Links to modules</h1>

                        <hr class="divider" />
                    </div>


          <!-- *********************************************
                 Masthead - Links  1. U t i l s
          ********************************************* -->
      <!--
         LINK ALIAS               LINK RELATIVE TO SITE ROOT
         href="?i/msg/"           "/fwphp/glomodul/blog/"
         href="?i/mkd/"           "/fwphp/glomodul/mkd/"
         href="?i/lsweb/"         "/fwphp/glomodul/lsweb/Lsweb.php"
         href="?i/examples/" 
         href="?i/phpmyadmin/"    "/phpmyadmin/"
         href="?i/acxe/"
         href="?i/b_tmplts"
      -->
       <b>I. Links to modules (utils - helper code are also modules).</b>
      <div class="row row-example">

        <!-- -->
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"><!--div class="col-lg-8 align-self-baseline"-->
              <a target="_blank" title="Users (=master, same as msgtype), messages (=detail) , replies (=subdetail) or todo/done or...any master-detail. CRUD PDO of MySQL DB tbl rows."
                 href="?i/msg/" class="text-white font-weight-bold">1. Blog (Msg-s) MySQL DB</a> 
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> 
              <a target="_blank" title="Redirect_to( '/fwphp/glomodul/mkd/' ). Mkd module. Rich text edit on web. SimpleMDE & Parsedown. CRUD of .txt or .md or .mkd oper.sys texsts. Summernote add is easy."
                 href="?i/mkd/" class="text-white font-weight-bold">2. Mkd (ed txt files)</a> </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> 
              <a target="_blank" title="Read files & folders from web server docroot disk, call php scripts."
                 href="?i/lsweb/" class="text-white font-weight-bold">3. lsweb</a> </div> 

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> 
              <a target="_blank" title=""
              href="?i/examples/" class="text-white font-weight-bold">4. Examples</a> </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> 
              <a target="_blank" title="Read files & folders from web server docroot disk, call php scripts."
                 href="dev_suite.php" class="text-white font-weight-bold">5. INFO</a> </div> 

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
              <a target="_blank" title=""
              href="?i/phpmyadmin/" class="text-white font-weight-bold">6. phpMyAdmin</a> </div>

      </div><!--e n d  Masthead - Links  1. U t i l s -->



          <!-- *********************************************
                    Masthead - Links  2. C R U D 
          ********************************************* -->
        <b>II. CRUD PDO (MODEL). Modules on MySQL, SQLite, Oracle...</b>

      <div class="row row-example">

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <a target="_blank" title="" 
            href="/fwphp/glomodul/adrs/" class="text-white font-weight-bold">7. Songs Mini3 MySQL PDO</a></div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
            <a target="_blank" title=""
               href="/fwphp/glomodul/z_examples/todo_csv_js/todolist/web/" class="text-white font-weight-bold">8. Todolist SQLite PDO</a> </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
              <a target="_blank" title="Users equipment (or messages or...) - any master-detail. CRUD PDO of Oracle 11g XE DB tbl rows."
              href="?i/acxe/" class="text-white font-weight-bold">9. ACXE Oracle PDO</a> </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
              <a target="_blank" title=""
              href="/fwphp/glomodul/z_examples/ora11g/wishlist/public/" class="text-white font-weight-bold">10. Wish Oracle PDO</a>
              </div>

      </div><!--e n d  Masthead - Links  2. C R U D  -->


          <!-- *********************************************
                    Masthead - Links 3. V I E W
          ********************************************* -->
      <b>III. View - CSS for responsive Web pages.</b>

      <div class="row row-example">

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
          <a target="_blank" title="Pico css help" 
             href="/fwphp/glomodul/z_examples/cssfw/picocss/" class="text-white font-weight-bold">11. Pico css v1.4.4</a>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
          <a target="_blank" title="Skeleton help" 
             href="/fwphp/glomodul/z_examples/cssfw/skeleton/" class="text-white font-weight-bold">12. Skeleton V2.0.4 (2014)</a></div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
          <a target="_blank" title="Bootstrap templates (PHP)" 
             href="?i/b_tmplts" class="text-white font-weight-bold">13. Bootstrap 5, PHP 8</a> </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
          <a target="_blank" title="Free Bootstrap templates (PHP)" 
             href="https://startbootstrap.com/?showAngular=false&showVue=false&showPro=false" class="text-white font-weight-bold">
              14. Free Bootstrap templates</a> </div>


      </div><!--e n d  Masthead - Links 3. V I E W -->







                    <div class="col-lg-8 align-self-baseline">
                      <p class="text-white-75 mb-5">
                        Modules are folders with functionality like Oracle fmb-s.
                        This page is Mnu module home
                      </p>
                        <a class="btn btn-primary btn-xl" href="#explore1">Find Out More</a>
                    </div>



                </div>

            </div>



        </header>



          <!-- *********************************************
                    A B O U T  LCS - Build social profiles
          *********************************************
          class="btn btn-light btn-xl"
          -->
        <section class="page-section bg-primary" id="about" style='background-image: url("/vendor/b12phpfw/img/header.jpg"); background-repeat: no-repeat; background-size: cover;'>
              <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
     
          <div id="about">
            <h1><strong>LCS</strong> - Build social profiles</h1>
                            <hr class="divider divider-light" />

            <img src="/vendor/b12phpfw/img/ic_done_white_32dp.png" 
                 alt="/vendor/b12phpfw/img/ic_done_white_32dp.png"
                 title="/vendor/b12phpfw/img/ic_done_white_32dp.png">
            <b>L</b><a class="btn btn-light" href="#explore1">EARN</a> - connect and explore what other people write. 
            Hard work on learning is worth nothing if not explained & shared.

            <br /><br /><img src="/vendor/b12phpfw/img/ic_done_white_32dp.png"
            alt="/vendor/b12phpfw/img/ic_done_white_32dp.png"
            title="/vendor/b12phpfw/img/ic_done_white_32dp.png">
            <b>C</b><a class="btn btn-light" href="#create2">REATE</a> - explain - write good explained programs and tutorials.

            <br /><br /><img src="/vendor/b12phpfw/img/ic_done_white_32dp.png" alt="/vendor/b12phpfw/img/ic_done_white_32dp.png" title="/vendor/b12phpfw/img/ic_done_white_32dp.png">        <b>S</b><a class="btn btn-light"href="#share3">HARE</a> what you create. 


          </div>



          <div class="col-lg-8 text-center">

                            <h2 class="text-white mt-0">
                               Some centered blah, blah
                            </h2>
                            <p class="text-white-75 mb-4">more blah, blah</p>
                            <a class="btn btn-light btn-xl" href="#explore1">Get Started!</a>



            </p>


                        </div>
                    </div>
                </div>
        </section>



          <!-- *********************************************
          1. Learn - Explore, Connect - LCS - Build social profiles (services)
          ********************************************* -->

<section class="page-section" id="explore1">

  <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">1. Learn - Explore, Connect</h2>
                <hr class="divider" />
          <p>See and explore what other people write. 
             Hard work on learning is worth nothing if not explained & shared.</p>


                <div class="row gx-4 gx-lg-5">

                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-gem fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">M-V data flow</h3>
                            <p class="text-muted mb-0">
                               <img class="phone" src="/vendor/b12phpfw/img/mvc_M_V_data_flow.jpg">
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">M-V data flow</h3>
                            <p class="text-muted mb-0">
          <b>1. SEES</b> in picture means :  C assigns variables from user request in URL
          (from URL query) telling V what user wants and calls V method or includes V (not showed in picture). 
          <br><b>2. UPDATES</b> in picture means : V pulls data from M according C variables assigned in 1. 
          <br><b>3. MANIPULATES</b> means : V (user request) may call C method for some state 
          changes ordered in URL by user (<b>USES</b> in picture).
          <br>Eg : table row update "Approve 
          user comment" in msg module. User`s events are so handled in Controller class.
          <br>          
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                            
                           <p class="text-muted mb-0">
                           View gets (singleton) or instantiates model object and pulls data from M. If we have user`s interactions (events) eg filter displayed rows (pagination is sort of filtering), than M-V data flow is only possible solution.
                            </p>
                          
                            
                            <br><h3 class="h4 mb-2"><b>M-C-V data flow</b></h3>
                            <p class="text-muted mb-0">
          Controller instantiates M and pushes M data to V.
          I do not see advantages compared to M-V data flow. Disadvantage are : for pagination M-V data flow
          is only possible solution, C is fat in large modules (lot of code). C in my msg (blog) module has
          lot of code, but code is very simple.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-heart fs-1 text-primary"></i></div>
                            <h3 class="h4 mb-2">Other people made</h3>
                            <p class="text-muted mb-0">
              <!--div id="explore1"><a href="#lcs">TOP</a-->
              <!--  -->
              Is it really open source if it's not made with love?&nbsp;
                  <br><a style="display: inline;"
                     href="http://dev1:8083/fwphp/glomodul/z_examples/php_patterns/singleton.php" 
                     class="dropdown-item" target="_blank">
                 <img src="http://dev1:8083/vendor/b12phpfw/img/ic_supervisor_account_black_24dp.png" alt="http://dev1:8083/vendor/b12phpfw/img/ic_supervisor_account_black_24dp.png" title="http://dev1:8083/vendor/b12phpfw/img/ic_supervisor_account_black_24dp.png">Singleton</a>

                  <br><a style="display: inline;"
                     href="http://dev1:8083/fwphp/glomodul/z_examples/php_patterns/p08_singleton.php" 
                     class="dropdown-item" target="_blank">
                 <img src="http://dev1:8083/vendor/b12phpfw/img/ic_supervisor_account_black_24dp.png" alt="http://dev1:8083/vendor/b12phpfw/img/ic_supervisor_account_black_24dp.png" title="http://dev1:8083/vendor/b12phpfw/img/ic_supervisor_account_black_24dp.png">Singleton2</a>

                  <br><a style="display: inline;"
                     href="http://dev1:8083/fwphp/glomodul/oraedoop/" 
                     class="dropdown-item" target="_blank">
                 <img src="http://dev1:8083/vendor/b12phpfw/img/ic_supervisor_account_black_24dp.png" alt="http://dev1:8083/vendor/b12phpfw/img/ic_supervisor_account_black_24dp.png" title="http://dev1:8083/vendor/b12phpfw/img/ic_supervisor_account_black_24dp.png">Oraedoop</a>
                                  </p>

                  <!--
                     http://localhost:8083/adminer/adminer/?oracle 
                     http://dev1:8083/fwphp/glomodul/adminer/adminer/?oracle 
                     $glomodul_path.'adminer/adminer'.QS.'oracle'
                  -->
                  <a style="display: inline;"
                     href="/fwphp/glomodul/lsweb/Lsweb.php/?cmd=J:/awww/www/fwphp/glomodul/z_examples/" 
                     class="dropdown-item" target="_blank">
                 <img src="/vendor/b12phpfw/img/ic_supervisor_account_black_24dp.png" alt="/vendor/b12phpfw/img/ic_supervisor_account_black_24dp.png" title="/vendor/b12phpfw/img/ic_supervisor_account_black_24dp.png"> ALL HELP SW</a>  &nbsp;  



                        </div>
                    </div>

                </div><!-- E N D   r o w -->






      <div class="row row-example">
            <!--  -->
            <div>
              <img src="/vendor/b12phpfw/img/ic_done_black_32dp.png" alt="/vendor/b12phpfw/img/ic_done_black_32dp.png" title="/vendor/b12phpfw/img/ic_done_black_32dp.png">aaaaaaaa aaaaaaa
              <br>
              <img src="/vendor/b12phpfw/img/ic_done_black_32dp.png" alt="/vendor/b12phpfw/img/ic_done_black_32dp.png" title="/vendor/b12phpfw/img/ic_done_black_32dp.png"> bbbbbbbbbbb bbbbbbbb
            </div>

          <br><br><p><a class="btn btn-light btn-xl" href="#">More</a></p>

      </div><!-- E N D   r o w -->

            <!--

            -->

    </div><!-- E N D   r o w -->




  </div><!-- E N D   container -->
</section><!-- E N D   learn -->










          <!-- *********************************************
          2. Explain - Create  (Portfolio)
          ********************************************* 
          href="assets/img/portfolio/fullsize/3.jpg"
          src="assets/img/portfolio/thumbnails/3.jpg" 
          
          -->
<section class="page-section" id="create2">

  <div class="container px-4 px-lg-5">
                <h2 class="text-center mt-0">2. Create & Explain</h2>
                <hr class="divider" />

        <div id="create2">
            <div class="container-fluid p-0">
                <div class="row g-0">

                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/vendor/b12phpfw/img/mvc_M_V_and_M_C_V_data_flow.jpg" 
                           title="mvc_M_V_and_M_C_V_data_flow.jpg">
                           <img class="img-fluid" src="/vendor/b12phpfw/img/mvc_M_V_and_M_C_V_data_flow.jpg"
                                alt="/vendor/b12phpfw/img//mvc_M_V_and_M_C_V_data_flow.jpg" />
                                  /vendor/b12phpfw/img/mvc_M_V_and_M_C_V_data_flow.jpg
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/vendor/b12phpfw/img/mvc_M_C_V.jpg" 
                           title="/vendor/b12phpfw/img/mvc_M_C_V.jpg">
                           <img class="img-fluid" src="/vendor/b12phpfw/img/mvc_M_C_V.jpg" alt="mvc_M_C_V.jpg" />
                           /vendor/b12phpfw/img/mvc_M_C_V.jpg
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/vendor/b12phpfw/img/mvc_M_C_V_data_flow_Laravel.jpg" 
                           title="Project Name">
                           <img class="img-fluid" src="/vendor/b12phpfw/img/mvc_M_C_V_data_flow_Laravel.jpg" 
                                alt="[project image]" />
                           /vendor/b12phpfw/img/mvc_M_C_V_data_flow_Laravel.jpg
                        </a>
                    </div>


                    <div class="col-lg-4 col-sm-6">
                        <br><br><br><br>
                        <a class="portfolio-box" href="/vendor/b12phpfw/img/mvc_M_V_data_flow_MVC_3tier_DAO_abstract_interface.jpg"
                           title="Project Name">
                            <img class="img-fluid" src="/vendor/b12phpfw/img/mvc_M_V_data_flow_MVC_3tier_DAO_abstract_interface.jpg"
                                 alt="[project image]" />
                            mvc_M_V_data_flow_MVC_3tier_DAO_abstract_interface
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <br><br><br><br>
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/5.jpg"
                           title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/5.jpg"
                                 alt="[project image]" />
                          Project Name
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <br><br><br><br>
                        <a class="portfolio-box" href="assets/img/portfolio/fullsize/6.jpg"
                           title="Project Name">
                            <img class="img-fluid" src="assets/img/portfolio/thumbnails/6.jpg"
                                 alt="[project image]" />
                            Project Name
                        </a>
                    </div>
                </div>
            </div>
        </div>



          <br><br>
          <h3>2.1 Create your passion. Modules : Mkd, Msg PDO, Mini3 PDO, ACXE2, kalendar...</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus provident... </p>
          
            <p>
              <img src="http://dev1:8083/vendor/b12phpfw/img/ic_done_white_32dp.png" alt="http://dev1:8083/vendor/b12phpfw/img/ic_done_white_32dp.png" title="http://dev1:8083/vendor/b12phpfw/img/ic_done_white_32dp.png"> ccccccc cccccccc
            </p>


            <p>
              <img src="http://dev1:8083/vendor/b12phpfw/img/ic_done_white_32dp.png" alt="http://dev1:8083/vendor/b12phpfw/img/ic_done_white_32dp.png" title="http://dev1:8083/vendor/b12phpfw/img/ic_done_white_32dp.png"> Todo / Done
            </p>
          
        <p>
          <img src="http://dev1:8083/vendor/b12phpfw/img/edit.png" alt="" 
          class="img-fluid mb-3 rounded-circle"> ddddd ddddddd
        </p>



  </div><!-- E N D   container -->
</section><!-- E N D   explain -->



          <!-- *********************************************
          3. Share  (Call to action)
          ********************************************* -->
          <!-- -->
        <section class="page-section bg-dark text-white" id="share3">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">3. Share</h2>



       <div id="share3" class="container">
       <!--a href="#lcs">TOP</a-->
          <p>Share what you create.</p>
        </div><!-- E N D   half column -->



      <!-- Grid Bootstrap -->
      <div class="row row-example">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div> <!-- -->
            <img src="/vendor/b12phpfw/img/meatmirror.jpg"> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href="https://github.com/slavkoss/fwphp/">Github</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href="http://phporacle.altervista.org/">phporacle blog</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href="http://phporacle.altervista.org/wp-admin/index.php/">blog admin</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href="http://phporacle.eu5.net/">Demo site on Linux (freehostingeu)</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href=" http://phporacle.heliohost.org/">Demo site on Linux (heliohost )</a> </div> </div>
      </div><!--e n d  Grid Bootstrap -->



        <!-- S H A R E  SECTION -->
        <br><br>
        <div>
          <img src="http://dev1:8083/vendor/b12phpfw/img/twitter.jpg" alt="">
          <img src="/vendor/b12phpfw/img/globus.png">
          ggggggg gggggggg
        </div>

        <div>
          <p>aa111 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus provident sed mollitia, ... &nbsp; </p>

            <div>
              <img src="http://dev1:8083/vendor/b12phpfw/img/ic_done_black_32dp.png" alt="http://dev1:8083/vendor/b12phpfw/img/ic_done_black_32dp.png" title="http://dev1:8083/vendor/b12phpfw/img/ic_done_black_32dp.png">ddd dddddddddd
            </div>



            <div>
              <img src="http://dev1:8083/vendor/b12phpfw/img/ic_done_black_32dp.png" alt="http://dev1:8083/vendor/b12phpfw/img/ic_done_black_32dp.png" title="http://dev1:8083/vendor/b12phpfw/img/ic_done_black_32dp.png">hhhhhh hhhhhhh
            </div>
            <div>
              333 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas...
            </div>
      </div><!-- E N D   r o w -->

            <hr />

        <br>examples_path_rel = fwphp/glomodul/z_examples/
        <br>examples_url = http://dev1:8083/fwphp/glomodul/z_examples/ 
        <br>glomodul_url = http://dev1:8083/fwphp/glomodul/ 
        
  



             <br><br><a class="btn btn-light btn-xl" href="https://startbootstrap.com/theme/creative/">More</a>
            </div>
        </section>




        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6 text-center">
                        <h2 class="mt-0">Let's Get In Touch!</h2>
                        <hr class="divider" />
                        <p class="text-muted mb-5">Ready to start your next project with us? Send us a messages and we will get back to you as soon as possible!</p>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                    <div class="col-lg-6">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Full name</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email address</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Phone number</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Message</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Form submission successful!</div>
                                    To activate this form, sign up at
                                    <br />
                                    <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                </div>
                            </div>
                            <!-- Submit error message-->
                            <!---->
                            <!-- This is what your users will see when there is-->
                            <!-- an error submitting the form-->
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-xl disabled" id="submitButton" type="submit">Submit</button></div>
                        </form>
                    </div>
                </div>
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-4 text-center mb-5 mb-lg-0">
                        <i class="bi-phone fs-2 mb-3 text-muted"></i>
                        <div>+1 (555) 123-4567</div>
                    </div>
                </div>
            </div>
        </section>







        <!-- Footer-->
        <footer class="bg-light py-5">
          <div class="container px-4 px-lg-5">
            <div class="small text-center text-muted">
              Copyright &copy; 2022 - phporacle, Slavko Srakočić, Zagreb.

              <small>
                PHP <?=phpversion()?>. Created with PHP 8.1.5, Bootstrap 5.1.3. Start Bootstrap - Creative v7.0.6 (tested also Pico css v1.4.4 or Skeleton V2.0.4 2014 year).
                This is typical static web page with dynamic (PHP) links.
                
                <br>Start Bootstrap can help you build better websites using the Bootstrap framework! Download a theme (like this one called "<a href="https://startbootstrap.com/theme/creative/">Creative</a>") and start customizing, no strings attached!

                <br>This page is Mnu module home  <?= __FILE__ ?> For large pages we can include "h_" prefixed parts, "h_" meaning part of home page.

              </small>
            </div>
          </div>
        </footer>

        <!-- Bootstrap core JS
                      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        -->
        <script src="/vendor/b12phpfw/themes/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- SimpleLightbox plugin JS
                           <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
        -->
        <script src="/vendor/b12phpfw/themes/bootstrap/js/simpleLightbox.min.js"></script>
        <!-- Core theme JS
                         <script src="js/scripts.js"></script>
        -->
        <script src="scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
                    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
                    <script src="/vendor/b12phpfw/themes/bootstrap/js/sb-forms-latest.js"></script>
        -->
        <script src="/vendor/b12phpfw/themes/bootstrap/js/sb-forms-0.4.1.js"></script>
<!-- End Document
  末末末末末末末末末末末末末末末末末末末末末末末末末 -->
    </body>
</html>
