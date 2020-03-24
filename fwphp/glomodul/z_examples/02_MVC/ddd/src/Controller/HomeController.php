<?php

namespace App\Controller;

use App\Config\Config;
use App\Config\Message\Request;
use App\Config\Message\Response;
//use Psr\Log\LoggerInterface;

class HomeController
{
    use ControllerTrait;

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
        //return $this->render('aaaaaaaaa', []);
    }
}
