<?php
namespace ModelMapper;

use Model\CommentInterface;

interface CommentMapperInterface
{
    public function findById($id);
    public function findAll(array $conditions = array());

    public function insert(CommentInterface $comment, $postId,
        $userId);
    public function delete($id);
}
