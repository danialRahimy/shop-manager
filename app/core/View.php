<?php


class View
{
    /**
     * @param $t string
     */
    private $controller;
    private $action;
    private $path;
    private $viewInject = array();

    public function __construct($controller, $action)
    {
        $this->controller = $controller;
        $this->action = $action;
    }

    public function __set($name, $value)
    {
        $this->viewInject[$name] = $value;
    }

    protected function setPath()
    {
        $this->path = VIEW_PATH . "/$this->controller/$this->action/index.php";
    }

    public function render($layout, $hasParent = true)
    {
        if ($hasParent)
            $this->renderHasParent($layout);
        else
            $this->renderNotParent();
    }

    protected function renderHasParent($layout)
    {
        $this->setPath();

        foreach ($this->viewInject as $variableName => $variableValue){
            $$variableName = $variableValue;
        }
        $contentPath = $this->path;

        if (file_exists($this->path)){

            if(file_exists(VIEW_PATH . "/$layout.php"))
                require_once VIEW_PATH . "/$layout.php";
            else
                throw new ExceptionDev("layout $layout not found");
        }
    }

    protected function renderNotParent()
    {
        $this->setPath();

        foreach ($this->viewInject as $variableName => $variableValue){
            $$variableName = $variableValue;
        }

        if (file_exists($this->path)){
            require_once "$this->path";
        }
    }

}