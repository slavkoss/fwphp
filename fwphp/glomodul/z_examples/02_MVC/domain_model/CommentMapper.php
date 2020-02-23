<?php
namespace ModelMapper;

use LibraryDatabase\DatabaseAdapterInterface,
    Model\CommentInterface,
    Model\Comment;

class CommentMapper extends AbstractDataMapper implements CommentMapperInterface
{
    protected $userMapper;
    protected $entityTable = "comments";

    public function __construct(DatabaseAdapterInterface $adapter,
        UserMapperInterface $userMapper) {
        $this->userMapper = $userMapper;
        parent::__construct($adapter);
    }

    public function insert(CommentInterface $comment, $postId, 
        $userId) {
        $comment->id = $this->adapter->insert($this->entityTable, 
            array("content" => $comment->content,
                  "post_id" => $postId,
                  "user_id" => $userId));
        return $comment->id;
    }

    public function delete($id) {
        if ($id instanceof CommentInterface) {
            $id = $id->id;
        }

        return $this->adapter->delete($this->entityTable,
            "id = $id");
    }

    protected function createEntity(array $row) {
        $user = $this->userMapper->findById($row["user_id"]);
        return new Comment($row["content"], $user);
    }
}
