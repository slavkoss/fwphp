<?php
/**
 * categorydelete.php
 *
 * Delete for the Categories table
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

$id = (int) $_GET['cat_id'];
// Get the existing information for an existing item
$item = Category::getCategory($id);

?>
<h1>Category Delete</h1>

<form action="index.php?content=categories" method="post" name="maint" id="maint">

  <fieldset class="maintform">
    <legend><?php echo 'ID: '. $id ?></legend>
    <ul>
    <li><strong>Category:</strong>
      <?php echo htmlspecialchars($item->getCat_name()); ?></li>
    <li><strong>Description</strong><br />
      <?php echo htmlspecialchars($item->getCat_description()); ?></li>
    <li><strong>Image:</strong>
      <?php echo htmlspecialchars($item->getCat_image()); ?></li>
    </ul>
    
    <?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="cat_id" id="cat_id" value="<?php echo $item->getCat_id(); ?>" />
    <input type="hidden" name="task" id="task" value="category.delete" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="delete" value="Delete" />
    <a class="cancel" href="index.php?content=categories">Cancel</a>
  </fieldset>
</form>
<?php endif;