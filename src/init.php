<?php
    session_start();

    // Load configs
    require_once(__DIR__ . '/../config/config.php');
    require_once(__DIR__ . '/../config/auth.php');

    require_once(__DIR__ . '/autoload.php');

    use app\io\Database;
    use app\Sanitize;
    use app\user\User;

    if(DEVMODE) {
        // \/ Display all PHP errors if DEVMODE \/
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        // /\ Display all PHP errors if DEVMODE /\
    }
    
    // \/ parse URL Params \/
    $_url = null;
    if(isset($_SERVER['PATH_INFO'])) {
        $_url = $_SERVER['PATH_INFO'];
        $_url = rtrim($_url, '/'); // remove last slash
        $_url = ltrim($_url, '/'); // remove first slash
        $_url = Sanitize::url($_url);
        $_url = explode('/', $_url); // split url in segments, by slash
        if(!str_contains(explode('/', substr(rtrim($_SERVER['REQUEST_URI']), 1))[0], '.php')) array_shift($_url); // if element 0 is a ".php"-file, remove it from array (this can happen, if the filetype is specificly requestet in the url)
        if(empty($_url) || $_url[0] == '') $_url = null; // if no path is requested, set url to null
    }
    // /\ parse URL Params /\

    // Database connection
    $_db = new Database();

    // Get loggedin User
    $_loggedInUser = null;
    if(User::isLoggedIn()) {
        $_loggedInUser = new User($_db, User::getLoggedInUserId()); 
    }