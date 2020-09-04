<?php

use Monolog\Formatter\LineFormatter;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$startTime = microtime(true);

require_once "../app/bootstrap.php";

$logger = new Logger('usage');

try {
    $dispatcher = new Dispatcher($routes);
}catch (ExceptionUser $error){
    echo $error->getMessage();
}catch (ExceptionDev $error){
    echo $error->getMessage();
} finally {
    $endTime = microtime(true);
    $time = round($endTime - $startTime, 1);
    $ram = round(memory_get_usage() / 1024 / 1024, 1);
    $log = $_SERVER["REQUEST_URI"] . " => time: $time ms / ram: $ram mb";
    $stream = new StreamHandler(ROOT . "/logs/usage.log", Logger::INFO);
    $logger->pushHandler($stream);
    $dateFormat = "Y/n/j,G:i";

    $output = "%datetime% > %level_name% > %message% \n";

    $formatter = new LineFormatter($output, $dateFormat);
    $stream->setFormatter($formatter);
    $logger->info($log);
}

