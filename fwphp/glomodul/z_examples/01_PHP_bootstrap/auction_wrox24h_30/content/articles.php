<?php
/**
 * articles.php
 *
 * Content for Articles
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

// Get the article information
$items = Article::getArticles();
if (empty($items)) {
  $items = array();
}
?>
<h1>Articles
    <a class="button" href="index.php?content=articlemaint&id=0">Add</a>
</h1>

<ul class="ulfancy">
  <?php foreach ($items as $i=>$item) : ?>
    <li class="row<?php echo $i % 2; ?>">
      <h2><?php echo htmlspecialchars($item->getTitle()); ?>
        <a class="button" 
          href="index.php?content=articledelete&id=<?php echo $item->getId(); ?>">Delete</a>
        <a class="button" 
          href="index.php?content=articlemaint&id=<?php echo $item->getId(); ?>">Edit</a>
      </h2>
    </li>
  <?php endforeach; ?>
</ul>

<?php endif; ?>