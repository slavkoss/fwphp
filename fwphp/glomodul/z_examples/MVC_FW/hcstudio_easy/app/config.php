<?php
// J:\awww\www\fwphp\glomodul\z_examples\MVC_FW\hcstudio_easy\app\config.php
// J:\awww\www\fwphp\z_not_ongithub\MVC_FW\hcstudio_easy\app\config.php
session_start();
$config = [];

/* START EDIT HERE dbname=easydb*/
$config['db'] = [
  'dsn' => 'mysql:host=localhost;port=3306;dbname=z_blogcms',
  'username' => 'root',
  'password' => '',
  'charset' => 'utf8',
];
/* END EDIT HERE */

/* START EDIT HERE 
Generally, mount point of application in web root, but You can place Your application 
in subdirectory, for example: http://localhost/your_project/public, so You can add `your_project`
in web_path config
define('WEB_PATH', 'your_project/public');
*/
//define('WEB_PATH', '');
//define('WEB_PATH', 'fwphp/z_not_ongithub/MVC_FW/hcstudio_easy/public');
define('WEB_PATH', 'fwphp/glomodul/z_examples/MVC_FW/hcstudio_easy/public');

define('CORE_DIR', __DIR__ . '/../core');
define('APP_DIR', __DIR__);
define('ERROR_PAGE', CORE_DIR . '/error.php');
/* END EDIT HERE */

define('WEB_URL', 
  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://'.$_SERVER['HTTP_HOST']
);
define('BASE_URL', WEB_URL . (!empty(WEB_PATH)?'/'.WEB_PATH:''));

define('DEBUG', !$production);
if(!$production){
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

require_once CORE_DIR . '/autoloader.php';
