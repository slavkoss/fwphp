<?php
// J:\awww\www\fwphp\glomodul\mkd\home.php

//      L I S T  OF D I R S & T X T S  TO  M K D  E D I T

                        if(''){ echo '<h2>' .'lin='. __LINE__ .' *** '.__FILE__ .' SAYS *** šđčćž</h2>';
                        //echo '<br />'.'$ctr_ ordno='.$ctr_ ordno .'=...' ;
                        if (isset($_GET)) {print '<br />$_GET='; echo '<pre>'; print_r($_GET); echo '</pre>';
                        } echo '<br />'; }
      /**
      *      1. H D R  -  D I S P L A Y  T O P  L I N K S  (none here)
      */
?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1 shrink-to-fit=no">
  <title><?=$title?></title>
  
  <!--link rel="stylesheet" h ref="/zinc/themes/bootstrap/css/bootstrap.min.css"-->
  <link rel="stylesheet" href="/zinc/themes/flex_2cols.css">
</head>


<body>

<!--
  2.  m a i n  - container for a r t i c l e  &  a s i d e  (flex_2cols.css)
-->
<main>

  <!-- 
      2.1 m a i n . a r t i c l e 
  -->
  <article>
    <?php
      /**
      *   D I S P L A Y  M O D E L  D A T A  - DIRS AND FILES
      *   (GUI BLOCK) - LIST OF FILES LIKE IN lsweb M O D U L E
      */
      include_once $pp1->module_path . 'model.php';
      if (isset($data)) {
        foreach($data as $htmlline) { echo $htmlline; } 
      } ?>


<?php include $pp1->wsroot_path . 'zinc/ftr.php'; ?>


  </article><!-- e n d  m a i n . a r t i c l e -->







  <!-- 
       2.2 m a i n . a s i d e  right column for links...
           J:\awww\www\readme.md
  -->
  <aside>
      Side mnu important links (modules)...

      <!-- http://sspc2:8083/fwphp/glomodul/mkd/?i/edit/path/J:\awww\www\readme.md -->
      <br /><br /><a target="_blank" href="<?=$pp1->edit . $pp1->readme_path?>"
         title="<?=$pp1->edit . $pp1->readme_path?> = SimpleMDE edit"
      >Edit readme.md
      </a>

      <!-- http://sspc2:8083/fwphp/glomodul/mkd/?i/showhtml/path/J:\awww\www\readme.md -->
      &nbsp; <a target="_blank" href="<?=$pp1->showhtml . $pp1->readme_path?>" 
         title="<?=$pp1->showhtml . $pp1->readme_path?> = Parsedown markdown txt to html"
      >HTML</a>



      <br /><br /><br /><hr />
        <b>path key</b> (in any URL, not only in mkd module - <b>example below</b>) MUST BE <u>Windows path</u>, which, where needed, we later change in Linux path.
        <br /><br />path key must be <u>last key</u> or delimited with something...(lot of not needed coding, see code_snippets.php in more folders).


      <pre>
You can edit any txt using URL query "i/edit/path/J:\awww\www\readme.md" like this:
<br />http://sspc2:8083/fwphp/glomodul/mkd/?i/edit/<b>path</b>/J:\awww\www\readme.md

You can display any markdown txt using URL like this:
<br />http://sspc2:8083/fwphp/glomodul/mkd/?i/showhtml/<b>path</b>/J:\awww\www\readme.md</pre>



      <p>
         &nbsp;
      </p>


  <pre>
    _.-'''''-._
  .'  _     _  '.
 /   (o)   (o)   \
|        &copy;        |
| Slavko Srakočić |
 \  '. Zagreb.'  /
  '.  ''---''  .'
    '-._____.' 
 </pre>

  </aside><!-- e n d  m a i n . a s i d e  right column for links -->




</main><!-- e n d  m a i n  - container for a r t i c l e  &  a s i d e -->
</body>
</html