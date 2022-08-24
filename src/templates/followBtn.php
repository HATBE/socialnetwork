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
        <button id="follow-user-btn" data-type="unfollow" data-id="<?= $id;?>" class="btn btn-danger">
            Unfollow
        </button>
    <?php else:?>
        <button id="follow-user-btn" data-type="follow" data-id="<?= $id;?>" class="btn btn-primary">
            Follow
        </button>
    <?php endif;?>
<?php endif;?>