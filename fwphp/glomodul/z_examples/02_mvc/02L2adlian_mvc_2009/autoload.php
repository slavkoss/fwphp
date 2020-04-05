<?php
//require_once __DIR__.'/../vendor/autoload.php';
// J:\xampp\htdocs\laravel6\vendor\fzaninotto\faker\src\autoload.php

//echo 'aaaaaaaaaaaaaaaaaaaaaaaa' ;

spl_autoload_register( function ($class)
  {
    //echo 'bbbbbbbbbbbbbbbbbbbbb' ;
    // project-specific namespace prefix
    $prefix = 'B12phpfw'; //$prefix = 'MyProject\\MyNamespace\\';

    // base directory for the namespace prefix
    $base_dir = __DIR__ . '/'; //$base_dir = __DIR__ . '/src/';

    //does class uses the namespace prefix?
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return; //no, move to the next registered autoloader
    }

    $relative_class = substr($class, $len);  //get relative class name

    // replace namespace prefix with base directory,
    // replace namespace separators with directory separators in the relative class name,
    // append with .php
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    //if (file_exists($file)) { 
       require $file;
    //} //if file exists, require it
  }
);




// J:\xampp\htdocs\laravel6\vendor\fzaninotto\faker\src\autoload.php
/**
 * Simple autoloader that follow the PHP Standards Recommendation #0 (PSR-0)
 * @see https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md for more informations.
 *
 * Code inspired from the SplClassLoader RFC
 * @see https://wiki.php.net/rfc/splclassloader#example_implementation
 */
/*
spl_autoload_register(function ($className) {
    $className = ltrim($className, '\\');
    $fileName = '';
    if ($lastNsPos = strripos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName = __DIR__ . DIRECTORY_SEPARATOR . $fileName . $className . '.php';
    if (file_exists($fileName)) {
        require $fileName;

        return true;
    }

    return false;
});
*/