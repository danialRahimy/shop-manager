<?php

$routes[] = array("home", "client", "index");
$routes[] = array("404", "client", "pageNotFound");

$routes[] = array("category/{catID}/{subCatID}", "client", "subCategory");
$routes[] = array("category/{catID}", "client", "category");
$routes[] = array("category", "client", "index");

$routes[] = array("product/{productID}", "client", "product");
$routes[] = array("product/toggleFavorite/{productID}", "ClientProduct", "toggleFavorite");
$routes[] = array("product/toggleLike/{productID}", "ClientProduct", "toggleLike");

$routes[] = array("login-register", "clientUser", "loginRegisterForms");
$routes[] = array("login", "clientUser", "login");
$routes[] = array("register", "clientUser", "register");
$routes[] = array("user/logout", "clientUser", "logout");
$routes[] = array("user/profile", "clientUser", "profile");
$routes[] = array("user/edit-profile", "clientUser", "editProfile");


$routes[] = array("user/orders", "client", "orders");
$routes[] = array("user/order-detail/{factor_id}", "client", "orderDetail");
$routes[] = array("cart", "client", "cart");