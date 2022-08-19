<?php
    namespace app\user;

    use app\io\Database;
    use app\Model;
    use app\Sanitize;
    use app\Random;
    use app\user\Follow;

    class User extends Model {
        public static function isLoggedIn() {
            return isset($_SESSION['loggedIn']);
        }

        public static function getFromUsername(Database $db, string $username) {
            $db->query('SELECT * FROM users WHERE username LIKE :username;');
            $db->bind('username', $username);
            $res = $db->single();

            return $db->rowCount() >= 1 ? new User($db, $res) : null;
        }

        public static function idExists(Database $db, string $id) {
            $db->query('SELECT COUNT(id) as c FROM users WHERE id LIKE :id;');
            $db->bind('id', $id);

            return $db->single()->c >= 1 ? true : false;
        }

        public static function usernameExists(Database $db, string $username) {
            $db->query('SELECT COUNT(id) as c from users WHERE username LIKE :username;');
            $db->bind('username', $username);
            
            return $db->single()->c >= 1 ? true : false;
        }

        public static function generateId(Database $_db) {
            $id;
            do {
                $id = Random::generateId('u');
            } while(User::idExists($_db, $id));
            return $id;
        }

        public function __construct(Database $db, $input) {
            $this->_db = $db;

            if(is_object($input)) {
                $this->_data = $input;
                $this->_exists = true;
            } else {
                $id = Sanitize::string($input);

                $this->_db->query('SELECT * FROM users WHERE id LIKE :id;');
                $this->_db->bind('id', $id);
                $res = $this->_db->single();

                if($this->_db->rowCount() >= 1) {
                    $this->_exists = true;
                    $this->_data = $res;
                }
            }
        }

        public function getId() {
            return $this->getData('id');
        }

        public function getUsername() {
            return $this->getData('username');
        }

        public function verifyPassword($pw) {
            return password_verify($pw, $this->getData('password'));
        }

        public function isFollowing($targetId) {
            return Follow::isFollowing($this->_db, $this->getId(), $targetId);
        }
    }