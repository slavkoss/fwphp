<?php
  class User {
    public $name;
    public $age;
    //static attribute is same for all class instances :
    public static $minPassLength = 6;
    //no need to instantiate class to access static method :
    public static function validatePass($pass){
      if(strlen($pass) >= self::$minPassLength){
        return true; } else { return false; }
    }
  }

  $password = 'hello1';
  if(User::validatePass($password)){
    echo 'Password valid'; } else { echo 'Password NOT valid'; }