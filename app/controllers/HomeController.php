<?php
    class HomeController extends Controller{
        public function index(){
           header("Location: /course/lists/page=1");
        }
        public function redirect(){
            echo "redirect";
            return $this->view('home','index',[]);
        }
    }
?>