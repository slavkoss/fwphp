<?php
/**
 * lots.php
 *
 * Content for Lots pages
 *
 * @version    1.2 2011-02-03
 * @package    Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
// Get the Category 
$cat_id_in = (int) $_GET['cat_id'];
$category = Category::getCategory($cat_id_in);
// Get the lot information
$lots = Lot::getLots($cat_id_in);
if (empty($lots)) {
  $lots = array();
}
$accessLevel = Contact::accessLevel();
?>
<h1>Product Category: <?php echo $category->getCat_name(); ?>
  <?php if ($accessLevel == 'Admin') : ?>
    <a class="button" 
      href="index.php?content=lotmaint&cat_id=<?php echo $cat_id_in; ?>&lot_id=0">
      Add</a>
  <?php endif; ?>   
</h1>

<ul class="ulfancy">
   
  <?php foreach ($lots as $i=>$lot) : ?>
    <li class="row<?php echo $i % 2; ?>">           
      <div class="list-photo">
        <?php // Set up the images
        $image = '/zinc/img/img_big/auction/'. $lot->getLot_image(); 
        
        $image_t = '/zinc/img/img_big/auction/thumbnails/'. $lot->getLot_image(); 
        //if (!is_file($image_t)) : 
        //  $image_t = '/zinc/img/img_big/auction/thumbnails/nophoto.jpg';
        //endif;

        if (is_file($image)) : 
        ?>
          <a href="<?php echo $image; ?>">
          <img src="<?php echo $image_t; ?>"  alt="" />
          </a>
        <?php else : ?>
          <img src="<?php echo $image_t; ?>"  alt="" />
        <?php endif; ?>
      </div>      
      <div class="list-description">
        <h2><?php echo ucwords($lot->getLot_name()); ?></h2>
        <p><?php echo htmlspecialchars($lot->getLot_description()); ?></p>
        <p><strong>Lot:</strong> #<?php echo $lot->getLot_number(); ?> 
          <strong>Price:</strong> $<?php echo number_format($lot->getLot_price(),2); ?>
          <?php if ($accessLevel == 'Admin') : ?>
          <a class="button edit" 
          href="index.php?content=lotdelete&cat_id=<?php echo $cat_id_in; ?>&lot_id=<?php echo $lot->getLot_id(); ?>">Delete
          </a>
          <a class="button edit" 
            href="index.php?content=lotmaint&cat_id=<?php echo $cat_id_in; ?>&lot_id=<?php echo $lot->getLot_id(); ?>">Edit
          </a>
          <?php endif; ?>
          </p>
      </div>      
      <div class="clearfloat"></div>
    </li>
<?php endforeach; ?>

</ul>

<hr />
<span style="font-size:small;"><?=__FILE__?></span>