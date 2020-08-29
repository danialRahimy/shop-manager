<?php

namespace Form\FormElement;

interface FormElementInterface
{
    public function create(array $elementDetail);

    public function createElement();
}