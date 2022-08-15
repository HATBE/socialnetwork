<?php
    require_once(__DIR__ . '/../src/init.php');

    use app\Template;
    use app\Sanitize;
    use app\user\User;

    $profileId = $_url[0] ?? null;
    if(!Sanitize::checkString($profileId)) {
        $profileId = null;
    }

    $user = User::getFromUid($_db, $profileId);
?>

<?= Template::load('header', ['title' => 'Profile']);?>

<main>
    <div class="container">
    <?php if($user !== null): ?>
        <div class="row">
            <div class="col-xl-4 col-12">
                <div class="card bg-dark">
                    <div class="card-body">
                        <?= $user->getUsername();?>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 col-12 pt-xl-0 pt-3">
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