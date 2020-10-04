<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_model\Comment_db_intf.php was CommentMapperInterface.php
namespace ModelMapper;

use Model\CommentInterface;

interface Comment_db_intf
{
    //public function findById($id);
    //public function findAll(array $conditions = array());

    public function cc(CommentInterface $comment, $postId, $userId);
    public function dd($id);
}
