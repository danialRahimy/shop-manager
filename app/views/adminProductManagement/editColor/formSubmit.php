<?php
$data = array(
    "title" => $newColorTitle,
    "hex_code" => $newColorHexCode
);
$dataId = array(
    "id" => $editingColorId
);


$model = new ColorModel();

$status = $model->update($data,$dataId);

$selectedColor = $model->select($dataId);
$selectedColor = $selectedColor[0];

if (!$status){

    echo "<div class='alert alert-danger'>مشکلی پیش آمده است لطفا دوباره تلاش کنید</div>";
} else {

    echo "<div class='alert alert-success'>رنگ موردنظر با موفقیت ویرایش شد</div>";
}