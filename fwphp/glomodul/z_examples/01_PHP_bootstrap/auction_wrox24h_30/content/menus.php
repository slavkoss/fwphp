<?php
/**
 * menus.php
 *
 * Menu items
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
// Get the menu information
$items = Menu::getMenus();

?>
<h1>Menu List
    <a class="button" href="index.php?content=menumaint&id=0">Add</a>
</h1>

<ul class="ulfancy">
  <?php foreach ($items as $i=>$item) : ?>
    <li class="row<?php echo $i % 2; ?>">
      <h2><?php echo htmlspecialchars($item->getTitle()); ?>
        <a class="button" 
          href="index.php?content=menudelete&id=<?php echo $item->getId(); ?>">Delete</a>
        <a class="button" 
          href="index.php?content=menumaint&id=<?php echo $item->getId(); ?>">Edit</a>
      </h2>
      <p><?php echo htmlspecialchars($item->getLink()); ?></p>
    </li>
  <?php endforeach; ?>
</ul>
<?php endif; ?>