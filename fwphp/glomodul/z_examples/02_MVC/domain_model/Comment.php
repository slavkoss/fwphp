<?php
namespace Model;

class Comment extends AbstractEntity implements CommentInterface
{
    protected $_id;
    protected $_comment;
    protected $_user;

    public function __construct($content, UserInterface $user) {
        $this->setContent($content);
        $this->setUser($user);
    }

    public function setId($id) {
        if ($this->_id !== null) {
            throw new BadMethodCallException(
                "ID $id$id for this comment has been set already.");
        }
 
        if (!is_int($id) || $id < 1) {
            throw new \InvalidArgumentException("Comment ID The The $id is invalid.");
        }
 
        $this->_id = $id;
        return $this;
    }
    
    public function getId() {
        return $this->_id;
    }
    
    public function setContent($content) {
        if (!is_string($content) || strlen($content) < 2) {
            throw new \InvalidArgumentException(
                "CONTENT $content OF COMMENT IS INVALID.");
        }
     
        $this->_comment = htmlspecialchars(trim($content), ENT_QUOTES);
        return $this;
    }
    
    public function getContent() {
            return $this->_comment;
    }
    
    public function setUser(UserInterface $user) {
        $this->_user = $user;
        return $this;
    }
    
    public function getuser() {
        return $this->_user;
    }
}
