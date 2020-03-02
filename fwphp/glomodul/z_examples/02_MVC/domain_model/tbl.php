<?php
//require 'J:\\awww\\www\\vendor\\erusev\\parsedown\\Parsedown.php' ;
require '../../../../../vendor/erusev/parsedown/Parsedown.php' ;
$Parsedown = new Parsedown();
?>
<!doctype html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Domain Model in PHP</title>
 </head>

 <body>

  <header><h1>Building a Domain Model in PHP</h1></header>

  <section>
    <ol><?php echo '<h3>'. basename(__FILE__) .' SAYS: </h3>' ;
      foreach ($posts as $post)
      { ?>
          <li>
            <?php $title=$post->title ; echo '<h3>'.$title.'</h3>'; //.'$post->title='?>
            <?php $summary=$post->summary ; echo $Parsedown->text($summary); //'$post->summary='.?>

            <?php
            if ($post->comments)
            { ?>
              <br /><ol> <?php
                foreach ($post->comments as $comment) 
                { ?>
                  <li>
                   <b><?php echo $comment->user->username;?></b>
                   <p><?php echo $Parsedown->text($comment->comment);?></p>
                  </li> <?php
                } ?>
              </ol> <?php
            } 
            ?>
          </li> <?php
      } ?>
    </ol>
  </section>
 </body>
</html>
