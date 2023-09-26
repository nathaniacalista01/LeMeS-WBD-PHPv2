<?php
    class LoginController extends Controller{
        public function index(){
            return $this->view('login','index',[]);
        }
    }
?>