<?php
    /*
        Args:
        - uid
    */
    use app\user\User;
    use app\user\Follow;
?>

<?php if(User::isLoggedIn() && $uid !== $_SESSION['loggedIn']['uid']):?>
    <!-- TODO: check if user is already following -->
    <?php if(Follow::isFollowing($db, $_SESSION['loggedIn']['uid'], $uid)):?>
        <button id="follow-user-btn" data-uid="<?= $uid;?>" class="btn btn-primary">
            Follow
        </button>
    <?php else:?>
        <button id="unfollow-user-btn" data-uid="<?= $uid;?>" class="btn btn-danger">
            Unfollow
        </button>
    <?php endif;?>
<?php endif;?>