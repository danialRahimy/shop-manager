<?php

use Zend\Db\Sql\Select;

class AdminUserManagementController extends BaseController
{
    public function roleListAction()
    {

        $roles = (new AclRoleModel())->select(function (Select $select) {
            $select->order('id ASC');
        });

        $this->view->roles = $roles;
        $this->view->pageID = "role-list";

        echo $this->view->render();
    }

    public function addRoleAction()
    {
        $newRoleTitle = $this->getRequest("title");
        $this->view->newRoleTitle = $newRoleTitle;

        echo $this->view->render();
    }

    public function editRoleAction()
    {

    }

    public function removeRoleAction()
    {

    }

    public function userListAction()
    {

    }

    public function addUserAction()
    {

    }

    public function editUserAction()
    {

    }

    public function removeUserAction()
    {

    }
}