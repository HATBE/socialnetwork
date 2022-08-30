<?php
    /*
        Agrs:
        - db
        - user
        - page
        - loggedInUser
    */

    use app\user\UserListProvider;

    $list = new UserListProvider($db, $user, $user->getFollowers($page ?? 1), $page, $loggedInUser);

    $list->generate();