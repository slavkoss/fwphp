<?php
//J:\awww\www\fwphp\glomodul\z_examples\02_mvc\ha_oumar_imgs\src\Config\Application.php
// B12phpfw Home_ctr

/*
namespace App\Config;

class Application
{
    public function run(object $pp1): void
    {
        $router = new Router($pp1); // Home_ctr
                  //echo '<pre>app 1.2 $request='; print_r($request) ; echo '</pre>'; 
    }
}
*/

/**
*      ORIGINAL CODE 1_hexagonal-architecture-master_oumar.zip 30 kB
*     https://github.com/oumarkonate/hexagonal-architecture
*/

namespace App\Config;

use App\Infrastructure\z_ApiClient;
use App\Infrastructure\z_GalleryDriver;
use App\Infrastructure\z_GalleryRepository;

use App\Controller\GalleryController;
use App\Controller\HomeController;
use App\Config\Message\Request;
use App\Domain\GalleryManager;
use peterkahl\curlmaster\curlmaster ; //use GuzzleHttp\Client;
//use Monolog\Handler\StreamHandler;
//use Monolog\Logger;

class Application
{
  public function run(): void
  {
    //for getParameter(string $key) --- 'TEMPLATE_PATH'=>'templates/' (in z_parameters.php)
    $config = new z_Config(); 
        //$logger = new Logger('gallery_images_log');

        //try {
        //    $logger->pushHandler(new StreamHandler($config->getParameter('LOGS_PATH'), Logger::WARNING));
        //} catch (\Exception $e) {
        //    echo "Error while configuring logger";
        //}

        // Instanciate dependencies
        //$apiClient = new ApiClient(new Client(), $logger);
    $apiClient    = new z_ApiClient(new curlmaster);
    $galeryDriver = new z_GalleryDriver($apiClient);
    $repository = new z_GalleryRepository($galeryDriver);
        /*
        $manager = new GalleryManager($repository);

        // Define route
        $router = new Router();

        $router->get('/', function (Request $request) use ($logger, $config) {
            echo ((new HomeController($request, $logger, $config))->index())->getContent();
        });

        $router->get('/gallery-images/', function (Request $request) use ($manager, $logger, $config) {
            echo ((new GalleryController($request, $manager, $logger, $config))->showGallery())->getContent();
        });
        */
    }
}
