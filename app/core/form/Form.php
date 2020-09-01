<?php

namespace Form;

use Form\FormElement\FormElementInterface;
use Form\Validator\ValidatorInterface;

class Form implements FormInterface
{
    use \Request;

    private $elements;
    private $requireFeatures;
    private $formConfig;
    private $tags;
    private $form;
    private $method;
    private $isSubmit;
    private $isValid;
    private $needleParentAllTags = "{{__CONTENT__}}";
    private $errorMessagesNeedle = "{{__CONTENT__}}";
    private $errorMessagesArray = array();
    private $errorMessagesString;

    public function __construct(
        array $elements = array(),
        array $formConfig = array()
    ){
        $this->elements = $elements;
        $this->formConfig = $formConfig;
        $this->requireFeatures = array(
            "type", "name"
        );

        $this->validateRequireFeatures();
    }

    public function getForm() : string
    {
        $this->createTags();
        $this->createFormTag();

        return $this->form;
    }

    public function isSubmit() : bool
    {
        if (!is_null($this->isSubmit))
            return $this->isSubmit;

        if ($_SERVER["REQUEST_METHOD"] === $this->getMethod()){

            $names = $this->getAllTagNameAttribute();

            foreach ($names as $name){

                if (isset($_REQUEST[$name])){

                    return $this->isSubmit = true;
                }
            }
        }

        return $this->isSubmit = false;
    }

