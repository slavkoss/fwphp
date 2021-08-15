<?php
/**
 * menumaint.php
 *
 * Maintain the menu list
 *
 * @version    1.2 2011-02-03
 * @package    Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */
$accessLevel = Contact::accessLevel();
if ($accessLevel != 'Admin') :
  echo 'Sorry, no access allowed to this page';
else :

$id = (int) $_GET['id'];
// Is this an existing item or a new one?
if ($id) {
  // Get the existing information for an existing item
  $item = Menu::getMenu($id);
} else {
  // Set up for a new item
  $item = new Menu;
}
  // set up the level dropdown, setting up the selected option for existing records
  $level_dropdown = $item->getLevel_DropDown();
?>
<h1>Menu Maintenance</h1>

<form action="index.php?content=menus" method="post" name="maint" id="maint">

  <fieldset class="maintform">
    <legend><?php echo ($id) ? 'ID: '. $id : 'Add a Menu Item' ?></legend>
    <ul>
      <li><label for="title" class="required">Title</label><br />
        <input type="text" name="title" id="title" class="required" 
        value="<?php echo htmlspecialchars($item->getTitle()); ?>" /></li>
      <li><label for="link" class="required">Link</label><br />
        <input type="text" name="link" id="link" class="required" 
        value="<?php echo htmlspecialchars($item->getLink()); ?>" /></li>
      <li><label for="orderby">Order By</label><br />
        <input type="text" name="orderby" id="orderby" class="required" 
        value="<?php echo (int) $item->getOrderby(); ?>" /></li>
      <li><?php echo $level_dropdown; ?></li>
    </ul>

    <?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="id" id="id" value="<?php echo $item->getId(); ?>" />
    <input type="hidden" name="task" id="task" value="menu.maint" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="save" value="Save" />
    <a class="cancel" href="index.php?content=menus">Cancel</a>
  </fieldset>
</form>
<?php endif; 