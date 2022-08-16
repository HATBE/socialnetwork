<?php
    /*
        Agrs:
        - noparts // if the footer is not used
        - description
        - keywords
        - title
        - pagetype
    */

    use app\user\User;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="description" content="<?= $description ?? '' ?>">
        <meta name="keywords" content="<?= META_DEFAULT_KEYWORDS?>, <?= $keywords ?? ''?>">
        <meta name="author" content="HATBE | Aaron Gensetter">

        <meta property="og:locale" content="<?= META_LOCAL;?>">
        <meta property="og:title" content="<?= $title ?? 'no name';?> | <?= META_PAGE_TITLE;?>">
        <meta property="og:site_name" content="<?= META_PAGE_TITLE;?>">
        <meta property="og:type" content="<?= $pagetype ?? 'website';?>">
        <meta property="og:description" content="<?= $description ?? '';?>">
        <meta property="og:url" content="http://<?= $_SERVER['HTTP_HOST'];?>">
        <meta property="og:image" content="/assets/img/favicon.png">
        
        <title><?= $title ?? 'no name'?> | <?= META_PAGE_TITLE;?></title>

        <!-- CSS bootstrap --><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/css/style.css">

        <link rel="icon" href="/assets/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="/assets/img/favicon.png">
    </head>
    <body class="text-white" style="overflow-x: hidden;">
        <?php if(DEVMODE):?>
            <!-- I am running in devmode! -->
        <?php endif;?>
        <?php if(!isset($noparts)):?>
        <header class="bg-dark">
            <div class="container d-flex justify-content-between align-items-center p-2">
                <div>
                    <h1 class="h3 p-0 m-0">
                        <a draggable="false" href="/" class="link-light text-decoration-none user-select-none">
                            <?= META_PAGE_TITLE;?>
                        </a>
                    </h1>
                </div>
                <div>
                    <nav role="main-nav" class="m-0 h4 d-flex align-items-center">
                        <?php if(User::isLoggedIn()):?>
                            <span class="mx-2 dropdown">
                                <div draggable="false" title="Create" class="cursor-pointer link-light" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-plus-circle"></i></div>
                                <ul class="p-0 bg-dark dropdown-menu">
                                    <li><a draggable="false" class="rounded hover-dark link-light user-select-none dropdown-item" href="/create-text"><span style="display: inline-block;width: 23px;"><i class="fas fa-align-left"></i></span> Text Post</a></li>
                                    <li><a draggable="false" class="rounded hover-dark link-light user-select-none dropdown-item" href="/create-video"><span style="display: inline-block;width: 23px;"><i class="fas fa-video"></i></span> Uplaod Video</a></li>
                                    <li><a draggable="false" class="rounded hover-dark link-light user-select-none dropdown-item" href="/create-image"><span style="display: inline-block;width: 23px;"><i class="fas fa-image"></i></span> Upload Image</a></li>
                                </ul>
                            </span>
                            <span class="mx-2 dropdown">
                                <small style="z-index: 9999; font-size: 10px; top:0px; right: -5px; width: 15px; height: 15px;" data-bs-toggle="dropdown" class="user-select-none position-absolute bg-danger rounded-circle d-flex justify-content-center align-items-center">9+</small>
                                <div title="Notifications" class="position-relative cursor-pointer link-light hover-text-light" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-bell"></i></div>
                                <ul class="text-white bg-dark p-3 user-select-none dropdown-menu">
                                    Notifications
                                </ul>
                            </span>
                            <a draggable="false" title="Logout" class="mx-2 link-light" href="/logout"><i class="fas fa-sign-out-alt"></i></a>
                        <?php else:?>
                            <a draggable="false" title="Login" class="mx-2 link-light" href="/login"><i class="fas fa-sign-in-alt"></i></a>
                        <?php endif;?>
                    </nav>
                </div>
            </div>
        </header>
        <?php endif;?>