<?php
    class CourseController extends Controller{
        public function index(){

        }
        public function lists($params){
            $course = new Course();
            $components = explode("=",$params);
            $page_number = $components[1];
            $courses = $course->getFewCourses($page_number);
            return $this->view('home','index',["page_number"=>$page_number,"courses" => $courses]);
        }
    }
?>