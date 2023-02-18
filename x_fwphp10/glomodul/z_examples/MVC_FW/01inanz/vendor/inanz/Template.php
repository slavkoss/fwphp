<?php
namespace Core;
 
use Exception;
 
class Template
{
    private $viewPath = '%s/src/View';
    private $baseView = 'base.html';
    private $reservedVariables = ['application_name', 'body'];
 
    public function __construct()
    {
        $this->viewPath = sprintf($this->viewPath, MODULE_PATH);
    }
 
    public function getView($controller, array $variables = [])
    {
        $variables = $this->validateVariables($variables);
 
        $parts = explode('::', $controller);
        $directory = $this->getDirectory($parts[0]);
        $file = $this->getFile($parts[1]);
 
        $viewPath = $this->viewPath.'/'.$directory.'/'.$file.'.html';
        if (file_exists($viewPath)) {
            $baseView = file_get_contents($this->viewPath.'/'.$this->baseView);
            $body = file_get_contents($viewPath);
            $view = str_replace('{{ body }}', $body, $baseView);
 
            foreach ($variables as $key => $value) {
                $view = str_replace('{{ '.$key.' }}', $value, $view);
            }
 
            return $view;
        }
 
        http_response_code(404);
        throw new Exception(sprintf('View cannot be found: [%s]', $viewPath), 404);
    }
 
    private function validateVariables(array $variables = [])
    {
        foreach ($variables as $name => $value) {
            if (in_array($name, $this->reservedVariables)) {
                http_response_code(404);
                throw new Exception('Unacceptable view variable given: [body]'
                  .', var.name='.$name
                , 409);
            }
        }
 
        $variables['application_name'] = MODULE_NAME;
 
        return $variables;
    }
 
    private function getDirectory($controller)
    {
        $parts = explode('\\', $controller);
 
        return end($parts);
    }
 
    private function getFile($controller)
    {
        return str_replace(MODULE_CTR_METHOD_SUFFIX, null, $controller);
    }
}