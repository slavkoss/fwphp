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
            <a href="categories.php" class="nav-link active">Categories</a>
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

  <header id="main-header" class="py-2 bg-success text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-folder"></i> Categories</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6 ml-auto">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-success">Search</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CATEGORIES -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Msgs Categories</h4>
            </div>
            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th><th>Categorie Edit</th><th>Del</th><th>id</th>
                </tr>
              </thead>
              <tbody>
                              <!--tr>
                                <td scope="row">1</td>
                                <td>Web Development, Tech Gadgets, Business, Health & Wellness</td>
                                <td>July 12, 2017</td>
                              </tr-->
        <?php require_once 'dbconfig.php';
        // 0        1           2              3              4
        $stmt = $db_con->prepare("SELECT 
        eventtype_id, eventtype_name FROM eventtype ORDER BY eventtype_name
        ");
        $stmt->execute();
        
        $ii=0; while($row=$stmt->fetch(PDO::FETCH_NUM)) // FETCH_ASSOC, FETCH_OBJ...
        {
          ?>
          <tr>
          <!--# ed Type Del id-->
          <!--#-->
          <td scope="row"><?php echo ++$ii; ?></td>

          <!-- 1 User-->
          <!-- ed    td align="center" -->
          <td>  <a href="update.php?eid=<?php echo $row[0]; ?>"
                title="Edit"><?php echo $row[1]; ?>
                </a></td>

          <!-- Del -->
         <td align="center"><a href="delete.php?id=<?php echo $row[0]; ?>" 
              title="Delete"><img src="/zinc/img/delete.png" width="20px" />
                </a></td>
          <!-- 0 id-->
          <td><?php echo $row[0]; ?></td>
          <!--td><?php //echo $row[4]; ?></td-->
          </tr>

          <?php
        }
        ?>




              </tbody>
            </table>

            <nav class="ml-4">
              <ul class="pagination">
                <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
              </ul>
            </nav>
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
