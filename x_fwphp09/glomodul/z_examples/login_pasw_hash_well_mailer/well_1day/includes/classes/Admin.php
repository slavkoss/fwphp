<?php

class Admin{
    
    private $db;
    private $username;

    public function __construct($pUsername){
        $this->db = new Database();
        $this->username = $pUsername;
    }


    public function isValidLogin($pPassword){
        $sql = "SELECT password FROM members WHERE username = :username AND is_admin = true";

        $values = array(
            array(':username', $this->username)
        );

        $result = $this->db->queryDB($sql, Database::SELECTSINGLE, $values);

        if (isset($result['password']) && password_verify($pPassword, $result['password']))
            return true;
        else
            return false;

    } 
    
    public function insertIntoPostDB($title, $post, $audience){
        
        
        $sql = "INSERT INTO posts (username, title, post, audience) VALUES (:username, :title, :post, :audience)";

        $values = array(
            array(':username', $this->username),
            array(':title', $title),
            array(':post', $post),
            array(':audience', $audience)
        );

        $this->db->queryDB($sql, Database::EXECUTE, $values);
        
    }
    
}


