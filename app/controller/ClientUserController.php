<?php


class ClientUserController extends BaseController
{

    public function loginRegisterFormsAction()
    {
        $username = (new ClientAuthentication())->getUsername();
        if ($username)
            header('Location:/home');

        $this->view->pageID = "login-register";
        $this->view->title = "ورود به سایت یا ثبت نام - برند فروشگاه";
        echo $this->view->render("client", false);
    }

    public function loginAction()
    {
        $username = (new ClientAuthentication())->getUsername();
        if ($username)
            header('Location:/home');

        $this->view->pageID = "login";
        $this->view->title = "ورود به سایت - برند فروشگاه";
        echo $this->view->render("client", false);
    }

    public function registerAction()
    {
        $username = (new ClientAuthentication())->getUsername();
        if ($username)
            header('Location:/home');

        $customerName = $this->getRequest("name");
        $customerFamily = $this->getRequest("family");
        $customerUsername = $this->getRequest("username");
        $customerEmail = $this->getRequest("email");
        $customerPhone = $this->getRequest("tel");
        $customerPassword = $this->getRequest("password");

        $customerHashedPassword= password_hash($customerPassword, PASSWORD_BCRYPT);

        $this->view->customerName = $customerName;
        $this->view->customerFamily = $customerFamily;
        $this->view->customerUsername = $customerUsername;
        $this->view->customerEmail = $customerEmail;
        $this->view->customerPhone = $customerPhone;
        $this->view->customerHashedPassword = $customerHashedPassword;

        $this->view->pageID = "register";
        $this->view->title = "ثبت نام در سایت - برند فروشگاه";
        echo $this->view->render("client", false);
    }

    public function logoutAction()
    {
        // Delete certain session
        unset($_SESSION["client"]);

        header('Location:/home');
    }

    public function profileAction()
    {
        $username = (new ClientAuthentication())->getUsername();
        if ($username == '')
            header('Location:/login-register');

        // fetch user data
        $customerModel = new CustomerModel();

        $select = $customerModel->getSql()->select();
        $select->where(array(TB_CUSTOMERS . ".username" => $username));

        $select->join(
            array("F" => TB_FACTOR),
            TB_CUSTOMERS . ".id = F.customer",
            array(
                "factor_id" => "id",
                "payed",
                "total",
                "submission_date"
            ),
            $select::JOIN_LEFT
        );
//        echo $customerModel->getSql()->buildSqlString($select);die();

        $ordersResultSet = $customerModel->selectWith($select);
        $customerOrders = $ordersResultSet->toArray();

        $this->view->customerOrders = $customerOrders;

        $this->view->pageID = "user-profile";
        $this->view->title = "حساب کاربری - برند فروشگاه";
        echo $this->view->render("client");
    }

    public function editProfileAction()
    {
        $username = (new ClientAuthentication())->getUsername();
        if ($username == '')
            header('Location:/login-register');

        // fetch user data
        $customerModel = new CustomerModel();

        $select = $customerModel->getSql()->select();
        $select->where(array("username" => $username));

        $customerDetail = $customerModel->selectWith($select);
        $customer = $customerDetail->toArray();

        $this->view->customer = $customer[0];

        $this->view->pageID = "edit-profile";
        $this->view->title = "ویرایش حساب کاربری - برند فروشگاه";
        echo $this->view->render("client");
    }

}