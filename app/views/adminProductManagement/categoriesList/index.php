<?php

$columnNames = array(
    "id" => "آی دی",
    "title" => "عنوان",
    "parent_id" => "دسته مادر",
    "description" => "توضیحات",
    "show_in_menu" => "نمایش در منو",
    "operation" => ""
);

foreach ($categories as $key => $record){
    $categories[$key]["operation"] = "
        <a class='admin-table-edit' href='/admin/adminProductManagement/selectCategoryForEdit?id=$record[id]'>
            <i class='fa fa-edit'></i>
        </a>
        <a class='admin-table-remove' href='/admin/adminProductManagement/deletingCategory?id=$record[id]'>
            <i class='fa fa-trash-o'></i>
        </a> 
    ";

    if(strlen($categories[$key]["description"]) > 60){
        $categories[$key]["description"] = substr($categories[$key]["description"], 0, 59).' ...';
    }
    if($categories[$key]["parent_id"] == 0){
        $categories[$key]["parent_id"] = '-';
    } else {
        $parentId = $categories[$key]["parent_id"];
        foreach ($categories as $key2 => $record2) {
            if($parentId == $categories[$key2]["id"]) {
                $categories[$key]["parent_id"] = $categories[$key2]["title"];
                break;
            }
        }
    }

}

$table = new AdminTableCreator(
    $columnNames,
    $categories
);

echo "<a href='addCategory' class='btn btn-primary mb-2'>افزودن دسته بندی</a>";
echo $table->getTable();