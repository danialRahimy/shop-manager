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
        $this->setController();
    }

    public function setController()
    {
        $controller = $this->matchRoute[1];
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
        $controllerObj = new $this->controller();
        if (method_exists($controllerObj, $action)) {
            $params = $this->setParams();
            $controllerObj->$action($params);
        } else {
            echo "Action Doesn't Exist <br>";
            $this->pageNotFound();
        }
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