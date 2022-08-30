<?php
    namespace app\user;

    use app\user\User;
    use app\user\UserProfileCardProvider;
    use app\io\Database;

    class UserListProvider {
        private $_db;
        private $_user;
        private $_page;
        private $_users;
        private $_loggedInUser;

        public function __construct(Database $db, User $user, $users, int $page, $loggedInUser) {
            $this->_db = $db;
            $this->_user = $user;
            $this->_page = $page;
            $this->_users = $users;
            $this->_loggedInUser = $loggedInUser;
        }

        public function generate() {
            if($this->_users !== null) {
                foreach($this->_users as $user) {
                    $upcp = new UserProfileCardProvider($this->_db, $user, $this->_loggedInUser);
        
                    echo $upcp->generateUserCardListstyle();
                }
            } else {
                if($this->_user->getFollowingCount() <= 0) {
                    echo "This user does not yet follow other users";
                } else {
                    echo "This page does not exist";
                }
            }
        }
    }