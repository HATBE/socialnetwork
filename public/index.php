<?php
    require_once(__DIR__ . '/../src/init.php');

    use app\user\User;
    
    if(!User::isLoggedIn()) {
        header('Location: /login');
        exit();
    } else {
        $uid = $_SESSION['loggedIn']['uid'] ?? 'none';
        header("Location: /profile/${uid}");
        exit();
    }