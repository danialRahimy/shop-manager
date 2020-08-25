<?php

require_once "../app/bootstrap.php";
try {
    $dispatcher = new Dispatcher($routes);
}catch (Exception $error){
    echo $error->getMessage();
}
