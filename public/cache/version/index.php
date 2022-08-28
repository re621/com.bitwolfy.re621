<?php

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

define ("ROOT", $_SERVER['DOCUMENT_ROOT']);
define ("DATA_ROOT", ROOT . "data/");
$config = parse_ini_file(ROOT . "config.ini");

if(!file_exists(DATA_ROOT . "latest.txt")) {
    echo "0.0.0";
    die();
}

echo file_get_contents(DATA_ROOT . "latest.txt");

?>