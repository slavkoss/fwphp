<?php
// J:\awww\www\fwphp\www\home.php
    $pp1->stack_trace[]=str_replace('\\','/', __FILE__ ).', lin='.__LINE__ .', '. __METHOD__ ;
                  if ('') {  //if ($module_ arr['dbg']) {
                    echo '<span style="color: green; font-size: large; font-weight: bold;">This view script '.__FILE__ .'()'.', line '. __LINE__ .' SAID: '.'</span>'; 
                    echo '<pre>';
                    echo '<b>$pp1->stack_trace</b>='; print_r($pp1->stack_trace); 
                    //echo '<b>$_ GET</b>='; print_r($_GET); 
                    echo '</pre>'; 
                  }
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <!--
           /vendo r/b12 phpfw... works if called from web server, not if called with 2click !!
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
        <link href="<?=$pp1->shares_url?>/themes/bootstrap/css/Merriweather_Sans_400_700.css" rel="stylesheet" />
        <link href="<?=$pp1->shares_url?>/themes/bootstrap/css/Merriweather_Sans_400_300.css" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS
                   <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        -->
        <link href="<?=$pp1->shares_url?>/themes/bootstrap/css/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)
                    <link href="css/styles.css" rel="stylesheet" />
        -->
        <link href="<?=$pp1->shares_url?>/themes/bootstrap/css/styles_creative.css" rel="stylesheet" />

        <style>
        
   
        /*width: 100%; */
        table {
            width: 85%;
            border-collapse: collapse;
            border-style: solid;
            border-width: 1px;
            /* align:center; */  
            margin-bottom: 2px;
        }
           
        
        tr {
            border-collapse: collapse;
            border-style: solid;
            border-width: 1px;
            /* align:center; */
        }
        
   
                
        td {
            border-collapse: collapse;
            border-style: solid;
            border-width: 1px;
            /*valign:top;*/
            padding:2px;
        }
        
   
        
        .auto-style1 {
                            color: #008080;
        }
        .auto-style2 {
                            background-color: #FFFF00;
        }
        .auto-style3 {
                            color: #008080;
                            background-color: #FFFF00;
        }
        
   
        
        .auto-style4 {
                    border: 1px solid #c0c0c0;
}
        
   
        
        .auto-style5 {
                    font-weight: normal;
}
        
   
        
        </style>


    </head>



  <body id="page-top">

          <!-- *********************************************
          pgpart01  Top Navigation: About, Services, Portfolio, Contact
                 dropdown mt-3
          ********************************************* -->
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


                        <li class="nav-item dropdown">

                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                             role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          
                            <?php echo 'Other '; ?>
                          </a>

                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                <li><a class="dropdown-item" 
           href="<?=$moduleurl?>/users/profile.php?prof_id=<?=$_SESSION['user_id']??''?>">
                                  aaaaaaaaaaaa</a></li>
                                <li><a class="dropdown-item" 
                                  href="<?=$moduleurl?>/auth/logout.php">bbbbbbbb</a></li>
                          </ul>

                        </li>


                    </ul>
                </div>
            </div>
        </nav>



        <!-- Masthead - Links -->
