<?php
namespace Core;
 
use Exception;
 
class Request
{
    private $server;
    private $post;
    private $get;
    private $files;
 
    public function __construct(
        array $server = [],
        array $post = [],
        array $get = [],
        array $files = []
    ) {
        $this->server = $server;
        $this->post = $post;
        $this->get = $get;
        $this->files = $files;
    }
 
    public function getServer($index = null)
    {
        return !is_null($index) && isset($this->server[$index]) 
          ? $this->server[$index] : $this->server;
    }
 
    public function getPost()
    {
        return $this->post;
    }
 
    public function getGet()
    {
        return $this->get;
    }
 
    public function getFiles()
    {
        return $this->files;
    }
 
    public function getController()
    {
        $urlParts = $this->getUrlParts();
 
        // If controller name is not set in URL return default one
        if (!isset($urlParts[0])) {
            return APP_CONTROLLER_NAMESPACE.APP_DEFAULT_CONTROLLER;
        }
 
        // If controller exists in system then return it
        if (class_exists(APP_CONTROLLER_NAMESPACE.$urlParts[0])) {
            return APP_CONTROLLER_NAMESPACE.$urlParts[0];
        }
 
        // Otherwise
        http_response_code(404);
        throw new Exception(sprintf('Controller cannot be found: [%s]', APP_CONTROLLER_NAMESPACE.$urlParts[0]), 404);
    }
 
    public function getMethod($controller)
    {
        $urlParts = $this->getUrlParts();
 
        // If controller method is not set in URL return default one
        if (!isset($urlParts[1])) {
            return APP_DEFAULT_CONTROLLER_METHOD.APP_CONTROLLER_METHOD_SUFFIX;
        }
 
        // If controller method name pattern is invalid
        if (!preg_match('/^[a-z\-]+$/', $urlParts[1])) {
            http_response_code(400);
            throw new Exception(sprintf('Invalid method: [%s]', $urlParts[1]), 400);
        }
 
        // If controller method exists in system then return it
        $method = $this->constructMethod($urlParts[1]);
        if (method_exists($controller, $method)) {
            return $method;
        }
 
        // Otherwise
        http_response_code(404);
        throw new Exception(sprintf('Method cannot be found: [%s:%s]', $controller, $method), 404);
    }
 
    private function getUrlParts()
    {
        $url = str_replace(APP_INNER_DIRECTORY, null, $this->getServer('REQUEST_URI'));
        $urlParts = explode('/', $url);
        $urlParts = array_filter($urlParts);
        $urlParts = array_values($urlParts);
                          if ('1') { echo '<pre>'.__FILE__ .', lin='. __LINE__
                          //if ($module_arr['dbg']) { echo '<pre>'.__FILE__ .', lin='. __LINE__
                          .'<br />     <b>*** '.__METHOD__ .'  SAYS *** šđčćž</b> '
                          .'APP_INNER_DIRECTORY is module relative path (below web server doc root) eg /mix/mvc'
                          ;
                          print '<br />APP_INNER_DIRECTORY='; print_r(APP_INNER_DIRECTORY);
                          print '<br />$this->getServer(\'REQUEST_URI\') ='; print_r($this->getServer('REQUEST_URI'));
                          print '<br />$url ='; print_r($url);
                          print '<br />$urlParts ='; print_r($urlParts);
                                echo '</pre><br />';
                          }
 
        return $urlParts;
    }
 
    private function constructMethod($part)
    {
        $method = null;
 
        $parts = explode('-', $part);
        foreach ($parts as $part) {
            if (!$method) {
                $method = $part;
            } else {
                $method .= ucfirst($part);
            }
        }
 
        return $method.APP_CONTROLLER_METHOD_SUFFIX;
    }
}