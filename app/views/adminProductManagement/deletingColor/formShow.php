<?php


$data = array(
    "id" => $deletingColorId
);

$model = new ColorModel();
$selectedColor = $model->select($data)[0];