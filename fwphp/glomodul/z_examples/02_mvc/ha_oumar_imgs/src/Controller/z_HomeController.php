<?php

namespace App\Controller;

use App\Config\Config;           //fn getParameter - gets paths
use App\Config\Message\Request;  //$_SERVER['REQUEST_METHOD'], $_SERVER["CONTENT_TYPE"]
use App\Config\Message\Response; //return $this->content;
//use Psr\Log\LoggerInterface;

class HomeController
{
    use ControllerTrait; //fns render and getTemplate

    /** @var Request */
    private $request;
    private $config;

    /** @var LoggerInterface */
    //private $logger;

    /**
     * HomeController constructor.
     *
     * @param Request $request
     * @param LoggerInterface $logger
     * @param Config $config
     * echo ((new HomeController($request, $logger, $config))->index())->getContent();
     */
    public function __construct(
        Request $request,
        //LoggerInterface $logger,
        Config $config
    ) {
        $this->request = $request;
        //$this->logger = $logger;
        $this->config = $config;
    }

    /**
     * Display home page.
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('home.html', []); //in ControllerTrait.php
        //return $this->r ender('aaaaaaaaa', []);
    }
}
