<?php
    class HomeController extends Controller{
        public function index(){
           header("Location: /course/lists/page=1");
        }
        
    }
?>