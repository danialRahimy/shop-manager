<?php


$data = array(
    "id" => $deletingCategoryId
);

$model = new CategoryModel();
$select = $model->select();
$select = $select[0];

$allCats = $model->select();

foreach ($allCats as $cat) {
    if ($cat['id'] == $deletingCategoryId) {
        $select = $cat;
    }
}

if ($select['parent_id'] == 0) {
    $select['parent_id'] = '-';
} else {
    foreach ($allCats as $cat) {
        if ($select['parent_id'] == $cat['id']) {
            $select['parent_id'] = $cat['title'];
        }
    }
}