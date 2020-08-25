<?php

$paths = get_include_path() . PATH_SEPARATOR;
$paths .= ROOT . "/src/lib/core" . PATH_SEPARATOR;
$paths .= CONTROLLER_PATH . PATH_SEPARATOR;
$paths .= APP_PATH . "/vendor" . PATH_SEPARATOR;
$paths .= MODEL_PATH . PATH_SEPARATOR;

set_include_path($paths);
