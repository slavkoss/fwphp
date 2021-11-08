<?php
//<!-- J:\awww\www\fwphp\www\h_top_toolbar.php -->
//  This is first of 5 home page parts (all are prefixed with "h_")

$tmp = $img_url . 'ic_view_module_white_24dp.png' ;
$img_url_modules_link = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';

$tmp = $img_url . 'ic_supervisor_account_black_24dp.png' ;
$img_url_users_link   =  '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';

$tmp = $img_url . 'ic_settings_black_24dp.png' ;
$img_url_settings_link = '<img src="'.$tmp.'" alt="'.$tmp.'" title="'.$tmp.'">';

//( ! ) Notice: Undefined variable: Modules_Login in J:\awww\www\fwphp\www\h_top_toolbar.php on line 114

?>



<body class="d-flex flex-column h-100">
  <main class="flex-shrink-0">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container px-5">
            <a class="navbar-brand" href="#">Msg (Blog)</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">

       <li class="nav-item"><a href="#explore-head-section" class="nav-link"><b>L</b>earn</a></li>
       <li class="nav-item"><a href="#create-head-section" class="nav-link"><b>C</b>reate</a></li>
       <li class="nav-item"><a href="#share-head-section" class="nav-link"><b>S</b>hare</a></li>

        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
            <li class="nav-item"><a class="nav-link" href="pricing.html">Pricing</a></li>
            <li class="nav-item"><a class="nav-link" href="faq.html">FAQ</a></li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Help</a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">

                <li><a class="dropdown-item" href="<?=QS?>hlp4" target="_blank"
                     title=""
                  ><?=$img_url_users_link?> DM, DDD</a>

                <li><a class="dropdown-item" href="<?=QS?>hlp1" target="_blank"
                     title=""
                  ><?=$img_url_users_link?> 2 cols</a>

                <li><a class="dropdown-item" href="<?=QS?>hlp2" target="_blank"
                     title=""
                  ><?=$img_url_settings_link?> 4 cols CSSplay</a>

                <li><a class="dropdown-item" href="<?=QS?>hlp3" target="_blank"
                     title=""
                  >Flex (phpenthusiast)</a>

                <li><a class="dropdown-item" href="blog-home.html">Blog Home</a></li>
                <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
              </ul>
            </li>


            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Lang</a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">

                <li><a class="dropdown-item" href="<?=$pp1->lnghr?>lang=hr" target="_blank"
                     title=""
                  ><?=$img_url_users_link?> Croatian</a>

                <li><a class="dropdown-item" href="<?=$pp1->lngen?>lang=en" target="_blank"
                     title=""
                  ><?=$img_url_settings_link?> English</a>

                </ul>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Portfolio</a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">

                <!-- profile.php  $wsroot_url.$glomodul_path.'/user/' -->
                  <li><a class="dropdown-item" href="<?='../glomodul/user/'?>" 
                     target="_blank"><?=$img_url_users_link?>Users (Register/Login/Loguut)</a>
                  <li><a class="dropdown-item" href="settings.php" target="_blank">
                      <?=$img_url_settings_link?>Settings</a>
                  <li><a class="dropdown-item" href="xyz.php" target="_blank">
                      <?=''?>xyzzzzzzzzz xxxxxxxxxx yyyyyyyyyy zzzzzzzz </a>
                </ul>
            </li>

            <!--li class="nav-item"><a class="nav-link" href="h_login.php" target="_blank">Login</a>
            </li-->



          </ul>
        </div>
      </div>
    </nav>

  </main>








