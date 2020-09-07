<?php

use Form\Form;
use Form\FormElement\FormSubmitElement;
use Form\FormElement\FormTextElement;
use Form\FormElement\FormColorElement;

$formConfig = array(
    "attributes" => array(
        "method" => "post",
        "class" => "mb-2",
        "action" => "/admin/adminProductManagement/colorsList",
        "name" => "editColorForm"
    )
);


$formElement = array();
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "title",
    "required" => true,
    "disabled" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3",
        "value" => $selectedColor['title']
    ),
    "label" => array(
        "text" => "عنوان"
    ),
);

$formElement[] = array(
    "type" => (new FormColorElement()),
    "name" => "hex_code",
    "required" => true,
    "disabled" => true,
    "attributes" => array(
        "class" => "mb-3 form-control col-6",
        "value" => $selectedColor['hex_code']
    ),
    "label" => array(
        "text" => "انتخاب رنگ"
    )
);

$formElement[] = array(
    "type" => (new FormSubmitElement()),
    "name" => "editColorBtn",
    "attributes" => array(
        "value" => "بازگشت به فهرست رنگ ها",
        "class" => "d-block btn btn-primary"
    )
);

$form = new Form($formElement, $formConfig);