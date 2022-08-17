<?php
    require_once(__DIR__ . '/../src/init.php');

    use app\Template;
    use app\Sanitize;
    use app\user\User;

    if(!User::isLoggedIn()) {
        header('Location: /login');
        exit();
    }

    $uid = $_SESSION['loggedIn']['uid'];
?>

<?= Template::load('header', ['title' => 'Settings']);?>

<main>
    <div class="container">
        <div class="card bg-dark mb-3">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="m-0 breadcrumb text-light">
                        <li class="breadcrumb-item"><a class="link-light" href="/">Home</a></li>
                        <li class="breadcrumb-item"><a class="link-light" href="/profile/<?= $uid;?>">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card bg-dark mb-3">
            <div class="card-body">
                Dashboard
            </div>
        </div>  
    </div>
</main>

<?= Template::load('footer');?>