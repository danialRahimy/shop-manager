<?php

/**
 * If User not logged in, redirect to login
 */
if (
    !(new Authentication())->isValid() and
    strpos($_SERVER["REQUEST_URI"], "admin/login") === false
)
    header("Location: " . SUB_DIRECTORY . "/admin/login");

/**
 * If User is logged in, and current page is login
 * will redirect to panel
 */
if (
    (new Authentication())->isValid() and
    strpos($_SERVER["REQUEST_URI"], "admin/login") > 0
)
    header("Location: " . SUB_DIRECTORY . "/admin/panel");