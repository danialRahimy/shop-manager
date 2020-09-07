<?php

$data = array(
    "id" => $editingBrandId
);

$model = new BrandModel();
$select = $model->select($data);
$select = $select[0];
$array = explode('/' , $select['logo_src']);
$select['logo_src'] = end($array);