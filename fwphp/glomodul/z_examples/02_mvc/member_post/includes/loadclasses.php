<?php

    function myAutoloader($class) {
        include_once INC_DIR.'classes/'.$class.'.php';
    }

    spl_autoload_register('myAutoloader');

