<?php

use Monolog\Formatter\LineFormatter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

try {
    $startTime = microtime(true);

    require_once "../app/bootstrap.php";

    $dispatcher = new Dispatcher($routes);
}catch (ExceptionUser $error){

    echo $error->getMessage();
}catch (ExceptionDev $error){

    echo $error->getMessage();
} finally {

    try{
        $dateFormat = "Y/n/j,G:i";
        $output = "%datetime% > %level_name% > %message% \n";

        $formatter = new LineFormatter($output, $dateFormat);

        if (
            strpos($_SERVER["REQUEST_URI"], "/public/") !== false or
            strpos($_SERVER["REQUEST_URI"], "/files/") !== false
        ){

            $log = $_SERVER["REQUEST_URI"];

            $logger = new Logger('not_found');
            $stream = new StreamHandler(ROOT . "/logs/not_found_files.log", Logger::WARNING);
            $logger->pushHandler($stream);
            $stream->setFormatter($formatter);
            $logger->warning($log);
        }else{

            $endTime = microtime(true);
            $time = round($endTime - $startTime, 1);
            $ram = round(memory_get_usage() / 1024 / 1024, 1);
            $log = $_SERVER["REQUEST_URI"] . " => time: $time ms / ram: $ram mb";

            $logger = new Logger('usage');
            $stream = new StreamHandler(ROOT . "/logs/usage.log", Logger::INFO);
            $logger->pushHandler($stream);
            $stream->setFormatter($formatter);
            $logger->info($log);
        }
    }catch (Exception $e){

    }
}

