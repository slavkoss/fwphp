<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_posts_pauptit\PostRepo.php
namespace Post\Infrastr\ha_posts_pauptit;

use Post\Domain\ha_posts_pauptit\iPostRepo;
use Post\Domain\ha_posts_pauptit\Post ;

class PostRepo implements iPostRepo
{
    public $posts = [];

    public function create(Post $post)
    {
        $this->posts[] = $post;

        // Obviously, this is for testing purposes only
        echo "Post with id {$post->id} was created.";
    }
}