<?php
    class LoginMiddleware{
        private $database;
        public function __construct(){
            $this->database = Database::instance();
        }
        public function hasLoggedIn(){
            if(!isset($_SESSION["user_id"])){
                $_SESSION["error"] = "You have to login!";
                header("Location: /login");
            }
            $user_id = $_SESSION["user_id"];
            $user = new User();
            $row = $user->getUserById($user_id);
            if(!$row){
                $_SESSION["error"] = "You have to login!";
                header("Location: /login");
            }
        }
    }
?>