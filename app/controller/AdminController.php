<?php


class AdminController extends BaseController
{
    public function indexAction()
    {
        $this->view->test = "danial";
        $this->view->render("admin");
    }

    public function loginAction()
    {
        echo $this->view->render("adminLogin");
    }

    public function panelAction()
    {
        echo 123;
    }

    public function testAction()
    {
        echo "test";
    }
}