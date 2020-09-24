<?php

$routes[] = array("home", "client", "index");

$routes[] = array("category/{catID}/{subCatID}", "client", "subCategory");
$routes[] = array("category/{catID}", "client", "category");
$routes[] = array("category", "client", "index");

$routes[] = array("product/{productID}", "client", "product");

$routes[] = array("login-register", "client", "loginRegisterForms");
$routes[] = array("login", "client", "login");
$routes[] = array("register", "client", "register");

$routes[] = array("product/toggleFavorite/{productID}", "ClientProduct", "toggleFavorite");
$routes[] = array("product/toggleLike/{productID}", "ClientProduct", "toggleLike");