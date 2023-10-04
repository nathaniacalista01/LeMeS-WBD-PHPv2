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
            return $this->view('home','index',["page_number"=>$page_number,"courses" => $courses,"max_page" => $max_page,"type"=>"lists"]);
        }

        public function enrolled($params){
            if(!isset($_SESSION["user_id"])){
                header("Location: /login");
            }else{
                $components = explode("=",$params);
                $course = new Course();
                // Current page number
                $page_number = $components[1];
                // Get all courses enrolled
                $all_courses_enrolled = $course->getAllCoursesEnrolled();
                // Get maximal page
                $max_page = ceil(count($all_courses_enrolled)/4);
                // Get few courses enrolled
                $courses_enrolled = $course->getFewCoursesEnrolled($page_number);

                return $this->view('home','index',["page_number"=>$page_number,"max_page"=>$max_page,"courses" => $courses_enrolled,"type" => "enrolled"]);
            }
        }

        public function addCourse(){
            return $this->view("courses","addCourse",[]);
        }
    }
?>