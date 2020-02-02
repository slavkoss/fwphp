<?php
/**

 */
?>
<h1>Categories - things with pictures. Users login.</h1>
<p>Users login/logout is not working because of autoloading in init.php.</p>
<br />
<p>Menu items properties are rows in DB table menus(#id, title, link, level, orderby). We prefix picture name with eg $path_rel_img = '/zinc/img/'; // relative path, so if (!is_file($image) does not work !</p>
<br />
<p>Pictures properties are rows in DB table categories(#id, name, description, image). We prefix picture name with eg $path_rel_img = '/zinc/img/'; // relative path, so if (!is_file($image) does not work !</p>
<br />
<p>Other DB tables are lots (things, products), contacts (users which can login/logout) and posts (articles - blog functionality !). There are two posts in table articles : "Terms of Use" and "Privacy Policy".</p>