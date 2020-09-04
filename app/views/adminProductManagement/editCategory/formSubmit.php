<?php
$data = array(
    "title" => $newCategoryTitle,
    "parent_id" => $newCategoryParentID,
    "description" => $newCategoryDescription,
    "show_in_menu" => $newCategoryShowInMenu
);
$dataId = array(
    "id" => $editingCategoryId
);


$model = new CategoryModel();

$status = $model->update($data,$dataId);

$allCats = $model->select();

foreach ($allCats as $cat) {
    if ($cat['id'] == $editingCategoryId) {
        $select = $cat;
    }
}

if ($select['parent_id'] == 0) {
    $select['parent_id'] = '-';
} else {
    foreach ($allCats as $cat) {
        if ($select['parent_id'] == $cat['id']) {
            $select['parent_id'] = $cat['title'];
        }
    }
}

if (!$status){

    echo "<div class='alert alert-danger'>مشکلی پیش آمده است لطفا دوباره تلاش کنید</div>";
}else{

    echo "<div class='alert alert-success'>دسته بندی  با موفقیت ویرایش شد</div>";
}