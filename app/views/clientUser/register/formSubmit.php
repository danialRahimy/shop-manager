<?php

$data = array(
    "name" => $customerName,
    "family" => $customerFamily,
    "username" => $customerUsername,
    "email" => $customerEmail,
    "cell_number" => $customerPhone,
    "password" => $customerHashedPassword
);

$model = new CustomerModel();
$select = $model->select(["username" => $customerUsername]);

if (is_array($select) and count($select) > 0){

    echo "<div class='alert alert-danger'>این نام کاربری از قبل وجود دارد، لطفا یک نام کاربری جدید انتخاب کنید.</div>";
}else{

    $status = $model->insert($data);

    if (!$status){

        echo "<div class='alert alert-danger'>مشکلی پیش آمده است لطفا دوباره تلاش کنید</div>";
    }else{

        echo "<div class='alert alert-success'>ثبت نام شما با موفقیت انجام شد، لطفا وارد شوید: <a class='btn default-color text-white' href='/login'>صفحه ورود به سایت</a></div>";
    }
}