<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\iPostRepo.php
namespace Post\Domain\ha_posts_pauptit;

interface iPostRepo
{
    public function create(Post $post);
}