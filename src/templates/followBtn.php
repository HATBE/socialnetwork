<?php
    /*
        Args:
        - id
    */
    use app\user\User;
    use app\user\Follow;
?>

<?php if(User::isLoggedIn() && $id !== $_SESSION['loggedIn']['id']):?>
    <?php if(Follow::isFollowing($db, $_SESSION['loggedIn']['id'], $id)):?>
        <button id="follow-user-btn" data-id="<?= $id;?>" class="btn btn-primary">
            Follow
        </button>
    <?php else:?>
        <button id="unfollow-user-btn" data-id="<?= $id;?>" class="btn btn-danger">
            Unfollow
        </button>
    <?php endif;?>
<?php endif;?>