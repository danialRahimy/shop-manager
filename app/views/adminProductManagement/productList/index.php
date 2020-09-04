<?php

$columnNames = array(
    "id" => "آی دی",
    "title" => "عنوان",
    "buy_price" => "قیمت خرید",
    "sell_price" => "قیمت فروش",
    "category_id" => "دسته مادر",
    "sub_category_id" => "دسته بندی",
    "quantity" => "موجودی",
    "operation" => ""
);

foreach ($products as $key => $record){
    $products[$key]["operation"] = "
        <a class='admin-table-edit' href='/admin/adminProductManagement/editProduct?id=$record[id]'>
            <i class='fa fa-edit'></i>
        </a>
        <a class='admin-table-remove' href='/admin/adminProductManagement/removeProduct?id=$record[id]'>
            <i class='fa fa-trash-o'></i>
        </a> 
    ";
}

$table = new AdminTableCreator(
    $columnNames,
    $products
);

echo "<a href='addProduct' class='btn btn-primary mb-2'>افزودن محصول</a>";
echo $table->getTable();