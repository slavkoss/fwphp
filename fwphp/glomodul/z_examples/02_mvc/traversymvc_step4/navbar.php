<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <div class="container">

    <a class="navbar-brand" href="#"><?php echo 'Blog (users, posts)' ; ?></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

     <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo $pp1->module_url; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $pp1->module_url; ?>app/views/pages/about.php">About</a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
      <?php if(isset($_SESSION['user_id'])) : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $pp1->module_url; ?>users/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
        </li>
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $pp1->module_url; ?>users/register">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo $pp1->module_url; ?>users/login">Login</a>
        </li>
      <?php endif; ?>
      </ul>


    </div>
  </div>
</nav>