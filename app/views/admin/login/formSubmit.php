<?php

if ($_SERVER["REQUEST_METHOD"] === "POST"){

    $listData = array(
        "email", "password"
    );

    foreach ($listData as $data)
        if (isset($_POST[$data]) and !empty($_POST[$data]))
            $$data = $_POST[$data];
        else
            throw new ExceptionUser("لطفا نام کاربری و رمز عبور خود را وارد کنید");

    (new Authentication())->login($email, $password);

}
