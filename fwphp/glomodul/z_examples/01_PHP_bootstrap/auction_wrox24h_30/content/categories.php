<?php
/**
 * categories.php
 *
 * Content for Categories page
 *
 * @version    1.2 2011-02-03
 * @package    Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
// Get the category information
$items = Category::getCategories();
if (empty($items)) {
  $items = array();
}
$accessLevel = Contact::accessLevel();
?>
<h1>Categories
  <?php if ($accessLevel == 'Admin') : ?>
    <a class="button" href="index.php?content=categorymaint&cat_id=0">Add</a>
  <?php endif; ?>
</h1>

<ul class="ulfancy">

  <?php foreach ($items as $i=>$item) : ?>
  <li class="row<?php echo $i % 2; ?>">
    
      <?php // Set up the images
        $image = '/zinc/img/img_big/auction/'. $item->getCat_image(); 
          //if (!is_file($image)) {
          //  $image = '/zinc/img/img_big/auction/nophoto.jpg';
          //}
        
        $image_t = '/zinc/img/img_big/auction/thumbnails/'. $item->getCat_image(); 
          //if (!is_file($image_t)) { 
          //  $image_t = '/zinc/img/img_big/auction/thumbnails/nophoto.jpg';
          //}
      ?>
    <div class="list-photo">
      <a href="<?php echo $image; ?>">
      <img alt="" src="<?php echo $image_t; ?>"/></a>
    </div>
    <div class="list-description">
      <h2><a href="index.php?content=lots&cat_id=<?php echo (int) $item->getCat_id(); ?>&amp;sidebar=catnav">
      <?php echo htmlspecialchars($item->getCat_name()); ?></a></h2>  
      <p><?php echo htmlspecialchars($item->getCat_description()); ?></p>
      <a class="button display" 
      href="index.php?content=lots&cat_id=<?php echo (int) $item->getCat_id(); ?>&amp;sidebar=catnav">Display Lots</a>
      <?php if ($accessLevel == 'Admin') : ?>
        <a class="button edit" 
          href="index.php?content=categorydelete&cat_id=<?php echo 
          $item->getCat_id(); ?>">Delete</a>      
        <a class="button edit" 
          href="index.php?content=categorymaint&cat_id=<?php 
          echo $item->getCat_id(); ?>">Edit</a>
      <?php endif; ?>
    </div>
    <div class="clearfloat"></div>
  </li>
  <?php endforeach; ?>
</ul>
