<!doctype html>
<html lang="en" data-theme="dark">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	  <title>Blog5</title>

    <meta name="description" content="A classic company or blog layout with a sidebar. Built with Pico CSS.">
    <link rel="shortcut icon" href="https://picocss.com/favicon.ico">
    <link rel="canonical" href="https://picocss.com/examples/company/">

    <!-- CSS
    –––––––––––––––––––––––––––––––––––––––––––––––––– -->
     <!-- Pico.css custom build with Bootstrap grid -->
    <!--link rel="stylesheet" href="/vendor/b12phpfw/themes/picocss/pico-bootstrap-grid.min.css"-->
    <!-- Picocss -->
    <link rel="stylesheet" href="/vendor/b12phpfw/themes/picocss/pico.min.css">
    <!--link rel="stylesheet" href="https://unpkg.com/@picocss/pico@latest/css/pico.min .css"-->

    <!-- Custom styles for this example -->
    <link rel="stylesheet" href="index_Company.css">


    <script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>
  </head>

<body>

  <!-- Hero -->
  <div class="hero" data-theme="dark">

    <nav class="container-fluid">
        <ul>
          <li><a href="./" class="contrast" onclick="event.preventDefault()"><strong>Brand</strong></a></li>
        </ul>


        <ul>
          <!--li><a href="#" class="contrast" data-theme-switcher="auto">Auto</a></li-->
          <li><a class="contrast" href="index.php">Home</a></li>
          <!--li><a href="#" class="contrast" data-theme-switcher="light">Light</a></li>
          <li><a href="#" class="contrast" data-theme-switcher="dark">Dark</a></li-->
          &nbsp; &nbsp; &nbsp; 
          <li><a class="contrast" href="add.php">Add Post</a></li>
          <li><a class="contrast" href="dashboard.php">Dashboard</a></li>
          <?php if(!empty($_SESSION['username'])){ ?>
             <li><a class="contrast" href="logout.php">Logout</a></li>
          <?php }else{  ?>
             <li><a class="contrast" href="login.php">Login</a></li>
          <?php  } ?>


        </ul>
    </nav>



    <!--header class="container">
        <hgroup>
          <h1>Blog 5</h1>
          <h2>A classic company or blog layout with a sidebar, usr:john pasw:john123</h2>
        </hgroup>
    </header-->
        <!--p><a href="#" role="button" onclick="event.preventDefault()">Call to action</a></p-->


  </div><!-- ./ Hero -->

