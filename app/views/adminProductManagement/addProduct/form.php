<?php

use Form\Form;
use Form\FormElement\FormCheckboxElement;
use Form\FormElement\FormNumberElement;
use Form\FormElement\FormSelectElement;
use Form\FormElement\FormSubmitElement;
use Form\FormElement\FormSunEditorElement;
use Form\FormElement\FormTextareaElement;
use Form\FormElement\FormTextElement;
use Form\FormElement\FormFileElement;
use Form\Validator\ValidatorEnglishLetters;
use Form\Validator\ValidatorFarsiLetters;
$formConfig = array(
    "attributes" => array(
        "method" => "post",
        "enctype" => "multipart/form-data",
        "class" => "mb-2",
        "name" => "addBrandForm"
    )
);

$categoriesOptions = array();
foreach ($categories as $category) {

    if ($category["parent_id"] === 0)
        $categoriesOptions[$category['id']] = $category['title'];
}

$brandsOptions = array();
foreach ($brands as $brand) {

    $brandsOptions[$brand['id']] = $brand['title_fa'];
}

$colorsOptions = array();
foreach ($colors as $color) {

    $colorsOptions[$color['id']] = $color['title'];
}

$formConfig = array(
    "attributes" => array(
        "method" => "post",
        "enctype" => "multipart/form-data",
        "class" => "mb-2",
        "action" => "/admin/adminProductManagement/addProduct",
        "name" => "add-product-form"
    )
);

$formElement = array();
$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "title-fa",
//    "required" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3"
    ),
    "label" => array(
        "text" => "عنوان فارسی"
    ),
    "validator" => (new ValidatorFarsiLetters())
);

$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "title-en",
//    "required" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3"
    ),
    "label" => array(
        "text" => "عنوان انگلیسی"
    ),
    "validator" => (new ValidatorEnglishLetters())
);

$formElement[] = array(
    "type" => (new FormFileElement()),
    "name" => "image",
    "parentElement" => "<div class='mb-3 no-padding col-6'>
                        {{__CONTENT__}}
                         <div class='input-group'>
                            <span class='input-group-addon'>
                                <i class='fa fa-file-image-o'></i>
                            </span>
                            <input type='text' class='form-control' disabled placeholder='تصویر شاخص'>
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
        "text" => "تصویر شاخص"
    )
);

$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "alt-image",
//    "required" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3"
    ),
    "label" => array(
        "text" => "متن جایگزین تصویر"
    ),
);

$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "sell-price",
//    "required" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3",
        "data-mask-price" => "true"
    ),
    "label" => array(
        "text" => "قیمت فروش"
    ),
//    "validator" => (new ValidatorEnglishLetters())
);

$formElement[] = array(
    "type" => (new FormTextElement()),
    "name" => "quantity",
//    "required" => true,
    "attributes" => array(
        "class" => "form-control col-6 mb-3",
        "data-mask-price" => "true"
    ),
    "label" => array(
        "text" => "تعداد"
    ),
//    "validator" => (new ValidatorEnglishLetters())
);

$formElement[] = array(
    "type" => (new FormSelectElement()),
    "name" => "category",
    "attributes" => array(
        "class" => "mb-3 form-control col-6"
    ),
    "label" => array(
        "text" => "دسته بندی مادر"
    ),
    "options" => $categoriesOptions
);

$formElement[] = array(
    "type" => (new FormSelectElement()),
    "name" => "sub-category",
    "attributes" => array(
        "class" => "mb-3 form-control col-6"
    ),
    "label" => array(
        "text" => "زیر دسته بندی"
    ),
    "options" => array()
);

$formElement[] = array(
    "type" => (new FormSelectElement()),
    "name" => "brand",
    "attributes" => array(
        "class" => "mb-3 form-control col-6"
    ),
    "label" => array(
        "text" => "برند"
    ),
    "options" => $brandsOptions
);

$formElement[] = array(
    "type" => (new FormSelectElement()),
    "name" => "color",
    "attributes" => array(
        "class" => "mb-3 form-control col-6"
    ),
    "label" => array(
        "text" => "رنگ"
    ),
    "options" => $colorsOptions
);

$formElement[] = array(
    "type" => (new FormSunEditorElement()),
    "name" => "description",
    "attributes" => array(
        "class" => "form-control col-12",
        "rows" => "15"
    ),
    "label" => array(
        "text" => "توضیحات"
    ),
);

$formElement[] = array(
    "type" => (new FormCheckboxElement()),
    "name" => "publish",
    "checked" => "true",
    "attributes" => array(
        "class" => "form-check-input my-4",
        "id" => "publish",
    ),
    "label" => array(
        "text" => "منتشر شود",
        "attributes" => array(
            "for" => "publish",
            "class" => "form-check-label ml-3 my-3 pt-1",
        )
    )
);

$formElement[] = array(
    "type" => (new FormSubmitElement()),
    "name" => "add-product",
    "attributes" => array(
        "value" => "افزودن",
        "class" => "d-block btn btn-primary"
    )
);

$form = new Form($formElement, $formConfig);

echo $form->getForm();

