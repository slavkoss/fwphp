<?php
/**
 * lotdelete.php
 *
 * Delete for the Lots 
 *
 * @version  1.2 2011-02-03
 * @package  Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license  GNU General Public License
 * @since    Since Release 1.0
 */
$accessLevel = Contact::accessLevel();
if ($accessLevel != 'Admin') :
  echo 'Sorry, no access allowed to this page';
else :

// Save the category so you return to the right lots page
$cat_id_in = (int) $_GET['cat_id'];
// Get the lot id. If it doesn't exist or is 0, then this is a new lot
$id = (int) $_GET['lot_id'];
  // Get the existing information for an existing item
  $item = Lot::getLot($id);
  // get the Category name for the lot
  $cat_name = Category::getCategory($item->getCat_id())->getCat_name();
?>
<h1>Lot Delete</h1>

<form action="index.php?content=lots&cat_id=<?php echo $cat_id_in; ?>&sidebar=catnav" 
  method="post" name="maint" id="maint">

    <fieldset class="maintform">
      <legend><?php echo 'ID: '. $id ?></legend>
      <ul>
        <li><strong>Lot Name: </strong>
          <?php echo htmlspecialchars($item->getLot_name()); ?></li>
        <li><strong>Lot Description: </strong><br />
          <?php echo htmlspecialchars($item->getLot_description()); ?></li>
        <li><strong>Lot Image File: </strong>
          <?php echo htmlspecialchars($item->getLot_image()); ?></li>
        <li><strong>Lot Number: </strong>
          <?php echo (int) $item->getLot_number(); ?></li>
        <li><strong>Lot Price: </strong>
          <?php echo number_format($item->getLot_price(),2); ?></li>
        <li><strong>Category: </strong>
          <?php echo htmlspecialchars($cat_name); ?></li>
      </ul>  
        
    <?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="cat_id_in" id="cat_id_in" 
      value="<?php echo $cat_id_in; ?>" />
    <input type="hidden" name="lot_id" id="lot_id" 
      value="<?php echo $item->getLot_id(); ?>" />
    <input type="hidden" name="task" id="task" value="lot.delete" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="delete" value="Delete" />
    <a class="cancel" 
    href="index.php?content=lots&cat_id=<?php echo $cat_id_in; ?>&sidebar=catnav">Cancel</a>
    </fieldset>
</form>
<?php endif; ?>