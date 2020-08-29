<?php

require_once "../app/bootstrap.php";
try {
    $dispatcher = new Dispatcher($routes);
}catch (ExceptionUser $error){
    echo $error->getMessage();
}catch (ExceptionDev $error){
    echo $error->getMessage();
}
