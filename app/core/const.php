<?php

define("SUB_DIRECTORY", "");
define("ROOT", $_SERVER["DOCUMENT_ROOT"] . SUB_DIRECTORY);
define("STATIC_PATH", SUB_DIRECTORY . "/public/assets");
define("APP_PATH", $_SERVER["DOCUMENT_ROOT"] . "/app");
define("CORE_PATH", APP_PATH . "/core");
define("CONTROLLER_PATH", APP_PATH . "/controller");
define("MODEL_PATH", APP_PATH . "/model");
define("VIEW_PATH", APP_PATH . "/views");
define("TEMPLATE_PATH", APP_PATH . "/template");

// DATABASE TABLES

define("TB_ADMIN_USERS", "admin_user");