<?php
require_once(__DIR__."/Model.php");
    class Course extends Model{
        public function __construct(){
            parent::__construct("courses");
        }
        public function getFewCoursesEnrolled($page){
            $participant_id = $_SESSION["user_id"];
            $query = "SELECT *
                FROM courses NATURAL JOIN course_participant
                WHERE participant_id = :participant_id AND is_accepted = true LIMIT 4 OFFSET :offset;
            ";
            $this->database->query($query);
            $this->database->bind('participant_id',$participant_id);
            $this->database->bind('offset',($page-1)*4);
            $this->database->execute();
            $result = $this->database->fetchAll();
            return $result;
        }
        public function getAllCourses(){
            $query = "SELECT * FROM courses ORDER BY release_date DESC";
            $this->database->query($query);
            $this->database->execute();
            $result = $this->database->fetchAll();
            return $result;
        }
        public function getAllCoursesEnrolled(){
            $query = "
                SELECT c.course_id,c.title,c.description,c.image_path,c.release_date
                FROM courses as c NATURAL JOIN course_participant
                WHERE participant_id = :participant_id AND is_accepted = true;
            ";
            $this->database->query($query);
            $this->database->bind("participant_id",$_SESSION["user_id"]);
            $this->database->execute();
            $result = $this->database->fetchAll();
            return $result;
        }
        public function getTotalRows($course_per_page){
            $courses = count( $this->getAllCourses());
            return ceil($courses/$course_per_page);
        }
        public function getFewCourses($page){
            $query = "SELECT * from courses ORDER BY release_date DESC LIMIT 4 OFFSET :offset";
            $this->database->query($query);
            $this->database->bind('offset',($page-1)*4);
            $result = $this->database->fetchAll();
            return $result;
        }

        public function add_course($title,$description,$image_path){
            $query = "INSERT INTO courses(title,description,image_path) VALUES (:title,:description,:image_path)";
            $this->database->query($query);
            $this->database->bind("title",$title);
            $this->database->bind("description",$description);
            $this->database->bind("image_path",$image_path);
            $this->database->execute();
            return $this->database->rowCount();
        }

        public function single_course($id){
            $query = "SELECT * FROM courses WHERE course_id = :course_id";
            $this->database->query($query);
            $this->database->bind("course_id",$id);
            $result = $this->database->single_fetch();
            return $result;            
        }

        public function update_course($title,$description,$image_path,$id){
            $query = "UPDATE courses SET title = :title, description = :description, image_path = :image_path WHERE course_id = :course_id";
            $this->database->query($query);
            $this->database->bind("title",$title);
            $this->database->bind("description",$description);
            $this->database->bind("image_path",$image_path);
            $this->database->bind("course_id",$id);
            $this->database->execute();
            return $this->database->rowCount();
        }

    }
?>