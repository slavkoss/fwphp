<?php
/*<!--
  J:\awww\www\fwphp\glomodul4\help_sw\test\bootstrap\06portfoligrid\index.php
  http://dev1:8083/fwphp/glomodul4/help_sw/test/bootstrap/
--> */

require $wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/inc_adresses.php' ;
//require '../inc_adresses.php' ;
require $wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/inc_hdr_ftr.php' ;
//require '../inc_hdr_ftr.php' ;
hdr_pge($module_arr, 'Bootstrap4', '/'.$module_arr['module_relpath'].'/06portfoligrid/style.css');
?>


  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.css" /-->
  <!--link rel="stylesheet" href="style.css"-->

  <div class="container">
    <header id="main-header">
      <div class="row no-gutters">
        <div class="col-lg-4 col-md-5">
          <img src="/zinc/img/meatmirror.jpg">
        </div>
        <div class="col-lg-8 col-md-7">
          <div class="d-flex flex-column">
            <div class="p-5 bg-dark text-white">
              <div class="name d-flex flex-row justify-content-between align-items-center">
                <h1 class="display-4">John Doe</h1>
                <div><i class="fas fa-twitter"></i></div>
                <div><i class="fas fa-facebook"></i></div>
                <div><i class="fas fa-instagram"></i></div>
                <div><i class="fas fa-github"></i></div>
              </div>
            </div>

            <div class="p-4 bg-black">
              Experienced Full Stack Web Developer 
              <a href="../index.php" class="">
                  <i class="fas fa-home"></i> HomeModulesGroup</a>
            </div>

            <div>
            
              <div class="d-flex flex-row text-white align-items-stretch text-center">
                <div class="port-item p-4 bg-primary" data-toggle="collapse"
                     data-target="#home">
                  <i class="fas fa-home d-block"></i> Home
                </div>

                <div class="port-item p-4 bg-success" data-toggle="collapse" data-target="#resume">
                  <i class="fas fa-graduation-cap d-block"></i> Resume
                </div>
                <div class="port-item p-4 bg-warning" data-toggle="collapse" data-target="#work">
                  <i class="fas fa-folder-open d-block"></i> Work
                </div>
                <div class="port-item p-4 bg-danger" data-toggle="collapse" data-target="#contact">
                  <i class="fas fa-envelope d-block"></i> Contact
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- HOME -->
    <div id="home" class="collapse show">
      <div class="card card-body bg-primary text-white py-5">
        <h2>Welcome to my page</h2>
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis, quia.</p>
      </div>

      <div class="card card-body py-5">
        <h3>My Skills</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum nulla et, modi harum hic deserunt.</p>
        <hr>
        <h4>HTML</h4>
        <div class="progress mb-3">
          <div class="progress-bar bg-success" style="width:100%"></div>
        </div>
        <h4>CSS</h4>
        <div class="progress mb-3">
          <div class="progress-bar bg-success" style="width:100%"></div>
        </div>
        <h4>JavaScript</h4>
        <div class="progress mb-3">
          <div class="progress-bar bg-success" style="width:90%"></div>
        </div>
        <h4>PHP</h4>
        <div class="progress mb-3">
          <div class="progress-bar bg-success" style="width:80%"></div>
        </div>
        <h4>Python</h4>
        <div class="progress mb-3">
          <div class="progress-bar bg-success" style="width:70%"></div>
        </div>
      </div>
    </div>

    <!-- RESUME -->
    <div id="resume" class="collapse">
      <div class="card card-body bg-success text-white py-5">
        <h2>My Resume</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo nobis ut labore iure tempore qui!</p>
      </div>

      <div class="card card-body py-5">
        <h3>Where have I worked?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis eligendi, ex officia itaque tempora natus.</p>
        <div class="card-deck">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Devmasters</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, nostrum.</p>
              <p class="p-2 mb-3 bg-dark text-white">
                Position: Full Stack Developer
              </p>
              <p class="p-2 mb-3 bg-dark text-white">
                Phone: (444) 444-4444
              </p>
            </div>
            <div class="card-footer">
              <h6 class="text-muted">Dates: 2015 - 2017</h6>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Websites Pro</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, nostrum.</p>
              <p class="p-2 mb-3 bg-dark text-white">
                Position: Front End Developer
              </p>
              <p class="p-2 mb-3 bg-dark text-white">
                Phone: (333) 333-3333
              </p>
            </div>
            <div class="card-footer">
              <h6 class="text-muted">Dates: 2013 - 2015</h6>
            </div>
          </div>

          <div class="card">
            <div class="card-body">
              <h4 class="card-title">123 Designs</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod, nostrum.</p>
              <p class="p-2 mb-3 bg-dark text-white">
                Position: Designer
              </p>
              <p class="p-2 mb-3 bg-dark text-white">
                Phone: (222) 222-2222
              </p>
            </div>
            <div class="card-footer">
              <h6 class="text-muted">Dates: 2010 - 2013</h6>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- WORK -->
    <div id="work" class="collapse">
      <div class="card card-body bg-warning py-5">
        <h3>My Portfolio</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, adipisci?</p>
      </div>

      <div class="card card-body py-5">
        <h3>What have I built?</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta, eum.</p>
        <div class="row no-gutters">
          <div class="col-md-3">
            <a href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox">
              <img src="https://unsplash.it/600.jpg?image=251" alt="" class="img-fluid">
            </a>
          </div>
          <div class="col-md-3">
            <a href="https://unsplash.it/1200/768.jpg?image=252" data-toggle="lightbox">
              <img src="https://unsplash.it/600.jpg?image=252" alt="" class="img-fluid">
            </a>
          </div>
          <div class="col-md-3">
            <a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox">
              <img src="https://unsplash.it/600.jpg?image=253" alt="" class="img-fluid">
            </a>
          </div>
          <div class="col-md-3">
            <a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox">
              <img src="https://unsplash.it/600.jpg?image=254" alt="" class="img-fluid">
            </a>
          </div>
        </div>

        <div class="row no-gutters">
          <div class="col-md-3">
            <a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox">
              <img src="https://unsplash.it/600.jpg?image=255" alt="" class="img-fluid">
            </a>
          </div>
          <div class="col-md-3">
            <a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox">
              <img src="https://unsplash.it/600.jpg?image=256" alt="" class="img-fluid">
            </a>
          </div>
          <div class="col-md-3">
            <a href="https://unsplash.it/1200/768.jpg?image=257" data-toggle="lightbox">
              <img src="https://unsplash.it/600.jpg?image=257" alt="" class="img-fluid">
            </a>
          </div>
          <div class="col-md-3">
            <a href="https://unsplash.it/1200/768.jpg?image=258" data-toggle="lightbox">
              <img src="https://unsplash.it/600.jpg?image=258" alt="" class="img-fluid">
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- CONTACT -->
    <div id="contact" class="collapse">
      <div class="card card-body bg-danger text-white py-5">
        <h2>Contact</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem, dignissimos?</p>
      </div>

      <div class="card card-body py-5">
        <h3>Get in touch</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, autem.</p>
        <form>
          <div class="form-group">
            <div class="input-group input-group-lg">
              <span class="input-group-addon bg-danger text-white">
                <i class="fas fa-user"></i>
              </span>
              <input type="text" class="form-control bg-dark text-white" placeholder="Name">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group input-group-lg">
              <span class="input-group-addon bg-danger text-white">
                <i class="fas fa-envelope"></i>
              </span>
              <input type="email" class="form-control bg-dark text-white" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group input-group-lg">
              <span class="input-group-addon bg-danger text-white">
                <i class="fas fa-pencil"></i>
              </span>
              <textarea rows="5" class="form-control bg-dark text-white" placeholder="Message"></textarea>
            </div>
          </div>
          <input type="submit" value="Submit" class="btn btn-danger btn-block btn-lg">
        </form>
      </div>
    </div>

    <!-- FOOTER -->
    <footer id="main-footer" class="p-5 bg-dark text-white">
      <div class="row">
        <div class="col-md-6">
          <a href="#" class="btn btn-outline-light"><i class="fas fa-cloud"></i> Download Resume</a>
        </div>
      </div>
    </footer>
  </div>

  <?php ftr_pge($module_arr, 'jquery.min.js', '/'.$module_arr['module_relpath'].'/navbar-fixed.js'); ?>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.js"></script>
  <script>
    $('.port-item').click(function(){
      $('.collapse').collapse('hide');
    });

    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });
  </script>

</body></html>
