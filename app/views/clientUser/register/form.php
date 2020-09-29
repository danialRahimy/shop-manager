<?php

use Form\Form;
use Form\FormElement\FormSubmitElement;
use Form\FormElement\FormTextElement;
use Form\Validator\ValidatorEnglishLetters;
use Form\FormElement\FormPasswordElement;

use Form\FormElement\FormEmailElement;
use Form\FormElement\FormTelElement;


////////////////////////////////////////////////////////////////
//register form
////////////////////////////////////////////////////////////////

$registerFormConfig = array(
    "attributes" => array(
        "method" => "post",
        "class" => "mb-2",
        "action" => "/register",
        "name" => "userRegisterForm"
    )
);

$registerFormElement = array();
$registerFormElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "name",
    "attributes" => array(
        "class" => "form-control col-12 mb-3",
        "placeholder" => "علی"
    ),
    "label" => array(
        "text" => "نام"
    ),
);

$registerFormElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "family",
    "attributes" => array(
        "class" => "form-control col-12 mb-3",
        "placeholder" => "علوی"
    ),
    "label" => array(
        "text" => "نام خانوادگی"
    )
);

$registerFormElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "username",
    "required" => true,
    "attributes" => array(
        "class" => "form-control col-12 mb-3",
        "placeholder" => "ali70"
    ),
    "label" => array(
        "text" => "* نام کاربری"
    ),
    "validator" => (new ValidatorEnglishLetters())
);

$registerFormElement[] = array(
    "type" => (new FormEmailElement()),
    "name" => "email",
    "attributes" => array(
        "class" => "form-control col-12 mb-3",
        "placeholder" => "ali.alivi@gmial.com"
    ),
    "label" => array(
        "text" => "آدرس ایمیل"
    )
);

$registerFormElement[] = array(
    "type" => (new FormTelElement()),
    "name" => "tel",
    "attributes" => array(
        "class" => "form-control col-12 mb-3",
        "placeholder" => "09129123344"
    ),
    "label" => array(
        "text" => "* شماره همراه",
    )
);

$registerFormElement[] = array(
    "type" => (new FormPasswordElement()),
    "name" => "password",
    "required" => true,
    "attributes" => array(
        "class" => "form-control col-12 mb-3",
        "placeholder" => "********"
    ),
    "label" => array(
        "text" => "* رمز عبور"
    ),
);

$registerFormElement[] = array(
    "type" => (new FormSubmitElement()),
    "name" => "registerBtn",
    "attributes" => array(
        "value" => "ثبت نام",
        "class" => "d-block btn col-8 login-register-btn mx-auto mt-3"
    )
);

$registerForm = new Form($registerFormElement, $registerFormConfig);