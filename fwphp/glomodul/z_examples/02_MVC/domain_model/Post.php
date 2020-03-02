<?php
// J:\awww\www\fwphp\glomodul\z_examples\02_mvc\domain_model\Post.php
// https://www.sitepoint.com/building-a-domain-model/
namespace Model;
//modelling a blog post as a POPO (Plain Old PHP Object)
//subclassing a parent - subclasses that wrap domain object :
class Post extends AbstractEntity implements PostInterface
{
    protected $_id;
    protected $_title;
    protected $_summary; // was _content

    protected $_comments;

    public function __construct($title, $content, array $comments = array()) {
        // map post fields to the corresponding mutators
        $this->setTitle($title);
        $this->setContent($content);
 
        if ($comments) {
            $this->setComments($comments);
        }
    }

    public function setId($id) {
        if ($this->_id !== null) {
            throw new BadMethodCallException(
                "The ID for this post has been set already.");
        }
 
        if (!is_int($id) || $id < 0) {
            throw new \InvalidArgumentException("The post ID $id is invalid.");
        }
 
        $this->_id = $id;
        return $this;
    }

    public function getId() {
        return $this->_id;
    }

    public function setTitle($title) {
        if (!is_string($title)
            || strlen($title) < 2
            || strlen($title) > 100) {
            throw new \InvalidArgumentException("The post title is invalid. Must be string, >=2 chars, <=100 chars");
        }
 
        $this->_title = htmlspecialchars(trim($title), ENT_QUOTES);
        return $this;
    }

    public function getTitle() {
        return $this->_title;
    }
    
    public function setContent($content)
    {
        if (!is_string($content) || strlen($content) < 2) {
            throw new \InvalidArgumentException("The post content is invalid.");
        }
 
        $this->_summary = htmlspecialchars(trim($content), ENT_QUOTES); // _content
        return $this;
    }
    
    public function getContent() {
        return $this->_summary;
    }
    
    public function setComments(array $comments) {
        foreach ($comments as $comment) {
            if (!$comment instanceof CommentInterface) {
                throw new \InvalidArgumentException(
                    "One $comment or more comments are invalid.");
            }
        }
 
        $this->_comments = $comments;
        return $this;
    }
    
    public function getComments() {
        return $this->_comments;
    }


}

/*
Often, simple PHP Domain Models are composed of a few POPOs (Plain Old PHP Objects), which encapsulate rich business logic, like validation and strategy, behind a clean API.

Modelling a blog post as a POPO 
1) implementing methods defined by its associated interface
2) optionally extending base entity class functionality

Post is capable of validating itself through its mutators, thus carrying both data and behavior, there’s no need to pollute appl logic with scattered validation blocks. This vaccinates the whole model against anemic issues and makes it much cleaner and DRYer. See :
https://martinfowler.com/bliki/AnemicDomainModel.html

*/
