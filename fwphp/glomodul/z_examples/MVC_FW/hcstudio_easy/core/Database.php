<?php
namespace Core;

class Database
{
    public static function connection($config)
    {
        try {
            return new \PDO($config['dsn'], $config['username'], $config['password']);
                         //if (DEBUG)  { 
                                echo '<pre>'; 
                                  print_r('Method '. __METHOD__ .' SAYS :<br>Connected to $config=');
                                  print_r($config);
                                echo '</pre>';
                                exit(0);
                          //}
        } catch (\PDOException $e) {
            if (DEBUG) {
                echo "Error!: " . $e->getMessage() . "</div>";
            } else {
                echo 'Failed to connect to database';
            }

            die();
        }
    }
}
