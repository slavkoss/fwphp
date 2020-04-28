<?php require APPROOT . '/views/inc/header.php'; ?>
  <div class="jumbotron jumbotron-flud text-center">
    <div class="container">
    <h1 class="display-3"><?php echo $data['title']; ?></h1>
    <p class="lead"><?php echo $data['description']; ?></p>
    <p class="lead"><b><?php echo $data['info']; ?></b></p>
    <p class="lead"><?php echo $data['name']; ?></p>
    <p class="lead"><?php echo $data['location']; ?></p>
    <p class="lead"><?php echo $data['contact']; ?></p>
    <p class="lead"><?php echo $data['mail']; ?></p>
    </div>
  </div> 
<?php require APPROOT . '/views/inc/footer.php'; ?>
