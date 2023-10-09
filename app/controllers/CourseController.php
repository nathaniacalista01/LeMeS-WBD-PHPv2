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
            $courses = $course->get_few_courses(4,$page_number);
            $max_page = $course->getTotalRows(4);
            return $this->view('home','index',["page_number"=>$page_number,"courses" => $courses,"max_page" => $max_page,"type"=>"lists"]);
        }

        public function preview($params){
            $course = new Course();
            $middleware = $this->middleware("LoginMiddleware");
            $middleware->hasLoggedIn();
            $result = $course->single_course($params);
            if(!$result){   
                header("Location: /notfound");
            }
            $modules = $course->get_modules($params);
            return $this->view('courses','detailCourse',["course" => $result,"modules"=>$modules]);
        }

        public function enrolled($params){
            
            $middleware = $this->middleware("LoginMiddleware");
            $middleware->hasLoggedIn();
            $components = explode("=",$params);
            $user = new User();
            // Current page number
            $page_number = $components[1];
            // Get all courses enrolled
            $all_courses_enrolled = $user->getAllCoursesEnrolled();
            // Get maximal page
            $max_page = ceil(count($all_courses_enrolled)/4);
            // Get few courses enrolled
            $courses_enrolled = $user->getFewCoursesEnrolled($page_number);

            return $this->view('home','index',["page_number"=>$page_number,"max_page"=>$max_page,"courses" => $courses_enrolled,"type" => "enrolled"]);
        }

        public function addCourse(){
            return $this->view("courses","add",[]);
        }

        public function editCourse($params){
            $course = new Course();
            $result = $course->single_course($params);
            return $this->view("courses","edit",["course" => $result]);
        }

        public function module($params){
            $course = new Course();
            $module = new Module();
            $middleware = $this->middleware("LoginMiddleware");
            $middleware->hasLoggedIn();
            $result = $module->single_module($params);
            if(!$result){
                header("Location: /notfound");
            }
            $course_id = $result['course_id'];
            $materials = $module->get_materials($params);
            $result2 = $course->single_course($course_id);
            $modules = $course->get_modules($course_id);
            return $this->view('courses','detailmodule',["course"=>$result2, "module" => $result,"materials"=>$materials,"modules"=>$modules]);
        }

        public function addmodule($params){
            $course = new Course();
            $result = $course->single_course($params);
            return $this->view('module','add',["course" => $result]);
        }
    }
?>