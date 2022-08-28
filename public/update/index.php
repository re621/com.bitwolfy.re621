<?php

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

define ("ROOT", $_SERVER['DOCUMENT_ROOT']);
define ("DATA_ROOT", ROOT . "data/");
$config = parse_ini_file(ROOT . "config.ini");


// Validate POST input
require(ROOT . "util/handler.php");
use GitHubWebhook\Handler;

$handler = new Handler($config["SCRIPT_SECRET"], __DIR__);
if(!$handler -> validate()) {
    http_response_code(403);
    die("Unauthorized");
}


// Decode release data
$payload = json_decode(file_get_contents('php://input'));
if(!isset($payload)) {
    http_response_code(500);
    die("Missing payload");
}

$version = $payload -> release -> tag_name;
$changes = $payload -> release -> body;
echo "Version " . $version . PHP_EOL;

if(!preg_match("/\d+\.\d+\.\d+/", $version)) {
    http_response_code(500);
    die("Invalid version number");
}


// Write the latest version
file_put_contents(DATA_ROOT . "latest.txt", $version);


// Update the forum thread
require ROOT . '/vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException as ClientException;

echo PHP_EOL . "Updating thread" . PHP_EOL;
$template = file_get_contents(ROOT . "/util/forum_template.txt");
$template = preg_replace("/%LATEST_VERSION%/", $version, $template);
$template .= "[code]\nVersion " . $version . "\n" . preg_replace("/\*\*(.*)\*\*/", "$1", $changes) . "\n[/code]\n";
$template .= `"Full Changelog":https://github.com/re621/re621.Legacy/releases\n`;

$e621 = new Client([
    "base_uri" => "https://e621.net/",
    "timeout"  => 15.0,
]);

$e621 -> request("PATCH", "forum_posts/286651.json", [
    "form_params" => [
        "forum_post[body]" => $template,
    ],
    "headers" => [
        "User-Agent" => "re621/forum",
        "Accept"     => "application/json",
    ],
    "auth" => [ $config["E621_USER"], $config["E621_PASS"] ]
]);
sleep(0.5);

$e621 -> request("PATCH", "forum_topics/25872.json", [
    "form_params" => [
        "forum_topic[title]" => "RE621 [v." . $version . "] Feature-packed toolkit and mass downloader for e621",
    ],
    "headers" => [
        "User-Agent" => "re621/forum",
        "Accept"     => "application/json",
    ],
    "auth" => [ $config["E621_USER"], $config["E621_PASS"] ]
]);


die("End");
?>