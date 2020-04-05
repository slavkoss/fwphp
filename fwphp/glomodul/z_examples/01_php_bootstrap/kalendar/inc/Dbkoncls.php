<?php
//J:\awww\apl\dev1\04knjige\kalendar\kal\inc\Dbkoncls.php
//declare(strict_types=1); // php 7
/**
 * Database actions (DB access, validation, etc.)    PHP version 7
 */
class Dbkoncls {
    /**
     * Stores db object
     */
    protected $db;
    /**
     * Checks for a DB obj. or C R Eates one if not found
     * no need @param object $dbo db object
     */
    protected function __construct() {
        if ( is_object($this->db) ) { null; }
        else {
            // Constants are defined in inc/dbkon_param.php and in config.php
            $dsn = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
            try {
                $this->db = new PDO($dsn, DB_USER, DB_PASS);
            } catch ( Exception $e )
            { // If the DB c o n nn fails, output the error
                die ( $e->getMessage() );
            }
        }
    }
}

?>