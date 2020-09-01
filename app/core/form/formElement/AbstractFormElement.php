<?php

namespace Form\FormElement;

use Form\FormException;

abstract class AbstractFormElement implements FormElementInterface, FormLabelInterface
{
    /**
     * @var $elementDetail
     * detail to create element and label
     */
    protected $elementDetail;

    /**
     * @var $element
     * created the input
     */
    protected $element;

    /**
     * @var $label
     *
     * created the label
     */
    protected $label = "";

    /**
     * @var $finalContent
     *
     * final content: label + input + ( maybe patent tag )
     */
    protected $finalContent = "";

    /**
     * @var $needleParentAll
     *
     * when define a parent tag that surround label and input
     * it need a needle to put label and input instead of it
     */
    protected $needleParentAll = "{{__CONTENT__}}";

    /**
     * @var $needleParentElement
     *
     * when define a parent tag that surround input
     * it need a needle to put input instead of it
     */
    protected $needleParentElement = "{{__CONTENT__}}";

    /**
     * @var $needleParentLabel
     *
     * when define a parent tag that surround label
     * it need a needle to put label instead of it
     */
    protected $needleParentLabel = "{{__CONTENT__}}";

    /**
     * @var $requireFeaturesElement
     *
     * in $elementDetail some keys maybe require to create element, they are here
     */
    protected $requireFeaturesElement = array();

    /**
     * @param array $elementDetail
     * @return string
     * @throws FormException
     *
     * this is the main method that will be call and final content
     * must be return
     */
    public function create(array $elementDetail) : string
    {
        $this->elementDetail = $elementDetail;
        $this->removeKeyTypeFormElementArray();
        $this->createElement();
        $this->createLabel();
        $this->finalContent = $this->label . $this->element;
        $this->replaceParentAll();

        return $this->finalContent;
    }

    /**
     * @return string
     * @throws FormException
     */
    public function createLabel() : string
    {
        if (array_key_exists("label", $this->elementDetail)) {

            $this->validateLabelFeatures();

            $attributes = "";

            if (array_key_exists("attributes", $this->elementDetail["label"])) {

                if (!is_array($this->elementDetail["label"]["attributes"])) {

                    throw new FormException("
                    attributes
                    لیبل تگ های فرم باید آرایه باشد
                    ");
                }

                foreach ($this->elementDetail["label"]["attributes"] as $attribute => $value) {

                    $attributes .= "$attribute='$value' ";
                }
            }

            $this->label = "<label $attributes>" . $this->elementDetail["label"]["text"] . "</label>";

            $this->replaceParentLabel();

            return $this->label;
        }

        return "";
    }

    /**
     * remove type key form elements detail
     * because it is unnecessary
     * and make some error and handle this make some costs
     */
    protected function removeKeyTypeFormElementArray()
    {
        unset($this->elementDetail["type"]);
    }

    /**
     * @throws FormException
     *
     * some keys maybe require to create element, they check here
     */
    protected function validateElementFeatures()
    {
        foreach ($this->requireFeaturesElement as $requireFeature) {

            if (!array_key_exists($requireFeature, $this->elementDetail)) {

                throw new FormException("
                    آرایه ای که برای ساختن تگ از نوع
                    $this->inputType
                    ایجاد شده است باید شامل کلید " .
                    $requireFeature .
                    " باشد");
            }
        }
    }

    /**
     * @return string
     *
     * put input tag in a parent tag (can be anything)
     */
    protected function replaceParentElement() : string
    {
        if (
            array_key_exists("parentElement", $this->elementDetail) and
            strpos($this->elementDetail["parentElement"], $this->needleParentElement) !== false
        ) {

            $this->element = str_replace(
                $this->needleParentElement,
                $this->element,
                $this->elementDetail["parentElement"]
            );
        }

        return $this->element;
    }

    /**
     * @throws FormException
     */
    protected function validateLabelFeatures()
    {
        $requireFeatures = array(
            "text"
        );

        foreach ($requireFeatures as $requireFeature) {

            if (!array_key_exists($requireFeature, $this->elementDetail["label"])) {

                throw new FormException("
                    آرایه ای که برای ساختن لیبیل تگ های فرم ایجاد شده است باید شامل کلید
                    " . $requireFeature . " باشد");
            }
        }
    }

    /**
     * @return string
     *
     * put label tag in a parent tag (can be anything)
     */
    protected function replaceParentLabel() : string
    {
        if (
            array_key_exists("parentLabel", $this->elementDetail["label"]) and
            strpos(
                $this->elementDetail["label"]["parentLabel"],
                $this->needleParentLabel
            ) !== false
        ) {
            $this->label = str_replace(
                $this->needleParentLabel,
                $this->label,
                $this->elementDetail["label"]["parentLabel"]
            );
        }

        return $this->label;
    }

    /**
     * @return string
     *
     * put label and input tag in a parent tag (can be anything)
     */
    protected function replaceParentAll() : string
    {
        if (
            array_key_exists("parentAll", $this->elementDetail) and
            strpos($this->elementDetail["parentAll"], $this->needleParentAll) !== false
        ) {
            $this->finalContent = str_replace(
                $this->needleParentAll,
                $this->finalContent,
                $this->elementDetail["parentAll"]
            );
        }

        return $this->finalContent;
    }
}