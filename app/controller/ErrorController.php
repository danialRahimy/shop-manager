<?php


class ErrorController extends BaseController
{
    public function notFoundAction()
    {
        $this->view->title = "404 not found";
        $this->view->pageId = "not-found";
        $this->view->render(false);
    }
}