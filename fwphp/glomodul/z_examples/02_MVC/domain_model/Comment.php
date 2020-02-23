<?php
namespace Model;

class Comment extends AbstractEntity implements CommentInterface
{
    protected $_id;
    protected $_content;
    protected $_user;

    public function __construct($content, UserInterface $user) {
        $this->setContent($content);
        $this->setUser($user);
    }

    public function setId($id) {
        if ($this->_id !== null) {
            throw new BadMethodCallException(
                "The ID for this comment has been set already.");
        }
 
        if (!is_int($id) || $id < 1) {
            throw new \InvalidArgumentException("The comment ID is invalid.");
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
                "The content of the comment is invalid.");
        }
     
        $this->_content = htmlspecialchars(trim($content), ENT_QUOTES);
        return $this;
    }
    
    public function getContent() {
            return $this->_content;
    }
    
    public function setUser(UserInterface $user) {
        $this->_user = $user;
        return $this;
    }
    
    public function getuser() {
        return $this->_user;
    }
}
