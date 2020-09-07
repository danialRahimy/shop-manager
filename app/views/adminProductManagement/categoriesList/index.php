<?php

$columnNames = array(
    "id" => "آی دی",
    "title" => "عنوان",
    "parent_id" => "دسته مادر",
    "description" => "توضیحات",
    "show_in_menu" => "نمایش در منو",
    "operation" => ""
);

//href='/admin/adminProductManagement/editingCategory?id=$record[id]'
foreach ($categories as $key => $record){
    $categories[$key]["operation"] = "
        <a class='admin-table-edit' href='/admin/adminProductManagement/editingCategory/$record[id]'>
            <i class='fa fa-edit'></i>
        </a>
        <a class='admin-table-remove' href='/admin/adminProductManagement/deletingCategory/$record[id]'>
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

    if($categories[$key]["show_in_menu"] == 'Y'){
        $categories[$key]["show_in_menu"] = '<i class="fa fa-check-square-o showCheckIcon" aria-hidden="true"></i>';
    } else {
        $categories[$key]["show_in_menu"] = '<i class="fa fa-window-close-o hideIcon" aria-hidden="true"></i>';
    }
}

$table = new AdminTableCreator(
    $columnNames,
    $categories
);

echo "<a href='addCategory' class='btn btn-primary mb-2'>افزودن دسته بندی</a>";
echo $table->getTable();