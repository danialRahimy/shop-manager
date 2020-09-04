<?php

// سعی کردم با استفاده از دانسته هام در زمینه solid و تمیز نویسی که یاد گرفتم فرم ساز و validator بسازم قطعا جای کار خیلی زیاد داره ولی سعی کردم که کار تمیز و مهمتر قابل توسعه ارائه کنم
// ممنون میشم بررسی کنید و اشکالات کارم رو توضیح بدید
// با تشکر

spl_autoload_register(function ($className){
    require_once "$className.php";
});

use Form\Form;
use Form\FormElement\FormSubmitElement;
use Form\FormElement\FormTextElement;
use Form\Validator\ValidatorEnglishLetters;

$formConfig = array(
    "afterAllTags" => "<div></div>", // this will put after all tags in form tag
    "beforeAllTags" => "<div></div>", // this will put before all tags in form tag
    "parentAllTags" => "
        <div>{{__CONTENT__}}</div>", //tag element and label all of them will put here instead of {{__CONTENT__}}
    "attributes" => array(
        "method" => "post",
        "class" => "d-flex align-items-center mb-2",
        "action" => "/admin/adminUserManagement/addRole",
        "name" => "addRoleForm"
    )
);

$formElement = array();
$formElement[] = array(
    "type" => (new FormTextElement()), // type of FormElementInterface
    "name" => "title",
    "parentAll" =>  "
    <div>{{__CONTENT__}}</div>",//tag element and label both will put here instead of {{__CONTENT__}}
    "parentElement" => "
    <div>{{__CONTENT__}}</div>",//tag element will put here instead of {{__CONTENT__}}
    "required" => true,
    "attributes" => array(
        "class" => "form-control col-3 mx-2"
    ),
    "label" => array(
        "text" => "عنوان",
        "parentLabel" => "
    <div>{{__CONTENT__}}</div>",//label element will put here instead of {{__CONTENT__}},
        "attributes" => array(
            "class" => "..."
        ),
    ),
    "validator" => (new ValidatorEnglishLetters()) // type of ValidatorInterface
);

$formElement[] = array(
    "type" => (new FormSubmitElement()),
    "name" => "submitAddRole",
    "attributes" => array(
        "value" => "افزودن",
        "class" => "btn btn-primary"
    )
);

$formObj = new Form($formElement, $formConfig);
$form = $formObj->getForm();// get all form tag element as string
$formObj->getErrorMessage();// get error messages as string in html tag
$formObj->isValid();// return true or false
$formObj->isSubmit();// return true or false
$formObj->getRawErrorMessageAsArray();// get just text error messages as an array