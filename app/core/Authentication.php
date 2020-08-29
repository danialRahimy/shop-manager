<?php

class Authentication
{
    public function login($usernameOREmail, $password)
    {
        $adminUserModel = new AdminUserModel();
        $result = $adminUserModel->selectUserByEmailOrUsername($usernameOREmail);

        $hashFromDB = $result[0]["password"];
        $resultMatch = password_verify($password, $hashFromDB);

        if ($resultMatch){
            if (!array_key_exists("admin", $_SESSION)){
                $_SESSION["admin"] = array(
                    "user" => array(
                        "username" => $result[0]["username"],
                        "isValid" => true,
                    )
                );

            }else{
                $_SESSION["admin"]["user"] = array(
                    "username" => $result[0]["username"],
                    "isValid" => true,
                );
            }
            header("Location: " . SUB_DIRECTORY . "/admin/panel");
        }else{
            throw new ExceptionUser("نام کابری یا رمز عبور صحیح نیست");
        }
    }

    public function isValid()
    {
        if (
            isset($_SESSION["admin"]["user"]["isValid"]) and
            $_SESSION["admin"]["user"]["isValid"]
        )
            return true;

        return false;
    }
}