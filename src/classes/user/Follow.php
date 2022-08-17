<?php
    namespace app\user;

    use app\io\Database;

    class Follow {
        public static function isFollowing(Database $db, $userUid, $targetUid) {
            // check if user followes target
            //TODO:

            return true;
        }

        public static function follow(Database $db, $senderUid, $targetUid) {
            // check if sender followes target
            if(Follow::isFollowing($db, $senderUid, $targetUid)) {
                // sender followes target already
                return false;
            } else {
                // follow
                //TODO:

                return true;
            }
        }

        public static function unfollow(Database $db, $senderUid, $targetUid) {
            if(Follow::isFollowing($db, $senderUid, $targetUid)) {
                // unfollow
                //TODO:

                return true;
            } else {
                // sender does not follow target
                return false;
            }
        }
    }