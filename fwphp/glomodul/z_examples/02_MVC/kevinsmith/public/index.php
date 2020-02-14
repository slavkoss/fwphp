<?php
declare(strict_types=1);
//php-di/php-di suggests installing doctrine/annotations (Install it if you want to use annotations (version ~1.2))
//php-di/php-di suggests installing ocramius/proxy-manager (Install it if you want to use lazy injection (version ~2.0))
use DI\ContainerBuilder;
use ExampleApp\HelloWorld;
use FastRoute\RouteCollector;
use Middlewares\FastRoute;
use Middlewares\RequestHandler;
use Narrowspark\HttpEmitter\SapiEmitter;
use Relay\Relay;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\ServerRequestFactory;
//use Zend\Diactoros\Response;
//use Zend\Diactoros\ServerRequestFactory;
use function DI\create;
use function DI\get;
use function FastRoute\simpleDispatcher;

require_once dirname(__DIR__) . '/vendor/autoload.php';

$containerBuilder = new ContainerBuilder();
$containerBuilder->useAutowiring(false);
$containerBuilder->useAnnotations(false);
$containerBuilder->addDefinitions([
    HelloWorld::class => create(HelloWorld::class)
        ->constructor(get('Foo'), get('Response')),
    'Foo' => 'bar',
    'Response' => function() {
        return new Response();
    },
]);

/** @noinspection PhpUnhandledExceptionInspection */
$container = $containerBuilder->build();

$routes = simpleDispatcher(function (RouteCollector $r) {
    $r->get('/hello', HelloWorld::class);
});

$middlewareQueue[] = new FastRoute($routes);
$middlewareQueue[] = new RequestHandler($container);

/** @noinspection PhpUnhandledExceptionInspection */
$requestHandler = new Relay($middlewareQueue);
$response = $requestHandler->handle(ServerRequestFactory::fromGlobals());

$emitter = new SapiEmitter();
/** @noinspection PhpVoidFunctionResultUsedInspection */
return $emitter->emit($response);

/*
https://github.com/kevinsmith/no-framework
******************************************************************************
        "php": "7.2.*",
Package zendframework/zend-diactoros is abandoned "zendframework/zend-diactoros": "^2.1"
you should avoid using it. Use laminas/laminas-diactoros instead.



https://medium.com/@ivorobioff/5-easy-steps-to-build-your-own-php-framework-cb4ba72dc5a6
******************************************************************************
To build a huge enterprise application consider your own framework.
Quick MVP then Laravel. Simple API service then Slim.
1. Request/Response
https://github.com/laminas/laminas-diactoros/blob/master/docs/book/v2/usage.md
HTTP Clients
------------
A client will send a request, and return a response. As a developer, you will create and populate the request, and then introspect the response. Both requests and responses are immutable; if you make changes — e.g., by calling setter methods — you must capture the return value, as it is a new instance.

Server-Side Applications
------------------------
Server-side applications will need to marshal the incoming request based on superglobals, and will then populate and send a response.

2. Routing
https://github.com/nikic/FastRoute

3. Native PHP templates
http://platesphp.com/
Plates is designed for developers who prefer to use native PHP templates over compiled template languages, such as Twig or Smarty.

4.DBAL & ORM 
https://www.php.net/manual/en/book.pdo.php

or https://www.doctrine-project.org/  core projects are the Object Relational Mapper (ORM) https://github.com/doctrine/orm/ sits (is built) on top of DB Abstraction Layer (DBAL) https://github.com/doctrine/dbal/. ORM queries are in a proprietary object oriented SQL dialect called Doctrine Query Language (DQL).
     - downloaded a total of 1,293,192,544 times!
     - object-mapping and query features
     - high-level and low-level DB programming
Doctrine DBAL
-------------
The following database vendors are currently supported:
MySQL, Oracle, Microsoft SQL Server, PostgreSQL, SAP Sybase SQL Anywhere, SQLite.
PDO-like API and a lot of additional, horizontal features like database schema introspection and manipulation through an OO API.
DBAL ships with a driver for Oracle databases that uses the oci8 extension like taq/pdooci.


or http://propelorm.org/ ORM library for PHP 5.5+

5. Inversion of Control
It’s time to put all the things together. We want our framework to be as flexible as possible as well as testable and robust. Therefore, we want our components to be decoupled and depend rather on interfaces than on concrete implementations. To achieve that, we need a good dependency injection solution, eg : Pimple or PHP-DI or Aura.Di https://github.com/auraphp/Aura.Di - A serializable dependency injection container with constructor and setter injection, interface and trait awareness, configuration inheritance, and much more.



------------ blade...
https://dev.to/jorgecc/a-minimalist-mvc-project-using-php-and-without-a-framework-4pd8
https://github.com/jorgecc/ExampleTicketPHP

*/