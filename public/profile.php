<?php
    require_once(__DIR__ . '/../src/init.php');

    use app\Template;
?>

<?= Template::load('header', ['title' => 'Profile']);?>

<main class="container">
    hello
</main>

<?= Template::load('footer');?>