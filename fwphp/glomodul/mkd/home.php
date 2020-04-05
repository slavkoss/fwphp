<?php
// J:\awww\www\fwphp\glomodul\mkd\home.php
//      L I S T  OF D I R S & T X T S  TO  M K D  E D I T
                        if(''){ echo '<h2>' .'lin='. __LINE__ .' *** '.__FILE__ .' SAYS *** šđčćž</h2>';
                        //echo '<br />'.'$ctr_ ordno='.$ctr_ ordno .'=...' ;
                        if (isset($_GET)) {print '<br />$_GET='; echo '<pre>'; print_r($_GET); echo '</pre>';
                        } echo '<br />'; }
      /**
      *           D I S P L A Y  T O P  L I N K S
      */
?>
<!DOCTYPE html>
<html lang="hr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1 shrink-to-fit=no">
  <title><?=$title?></title>
  
  <!--link rel="stylesheet" href="/zinc/themes/bootstrap/css/bootstrap.min.css"-->
  <link rel="stylesheet" href="/zinc/themes/flex_2cols.css">
</head>


<body>
<main><!--2.  m a i n  - container for a r t i c l e  &  a s i d e -->

  <article><!-- m a i n . a r t i c l e -->
    <div>
      You can edit any txt using URL like this: ...?edit=J:\awww\www\fwphp\glomodul\adrs\README.md/
      <br /><a href="<?=$readme_edit_path?>" 
         title="<?=$readme_edit_path?> = SimpleMDE edit">
      Edit readme.md</a>
      &nbsp;
      <a href="<?=$readme_showhtml_path?>" 
         title="<?=$readme_showhtml_path?> = Parsedown markdown txt to html">
      HTML</a>

    </div>


    <?php
      /**
      *   D i s p l a y  m o d e l  d a t a  (GUI BLOCK, LIST OF) FILES
      */
      foreach($data as $htmlline) { echo $htmlline; } ?>
  </article><!-- e n d  m a i n . a r t i c l e -->


  <aside><!-- m a i n . a s i d e  right column for links -->
      Side mnu important links (modules)
      <p>This page - Rich text edit on web</p>
      <p><a href="/<?=$modulglo_rel_path?>mkd/" target="_blank">
         <strong>Mkd - Markdown &amp; Parsedown</strong></a>
      </p>
      &nbsp;<h3>I. Model (PDO)</h3>

      <p>1. CRUD Ora 11g</p>
      <p>&nbsp;<a href="<?=$helpsw_url?>test/todolist/web" target="_blank">Todolist</a> 
      (SQLite)&nbsp;&nbsp; <a href="/<?=$test_rel_path?>/books/ACXE2/" target="_blank">oci8 
      -&gt;PDO ACXE2</a></p>
      <p>&nbsp;<a href="/<?=$test_rel_path?>/books/wishPDO/" target="_blank">wish Ora PDO</a>&nbsp; </p>

      <p>2. CRUD MySQL</p>
      <p>&nbsp;<a href="/<?=$modulglo_rel_path?>msg_share/" target="_blank">
         <strong>MSG SHARE</strong></a> (B12phpfw ver.5)
      </p>
      <p>&nbsp;<a href="/<?=$test_rel_path?>01_MVC_learn/03mini3fw/" target="_blank" 
         title="Excellent, &lt; 75 kB. Simmilar to my B12phpfw. 
         Minuses : too many folders, no module folders but 3 dirs M,V,C.">
         Songs <b>Mini3</b> PDO</a> &nbsp;
      </p>

      <p>&nbsp;</p>
      <h3>II. VIEW</h3>
      <p>
        <a href="<?=$helpsw_url?>test/bootstrap/index.php" target="_blank" 
           title="6 beautiful static Bootstrap projects - templates">Six Bootstrap templates (PHP)</a>
      </p>
      <p>
        <a href="<?=$zbig_url?>bootstrap/index.html" target="_blank" 
           title="6 beautiful static Bootstrap projects - templates">Six Bootstrap templates (HTML)</a>
      </p>

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