<?php
interface PostRepository
{
public function byId(PostId $id);
public function add(Post $post);
}