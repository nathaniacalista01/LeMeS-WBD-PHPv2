<?php
require_once(__DIR__."/Model.php");
    class User extends Model{
        public function __construct(){
            parent::__construct("users");
        }

        public function register($fullname,$username,$password){
            $timestamp = time();
            $hashed_pass = password_hash($password,PASSWORD_DEFAULT);
            
            // Define a default photo Path
            $default_photo = '../../public/image/profile/defaultprofilepicture.jpg';
            try {
                $query = "INSERT INTO users (fullname,username,password,image_path) VALUES(:fullname,:username,:password,:profile_photo)";
                $this->database->query($query);
                $this->database->bind('fullname',$fullname);
                $this->database->bind('username',$username);
                $this->database->bind('password',$hashed_pass);
                $this->database->bind('profile_photo',$default_photo);
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

        public function getUserById($userId){
            $query = "SELECT * FROM users WHERE user_id = :id";
            $this->database->query($query);
            $this->database->bind("id", $userId);
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

        public function update_profile($fullname, $username, $image_path, $id){
            $query = "UPDATE users SET fullname = :fullname, username = :username, image_path = :image_path WHERE user_id = :user_id";
            $this->database->query($query);
            $this->database->bind("fullname",$fullname);
            $this->database->bind("username",$username);
            $this->database->bind("image_path",$image_path);
            $this->database->bind("user_id",$id);
            $this->database->execute();
            return $this->database->rowCount();
        }

        public function update_password($hashed_pass, $id){
            $query = "UPDATE users SET password = :password WHERE user_id = :user_id";
            $this->database->query($query);
            $this->database->bind("password",$hashed_pass);
            $this->database->bind("user_id",$id);
            $this->database->execute();
            return $this->database->rowCount();
        }
    }

?>