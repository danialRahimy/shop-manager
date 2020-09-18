<?php


class ClientController extends BaseController
{
    public function indexAction()
    {
        echo $this->view->render("client");
    }
}