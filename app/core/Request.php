<?php

trait Request
{
    public function getRequest(string $name, string $default = "") : string
    {
        if (isset($_REQUEST[$name])){
            return $this->safeInput($_REQUEST[$name]);
        }elseif(!empty($default)){
            return $this->safeInput($default);
        }

        return "";
    }

    private function safeInput(string $name) : string
    {
        $name = trim($name);
        $name = addslashes($name);
        $name = htmlspecialchars($name);

        return $name;
    }
}