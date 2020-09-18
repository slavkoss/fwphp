<?php
// Load Config
require_once '../config.php';
  
// Load Helpers
require_once '../Helper.php'; //  ../core/Helper.php

// Autoload Core Classes
spl_autoload_register(function ($className) {
    //require_once ".." . DS . "core" . DS . $className . ".php";
    require_once ".." . DS . $className . ".php";
});
