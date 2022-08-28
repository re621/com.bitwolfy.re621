<?php

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

define ("ROOT", $_SERVER['DOCUMENT_ROOT']);
define ("DATA_ROOT", ROOT . "data/dnp/");
$config = parse_ini_file(ROOT . "config.ini");

header('Content-Type: application/json; charset=utf-8');

if(!is_dir(DATA_ROOT)) mkdir(DATA_ROOT);

if(is_file(DATA_ROOT . "data.json")) {
    echo file_get_contents(DATA_ROOT . "data.json");
    http_response_code(200);
    die();
}

require ROOT . '/vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException as ClientException;
$github = new Client([ "timeout"  => 15.0 ]);

try {
    $github -> request("GET", "https://raw.githubusercontent.com/re621/dnpcache/main/dist/data.json", [
        "headers" => [ "Authorization" => "token " . $config["AUTH_TOKEN"] ],
        "sink" => DATA_ROOT . "data.json",
    ]);
    $github -> request("GET", "https://raw.githubusercontent.com/re621/dnpcache/main/dist/meta.json", [
        "headers" => [ "Authorization" => "token " . $config["AUTH_TOKEN"] ],
        "sink" => DATA_ROOT . "meta.json",
    ]);
} catch (\Exception $e) {
    echo "{}";
    http_response_code(500);
    die();
}

echo file_get_contents(DATA_ROOT . "data.json");
http_response_code(200);
die();

?>