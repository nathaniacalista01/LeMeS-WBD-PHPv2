<?php
require_once(__DIR__."/Model.php");
    class Module extends Model{
        public function __construct(){
            parent::__construct("modules");
        }

        public function add_module($course_id,$title,$description){
            $query = "INSERT INTO modules(course_id,title,description) VALUES (:course_id,:title,:description)";
            $this->database->query($query);
            $this->database->bind("course_id",$course_id);
            $this->database->bind("title",$title);
            $this->database->bind("description",$description);
            $this->database->execute();
            return $this->database->rowCount();
        }
        public function delete_module($module_id){
            $query = "DELETE FROM modules WHERE module_id = :module_id";
            $this->database->query($query);
            $this->database->bind("module_id",$module_id);
            $this->database->execute();
            return $this->database->rowCount();
        }

        public function update_module($title,$description,$module_id){
            $query = "UPDATE modules SET title = :title, description = :description WHERE module_id = :module_id";
            $this->database->query($query);
            $this->database->bind("title",$title);
            $this->database->bind("description",$description);
            $this->database->bind("module_id",$module_id);
            $this->database->execute();
            return $this->database->rowCount();
        }
    }
?>