<?php

$data = array(
    "id" => $editingColorId
);

$model = new ColorModel();
$select = $model->select($data);
$select = $select[0];