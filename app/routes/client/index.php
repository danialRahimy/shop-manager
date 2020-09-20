<?php

$routes[] = array("home", "client", "index");

$routes[] = array("category/{catID}/{subCatID}", "client", "subCategory");
$routes[] = array("category/{catID}", "client", "category");
$routes[] = array("category", "client", "index");