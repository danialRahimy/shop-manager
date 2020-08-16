<?php

require_once "core/const.php";
require_once CORE_PATH . "/paths.php";
require_once CORE_PATH . "/AutoLoad.php";
require_once APP_PATH . "/routes/index.php";

$autoload = new AutoLoad();
$autoload->register();