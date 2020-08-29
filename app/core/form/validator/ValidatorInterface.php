<?php

namespace Form\Validator;

interface ValidatorInterface
{
    public function validate(string $input) : bool;

    public function getMessage(string $input) : string;

    public function getReplaceNeedle() : string;
}