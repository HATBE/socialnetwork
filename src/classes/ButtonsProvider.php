<?php
    namespace app;

    use app\user\User;
    use app\user\Follow;
    use app\io\Database;

    class ButtonsProvider {
        public static function followUser(Database $db, string $userid, $loggedInUser, $large = false) {
            $html = "";
            if(User::isLoggedIn() && $userid !== $loggedInUser->getId()) {
                if(Follow::isFollowing($db, $loggedInUser->getId(), $userid)) {
                    $html = "
                        <button id='user-follow-btn' data-type='unfollow' data-id='${userid}' class='btn btn-danger w-100'>
                            Unfollow
                        </button>
                    ";
                } else {
                    $html = "
                        <button id='user-follow-btn' data-type='follow' data-id='${userid}' class='btn btn-primary w-100'>
                            Follow
                        </button>
                    ";
                }
            }
            return $html;
        }
    }