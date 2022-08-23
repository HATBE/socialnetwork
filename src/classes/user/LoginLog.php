<?php
    namespace app\user;

    use app\io\Database;

    class LoginLog {
        public static function log(Database $db, bool $success, string $userId) {
            // Log login activity
            $date = time();
            $ip = LOGIN_LOG_IP_ADDRESSES ? $_SERVER['REMOTE_ADDR'] : 'disabled';
            $useragent = LOGIN_LOG_USERAGENT ? $_SERVER['HTTP_USER_AGENT'] : 'disabled';

            $db->query('INSERT INTO logins (user_id, success, date, ipaddress, useragent) VALUES (:userid, :success, :date, :ipaddress, :useragent);');
            $db->bind('userid', $userId);
            $db->bind('success', $success);
            $db->bind('date', $date);
            $db->bind('ipaddress', $ip);
            $db->bind('useragent', $useragent);
            $db->execute();
        }

        public static function getLog(string $userId, int $page = 1) {
            // TODO:
            return true;
        }
    }