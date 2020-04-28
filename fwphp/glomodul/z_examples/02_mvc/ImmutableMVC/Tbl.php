<?php
namespace JokeModule; // namespace JokeList;
class Tbl { // View
  //public function output(\JokeSite\JokeList $model): string {
  public function output($model): string
  {
    ob_start();
    ?>
    <p><a href="index.php?route=edit">Add new joke</a></p>
    <form action="" method="get">
        <input type="hidden" value="filterList" name="route" />
        <input type="hidden" value="<?=$model->getSort()?>" name="sort" />
        <input type="text"  placeholder="Enter search text" name="search" />

        <input type="submit" value="submit" />
      </form>

      <!-- http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/ImmutableMVC/index.php?route=filterList&sort=newest -->
      <p>Sort: <a href="index.php?route=filterList&amp;sort=newest">Newest first</a> | <a href="index.php?route=filterList&amp;sort=oldest">Oldest first</a>
      <ol>
    <?php
    foreach ($model->getJokes() as $joke)
    { ?>
      <li><?=$joke['title']?>
      <a href="index.php?route=edit&amp;id=<?=$joke['id']?>">Edit</a>

      <form action="index.php?route=delete" method="POST">
        <input type="hidden" name="id" value="<?=$joke['id']?>" />

        <input type="submit" value="Delete" />
      </form>
      </li>
      <?php
    } ?>

    </ol>
    <?php
    $output = ob_get_contents();
    ob_end_clean();

    return $output;

  }
}
