<?php

trait Request
{
    public function getRequest(string $name) : string
    {
        if (isset($_REQUEST[$name])){
            return $this->safeInput($_REQUEST[$name]);
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