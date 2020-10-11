<?php

namespace App\Post\Infrastructure;

use App\Domain\Post\Post;
use App\Domain\Post\PostRepositoryInterface;

class ArrayPost implements PostRepositoryInterface {
  public function create( Post $post ) {
    return $post;
  }
}
