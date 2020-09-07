<?php

use Form\Form;
use Form\FormElement\FormSubmitElement;
use Form\FormElement\FormTextElement;
use Form\FormElement\FormColorElement;


$formConfig = array(
    "attributes" => array(
        "method" => "post",
        "class" => "mb-2",
        "action" => "/admin/adminProductManagement/editColor/$editingColorId",
        "name" => "editingColorForm"
    )
);


$formElement = array();

$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "title",
    "required" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3",
        "value" => $select['title']
    ),
    "label" => array(
        "text" => "عنوان"
    ),
);

$formElement[] = array(
    "type" => (new FormColorElement()),
    "name" => "hex_code",
    "required" => true,
    "attributes" => array(
        "class" => "mb-3 form-control col-6",
        "value" => $select['hex_code']
    ),
    "label" => array(
        "text" => "انتخاب رنگ"
    )
);

$formElement[] = array(
    "type" => (new FormSubmitElement()),
    "name" => "editingColorBtn",
    "attributes" => array(
        "value" => "اعمال تغییرات",
        "class" => "d-block btn btn-primary"
    )
);

$form = new Form($formElement, $formConfig);