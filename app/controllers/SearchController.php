<?php

    class SearchController extends Controller{
        public function index(){
            return $this->view("search","index",[]);
        }
    }
?>