<?php
/*
?>
    <!-- 
           U S E R / S E T T I N G S  DROP DOWN MENU 
    -->
    <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown mr-3">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"
         title="Links to modules (php scripts dirs like Oracle Forms fmb modules)">
         <?php //echo $img_url_modules_link.$Modules_Login ; ?>
      </a>
              <div class="dropdown-menu">
                  <!-- profile.php  $wsroot_url.$glomodul_path.'/user/' -->
                  <a href="<?='../glomodul/user/'?>" 
                     class="dropdown-item" target="_blank">
                 <?=$img_url_users_link?>Users (Register/Login/Loguut)

                  </a>
                  <a href="settings.php" class="dropdown-item" target="_blank">
                      <?=$img_url_settings_link?>Settings
                  </a>

                  </a>
                  <a href="xyz.php" class="dropdown-item" target="_blank">
                      <?=''?>xyzzzzzzzzz xxxxxxxxxx yyyyyyyyyy zzzzzzzz 
                  </a>

              </div>
      </li>

      <!--li class="nav-item">
        <a href="h_login.php" class="nav-link" target="_blank">
          <i class="fas fa-user-times"></i> Login
        </a>
      </li-->

    </ul>








  </div> <!-- class="collapse..."-->
</div> <!--class="container"-->
</nav>

<?php
*/




/*

            <!-- Header-->
            <header class="bg-dark py-5">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">A Bootstrap 5 template for modern businesses</h1>
                                <p class="lead fw-normal text-white-50 mb-4">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit!</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                    <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="https://dummyimage.com/600x400/343a40/6c757d" alt="..." /></div>
                    </div>
                </div>
            </header>
            <!-- Features section-->
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0"><h2 class="fw-bolder mb-0">A better way to start building.</h2></div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
                                    <h2 class="h5">Featured title</h2>
                                    <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                                </div>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-building"></i></div>
                                    <h2 class="h5">Featured title</h2>
                                    <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                                </div>
                                <div class="col mb-5 mb-md-0 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                    <h2 class="h5">Featured title</h2>
                                    <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                                </div>
                                <div class="col h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-toggles2"></i></div>
                                    <h2 class="h5">Featured title</h2>
                                    <p class="mb-0">Paragraph of text beneath the heading to explain the heading. Here is just a bit more text.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonial section-->
            <div class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <div class="fs-4 mb-4 fst-italic">"Working with Start Bootstrap templates has saved me tons of development time when building new projects! Starting with a Bootstrap template just makes things easier!"</div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                    <div class="fw-bold">
                                        Tom Ato
                                        <span class="fw-bold text-primary mx-1">/</span>
                                        CEO, Pomodoro
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog preview section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center">
                                <h2 class="fw-bolder">From our blog</h2>
                                <p class="lead fw-normal text-muted mb-5">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque fugit ratione dicta mollitia. Officiis ad.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="https://dummyimage.com/600x350/ced4da/6c757d" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Blog post title</h5></a>
                                    <p class="card-text mb-0">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">Kelly Rowan</div>
                                                <div class="text-muted">March 12, 2021 &middot; 6 min read</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="https://dummyimage.com/600x350/adb5bd/495057" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">Media</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Another blog post title</h5></a>
                                    <p class="card-text mb-0">This text is a bit longer to illustrate the adaptive height of each card. Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">Josiah Barclay</div>
                                                <div class="text-muted">March 23, 2021 &middot; 4 min read</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="https://dummyimage.com/600x350/6c757d/343a40" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">The last blog post title is a little bit longer than the others</h5></a>
                                    <p class="card-text mb-0">Some more quick example text to build on the card title and make up the bulk of the card's content.</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">Evelyn Martinez</div>
                                                <div class="text-muted">April 2, 2021 &middot; 10 min read</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Call to action-->
                    <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5">
                        <div class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white">New products, delivered to you.</div>
                                <div class="text-white-50">Sign up for our newsletter for the latest updates.</div>
                            </div>
                            <div class="ms-xl-4">
                                <div class="input-group mb-2">
                                    <input class="form-control" type="text" placeholder="Email address..." aria-label="Email address..." aria-describedby="button-newsletter" />
                                    <button class="btn btn-outline-light" id="button-newsletter" type="button">Sign up</button>
                                </div>
                                <div class="small text-white-50">We care about privacy, and will never share your data.</div>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>



*/
