<?php

/*
 *   Date: 2017-18-01
 * Author: Dawid Yerginyan
 */

require __DIR__ . '/core/app.php';

$app = new App();

$app->autoload();

$app->config();

$app->start();

?>