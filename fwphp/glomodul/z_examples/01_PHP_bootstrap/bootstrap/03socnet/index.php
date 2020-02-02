<?php
/*<!--
  J:\awww\www\fwphp\glomodul4\help_sw\test\bootstrap\
  http://dev1:8083/fwphp/glomodul4/help_sw/test/bootstrap/
--> */

require $wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/inc_adresses.php' ;
//require '../inc_adresses.php' ;
require $wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/inc_hdr_ftr.php' ;
//require '../inc_hdr_ftr.php' ;


hdr_pge($module_arr, 'Bootstrap4', '/'.$module_arr['module_relpath'].'/03socnet/style.css');
?>

  <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="container">
      <a href="index.php" class="navbar-brand">Social Network</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
        
          <li class="nav-item">
            <a href="#home" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="../index.php" class="nav-link">HomeModulesGroup</a>
          </li>
          
          <li class="nav-item">
            <a href="#explore-head-section" class="nav-link">Explore</a>
          </li>
          <li class="nav-item">
            <a href="#create-head-section" class="nav-link">Create</a>
          </li>
          <li class="nav-item">
            <a href="#share-head-section" class="nav-link">Share</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- HOME SECTION -->
  <header id="home-section">
    <div class="dark-overlay">
      <div class="home-inner">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 d-none d-lg-block">
              <h1 class="display-4">Build <strong>social profiles</strong></h1>
              <div class="d-flex flex-row">
                <div class="p-4 align-self-start">
                  <i class="fas fa-check"></i>
                </div>
                <div class="p-4 align-self-end">
                   Connect and <b>EXPLORE</b> what your friends write.
                </div>
              </div>

              <div class="d-flex flex-row">
                <div class="p-4 align-self-start">
                  <i class="fas fa-check"></i>
                </div>
                <div class="p-4 align-self-end">
                  <b>CREATE</b> - write text about something.
                </div>
              </div>

              <div class="d-flex flex-row">
                <div class="p-4 align-self-start">
                  <i class="fas fa-check"></i>
                </div>
                <div class="p-4 align-self-end">
                  <b>SHARE</b> what you create.
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card bg-primary text-center card-form">
                <div class="card-body">
                  <h3>Sign Up Today</h3>
                  <p>Please fill out this form to register</p>
                  <form>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-lg" placeholder="Username">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-lg" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-lg" placeholder="Confirm Password">
                    </div>
                    <input type="submit" class="btn btn-outline-light btn-block">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- EXPLORE HEAD -->
  <section id="explore-head-section">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="py-5">
            <h1 class="display-4">Explore</h1>
            <p class="lead">See what your friends write.</p>
            <a href="#" class="btn btn-outline-secondary">Find Out More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- EXPLORE SECTION -->
  <section id="explore-section" class="bg-light text-muted py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?=$module_arr['wsroot_url']?>zinc/img/header.jpg" alt="" class="img-fluid mb-3 rounded-circle">
        </div>
        <div class="col-md-6">
          <h3>Explore & Connect</h3>
          <p>See what your friends write.</p>
          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fas fa-check"></i>
            </div>
            <div class="p-4 align-self-end">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, architecto, quaerat. Quis cum eius itaque ipsa magni quam, illo molestias
            </div>
          </div>

          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fas fa-check"></i>
            </div>
            <div class="p-4 align-self-end">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, architecto, quaerat. Quis cum eius itaque ipsa magni quam, illo molestias
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CREATE HEAD -->
  <section id="create-head-section" class="bg-primary">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="py-5">
            <h1 class="display-4">Create</h1>
            <p class="lead">Write text about something.</p>
            <a href="#" class="btn btn-outline-light">Find Out More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CREATE SECTION -->
  <section id="create-section" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>Create your passion (joke)</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus provident sed mollitia, ab sint fuga quibusdam. At repellendus architecto nobis nesciunt suscipit, nisi ipsam quaerat?</p>
          
          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fas fa-check"></i>
            </div>
            <div class="p-4 align-self-end">
              Message
            </div>
          </div>

          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fas fa-check"></i>
            </div>
            <div class="p-4 align-self-end">
              Todo / Done
            </div>
          </div>
          
        </div>
        <div class="col-md-6">
          <img src="<?=$module_arr['wsroot_url']?>zinc/img/edit.png" alt="" class="img-fluid mb-3 rounded-circle">
        </div>
      </div>
    </div>
  </section>


  <!-- SHARE HEAD -->
  <section id="share-head-section" class="bg-primary">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="py-5">
            <h1 class="display-4">Share</h1>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt sed, magni, veritatis aliquam sequi eveniet? Rerum quia accusantium alias provident perferendis</p>
            <a href="#" class="btn btn-outline-light">Find Out More</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- SHARE SECTION -->
  <section id="share-section" class="py-5 bg-light text-muted">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="<?=$module_arr['wsroot_url']?>zinc/img/rss.png" alt="" class="img-fluid mb-3 rounded-circle">
        </div>
        <div class="col-md-6">
          <h3>Share what you create</h3>
          <p>111 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus provident sed mollitia, ab sint fuga quibusdam. At repellendus architecto nobis nesciunt suscipit, nisi ipsam quaerat?</p>
          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fas fa-check"></i>
            </div>
            <div class="p-4 align-self-end">
              222 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, architecto, quaerat. Quis cum eius itaque ipsa magni quam, illo molestias
            </div>
          </div>

          <div class="d-flex flex-row">
            <div class="p-4 align-self-start">
              <i class="fas fa-check"></i>
            </div>
            <div class="p-4 align-self-end">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas, architecto, quaerat. Quis cum eius itaque ipsa magni quam, illo molestias
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MAIN FOOTER -->
  <footer id="main-footer" class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <div class="py-4">
            <h1 class="h3">Social Network</h1>
            <p>Copyright &copy; 2017</p>
            <button class="btn btn-primary" data-toggle="modal" data-target="#contactModal">Contact Us</button>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- CONTACT MODAL -->
  <div class="modal fade text-dark" id="contactModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="contactModalTitle">Contact Us</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label for="name">Message</label>
              <textarea class="form-control"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary btn-block">Submit</button>
        </div>
      </div>
    </div>
  </div>

<?php ftr_pge($module_arr, 'jquery.min.js', '/'.$module_arr['module_relpath'].'/navbar-fixed.js'); ?>

</body></html>
