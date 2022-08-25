<?php
    /*
        Agrs:
        - page
    */
    use app\user\User;

    $followings = $user->getFollowing($page ?? 1);

    if($followings !== null) {
        foreach($followings as $following) {
            echo $following->getUsername();
        }
    } else {
        if($user->getFollowingCount() <= 0) {
            echo "This user does not yet follow other users";
        } else {
            echo "This page does not exist";
        }
    }