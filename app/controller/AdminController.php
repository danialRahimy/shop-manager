<?php


class AdminController extends BaseController
{
    public function indexAction()
    {
        $this->view->test = "danial";
        $this->view->render();
    }

    public function loginAction()
    {
        $this->view->render(false);
    }

    public function panelAction()
    {
        echo 123;
    }
}