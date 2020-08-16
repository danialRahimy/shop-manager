<?php


class AutoLoad
{
    public function load($className)
    {
        require_once "$className.php";
    }

    public function register()
    {
        spl_autoload_register([$this, "load"]);
    }
}