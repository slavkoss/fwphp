<?php
/*
 * 
 */

namespace TodoList\Config;

use \Exception;

/**
 * Application conf iguration.
 */
final class Config {

    /** @var array con fig data */
    private static $DATA = null;


    /**
     * @return array
     * @throws Exception
     */
    public static function getConfig($section = null) {
        if ($section === null) {
            return self::getData();
        }
        $data = self::getData();
        if (!array_key_exists($section, $data)) {
            throw new Exception('Unknown config section: ' . $section);
        }
        return $data[$section];
    }

    /**
     * @return array
     */
    private static function getData() {
        if (self::$DATA !== null) {
            return self::$DATA;
        }
        self::$DATA = parse_ini_file(__DIR__ . '/config_db.ini', true);
        return self::$DATA;
    }

}
