<?php

use Form\Form;
use Form\FormElement\FormSubmitElement;
use Form\FormElement\FormTextElement;
use Form\Validator\ValidatorEnglishLetters;
use Form\FormElement\FormPasswordElement;


////////////////////////////////////////////////////////////////
//login form
////////////////////////////////////////////////////////////////

$loginFormConfig = array(
    "attributes" => array(
        "method" => "post",
        "class" => "mb-2",
        "action" => "/login",
        "name" => "userLoginForm"
    )
);

$loginFormElement = array();
$loginFormElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "email_or_username",
    "required" => true,
    "attributes" => array(
        "class" => "form-control col-12 mb-3",
        "placeholder" => "ali70 Or ali.alavi@gmail.com"
    ),
    "label" => array(
        "text" => "آدرس ایمیل یا نام کاربری"
    ),
    "validator" => (new ValidatorEnglishLetters())
);

$loginFormElement[] = array(
    "type" => (new FormPasswordElement()),
    "name" => "password",
    "required" => true,
    "attributes" => array(
        "class" => "form-control col-12 mb-3",
        "placeholder" => "********"
    ),
    "label" => array(
        "text" => "رمز عبور"
    ),
);

$loginFormElement[] = array(
    "type" => (new FormSubmitElement()),
    "name" => "userLoginBtn",
    "attributes" => array(
        "value" => "ورود",
        "class" => "d-block btn col-8 login-register-btn mx-auto mt-3"
    )
);

$loginForm = new Form($loginFormElement, $loginFormConfig);