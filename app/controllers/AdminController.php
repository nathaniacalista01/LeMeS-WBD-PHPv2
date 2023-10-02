<?php

    class AdminController extends Controller{
        // Landing page admin, menampilkan semua courses
        public function index(){
            $course = new Course();
            $results = $course->getAllCourses();
            $total_rows = count($results);
            // Asumsikan 1 page berisi 10 data
            $total_page = ceil($total_rows/10);
            return $this->view("admin","index",["total_page" => $total_page]);
        }

        // Page admin untuk melihat semua students
        public function students(){
            return $this->view("admin","users",[]);
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
    }
?>