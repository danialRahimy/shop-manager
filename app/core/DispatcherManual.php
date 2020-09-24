<?php


class DispatcherManual extends Dispatcher
{
    private $requestUri;
    private $matchRoute = array();
    private $controller = null;
    private $action = null;

    public function __construct($matchRoute)
    {
        $this->requestUri = $_SERVER["REQUEST_URI"];
        $this->matchRoute = $matchRoute;

        if (strpos($this->matchRoute[0], "admin") !== false)
            require_once APP_PATH . "/admin_bootstrap.php";
        $this->setController();
    }

    public function setController()
    {
        $controller = $this->matchRoute[1];
        // IF INJECT A CALLBACK FUNCTION INSTEAD OF CONTROLLER ACTION
        if (gettype($controller) === "object"){
            $controller();
            return;
        }
        $controller = $controller . "Controller";
        $controllerPath = CONTROLLER_PATH . "/$controller.php";
        if (file_exists($controllerPath)) {
            $this->controller = $controller;
            $this->setAction();
        } else {
            echo "Controller Doesn't Exist <br>";
            $this->pageNotFound();
        }
    }

    public function setAction()
    {
        $action = $this->matchRoute[2];
        $action = $action . "Action";
        $this->action = $action;
        $controllerObj = new $this->controller($this->controller, $action);

        if (method_exists($controllerObj, $action)) {
            $params = $this->setParams();
            echo $controllerObj->$action($params);
        } else {
            echo "Action Doesn't Exist <br>";
            $this->pageNotFound();
        }
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }

    public function setParams()
    {
        $params = explode("/", $this->matchRoute[0]);
        $uriPart = $this->getParts($this->requestUri);
        $outPut = array();

        foreach ($params as $key => $param) {
            if (!$pos = $this->isParam($param)) {
                continue;
            }
            $length = strlen($param);
            $indexStart = $pos[0] + 1;
            $indexEnd = $length - 2;
            $paramName = substr($param, $indexStart, $indexEnd);
            $outPut[$paramName] = $uriPart[$key];
        }

        return $outPut;
    }
}