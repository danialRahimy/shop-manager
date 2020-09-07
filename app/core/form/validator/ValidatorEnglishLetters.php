<?php

namespace Form\Validator;

class ValidatorEnglishLetters implements ValidatorInterface
{
    private $isValid;
    private $input;
    private $replaceNeedle = "{{__NAME__}}";

    public function validate(string $input): bool
    {
        if (!is_null($this->isValid))
            return $this->isValid;

        $this->input = $input;

        if (empty($this->input))
            return $this->isValid = false;

        if (
            strpos("#", $this->input) !== 0 and
            strpos("#", $this->input) !== (strlen($this->input) -1)
        ){
            if (preg_match("#^([a-zA-Z0-9 ])+$#", $this->input))
                return $this->isValid = true;
        }

        return $this->isValid = false;
    }

    public function getMessage(string $input): string
    {
        if (is_null($this->input))
            $this->input = $input;

        if (!$this->validate($this->input))
            return "فیلد " . $this->replaceNeedle . " باید فقط شامل حروف انگلیسی باشد";

        return "";
    }

    public function getReplaceNeedle(): string
    {
        return $this->replaceNeedle;
    }
}