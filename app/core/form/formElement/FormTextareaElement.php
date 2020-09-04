<?php

namespace Form\FormElement;

use Form\FormException;

class FormTextareaElement extends AbstractFormElement
{
    /**
     * @return string
     * @throws FormException
     */
    public function createElement() : string
    {
        $this->validateElementFeatures();

        $tagAttribute = "name='" . $this->elementDetail["name"] . "' ";

        if (
            array_key_exists("required", $this->elementDetail) and
            $this->elementDetail["required"]
        ) {

            $tagAttribute .= "required ";
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

                $tagAttribute .= "{$attribute}='{$value}' ";
            }
        }

        $innerText = "";
        if (isset($this->elementDetail["text"])) {

            $innerText = $this->elementDetail["text"];
        }

        $this->element = "<textarea {$tagAttribute}>{$innerText}</textarea>";

        $this->replaceParentElement();

        return $this->element;
    }
}