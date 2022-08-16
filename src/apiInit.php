<?php
    require_once(__DIR__ . '/../src/init.php');

    // \/ CORS settings \/
    if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Methods: POST, DELETE, GET, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        header('Access-Control-Max-Age: 86400');
        header('Access-Control-Allow-Origin: *');
        
        http_response_code(200);;
    }
    // /\ CORS settings /\