<?php
class Router
{
  //steps: parse request, match req. pattern in routing table, run some code, return response
    public $request;
    public $routes = []; //routing table

    public function __construct(array $request)
    {
      //hello = txt to output or view = FN TO CALL or script to include :
      $this->request = basename($request['REQUEST_URI']); //parsing request
    }
 
    public function addRoute(string $uri, \Closure $fn) : void
    {
      //Add a route and callback to our $routes array
      $this->routes[$uri] = $fn;
    }
 
    public function hasRoute(string $uri) : bool
    {
      //Determine if requested route exists in our routes array
      return array_key_exists($uri, $this->routes);
    }
 
    public function run()
    { //Run the router
      echo '<pre>$this->routes='; print_r($this->routes); echo '</pre><br />'; 
      echo '<pre>$this->request='; print_r($this->request); echo '</pre><br />'; 
      if($this->hasRoute($this->request)) {
        $this->routes[$this->request]->call($this);
      }
    }


}


// *********** This is in Home_ctr class : *************

function view($content)
{ 
  echo $content ;
}

//http://dev1:8083/fwphp/glomodul/z_examples/02_mvc/Router.php/hello
$rtr = new Router($_SERVER);
// Add a "hello" route that prints to the screen.
$rtr->addRoute('hello', function() { echo 'Well, hello there!!'; }) ;

$rtr->addRoute('view', function() { return view('Hello from view fn'); }) ;
//$rtr->addRoute('view', function() { view('Hello from view fn'); }) ;
 
$rtr->run();

/*
https://github.com/AnalyzePHP/framework

http://developmentmatt.com/building-a-php-framework-part-1-why-seriously-why/
https://developmentmatt.com/building-a-php-framework-part-2-what-is-a-web-framework/
https://developmentmatt.com/building-a-php-framework-part-3-time-for-action/
https://developmentmatt.com/building-a-php-framework-part-4-the-foundation/
https://developmentmatt.com/building-a-php-framework-part-5-test-driven-development/
https://developmentmatt.com/building-a-php-framework-part-6-dependency-inversion-inversion-of-control-oh-my/
https://developmentmatt.com/building-a-php-framework-part-7-the-container/
https://developmentmatt.com/building-a-php-framework-part-8-routing/

https://twitter.com/AnalyzePHP
*/