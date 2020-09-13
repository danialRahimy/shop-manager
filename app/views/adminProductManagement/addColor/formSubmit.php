<?php

$data = array(
    "title" => $newColorTitle,
    "hex_code" => $newColorHexCode
);

$model = new ColorModel();
$select = $model->select($data);

if (is_array($select) and count($select) > 0){

    echo "<div class='alert alert-danger'>امکان ثبت رنگ تکراری وجود ندارد</div>";
}else{

    $status = $model->insert($data);

    if (!$status){

        echo "<div class='alert alert-danger'>مشکلی پیش آمده است لطفا دوباره تلاش کنید</div>";
    }else{

        echo "<div class='alert alert-success'>رنگ جدید با موفقیت افزوده شد</div>";
    }
}