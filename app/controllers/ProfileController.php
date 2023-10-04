<?php
    class ProfileController extends Controller{
        public function index(){
            return $this->view('profile','index',[]);
        }
    }
?>