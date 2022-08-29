<?php

chdir(dirname(__FILE__));

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define ("ROOT", "../");
define ("DATA_ROOT", ROOT . "data/awards/");
$config = parse_ini_file(ROOT . "config.ini");

if(!is_dir(DATA_ROOT)) mkdir(DATA_ROOT);

require ROOT . 'vendor/autoload.php';
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException as ClientException;

$e621 = new Client([ "timeout"  => 15.0 ]);

try {
    $request = $e621 -> request(
        "GET",
        "https://e621.net/users.json?search[min_level]=20&limit=250&search[order]=post_upload_count",
        [
            "headers" => [
                "User-Agent" => "re621/site",
                "Accept"     => "application/json",
            ],
            "auth" => [ $config["E621_USER"], $config["E621_PASS"] ]
        ]
    );

    $json = json_decode($request -> getBody());
    $ids = array();
    // var_dump($json);
    foreach($json as $user) {
        array_push($ids, $user -> id);
    }
    $groupA = array_slice($ids, 0, 10);
    $groupB = array_slice($ids, 10, 100);
    $groupC = array_slice($ids, 100);
    
    file_put_contents(DATA_ROOT . "postsA.json", json_encode($groupA));
    file_put_contents(DATA_ROOT . "postsB.json", json_encode($groupB));
    file_put_contents(DATA_ROOT . "postsC.json", json_encode($groupC));

    echo "Fetched post awards" . PHP_EOL;
} catch (\Exception $e) {
    echo "Failed to fetch post awards" . PHP_EOL;
}

sleep(1);


try {
    $request = $e621 -> request(
        "GET",
        "https://e621.net/users.json?search[min_level]=20&limit=250&search[order]=post_update_count",
        [
            "headers" => [
                "User-Agent" => "re621/site",
                "Accept"     => "application/json",
            ],
            "auth" => [ $config["E621_USER"], $config["E621_PASS"] ]
        ]
    );

    $json = json_decode($request -> getBody());
    $ids = array();
    // var_dump($json);
    foreach($json as $user) {
        array_push($ids, $user -> id);
    }
    $groupA = array_slice($ids, 0, 10);
    $groupB = array_slice($ids, 10, 100);
    $groupC = array_slice($ids, 100);
    
    file_put_contents(DATA_ROOT . "tagsA.json", json_encode($groupA));
    file_put_contents(DATA_ROOT . "tagsB.json", json_encode($groupB));
    file_put_contents(DATA_ROOT . "tagsC.json", json_encode($groupC));

    echo "Fetched tag awards" . PHP_EOL;
} catch (\Exception $e) {
    echo "Failed to fetch tag awards" . PHP_EOL;
}

sleep(1);


try {
    $request = $e621 -> request(
        "GET",
        "https://e621.net/users.json?search[min_level]=20&limit=250&search[order]=note_count",
        [
            "headers" => [
                "User-Agent" => "re621/site",
                "Accept"     => "application/json",
            ],
            "auth" => [ $config["E621_USER"], $config["E621_PASS"] ]
        ]
    );

    $json = json_decode($request -> getBody());
    $ids = array();
    // var_dump($json);
    foreach($json as $user) {
        array_push($ids, $user -> id);
    }
    $groupA = array_slice($ids, 0, 10);
    $groupB = array_slice($ids, 10, 100);
    $groupC = array_slice($ids, 100);
    
    file_put_contents(DATA_ROOT . "notesA.json", json_encode($groupA));
    file_put_contents(DATA_ROOT . "notesB.json", json_encode($groupB));
    file_put_contents(DATA_ROOT . "notesC.json", json_encode($groupC));

    echo "Fetched note awards" . PHP_EOL;
} catch (\Exception $e) {
    echo "Failed to fetch note awards" . PHP_EOL;
}

?>