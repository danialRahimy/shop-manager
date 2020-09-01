<?php

namespace Form\FormElement;

use Form\FormException;

class FormSelectElement extends AbstractFormElement
{
    /**
     * @var $requireFeaturesElement
     *
     * in $elementDetail some keys maybe require to create element, they are here
     */
    protected $requireFeaturesElement = array(
        "options"
    );

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

        $options = "";
        foreach ($this->elementDetail["options"] as $value => $text) {

            $options .= "<option value='$value'>{$text}</option>";
        }

        $this->element = "<select {$tagAttribute}>$options</select>";

        $this->replaceParentElement();

        return $this->element;
    }
}