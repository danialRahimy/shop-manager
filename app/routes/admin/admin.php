<?php

$routes[] = array("admin/login", "admin", "login");
$routes[] = array("admin/panel", "admin", "panel");

$routes[] = array("admin/adminUserManagement/roleList", "adminUserManagement", "roleList");
$routes[] = array("admin/adminUserManagement/addRole", "adminUserManagement", "addRole");

$routes[] = array("admin/adminProductManagement/productList", "adminProductManagement", "productList");

$routes[] = array("admin/adminProductManagement/categoriesList", "adminProductManagement", "categoriesList");
$routes[] = array("admin/adminProductManagement/addCategory", "adminProductManagement", "addCategory");
$routes[] = array("admin/adminProductManagement/selectCategoryForEdit", "adminProductManagement", "selectCategoryForEdit");
$routes[] = array("admin/adminProductManagement/editCategory", "adminProductManagement", "editCategory");
$routes[] = array("admin/adminProductManagement/deletingCategory", "adminProductManagement", "deletingCategory");
$routes[] = array("admin/adminProductManagement/removeCategory", "adminProductManagement", "removeCategory");

$routes[] = array("admin/adminProductManagement/colorsList", "adminProductManagement", "colorsList");
$routes[] = array("admin/adminProductManagement/addColor", "adminProductManagement", "addColor");
$routes[] = array("admin/adminProductManagement/editingColor", "adminProductManagement", "editingColor");
$routes[] = array("admin/adminProductManagement/editColor", "adminProductManagement", "editColor");
$routes[] = array("admin/adminProductManagement/deletingColor", "adminProductManagement", "deletingColor");
$routes[] = array("admin/adminProductManagement/removeColor", "adminProductManagement", "removeColor");

$routes[] = array("admin/adminProductManagement/brandsList", "adminProductManagement", "brandsList");
$routes[] = array("admin/adminProductManagement/addBrand", "adminProductManagement", "addBrand");
$routes[] = array("admin/adminProductManagement/editingBrand", "adminProductManagement", "editingBrand");
$routes[] = array("admin/adminProductManagement/editBrand", "adminProductManagement", "editBrand");
$routes[] = array("admin/adminProductManagement/deletingBrand", "adminProductManagement", "deletingBrand");
$routes[] = array("admin/adminProductManagement/removeBrand", "adminProductManagement", "removeBrand");