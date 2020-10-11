<?php

namespace App\Post\Infrastructure\Persistence;


use App\Post\Domain\Post;
use App\Post\Domain\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface {
  public $posts = [];

  public function create( Post $post ) {
    $this->posts[] = $post;

    echo "Post with id {$post->id} was created.";
  }
}
