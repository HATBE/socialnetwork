<?php
    namespace app\user;

    use app\user\User;
    use app\io\Database;
    use app\Template;
    use app\ButtonsProvider;

    class UserProfileCardProvider {
        private $_db;
        private $_user;
        private $_loggedInUser;
        private $_you = false;

        public function __construct(Database $db, User $user, $loggedInUser) {
            $this->_db = $db;
            $this->_user = $user;
            $this->_loggedInUser = $loggedInUser;

            if(User::isLoggedIn()) {
                $this->_you = $user->getId() === User::getLoggedInUserId() ? true : false;
            }
        }

        public function generateUserCard() {
            $username = $this->_user->getUsername();
            $userid = $this->_user->getId();
            $followersCount = $this->_user->getFollowersCount();
            $followingCount = $this->_user->getFollowingCount();

            $html = "
                <div class='d-flex justify-content-center overflow-hidden'>
                    <img draggable='false' class='user-select-none bg-light rounded-circle user-pb-img' src='https://avatars.dicebear.com/api/jdenticon/${username}.svg' alt='User avatar'>
                </div>
                <div class='d-flex justify-content-center'>
                    <span class='fw-bold bg-light text-dark py-1 px-2 my-3 rounded h3'>
                        ${username}
                    </span>
                </div>
                <div class='d-flex w-100 justify-content-center'>
                    <div class='mb-3 w-75'>
                        <div class='user-select-none d-flex justify-content-center my-2'>
                            <div class='d-flex justify-content-center py-1 px-4 w-100'>Followers</div>
                            <div class='d-flex justify-content-center py-1 px-4 w-100'>Following</div>
                        </div>  
                        <div class='user-select-none d-flex justify-content-center my-2'>
                            <a class='text-light d-flex justify-content-center py-1 px-4 w-100' href='/profile/${userid}/followers'>
                                <div id='user-followers-count' data-id='${userid}'>${followersCount}</div>
                            </a>
                            <a class='text-light d-flex justify-content-center py-1 px-4 w-100' href='/profile/${userid}/following'>
                                <div id='user-following-count' data-id='${userid}'>${followingCount}</div>
                            </a>
                        </div>
                    </div>
                </div>
                <div>
            ";
            $html .= ButtonsProvider::followUser($this->_db, $userid, $this->_loggedInUser, true);
            if($this->_you) {
                $html .= "
                    <a href='/settings'>
                        <button class='btn btn-secondary w-100'>
                            Settings
                        </button>
                    </a>
                ";
            }
            $html .= "
                </div>
            ";

            return $html;
        }

        public function generateUserCardListstyle() {
            return $this->_user->getUsername();
        }
    }