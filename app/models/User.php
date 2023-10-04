<?php
require_once(__DIR__."/Model.php");
    class User extends Model{
        public function __construct(){
            parent::__construct("users");
        }

        public function register($fullname,$username,$password){
            $timestamp = time();
            $hashed_pass = password_hash($password,PASSWORD_DEFAULT);
            try {
                $query = "INSERT INTO users (fullname,username,password) VALUES(:fullname,:username,:password)";
                $this->database->query($query);
                $this->database->bind('fullname',$fullname);
                $this->database->bind('username',$username);
                $this->database->bind('password',$hashed_pass);
                $this->database->execute();       
            } catch (PDOException $th) {
                echo $th->getMessage();
            }
           
        }
        public function getUserByUsername($username){
            $query = "SELECT * FROM users where username = :username";
            $this->database->query($query);
            $this->database->bind("username",$username);
            $result = $this->database->single_fetch();
            return $result;
        }
    }
?>