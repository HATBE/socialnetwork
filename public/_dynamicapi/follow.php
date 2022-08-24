<?php
    require_once(__DIR__ . '/../../src/apiInit.php');

    use app\user\User;
    use app\Sanitize;
    use app\user\Follow;

    if(!User::isLoggedIn()) {
        http_response_code(400);
        die('You are not logedin');
    }

    $user = new User($_db, $_SESSION['loggedIn']['id']);

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
    if(!isset($jsonData->id)) {
        http_response_code(400);
        die('Please provide a id');
    }
    $id = Sanitize::string($jsonData->id);

    $userToFollow = new User($_db, $id);

    if($userToFollow === null || !$userToFollow->exists()) {
        http_response_code(400);
        die('User does not exist');
    }

    if($user->isFollowing($id)) {
        http_response_code(400);
        die('You are already following');
    }

    if(!Follow::follow($_db, $_SESSION['loggedIn']['id'], $id)) {
        http_response_code(400);
        die('Error'); 
    }

    http_response_code(200);