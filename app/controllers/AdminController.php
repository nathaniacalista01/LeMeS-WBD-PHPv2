<?php

    class AdminController extends Controller{
        // Landing page admin, menampilkan semua courses
        public function index(){
            
        }

        // Page admin untuk melihat semua students
        public function users($params){
            if(!isset($_SESSION["user_id"])){
                $_SESSION["error"] = "You have to log in first";
                header("Location: /login");
            }
            $components = explode("=",$params);
            $page_number = $components[1];
            $admin = new Admin();
            $users = $admin->getUsers();
            $user_page = $admin->getFewUsers($page_number);
            $max_page = ceil(count($users)/8);
            // echo $max_page;
            return $this->view("admin","users",["page_number" => $page_number,"max_page" =>$max_page,"users"=>$user_page]);
        }

        // Page admin untuk melihat semua teachers
        public function teachers(){
            return $this->view("admin","teachers",[]);
        }

        // Page admin untuk add teacher
        public function addTeacher(){
            return $this->view("admin","index",[]);
        }
        // Page admin untuk edit teacher
        public function editTeacher(){
            return $this->view("admin","index",[]);
        }
        // Page admin untuk melihat courses
        public function courses(){
            return $this->view("admin","courses",[]);
        }
    }
?>