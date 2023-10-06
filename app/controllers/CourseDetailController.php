<?php
    class CourseDetailController extends Controller{
        public function index(){
            return $this->view('course-detail','index',[]);
        }

        public function addModule(){
            return $this->view('course-detail','addModule',[]);
        }
    }
?>