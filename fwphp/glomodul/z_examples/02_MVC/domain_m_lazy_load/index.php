<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_m_lazy_load\index.php
// https://www.hashbangcode.com/article/lazy-instantiation-php

//        CREATING OBJECTS WHEN THEY ARE NEEDED

require 'Admins.php';
require 'Posts.php';

$admin = new Admins('111');
echo '<pre>$admin='; print_r($admin); echo '</pre><br />';

$posts = $admin->posts ; //$posts = $admin->set_posts();
echo '<pre>$id='; print_r($admin->id); echo '</pre><br />';
//echo '<pre>$posts='; print_r($admin->posts); echo '</pre><br />'; //private !!!
echo '<pre>PRIVATE !!! : $admin->get_post(1)='; print_r($admin->get_post(1)); echo '</pre><br />'; //private !!!

echo '<pre>$admin='; print_r($admin); echo '</pre><br />';


/*foreach ($admin as $adm) {
    $adm->load('posts');
    echo $users->posts()->count();
} */




//Lazy instantiation (or lazy load) is object orientated design pattern that attempts to reduce the amount of resources needed to load an application by only loading certain parts of it if they are needed. 

//Lazy instantiation allows you to only load posts when it is called for.