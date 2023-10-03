<?php
    class HomeController extends Controller{
        public function index(){
            $course = new Course();
            $results = $course->getAllCourses();
            $total_rows = count($results);
            // Asumsikan 1 page berisi 4 data
            $total_page = ceil($total_rows/4);
            return $this->view("home","index",["total_page" => $total_page]);
        }
        public function redirect(){
            echo "redirect";
            return $this->view('home','index',[]);
        }
    }
?>