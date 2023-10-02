<?php
    class LoginController extends Controller{
        public function index(){
            return $this->view('login','index',[]);
        }

        public function redirect(){
            return $this->view('login','index',["message" => "Succesfully Registered!"]);
        }
    }
?>