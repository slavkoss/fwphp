<?php 
// J:\awww\www\fwphp\glomodul\z_examples\bootstrap5\clean_blog\includes\navbar.php
 session_start(); 

 // for links :
 $moduleurl = 'http://dev1:8083/fwphp/glomodul/z_examples/bootstrap5/clean_blog' ;
 // for css :
 $modulepath = '/fwphp/glomodul/z_examples/bootstrap5/clean_blog' ;
 //$sitepath = ... ;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />

        <title>Clean Blog - Start Bootstrap Theme</title>

        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />

        <!-- Core theme CSS (includes Bootstrap)
        <link href="http://localhost/clean-blog/css/styles.css" rel="stylesheet" />
        <link href="/clean_blog/css/styles.css" rel="stylesheet" />
        <link href="<?=$modulepath?>/css/StartBootstrapCleanBlog.css" rel="stylesheet" />
        J:\awww\www\vendor\b12phpfw\themes\bootstrap\css\StartBootstrapCleanBlog.css
          -->
        <link href="/vendor/b12phpfw/themes/bootstrap/css/StartBootstrapCleanBlog.css" rel="stylesheet" />

    </head>


    <body>
      <!-- NAVIGATION -->

      <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
        <div class="container px-4 px-lg-5">
                
            <!-- top toolbar left part eg : Blog - Home - Start Bootstrap -->
            <a class="navbar-brand" href="<?=$moduleurl?>/index.php" title="Refresh this page">
            Home</a>


            <!-- menu button for top toolbar right part when page is narrowed -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                        data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" 
                        aria-expanded="false" aria-label="Toggle navigation">
                Menu <i class="fas fa-bars"></i>
            </button>

                <!-- top toolbar right part -->
                <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ms-auto py-4 py-lg-0">
                      
                      <!-- search http://localhost/clean-blog/search.php -->

                      <div class="input-group ps-5">
                          <div id="navbar-search-autocomplete" class="w-100">
                            <form method="POST" action="<?=$moduleurl?>/search.php">
                              <input name="search" type="search" id="form1" class="form-control mt-3" 
                                     placeholder="search" />                            
                                </form>
                            </div>                
                      </div>

                      <!-- links after search-->

                      <!--li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li-->

                      <?php

                      if(isset($_SESSION['username'])) : ?>
                        /* <!-- 
                           *****************************************
                           logged in
                           *****************************************
                        --> */
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" 
                            href="<?=$moduleurl?>/posts/create.php">
                            create</a></li>
                        
                        <li class="nav-item dropdown mt-3">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                             role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          
                            <?php echo $_SESSION['username']; ?>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" 
                                  href="<?=$moduleurl?>/users/profile.php?prof_id=<?=$_SESSION['user_id']?>">
                                  Profile</a></li>
                                <li><a class="dropdown-item" 
                                  href="<?=$moduleurl?>/auth/logout.php">logout</a></li>
                          </ul>
                        </li>

                      <?php else : ?>    
                        <!-- 
                        *****************************************
                           not logged in 
                        *****************************************
                        -->
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" 
                          href="<?=$moduleurl?>/auth/login.php">login</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" 
                          href="<?=$moduleurl?>/auth/register.php">register</a></li>

                      <?php endif; ?>    
                       
                      
                      <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" 
                        href="<?=$moduleurl?>/contact.php">Contact</a></li>
                  </ul>
                </div> <!-- end top toolbar right part -->
        </div>
      </nav>