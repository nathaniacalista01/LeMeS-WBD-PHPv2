<?php
    class CourseController extends Controller{
        public function index(){
            header("Location: /course/lists/page=1");
            exit;
        }
        public function lists($params){
            $course = new Course();
            $components = explode("=",$params);
            $page_number = $components[1];
            $courses = $course->getFewCourses($page_number);
            $max_page = $course->getTotalRows(4);
            return $this->view('home','index',["page_number"=>$page_number,"courses" => $courses,"max_page" => $max_page]);
        }
    }
?>