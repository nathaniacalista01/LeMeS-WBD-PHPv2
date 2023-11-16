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
    }
?>