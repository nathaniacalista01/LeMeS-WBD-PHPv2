<?php
require_once(__DIR__."/Model.php");
    class Student extends Model{
        public function __construct(){
            parent::__construct("students");
        }

        public function register($fullname,$username,$password){
            $timestamp = time();
            $hashed_pass = password_hash($password,PASSWORD_DEFAULT);
            $query = "INSERT INTO students (fullname,username,password) VALUES(:fullname,:username,:password)";
            $this->database->query($query);
            $this->database->bind('fullname',$fullname);
            $this->database->bind('username',$username);
            $this->database->bind('password',$hashed_pass);
            $this->database->execute();
        }
        public function getStudentByUsername($username){
            $query = "SELECT password from ".$this->table." WHERE username=".$username;
        }
    }
?>  