    public function isValid() : bool
    {
        if (!$this->isSubmit())
            return false;

        if (!is_null($this->isValid))
            return $this->isValid;

        $isValid = true;

        foreach ($this->elements as $key => $value){

            $name = $value["name"];

            if (
                array_key_exists("label", $value) and
                is_array($value["label"]) and
                array_key_exists("text", $value["label"])
            ){

                $name = $value["label"]["text"];
            }

            if (array_key_exists("required", $value) and $value["required"]){

                if (empty($this->getRequest($value["name"]))){

                    $this->errorMessagesArray[] = "فیلد " . $name . " نباید خالی باشد";
                    $isValid = false;
                }
            }

            if (array_key_exists("validator", $value)){

                if (!$value["validator"] instanceof ValidatorInterface){

                    throw new FormException("
                    validator
                    تگ های فرم باید از نوع
                     ValidatorInterface
                     باشد
                    ");
                }

                if (!$value["validator"]->validate($this->getRequest($value["name"]))){

                    $message = $value["validator"]->getMessage($this->getRequest($value["name"]));
                    $message = str_replace(
                        $value["validator"]->getReplaceNeedle(),
                        $name,
                        $message
                    );
                    $this->errorMessagesArray[] = $message;

                    $isValid =  false;
                }
            }
        }

        return $this->isValid = $isValid;
    }

    public function getRawErrorMessageAsArray() : array
    {
        if (!$this->isSubmit())
            return array();

        return $this->errorMessagesArray;
    }

    public function getErrorMessage() : string
    {
        if (!$this->isSubmit())
            return "";

        if (!is_null($this->errorMessagesString))
            return $this->errorMessagesString;

        $this->errorMessagesString = "";
        $template = "<div class='alert alert-danger'>" . $this->errorMessagesNeedle . "</div>";

        if (isset($this->formConfig["errorMessage"]["template"])){

            if (
                strpos(
                    $this->formConfig["errorMessage"]["template"],
                    $this->errorMessagesNeedle
                ) === false
            ){
                throw new FormException(
                    "کلید " . "template " . "در فرم کانفیگ باشد شامل " .
                    $this->errorMessagesNeedle . " باشد"
                );
            }

            $template = $this->formConfig["errorMessage"]["template"];
        }

        foreach ($this->getRawErrorMessageAsArray() as $message){
            $this->errorMessagesString .= str_replace(
                $this->errorMessagesNeedle,
                $message,
                $template
            );
        }

        return $this->errorMessagesString;
    }

    public function getSampleElementArray()
    {
        $elements = array(
            "type" => "شیء از اینترفیس FormElementInterface باشد و اجباری است",
            "name" => "اتریبوت name و اجباری است",
            "attributes" => array(
                "نام اتریبیوت" => "مقدار اتریبویت"
            ),
            "label" => array(
                "text" => "متن داخل لیبل",
                "attributes" => array(
                    "نام اتریبیوت" => "مقدار اتریبویت"
                )
            )
        );

        return $elements;
    }

    protected function replaceParentAll()
    {
        if (
            array_key_exists("parentAllTags", $this->formConfig) and
            strpos($this->formConfig["parentAllTags"], $this->needleParentAllTags) !== false
        ){
            $this->tags = str_replace(
                $this->needleParentAllTags,
                $this->tags,
                $this->formConfig["parentAllTags"]
            );
        }
    }

    protected function replaceBeforeAllTags()
    {
        if (array_key_exists("beforeAllTags", $this->formConfig)){

            if (!is_array($this->formConfig["beforeAllTags"])){

                throw new FormException("
                    beforeAllTags
                    کانفیگ فرم باید آرایه باشد
                    ");
            }

            if (!array_key_exists("content", $this->formConfig["beforeAllTags"])){

                throw new FormException("
                    beforeAllTags
                    کانفیگ فرم باید شامل کلید 
                     content
                     باشد
                    ");
            }

            $this->tags = $this->formConfig["beforeAllTags"]["content"] . $this->tags;
        }
    }

    protected function replaceAfterAllTags()
    {
        if (array_key_exists("afterAllTags", $this->formConfig)){

            if (!is_array($this->formConfig["afterAllTags"])){

                throw new FormException("
                    afterAllTags
                    کانفیگ فرم باید آرایه باشد
                    ");
            }

            if (!array_key_exists("content", $this->formConfig["afterAllTags"])){

                throw new FormException("
                    afterAllTags
                    کانفیگ فرم باید شامل کلید 
                     content
                     باشد
                    ");
            }

            $this->tags = $this->tags . $this->formConfig["afterAllTags"]["content"];
        }
    }

    private function createFormTag()
    {
        $attributes = "";

        if (array_key_exists("attributes", $this->formConfig)){

            if (!is_array($this->formConfig["attributes"])){

                throw new FormException("
                    attributes
                    کانفیگ فرم باید آرایه باشد
                    ");
            }

            foreach ($this->formConfig["attributes"] as $attribute => $value){
                $attributes .= "$attribute='$value' ";
            }
        }

        $this->form = "<form $attributes>{{__ELEMENTS__}}</form>";

        $this->replaceBeforeAllTags();
        $this->replaceAfterAllTags();
        $this->replaceParentAll();

        $this->form = str_replace("{{__ELEMENTS__}}", $this->tags, $this->form);
    }

    private function validateRequireFeatures()
    {
        foreach ($this->elements as $element){

            foreach ($this->requireFeatures as $requireFeature){

                if (!array_key_exists($requireFeature, $element)){

                    throw new FormException("
                    آرایه ای که برای ساختن تگ های فرم ایجاد شده است باید شامل کلید
                    " . $requireFeature . " باشد");
                }
            }
        }
    }

    private function createTags()
    {
        foreach ($this->elements as $element){

            if (!$element["type"] instanceof FormElementInterface){
                throw new FormException("
                    کلید 
                    type
                    باید از نوع 
                    FormElementInterface
                    باشد
                    ");
            }

            $this->tags .= $element["type"]->create($element);
        }
    }

    private function getMethod()
    {
        if (!is_null($this->method))
            return $this->method;

        $this->method = "GET";

        if (
            is_array($this->formConfig) and
            array_key_exists("attributes", $this->formConfig) and
            is_array($this->formConfig) and
            array_key_exists("method", $this->formConfig["attributes"])
        ){

            $this->method = strtoupper($this->formConfig["attributes"]["method"]);
        }

        return $this->method;
    }

    private function getAllTagNameAttribute()
    {
        $names = array();

        foreach ($this->elements as $key => $value){

            $names[] = $value["name"];
        }

        return $names;
    }
}