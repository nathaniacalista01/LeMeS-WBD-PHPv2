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
            // Baru bisa preview kalau udah login
            $course = new Course();
            $middleware = $this->middleware("LoginMiddleware");
            $middleware->hasLoggedIn();
            $user_model = new User();
            $enrolled_courses = $user_model->getAllCoursesEnrolled();
            $result = $course->single_course($params);
            if(!$result){   
                header("Location: /notfound");
            }else{
                if(!in_array($result,$enrolled_courses)){
                    $_SESSION["error"] = "You have to enrolled this course first!";
                    header("Location: /");
                }else{
                    $modules = $course->get_modules($params);
                    return $this->view('courses','detailCourse',["course" => $result,"modules"=>$modules]);
                }
            }
        }

        public function enrolled($params = ""){
            // Bisa liat course yang udah dienrolled cuma kalau udah login
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
            // Cuma admin yang bisa akses add course
            $middleware = $this->middleware("AdminMiddleware");
            $middleware->isAdmin();
            return $this->view("courses","add",[]);
        }

        public function editCourse($params = ""){
            if(!$params){
                header("Location: /notfound");
            }
            // Cuma admin yang bisa akses edit course
            $middleware = $this->middleware('AdminMiddleware');
            $middleware->isAdmin();
            $course = new Course();
            $result = $course->single_course($params);
            return $this->view("courses","edit",["course" => $result]);
        }

        public function module($params = ""){
            if($params){
                header("Location: /notfound");
            }
            // Hanya orang yang sudah login yang bisa liat module
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

        public function addmodule($params=""){
            // Hanya teacher yang bisa add module
            if(!$params){
                return ("Location: /notfound");
            }
            $teacher_middleware = $this->middleware("TeacherMiddleware");
            $teacher_middleware->isTeacher();
            $course = new Course();
            $result = $course->single_course($params);
            return $this->view('module','add',["course" => $result]);
        }
    }
?>