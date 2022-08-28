<?php

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

define ("ROOT", $_SERVER['DOCUMENT_ROOT']);
define ("DATA_ROOT", ROOT . "data/dnp/");
$config = parse_ini_file(ROOT . "config.ini");

if(!is_dir(DATA_ROOT)) mkdir(DATA_ROOT);

// Validate POST input
require(ROOT . "util/handler.php");
use GitHubWebhook\Handler;

$handler = new Handler($config["DNP_SECRET"], __DIR__);
if(!$handler -> validate()) {
    http_response_code(403);
    die("Unauthorized");
}

// Fetch data
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
    http_response_code(500);
    die();
}

?>