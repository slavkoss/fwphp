<?php
/**
 * J:\awww\www\fwphp\glomodul\z_examples\02_MVC\wecrm2\index.php
 *      wecrm dir name forces https !???
 * Created by PhpStorm.  * User: andreas.martin * Date: 12.09.2017 * Time: 21:30
 */
require_once("config/Autoloader.php");

use router\Router;

use controller\CustomerController;
use controller\AgentController;
use controller\AuthController;
use controller\ErrorController;
use controller\AgentPasswordResetController;
use controller\EmailController;
use controller\PDFController;
use service\ServiceEndpoint;
use http\HTTPException;
use http\HTTPHeader;
use http\HTTPStatusCode;

ini_set( 'session.cookie_httponly', 1 );
session_start();

$authFunction = function () {
    if (AuthController::authenticate())
        return true;
    Router::redirect("/login");
    return false;
};


// $method, $path, $routeFunction
Router::route("GET", "/login", function () {
    AgentController::loginView();
});

Router::route("GET", "/register", function () {
    AgentController::registerView();
});

Router::route("POST", "/register", function () {
    if(AgentController::register())
        Router::redirect("/logout");
});

Router::route("POST", "/login", function () {
    AuthController::login();
    Router::redirect("/");
});

Router::route("GET", "/logout", function () {
    AuthController::logout();
    Router::redirect("/login");
});

Router::route("POST", "/password/request", function () {
    AgentPasswordResetController::resetEmail();
    Router::redirect("/login");
});

Router::route("GET", "/password/request", function () {
    AgentPasswordResetController::requestView();
});

Router::route("POST", "/password/reset", function () {
    AgentPasswordResetController::reset();
    Router::redirect("/login");
});

Router::route("GET", "/password/reset", function () {
    AgentPasswordResetController::resetView();
});

Router::route_auth("GET", "/", $authFunction, function () {
    CustomerController::readAll();
});

Router::route_auth("GET", "/agent/edit", $authFunction, function () {
    AgentController::editView();
});

Router::route_auth("POST", "/agent/edit", $authFunction, function () {
    if(AgentController::update())
        Router::redirect("/logout");
});

Router::route_auth("GET", "/customer/create", $authFunction, function () {
    CustomerController::create();
});

Router::route_auth("GET", "/customer/edit", $authFunction, function () {
    CustomerController::edit();
});

Router::route_auth("GET", "/customer/delete", $authFunction, function () {
    CustomerController::delete();
    Router::redirect("/");
});

Router::route_auth("POST", "/customer/update", $authFunction, function () {
    if(CustomerController::update())
        Router::redirect("/");
});

Router::route_auth("GET", "/customer/email", $authFunction, function () {
    EmailController::sendMeMyCustomers();
    Router::redirect("/");
});

Router::route_auth("GET", "/customer/pdf", $authFunction, function () {
    PDFController::generatePDFCustomers();
});

$authAPIBasicFunction = function () {
    if (ServiceEndpoint::authenticateBasic())
        return true;
    Router::errorHeader();
    return false;
};

Router::route_auth("GET", "/api/token", $authAPIBasicFunction, function () {
    ServiceEndpoint::loginBasicToken();
});

$authAPITokenFunction = function () {
    if (ServiceEndpoint::authenticateToken())
        return true;
    Router::errorHeader();
    return false;
};

Router::route_auth("HEAD", "/api/token", $authAPITokenFunction, function () {
    ServiceEndpoint::validateToken();
});

Router::route_auth("GET", "/api/customer", $authAPITokenFunction, function () {
    ServiceEndpoint::findAllCustomer();
});

Router::route_auth("GET", "/api/customer/{id}", $authAPITokenFunction, function ($id) {
    ServiceEndpoint::readCustomer($id);
});

Router::route_auth("PUT", "/api/customer/{id}", $authAPITokenFunction, function ($id) {
    ServiceEndpoint::updateCustomer($id);
});

Router::route_auth("POST", "/api/customer", $authAPITokenFunction, function () {
    ServiceEndpoint::createCustomer();
});

Router::route_auth("DELETE", "/api/customer/{id}", $authAPITokenFunction, function ($id) {
    ServiceEndpoint::deleteCustomer($id);
});

//echo Router::out_routes() ;
//exit(0);

try {
    HTTPHeader::setHeader("Access-Control-Allow-Origin: *");
    HTTPHeader::setHeader("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS, HEAD");
    HTTPHeader::setHeader(
      "Access-Control-Allow-Headers: Authorization, Location, Origin, Content-Type, X-Requested-With"
    );
    
    if($_SERVER['REQUEST_METHOD']=="OPTIONS") {
        HTTPHeader::setStatusHeader(HTTPStatusCode::HTTP_204_NO_CONTENT);
    } else {
        Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
    }
} catch (HTTPException $exception) {
    $exception->getHeader();
    ErrorController::show404();
}

/*
http://blog.cleancoder.com/uncle-bob/2014/05/08/SingleReponsibilityPrinciple.html
08 May 2014 by Robert C. Martin (Uncle Bob)

Breaking up a large piece of code
=================================
into snippets : “sections” “modules” or “classes”.

Code is not responsible for bug fixes or refactoring but programmer is.

To isolate your modules from the complexities of the organization,
ee design your systems such that each module is responsible (responds to)
the needs of just that one business function. :

SRP (SINGLE RESPONSIBILITY PRINCIPLE) is about people
                (single person or tightly coupled group of people
                 representing a single narrowly defined business function)
who request method changes (many cooks spoil soup).

Uncle Bob is saying that SRP has replaced SoC (SEPARATION OF CONCERNS) 
because SRP now includes ideas of Coupling and Cohesion which SoC did not.

Ee:
Gather together the things that CHANGE FOR THE SAME REASONS (PEOPLE !).
Separate those things that change for different reasons.
This is just another way to define cohesion and coupling. 
We want to increase the cohesion between things that change for the same reasons,
and we want to decrease the coupling between those things that change for different reasons.

Remember that the reasons for change are people. It is people who request changes.
And you don’t want to confuse those people, or yourself, by mixing together 
code that many different people care about for different reasons.

This is the reason we SEPARATE CONCERNS (relevant things - responsibilities).
                 Concern can be as general as details of HW the code is being 
                 optimized for, or as specific as name of a class to instantiate.
  - we do not put SQL in JSPs
  - we do not generate HTML in the modules that compute results
  - business rules should not know the database schema

Eg :
public class Employee {
  public Money calculatePay(); //how much particular employee should be paid
  public void savePay(); //stores data managed by Employee object onto enterprise DB
  public String reportHours(); //returns string worked_number_of_hours
}
CEO = chief executive officer = chief operating officer = managing director
    =corporate executive responsible for the operations of the firm; reports to a board of directors; may appoint other managers (including a president)
Reporting to that CEO are C-level executives eg : 
CFO = responsible for controlling the FINANCES of the company eg for calculatePay()
COO = responsible for managing the OPERATIONS of the company eg for reportHours()
CTO = responsible for the TECHNOLOGY infrastructure and development eg for savePay()

3-Tier Architecture - separating GUI logic, business logic and database logic
is sufficient to satisfy SRP. 


Classes contain one method each, and each method contains one line of code :
  - broken encapsulation
  - low cohesion
  - high coupling
SRP == SoC + Coupling + Cohesion


Building a Basic Blog Domain Model
**********************************
http://www.sitepoint.com/building-a-domain-model/
February 24, 2012  By Alejandro Gervasio
http://github.com/webengfhnw/WE-CRM

*/