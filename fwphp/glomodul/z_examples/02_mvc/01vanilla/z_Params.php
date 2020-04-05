<?php

namespace B12phpfw ; //FUNCTIONAL, NOT POSITIONAL eg : B12phpfw\zinc\ver5
//namespace App\Helpers;

class Params
{
    private static $params = array(); // all the parameters

    /**
     * Get parameter value     * @param string $key     * @return string
     */
    public static function get($key)
    {
        if (array_key_exists($key, self::$params)) {
            return self::$params[$key];
        } else {
            return null;
        }
    }

    /**
     * Set paramters key & value * @param string $key * @param string $value * @return void
     */
    public static function set($key, $value)
    {
        self::$params[$key] = $value;
    }

    // Get parameters array
    public static function all()
    {
        return self::$params;
    }
}