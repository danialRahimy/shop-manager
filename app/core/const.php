<?php

define("SUB_DIRECTORY", "");
define("ROOT", $_SERVER["DOCUMENT_ROOT"] . SUB_DIRECTORY);
define("STATIC_PATH", SUB_DIRECTORY . "/public/assets");
define("FILES_PATH", ROOT . "/files");
define("APP_PATH", $_SERVER["DOCUMENT_ROOT"] . "/app");
define("CORE_PATH", APP_PATH . "/core");
define("CONTROLLER_PATH", APP_PATH . "/controller");
define("MODEL_PATH", APP_PATH . "/model");
define("VIEW_PATH", APP_PATH . "/views");
define("TEMPLATE_PATH", APP_PATH . "/template");
define("OPERATION_SYSTEM", "windows"); // linux

// DATABASE TABLES

define("TB_ADMIN_USERS", "admin_user");
define("TB_ADMIN_ROLE", "acl_role");
define("TB_PRODUCT", "product");
define("TB_PRODUCT_CATEGORIES", "product_category");
define("TB_PRODUCT_COLORS", "product_color");
define("TB_PRODUCT_relation_COLORS", "product_relation_color");
define("TB_PRODUCT_BRANDS", "product_brand");
define("TB_PRODUCT_IMAGE", "product_image");