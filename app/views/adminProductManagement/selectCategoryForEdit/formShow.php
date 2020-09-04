<?php


$data = array(
    "id" => $editingCategoryId
);

$model = new CategoryModel();
$select = $model->select($data);
$select = $select[0];


$options = array();
$options[0] = '-';
foreach ($categories as $category) {
    $options[$category['id']] = $category['title'];
}