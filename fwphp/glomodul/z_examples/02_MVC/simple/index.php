<?php
//https://github.com/DawidYerginyan/simple-php-mvc
/*
 *   Date: 2017-18-01
 * Author: Dawid Yerginyan
 */

//       NO NAMESPACES !!!!!!!!!
require __DIR__ . '/core/app.php';

$app = new App();

$app->autoload();

$app->config();

$app->start();

?>