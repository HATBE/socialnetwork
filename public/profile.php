<?php
    require_once(__DIR__ . '/../src/init.php');

    use app\Template;
    use app\Sanitize;
    use app\user\User;

    $profileId = $_url[0] ?? null;
    if(!Sanitize::checkString($profileId)) {
        $profileId = null;
    }

    $user = null;
    if($profileId !== null) {
        $user = User::getFromUid($_db, $profileId);
    }    
?>

<?= Template::load('header', ['title' => ($user === null ? 'User not found' : $user->getUsername())]);?>

<main>
    <div class="container">
        <div class="card bg-dark mb-3">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="m-0 breadcrumb text-light">
                        <li class="breadcrumb-item"><a class="link-light" href="/">Home</a></li>
                        <li class="breadcrumb-item"><a class="link-light" href="/profile">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $user === null ? 'User not found' : $user->getUsername();?></li>
                    </ol>
                </nav>
            </div>
        </div>  
        <?php if($user !== null): ?>
        <div class="row g-3">
            <div class="col-xl-4 col-12">
                <div class="card bg-dark">
                    <div class="card-body">
                        <div>
                            <?= $user->getUsername();?>
                        </div>
                        <button id="follow-user-btn" data-uid="<?= $user->getUid();?>" class="btn btn-primary">
                            Follow
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-12">
                <div class="card bg-dark">
                    <div class="card-body">
                        content
                    </div>
                </div>
            </div>
        </div>
        <?php else:?>
        <div class="card bg-dark">
            <div class="card-body">
                Please enter a valid profile id.
            </div>
        </div>
        <?php endif;?>
    </div>
</main>

<?= Template::load('footer');?>