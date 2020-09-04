<?php

$dataId = array(
    "id" => $deletingColorId
);

$model = new ColorModel();


$status = $model->delete($dataId);

if (!$status){

    echo "<div class='alert alert-danger'>مشکلی پیش آمده است لطفا دوباره تلاش کنید</div>";
}else{

    echo "<div class='alert alert-success'>رنگ موردنظر شما با موفقیت حذف شد</div>";
}
