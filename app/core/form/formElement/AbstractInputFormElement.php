<?php

namespace Form\FormElement;

use Form\FormException;

abstract class AbstractInputFormElement extends AbstractFormElement
{
    /**
     * @var $inputType
     * input type : text|password|email|url| ... and all input type
     */
    protected $inputType;

    /**
     * @var $requireFeaturesElement
     *
     * in $elementDetail some keys maybe require to create element, they are here
     */
    protected $requireFeaturesElement = array();

    /**
     * @return string
     * @throws FormException
     */
    public function createElement() : string
    {
        $this->validateElementFeatures();

        $tagAttribute = "type='$this->inputType' ";
        $tagAttribute .= "name='" . $this->elementDetail["name"] . "' ";

        if (
            array_key_exists("required", $this->elementDetail) and
            $this->elementDetail["required"]
        ) {

            $tagAttribute .= "required ";
        }
        if (
            array_key_exists("checked", $this->elementDetail) and
            $this->elementDetail["checked"]
        ) {

            $tagAttribute .= "checked ";
        }
        if (
            array_key_exists("disabled", $this->elementDetail) and
            $this->elementDetail["disabled"]
        ) {

            $tagAttribute .= "disabled ";
        }

        if (array_key_exists("attributes", $this->elementDetail)) {

            if (!is_array($this->elementDetail["attributes"])) {

                throw new FormException("
                    attributes
                    تگ های فرم باید آرایه باشد
                    ");
            }

            foreach ($this->elementDetail["attributes"] as $attribute => $value) {

                $tagAttribute .= "$attribute='$value' ";
            }
        }

        $this->element = "<input $tagAttribute>";

        $this->replaceParentElement();

        return $this->element;
    }
}