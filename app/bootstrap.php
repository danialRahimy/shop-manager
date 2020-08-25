<?php

//set_error_handler("myErrorHandler");
//function myErrorHandler($errno, $errstr, $errfile, $errline)
//{
//    if (!(error_reporting() & $errno)) {
//        // This error code is not included in error_reporting, so let it fall
//        // through to the standard PHP error handler
//        return false;
//    }
//
//    switch ($errno) {
//        case E_USER_ERROR:
//            echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
//            echo "  Fatal error on line $errline in file $errfile";
//            echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
//            echo "Aborting...<br />\n";
//            exit(1);
//            break;
//
//        case E_USER_WARNING:
//            echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
//            break;
//
//        case E_USER_NOTICE:
//            echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
//            break;
//
//        default:
//            echo "Unknown error type: [$errno] $errstr<br />\n";
//            break;
//    }
//
//    /* Don't execute PHP internal error handler */
//    return true;
//}

session_start();
require_once "core/const.php";
require_once CORE_PATH . "/paths.php";
require_once CORE_PATH . "/AutoLoad.php";
require_once APP_PATH . "/routes/index.php";

$autoload = new AutoLoad();
$autoload->register();