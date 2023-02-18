<?php

class BlogReader{

    const READER = 1;
    const MEMBER = 2;
    
    protected $db;
    protected $type;

    public function __construct(){
        
        $this->db = new Database();
        $this->type = BlogReader::READER;
    }    
    
    //Add get Posts From DB() here
    public function getPostsFromDB(){
        $sql = "SELECT * FROM posts ORDER BY id DESC";
        //$sql = "SELECT id, unix_timestamp(post_date) as `post_date`, username, title, post, audience FROM posts WHERE audience <= :audience ORDER BY id DESC";
        
        $values = [[':audience', $this->type]];
        $result = $this->db->queryDB($sql, Database::SELECTALL, []);
        
        if (count($result) == 0)
            return false;
        else
            return $result;

    }
}
