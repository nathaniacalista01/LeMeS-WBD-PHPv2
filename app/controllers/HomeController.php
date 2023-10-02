<?php
    class HomeController extends Controller{
        public function index(){
            return $this->view('home','index',[]);
        }
        public function redirect(){
            echo "redirect";
            return $this->view('home','index',[]);
        }
    }
?>