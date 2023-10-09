<?php
    class ProfileController extends Controller{
        public function index(){
            $middleware = $this->middleware('LoginMiddleware');
            $middleware->hasLoggedIn();
            return $this->view('profile','index',[]);
        }
    }
?>