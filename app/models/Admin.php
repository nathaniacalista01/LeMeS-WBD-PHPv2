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
    }
?>