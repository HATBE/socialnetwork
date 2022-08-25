<?php
    /*
        Agrs:
        - page
    */
    use app\user\User;

    $followers = $user->getFollowers($page ?? 1);

    if($followers !== null) {
        foreach($followers as $follower) {
            echo $follower->getUsername();
        }
    } else {
        if($user->getFollowingCount() <= 0) {
            echo "This user does not yet have any followers";
        } else {
            echo "This page does not exist";
        }
    }