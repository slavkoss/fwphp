<?php

namespace Model;

class User extends AbstractEntity implements UserInterface
{
    protected $_id;
    protected $_username;
    protected $_email;
    protected $_url;

    public function __construct($name, $email, $url = null) {
        // map user fields to the corresponding mutators
        $this->setName($name);
        $this->setEmail($email);
        if ($url !== null) {
            $this->setUrl($url);
        }
    }

    public function setId($id) {
        if ($this->_id !== null) {
            throw new BadMethodCallException(
                "The ID for this user has been set already.");
        }

        if (!is_int($id) || $id < 1) {
            throw new \InvalidArgumentException("The user ID is invalid.");
        }

        $this->_id = $id;
        return $this;
    }

    public function getId() {
        return $this->_id;
    }

    public function setName($name) {
        if (strlen($name) < 2 || strlen($name) > 30) {
            throw new \InvalidArgumentException("The user name is invalid.");
        }

        $this->_username = htmlspecialchars(trim($name), ENT_QUOTES);
        return $this;
    }

    public function getName() {
        return $this->_username;
    }

    public function setEmail($email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException("The user email is invalid.");
        }

        $this->_email = $email;
        return $this;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function setUrl($url) {
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException("The user URL is invalid.");
        }

        $this->_url = $url;
        return $this;
    }

    public function getUrl() {
        return $this->_url;
    }
}
