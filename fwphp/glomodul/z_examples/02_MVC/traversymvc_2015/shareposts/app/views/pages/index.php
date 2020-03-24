<?php require APPROOT . '/views/inc/header.php'; ?>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-3"><?php echo $data['title']; ?></h1>
      <p class="lead"><?php echo $data['description']; ?></p>
    </div>
  </div>

<?php
                  if ('1') {  //if ($module_ arr['dbg']) {
                    echo '<h2>'.__FILE__ .'() '.', line '. __LINE__ .' SAYS: '.'</h2>'
                    .' ~~~~~~~~~~~~~~~~~~~~~~~~~~~~'; 
                  echo '<pre>';
                  echo '<b>$_ GET</b>='; print_r($_GET); 
                  echo '<b>$_POST</b>='; print_r($_POST); 
                  echo '<b>$_SESSION</b>='; print_r($_SESSION); 
                  echo '<br /><b>$_SERVER[\'REQUEST_URI\']</b>    ='; print_r($_SERVER['REQUEST_URI']); 
                  //echo '<br /><b>$url='; print_r($url);
                  echo '</pre>'; 
                  }
require APPROOT . '/views/inc/footer.php';
?>