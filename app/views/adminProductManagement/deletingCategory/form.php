<?php

use Form\Form;
use Form\FormElement\FormSubmitElement;
use Form\FormElement\FormTextElement;
use Form\FormElement\FormTextareaElement;
use Form\FormElement\FormCheckboxElement;

$formConfig = array(
    "attributes" => array(
        "method" => "post",
        "class" => "mb-2",
        "action" => "/admin/adminProductManagement/removeCategory/$deletingCategoryId",
        "name" => "deletingCategoryForm"
    )
);


$formElement = array();
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "title",
    "disabled" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3",
        "value" => $select['title']
    ),
    "label" => array(
        "text" => "عنوان"
    ),
);
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "parent_id",
    "disabled" => true,
    "attributes" => array(
        "class" => "mb-3 form-control col-6",
        "value" => $select['parent_id']
    ),
    "label" => array(
        "text" => "دسته بندی مادر"
    ),
);
$formElement[] = array(
    "type" => (new FormTextareaElement()),
    "name" => "description",
    "disabled" => true,
    "attributes" => array(
        "class" => "form-control col-12 mb-3",
        'rows' => '5'
    ),
    "text" => $select['description'],
    "label" => array(
        "text" => "توضیحات"
    ),
);

if($select['show_in_menu'] === 'Y') {
    $formElement[] = array(
        "type" => (new FormCheckboxElement()),
        "name" => "show_in_menu",
        "checked" => true,
        "disabled" => true,
        "attributes" => array(
            "class" => "col-1 mb-5 mt-2",
            "value" => "Y"
        ),
        "label" => array(
            "text" => "نمایش در منو"
        )
    );
} else {
    $formElement[] = array(
        "type" => (new FormCheckboxElement()),
        "name" => "show_in_menu",
        "disabled" => true,
        "attributes" => array(
            "class" => "col-1 mb-5 mt-2",
            "value" => "N"
        ),
        "label" => array(
            "text" => "نمایش در منو"
        )
    );
}

$formElement[] = array(
    "type" => (new FormSubmitElement()),
    "name" => "deletingCategoryBtn",
    "attributes" => array(
        "value" => "حذف دسته بندی",
        "class" => "d-block btn btn-danger"
    )
);

$form = new Form($formElement, $formConfig);