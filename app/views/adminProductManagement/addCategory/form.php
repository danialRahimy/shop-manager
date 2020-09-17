<?php

use Form\Form;
use Form\FormElement\FormSubmitElement;
use Form\FormElement\FormTextElement;
use Form\FormElement\FormSelectElement;
use Form\FormElement\FormCheckboxElement;
use Form\FormElement\FormTextareaElement;


$options = array();
$options[0] = '-';
foreach ($categories as $category) {
    if ($category['parent_id'] == 0 )
        $options[$category['id']] = $category['title'];
}

$formConfig = array(
    "attributes" => array(
        "method" => "post",
        "class" => "mb-2",
        "action" => "/admin/adminProductManagement/addCategory",
        "name" => "addCategoryForm"
    )
);

$formElement = array();
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "title",
    "required" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3"
    ),
    "label" => array(
        "text" => "عنوان"
    ),
);
$formElement[] = array(
    "type" => (new FormSelectElement()),
    "name" => "parent_id",
    "attributes" => array(
        "class" => "mb-3 form-control col-6"
    ),
    "label" => array(
        "text" => "دسته بندی مادر"
    ),
    "options" => $options
);
$formElement[] = array(
    "type" => (new FormTextareaElement()),
    "name" => "description",
    "attributes" => array(
        "class" => "form-control col-12 mb-3",
        "rows" => "5"
    ),
    "label" => array(
        "text" => "توضیحات"
    ),
);
$formElement[] = array(
    "type" => (new FormCheckboxElement()),
    "name" => "show_in_menu",
    "checked" => true,
    "attributes" => array(
        "class" => "col-1 mb-5 mt-2",
        "value" => "Y"
    ),
    "label" => array(
        "text" => "نمایش در منو"
    )
);
$formElement[] = array(
    "type" => (new FormSubmitElement()),
    "name" => "addCategoryBtn",
    "attributes" => array(
        "value" => "افزودن",
        "class" => "d-block btn btn-primary"
    )
);

$form = new Form($formElement, $formConfig);