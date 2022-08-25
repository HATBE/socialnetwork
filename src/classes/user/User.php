<?php
    namespace app\user;

    use app\Model;
    use app\Paging;
    use app\Sanitize;
    use app\Random;
    use app\io\Database;
    use app\user\Follow;

    class User extends Model {
        public static function isLoggedIn() {
            return isset($_SESSION['loggedIn']);
        }

        public static function getLoggedInUserId() {
            if(!User::isLoggedIn()) {
                return null;
            }

            return $_SESSION['loggedIn']['id'];
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
            $db->query('SELECT COUNT(id) AS c FROM users WHERE username LIKE :username;');
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

        public function getFollowersCount() {
            $this->_db->query('SELECT COUNT(id) AS c FROM following WHERE target_user_id LIKE :target;');
            $this->_db->bind('target', $this->getId());

            return $this->_db->single()->c;
        }

        public function getFollowingCount() {
            $this->_db->query('SELECT COUNT(id) AS c FROM following WHERE sender_user_id LIKE :sender;');
            $this->_db->bind('sender', $this->getId());

            return $this->_db->single()->c;
        }

        public function getFollowers(int $page = 1) {
            // Get total count of rows
            $this->_db->query('SELECT COUNT(id) AS c FROM following WHERE target_user_id LIKE :target');
            $this->_db->bind('target', $this->getId());
            
            $count = $this->_db->single()->c;

            if($count <= 0)
                return null;

            $paging = new Paging($count, $page, DEFAULT_ITEMS_PER_PAGE);

            // Check if page exists
            if(!$paging->pageExists())
                return null;

            // Get paged amount of rows
            $this->_db->query('SELECT * FROM following WHERE target_user_id LIKE :target LIMIT :limit OFFSET :offset;');
            $this->_db->bind('target', $this->getId());
            $this->_db->bind('limit', DEFAULT_ITEMS_PER_PAGE);
            $this->_db->bind('offset', $paging->getOffset());
            $res = $this->_db->resultSet();

            // Fetch rows
            $users = [];
            foreach($res as $idx=>$item) {
                $obj = new User($this->_db, $item->sender_user_id);
                array_push($users, $obj);
            }

            return $users;
        }

        public function getFollowing(int $page = 1) {
            // Get total count of rows
            $this->_db->query('SELECT COUNT(id) AS c FROM following WHERE sender_user_id LIKE :sender');
            $this->_db->bind('sender', $this->getId());
            
            $count = $this->_db->single()->c;

            if($count <= 0)
                return null;

            $paging = new Paging($count, $page, DEFAULT_ITEMS_PER_PAGE);

            // Check if page exists
            if(!$paging->pageExists())
                return null;

            // Get paged amount of rows
            $this->_db->query('SELECT * FROM following WHERE sender_user_id LIKE :sender LIMIT :limit OFFSET :offset;');
            $this->_db->bind('sender', $this->getId());
            $this->_db->bind('limit', DEFAULT_ITEMS_PER_PAGE);
            $this->_db->bind('offset', $paging->getOffset());
            $res = $this->_db->resultSet();

            // Fetch rows
            $users = [];
            foreach($res as $idx=>$item) {
                $obj = new User($this->_db, $item->target_user_id);
                array_push($users, $obj);
            }

            return $users;
        }

        public function getLoginLog() {
            // TODO:
            return null;   
        }
    }