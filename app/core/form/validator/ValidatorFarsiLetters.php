<?php

namespace Form\Validator;

class ValidatorFarsiLetters implements ValidatorInterface
{
    private $isValid;
    private $input;
    private $replaceNeedle = "{{__content__}}";

    public function validate(string $input): bool
    {
        if (!is_null($this->isValid))
            return $this->isValid;

        $this->input = $input;

        if (strpos($input,"?") !== false)
            return $this->isValid = false;

        $dataValid = utf8_decode($input);

        if (!preg_match("/^[\?]+$/", $dataValid))
            return $this->isValid = false;

        return $this->isValid = true;
    }

    public function getMessage(string $input): string
    {
        if (is_null($this->input))
            $this->input = $input;

        if (!$this->validate($this->input))
            return "فیلد " . $this->replaceNeedle . " باید فقط شامل حروف فارسی باشد";

        return "";
    }

    public function getReplaceNeedle(): string
    {
        return $this->replaceNeedle;
    }
}