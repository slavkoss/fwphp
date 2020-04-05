<?php
/*<!--
  J:\awww\www\fwphp\glomodul4\help_sw\test\bootstrap\
  http://dev1:8083/fwphp/glomodul4/help_sw/test/bootstrap/
--> */

require $wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/inc_adresses.php' ;
//require '../inc_adresses.php' ;
require $wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/inc_hdr_ftr.php' ;
//require '../inc_hdr_ftr.php' ;
hdr_pge($module_arr, 'Bootstrap4', '/'.$module_arr['module_relpath'].'/02help/style.css');
?>

  <nav class="navbar navbar-expand-md navbar-light fixed-top py-4">
    <div class="container">
      <a href="index.php" class="navbar-brand">
      
        <img src="<?=$module_arr['wsroot_url']?>zinc/img/suza.jpg" width="50" height="50" alt="">
        
        <h3 class="d-inline align-middle">Help</h3>
        
      </a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
         <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="#home" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#about" class="nav-link">About</a>
          </li>
          <li class="nav-item">
            <a href="#authors" class="nav-link">Meet The Authors</a>
          </li>
          <li class="nav-item">
            <a href="#contact" class="nav-link">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- SHOWCASE -->
  <section id="showcase" class="py-5">
    <div class="primary-overlay text-white">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 text-center">
            <h1 class="display-2 mt-5 pt-5">
              So What You Dream Of...
            </h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum, quas meatmirror header.</p>
            <a href="#" class="btn btn-outline-secondary btn-lg text-white">
              <i class="fas fa-arrow-right"></i> Read More</a>
          </div>
          <div class="col-lg-6">
            <img src="<?=$module_arr['wsroot_url']?>zinc/img/header.jpg" alt="" class="img-fluid d-none d-lg-block">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- NEWSLETTER -->
  <section id="newsletter" class="bg-dark text-white py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <input type="text" class="form-control form-control-lg" placeholder="Enter Name">
        </div>
        <div class="col-md-4">
          <input type="text" class="form-control form-control-lg" placeholder="Enter Email">
        </div>
        <div class="col-md-4">
          <button class="btn btn-primary btn-lg btn-block"><i class="fas fa-envelope-open-o"></i> Subscribe</button>
        </div>
      </div>
    </div>
  </section>

  <!-- BOXES -->
  <section id="boxes" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="card text-center border-primary">
            <div class="card-body">
              <h3 class="text-primary">Be Better</h3>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, quibusdam.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center bg-primary text-white">
            <div class="card-body">
              <h3>Be Smarter</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, quibusdam.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center border-primary">
            <div class="card-body">
              <h3 class="text-primary">Be Faster</h3>
              <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, quibusdam.</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card text-center bg-primary text-white">
            <div class="card-body">
              <h3>Be Stronger</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum, quibusdam.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ABOUT / WHY SECTION -->
  <section id="about" class="py-5 text-center bg-light">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="info-header mb-5">
            <h1 class="text-primary pb-3">
              Why This Book?
            </h1>
            <p class="lead pb-3">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet omnis fuga maiores excepturi dolores explicabo.
            </p>
          </div>

          <!-- ACCORDION -->
          <div id="accordion" role="tablist">
            <div class="card">
              <div class="card-header" id="heading1">
                <h5 class="mb-0">
                  <div href="#collapse1" data-toggle="collapse" data-parent="#accordion">
                    <i class="fas fa-arrow-circle-down"></i> Get Inspired
                  </div>
                </h5>
              </div>

              <div id="collapse1" class="collapse show">
                <div class="card-body">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi pariatur optio totam obcaecati facere nam nihil inventore dolorum consequuntur quis unde voluptatibus numquam velit veniam explicabo eveniet fugit hic, tenetur. Iusto, consequatur, obcaecati. Ab earum alias, placeat exercitationem possimus quidem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem officia officiis aliquam fugiat, omnis, corrupti dolorum ipsa laudantium sequi dolores!
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="heading2">
                <h5 class="mb-0">
                  <div href="#collapse2" data-toggle="collapse" data-parent="#accordion">
                    <i class="fas fa-arrow-circle-down"></i> Gain The Knowledge
                  </div>
                </h5>
              </div>

              <div id="collapse2" class="collapse">
                <div class="card-body">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi pariatur optio totam obcaecati facere nam nihil inventore dolorum consequuntur quis unde voluptatibus numquam velit veniam explicabo eveniet fugit hic, tenetur. Iusto, consequatur, obcaecati. Ab earum alias, placeat exercitationem possimus quidem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem officia officiis aliquam fugiat, omnis, corrupti dolorum ipsa laudantium sequi dolores!
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="heading3">
                <h5 class="mb-0">
                  <div href="#collapse3" data-toggle="collapse" data-parent="#accordion">
                    <i class="fas fa-arrow-circle-down"></i> Open Your Mind
                  </div>
                </h5>
              </div>

              <div id="collapse3" class="collapse">
                <div class="card-body">
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi pariatur optio totam obcaecati facere nam nihil inventore dolorum consequuntur quis unde voluptatibus numquam velit veniam explicabo eveniet fugit hic, tenetur. Iusto, consequatur, obcaecati. Ab earum alias, placeat exercitationem possimus quidem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem officia officiis aliquam fugiat, omnis, corrupti dolorum ipsa laudantium sequi dolores!
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- AUTHORS -->
  <section id="authors" class="my-5 text-center">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="info-header mb-5">
            <h1 class="text-primary pb-3">
              Meet The Authors
            </h1>
            <p class="lead pb-3">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet omnis fuga maiores excepturi dolores explicabo.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <img src="<?=$module_arr['wsroot_url']?>zinc/img/mravojed.png" 
                   alt="" class="img-fluid rounded-circle w-50 mb-3">
              <h3>Susan Williams</h3>
              <h5 class="text-muted">Lead Writer</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae molestiae alias expedita quae esse ut.</p>
              <div class="d-flex flex-row justify-content-center">
                <div class="p-4">
                  <a href="#"><i class="fas fa-facebook"></i></a>
                </div>
                <div class="p-4">
                  <a href="#"><i class="fas fa-twitter"></i></a>
                </div>
                <div class="p-4">
                  <a href="#"><i class="fas fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <img src="<?=$module_arr['wsroot_url']?>zinc/img/twitter.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
              <h3>Grace Smith</h3>
              <h5 class="text-muted">Co-Writer</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae molestiae alias expedita quae esse ut.</p>
              <div class="d-flex flex-row justify-content-center">
                <div class="p-4">
                  <a href="#"><i class="fas fa-facebook"></i></a>
                </div>
                <div class="p-4">
                  <a href="#"><i class="fas fa-twitter"></i></a>
                </div>
                <div class="p-4">
                  <a href="#"><i class="fas fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <img src="<?=$module_arr['wsroot_url']?>zinc/img/meatmirror.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
              <h3>John Doe</h3>
              <h5 class="text-muted">Editor</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae molestiae alias expedita quae esse ut.</p>
              <div class="d-flex flex-row justify-content-center">
                <div class="p-4">
                  <a href="#"><i class="fas fa-facebook"></i></a>
                </div>
                <div class="p-4">
                  <a href="#"><i class="fas fa-twitter"></i></a>
                </div>
                <div class="p-4">
                  <a href="#"><i class="fas fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="card">
            <div class="card-body">
              <img src="<?=$module_arr['wsroot_url']?>zinc/img/github.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
              <h3>Kevin Swanson</h3>
              <h5 class="text-muted">Designer</h5>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae molestiae alias expedita quae esse ut.</p>
              <div class="d-flex flex-row justify-content-center">
                <div class="p-4">
                  <a href="#"><i class="fas fa-facebook"></i></a>
                </div>
                <div class="p-4">
                  <a href="#"><i class="fas fa-twitter"></i></a>
                </div>
                <div class="p-4">
                  <a href="#"><i class="fas fa-instagram"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CONTACT -->
  <section id="contact" class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-9">
          <h3>Get In Touch</h3>
          <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, et.</p>
          <form>
            <div class="form-group">
              <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Name">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fas fa-pencil"></i></span>
                <textarea class="form-control" placeholder="Message" rows="5"></textarea>
              </div>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary btn-block btn-lg">
          </form>
        </div>
        <div class="col-lg-3 align-self-center">
          <img src="<?=$module_arr['wsroot_url']?>zinc/img/mvc_M_V.jpg" alt="" class="img-fluid">
        </div>
      </div>
    </div>
  </section>

  <footer id="main-footer" class="py-5 bg-primary text-white">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-6 ml-auto">
          <p class="lead">Copyright &copy; 2017</p>
        </div>
      </div>
    </div>
  </footer>


<?php ftr_pge($module_arr, 'jquery.min.js', '/'.$module_arr['module_relpath'].'/navbar-fixed.js'); ?>


</body></html>
