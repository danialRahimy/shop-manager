<?php

namespace Form;

interface FormInterface
{
    public function getForm() : string;

    public function isSubmit() : bool;

    public function isValid() : bool;

    public function getRawErrorMessageAsArray() : array;

    public function getErrorMessage() : string;
}