<?php
/*
    Agrs:
    - noparts // if the footer is not used
    - description
    - keywords
    - title
    - pagetype
*/
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

        <meta property="og:locale" content="<?= META_LOCAL?>">
        <meta property="og:title" content="<?= $title ?? 'no name'?> | <?= META_PAGE_TITLE?>">
        <meta property="og:site_name" content="<?= META_PAGE_TITLE?>">
        <meta property="og:type" content="<?= $pagetype ?? 'website'?>">
        <meta property="og:description" content="<?= $description ?? ''?>">
        <meta property="og:url" content="http://<?= $_SERVER['HTTP_HOST']?>">
        <meta property="og:image" content="/assets/img/favicon.png">
        
        <title><?= $title ?? 'no name'?> | <?= META_PAGE_TITLE?></title>

        <!-- CSS bootstrap --><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="/assets/css/style.css">

        <link rel="icon" href="/assets/img/favicon.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="/assets/img/favicon.png">
    </head>
    <body class="text-white" style="overflow-x: hidden;">
        <?php if(!isset($noparts)):?>
        <header class="bg-dark">
            <div class="container d-flex justify-content-between align-items-center p-2">
                <div>
                    <h1 class="h3 p-0 m-0">
                        <a draggable="false" href="/" class="link-light text-decoration-none user-select-none">
                            <?= META_PAGE_TITLE?>
                        </a>
                    </h1>
                </div>
                <div>
                    <nav role="main-nav" class="d-flex align-items-center">
                        d
                    </nav>
                </div>
            </div>
        </header>
        <?php endif;?>