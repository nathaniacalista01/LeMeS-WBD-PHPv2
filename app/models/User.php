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

        public function enroll($course_id){
            $participant_id = $_SESSION["user_id"];
            $query = "INSERT INTO course_participant(course_id,participant_id) VALUES (:course_id,:participant_id)";
            $this->database->query($query);
            $this->database->bind("participant_id",$participant_id);
            $this->database->bind("course_id",$course_id);
            $this->database->execute();
            return $this->database->rowCount();
        }
        public function search_cource_participant($course_id){
            $user_id = $_SESSION["user_id"];
            $query = "SELECT * FROM course_participant WHERE course_id = :course_id AND participant_id = :participant_id";
            $this->database->query($query);
            $this->database->bind("course_id",$course_id);
            $this->database->bind("participant_id",$user_id);
            $this->database->single_fetch();
            return $this->database->rowCount();
        }
        public function getFewCoursesEnrolled($page){
            $participant_id = $_SESSION["user_id"];
            $query = "SELECT *
                FROM courses NATURAL JOIN course_participant
                WHERE participant_id = :participant_id LIMIT 4 OFFSET :offset;
            ";
            $this->database->query($query);
            $this->database->bind('participant_id',$participant_id);
            $this->database->bind('offset',($page-1)*4);
            $this->database->execute();
            $result = $this->database->fetchAll();
            return $result;
        }
        public function getAllCoursesEnrolled(){
            $query = "
                SELECT c.course_id,c.title,c.description,c.image_path,c.release_date
                FROM courses as c NATURAL JOIN course_participant
                WHERE participant_id = :participant_id;
            ";
            $this->database->query($query);
            $this->database->bind("participant_id",$_SESSION["user_id"]);
            $this->database->execute();
            $result = $this->database->fetchAll();
            return $result;
        }

        public function check_enroll($course_id){
            $query = "SELECT * FROM course_participant WHERE course_id = :course_id AND participant_id = :user_id";
            $this->database->query($query);
            $this->database->bind("course_id",$course_id);
            $this->database->bind("user_id",$_SESSION["user_id"]);
            $this->database->single_fetch();
            return $this->database->rowCount();
        }
    }
?>