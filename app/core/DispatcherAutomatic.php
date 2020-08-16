<?php


class DispatcherAutomatic extends Dispatcher
{
    private $requestUri;
    private $controller = null;
    private $action = null;
    protected $routes = array();

    public function __construct()
    {
        $this->requestUri = $_SERVER["REQUEST_URI"];
        $this->setController();
    }

    public function setController()
    {
        $routeCheckIndex = array(array($this->requestUri));
        if ($this->isHome($routeCheckIndex)){
            $this->requestUri = "index/index";
        }

        $parts = explode("/", $this->requestUri);

        if (count($parts) > 1){
            $controller = $parts[1];
            $controller = ucfirst($controller);
            $controller = $controller . "Controller";
            $controllerPath = CONTROLLER_PATH . "/$controller.php";
            if (file_exists($controllerPath)){
                $this->controller = $controller;
                $this->setAction();
            }else{
                echo "Controller Doesn't Exist <br>";
                $this->pageNotFound();
            }
        }
    }

    public function setAction()
    {
        $parts = explode("/", $this->requestUri);
        $controllerObj = new $this->controller();
        if (count($parts) > 2){
            $action = $parts[2];
            $action = $action . "Action";
            if (method_exists($controllerObj, $action)){
                $this->action = $action;
                $controllerObj->$action();
            }else{
                echo "Action Doesn't Exist <br>";
                $this->pageNotFound();
            }
        }else{
            $action = "indexAction";
            if (method_exists($controllerObj, $action)){
                $this->action = $action;
                $controllerObj->$action();
            }else{
                echo "Action Doesn't Exist <br>";
                $this->pageNotFound();
            }
        }
    }
}