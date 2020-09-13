<?php

$routes[] = array("admin/login", "admin", "login");
$routes[] = array("admin/panel", "admin", "panel");

$routes[] = array("admin/adminUserManagement/roleList", "adminUserManagement", "roleList");
$routes[] = array("admin/adminUserManagement/addRole", "adminUserManagement", "addRole");

$routes[] = array("admin/adminProductManagement/productList", "adminProductManagement", "productList");

// START // adminProductManagement Categories
$routes[] = array("admin/adminProductManagement/categoriesList", "adminProductManagement", "categoriesList");
$routes[] = array("admin/adminProductManagement/addCategory", "adminProductManagement", "addCategory");
$routes[] = array("admin/adminProductManagement/editingCategory/{id}", "adminProductManagement", "editingCategory");
$routes[] = array("admin/adminProductManagement/editCategory/{id}", "adminProductManagement", "editCategory");
$routes[] = array("admin/adminProductManagement/deletingCategory/{id}", "adminProductManagement", "deletingCategory");
$routes[] = array("admin/adminProductManagement/removeCategory/{id}", "adminProductManagement", "removeCategory");
// END // adminProductManagement Categories

// START // adminProductManagement colorsList
$routes[] = array("admin/adminProductManagement/colorsList", "adminProductManagement", "colorsList");
$routes[] = array("admin/adminProductManagement/addColor", "adminProductManagement", "addColor");
$routes[] = array("admin/adminProductManagement/editingColor/{id}", "adminProductManagement", "editingColor");
$routes[] = array("admin/adminProductManagement/editColor/{id}", "adminProductManagement", "editColor");
$routes[] = array("admin/adminProductManagement/deletingColor/{id}", "adminProductManagement", "deletingColor");
$routes[] = array("admin/adminProductManagement/removeColor/{id}", "adminProductManagement", "removeColor");
// END // adminProductManagement colorsList

// START // adminProductManagement brandsList
$routes[] = array("admin/adminProductManagement/brandsList", "adminProductManagement", "brandsList");
$routes[] = array("admin/adminProductManagement/addBrand", "adminProductManagement", "addBrand");
$routes[] = array("admin/adminProductManagement/editingBrand/{id}", "adminProductManagement", "editingBrand");
$routes[] = array("admin/adminProductManagement/editBrand/{id}", "adminProductManagement", "editBrand");
$routes[] = array("admin/adminProductManagement/deletingBrand/{id}", "adminProductManagement", "deletingBrand");
$routes[] = array("admin/adminProductManagement/removeBrand/{id}", "adminProductManagement", "removeBrand");
// END // adminProductManagement brandsList

// START // adminProductManagement brandsList
$routes[] = array("admin/adminProductManagement/addProduct", "adminProductManagement", "addProduct");
// END // adminProductManagement brandsList


$routes[] = array("admin/adminProductManagement/test", "adminProductManagement", "test");
