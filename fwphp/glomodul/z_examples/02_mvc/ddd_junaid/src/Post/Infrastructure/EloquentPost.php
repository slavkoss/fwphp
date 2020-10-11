<?php

namespace App\Post\Infrastructure;

use App\Domain\Post\Post;
use App\Domain\Post\PostRepositoryInterface;

class EloquentPost implements PostRepositoryInterface {
  public function create( Post $post ) {
    // TODO: Implement create() method.
  }
}
