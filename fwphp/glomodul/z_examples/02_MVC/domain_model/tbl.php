<!doctype html>
<html>
 <head>
  <meta charset="utf-8">
  <title>Domain Model in PHP</title>
 </head>

 <body>

  <header>
   <h1>Building a Domain Model in PHP</h1>
  </header>

  <section>
    <ol><?php
      foreach ($posts as $post)
      { ?>
          <li>
            <h2><?php echo $post->title;?></h2>
            <p><?php echo $post->content;?></p> <?php
            if ($post->comments)
            { ?>
              <ol> <?php
                foreach ($post->comments as $comment) 
                { ?>
                  <li>
                   <h3><?php echo $comment->user->name;?> says:</h3>
                   <p><?php echo $comment->content;?></p>
                  </li> <?php
                } ?>
              </ol> <?php
            } ?>
          </li> <?php
      } ?>
    </ol>
  </section>
 </body>
</html>
