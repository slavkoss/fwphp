<?php
//namespace B12phpfw ;

interface UserInterface {
    public function register($username,$email,$password);
    public function login($username,$password);
    public function logout();
}