<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_model\Post_db.php was PostMapper.php

namespace ModelMapper;

use CoreDB\Global_db_intf,
    Model\PostInterface,
    Model\Post;

class Post_db extends AbstractDataMapper implements Post_db_intf
{
    protected $Comment_db;
    protected $entityTable = "posts";

    public function __construct(
        Global_db_intf $globdb_obj    // extend its abstract parent,
      , Comment_db_intf $commendb_obj // injects in the constructor a comment mapper, to handle in sync both posts and comments without revealing to the outside world the complexities of creating the whole object graph. SUPPOSING ANONYMOUS USERS MAY NOT COMMENT !
    ) 
    {
      //params: G lobal_db_intf $a dapter, C omment_db_intf $c ommenMapper
        $this->Comment_db = $commendb_obj;
        parent::__construct($globdb_obj);
    }

    public function cc(PostInterface $post) {
        $post->_id = $this->globdb_obj->cc(
            $this->entityTable,
            array("title"   => $post->title,
                  "summary" => $post->summary));
        return $post->id;
    }

    public function dd($id) {
        if ($id instanceof PostInterface) {
            $id = $id->id;
        }

        $this->globdb_obj->dd($this->entityTable, "id = $id");
        return $this->Comment_db->dd("id = $id");
    }

    protected function newrow_obj(array $row) {
        $comments = $this->Comment_db->findAll(
            array("post_id" => $row["id"]));
        return new Post($row["title"], $row["summary"], $comments);
    }
}
