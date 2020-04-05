<?php 

namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//namespace App\Helpers;

class View
{
    // Views directory path
    private static $path = __DIR__ ; // .'/../../views'

    /**
     * Render a view
     * @param string $view     * @param array $parameters     * @return mixed
     */
    public static function render($view, $parameters = array())
    {
        return self::getContents(self::$path . '/' . $view, $parameters);
    }

    /**
     * Get contents of the view
     * @param string $file     * @param array $parameters     * @return mixed
     */
    public static function getContents($file, $parameters = array()) 
    {
        extract($parameters, EXTR_SKIP);
        unset($parameters);

        ob_start();
        require $file;
        unset($file);
        
        return ob_get_clean();
    }
}