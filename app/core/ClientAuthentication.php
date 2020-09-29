<?php

class ClientAuthentication
{
    public function login($usernameOREmail, $password)
    {
        $customerModel = new CustomerModel();
        $result = $customerModel->selectUserByEmailOrUsername($usernameOREmail);

        if (empty($result)) {
            throw new ExceptionUser("کاربری با این نام کاربری یا ایمیل وجود ندارد، لطفا به صفحه ثبت نام در سایت مراجعه نمایید.");

        } else {
            $hashFromDB = $result[0]["password"];
            $resultMatch = password_verify($password, $hashFromDB);

            if ($resultMatch){
                if (!array_key_exists("client", $_SESSION)){
                    $_SESSION["client"] = array(
                        "user" => array(
                            "username" => $result[0]["username"],
                            "isValid" => true,
                        )
                    );

                }else{
                    $_SESSION["client"]["user"] = array(
                        "username" => $result[0]["username"],
                        "isValid" => true,
                    );
                }
                header("Location: " . SUB_DIRECTORY . "/home");
            }else{
                throw new ExceptionUser("نام کابری یا رمز عبور صحیح نیست");
            }
        }
    }

    public function isValid()
    {
        if (
            isset($_SESSION["client"]["user"]["isValid"]) and
            $_SESSION["client"]["user"]["isValid"]
        )
            return true;

        return false;
    }

    public function getUsername()
    {
        if ($this->isValid() and isset($_SESSION["client"]["user"]["username"]))
            return $_SESSION["client"]["user"]["username"];

        return "";
    }
}