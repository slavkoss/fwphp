<?php
/**
 * articlemaint.php
 *
 * Maintain the Articles table
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
  $item = Article::getArticle($id);
} else {
  // Set up for a new item
  $item = new Article;
}
?>
<h1>Article Maintenance</h1>

<form action="index.php?content=articles" method="post" name="maint" id="maint">

  <fieldset class="maintform">
    <legend><?php echo ($id) ? 'ID: '. $id : 'Add an Article' ?></legend>
    <ul>
      <li><label for="title" class="required">Title</label><br />
        <input type="text" name="title" id="title" class="required" 
        value="<?php echo htmlspecialchars($item->getTitle()); ?>" /></li>
        <li><label for="text" class="required">Text</label><br />
          <textarea rows="30" cols="80" name="text" 
            id="text" class="required"><?php echo 
            strip_tags($item->getText(), 
            "<p><br><h2><h3><h4><strong><em><ul><ol><li><a>"); ?>
          </textarea></li>
    </ul>

    <?php 
    // create token
    $salt = 'SomeSalt';
    $token = sha1(mt_rand(1,1000000) . $salt); 
    $_SESSION['token'] = $token;
    ?>
    <input type="hidden" name="id" id="id" value="<?php echo $item->getId(); ?>" />
    <input type="hidden" name="task" id="task" value="article.maint" />
    <input type='hidden' name='token' value='<?php echo $token; ?>'/>
    <input type="submit" name="save" value="Save" />
    <a class="cancel" href="index.php?content=articles">Cancel</a>
  </fieldset>
</form>
<?php endif; 