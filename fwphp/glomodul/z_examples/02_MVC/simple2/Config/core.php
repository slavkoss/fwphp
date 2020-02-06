<?php
// included in index.php
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR); //dirname, basename
if (!defined('QS')) define('QS', '?'); //to avoid web server url rewritting

require(ROOT . "Config/db.php");
require(ROOT . "Core/Model.php");
require(ROOT . "Core/Controller.php");
?>