<header class="masthead">
<section class="page-section bg-primary" id="links" 
  style='background-image: url("<?=$pp1->shares_url?>/img/header_night.jpg"); background-repeat: no-repeat; background-size: cover;'>


  <div class="container px-4 px-lg-5 h-100">
    <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">




          <!-- *********************************************
          pgpart02  Masthead - Links  1. U t i l s
          ********************************************* -->
                    <div class="col-lg-8 align-self-end">

                        <h2 class="text-white font-weight-bold">Links to modules</h2>

                        <hr class="divider" />
                    </div>
      <!-- // no more routing table :
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
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"><!--div class="col-lg-8 align-self-baseline"  target="_blank"      -->
           <a title="Blog (Msg-s) CRUD PDO of DB tbl rows. For MySQL or Oracle or... uncomment eg oracle in Include\Functions.php. Tables : 
           USERS (=master, same as MSGTYPE), MESSAGES (=detail), REPLIES (=subdetail)."
                 href="?i/msg_akram/" class="text-white font-weight-bold">1a. Msg 1st step</a>

           <br><a title="Blog (Msg-s) PDO, B12phpfw menu and CRUD code skeleton for hunderts tables is like any framework much more complicated than 1a. For MySQL or Oracle or... see $dbicls in fwphp\glomodul\blog\index.php. Tables same as 1a. "
                 href="?i/msg/" class="text-white font-weight-bold">1b. Msg B12phpfw</a> 
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> 
              <a target="_blank" title="Redirect_to( '/fwphp/glomodul/mkd/' ). Mkd To add Summernote is easy."
                 href="?i/mkd/" class="text-white font-weight-bold">2. Mkd (ed txt files)</a> </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> 
              <a target="_blank" title="Read files & folders from web server docroot disk, call php scripts."
                 href="?i/lsweb/" class="text-white font-weight-bold">3. lsweb</a> </div> 

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> 
              <a target="_blank" title=""
              href="?i/examples/" class="text-white font-weight-bold">4. Examples</a> </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> 
              <a target="_blank" title="phpinfo, pdoinfo..."
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
            <a target="_blank" title="Songs Mini3 PDO one (master) table (#id, few_columns). See adrs\dbicls.php for MySQL or Oracle or..." href="/fwphp/glomodul/adrs/" class="text-white font-weight-bold">7a. Adrs</a>
            <br>
            <!--a target="_blank" title="Songs Mini3 Oracle PDO" href="/fwphp/glomodul/adrs/index_oracle.php" class="text-white font-weight-bold">7b. Adrs Oracle</a-->
        </div>

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

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
              <a target="_blank" title="Like Clipper's DBedit"
              href="/fwphp/glomodul/oraedoop/" class="text-white font-weight-bold">11. Oraed Oracle PDO</a>
              </div>

      </div><!--e n d  Masthead - Links  2. C R U D  -->


          <!-- *********************************************
                    Masthead - Links 3. V I E W
          ********************************************* -->
      <b>III. View - CSS templates for responsive Web pages.</b>

      <div class="row row-example">


        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
          <a target="_blank" title="Free Bootstrap templates (PHP)" 
             href="https://startbootstrap.com/?showAngular=false&showVue=false&showPro=false"
             class="text-white font-weight-bold">
              12. Free Bootstrap 5
          </a>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
          <a target="_blank" title="Free Pico css help on Web" 
             href="https://picocss.com/#examples" class="text-white font-weight-bold">13. Pico css v1.4.4</a>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
          <a target="_blank" title="Skeleton help" 
             href="/fwphp/glomodul/z_examples/cssfw/skeleton/" class="text-white font-weight-bold">14. Skeleton V2.0.4 (2014)</a></div>

        <!--div class="col-sm-6 col-md-4 col-lg-3 col-xl-2">
          <a target="_blank" title="Bootstrap templates (PHP)" 
             href="?i/b_tmplts" class="text-white font-weight-bold">13. Bootstrap 5, PHP 8</a>
        </div-->


      </div><!--e n d  Masthead - Links 3. V I E W -->







                    <div class="col-lg-8 align-self-baseline">
                      <p class="text-white-75 mb-5">
                        Modules are folders with functionality like Oracle fmb-s.
                        This page is Mnu module home http://localhost/fwphp/glomodul/www/ if fwphp is under J:\xampp\htdocs 
                        (my Apache virtual host at home is http://dev1:8083/fwphp/glomodul/www/, fwphp is under J:\awww\www)
                      </p>
                        <a class="btn btn-primary btn-xl" href="#explore1">Find Out More</a>
                    </div>



    </div>

  </div>


</section>
</header>



          <!-- *********************************************
          pgpart03  A B O U T  LCS - Build social profiles
          *********************************************
          class="btn btn-light btn-xl"
          -->
        <section class="page-section bg-primary" id="about" style='background-image: url("<?=$pp1->shares_url?>/img/header.jpg"); background-repeat: no-repeat; background-size: cover;'>
              <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
     
          <div id="about">
            <h2><strong>LCS</strong> - Build social profiles</h2>
                            <hr class="divider divider-light" />

            <img src="<?=$pp1->shares_url?>/img/ic_done_white_32dp.png" 
                 alt="<?=$pp1->shares_url?>/img/ic_done_white_32dp.png"
                 title="<?=$pp1->shares_url?>/img/ic_done_white_32dp.png">
            <b>L</b><a class="btn btn-light" href="#explore1">EARN</a> - connect and explore what other people write. 
            <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            Hard work on learning is worth nothing if not explained & shared.

            <br /><br /><img src="<?=$pp1->shares_url?>/img/ic_done_white_32dp.png"
            alt="<?=$pp1->shares_url?>/img/ic_done_white_32dp.png"
            title="<?=$pp1->shares_url?>/img/ic_done_white_32dp.png">
            <b>C</b><a class="btn btn-light" href="#create2">REATE</a> - explain - write good explained programs and tutorials.

            <br /><br /><img src="<?=$pp1->shares_url?>/img/ic_done_white_32dp.png" alt="<?=$pp1->shares_url?>/img/ic_done_white_32dp.png" title="<?=$pp1->shares_url?>/img/ic_done_white_32dp.png">        <b>S</b><a class="btn btn-light"href="#share3">HARE</a> what you create. 


          </div>



          <div class="col-lg-8 text-center">

                            <h2 class="text-white mt-0">
                               Some centered blah, blah
                            </h2>
                            <p class="text-white-75 mb-4">more blah, blah</p>
                            <a class="btn btn-light btn-xl" href="#explore1">Get Started!</a>



            


                        </div>
                    </div>
                </div>
        </section>



          <!-- *********************************************
          pgpart04  1. Learn - Explore, Connect - LCS - Build social profiles (services)
          ********************************************* -->
  <section class="page-section" id="explore1">

    <div class="container px-4 px-lg-5">
        <h2 class="text-center mt-0">1. Learn - Explore, Connect
          <img class="phone" src="<?=$pp1->shares_url?>/img/win_php_mysql_apache.png">
          <img class="phone" src="<?=$pp1->shares_url?>/img/oracle_logo.jpg">
          <img class="phone" src="<?=$pp1->shares_url?>/img/linux.jpg">
        </h2>
                <hr class="divider" />
          <p>See and explore what other people write. 
             Hard work on learning is worth nothing if not explained & shared.</p>
                        <p>&nbsp;</p>



             <table>
                
                <tr>

                <td style="height: 195px"><img alt="mvc_M_V_data_flow_MVC_3tier_DAO_1req_response"  longdesc="mvc_M_V_data_flow_MVC_3tier_DAO_1req_response" 
                     src="<?=$pp1->shares_url?>/img/mvc_M_V_data_flow_MVC_3tier_DAO_1req_response.jpg" ></td>
                <td style="height: 195px">
                <img alt="mvc_M_V_data_flow_MVC_3tier_DAO_2C_V"  longdesc="mvc_M_V_data_flow_MVC_3tier_DAO_2C_V" 
                    src="<?=$pp1->shares_url?>/img/mvc_M_V_data_flow_MVC_3tier_DAO_2C_V.jpg" 
                    ></td>
                <td style="height: 195px; width: 199px;"><img alt="mvc_M_V_data_flow_MVC_3tier_DAO_3Mbusiness"  longdesc="mvc_M_V_data_flow_MVC_3tier_DAO_3Mbusiness"
                    src="<?=$pp1->shares_url?>/img/mvc_M_V_data_flow_MVC_3tier_DAO_3Mbusiness.jpg" ></td>
                <td style="height: 195px"><img alt="mvc_M_V_data_flow_MVC_3tier_DAO_4Mdata"  longdesc="mvc_M_V_data_flow_MVC_3tier_DAO_4Mdata"
                    src="<?=$pp1->shares_url?>/img/mvc_M_V_data_flow_MVC_3tier_DAO_4Mdata.jpg" ></td>
                <td style="height: 195px"><img alt="mvc_M_V_data_flow_MVC_3tier_DAO_5Mdb"  longdesc="mvc_M_V_data_flow_MVC_3tier_DAO_5Mdb"
                   src="<?=$pp1->shares_url?>/img/mvc_M_V_data_flow_MVC_3tier_DAO_5Mdb.jpg" 
                   ></td>

                <td style="height: 195px">01_DDL_mysql_blog.sql<br>
                  01_DDL_oracle_blog.sql<br>
                  01_DDL_moj_adrs_MINI3_mysql.sql</td>

                </tr>
                <tr>
                  <td style="height: 40px">
                  Step 
                  1.
                  Request 
                  is 
                  URL 
                  adress 
                  entered 
                  by 
                  user.<br>
                  Response 
                  is 
                  HTML 
                  from 
                  Home 
                  view.</td>
                  <td style="height: 40px">
                  Step 
                  2.<strong><span class="auto-style3">
                  Config_allsites
                  </span></strong>
                  (<strong>utl</strong>, 
                  utilities)<strong><span class="auto-style3"> </span> </strong>
                  is 
                  reusable 
                  (<span lang="hr">includ-able</span>).<br>
                  <strong><span class="auto-style3">
                  <br>
                  Home_ctr</span> </strong>class<strong> 
                  extends 
                  utl </strong>
                  is 
                  &quot;ctrl+c,v 
                  reusable&quot;<strong><br>
                  <br>
                  <span class="auto-style3">Home</span> </strong>
                  is<strong> 
                  view </strong>
                  class, 
                  is 
                  &quot;ctrl+c,v 
                  reusable&quot;.</td>
                  <td style="width: 199px">
                  Step 
                  3.1
                  <strong style="color: #008080">
                  <span class="auto-style2">Tbl_crud</span> </strong> 
                  is 
                  module
                  <strong>
                  DB</strong>
                  <strong>
                  adapter</strong> class, 
                  &quot;ctrl+c,v 
                  reusable 
                  DAO&quot;.<br>
                  <br>
                  This 
                  code 
                  layer 
                  is
                  <br>
                  <strong>Middle 
                  tier</strong> 
                  - 
                  business 
                  <br>
                  logic 
                  &amp; 
                  objects. </td>
                  <td style="height: 40px">
                  Step 
                  3.2
                  <strong>
                  <span class="auto-style3">Db_allsites</span> 
                  DB</strong>
                  <strong>
                  adapter</strong> class 
                  is<strong> </strong>
                  shared, 
                  global
                  <span lang="hr">
                  on 
                  site 
                  level</span>, 
                  common,
                  <span lang="hr">
                  reusable 
                  (includ-able) 
                  Data 
                  Acess 
                  Object</span>.
                  <span lang="hr">
                  <strong>
                  Implements</strong>
                  </span>
                  <br>
                  <span class="auto-style1">
                  <strong>
                  <span class="auto-style2">
                  Db_allsites_Intf</span></strong></span>&nbsp;reusable&nbsp; 
                  (<span lang="hr">includ-able</span>) 
                  DAO. </td>
                  <td style="height: 40px" colspan="2">
                  <strong>
                  How 
                  works 
                  R(ead) 
                  of 
                  cRud 
                  :<br>
                  Router</strong> 
                  in 
                  Config_allsites&nbsp; 
                  called 
                  from 
                  Home_ctr 
                  returns 
                  user's 
                  commands 
                  (interactivity) 
                  decoded 
                  from 
                  URL 
                  request to 
                  Home_ctr 
                  which
                  <strong>
                  dispatches</strong> 
                  request 
                  (URL 
                  parameters) 
                  to 
                  own 
                  methods.<br>
                  <br>
                  Home_ctr's 
                  method 
                  call 
                  Home's 
                  method 
                  which 
                  reads 
                  table 
                  rows 
                  using 
                  DAO's 
                  (three 
                  classes 
                  in 
                  Step&nbsp; 
                  3.) 
                  and 
                  display 
                  them 
                  - 
                  response 
                  is 
                  HTML 
                  from 
                  Home 
                  view.</td>
                </tr>
            </table>



                        <h4>Image 1. M-V data flow in CRUD module <span lang="hr">and B12phpfw classes (column display)</span></h4>
                        <p><span lang="hr" style="margin-left: 40px"><span class="auto-style5">Data flow<strong> </strong>determines the <strong>structure (skeleton)</strong> of the program code.</span></span></p>
            <table class="auto-style4" style="width: 100%">
                  <tr>
                    <!-- height="284" width="386" -->
                    <td><img alt="Clean_Architecture_small.jpg" 
                       longdesc="Clean_Architecture_small.jpg" src="<?=$pp1->shares_url?>/img/Clean_Architecture_small.jpg" ></td>
                    <td>
                    <h4>Image 2. Circular display of important functionalities, data and control flow and B12phpfw classes</h4>
                    
                    <p>
                    Tbl_crud and Db_allsites classes have same named CRUD methods cc, rr, uu, dd. Tbl_crud contains also business methods (largest and most complicated code) which call CRUD methods.
                    </p>
                    
                    <p>
                    Tbl_crud and Db_allsites classes are independent thanks to Db_allsites_Intf list of atributes and methods. Persistant storage object variable is parameter (dependency injected property palete object $pp1) of Db_allsites CRUD methods.
                    
                    This means that cc, rr, uu, dd CRUD calls in Tbl_crud may access any persistant storage - MySQL, Oracle, OS texts...
                    </p>

                    <p>See&nbsp; <a href="https://github.com/nazonohito51/clean-architecture-sample" target="_blank">https://github.com/nazonohito51/clean-architecture-sample</a>&nbsp; - good picture, but for me to complicated code.
                    </p>
                    
                    </td>
                  </tr>
            </table>
                        <br>
                        <strong>Adapters</strong> <strong>are implementations</strong> - classes or methods which depend on interfaces, not on each other (ee do not depend on other classes).<br>
                        <strong>Interfaces are <span lang="hr">abstractions</span>,</strong> functionalities, features, ports. Interfaces<strong> </strong>in PHP are like <strong>UML diagrams</strong> or <strong>Oracle PL/SQL packages</strong> : lists of atributes and methods.<br>
                        The <strong>Data Access Object (or DAO) pattern</strong>: separates a data resource's client interface from its data access mechanisms. adapts a specific data resource's access API to a generic client interface.<br>
                        <div class="row gx-4 gx-lg-5">





        <div class="col-lg-3 col-md-6">
            <div class="mt-5">
                  
              <p class="text-muted mb-0">
                 <img class="phone" src="<?=$pp1->shares_url?>/img/mvc_M_V_data_flow.jpg" height="241" width="228">
              </p>
                     <h4>Image 3. Principle of M-V data flow in CRUD module</h4>
              <p class="text-muted mb-0">
          <b>1. SEES</b> in picture means :  C assigns variables from user request in URL
          (from URL query) telling V what user wants and calls V method or includes V (not showed in picture). 
          <br><b>2. UPDATES</b> in picture means : V pulls data from M according C variables assigned in 1. 
             </p>
          </div>
      </div>



      <div class="col-lg-3 col-md-6">
         <div class="mt-5">
           <div class="mb-2"><i class="bi-laptop fs-1 text-primary"></i></div>

             <p class="text-muted mb-0">
          3. <strong>MANIPULATES</b></strong> means : 
          <br>V (user request) may call C method for some state 
          changes ordered in URL by user (<b>USES</b> in picture).
          <br>Eg : table row update "Approve 
          user comment" in msg module. User`s events are so handled in Controller class.
             </p>

           <p class="text-muted mb-0">
           View gets (singleton) or instantiates model object and pulls data from M. If we have user`s interactions (events) eg filter displayed rows (pagination is sort of filtering), than 
           <strong>M-V data flow is only possible solution</strong>.
            </p>

         </div>
      </div>



                    <div class="col-lg-3 col-md-6">
                        <div class="mt-5">
                            <div class="mb-2"><i class="bi-globe fs-1 text-primary"></i></div>
                            
                            <h3 class="h4 mb-2"><b>M-C-V data flow</b></h3>
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
              Is it really open source if it's not made with love?&nbsp;</p>
                                            <p class="text-muted mb-0">
              &nbsp;<a style="display: inline;"
                     href="http://dev1:8083/fwphp/glomodul/z_examples/php_patterns/singleton.php" 
                     class="dropdown-item" target="_blank"><img src="<?=$pp1->shares_url?>/img/ic_supervisor_account_black_24dp.png" alt="<?=$pp1->shares_url?>/img/ic_supervisor_account_black_24dp.png" title="<?=$pp1->shares_url?>/img/ic_supervisor_account_black_24dp.png">Singleton</a>

                  <br><a style="display: inline;"
                     href="http://dev1:8083/fwphp/glomodul/z_examples/php_patterns/p08_singleton.php" 
                     class="dropdown-item" target="_blank">
                 <img src="<?=$pp1->shares_url?>/img/ic_supervisor_account_black_24dp.png" alt="<?=$pp1->shares_url?>/img/ic_supervisor_account_black_24dp.png" title="<?=$pp1->shares_url?>/img/ic_supervisor_account_black_24dp.png">Singleton2</a>

                  <br><a style="display: inline;"
                     href="http://dev1:8083/fwphp/glomodul/oraedoop/" 
                     class="dropdown-item" target="_blank">
                 <img src="<?=$pp1->shares_url?>/img/ic_supervisor_account_black_24dp.png" alt="<?=$pp1->shares_url?>/img/ic_supervisor_account_black_24dp.png" title="<?=$pp1->shares_url?>/img/ic_supervisor_account_black_24dp.png">Oraedoop</a>
                                  </p>
                                            <p class="text-muted mb-0">
                                            &nbsp;</p>

                  <!--
                     http://localhost:8083/adminer/adminer/?oracle 
                     http://dev1:8083/fwphp/glomodul/adminer/adminer/?oracle 
                     $glomodul_path.'adminer/adminer'.QS.'oracle'
                  -->
                  <a style="display: inline;"
                     href="/fwphp/glomodul/lsweb/Lsweb.php/?cmd=J:/awww/www/fwphp/glomodul/z_examples/" 
                     class="dropdown-item" target="_blank">&nbsp; &nbsp; &nbsp; &nbsp;  
                 
                 
           <img src="<?=$pp1->shares_url?>/img/ic_supervisor_account_black_24dp.png" 
               alt="ic_supervisor_account_black_24dp.png"
               title="ic_supervisor_account_black_24dp.png"> ALL HELP SW
               </a>  &nbsp;  



      <br><br>
      <div class="row row-example">
            <!--  -->
            <div>


              <img src="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png" alt="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png" 
                 title="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png">aaaaaaaa aaaaaaa
              

              <br>
              <img src="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png" alt="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png" 
                   title="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png"> bbbbbbbbbbb bbbbbbbb
            </div>



          <br><br><p><a class="btn btn-light btn-xl" href="#">More</a></p>

      </div><!-- E N D   r o w -->




           </div><!-- e n d  c o l -->
      </div>

    </div><!-- E N D   r o w -->








            <!--

            -->

    </div><!-- E N D   r o w -->




  </div><!-- E N D   container -->
</section><!-- E N D   learn -->








          <!-- *********************************************
          pgpart05  2. Explain - Create  (Portfolio)
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
                        <a class="portfolio-box" href="<?=$pp1->shares_url?>/img/mvc_M_V_and_M_C_V_data_flow.jpg" 
                           title="mvc_M_V_and_M_C_V_data_flow.jpg">
                           <img class="img-fluid" src="<?=$pp1->shares_url?>/img/mvc_M_V_and_M_C_V_data_flow.jpg"
                                alt="<?=$pp1->shares_url?>/img/mvc_M_V_and_M_C_V_data_flow.jpg" />
                                  <?=$pp1->shares_url?>/img/
                                  <br>mvc_M_V_and_M_C_V
                                  <br>_data_flow.jpg
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?=$pp1->shares_url?>/img/mvc_M_C_V.jpg" 
                           title="<?=$pp1->shares_url?>/img/mvc_M_C_V.jpg">
                           <img class="img-fluid" src="<?=$pp1->shares_url?>/img/mvc_M_C_V.jpg" alt="mvc_M_C_V.jpg" />
                           <?=$pp1->shares_url?>/img/
                           <BR>mvc_M_C_V.jpg
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="<?=$pp1->shares_url?>/img/mvc_M_C_V_data_flow_Laravel.jpg" 
                           title="Project Name">
                           <img class="img-fluid" src="<?=$pp1->shares_url?>/img/mvc_M_C_V_data_flow_Laravel.jpg" 
                                alt="[project image]" />
                           <?=$pp1->shares_url?>/img/
                           <br>mvc_M_C_V_data_flow_Laravel.jpg
                        </a>
                    </div>


                    <div class="col-lg-4 col-sm-6">
                        <br><br><br><br>
                        <a class="portfolio-box" href="<?=$pp1->shares_url?>/img/mvc_M_V_data_flow_MVC_3tier_DAO_abstract_interface.jpg"
                           title="Project Name">
                            <img class="img-fluid" src="<?=$pp1->shares_url?>/img/mvc_M_V_data_flow_MVC_3tier_DAO_abstract_interface.jpg"
                                 alt="[project image]" />
                            mvc_M_V_data_flow
                            <br>_MVC_3tier_DAO_abstract_interface.jpg
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
              <img src="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png" alt="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png" title="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png">

              <a target="_blank" title="Routing and dispatching"
                href="/fwphp/glomodul/z_examples/03_call_child_fn_from_parent_cls_ROUTING.php?i/home/k2/v2" 
                class="text-black font-weight-bold">B1phpfw routing and dispatching explained</a>
            </p>


            <p>
              <img src="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png" alt="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png" title="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png">

              <a target="_blank" title="Img gallery"
                href="/fwphp/glomodul/img_gallery/index.html" 
                class="text-black font-weight-bold">Img gallery</a>
            </p>



            <p>
              <img src="<?=$pp1->shares_url?>/img/edit.png" alt="<?=$pp1->shares_url?>/img/edit.png" 
                   title="<?=$pp1->shares_url?>/img/edit.png">
              Todo / Done
            </p>
            <ol>
            
            <li>Feb. 2023. B12phpfw ver. 11 : simplified routing, dispatching, Autoload, new global <b>bootstrap.php</b>
            <br>&nbsp;</li>
            
            <li>Jan. 2023. B12phpfw ver. 10 : same module DB adapter for any shared DB adapter which is <b>DI (Dependence Injected)</b> in view script - class Db_allsites (or Db_allsites_ora or... any DB) implements Db_allsites_Intf
            <br>&nbsp;</li>
            
            <li>Jul 2022. B12phpfw ver. 9 - Deprecated: Calling static <b>trait</b> method (from class Tbl_crud ) B12phpfw\core\b12phpfw\Db_allsites::rrcount is deprecated, it should only be called on a class using the trait (but use is hard coding !?), so Db_allsites is abstract Class for now (2022-07-03). Later, in ver. 10, Db_allsites class I made not abstract because must be instantiated in index.php to be DI in view class.
            <br>&nbsp;</li>
            
            <li>Nov. 2021. B12phpfw ver. 8 : 

               <ol>

               <li>any atomic module (user, post_category, post, post_comment) may be <b>caled from compound (blog) module, but also independent of compound module</b>.
               </li>

               <li>Shares are not any more in /zinc folder but in in <b>/vendor folder</b>. Eg /vendor/b12phpfw/Autoload.php below web server doc root J:\xampp\htdocs or J:\awww\www (virtual host doc root). Site root(s) are on same place in folders hierarchy eg \fwphp (may be named site_x). Also group of modules are on same place in folders hierarchy eg \fwphp\glomodul. Also modules are on same place in folders hierarchy eg \fwphp\glomodul\blog – dir like oracle Forms form module.</li>
            
               <li>Views are classes - clearer and cleaner code than include scripts and URL jumps ?</li>

               <li>Improved CRUD sintax - Tbl_crud DB adapters in module dirs should contain most code which was in view scripts. Global code snippets are in global methods where possible.</li>

              <li>Improve links aliases in Home_ctr and in view scripts</li>

              <li>PHP 8 and Bootsrap 5</li>
              </ol>

            <br>&nbsp;</li>
            
            <li>Oct. 2020. B12phpfw ver. 7 - PHP 7 and trait DBI </li>
               <ol>
               <li>
                2021.08.28 ver 7.0.5 : I added folder (module) WEBSERVERROOT/fwphp/glomodul/img_gallery
                J:\awww\www is my WEBSERVERROOT.
                J:\awww\www\fwphp is MYDEVSITEROOT1. You may have more MYDEVSITEROOT2, 3... See how in WEBSERVERROOT/index_laragon.php script.
                glomodul is group of folders - modules which are not 01mater or 02financ or 03... glomodul may be named othermodules.
                img_gallery module is first lesson about (theory behind) code skeleton (application architecture) B12phpfw
             </li>

             <li>
              2020.09.30 DONE version 7.0.0.0 1. declare(strict_types=1) ; - PHP 7 2. DBI improved : trait Db_allsites instead class Db_allsites. 3. Each DB table (persistent storage) has adapter class Tbl_crud : which uses B12phpfw\core\vendor/B12phpfw\Db_allsites and implements Interf_Tbl_crud This means that : 1. Module's views or ctrs, eg blog module (see blog folder) work much easier with more Tbl_crud, ee with own Tbl_crud and with other tables Tbl_crud's. 2. class Home_ctr extends class Config_allsites. ( Logically all is in Home_ctr).
              </li>

              <li>
             2020.09.05 DONE On Linux demo sites : some PHP statement works different than on Windows (about dozen incompatibilities), eg links do not work in msg module, but work in mnu and mkd modules) : DONE in wsroot_path\vendor/b12phpfw\Config_allsites.php :
             </li>
             <li>
             Error on Linux not on Windows : $REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_STRING);
             <br>No error on both OS : $REQUEST_URI = filter_var($_SERVER['REQUEST_URI'], FILTER_SANITIZE_URL) ;
              </li>
              </ol>
              

            </ol>
            
          



  </div><!-- E N D   container -->
</section><!-- E N D   explain -->



          <!-- *********************************************
          pgpart06  3. Share  (Call to action)
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
            <img src="<?=$pp1->shares_url?>/img/meatmirror.jpg"> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href="https://github.com/slavkoss/fwphp/">Github</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href="http://phporacle.altervista.org/">phporacle blog</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href="http://phporacle.altervista.org/wp-admin/index.php/">blog admin</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href="http://phporacle.eu5.net/">Demo site on Linux (freehostingeu)</a> </div> </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2"> <div>
              <a target="_blank" href=" http://phporacle.heliohost.org/">Demo site on Linux (heliohost time limited)</a> </div> </div>
      </div><!--e n d  Grid Bootstrap -->



        <!-- S H A R E  SECTION -->
        <br><br>
        <div>
          <img src="<?=$pp1->shares_url?>/img/twitter.jpg" alt="">
          <img src="<?=$pp1->shares_url?>/img/globus.png">
          ggggggg gggggggg
        </div>

        <div>
          <p>aa111 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus provident sed mollitia, ... &nbsp; </p>

            <div>
              <img src="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png" alt="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png" title="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png">ddd dddddddddd
            </div>



            <div>
              <img src="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png" alt="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png" title="<?=$pp1->shares_url?>/img/ic_done_black_32dp.png">hhhhhh hhhhhhh
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




        <!-- pgpart07 Contact-->
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
              Copyright &copy; 2023 - phporacle, Slavko Srakočić, Zagreb.

              <small>
                PHP <?=phpversion()?>. Created with PHP 8.1.5, Bootstrap 5.1.3. Start Bootstrap - Creative v7.0.6, <a href="Pico_css_v1.4.4.html">Pico css v1.4.4</a> or Skeleton V2.0.4 2014 year).
                <br>This is typical static web page with dynamic (PHP) links.
                
                <br>Start Bootstrap helps you build better websites! Download a theme (like "<a href="https://startbootstrap.com/theme/creative/">Creative</a>") and start customizing!

                <br>This page is Mnu module home  <?= __FILE__ ?> For large pages we can include "h_" prefixed parts, "h_" meaning part of home page.

              </small>
            </div>

                <?php
                    if ($pp1->dbg == '1') {echo '<pre>'.__FILE__.' ln='.__LINE__.' said:';
                    echo '<br />$pp1='; print_r($pp1) ; echo '</pre>';
                    }
               ?>
          </div>
        </footer>







        <!--  -->
        <script src="<?=$pp1->shares_url?>/themes/bootstrap/js/bootstrap.bundle.min.js"></script>

        <script src="<?=$pp1->shares_url?>/themes/bootstrap/js/simpleLightbox.min.js"></script>
        <!-- Core theme JS -->
        <script src="scripts.js"></script>
        <!--  -->
        <script src="<?=$pp1->shares_url?>/themes/bootstrap/js/sb-forms-0.4.1.js"></script>
<!-- End Document -->
    </body>
</html>
