<?php
    require_once(__DIR__ . '/../src/init.php');

    use app\Template;
    use app\Sanitize;
    use app\user\User;
    use app\user\UserProfileCardProvider;
    use app\user\UserListProvider;

    $profileId = $_url[0] ?? null;
    if(!Sanitize::checkString($profileId)) {
        $profileId = null;
    }

    $user = new User($_db, $profileId);

    if(User::isLoggedIn() && !$user->exists()) {
        header('Location: /profile/' . User::getLoggedInUserId());
        exit();
    }

    $you = false;
    if(User::isLoggedIn()) {
        $you = $user->getId() === User::getLoggedInUserId() ? true : false;
    }

    $tab = $_url[1] ?? null;
    $page = Sanitize::int($_url[2] ?? 1);

    $upcp = new UserProfileCardProvider($_db, $user, $_loggedInUser);
?>

<?= Template::load('header', ['title' => ($user === null ? 'User not found' : $user->getUsername()), 'loggedInUser' => $_loggedInUser]);?>

<main>
    <div class="container">
        <div class="card bg-dark mb-3">
            <div class="card-body">
                <nav aria-label="breadcrumb">
                    <ol class="m-0 breadcrumb text-light">
                        <li class="breadcrumb-item"><a class="link-light" href="/">Home</a></li>
                        <li class="breadcrumb-item"><a class="link-light" href="/profile">Profile</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= !$user->exists() ? 'User not found' : $user->getUsername();?></li>
                    </ol>
                </nav>
            </div>
        </div>  
        <?php if($user->exists()): ?>
        <div class="row g-3">
            <div class="col-xl-3 col-12">
                <div class="card bg-dark">
                    <div class="card-body">
                        <?= $upcp->generateUserCard();?>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-12">
                <div class="card bg-dark">
                    <div class="card-body">
                        nav
                    </div>
                </div>
                <div class="card bg-dark mt-3">
                    <div class="card-body">
                        <?php if($tab === 'followers'):?>
                            <?= Template::load('userFollowersList', ['db' => $_db, 'user' => $user, 'page' => $page, 'loggedInUser' => $_loggedInUser]);?>
                        <?php elseif($tab === 'following'):?>
                            <?= Template::load('userFollowingList', ['db' => $_db, 'user' => $user, 'page' => $page, 'loggedInUser' => $_loggedInUser]);?>
                        <?php else:?>
                            default
                        <?php endif;?>
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