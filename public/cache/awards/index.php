<?php

/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

define ("ROOT", $_SERVER['DOCUMENT_ROOT']);
define ("DATA_ROOT", ROOT . "data/awards/");
$config = parse_ini_file(ROOT . "config.ini");

header('Content-Type: application/json; charset=utf-8');

$awards = require(ROOT . "util/awards.hardcoded.php");

if(is_file(DATA_ROOT . "postsA.json"))
    $awards["postsA"] = json_decode(file_get_contents(DATA_ROOT . "postsA.json"));
if(is_file(DATA_ROOT . "postsB.json"))
    $awards["postsB"] = json_decode(file_get_contents(DATA_ROOT . "postsB.json"));
if(is_file(DATA_ROOT . "postsC.json"))
    $awards["postsC"] = json_decode(file_get_contents(DATA_ROOT . "postsC.json"));

if(is_file(DATA_ROOT . "tagsA.json"))
    $awards["tagsA"] = json_decode(file_get_contents(DATA_ROOT . "tagsA.json"));
if(is_file(DATA_ROOT . "tagsB.json"))
    $awards["tagsB"] = json_decode(file_get_contents(DATA_ROOT . "tagsB.json"));
if(is_file(DATA_ROOT . "tagsC.json"))
    $awards["tagsC"] = json_decode(file_get_contents(DATA_ROOT . "tagsC.json"));

if(is_file(DATA_ROOT . "notesA.json"))
    $awards["notesA"] = json_decode(file_get_contents(DATA_ROOT . "notesA.json"));
if(is_file(DATA_ROOT . "notesB.json"))
    $awards["notesB"] = json_decode(file_get_contents(DATA_ROOT . "notesB.json"));
if(is_file(DATA_ROOT . "notesC.json"))
    $awards["notesC"] = json_decode(file_get_contents(DATA_ROOT . "notesC.json"));

http_response_code(200);
echo json_encode($awards);

?>