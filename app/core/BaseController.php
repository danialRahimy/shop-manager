<?php


abstract class BaseController
{
    use Request;

    protected $view;

    public function __construct($controller,$action)
    {
        $this->setView($controller,$action);
    }

    private function setView($controller,$action)
    {
        $controller = explode("Controller", $controller)[0];
        $action = explode("Action", $action)[0];

        $this->view = new View($controller,$action);
    }
}