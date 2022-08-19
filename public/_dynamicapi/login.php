<?php
    require_once(__DIR__ . '/../../src/apiInit.php');

    use app\user\User;
    use app\Sanitize;
    use app\user\Login;
    use app\io\Database;

    if(User::isLoggedIn()) {
        http_response_code(400);
        die('You are already loggedin');
    }
    
    sleep(1); // Login delay

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
    if(!isset($jsonData->username) || !isset($jsonData->password)) {
        http_response_code(400);
        die('Please provide a username and a password');
    }
    if(!Sanitize::checkStringBetween($jsonData->username, 1, 255) || !Sanitize::checkStringBetween($jsonData->password, 1, 255)) {
        http_response_code(400);
        die('Username and password must be between 1 and 125 chars long');
    }

    $username = Sanitize::string($jsonData->username);
    $password = $jsonData->password;

    $login = new Login($_db, $username, $password);

    if($login->success) {
        http_response_code(200);
        die('Login successfull');
    } else {
        http_response_code(401);
        die('Username or Password wrong');
    }