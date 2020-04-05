<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_model\Comment_db.php was CommentMapper.php
namespace ModelMapper;

use CoreDB\Global_db_intf,
    Model\CommentInterface,
    Model\Comment;

class Comment_db extends AbstractDataMapper implements Comment_db_intf
{
    protected $User_db;
    protected $entityTable = "comments";

    public function __construct(
       Global_db_intf $globdb_obj, User_db_intf $User_db
    ) 
    {
        $this->User_db = $User_db;
        parent::__construct($globdb_obj);
    }

    //called from get_data...
    public function cc(CommentInterface $comment, $postId, $userId)
    {
        $comment->id = $this->globdb_obj->cc( //lin 164  
            $this->entityTable,
            array("comment" => $comment->comment,
                  "post_id" => $postId,
                  "name"    => $userId //"user_id" => $userId
            )
        );

        return $comment->id;
    }

    public function dd($id) {
        if ($id instanceof CommentInterface) {
            $id = $id->id;
        }

        return $this->globdb_obj->dd($this->entityTable, "id = $id");
    }

    protected function newrow_obj(array $row) {
        //$user = $this->User_db->findById($row["user_id"]);
        $user = $this->User_db->findById($row["name"]);
        return new Comment($row["comment"], $user);
    }
}
