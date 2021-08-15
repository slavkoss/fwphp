<?php
/**

 */
?>
<h1>Categories and products (things) with pictures</h1>
<p></p>
<br />

<p>DB tables are :</p>
<ol>
  <li><strong>menus</strong>(#id, title, link, level, orderby) - menu items properties</li>
  <li><strong>categories</strong>(#cat_id, cat_name, cat_description, 
  cat_image). We prefix picture name with eg $path_rel_img = '/zinc/img/'; // 
  relative path, <br>so if (!is_file($image)) does not work !</li>
  <li><strong>lots</strong> (things, products)</li>
  <li><strong>contacts</strong> (users which can login/logout) </li>
  <li><strong>posts</strong> (articles - blog functionality) - two preinserted posts :<br>
  &quot;Terms of Use&quot; and &quot;Privacy Policy&quot;</li>
</ol>

<hr />
<span style="font-size:small;"><?=__FILE__?></span>
