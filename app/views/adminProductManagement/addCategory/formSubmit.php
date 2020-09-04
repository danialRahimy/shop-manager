<?php

if($newCategoryShowInMenu === '') {
    $newCategoryShowInMenu = 'N';
}
$data = array(
    "title" => $newCategoryTitle,
    "parent_id" => $newCategoryParentID,
    "description" => $newCategoryDescription,
    "show_in_menu" => $newCategoryShowInMenu
);

$model = new CategoryModel();
$select = $model->select($data);

if (is_array($select) and count($select) > 0){

    echo "<div class='alert alert-danger'>امکان ثبت دسته بندی تکراری وجود ندارد</div>";
}else{

    $status = $model->insert($data);

    if (!$status){

        echo "<div class='alert alert-danger'>مشکلی پیش آمده است لطفا دوباره تلاش کنید</div>";
    }else{

        echo "<div class='alert alert-success'>دسته بندی جدید با موفقیت افزوده شد</div>";
    }
}