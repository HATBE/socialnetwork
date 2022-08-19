<?php
    namespace app\user;

    use app\io\Database;

    class Follow {
        public static function isFollowing(Database $db, string $userId, string $targetId) {
            // check if user followes target

            $db->query('SELECT COUNT(id) as c FROM following WHERE sender_user_id LIKE :sender AND target_user_id LIKE :target;');
            $db->bind('sender', $userId);
            $db->bind('target', $targetId);

            return $db->single()->c >= 1 ? true : false;
        }

        public static function follow(Database $db, string $senderId, string $targetId) {
            // check if sender followes target
            if(Follow::isFollowing($db, $senderId, $targetId) || $senderId === $targetId) {
                // sender followes target already or is himself
                return false;
            } else {
                // follow
                $date = time();

                $db->query('INSERT INTO following (date, sender_user_id, target_user_id) VALUES (:date, :sender, :target)');
                $db->bind('sender', $senderId);
                $db->bind('target', $targetId);
                $db->bind('date', $date);
                $db->execute();

                return true;
            }
        }

        public static function unfollow(Database $db, $senderUid, $targetUid) {
            if(!Follow::isFollowing($db, $senderUid, $targetUid) || $senderUid === $targetUid) {
                // sender does not follow target or is himself
                return false;
            } else {
                // unfollow
                //TODO:
                return true;
            }
        }
    }