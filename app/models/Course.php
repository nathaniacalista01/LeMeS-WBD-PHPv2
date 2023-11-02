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

        public function searchCourses($data){
            $query = "SELECT * FROM courses ";
            $search = false;
            if(isset($data["title"])){
                $query.= "WHERE (LOWER(title) LIKE :title OR LOWER(description) LIKE :title)";
                $search = true;
            }
            if(isset($data["password"])){
                $query .= ($search ? " AND (course_password IS " : " WHERE (course_password IS");
                if($data["password"] === "false"){
                    $query.= " NULL)";
                }else{
                    $query .= " NOT NULL)";
                }
                $search = true;
            }
            if(isset($data["release_year"])){
                $components = explode("-",$data["release_year"]);
                if(count($components) === 1){
                    $year = "< :smaller_year";
                    $smaller_year = $components[0];
                }else{
                    $year = "BETWEEN :smaller_year AND :bigger_year";
                    $smaller_year = $components[0];
                    $bigger_year =$components[1];
                }
                $query .= ($search ? " AND date_part('year',release_date) " .$year: "WHERE date_part('year',release_date) ". $year);
            }
            $this->database->query($query);
            if($search){
                $this->database->bind("title",'%'.$data["title"].'%');
            }
            if(isset($data["release_year"])){
                $this->database->bind("smaller_year",$smaller_year);
                if(isset($bigger_year)){
                    $this->database->bind("bigger_year",$bigger_year);
                }
            }
            $results = $this->database->fetchAll();
            return $results;
        }

        public function searchFewCourses($page,$params){
            $query = "SELECT * FROM courses";
            $where = false;
            $search = false;
            $password = false;
        
            if(isset($params["title"])){
                $query.= " WHERE (LOWER(title) LIKE :title OR LOWER(description) LIKE :title)";
                $where = true;
                $search = true;
            }

            if(isset($params["password"])){
                $query .= ($search ? " AND (course_password IS " : " WHERE (course_password IS");
                if($params["password"] === "false"){
                    $query.= " NULL)";
                }else{
                    $query .= " NOT NULL)";
                }
            }

            if(isset($params["release_year"])){
                $components = explode("-",$params["release_year"]);
                if(count($components) === 1){
                    $year = "< :smaller_year";
                    $smaller_year = $components[0];
                }else{
                    $year = "BETWEEN :smaller_year AND :bigger_year";
                    $smaller_year = $components[0];
                    $bigger_year =$components[1];
                }
                $query .= ($search ? " AND date_part('year',release_date) ".$year  : " WHERE date_part('year',release_date) ". $year);
            }
            
            if(isset($params["sort"])){
                $components = explode(" ",$params["sort"]);
                $rules = $components[1];
                if($components[0] === "title"){
                    $query .= " ORDER BY title ".$rules;
                }else{
                    $query .= " ORDER BY release_date " . $rules;
                }
                $sort = true;
            }
            
            $query .= " LIMIT 4 OFFSET :offset";
            $this->database->query($query);
            $this->database->bind("offset",($page-1)*4);
            if($search){
                $this->database->bind("title", '%'.$params["title"].'%');
            }
            if(isset($params["release_year"])){
                $this->database->bind("smaller_year",$smaller_year);
                if(isset($bigger_year)){
                    $this->database->bind("bigger_year",$bigger_year);
                }
            }
            $results = $this->database->fetchAll();
            return $results;
        }

    }
?>