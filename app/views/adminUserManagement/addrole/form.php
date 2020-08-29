<?php

use Form\Form;
use Form\FormElement\FormSubmitElement;
use Form\FormElement\FormTextElement;
use Form\Validator\ValidatorEnglishLetters;

$formConfig = array(
    "attributes" => array(
        "method" => "post",
        "class" => "d-flex align-items-center mb-2",
        "action" => "/admin/adminUserManagement/addRole",
        "name" => "addRoleForm"
    )
);

$formElement = array();
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "title",
    "required" => true,
    "attributes" => array(
        "class" => "form-control col-3 mx-2"
    ),
    "label" => array(
        "text" => "عنوان"
    ),
    "validator" => (new ValidatorEnglishLetters())
);

$formElement[] = array(
    "type" => (new FormSubmitElement()),
    "name" => "submitAddRole",
    "attributes" => array(
        "value" => "افزودن",
        "class" => "btn btn-primary"
    )
);

$form = new Form($formElement, $formConfig);