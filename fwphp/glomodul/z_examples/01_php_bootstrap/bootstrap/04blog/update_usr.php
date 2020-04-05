<?php
/*<!--
  J:\awww\www\fwphp\glomodul4\help_sw\test\bootstrap\
  http://dev1:8083/fwphp/glomodul4/help_sw/test/bootstrap/
--> */
$module_arr = [ // MODULE IS FOLDER bootstrap !!
  // J:/awww/www/fwphp/glomodul4/help_sw/test/bootstrap/ :
    'module_path'     => str_replace('\\','/', dirname(__DIR__).'/')
] ;
require '../inc_adresses.php' ;
require '../inc_hdr_ftr.php' ;
hdr_pge($module_arr, 'Blog Admin Area', '/'.$module_arr['module_relpath'].'/04blog/style.css');
?>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
      <a href="index.php" class="navbar-brand">Blog</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="<?=$module_arr['site_url']?>" class="nav-link">HomeSite</a>
          </li>
          <li class="nav-item px-2">
            <a href="posts.php" class="nav-link">Posts</a>
          </li>
          <li class="nav-item px-2">
            <a href="categories.php" class="nav-link">Categories</a>
          </li>
          <li class="nav-item px-2">
            <a href="users.php" class="nav-link">Users</a>
          </li>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown mr-3">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-user"></i> Welcome Brad
            </a>
            <div class="dropdown-menu">
              <a href="profile.php" class="dropdown-item">
                <i class="fa fa-user-circle"></i> Profile
              </a>
              <a href="settings.php" class="dropdown-item">
                <i class="fa fa-gear"></i> Settings
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link">
              <i class="fa fa-user-times"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1> Post One</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-3 mr-auto">
          <a href="index.php" class="btn btn-light btn-block">
            <i class="fa fa-arrow-left"></i> Back To Dashboard
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-success btn-block">
            <i class="fa fa-check"></i> Save Changes
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-danger btn-block">
            <i class="fa fa-remove"></i> Delete Post
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- POSTS -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Edit Post</h4>
            </div>
            <div class="card-body">
              <form>
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" value="Post One">
                </div>
                <div class="form-group">
                  <label for="title">Category</label>
                  <select class="form-control">
                    <option value="">Web Development</option>
                    <option value="">Tech Gadgets</option>
                    <option value="">Business</option>
                    <option value="">Health & Wellness</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="file">Image Upload</label>
                  <input type="file" class="form-control-file">
                  <small class="form-text text-muted">Max Size 3mb</small>
                </div>
                <div class="form-group">
                  <label for="body">Body</label>
                  <textarea name="editor1" class="form-control">aaabbb Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur vel aliquam a commodi eligendi, esse quos perspiciatis, quas aliquid voluptates iure. Voluptatibus nisi iste voluptatum maxime dicta quisquam, nihil id!</textarea>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="conatiner">
      <div class="row">
        <div class="col">
          <p class="lead text-center">Copyright &copy; 2017 Blog</p>
        </div>
      </div>
    </div>
  </footer>


  <!--script src="../js/jquery.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script-->
  <!--script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script-->

  <?php ftr_pge($module_arr, 'jquery.min.js', '/'.$module_arr['module_relpath'].'/navbar-fixed.js'); ?>

  <script>
      //CKEDITOR.replace( 'editor1' );
  </script>
</body>
</html>
