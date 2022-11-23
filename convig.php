<?php

session_start();
define("DS", DIRECTORY_SEPARATOR);

//P@zzw@rd100$_$
//Database connection info
$USERNAME = "root";
$PASSWORD = "";
$CONNECTION_STRING = 'mysql:host=localhost;dbname=yummytastebud';

//Auto include all classes file in model folder to all pages
spl_autoload_register(function ($class_name) {
    include_once __DIR__ . DIRECTORY_SEPARATOR . "model" . DIRECTORY_SEPARATOR . $class_name . ".php";
});

