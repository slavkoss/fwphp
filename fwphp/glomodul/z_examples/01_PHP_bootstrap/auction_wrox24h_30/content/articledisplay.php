<?php
/**
 * articledisplay.php
 *
 * Display the Article 
 *
 * @version    1.2 2011-02-03
 * @package    Smithside Auctions
 * @copyright  Copyright (c) 2011 Smithside Auctions
 * @license    GNU General Public License
 * @since      Since Release 1.0
 */

$id = (int) $_GET['id'];
// Get the existing information for an existing item
$item = Article::getArticle($id);
if ($item) :
?>
<h1><?php echo htmlspecialchars($item->getTitle()); ?></h1>

<div>
 <?php echo strip_tags(nl2br($item->getText()), 
   "<p><br><h2><h3><h4><strong><em><ul><ol><li><a>"); ?>
</div>
<?php endif;?>