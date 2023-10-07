<?php
require_once(__DIR__."/Model.php");
    class Course extends Model{
        public function __construct(){
            parent::__construct("courses");
        }
        
        public function getAllCourses(){
            $query = "SELECT * FROM courses ORDER BY release_date DESC";
            $this->database->query($query);
            $this->database->execute();
            $result = $this->database->fetchAll();
            return $result;
        }
        
        public function getTotalRows($course_per_page){
            $courses = count( $this->getAllCourses());
            return ceil($courses/$course_per_page);
        }
        public function get_few_courses($limit,$page){
            $query = "SELECT * from courses ORDER BY release_date DESC LIMIT :limit OFFSET :offset";
            $this->database->query($query);
            $this->database->bind('offset',($page-1)*$limit);
            $this->database->bind('limit',$limit);
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

        

        public function search_participant($course_id,){
            $query = "SELECT c.course_id FROM courses as c NATURAL JOIN course_participant 
                WHERE c.course_id = :course_id AND participant_id = :user_id;
            ";
            $this->database->query($query);
            $this->database->bind("course_id",$course_id);
            $this->database->bind("user_id",$_SESSION["user_id"]);
            $result = $this->database->single_fetch();
            return $result;
        }

        public function get_modules($course_id){
            $query = "SELECT * FROM modules WHERE course_id = :course_id";
            $this->database->query($query);
            $this->database->bind("course_id",$course_id);
            $rows = $this->database->fetchAll();
            return $rows;
        }
    }
?>