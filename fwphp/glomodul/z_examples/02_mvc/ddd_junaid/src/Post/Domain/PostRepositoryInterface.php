<?php

namespace App\Post\Domain;

interface PostRepositoryInterface {
  public function create( Post $post );
}