<?php


class ClientController extends BaseController
{
    public function indexAction()
    {
        echo $this->view->render();
    }

    public function loginAction()
    {
        $this->view->render(false);
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