<?php 

/**
 * Codemini Framework
 *
 * An open source application development small framework
 *
 * @package		Codemini Framework
 * @author		Fabricio Polito <fabriciopolito@gmail.com>
 * @copyright	Copyright (c) 2020 - 2020.
 * @license		https://github.com/fabriciopolito/Codemini/blob/master/LICENSE
 * @link		https://github.com/fabriciopolito/Codemini
 * @since		Version 1.0
 */

/**
 * General purposes
 */
defined('DS')  OR define('DS', DIRECTORY_SEPARATOR);
defined('PROJECT_NAME')  OR define('PROJECT_NAME', 'Projekt.');
defined('PROJECT_NAME_WITH_LINKS')  OR define('PROJECT_NAME_WITH_LINKS', 'Nome do meu projeto. <a href="" target="_blank">Link</a>.');

/**
 * Files location
 */
defined('DIR_VENDOR') OR define('DIR_VENDOR', dirname(__DIR__) . DS . 'vendor' . DS);
defined('DIR_CORE') OR define('DIR_CORE', dirname(__DIR__) . DS . 'src' . DS . 'Core' . DS);
defined('DIR_APP') OR define('DIR_APP', __DIR__ . DS);
defined('DIR_VIEW') OR define('DIR_VIEW', __DIR__ . DS . 'Views' . DS);
defined('DIR_CONTROLLER') OR define('DIR_CONTROLLER', __DIR__ . DS . 'Controllers' . DS);
defined('DIR_MODEL') OR define('DIR_MODEL', __DIR__ . DS . 'Models' . DS);

/**
 * Namespaces
 */
defined('NAMESPACE_CONTROLLER') OR define('NAMESPACE_CONTROLLER', "App\\Controllers\\");