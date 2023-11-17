<?php
    class PremiumController extends Controller{
        public function index(){
            header("Location: /premium/lists/page=1");
            exit;
        }
        public function lists($params){
            $premium_middleware = $this->middleware("PremiumMiddleware");
            $premium_middleware->isPremium();
            $components = explode("=",$params);
            $page_number = $components[1];
            $data = ["page"=>$page_number];
            $url = "http://host.docker.internal:8000/api/course/";
            $raw_data = HttpCall::get($url,$data);
            $result = json_decode($raw_data,true);
            $courses = $result["data"];


            $url2 = "http://host.docker.internal:8000/api/course/total";
            $raw_total_data = HttpCall::get($url2);
            $result2 = json_decode($raw_total_data,true);
            $total_data = $result2["data"];
        
        
            $total_page = ceil($total_data/4);
            // Meneruskan data ke view
            return $this->view('premium','index',["page_number"=>$page_number,"courses"=>$courses,"type"=>"lists","max_page"=>$total_page]);
        }

        public function preview($params){
            $middleware = $this->middleware("LoginMiddleware");
            $middleware->hasLoggedIn();
            $param1 = ["course_id"=>$params];
            $param2 = ["course_id"=>$params];
            $raw_modules = HttpCall::get("http://host.docker.internal:8000/api/modul/course/".$params);
            $raw_course = HttpCall::get("http://host.docker.internal:8000/api/course/".$params);
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

            $raw_materials = HttpCall::get("http://host.docker.internal:8000/api/material/module/".$params);
            $data_materials = json_decode($raw_materials,true);
            
            $materials = $data_materials["data"];

            
            $raw_modul = HttpCall::get("http://host.docker.internal:8000/api/modul/".$params);
            $data_modul = json_decode($raw_modul,true);
            $modul = $data_modul["data"];

            $course_id = $modul["course_id"];
            
            $raw_modul2 = HttpCall::get("http://host.docker.internal:8000/api/modul/course/".$course_id);
            $data_modul2 = json_decode($raw_modul2,true);
            $modul2 = $data_modul2["data"];


            $raw_course = HttpCall::get("http://host.docker.internal:8000/api/course/".$course_id);
            $data_course = json_decode($raw_course,true);
            $course = $data_course["data"];
            
            return $this->view('premium','detailModule',["course"=>$course,"module"=>$modul,"materials"=>$materials,"modules"=>$modul2]);            
        }
    }
?>