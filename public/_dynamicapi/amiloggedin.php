<?php
    /*
        This endpoint is here to make sure the PHP session is not removed and that the JS can check if 
        the user is still loggedin, otherwise a redirect to the login page is made.
    */
    require_once(__DIR__ . '/../../src/init.php');

    use app\user\User;

    if(User::isLoggedIn()) {
        echo "true";
    } else {
        echo "false";
    }

    exit();