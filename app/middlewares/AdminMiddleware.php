<?php 
    class AdminMiddleware{
        private $database;
        public function __construct(){
            $this->database = Database::instance();
        }

        public function isAdmin(){
            $user_middleware = LoginMiddleware::__construct();
            $user_middleware->hasLoggedIn();
            $user_id = $_SESSION["user_id"];
            $user_modal = new User();
            $user = $user_modal->getUserById($user_id);
            if($user["user_role"] !== "Admin"){
                header("Location: /notfound");
            }
        }
    }
?>