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
       public function getFewCourses($page){
        $query = "SELECT * from courses ORDER BY release_date DESC LIMIT 10 OFFSET :offset";
        $this->database->query($query);
        $this->database->bind('offset',($page-1)*10);
        $this->database->execute();
        $result = $this->database->fetchAll();
        echo $result;
       }

    }
?>