<?php


class Dispatcher extends Router
{
    protected $routes = array();

    public function __construct($routes = null)
    {
        if (is_null($routes)){
            (new DispatcherAutomatic());
            return;
        }
        if (is_array($routes) and count($routes) > 0){

            $this->routes = $routes;

            (new Router($this->routes));
        }
    }
}