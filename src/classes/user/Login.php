<?php
    namespace app\user;

    use app\io\Database;
    use app\user\User;

    class Login {
        public $success = false;
        
        private $_db;
        private $_username;
        private $_password;

        public function __construct(Database $db, string $username, string $password) {
            $this->_db = new Database();
            $this->_username = $username;
            $this->_password = $password;

            return $this->login();
        }

        private function login() {
            $user = User::getFromUsername($this->_db, $this->_username);

            if($user === null || !$user->exists()) {
                // cannot insert into log, because foreign key (no user exists, no log)
                return false;
            }

            if(!$this->allowLogin($user->getId())) {
                return false;
            }

            if(!$user->verifyPassword($this->_password)) {
                $this->log(false, $user->getId());
                return false;
            }

            $this->success = true;

            $_SESSION['loggedIn'] = [
                'id' => $user->getId(),
                'username' => $user->getUsername(),
            ];
            
            $this->log(true, $user->getId());
            return true;
        }

        private function log(bool $success, string $userId) {
            // Log login activity
            $date = time();
            $ip = LOGIN_LOG_IP_ADDRESSES ? $_SERVER['REMOTE_ADDR'] : 'disabled';

            $this->_db->query('INSERT INTO logins (user_id, success, date, ipaddress) VALUES (:userid, :success, :date, :ipaddress);');
            $this->_db->bind('userid', $userId);
            $this->_db->bind('success', $success);
            $this->_db->bind('date', $date);
            $this->_db->bind('ipaddress', $ip);
            $this->_db->execute();
        }

        private function allowLogin(string $userId) {
            // if user is locked out (more than x times wrong in y secs)
            $date = time();
            $dateThen = $date - LOGIN_TIMEOUT_AFTER_FAILED_LOGINS;

            $this->_db->query('SELECT COUNT(id) as c FROM logins WHERE (user_id LIKE :userid AND success LIKE 0 AND date > :time);');
            $this->_db->bind('userid', $userId);
            $this->_db->bind('time', $dateThen);
            $count = $this->_db->single()->c;

            if($count > LOGIN_MAX_FAILED_ATTEMPTS) {
                return false;
            }
            return true;
        }
    }