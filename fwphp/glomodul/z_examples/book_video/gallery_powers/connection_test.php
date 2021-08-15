<?php
//require_once './includes/connection.php';
require_once 'connection.php';
if ($conn = dbConnect('read')) {
    echo 'Connection successful';
}
