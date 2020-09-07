<?php

$dataId = array(
    "id" => $deletingCategoryId
);

$model = new CategoryModel();

$childCats = array();
$i = 0;

foreach ($categories as $key => $record) {
    if($deletingCategoryId == $categories[$key]["parent_id"]) {
        $childCats[$i]['title'] = $categories[$key]["title"];
        $childCats[$i]['id'] = $categories[$key]["id"];
        $i++;
    }
}

if(!empty($childCats)) {
    echo "<div class='alert alert-warning'>برای حذف یک دسته بندی مادر ابتدا لازم است دسته مادر دسته بندی های زیرمجموعه آن را تغییر داده یا حذف کنید.</div>";
    $childCatsList = "<ul class='list-group col-6 mx-3 mb-4'>زیردسته ها عبارتند از:";
    foreach ($childCats as $index => $childCat) {
        $title = $childCats[$index]['title'];
        $id = $childCats[$index]['id'];

        $childCatsList .= "<li class='list-group-item'>
                                <span>$title</span>
                                <div class='float-left'>
                                    <a class='admin-table-edit' href='/admin/adminProductManagement/editingCategory/$record[id]'>
                                        <i class='fa fa-edit'></i>
                                    </a>
                                    <a class='admin-table-remove' href='/admin/adminProductManagement/deletingCategory/$record[id]'>
                                        <i class='fa fa-trash-o'></i>
                                    </a> 
                                </div>
                            </li>";
    }
    $childCatsList .= "</ul>";
    echo $childCatsList;
} else {
    $status = $model->delete($dataId);

    if (!$status){

        echo "<div class='alert alert-danger'>مشکلی پیش آمده است لطفا دوباره تلاش کنید</div>";
    }else{

        echo "<div class='alert alert-success'>دسته بندی موردنظر شما با موفقیت حذف شد</div>";
    }
}

