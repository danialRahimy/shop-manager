<?php

use Form\Form;
use Form\FormElement\FormSubmitElement;
use Form\FormElement\FormTextElement;
use Form\FormElement\FormFileElement;

$formConfig = array(
    "attributes" => array(
        "method" => "post",
        "enctype" => "multipart/form-data",
        "class" => "mb-2",
        "action" => "/admin/adminProductManagement/addBrand",
        "name" => "addBrandForm"
    )
);

$formElement = array();
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "title_fa",
    "required" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3"
    ),
    "label" => array(
        "text" => "نام برند"
    ),
);
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "title_en",
    "required" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3"
    ),
    "label" => array(
        "text" => "نام انگلیسی"
    ),
);
$formElement[] = array(
    "type" => (new FormFileElement()),
    "name" => "logo_src",
    "attributes" => array(
        "class" => "mb-3 form-control col-6"
    ),
    "label" => array(
        "text" => "لوگو"
    )
);

$formElement[] = array(
    "type" => (new FormSubmitElement()),
    "name" => "submitAddCategory",
    "attributes" => array(
        "value" => "افزودن",
        "class" => "d-block btn btn-primary"
    )
);

$form = new Form($formElement, $formConfig);