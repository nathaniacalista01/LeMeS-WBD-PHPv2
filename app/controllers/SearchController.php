<?php

    class SearchController extends Controller{
        public function index(){
            $middleware = $this->middleware("LoginMiddleware");
            $middleware->hasLoggedIn();
            return $this->view("search","index",[]);
        }
    }
?>