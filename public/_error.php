<?php
    require_once(__DIR__ . '/../src/init.php');

    use app\Template;
?>

<?= Template::load('header', ['title' => 'Error']);?>

<main>
    <div class="container">
        Hello, this is an error page.
    </div>
</main>

<?= Template::load('footer');?>