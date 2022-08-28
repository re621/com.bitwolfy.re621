<?php

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

define ("ROOT", $_SERVER['DOCUMENT_ROOT']);
define ("DATA_ROOT", ROOT . "data/images/");
$config = parse_ini_file(ROOT . "config.ini");

header('Content-Type: application/json; charset=utf-8');

if(!is_dir(DATA_ROOT)) mkdir(DATA_ROOT);

// Validate input
$version = $_GET["version"];
$latest = "10.0.0"; // file_get_contents("../../update/latest.txt");

if(!isset($version) || $version == "10.0.0") $version = $latest;

if(!preg_match("/\d+\.\d+\.\d+/", $version)) {
    echo "{}";
    http_response_code(400);
    die();
}

if(version_compare($version, "2.0.0") < 0 || version_compare($version, $latest) > 0) {
    echo "{}";
    http_response_code(400);
    die();
}

// Return cached data
if(is_file(DATA_ROOT . $version . ".json")) {
    echo file_get_contents(DATA_ROOT . $version . ".json");
    http_response_code(200);
    die();
}

// Fetch remote data
require ROOT . '/vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException as ClientException;

$github = new Client([ "timeout"  => 15.0 ]);

try {
    $github -> request(
        "GET",
        "https://raw.githubusercontent.com/re621/re621/" . $version . "/assets/images.json",
        [
            "headers" => [ "Authorization" => "token " . $config["AUTH_TOKEN"] ],
            "sink" => DATA_ROOT . $version . ".json"
        ]
    );
    echo file_get_contents(DATA_ROOT . $version . ".json");
    http_response_code(200);
    die();
} catch (\Exception $e) {
    echo "[]";
    unlink(DATA_ROOT . $version . ".json");
    http_response_code(500);
    die();
}

?>