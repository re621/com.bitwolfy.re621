<?php

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

define ("ROOT", $_SERVER['DOCUMENT_ROOT']);
define ("DATA_ROOT", ROOT . "data/");
$config = parse_ini_file(ROOT . "config.ini");

header('Content-Type: application/json; charset=utf-8');

if(file_exists(DATA_ROOT . "latest.txt"))
    $version = file_get_contents(DATA_ROOT . "latest.txt");
else $version = "0.0.0";

echo json_encode(array(
    "version" => $version,
));

?>