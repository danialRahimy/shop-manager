<?php

$columnNames = array(
    "id" => "آی دی",
    "title" => "عنوان",
    "operation" => ""
);

foreach ($roles as $key => $record){
    $roles[$key]["operation"] = "
        <a class='admin-table-edit' href='/admin/adminUserManagement/editRole?id=$record[id]'>
            <i class='fa fa-edit'></i>
        </a>
        <a class='admin-table-remove' href='/admin/adminUserManagement/removeRole?id=$record[id]'>
            <i class='fa fa-trash-o'></i>
        </a> 
    ";
}

$table = new AdminTableCreator(
        $columnNames,
        $roles
);

echo "<a href='addRole' class='btn btn-primary mb-2'>افزودن نقش</a>";
echo $table->getTable();
