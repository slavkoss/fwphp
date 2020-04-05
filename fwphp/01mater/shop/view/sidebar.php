<div class="sidebar">

  <h2>Links</h2>
  <!-- ************************ -->
  <ol>
    <li><a href="<?php echo $module_relpath . 'cart'; ?>">View Cart</a>
    </li><?php // Check if user is logged in and display appropriate account links
      $account_url = $module_relpath . 'account';
      $logout_url  = $account_url . '?action=logout';
      if (isset($_SESSION['user'])) : ?>
        <li><a href="<?php echo $account_url; ?>">My Account</a></li>
        <li><a href="<?php echo $logout_url; ?>">Logout</a>
      <?php else: ?>
        <li><a href="<?php echo $account_url; ?>">Login/Register</a></li>
      <?php endif; ?>
    <li><a href="<?=$pp1->home?>">Home</a></li>
  </ol>


  <h2>Categories</h2>
  <!-- ************************ -->
  <ol><!-- display links for all categories -->
    <?php
    require_once($module_path .'model/database.php');
    require_once($module_path .'model/category_db.php');

    $categories = get_categories();
    foreach($categories as $category) :
      $name = $category['categoryName'];
      $id   = $category['categoryID'];
      $url  = $module_relpath . 'catalog?category_id=' . $id; ?>
      <li><a href="<?php echo $url; ?>"><?php echo htmlspecialchars($name); ?></a></li>
    <?php endforeach; ?>
  </ol>


  <h2>Temp Link</h2>
  <!-- ************************ -->
  <ol>
    <li><!-- This link is for testing only. Remove it from a production app. -->
        <a href="<?php echo $module_relpath; ?>admin">Admin</a>
    </li>
  </ol>

</div>
