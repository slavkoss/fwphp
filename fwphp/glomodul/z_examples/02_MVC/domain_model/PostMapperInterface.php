<?php
namespace ModelMapper;

use Model\PostInterface;

interface PostMapperInterface
{
   public function findById($id);
   public function findAll(array $conditions = array());

   public function insert(PostInterface $post);
   public function delete($id);
}
