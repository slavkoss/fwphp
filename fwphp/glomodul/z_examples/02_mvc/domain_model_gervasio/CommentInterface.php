<?php
//Outlines behavior of comments.
//Contract which allows to define concrete domain object implementations, as if we were using Lego blocks.
namespace Model;

interface CommentInterface
{
    public function setId($id);
    public function getId();

    public function setContent($content);
    public function getContent();

    //Interface Injection for binding a user to a specific comment :
    public function setUser(UserInterface $user);
    public function getUser();
}