<?php

abstract class Model {

    protected $db;

    function __construct () {

        global $app;

        $this->db = $app->db;
        
    }

}

?>