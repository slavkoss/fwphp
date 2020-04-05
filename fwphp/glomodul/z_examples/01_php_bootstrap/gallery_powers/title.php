<?php
// J:\awww\www\fwphp\glomodul\help_sw\test\gallery_powers\title.php
$title = basename($_SERVER['SCRIPT_FILENAME'], '.php');
$title = str_replace('_', ' ', $title);
if ($title == 'index') {
    $title = 'home';
}
$title = ucwords($title);