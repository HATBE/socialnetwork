<?php
    require_once(__DIR__ . '/../src/init.php');

    use app\user\User;
    
    if(!User::isLoggedIn()) {
        header('Location: /login');
        exit();
    } else {
        header("Location: /dashboard");
        exit();
    }