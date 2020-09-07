<?php

use Form\Form;
use Form\FormElement\FormSubmitElement;
use Form\FormElement\FormTextElement;
use Form\FormElement\FormFileElement;
use Form\Validator\ValidatorEnglishLetters;
use Form\Validator\ValidatorFarsiLetters;


$formConfig = array(
    "attributes" => array(
        "method" => "post",
        "enctype" => "multipart/form-data",
        "class" => "mb-2",
        "action" => "/admin/adminProductManagement/editBrand/$editingBrandId",
        "name" => "editingBrandForm"
    )
);


$formElement = array();

$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "title_fa",
    "required" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3",
        "value" => $select['title_fa']
    ),
    "label" => array(
        "text" => "نام برند"
    ),
    "validator" => (new ValidatorFarsiLetters())
);
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "title_en",
    "required" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3",
        "value" => $select['title_en']
    ),
    "label" => array(
        "text" => "نام انگلیسی"
    ),
    "validator" => (new ValidatorEnglishLetters())
);
$formElement[] = array(
    "type" => (new FormFileElement()),
    "name" => "logo_src",
    "parentElement" => "<div class='mb-3 no-padding col-6'>
                        {{__CONTENT__}}
                             <div class='input-group'>
                                <span class='input-group-addon'>
                                    <i class='fa fa-file-image-o'></i>
                                </span>
                                <input type='text' class='form-control left-to-right' placeholder='{$select['logo_src']}'>
                                <span class='input-group-btn'>
                                    <button class='upload-field btn btn-info' type='button'>
                                        <i class='fa fa-search'></i> انتخاب
                                    </button>
                                </span>
                            </div>
                        </div>",
    "attributes" => array(
        "accept" => ".jpg,.jpeg,.jfif,.pjpeg,.pjp,.png",
        "class" => "input-file"
    ),
    "label" => array(
        "text" => "تصویر لوگو"
    )
);

$formElement[] = array(
    "type" => (new FormSubmitElement()),
    "name" => "editingBrandBtn",
    "attributes" => array(
        "value" => "افزودن",
        "class" => "d-block btn btn-primary"
    )
);

$form = new Form($formElement, $formConfig);