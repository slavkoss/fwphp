<?php
/**
 * catnav.php
 *
 * Menu for the categories
 *
 * @version    1.2 2011-02-03
 * @package    Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */ 
$items = Category::getCategories();
?>
<h3 class="element-invisible">Lot Categories</h3>
<ul class="catnav">
  <?php foreach ($items as $i=>$item) : ?>
	<li><a href="index.php?content=lots&cat_id=<?php echo 
	  (int) $item->getCat_id(); ?>&sidebar=catnav"><?php echo 
	  htmlspecialchars($item->getCat_name()); ?></a></li>	
  <?php endforeach; ?>
</ul>
