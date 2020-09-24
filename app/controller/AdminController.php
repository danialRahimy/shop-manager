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

    public function logoutAction()
    {
        (new Authentication())->logout();
        echo $this->view->render("adminLogin");
    }

    public function panelAction()
    {
        echo $this->view->render("admin");
    }
}