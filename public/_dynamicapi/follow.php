<?php
    require_once(__DIR__ . '/../../src/apiInit.php');

    use app\user\User;
    use app\Sanitize;

    if(!User::isLoggedIn()) {
        http_response_code(400);
        die('You are not logedin');
    }

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        http_response_code(400);
        die('Please use the POST request method');
    }
    if(!isset($_SERVER['CONTENT_TYPE']) || $_SERVER['CONTENT_TYPE'] !== 'application/json') {
        http_response_code(400);
        die('Please use application/json as content type');
    }
    $rawData = file_get_contents('php://input');
    if(!$jsonData = json_decode($rawData)) {
        http_response_code(400);
        die('The content type is not valid json');
    }
    if(!isset($jsonData->uid)) {
        http_response_code(400);
        die('Please provide a uid');
    }
    $uid = Sanitize::string($jsonData->uid);

    $userToFollow = User::getFromUid($_db, $uid);

    if($userToFollow === null || !$userToFollow->exists()) {
        http_response_code(401);
        die('User does not exist');
    }

    // TODO: