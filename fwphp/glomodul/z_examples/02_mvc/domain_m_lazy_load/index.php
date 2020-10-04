<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_m_lazy_load\index.php
// https://www.hashbangcode.com/article/lazy-instantiation-php

// Lazy instantiation (also known as lazy load) OO design pattern
//        CREATING OBJECTS WHEN THEY ARE NEEDED

require 'Admins.php';
require 'Posts.php';

echo '<h2>Master - Detail</h2>';

echo '<h3>Set ($admin = new Admins(\'111\')) / Get (var_dump($admin)) one row Master data - only id (from DB)</h3>' ;
$admin = new Admins('111');
echo '<pre>var_dump($admin)='; var_dump($admin); echo '</pre><br />';
echo '<pre>print_r($admin->id)='; print_r($admin->id); echo '</pre><br />';

echo '<h3>Set (Get) / Get print_r($admin)() rows Details of Master (from DB)</h3>' ;
$posts = $admin->posts ; //$posts = $admin->set_posts();
echo '<pre>print_r($admin)='; print_r($admin); echo '</pre><br />';


echo '<h3>Get one Master - Detail 1 rows</h3>' ;
//echo '<pre>$posts='; print_r($admin->posts); echo '</pre><br />'; //private !!!
echo '<pre>PRIVATE !!! : $admin->get_post(1)='; print_r($admin->get_post(1)); echo '</pre><br />'; //private !!!



/*foreach ($admin as $adm) {
    $adm->load('posts');
    echo $users->posts()->count();
} */




//Lazy instantiation (or lazy load) is object orientated design pattern that attempts to reduce the amount of resources needed to load an application by only loading certain parts of it if they are needed. 

//Lazy instantiation allows you to only load posts when it is called for.