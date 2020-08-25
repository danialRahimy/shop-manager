<?php

if (
    !isset($_SESSION["admin"]["user"]["isValid"]) and
    strpos($_SERVER["REQUEST_URI"], "admin/login") === false
)
    header("Location: " . SUB_DIRECTORY . "/admin/login");