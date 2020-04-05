<?php
/**
 * articledisplay.php
 */

$id = (int) $_GET['id'];
// Get the existing information for an existing post
$post = Article::getArticle($id);

if ($post) : ?>

<h1><?php echo htmlspecialchars($post->getTitle()); ?></h1>

<div>
<?php
  echo strip_tags(
      nl2br($post->getText())
    , "<p><br><h2><h3><h4><strong><em><ul><ol><li><a>"
  );
?></div><?php

endif; ?>

<hr />
<span style="font-size:small;"><?=__FILE__?></span>
