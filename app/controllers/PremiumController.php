<?php
    class PremiumController extends Controller{
        public function index(){
            header("Location: /premium/lists/page=1");
            exit;
        }
        public function lists($params){

            $components = explode("=",$params);
            $page_number = $components[1];
            // Fetch data courses
            $raw = file_get_contents("http://host.docker.internal:8000/api/course?page=".$page_number);
            $data = json_decode($raw,true);

            // Fetch total seluruh data
            $raw_total_data = file_get_contents("http://host.docker.internal:8000/api/course/total");
            $json_total_data = json_decode($raw_total_data,true);

            // Cleaning data
            $total_data = $json_total_data["data"];
            $total_page = ceil($total_data/4);
            $courses = $data["data"];

            // Meneruskan data ke view
            return $this->view('premium','index',["page_number"=>$page_number,"courses"=>$courses,"type"=>"lists","max_page"=>$total_page]);
        }

        public function preview($params){
            $middleware = $this->middleware("LoginMiddleware");
            $middleware->hasLoggedIn();
            $raw_modules = file_get_contents("http://host.docker.internal:8000/api/modul/course/".$params);
            $raw_course = file_get_contents("http://host.docker.internal:8000/api/course/".$params);

            $data = json_decode($raw_modules,true);
            $data_course = json_decode($raw_course,true);
            $course = $data_course["data"];
            $modules = $data["data"];
            return $this->view('premium','detailCourse',["course"=>$course,"modules"=>$modules]);
        }

        public function module($params){
            // Menerima parameter berupa module_id
            if(!$params){
                header("Location: /notfound");
            }
            $middleware = $this->middleware("LoginMiddleware");
            $middleware->hasLoggedIn();

            $raw_materials = file_get_contents("http://host.docker.internal:8000/api/material/module/".$params);
            $data_materials = json_decode($raw_materials,true);
            $materials = $data_materials["data"];

            
            $raw_modul = file_get_contents("http://host.docker.internal:8000/api/modul/".$params);
            $data_modul = json_decode($raw_modul,true);
            $modul = $data_modul["data"];

            $course_id = $modul["course_id"];
            
            $raw_modul2 = file_get_contents("http://host.docker.internal:8000/api/modul/course/".$course_id);
            $data_modul2 = json_decode($raw_modul2,true);
            $modul2 = $data_modul2["data"];


            $raw_course = file_get_contents("http://host.docker.internal:8000/api/course/".$course_id);
            $data_course = json_decode($raw_course,true);
            $course = $data_course["data"];
            
            return $this->view('premium','detailModule',["course"=>$course,"module"=>$modul,"materials"=>$materials,"modules"=>$modul2]);            
        }
    }
?>