<?php
/*<!--
  J:\awww\www\fwphp\glomodul4\help_sw\test\bootstrap\
  http://dev1:8083/fwphp/glomodul4/help_sw/test/bootstrap/
      separate data from resentation
      use single entry point into an application (+ includes instead url calls)
--> */
require $wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/inc_adresses.php' ;
//require '../inc_adresses.php' ;
require $wsroot_path.$path_rel_examples .'01_PHP_bootstrap/bootstrap/inc_hdr_ftr.php' ;
//require '../inc_hdr_ftr.php' ;
hdr_pge($module_arr, 'Bootstrap4', '/'.$module_arr['module_relpath'].'/04blog/style.css');
?>

  <!-- 1. T O P  M N U -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark p-0">
    <div class="container">
      <a href="index.php" class="navbar-brand">Blog</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a href="<?=$module_arr['site_url']?>" class="nav-link active">HomeSite</a>
          </li>
          <li class="nav-item  px-2">
            <a href="../index.php" class="nav-link">HomeModulesGroup</a>
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
              <i class="fas fa-user"></i> Welcome Brad
            </a>
            <div class="dropdown-menu">
              <a href="profile.php" class="dropdown-item">
                <i class="fas fa-user-circle"></i> Profile
              </a>
              <a href="settings.php" class="dropdown-item">
                <i class="fas fa-gear"></i> Settings
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="login.php" class="nav-link">
              <i class="fas fa-user-times"></i> Logout
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 2. H D R -->
  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fas fa-gear"></i> Dashboard</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- 3. T O P  T O O L B A R  = ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addPostModal">
            <i class="fas fa-plus"></i> Add Post (SimpleMDE)
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addCategoryModal">
            <i class="fas fa-plus"></i> Add Category
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-warning btn-block" data-toggle="modal" data-target="#addUserModal">
            <i class="fas fa-plus"></i> Add User
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- 4. T B L  P O S T S -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="card">
          
            <div class="card-header">
              <h4>Latest Posts</h4>
            </div>




            <table class="table table-striped">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>Event Edit</th>
                  <th>Category</th>
                  <th>Date Posted</th>
                  <th>Del</th>
                  <th>id</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                              <!--tr>
                                <td scope="row">1</td>
                                <td>Post One</td>
                                <td>Web Development</td>
                                <td>July 12, 2017</td>
                                <td><a href="details.php" class="btn btn-secondary">
                                  <i class="fa fa-angle-double-right"></i> Edit
                                </a></td>
                              </tr-->
          <?php require_once 'dbconfig.php';
          //user_id, user_name, user_email, registration_date, user_pass
          // 0          1           2              3          4
          $stmt = $db_con->prepare("SELECT 
          event_id, event_title, event_summary, event_start, event_desc, user_id, event_start FROM events ORDER BY event_start DESC
          ");
          $stmt->execute();
          
          $ii=0; while($row=$stmt->fetch(PDO::FETCH_NUM)) // FETCH_ASSOC, FETCH_OBJ...
          {
          ?>
          <tr><!--# ed User Email DateReg Del id-->
          <!--#--><td scope="row"><?php echo ++$ii; ?></td>
          <!-- 1 event_title-->
          <!-- ed    td align="center" -->
          <td>  <a href="update_usr.php?eid=<?php echo $row[0]; ?>"
                title="Edit"><?php echo $row[1]; ?>
                </a></td>
          <!-- 2 event_summary --><td><?php echo $row[2]; ?></td>
          <!-- 3 event_desc--><td><?php   echo $row[3]; ?></td>

          <!-- Del -->
          <td align="center"><a href="delete.php?id=<?php echo $row[0]; ?>" 
              title="Delete"><img src="/zinc/img/delete.png" width="20px" />
                </a></td>
          <!-- 0 id--><td><?php echo $row[0]; ?></td>
          </tr>
          <?php
          }
          ?>






              </tbody>
            </table>
          </div> <!--e n d  div class="card"-->
        </div> <!--e n d  div class="col-md-9"-->


        <div class="col-md-3">
          <div class="card text-center bg-primary text-white mb-3">
            <div class="card-body">
              <h3>Posts</h3>
              <h1 class="display-4">
                <i class="fas fa-pencil"></i> 6
              </h1>
              <a href="posts.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-success text-white mb-3">
            <div class="card-body">
              <h3>Categories</h3>
              <h1 class="display-4">
                <i class="fas fa-folder-open-o"></i> 4
              </h1>
              <a href="categories.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>

          <div class="card text-center bg-warning text-white mb-3">
            <div class="card-body">
              <h3>Users</h3>
              <h1 class="display-4">
                <i class="fas fa-users"></i> 2
              </h1>
              <a href="users.php" class="btn btn-outline-light btn-sm">View</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- 5. F T R -->
  <footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="conatiner">
      <div class="row">
        <div class="col">
          <p class="lead text-center">Copyright &copy; 2018 Blog</p>
        </div>
      </div>
    </div>
  </footer>





  <!-- POST MODAL -->
  <div class="modal fade" id="addPostModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Add Post</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label for="category">Category</label>
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
              <textarea name="editor1" class="form-control"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-primary" data-dismiss="modal">Save Changes</button>
        </div>
      </div>
    </div>
  </div>


  <!-- CATEGORY MODAL -->
  <div class="modal fade" id="addCategoryModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title">Add Category</h5>
          <button class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-success" data-dismiss="modal">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

  <!-- USER MODAL -->
  <div class="modal fade" id="addUserModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Add User</h5>
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
              <input type="email" class="form-control">
            </div>
            <div class="form-group">
              <label for="name">Password</label>
              <input type="password" class="form-control">
            </div>
            <div class="form-group">
              <label for="name">Confirm Password</label>
              <input type="password" class="form-control">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button class="btn btn-warning" data-dismiss="modal">Save Changes</button>
        </div>
      </div>
    </div>
  </div>

<!--script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script    68 kB 85 kB-->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script   20 kB-->
<!--script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script   50 kB-->


<?php ftr_pge($module_arr, 'jquery.min.js', '/'.$module_arr['module_relpath'].'/navbar-fixed.js'); ?>


  <!--script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script-->
  <script>
      //CKEDITOR.replace( 'editor1' );
  </script>

</body></html>
