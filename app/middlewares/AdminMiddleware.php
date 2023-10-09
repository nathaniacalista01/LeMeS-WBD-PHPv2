<?php 
    require_once("LoginMiddleware.php");
    class AdminMiddleware{
        private $database;
        public function __construct(){
            $this->database = Database::instance();
        }

        public function isAdmin(){
            $user_middleware = new LoginMiddleware();
            $user_middleware->hasLoggedIn();
            $user_id = $_SESSION["user_id"];
            $user_modal = new User();
            $user = $user_modal->getUserById($user_id);
            if($user["user_role"] !== "ADMIN"){
                header("Location: /notfound");
            }
        }
    }
?>