<?php
//$pdo = new PDO('mysql:host=localhost;dbname=ijdb_sample;charset=utf8', 'ijdb_sample', 'mypassword');
$pdo = new PDO('mysql:host=localhost;dbname=z_joke;charset=utf8', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);