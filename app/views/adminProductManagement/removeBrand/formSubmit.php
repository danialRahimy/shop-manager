<?php

$dataId = array(
    "id" => $deletingBrandId
);

$model = new BrandModel();

$selectedBrand = $model->select($dataId);
$selectedBrandSRC = $selectedBrand[0]['logo_src'];
$selectedBrandDir = FILES_PATH.$selectedBrandSRC;

$status = $model->delete($dataId);

unlink($selectedBrandDir);

if (!$status){

    echo "<div class='alert alert-danger'>مشکلی پیش آمده است لطفا دوباره تلاش کنید</div>";
}else{

    echo "<div class='alert alert-success'>رنگ موردنظر شما با موفقیت حذف شد</div>";
}
