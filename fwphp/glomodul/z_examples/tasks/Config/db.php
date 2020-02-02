<?php
// single access point to our database (singleton class).
class Database
{
    private static $bdd = null;

    private function __construct() {
    }

    public static function getBdd() {
        if(is_null(self::$bdd)) {
            //self::$bdd = new PDO("mysql:host=localhost;dbname=todo_php", 'root', '');
            self::$bdd = new PDO("mysql:host=localhost;dbname=tema", 'root', ''
              , [
                   PDO::ATTR_PERSISTENT => true
                 , PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                 , PDO::ATTR_ORACLE_NULLS  => PDO::NULL_TO_STRING
              ]
            );
        }
        return self::$bdd;
    }
}
?>