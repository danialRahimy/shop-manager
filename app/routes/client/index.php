<?php

$routes[] = array("home", "client", "index");

$routes[] = array("category/{catID}/{subCatID}", "client", "subCategory");
$routes[] = array("category/{catID}", "client", "category");
$routes[] = array("category", "client", "index");

$routes[] = array("product/{productID}", "client", "product");

$routes[] = array("login-register", "client", "loginRegisterForms");
$routes[] = array("login", "client", "login");
$routes[] = array("register", "client", "register");