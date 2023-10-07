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
        public function delete_course($course_id){
            $query = "DELETE FROM courses WHERE course_id = :course_id" ;
            $this->database->query($query);
            $this->database->bind("course_id",$course_id);
            $this->database->execute();
            return $this->database->rowCount();
        }

        public function get_course_by_id($course_id){
            $query = "SELECT * FROM courses where course_id = :course_id";
            $this->database->query($query);
            $this->database->bind("course_id",$course_id);
            $course = $this->database->single_fetch();
            return $course;
        }
        public function update_course($title,$description,$course_password,$image_path,$id){
            $query = "UPDATE courses SET title = :title, description = :description, image_path = :image_path, course_password = :course_password WHERE course_id = :course_id";
            $this->database->query($query);
            $this->database->bind("title",$title);
            $this->database->bind("description",$description);
            $this->database->bind("image_path",$image_path);
            $this->database->bind("course_id",$id);
            $this->database->bind("course_password",$course_password);
            $this->database->execute();
            return $this->database->rowCount();
        }

        public function add_course($title,$description,$image_path,$course_password){
            $query = "INSERT INTO courses(title,description,image_path,course_password) VALUES (:title,:description,:image_path,:course_password)";
            $this->database->query($query);
            $this->database->bind("title",$title);
            $this->database->bind("description",$description);
            $this->database->bind("image_path",$image_path);
            $this->database->bind("course_password",$course_password);
            $this->database->execute();
            return $this->database->rowCount();
        }

        public function register_user($fullname, $username, $password, $user_role){
            $hashed_pass = password_hash($password,PASSWORD_DEFAULT);
            $query = "INSERT INTO users (fullname, username, password, user_role) VALUES (:fullname, :username, :password, :user_role)";
            $this->database->query($query);
            $this->database->bind("fullname",$fullname);
            $this->database->bind("username",$username);
            $this->database->bind("password",$hashed_pass);
            $this->database->bind("user_role",$user_role);
            $this->database->execute();
            return $this->database->rowCount();
        }
    }
?>