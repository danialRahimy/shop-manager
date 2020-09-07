<?php

$columnNames = array(
    "id" => "آی دی",
    "title" => "عنوان",
    "hex_code" => "رنگ",
    "operation" => ""
);
foreach ($colors as $key => $record){

    $colors[$key]["hex_code"] = "
        <span class='colorShowBox' style='background-color:" . $colors[$key]['hex_code'] . "'></span>
    ";

    $colors[$key]["operation"] = "
        <a class='admin-table-edit' href='/admin/adminProductManagement/editingColor/$record[id]'>
            <i class='fa fa-edit'></i>
        </a>
        <a class='admin-table-remove' href='/admin/adminProductManagement/deletingColor/$record[id]'>
            <i class='fa fa-trash-o'></i>
        </a> 
    ";
}

$table = new AdminTableCreator(
    $columnNames,
    $colors
);

echo "<a href='addColor' class='btn btn-primary mb-2'>افزودن رنگ</a>";
echo $table->getTable();