<?php
namespace Core;
/**
Middleware in web applications is the mid-layer between the HTTP request and the application logic. The middleware process incoming requests and execute the code BEFORE THE CONTROLLER'S ACTIONS. ... Frequently the middleware layer has multiply middlewares in the chain and they run one after another.

Middleware is the term used for the components that are combined to form the request pipeline. This pipeline is arranged like a chain. The request is either returned by the middleware or passed to the next one until a response is sent back.

1. PRE-ACTION is BEFORE MIDDLEWARE, is run against the request before the execution of the actual action it requests (duh). Examples of this could be CHECKING (testing, verifying, audit, authentication) 
    - if the user is authenticated (prijava) and authorized (prava)
    - if the CSRF token sent with the request is valid etc.

2. After PRE-ACTION, ACTUAL ACTION runs - get array of users from DB to send to client. 

3. Before the response reaches the client we want to do some POST-ACTION work on it. This is AFTER MIDDLEWARE. Examples could be deleting temp files, adding CORS headers, adding cookies, or caching the result. If we implemented caching after middleware, we could then implement some before middleware to check for a cached version of the resource before actually getting it from database.
*/
abstract class Middleware
{ 
    public $position = 'before'; // before or action 
    static $application;
    /**
     * ['*'] all action 
     * ['index', 'view'] index and view action only
     * ['*', '-view'] all action except view
     */
    static $actions;
    static $params;

    public function __construct($application, $actions, $params)
    {
        static::$application = $application;
        if(!empty($actions)) static::$actions = $actions;
        if(!empty($params)) static::$params = $params;
    }

    public function getActions()
    {
      //caled from getMiddleware() in ...\core\Application.php
        return static::$actions;
    }
    
    abstract public function run();
}
