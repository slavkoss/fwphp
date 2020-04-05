<?php

/*
 * Every class derriving from Model has access to $this->db
 * $this->db is a PDO object
 * Has a config in /core/config/database.php
 */
class Example extends Model {

    function exampleMethod () {
        //$stmt = $this->db->prepare();
        return true;
    }

}

?>