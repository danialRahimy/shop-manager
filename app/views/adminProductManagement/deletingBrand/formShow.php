<?php


$data = array(
    "id" => $deletingBrandId
);

$model = new BrandModel();
$select = $model->select($data)[0];