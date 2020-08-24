<?php

namespace App;

/**
 * Application configuration
 *
 * PHP version 7.0
 */
class Config
{
    public $MODULE_RELURL ;
    public $MODULE_PATH ;

    /**
     * Database host, DB nme, DB usr, DB psw
     * @var string
     */
    const DB_HOST = 'localhost';
    const DB_NAME = 'z_mvclogin';
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    /**
     * Show or hide error messages on screen, Secret key for hashing
     * @var boolean
     */
    const SHOW_ERRORS = true;
    const SECRET_KEY = 'my-secret-key';

    /**
     * Mailgun API key and Mailgun domain
     *
     * @var string
     */
    const MAILGUN_API_KEY = 'my-mailgun-api-key';
    const MAILGUN_DOMAIN  = 'my-mailgun-domain';

    public function __construct($data = [])
    {
      //foreach ($data as $key => $value) { $this->$key = $value; };

      $this->WSROOT_URL = // http://localhost:8083/
         ( (isset($_SERVER['HTTPS']) and $_SERVER['HTTPS'] == 'on') 
         ? 'https://' : 'http://' )
         // 2. URL_DOM AIN eg dev1:8083 :
        . filter_var( $_SERVER['HTTP_HOST'] . '/', FILTER_SANITIZE_URL ) ;

      //http://localhost:8083/z_Hollingworth/login/public/ = module URL
      $this->MODULE_RELURL = dirname($_SERVER['PHP_SELF']) ; 
         //  /z_Hollingworth/login/public  is below siteURL=http://localhost:8083/

      //
      $this->MODULE_PATH = dirname(__DIR__) ; //J:\xampp\htdocs\z_Hollingworth\login
    }
}
