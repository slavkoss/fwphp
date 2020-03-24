<?php
// B12phpfw Home_ctr

namespace App\Config;

use App\Controller\GalleryController;
use App\Controller\HomeController;

use App\Config\Message\Request;

use App\Domain\GalleryManager;

use App\Infrastructure\ApiClient;
use App\Infrastructure\GalleryDriver;
use App\Infrastructure\GalleryRepository;

/*
use GuzzleHttp\Client;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
*/
class Application
{
    public function run(object $pp1): void
    {
        $config = new Config();
                            //$logger = new Logger('gallery_images_log');
                            /*try {
                                $logger->pushHandler(new StreamHandler($config->getParameter('LOGS_PATH'), Logger::WARNING));
                            } catch (\Exception $e) {
                                echo "Error while configuring logger";
                            } */

        // Instanciate dependencies
                            //   not GuzzleHttp and Monolog
                            //$apiClient = new ApiClient(new Client(), $logger);
        $apiClient = new ApiClient();

        $galeryDriver = new GalleryDriver($apiClient);

        $repository = new GalleryRepository($galeryDriver);
        $manager = new GalleryManager($repository);

        // Define route
        $router = new Router($pp1);

        /*
                  //void !! 
                  echo '<pre>app 1.1 $router='; print_r($router) ; echo '</pre>'; 

        //$router->get('/', function (Request $request) use ($logger, $config) {
        $router->get('/', function (Request $request) use ($config) {
                            echo '<pre>Application.php 2. $request='; print_r($request) ; echo '</pre>'; 
          //echo ((new HomeController($request, $logger, $config))->index())->getContent();
          echo ((new HomeController($request, $config))->index());
        });

        //$router->get('/gallery-images/', function (Request $request) use ($manager, $logger, $config) 
        $router->get('/gallery-images/', function (Request $request) use ($manager, $config) 
        { 
                            echo '<pre>app 3. $request='; print_r($request) ; echo '</pre>'; 
          echo ((new GalleryController($request,$manager,$logger,$config))->showGallery())->getContent();
        });
        */
                  //echo '<pre>app 1.2 $request='; print_r($request) ; echo '</pre>'; 

    }



}
