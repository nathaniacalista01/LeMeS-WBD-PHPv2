<?php
require_once(__DIR__."/Model.php");
    class Admin extends Model{
        public function __construct(){
            parent::__construct("users");
        }

        public function getUsers(){
            $query = "SELECT * FROM users WHERE user_id != :user_id ORDER BY created_on DESC";
            $this->database->query($query);
            $this->database->bind("user_id",$_SESSION["user_id"]);
            $results = $this->database->fetchAll();
            return $results;
        }

        public function getFewUsers($page){
            $query = "SELECT * FROM users WHERE user_id != :user_id ORDER BY created_on DESC LIMIT 6 offset :offset";
            $this->database->query($query);
            $this->database->bind("user_id",$_SESSION["user_id"]);
            $this->database->bind('offset',($page-1)*6);
            $result = $this->database->fetchAll();
            return $result;
        }

        public function deleteUserById($id){
            $query = "DELETE FROM users WHERE user_id = :user_id";
            $this->database->query($query);
            $this->database->bind("user_id",$id);
            $this->database->execute();
            return $this->database->rowCount();
        }

        public function getUserById($id){
            $query = "SELECT * FROM users where user_id = :user_id";
            $this->database->query($query);
            $this->database->bind("user_id",$id);
            $user = $this->database->single_fetch();
            return $user;
        }

        public function updateUser($username,$fullname,$role,$id){
            $query = "UPDATE users SET username = :username, fullname = :fullname, user_role = :role WHERE user_id = :user_id";
            $this->database->query($query);
            $this->database->bind("username",$username);
            $this->database->bind("fullname",$fullname);
            $this->database->bind("user_id",$id);
            $this->database->bind("role",$role);
            $this->database->execute();
            return $this->database->rowCount();
        }
    }
?>