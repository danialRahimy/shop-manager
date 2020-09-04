<?php

$columnNames = array(
    "id" => "آی دی",
    "title_fa" => "نام برند",
    "title_en" => "نام انگلیسی",
    "logo_src" => "لوگو",
    "operation" => ""
);

foreach ($brands as $key => $record){
    $brands[$key]["logo_src"] = "<img class='showBrand' src='". FILES_PATH . "/images/" . $brands[$key]["logo_src"] . "'>";

    $brands[$key]["operation"] = "
        <a class='admin-table-edit' href='/admin/adminProductManagement/editingBrand?id=$record[id]'>
            <i class='fa fa-edit'></i>
        </a>
        <a class='admin-table-remove' href='/admin/adminProductManagement/deletingBrand?id=$record[id]'>
            <i class='fa fa-trash-o'></i>
        </a> 
    ";
}

$table = new AdminTableCreator(
    $columnNames,
    $brands
);

echo "<a href='addBrand' class='btn btn-primary mb-2'>افزودن برند جدید</a>";
echo $table->getTable();