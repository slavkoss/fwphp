<?php
namespace Model;

interface CommentInterface
{
    public function setId($id);
    public function getId();

    public function setContent($content);
    public function getContent();

    public function setUser(UserInterface $user);
    public function getUser();
}