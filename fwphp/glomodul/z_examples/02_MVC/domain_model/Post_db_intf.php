<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_model\Post_db_intf.php was PostMapperInterface.php
namespace ModelMapper;

use Model\PostInterface;

interface Post_db_intf
{
   //public function findById($id);
   //public function findAll(array $conditions = array());

   public function cc(PostInterface $post);
   public function dd($id);
}