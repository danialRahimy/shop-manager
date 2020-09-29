<?php

use Form\Form;
use Form\FormElement\FormSubmitElement;
use Form\FormElement\FormTextElement;
use Form\FormElement\FormEmailElement;
use Form\Validator\ValidatorFarsiLetters;


$formConfig = array(
    "attributes" => array(
        "method" => "post",
        "class" => "mb-2",
        "action" => "",
        "name" => "edit-profile-form"
    )
);


$formElement = array();
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "name",
    "attributes" => array(
        "class" => "form-control col-6 mb-3",
        "value" => $customerName
    ),
    "label" => array(
        "text" => "نام"
    ),
    "validator" => (new ValidatorFarsiLetters())
);
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "family",
    "attributes" => array(
        "class" => "form-control col-6 mb-3",
        "value" => $customerFamily
    ),
    "label" => array(
        "text" => "نام خانوادگی"
    ),
    "validator" => (new ValidatorFarsiLetters())
);

$formElement[] = array(
    "type" => (new FormEmailElement()),
    "name" => "email",
    "attributes" => array(
        "class" => "form-control col-6 mb-3",
        "value" => $customerEmail
    ),
    "label" => array(
        "text" => "آدرس ایمیل"
    ),
);
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "cell-number",
    "attributes" => array(
        "class" => "form-control col-6 mb-3",
        "value" => $customerCellNumber
    ),
    "label" => array(
        "text" => "شماره همراه"
    )
);
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "cell-number",
    "attributes" => array(
        "class" => "form-control col-6 mb-3",
        "value" => $customerCreditCard
    ),
    "label" => array(
        "text" => "شماره کارت (مرجوعی)"
    )
);

$formElement[] = array(
    "type" => (new FormSubmitElement()),
    "name" => "edit-profile-form-btn",
    "attributes" => array(
        "value" => "اعمال تغییرات",
        "class" => "d-block btn btn-primary"
    )
);

$form = new Form($formElement, $formConfig);